<?php
# Defines all information for members
#
#

include('../parse/parse.php');
include('../twig.php');

# Uncomment these for testing purposes
$_SESSION['type'] = 'Admin';
$_SESSION['USER_UNIQ'] = 'stepa';

# Check if logged in
if (!isset($_SESSION['type']))
{ 
    # Redirect home
    header("Location: https://web.eecs.umich.edu/~cseschol/index.php");
}

# Is admin
else if ($_SESSION['type'] == "Admin")
{
    $eventId = $_GET['event'];

    $parse = new ParseQuery('Event');
    $parse->whereEqualTo('objectId', $eventId);
    $event = $parse->find();


    echo $twig->render('event_logger.phtml', array('event' => $event->results[0]));
}

else{
    # Redirect home
    header("Location: https://web.eecs.umich.edu/~cseschol/index.php");
}
?>
