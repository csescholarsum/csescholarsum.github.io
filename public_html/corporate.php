<?php
include('twig.php');
echo $twig->render('corporate.phtml', array('login' => $_SESSION['type']));
?>
