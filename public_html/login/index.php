<?php

//CREATED BY: jsallans
//DATE: 8-28-12
//CHANGE: new
//PURPOSE: the logged in user will give us the account type and uniqname

include('../includes/config.php');
include('../tools/functions.php');
include('../parse/parseQuery.php')
//include( $_SESSION['path'] . 'tools/functions.php');

//$_SERVER['REMOTE_USER'] is the users uniqname returned from cosign with .htaccess

$uniqname = $_SERVER['REMOTE_USER'];
$_SESSION['USER_UNIQ'] = $uniqname;

//_______________CHECK IF ADMIN________________________

// Query Parse for user
$parse = new parseQuery('People')
$parse->whereEqualTo('uniqname', $uniqname)
$member = $parse->find()

//Check if works
if (is_null($member)){
    $_SESSION['type'] = "NotLoggedIn"
}

else if ($member->Type) {

	$_SESSION['type'] = $member->Type;
}


//user is not authorized; redirect to main page
header("Location: https://web.eecs.umich.edu/~cseschol/index.php");
?>
