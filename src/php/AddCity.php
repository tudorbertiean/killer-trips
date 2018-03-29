<?php
    session_start();
    include("../php/Cities.php");
    // foreach ($_POST['attractionNames'] as $value) {
    //     // Do something with each valid friend entry ...
    //     if ($value) {
    //         echo $value."<br />";
    //     }
    // }
    Cities::addCity($_POST["cityName"], $_POST["countryName"], $_POST["cityDescription"], $_POST["attractionNames"], $_POST["attractionDesc"], $_POST["killerNames"], $_POST["killerDesc"], $_SESSION["userid"]);                     
    // Go back to previous page
    //header("Location: {$_SERVER['HTTP_REFERER']}");
    //exit;
?>