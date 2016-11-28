<?php
define("ROOM_RES_PERSON_COE", "RojjjjjerDXW");
define("ROOM_RES_EMAIL_COE", "temp@email.flacid");
define("ROOM_RES_PERSON_LSA", "AlicccccceDXW");
define("ROOM_RES_EMAIL_LSA", "temp2@email.flacid");
?>
<!DOCTYPE html>
<html lang="en">
<head>

	<title>Code-M</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
	<link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.7/css/materialize.min.css" media="screen,projection">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css"/>
	<link href="main.css" type="text/css" rel="stylesheet" media="screen,projection"/>
	<link rel="shortcut icon" href="static/img/logo_m.ico" type="image/x-icon">
	<meta name="viewport" content="width=device-width, initial-scale=1.0 maximum-scale=1.0"/>

</head>

<body>


	<nav class="white" role="navigation">
		<div class="nav-wrapper container">
			<a id="logo-container" href="index.html" class="brand-logo"><img src="static/img/logo_small.png" height="29" width="150"></a>
			<ul class="right hide-on-med-and-down">
				<li class="active"><a href="index.html">Home</a></li>
				<li><a href="calendar.html">Calendar</a></li>
				<li><a href="companies.html">Companies</a></li>
				<li><a href="contact.html">Contact</a></li>

			</ul>

			<ul id="nav-mobile" class="side-nav">
				<li class="active"><a href="index.html">Home</a></li>
				<li><a href="calendar.html">Calendar</a></li>
				<li><a href="companies.html">Companies</a></li>
				<li><a href="contact.html">Contact</a></li>
			</ul>
			<a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
		</div>
	</nav>

	<?php
		if (isset($_POST['hostEmail']))
			handlePost();
	?>
	<?php 
		$today = strtotime(date('Y-m-d')); 
		$dateStr = strtotime('+2 weeks', $today);
		$date = date('Y-m-d', $dateStr);
	?>
	<form method="post">
		<span class="sH1">Name of Event: </span><input type="text" name="eventName" placeholder="Intro to HTML Workshop" required/>
		<h1>Date and Time</h1>
		<span class="sH1">Date of Event: </span><input type="date" name="eventDate" min="<?php echo  $date ?>" required/>
		<span class="sH1">Time interval you are available to host the event: </span><br>
		<span class="sH2">Start Time</span><input type="time" name="startTime" required>
		<span class="sH2">End Time</span><input type="time" name="endTime" required>
		<span class="sH2">Preffered Start Time</span><input type="time" name="prefStartTime" required>
		<span class="sH2">Duration of Event (hours)</span><input type="number" name="eventDuration" step=".25" min=".25" max="100" required>
		* Example: I am availble to host this workshop from 5pm-10pm on this day. However, I would like the event to start at 6pm and go to 8pm. 
		Therefore my Start Time = 5pm, End Time = 10pm, Preffered Start Time = 6pm, Duration of Event = 2
		<h1>Location</h1>
		<span class="sH1">Is a room already reserved?</span>
			<p><input type="radio" id="roomIsReserved" name="isReserved" value="yes" checked onchange="allowInput('roomReservationDetails')"><label for="roomIsReserved">Yes</label></p>
			<p><input type="radio" id="roomNotReserved" name="isReserved" value="no" onchange="allowInput('roomReservationDetails')"><label for="roomNotReserved">No</label></p>
		<div id="roomReservationDetails">
			<span class="sH1">Campus:</span>
				<p><input type="radio" id="northRad" name="campus" value="North" checked disabled/><label for="northRad">North</label></p>
				<p><input type="radio" id="centRad" name="campus" value="Central" disabled/><label for="centRad">Central</label></p>

			<div class="input-field">
				<span class="sH1">Building Preference:</span>
				<input type="text" name="building" placeholder="DOW" disabled/>
			</div>
			<div class="input-field">
				<span class="sH1">Room Preference:</span>
				<input type="text" name="roomPref" placeholder="Shaquisha" disabled/>
			</div>
			<div class="input-field">
				<span class="sH1">Room Size:</span>
				<select name="roomSize" disabled>
					<option value="none">None</option>
					<option value="large">Large</option>
					<option value="medium">Medium</option>
					<option value="small">Small</option>
				</select>
			</div>
			
		</div>
		<h1>Event Description</h1>
		<span class="sH1">1-2 Sentence description: </span><input type="text" name="desc" required>
		<span class="sH1">Full Description: </span><textarea name="fullDesc" rows="5" required></textarea>
		* Make sure to include details such as will students need to have software installed, 
		prior knowledge required, maybe even an agenda of the event.
		Format:
		Broad overview / goals of the event (like you are selling the event),
		What is the agenda (we will do this, then this, then this)
		What should attendees of the event know before coming to workshop?
		What should attendees bring to the workshop?
		What should attendees have installed?
		
		<div class="input-field">
			<span class="sH1">Type of Event:</span> 
			<select name="eventType" required>
				<option value="Workshop">Workshop</option>
				<option value="Tech Talk">Tech Talk</option>
				<option value="Social Event">Social Event</option>
				<option value="Other">Other</option>
			</select>
		</div>
		<h1>Host</h1>
		<span class="sH1">Host Email: </span><input type="text" name="hostEmail" placeholder="you@umich.edu" required>
		<span class="sH1">Cohost Email: </span><input type="text" name="cohostEmail" placeholder="indyJ@umich.edu">
		<span class="sH1">Submission Password: </span><input type="password" name="password" required>
		<input type="submit">
		* This data will be sent to room reservations and social media. Make sure your data is correct and typo free.
	</form>



