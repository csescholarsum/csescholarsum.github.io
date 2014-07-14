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

        # Am logged in
        $parse = new ParseQuery('People');
        $parse->whereEqualTo('uniqname', $_SESSION['USER_UNIQ']);
        $member = $parse->find();

        $parse_obj = new ParseObject('People');

        # TODO: Error checking

        $parse_obj->name = $_POST['name'];
        $parse_obj->major = $_POST['major'];
        $parse_obj->gradMonth = intval($_POST['gradMonth']);
        $parse_obj->gradYear = intval($_POST['gradYear']);

        $parse_obj->update($member->results[0]->objectId);

        $parse = new ParseQuery('People');
        $parse->whereEqualTo('uniqname', $_SESSION['USER_UNIQ']);
        $member = $parse->find();

        echo $twig->render('member_info.phtml', array('member' => $member->results[0]));

    }
?>
