<?php 
$nav = array(
  "index.php" => "Home",
  "join.php" => "Join",
  "calendar.php" => "Calendar",
  "companies.php" => "Companies",
  "contact.php" => "Contact"
);

if (!defined('JUMP'))
  define("JUMP", '');

?>
<!DOCTYPE html>
<html lang="en">

<head>

  <title>Code-M - <?php echo CURRENT_PAGE ?></title>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>


  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.7/css/materialize.min.css" media="screen,projection">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css"/>
  <link href="<?php echo JUMP; ?>static/css/main.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link rel="shortcut icon" href="static/img/logo_m.ico" type="image/x-icon">
  <meta name="viewport" content="width=device-width, initial-scale=1.0 maximum-scale=1.0"/>

</head>
<body>

<nav class="white" role="navigation">
    <div class="nav-wrapper container">
      <a id="logo-container" href="index.php" class="brand-logo"><img src="<?php echo JUMP; ?>static/img/logo_small.png" height="29" width="150"></a>
      <ul class="right hide-on-med-and-down">
        <?php foreach($nav as $link => $title) { ?>
        <li class='<?php if ($title == CURRENT_PAGE) echo "active"; ?>'><a href='<?php echo JUMP .$link;?>'><?php echo $title ?></a></li>
        <?php } ?>
      </ul>

      <ul id="nav-mobile" class="side-nav">
        <?php foreach($nav as $link => $title) { ?>
        <li class='<?php if ($title == CURRENT_PAGE) echo "active"; ?>'><a href='<?php echo JUMP . $link;?>'><?php echo $title ?></a></li>
        <?php } ?>
      </ul>
      <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
    </div>
  </nav>