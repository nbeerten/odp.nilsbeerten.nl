<?php
    // Import Classes
    require_once $_SERVER['DOCUMENT_ROOT'].'/class/error.php'; // For error handling
    require_once $_SERVER['DOCUMENT_ROOT'].'/class/filter.php'; // For general filtering
    require_once $_SERVER['DOCUMENT_ROOT'].'/class/disgd.php'; // Discord API communication
    require_once $_SERVER['DOCUMENT_ROOT'].'/class/userflags.php'; // For "decoding" the user flags

    //* Create instances
    $error = new errorhandler; //* Error handling
    $filter = new filter; //* Key and input validation
    $disgd = new disgd; //* Discord API connection
    $userflags = new userflags; //* "Decoding" user flags
    
    try {
        //* Get url query for and validate
        $id = $filter->userid($_GET['id']);

        //* Get the data
        $disgd_user = $disgd->get_users($id);

        //* "Decoding" user flags
        $output_userflags = $userflags->get_html($disgd_user['public_flags']);

        // Output the profile page
        require $_SERVER['DOCUMENT_ROOT'].'/content/profile.php';
    } catch (Error $e) {
        $catched_error = $error->exception($e);

        // Output the profile page
        require $_SERVER['DOCUMENT_ROOT'].'/content/input.php';
    }
?>