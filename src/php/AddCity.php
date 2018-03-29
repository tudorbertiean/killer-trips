<?php
    session_start();
    include("../php/Cities.php");
    Cities::addCity($_POST["cityName"], $_POST["countryName"], $_POST["cityDescription"], $_POST["attractionNames"], $_POST["attractionDesc"], $_POST["killerNames"], $_POST["killerDesc"], $_SESSION["userid"]);                     
?>