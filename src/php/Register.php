<?php
    include("../php/Authenticate.php");
    if(Authenticate::register($_POST["strUsername"], $_POST["strPassword"])){
        header("location: http://localhost:8080/killer-trips/src/views/homepage.php");
    }
    else{
        $_SESSION['loggedin'] = false;
        header("Location: {$_SERVER['HTTP_REFERER']}");
    }
?>