<?php

	require_once('includes/sql.php');

	//class to read username / password from a .htpasswd file
	// Source: https://snipt.net/raw/6e83fcf7ddfe852dd79ba6a34224347f/?nice
	class Password
	{
		var $p_lines = array();
		var $p_pass  = array();
		var $en_pass = "";
		var $username = "";
		
		function Password(){}
		
		function ReadPasswords($file)
		{
			 $this->p_lines = file($file);
			foreach ($this->p_lines as $line_num => $line) 
			{
				@list($name, $pass) = explode(":", $line);
				$this->p_pass[trim($name)] = trim($pass);
			}
		}

		function checkUserExists($user)
		{
			return isset($this->p_pass[$user])? true : false;	   
		}

		function lookupPass($user,$password)
		{
			if(isset($this->p_pass[$user]))
			{
					$salt = substr( $this->p_pass[$user] , 0 , 2 );
					$enc_pw = crypt( $password, $salt );
					if ($enc_pw == $this->p_pass[$user])
						return true;
					else
						return false;
			}
			else
			 	return false;
		}
	}

	// Handle form submission, requires set post
	function handlePost()
	{
		// Check to make sure time data is valid

		// Prevent unauthorized users
		$enteredPassword = $_POST['password'];
		$passCheck = new Password();
		$passCheck->ReadPasswords(".htpasswd");
		if (!$passCheck->lookupPass("user", $enteredPassword))
		{
			echo "<h1>Incorrect password</h1>";
			die();
		}


		$data = array(
			"hostEmail" => trim($_POST['hostEmail']),
			"cohostEmail" => trim($_POST['cohostEmail']),
			"eventName" => trim($_POST['eventName']),
			"dateOfEvent" => trim($_POST['eventDate']),
			"possibleStartTime" => date("g:ia", strtotime($_POST['startTime'])), //converts to 12 hour format
			"possibleEndTime" => date("g:ia", strtotime($_POST['endTime'])),
			"prefStartTime" => date("g:ia", strtotime($_POST['prefStartTime'])),
			"eventDuration" => $_POST['eventDuration'],
			"shortDesc" => trim($_POST['desc']),
			"fullDesc" => trim($_POST['fullDesc']),
			"eventType" => $_POST['eventType'],
      "password" => substr(md5(microtime()),rand(0,26),5) //Event access password for attendees
		);


		echo "<h1>Success!</h1><br><h5>Thanks for your existence</h5>";
    
    // Insert event into database
		insertEvent($data);
    

		$isRoomReserved = $_POST['isReserved'];
		if ($isRoomReserved == "no")
		{
			$data["campus"] = $_POST['campus'];
			$data["building"] = trim($_POST['building']);
			$data["roomSize"] = trim($_POST['roomSize']);
			$data["room"] = trim($_POST['roomPref']);

			
			// Add event duration to start time
			$startTime = strtotime($data['prefStartTime']);
			$dur = $data['eventDuration'] * 60; //convert to minutes because strtotime doesnt do decimal vals
			$endTime = strtotime('+' . $dur . 'minutes', $startTime);
			//Convert back to hh:mm am/pm
			$startTime = date("g:ia", $startTime);
			$endTime = date("g:ia", $endTime);


			$person = CODE_M_PRES_NAME;
			$recipientEmail = CODE_M_PRES_EMAIL;

      
			emailReserveRoom($recipientEmail, $person, 
				$data['dateOfEvent'], $startTime, $endTime, 
				$data['possibleStartTime'], $data['possibleEndTime'], 
				$data['eventDuration'], $data['roomSize'], $data['building']
			);
		}

		emailToHosts($data);
		//addEventToCalendar();
	}
	
	

	function emailReserveRoom($recipientEmail, $recipientName, $eventDate,
		$startTime, $endTime, $startRange, $endRange, $duration, $roomSize, 
		$building)
	{
		//form the email
		$subject  = "[Code-M] Room Request for Code-M Event";
		$message  = "Hi $recipientName,\r\n\r\n";
		$message  .= "We are looking to reserve a room on $eventDate" .
			" at $startTime until $endTime in $building. If that isn't possible, we " .
			"can work with something between $startRange and $endRange " .
			"(with the event being $duration hours). " . 
			"The ideal room would be a $roomSize sized room in $building.\r\n\r\nThanks,\r\nCode-M";

		
		$message = wordwrap($message, 85);
		$senderEmail = CODE_M_EMAIL;
		$senderName = "Code-M";
		//set email headers
		$headers  = "MIME-Version: 1.0\r\n";
		$headers .= "Content-type: text/plain; charset=iso-8859-1\r\n";
		$headers .= "From: $senderName <$senderEmail>\r\n";
		$headers .= "CC: $senderEmail\r\n";
		$headers .= "X-Priority: 1\r\n\r\n";
		
		//send email
		echo $recipientEmail . '<br>' . $subject . '<br>' . $message . '<br>' . $headers; // for testing
		//mail($recipientEmail, $subject, $message, $headers);
	}


	function emailToHosts($arr)
	{
		//form the email
		$recipient = $arr['hostEmail'] . ','. $arr['cohostEmail'];
		$subject  = $arr['eventName'] . " | Sent by Code-M Event Submission";
		$message  = "Thanks for submitting an event. Here is the information you submitted.\r\n\r\n";
		$message  .= "Name of Event: " . $arr['eventName'] . "\r\n";
		$message .= "Date of Event: " . $arr['dateOfEvent'] ."\r\n";
		$message .= "Available starting: " . $arr['possibleStartTime'] ."\r\n";
		$message .= "Available ending: " . $arr['possibleEndTime'] . "\r\n";
		$message .= "Preffered Start Time: " . $arr['prefStartTime'] . "\r\n";
		$message .= "Event Duration: " . $arr['eventDuration'] . "\r\n";
		$message .= "Attendee Access Password: " . $arr['password'] . "\r\n";
    
		if (isset($arr['campus']))
		{
			$message .= "Campus: " . $arr['campus'] . "\r\n";
			$message .= "Building: " . $arr['building'] . "\r\n";
			$message .= "Room Preference: " . $arr['room'] . "\r\n";
			$message .= "Room Size: " . $arr['roomSize'] . "\r\n";
		}
		else $message .= "Room Already Reserved\r\n";
		$message .= "Short Description: " . $arr['shortDesc'] . "\r\n";
		$message .= "Full Description: " . $arr['fullDesc'] . "\r\n";
		$message .= "Event Type: " . $arr['eventType'] . "\r\n";
		$message .= "\r\nCode-M";
		
		$message = wordwrap($message, 85);

		$senderEmail = CODE_M_EMAIL;
		$senderName = "Code-M";
		//set email headers
		$headers  = "MIME-Version: 1.0\r\n";
		$headers .= "Content-type: text/plain; charset=iso-8859-1\r\n";
		$headers .= "From: $senderName <$senderEmail>\r\n";
		$headers .= "CC: $senderEmail\r\n";
		$headers .= "X-Priority: 1\r\n\r\n";
		
		//send email
		//mail($recipient, $subject, $message, $headers);
		echo $recipient . '<br>' . $subject . '<br>' . $message . '<br>' . $headers; // for testing
	}
?>