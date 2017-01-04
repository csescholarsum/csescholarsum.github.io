<?php 
$nav = array(
  "index.php" => "Home",
  "join.php" => "Join",
  "calendar.php" => "Calendar",
  "companies.php" => "Companies",
  "contact.php" => "Contact"
);
?>

<nav class="white" role="navigation">
    <div class="nav-wrapper container">
      <a id="logo-container" href="index.html" class="brand-logo"><img src="static/img/logo_small.png" height="29" width="150"></a>
      <ul class="right hide-on-med-and-down">
        <?php foreach($nav as $link => $title) { ?>
        <li class='<?php if ($title == CURRENT_PAGE) echo "active"; ?>'><a href='<?php echo $link;?>'><?php echo $title ?></a></li>
        <?php } ?>
      </ul>

      <ul id="nav-mobile" class="side-nav">
        <?php foreach($nav as $link => $title) { ?>
        <li class='<?php if ($title == CURRENT_PAGE) echo "active"; ?>'><a href='<?php echo $link;?>'><?php echo $title ?></a></li>
        <?php } ?>
      </ul>
      <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
    </div>
  </nav>