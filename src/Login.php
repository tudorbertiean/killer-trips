<!DOCTYPE html>
<head> <title>PHP Script</title>
    <link rel="stylesheet" href="login.css">
</head>
<body >
<div id="header">
    <div id="left">
        <img src="logo.jpg" alt="logo" class="image">
    </div>
    <div id="login">
        <label class="loginLabel">User Login</label>
        <form method="post">
            <p>
                <label for ="strUsername" class = "inputLabel">Username: </label>
                <input type="text" name="strUsername" id="strUsername"></input></p>
            <p>
                <label for ="strPassword" class = "inputLabel">Password: </label>
                <input type="password" name="strPassword" id="strPassword"></input></p>
            <p> <input type ="submit" value = "Submit" name="submit"> </p>
            <label class="loginLabel">Register:
                <href>
                    <a href="register.php">New users click here to register</a>
                </href>
            </label>
        </form>
    </div>
    <div id="middle">
        <h1 id="title">Killer Trips</h1>
    </div>

</div>

<hr id="headerEnd" color="red" size="10">

<label class = "inputLabel">Cities to come .....</label>
<?php
include("Authenticate.php");

if(isset($_POST["strUsername"]) && isset($_POST["strPassword"])){
    if(Authenticate::testReg($_POST["strUsername"],$_POST["strPassword"])){
        echo '<h1 class = "inputLabel">Welcome Back '.$_POST["strUsername"].'!</h1>';
    }
    else{
        header("location: register.php");
    }
}
?>