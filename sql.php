<?php
$servername = "localhost";
$username = "WINTER2017";
$password = "@Elephant5!";
$dbname = "csescholars";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// prepare and bind
$stmt = $conn->prepare("INSERT INTO MyGuests (firstname, lastname, email) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $firstname, $lastname, $email);

// set parameters and execute
$firstname = "John";
$lastname = "Doe";
$email = "john@example.com";
$stmt->execute();

$firstname = "Mary";
$lastname = "Moe";
$email = "mary@example.com";
$stmt->execute();

$firstname = "Julie";
$lastname = "Dooley";
$email = "julie@example.com";
$stmt->execute();

echo "New records created successfully";

$stmt->close();
$conn->close();

// Inserts intial event data (no location or definite date/time)
function insertEvent($data)
{
  $eventTableName = 'WINTER2017_events';
  // Check connection
  if ($conn->connect_error)
      die("Connection failed: " . $conn->connect_error);
  
  // prepare and bind
  $stmt = $conn->prepare("INSERT INTO $eventTableName (name, host, datetime, description, access, points) VALUES (?,?,?,?,?,?)");
  $stmt->bind_param("sssssd", $name, $host, $datetime, $description, $access, $points);
  
  // set parameters and execute
  $name = $data['eventName'];
  $host = $data['hostEmail'];
  $datetime = $data['dateOfEvent'] + ' - ' + $data['prefStartTime'];
  $description = $data['fullDesc'];
  $access = $data['password'];
  $points = $data['eventDuration'];
  $stmt->execute();
  
  $stmt->close();
}

// Returns the number of points a member has earned by attending events
function getMemberPoints($uniqname)
{
  $TABLE_NAME_ATTENDANCE = 'WINTER2017_attendance';
  $TABLE_NAME_EVENTS = 'WINTER2017_events';
  // Check connection
  if ($conn->connect_error)
      die("Connection failed: " . $conn->connect_error);
  
  // prepare and bind
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
  return $sum;
}
?>