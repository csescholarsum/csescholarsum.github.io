<?php
    # Defines all information for members
    #
    #

    include('../parse/parse.php');
    include('../twig.php');

    # Comment out for testing
    $_SESSION['type'] = 'Member';
    $_SESSION['USER_UNIQ'] = 'stepa';


    # Check if logged in
    if (!isset($_SESSION['type']))
    { 
        # Redirect home
        header("Location: https://web.eecs.umich.edu/~cseschol/index.php");
    }

    # Is logged in 
    else if ($_SESSION['type'] == "NotLoggedIn")
    {
        # Redirect home
        header("Location: https://web.eecs.umich.edu/~cseschol/index.php");
    }

    else{
        $parse = new ParseQuery('Event');
        $events = $parse->find();
        echo $twig->render('admin_page.phtml', array('events' => $events->results, 'login' => $_SESSION['type']));

    }
?>
