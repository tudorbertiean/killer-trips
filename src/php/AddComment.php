<?php
    // Intermediatery function to add a comment to database 
    session_start();
    include("../php/Comments.php");
    Comments::postComment($_POST["comment"], $_GET["userid"], $_GET["cityid"]);                     
    // Go back to previous page
    header("Location: {$_SERVER['HTTP_REFERER']}");
    exit;
?>