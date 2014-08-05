<?php
    # Defines all information for members
    #
    #

    include('../parse/parse.php');
    include('../twig.php');
    include('../config.php');

    # Comment out for testing
    $_SESSION['type'] = 'Member';
    $_SESSION['USER_UNIQ'] = 'stepa';


    # Check if logged in
    if (!isset($_SESSION['type']))
    { 
        # Redirect home
        header("Location: {$siteurl}");
    }

    # Is logged in 
    else if ($_SESSION['type'] == "NotLoggedIn")
    {
        # Redirect home
        header("Location: {$siteurl}");
    }

    else{
        $event_id = $_POST['event'];
        $text = trim($_POST['names']);
        $text = explode ("\n", $text);

        # Get the event
        $parse = new ParseQuery('Event');
        $parse->whereEqualTo('objectId', $event_id);
        $events = $parse->find();
        $event = $events->results[0];

        foreach ($text as $uniqname) {

            # Get the member
            $parse = new ParseQuery('People');
            $parse->whereEqualTo('uniqname', $uniqname);
            $members = $parse->find();
            if(!empty($members->results)){
                $member = $members->results[0];

                # Update member hours
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

                # Create object showing attendance
                $object = new ParseObject('EventAttendance');
                $object->person = $member->objectId;
                $object->event = $event->objectId;
                $object->save();  
            } 
        }
        $parse = new ParseQuery('Event');
        $events = $parse->find();
        echo $twig->render('admin_page.phtml', array('events' => $events->results));

    }
?>
