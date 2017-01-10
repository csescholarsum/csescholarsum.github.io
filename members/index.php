

  <?php 
		define("CURRENT_PAGE", "Members");
		define("JUMP", "../"); #hacky
		include '../includes/header.php';
		include '../includes/sql.php';
		$user = $_SERVER['REMOTE_USER'];
		$points = getMemberPoints($user);
	?>
<div class="right-align">
  	Hello <?php echo $_SERVER['REMOTE_USER']; ?><br>
		You have earned <b><?php echo $points; ?></b> points.
</div>
	
	<?php 
		$events = getCurrentEvents();
		foreach ($events as $ev) { 
	?> <!-- display all open events -->
		<div class="wrap-event">
			<h1 class="header center blue-text"><?php echo $ev['name']; ?></h1>
			<div class="row">
			<div class="col s12">
			<div class="input-field col s12">
			<form name="" method="post">
				<input type="hidden" name="eventid" value="<?php echo $ev['eventid']?>">
				<label for="eventCode">Event Code</label>
				<input type="text" name="eventCode" id="eventCode">
				<!-- <input type="submit"> -->
				<button class="btn waves-effect waves-light blue" type="submit">Submit
    <i class="material-icons right">send</i>
  </button>
			</form>
			</div>
			</div>
			</div>
		</div>
	<?php } ?> <!-- end loop displaying events -->
	
	<?php
	
		if (isset($_POST['eventCode']))
		{
			$pass = $_POST['eventCode'];
			$eventid = $_POST['eventid'];
			$success = validateAttendance($user, $pass, $eventid);
			if ($success == True)
				echo "<h1>Your attendance has been recorded</h1>";
			else echo "<h1>Incorrect event code</h1>";
		}
	
	?>
  
  <?php include '../includes/footer.php' ?>

