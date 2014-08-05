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
        $parse = new ParseQuery('Event');
        $events = $parse->find();
        echo $twig->render('admin_page.phtml', array('events' => $events->results, 'login' => $_SESSION['type']));

    }
?>
