<?php
include('twig.php');
echo $twig->render('index.phtml', array('login' => $_SESSION['type']));

?>

