<?php define("CURRENT_PAGE", "Companies"); ?>
<!DOCTYPE html>
<html lang="en">
<head>

  <title>Code-M - <?php echo CURRENT_PAGE ?></title>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>


  <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.7/css/materialize.min.css" media="screen,projection">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css"/>
  <link href="static/css/main.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link rel="shortcut icon" href="static/img/logo_m.ico" type="image/x-icon">
  <meta name="viewport" content="width=device-width, initial-scale=1.0 maximum-scale=1.0"/>

</head>
<body>

  <?php include 'header.php' ?>

  <div id="index-banner" class="parallax-container">
    <div class="section no-pad-bot">
      <div class="container">
        <br><br>
        <h1 class="header center">Corporate Events</h1>
        <div class="row center">
          <p class="col s12 light desc">We would love to work with you! Interested in our sponsoring us? Download our packet below.
          </p>
        </div>
        <div class="row center">
          <a href="Code-M_Sponsorship_Oct_2016.pdf" target="_blank" id="download-button" class="btn-large waves-effect waves-light blue lighten-2">Sponsorship Package</a>
        </div>
        <br><br>

      </div>
    </div>
    <div class="parallax"><img src="static/img/header3.jpg" style="width: 100%; height: auto" alt="Unsplashed background img 1"></div>
  </div>


  <div class="container white">
    <div class="section">
      <h2 class="header center blue-text text-lighten-2">Current Sponsors</h2>

<br><br>
      <!--   Icon Section   -->
      <div class="row center">
        <div class="col s12 m3">
          <a href="https://www.palantir.com/" target="_blank"><img src="static/img/sponsors/palantir.png" class="responsive-img"></a>

        </div>

        <div class="col s12 m3">
          <a href="https://www.harris.com/" target="_blank"><img src="static/img/sponsors/harris.png" class="responsive-img"></a>
        </div>

        <div class="col s12 m3">
          <a href="http://www.nutanix.com/" target="_blank"><img src="static/img/sponsors/nutanix.png" class="responsive-img"></a>
        </div>

        <div class="col s12 m3">
          <a href="http://www.allstontrading.com/" target="_blank"><img src="static/img/sponsors/allston.jpeg" class="responsive-img"></a>
        </div>

      </div>

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
