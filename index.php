<?php
    // Import Classes
    require_once $_SERVER['DOCUMENT_ROOT'].'/class/error.php'; // For error handling
    require_once $_SERVER['DOCUMENT_ROOT'].'/class/filter.php'; // For general filtering
    require_once $_SERVER['DOCUMENT_ROOT'].'/class/disgd.php'; // Discord API communication
    require_once $_SERVER['DOCUMENT_ROOT'].'/class/BitwiseHandler.php'; // For "decoding" the user flags

    //* Create instances
    $error = new errorhandler; //* Error handling
    $filter = new filter; //* Key and input validation
    $disgd = new disgd; //* Discord API connection
    $bitwisehandler = new BitwiseHandler; //* "Decoding" user flags
    
    try {
        //* Get url query for and validate
        $id = $filter->userid($_GET['id']);

        //* Get the data
        $disgd_user = $disgd->get_users($id);

        //* "Decoding" user flags
        $userflags = $bitwisehandler->get($disgd_user['public_flags']);

        //* Ready to output
        $status = 1;
        require $_SERVER['DOCUMENT_ROOT'].'/content/profile.php'; //* Output the profile page
    } catch (Error $e) {
        $catched_error = $error->exception($e);
        echo $catched_error;

        //* Not ready to output
        $status = 0;
    }
?>