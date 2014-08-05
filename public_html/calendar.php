<?php
include('twig.php');
echo $twig->render('calendar.phtml', array('login' => $_SESSION['type']));
?>
