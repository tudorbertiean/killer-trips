<?php
    session_start();
    include("../php/Votes.php");
    Votes::postVote($_GET["userid"], $_GET["cityid"], $_GET[]);                     
    // Go back to previous page
    header("Location: {$_SERVER['HTTP_REFERER']}");
    exit;
?>