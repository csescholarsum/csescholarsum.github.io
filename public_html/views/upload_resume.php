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

        # Am logged in
        //first you have to get a return from parse before associating with any objects
        $filename = $_FILES['file']['tmp_name'];
        $file = new parseFile('document/pdf', file_get_contents($filename));
        $fileReturn = $file->save($_FILES['file']['name']);

        //then you create your parseObject or 
        //update an existing object by using the update($objectId) method instead of save()
        $parse = new parseQuery('People');
        $parse->whereEqualTo('uniqname', $_SESSION['USER_UNIQ']);
        $member = $parse->find();

        $parse = new ParseObject('People');
        $parse->resume = $parse->dataType('file', array( $fileReturn->name ));
        $parse->update($member->results[0]->objectId);

        echo $twig->render('member_info.phtml', array('member' => $member->results[0]));

    }
?>
