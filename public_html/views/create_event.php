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
        header("Location: https://web.eecs.umich.edu/~cseschol/index.php");
    }

    else{

        # Am logged in
        $parse_obj = new ParseObject('Event');

        # TODO: Error checking

        $parse_obj->name = $_POST['name'];
        $parse_obj->value = intval($_POST['value']);
        $parse_obj->date = $_POST['date'];
        $parse_obj->type = $_POST['type'];

        $parse_obj->save();

        echo $twig->render('admin_page.phtml');

    }
?>
