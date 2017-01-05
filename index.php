<?php define("CURRENT_PAGE", "Home"); ?>
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

  <?php include 'includes/header.php' ?>
  
  <div id="index-banner" class="parallax-container">
    <div class="section no-pad-bot">
      <div class="container">
        <br><br>
        <h1 class="header center">Code-M</h1>
        <div class="row center">
          <p class="col s12 light desc">Formerly known as CSE Scholars, Code-M is one of the computer science clubs on campus. Network with companies, learn different skills, ship code and have fun with us! Sound fun? Sign up for our email list below.
          </p>
        </div>
        <div class="row center">
          <a href="http://eepurl.com/cfW9gz" target="_blank" id="download-button" class="btn-large waves-effect waves-light blue lighten-2">Join Now</a>
        </div>
        <br><br>

      </div>
    </div>
    <div class="parallax"><img src="static/img/header_orig.jpg" alt="Unsplashed background img 1"></div>
  </div>


  <div class="container">
    <div class="section">
      <h2 class="header center blue-text text-lighten-2">What we do</h2>

      <!--   Icon Section   -->
      <div class="row">
        <div class="col s12 m3">
          <div class="icon-block">
            <h2 class="center blue-text"><i class="fa fa-connectdevelop"></i></h2>
            <h5 class="center">Corporate Events</h5>

            <p class="light center">We have tons of tech talks and workshops from various companies. Come network with recruiters and learn new things from industry leaders.</p>
          </div>
        </div>

        <div class="col s12 m3">
          <div class="icon-block">
            <h2 class="center blue-text"><i class="fa fa-terminal"></i></h2>
            <h5 class="center">Workshops &amp; Project Teams</h5>

            <p class="light center">Learn new skills in a stress-free environment. Join a project team and work on open-source projects while making new friends.</p>
          </div>
        </div>

        <div class="col s12 m3">
          <div class="icon-block">
            <h2 class="center blue-text"><i class="fa fa-users"></i></h2>
            <h5 class="center">Social Events</h5>

            <p class="light center">Kick back and relax with us! We have tons of fun social events like game nights, movie nights and ice skating!</p>
          </div>
        </div>

        <div class="col s12 m3">
          <div class="icon-block">
            <h2 class="center blue-text"><i class="fa fa-code"></i></h2>
            <h5 class="center">Code:Blue</h5>

            <p class="light center">A day long tech event that lies somewhere between a TED talk and a developer confrence. Join us as we host companies and experienced professionals give talks about what they do best.</p>
          </div>
        </div>

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
