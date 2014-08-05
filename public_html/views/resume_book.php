<?php 

include('../parse/parse.php');
include('../twig.php');

	
#This indexes through the db to print member info
$parse = new ParseQuery('People');
$parse->whereEqualTo('type', 'Member');
$members = $parse->find();

echo $twig->render('resume_book.phtml', array('members' => $members->results, 'login' => $_SESSION['type']));

?>



