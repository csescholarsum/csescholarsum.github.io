<?php
$servername = "localhost";
$username = "WINTER2017";
$password = "@Elephant5!";
$dbname = "csescholars";
$TABLE_NAME_ATTENDANCE = 'WINTER2017_attendance';
$TABLE_NAME_EVENTS = 'WINTER2017_events';
$TABLE_NAME_USER = 'WINTER2017_users';


function getConnection() {
		global $servername, $username, $password, $dbname;
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
  return $conn;
}

function killConnection($stmt, $conn) {
	$stmt->close();
	$conn->close();
}

// Inserts intial event data (no location or definite date/time)
function insertEvent($data)
{
	global $TABLE_NAME_EVENTS;
  $conn = getConnection();
 
  $stmt = $conn->prepare("INSERT INTO $TABLE_NAME_EVENTS (name, host, datetime, description, access, points) VALUES (?,?,?,?,?,?)");
  $stmt->bind_param("sssssd", $name, $host, $datetime, $description, $access, $points);
  
  // set parameters and execute
  $name = $data['eventName'];
  $host = $data['hostEmail'];
  $datetime = $data['dateOfEvent'] . ' - ' . $data['prefStartTime'];
  $description = $data['fullDesc'];
  $access = $data['password'];
  $points = $data['eventDuration'];
  
  killConnection($stmt, $conn);

}

// Returns the number of points a member has earned by attending events
function getMemberPoints($uniqname)
{
	global $TABLE_NAME_EVENTS, $TABLE_NAME_ATTENDANCE;
  $conn = getConnection();

  $stmt = $conn->prepare("SELECT event FROM $TABLE_NAME_ATTENDANCE WHERE uniqname=?");
  $stmt->bind_param("s", $uniqname);
  
  $stmt->execute();
  $stmt->bind_result($event);
  
  // Sum up the points
  $sum = 0;
  
  // loop through returned events$uniqname has attended
  while ($stmt->fetch()) { 
      // dont need to use prepared statement since getting result from table
      $result = $conn->query('SELECT points FROM $TABLE_NAME_EVENTS WHERE eventid=$event LIMIT 1');
      $row = $result->fetch_row();
      $sum += $row['points'];
  }
  killConnection($stmt, $conn);
  return $sum;
}

// Returns the number of points a member has earned by attending events
function validateAttendance($uniqname, $password, $eventID)
{
	global $TABLE_NAME_EVENTS, $TABLE_NAME_ATTENDANCE;
	
  $conn = getConnection();
  
  $stmt = $conn->prepare("SELECT access FROM $TABLE_NAME_EVENTS WHERE eventid=? AND open=1");
  $stmt->bind_param("i", $eventID);
  
  $stmt->execute();
  $stmt->bind_result($event);
  
  $access = $stmt->fetch();
  killConnection($stmt, $conn);
  
  if($access === $password){
    $conn = getConnection();
    $stmt = $conn->prepare("INSERT INTO $TABLE_NAME_ATTENDANCE (uniqname,event) VALUES (?,?)");
    $stmt->bind_param("si", $uniqname, $eventID);
    $stmt->execute();
    killConnection($stmt, $conn);
    return True;
  }else{
    return False;
  }  
}

function checkUser($uniqname)
{
	global $TABLE_NAME_USER;
	
  $conn = getConnection();
  $stmt = $conn->prepare("SELECT access FROM $TABLE_NAME_USER WHERE uniqname=? LIMIT 1");
  $stmt->bind_param("s", $uniqname);
  $stmt->execute();
  $stmt->bind_result($uniqname);
  $auth = $stmt->fetch_row();
  killConnection($stmt, $conn);
  
  if(!$auth["uniqname"]){
      $conn = getConnection();
      $stmt = $conn->prepare("INSERT INTO $TABLE_NAME_USER (uniqname,event) VALUES (?,?)");
      $stmt->bind_param("s", $uniqname);
      $stmt->execute();
      killConnection($stmt, $conn);
      return False;
  }else{
      return $auth["access"];
  }

}

function getCurrentEvents()
{
	global $TABLE_NAME_EVENTS;
	
  $conn = getConnection();
  $stmt = $conn->prepare("SELECT eventID, name, access FROM $TABLE_NAME_EVENTS WHERE open=1");
  $stmt->execute();
	// create an associate array of the resuts
  $row = bind_result_array($stmt);
	if(!$stmt->error)
	{
			while($stmt->fetch())
					$events[$row[0]] = getCopy($row);
	}
  killConnection($stmt, $conn);
  return $events;
}

function allCurrentEvents()
{
	global $TABLE_NAME_EVENTS;
	
  $conn = getConnection();
  $stmt = $conn->prepare("SELECT eventID, name, access FROM $TABLE_NAME_EVENTS");
  $stmt->bind_param("b", False);
  $stmt->execute();
  $stmt->bind_result($uniqname);
  $events = $stmt->fetch_all();
  killConnection($stmt, $conn);
  return $events;
}

function toggleEvent($eventID)
{
	global $TABLE_NAME_EVENTS;
	
  $conn = getConnection();
  $stmt = $conn->prepare("SELECT eventID,closed FROM $TABLE_NAME_EVENTS LIMIT 1");
  $stmt->bind_param("b", False);
  $stmt->execute();
  $stmt->bind_result($uniqname);
  $row = $stmt->fetch_row();
  $state = !$row["closed"];
  killConnection($stmt, $conn);
  $conn = getConnection();
  $stmt = $conn->prepare("UPDATE $TABLE_NAME_EVENTS SET closed=? WHERE EventId=?;");
  $stmt->bind_param("bi", $state, $eventID);
  $stmt->execute();  
  killConnection($stmt, $conn); 
}

// ####################
// Creating an assoicate array from prepared statements
// src = https://gunjanpatidar.wordpress.com/2010/10/03/bind_result-to-array-with-mysqli-prepared-statements/
function bind_result_array($stmt)
{
    $meta = $stmt->result_metadata();
    $result = array();
    while ($field = $meta->fetch_field())
    {
        $result[$field->name] = NULL;
        $params[] = &$result[$field->name];
    }

    call_user_func_array(array($stmt, 'bind_result'), $params);
    return $result;
}

/**
 * Returns a copy of an array of references
 */
function getCopy($row)
{
    return array_map(create_function('$a', 'return $a;'), $row);
}


?>