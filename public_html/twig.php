<?php
define('ROOTPATH', __DIR__);

require_once 'Twig/lib/Twig/Autoloader.php';
Twig_Autoloader::register();

$loader = new Twig_Loader_Filesystem(ROOTPATH.'/templates');
$twig = new Twig_Environment($loader, array(
));
?>
