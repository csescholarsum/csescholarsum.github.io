<?php
# Defines all information for members
#
#

include('../parse/parse.php');
include('../twig.php');
include('../config.php');

# Uncomment these for testing purposes
$_SESSION['type'] = 'Admin';
$_SESSION['USER_UNIQ'] = 'stepa';

# Check if logged in
if (!isset($_SESSION['type']))
{ 
    # Redirect home
    header("Location: {$siteurl}");
}

# Is admin
else if ($_SESSION['type'] == "Admin")
{
    # Grab information about the event
    $eventId = $_POST['event'];

    $parse = new ParseQuery('Event');
    $parse->whereEqualTo('objectId', $eventId);
    $events = $parse->find();
    $event = $events->results[0];


    # Check for member existance
    $parse = new ParseQuery('People');
    $parse->whereEqualTo('uniqname', $_POST['uniqname']);
    $people = $parse->find();
    $person = $people->results;


    if(empty($person)){
        # Create new member
        echo print_r($person);
        $parse = new ParseObject('People');
        $parse->uniqname = $_POST['uniqname'];
        $parse->type = "Prospective";
        $objectId = $parse->save();

        # Requery
        $parse = new ParseQuery('People');
        $parse->whereEqualTo('uniqname', $_POST['uniqname']);
        $people = $parse->find();
        $person = $people->results;
    }

    $member = $person[0];

    # Check if already signed in
    $parse = new ParseQuery('EventAttendance');
    $parse->whereEqualTo('event', $event->objectId);
    $parse->whereEqualTo('person', $member->objectId);
    $attendance = $parse->find()

    if(empty($attendance->results)){

        # Update hours
        $object = new ParseObject('People');
        if($event->type == 'corporate' or $event->type == 'Corporate'){
    
            $object->corporate = $member->corporate + $event->value;             
        }
        if($event->type == 'social' or $event->type == 'Social'){
    
            $object->social = $member->social + $event->value;             
        }       
        if($event->type == 'service' or $event->type == 'Service'){
    
            $object->service = $member->service + $event->value;             
        }
        $object->update($member->objectId);

        # Build EventAttendance
        $object = new ParseObject('EventAttendance');
        $object->person = $member->objectId;
        $object->event = $event->objectId;
        $object->save();  

    }

    echo $twig->render('event_logger.phtml', array('event' => $event));


}

else{
    # Redirect home
    header("Location: {$siteurl}");
}
?>
