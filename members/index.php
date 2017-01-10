

  <?php 
		$compliments = array("You look wonderful today", "You're cool",
"Your smile is contagious",
"You look great today",
"You're a smart cookie",
"I like your style",
"You have the best laugh",
"I appreciate you",
"Your perspective is refreshing",
"You're an awesome friend",
"You light up the room",
"You deserve a hug right now",
"You should be proud of yourself",
"You have a great sense of humor",
"You've got all the right moves",
"On a scale from 1 to 10, you're an 11",
"You are brave",
"Your eyes are breathtaking",
"You are making a difference",
"You're like sunshine on a rainy day",
"You bring out the best in other people",
"You're a great listener",
"I bet you sweat glitter",
"That color is perfect on you",
"Hanging out with you is always a blast",
"Being around you makes everything better",
"You're wonderful",
"Jokes are funnier when you tell them",
"Your hair looks stunning",
"You're one of a kind",
"You're inspiring",
"Our community is better because you're in it",
"You have the best ideas",
"You're a great example to others",
"You could survive a Zombie apocalypse",
"You're more fun than bubble wrap",
"Any team would be lucky to have you on it",
"I bet you do the crossword puzzle in ink",
"Babies and small animals probably love you",
"You're someone's reason to smile",
"You have a good head on your shoulders.",
"You're really something special",
"You're a gift to those around you"
);
			
		function randomCompliment()
		{
			global $compliments;
			$rKey = array_rand($compliments, 1);
			echo $compliments[$rKey];
		}
		
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
			include '../includes/footer.php';
			exit();
		}
	
	?>
	<div class="fill">
		
		<div id="status" class="right-align">
			<h5>Hello <?php echo $_SERVER['REMOTE_USER']; ?></h5>
			<?php randomCompliment(); ?> and<br>
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

	</div> <!-- end .fill -->	
  
  <?php include '../includes/footer.php' ?>

