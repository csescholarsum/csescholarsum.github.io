<?php define("CURRENT_PAGE", "Join"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Code-M - <?php echo CURRENT_PAGE ?></title>

	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
	<meta name="viewport" content="width=device-width, initial-scale=1.0 maximum-scale=1.0"/>

	<link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.7/css/materialize.min.css" media="screen,projection">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css"/>
	<link href="static/css/main.css" type="text/css" rel="stylesheet" media="screen,projection"/>
	<link href="static/css/join.css" type="text/css" rel="stylesheet"/>
	<link rel="shortcut icon" href="static/img/logo_m.ico" type="image/x-icon">

</head>
<body>
	
	<?php include 'header.php' ?>

	<div class="container">
		<div class="section">
			<br><br><!-- sorry I know it's bad -->
			<h4 class="blue-text text-lighten-2">Become a Member</h4>
			<p class="light">If you want to join Code-M, just fill out our membership form. Then show up to events that sound like fun to you. It's that easy.
			Oh, and don't miss out on our bi-weekly meetings where our members come to play games, relax, and get to know each other.</p>
			<br>
			<div class="row center">
				<a href="http://eepurl.com/cfW9gz" target="_blank" id="download-button" class="btn-large waves-effect waves-light blue lighten-2">Join Now</a>
			</div>
			<br>
			<h4 class="blue-text text-lighten-2">Get More Involved</h4>
			<p class="light">If that still isn't enough for you, consider joining one of our committees. This is where you can get some good experience running a student org and being
			a part of the community. Just send us an email if you're interested.</p>
			<br>

			<h5 class="blue-text text-lighten-2">External Outreach</h5>
			<ul class="light">
				<li>Come up with ideas for workshops</li>
				<li>Organize and coordinate a workshop</li>
				<li>Get experience teaching / leading a workshop</li>
			</ul>
			<br>

			<h5 class="blue-text text-lighten-2">Code:Blue</h5>
			<ul class="light">
				<li>Help organize, plan, and run Code-M's take on Google I.O.</li>
				<li>Interact with and recruit companies</li>
				<li>Have a bit of Code Red mountain dew while discussing Code:Blue</li>
			</ul>
			<br>

			<h5 class="blue-text text-lighten-2">Finances</h5>
			<ul class="light">
				<li>Help get sponsorships from companies</li>
				<li>Assist with or manage financial transactions for the club</li>
				<li>Keep the lights on</li>
			</ul>
			<br>

			<h5 class="blue-text text-lighten-2">Media</h5>
			<h6>Social Media and Marketing</h6>
				<ul class="light">
				<li>Use your powers to let people know about our club and events</li>
				</ul>
			<h6>Graphic Design</h6>
				<ul class="light">
				<li>Create posters / flyers that are too good to throw away</li>
				<li>Create graphics for the web and social media that people can't look away from</li>
				</ul>
			<br>

			<h5 class="blue-text text-lighten-2">Web Management</h5>
				<ul class="light">
				<li>Work on the Code-M website (adding features, improving design, etc)</li>
				<li>Keep content up to date</li>
				<li>Smack the <a href='static/img/hackr.png' class="hiddenLink">ski-masks right off those hackers</a></li>
				</ul>
			<br>

			<h5 class="blue-text text-lighten-2">Social Events</h5>
			<ul class="light">
				<li>Plan fun events specifically for our members</li>
				<li>Finalize our Moon trip (finally putting that <a target="_blank" href='https://github.com/chrislgarry/Apollo-11'>Apollo 11 code</a> to good use)</li>
			<ul>

			<br>
			<hr>
			<br>
			Have your own idea for a committee? Let us know and we will see what we can do.
			We are currently looking for someone to take charge of our Social Events committee as well!
		</div>
	</div>

  <?php include 'footer.php' ?>

	<!--  Scripts-->
	<!--Import jQuery before materialize.js-->
	<script type="text/javascript" src="static/js/jquery.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.7/js/materialize.min.js"></script>
	<script src="main.js"></script>
</body>
</html>
