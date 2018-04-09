<?php
    // Intermediatery function to register user,
    // if success, redirect to homepage, if unsuccessful,
    // redirect back to register page
    include("../php/Authenticate.php");
    if(Authenticate::register($_POST["strUsername"], $_POST["strPassword"])){
        header("location: src/views/homepage.php");
    }
    else{
        $_SESSION['loggedin'] = false;
        header("Location: {$_SERVER['HTTP_REFERER']}");
    }
?>