<?php
    session_start();
    unset($_SESSION['loggedin']);
    unset($_SESSION['username']);
    // Go back to previous page
    header("Location: {$_SERVER['HTTP_REFERER']}");
    exit;
?>