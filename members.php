
<!DOCTYPE html>
<html lang="en">
<head>

  <title>Code-M</title>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>


  <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.7/css/materialize.min.css" media="screen,projection">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css"/>
  <link href="static/css/main.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link rel="shortcut icon" href="static/img/logo_m.ico" type="image/x-icon">
  <meta name="viewport" content="width=device-width, initial-scale=1.0 maximum-scale=1.0"/>

</head>
<body>

  <?php 
		include 'header.php';
		include 'sql.php';
		$user = $_SERVER['REMOTE_USER'];
		$points = getMemberPoints($user);
	?>

  	Hello <?php echo $_SERVER['REMOTE_USER']; ?><br>
		You have earned <?php echo $points; ?> points.
		
  
  <?php include 'footer.php' ?>

<!--  Scripts-->
<!--Import jQuery before materialize.js-->
<script type="text/javascript" src="static/js/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.7/js/materialize.min.js"></script>
<script src="main.js"></script>

</body>
</html>
