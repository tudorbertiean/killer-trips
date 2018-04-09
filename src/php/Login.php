<?php
    // Intermediatery function to login user,
    // if success, redirect to homepage, if unsuccessful,
    // redirect back to login page
    include("../php/Authenticate.php");
    if(Authenticate::login($_POST["strUsername"], $_POST["strPassword"])){
        //header("location: /killer-trips/src/views/homepage.php");
    }
    else{
        $_SESSION['loggedin'] = false;
        //header("Location: {$_SERVER['HTTP_REFERER']}");
    }
?>