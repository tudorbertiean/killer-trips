<?php
    session_start();
    include("../php/Cities.php");
    foreach ($_POST['attractionNames'] as $value) {
        // Do something with each valid friend entry ...
        if ($value) {
            echo $value."<br />";
        }
    }
    //Comments::postComment($_POST["comment"], $_GET["userid"], $_GET["cityid"]);                     
    // Go back to previous page
    //header("Location: {$_SERVER['HTTP_REFERER']}");
    //exit;
?>