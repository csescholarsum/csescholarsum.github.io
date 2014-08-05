<?php
    include('twig.php');
    echo $twig->render('officers.phtml', array('login' => $_SESSION['type']));
?>