<style>
	span{ font-size: 1.3em; }
</style>

<!--  Scripts-->
<!--Import jQuery before materialize.js-->
<script type="text/javascript" src="static/js/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.7/js/materialize.min.js"></script>
<script src="main.js"></script>
<script>
	// Toggles between if room reservation details input can be selected
	function allowInput(id)
	{
		var isRoomReserved = $('#roomIsReserved').prop('checked');
		var setBool = true;
		if (isRoomReserved == false)
			setBool = false;
		$('#' + id + ' input').each(function(){
			$(this).prop('disabled', setBool);
		});
		$('#' + id + ' select').each(function(){
			$(this).prop('disabled', setBool);
		});
		$('select').material_select(); // needed to update materialize selects ugh
	}
	$(document).ready(function() {
		$('select').material_select(); //needed for materialize to show selects
	});
</script>
</body>
</html>


<?php
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
			"eventType" => $_POST['eventType']
		);
		/*
		$eventName = trim($_POST['eventName']);
		$dateOfEvent = trim($_POST['eventDate']);
		$possibleStartTime = $_POST['startTime'];
		$possibleEndTime = $_POST['endTime'];
		$prefStartTime = $_POST['eventStartTime'];
		$eventDuration = $_POST['eventDuration'];
		$campus = $_POST['campus'];
		$roomPreference = trim($_POST['roomPref']);
		$shortDesc = trim($_POST['desc']);
		$fullDesc = trim($_POST['fullDesc']);
		$eventType = $_POST['eventType'];
		$hostEmail = trim($_POST['hostEmail']);
		$cohostEmail = trim($_POST['cohostEmail']);
		*/

		// Sanitize input
		//foreach ($data as $key => $value)
			//$data[$key] = filter_var($value, FILTER_SANITIZE_???);
		

		echo "<h1>Success!</h1><br><h5>Thanks for your existence</h5>";

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

			// Default send to COE
			$person = ROOM_RES_PERSON_COE;
			$recipientEmail = ROOM_RES_EMAIL_COE;

			/*dont email lsa since idk if thats how it works for central
			if ($data['campus'] == "central")
			{
				$person = ROOM_RES_PERSON_LSA;
				$recipientEmail = ROOM_RES_EMAIL_COE;
			} 
			*/

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
		$senderEmail = "code-m-board@umich.edu";
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
		if ($arr['campus'])
		{
			$message .= "Campus: " . $arr['campus'] . "\r\n";
			$message .= "Building: " . $arr['building'] . "\r\n";
			$message .= "Room Preference: " . $arr['room'] . "\r\n";
			$message .= "Room Size " . $arr['roomSize'] . "\r\n";
		}
		else $message .= "Room Already Reserved\r\n";
		$message .= "Short Description: " . $arr['shortDesc'] . "\r\n";
		$message .= "Full Description: " . $arr['fullDesc'] . "\r\n";
		$message .= "Event Type: " . $arr['eventType'] . "\r\n";
		$message .= "\r\nCode-M";
		
		$message = wordwrap($message, 85);

		$senderEmail = "code-m-board@umich.edu";
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