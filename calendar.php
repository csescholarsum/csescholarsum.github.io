<?php define("CURRENT_PAGE", "Calendar"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Code-M - Calendar</title>
  
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0 maximum-scale=1.0"/>

  <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.7/css/materialize.min.css" media="screen,projection">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css"/>
  <link href="static/css/main.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link rel="shortcut icon" href="static/img/logo_m.ico" type="image/x-icon">

</head>
<body>
  
  <?php include 'includes/header.php' ?>

  <div class="container">
    <div class="section center">
      <h2 class="header center blue-text text-lighten-2">Calendar</h2>

      <div class="responsive-iframe-container big-container">
        <iframe src="https://calendar.google.com/calendar/embed?showTitle=0&amp;showPrint=0&amp;showCalendars=0&amp;height=600&amp;wkst=1&amp;bgcolor=%23FFFFFF&amp;src=csescholarsum%40gmail.com&amp;color=%232952A3&amp;ctz=America%2FNew_York" style="border-width:0" width="800" height="600" frameborder="0" scrolling="no"></iframe>
      </div>
      <div class="responsive-iframe-container small-container">
        <iframe src="https://calendar.google.com/calendar/embed?showTitle=0&amp;showPrint=0&amp;showTabs=0&amp;mode=AGENDA&amp;showCalendars=0&amp;height=600&amp;wkst=1&amp;bgcolor=%23FFFFFF&amp;src=csescholarsum%40gmail.com&amp;color=%232952A3&amp;ctz=America%2FNew_York" style="border-width:0" width="800" height="600" frameborder="0" scrolling="no"></iframe>
      </div>


    </div>
  </div>

  <?php include 'includes/footer.php' ?>

  <!--  Scripts-->
  <!--Import jQuery before materialize.js-->
  <script type="text/javascript" src="static/js/jquery.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.7/js/materialize.min.js"></script>
  <script src="main.js"></script>

</body>
</html>
