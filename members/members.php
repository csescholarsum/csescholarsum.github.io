

  <?php 
		define("CURRENT_PAGE", "Members");
		include '../includes/header.php';
		include '../includes/sql.php';
		$user = $_SERVER['REMOTE_USER'];
		$points = getMemberPoints($user);
	?>

  	Hello <?php echo $_SERVER['REMOTE_USER']; ?><br>
		You have earned <?php echo $points; ?> points.
	
	<?php 
		$events = getCurrentEvents();
		foreach ($events as $ev) { 
	?> <!-- display all open events -->
		<div class="wrap-event">
			<h1><?php echo $ev['name']; ?></h1>
			<form name="" method="post">
				<input type="hidden" name="eventid" value="<?php echo $ev['eventid']?>">
				Event Code: <input type="text" name="eventCode">
				<input type="submit">
			</form>
		</div>
	<?php } ?> <!-- end loop displaying events -->
	
	<?php
	
		if (isset($_POST['eventCode']))
		{
			$password = $_POST['eventCode'];
			$eventid = $_POST['eventid'];
			$success = validateAttendance($user, $password, $eventid);
			if ($success == True)
				echo "<h1>Your attendance has been recorded</h1>";
			else echo "<h1>Incorrect event code</h1>";
		}
	
	?>
  
  <?php include '../includes/footer.php' ?>

