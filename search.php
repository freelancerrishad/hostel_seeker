<?php

    include 'connection.inc.php';

    // declaring variables
    $search = "";

    // get form data
    if(isset($_POST['search'])) {

        $search = $_POST['search'];

    }

    if($search != "") { // if the field is not empty!

        // search for user!
        $searchUser = "SELECT * FROM hostel WHERE hostel_name = '$search' OR owner_username = '$search'";
        $searchUserStatus = mysqli_query($conn,$searchUser) or die(mysqli_error($conn));
        
        if(mysqli_num_rows($searchUserStatus) > 0) { // if there is an user!

            header('Location: search-results.php?message=Search results!');

        } else {

            header('Location: search-results.php?message=No user found!');

        }
        

    } else { // if the fields is empty!

        header('Location: chatuser.php?message=Please input something!');

    }

    $_SESSION['search'] = $search;
?>