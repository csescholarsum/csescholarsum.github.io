

  <?php 
		define("CURRENT_PAGE", "Members");
		define("JUMP", "../"); #hacky
		include '../includes/header.php';
		include '../includes/sql.php';
		$user = $_SERVER['REMOTE_USER'];
		$points = getMemberPoints($user);
	?>

	<?php //Confirmation message
	
		if (isset($_POST['eventCode']))
		{
			$pass = $_POST['eventCode'];
			$eventid = $_POST['eventid'];
			$success = validateAttendance($user, $pass, $eventid);
			$message = 'Incorrect event code';
			if ($success == True)
				$message = 'Your attendance has been recorded';
			echo "<div class='valign-wrapper fill'><h3 class='center-block valign'>$message</h3></div>";
			include '../includes/footer.php'
			exit();
		}
	
	?>

	<div id="status" class="right-align">
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
							<button class="btn waves-effect waves-light blue" type="submit">Submit
							<i class="material-icons right">send</i>
							</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	<?php } ?> <!-- end loop displaying events -->
	
	
  
  <?php include '../includes/footer.php' ?>

