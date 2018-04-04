<?php
    // Intermediatery function to add a rating of a city to database 
    session_start();
    include("../php/Votes.php");
    Votes::postVote($_GET["userid"], $_GET["cityid"], $_GET["score"]);                     
    // Go back to previous page
    header("Location: {$_SERVER['HTTP_REFERER']}");
    exit;
?>