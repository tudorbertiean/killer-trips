<!DOCTYPE html>
<head> <title>Register</title>
<link rel="stylesheet" href="../css/login.css">
</head>
<body>
<div id="header">ß
    <div id="left">
        <img src="../images/logo.jpg" alt="logo" class="image">
    </div>
    <div id="right">
        <img src="../images/logo.jpg" alt="logo" class="image">
    </div>
    <div id="middle">
        <h1 id="title">Killer Trips</h1>
    </div>

</div>

<hr color="red" size="10" id="headerEnd">


<div>
		<label class="loginLabel">User Login</label>
		<form method="post">
		<p>
		<label for ="strUsername" class = "inputLabel">Username: </label>
		<input type="text" name="strUsername" id="strUsername"></input></p>
		<p>
		<label for ="strPassword" class = "inputLabel">Password: </label>
		<input type="password" name="strPassword" id="strPassword"></input></p>
		<p>
		<label for ="strEmail" class = "inputLabel">Email Address: </label>
		<input type="text" name="strEmail" id="strEmail"></input></p>
		<p> <input type ="submit" value = "Submit"> </p>
		</form>
</div>

<?php
if(isset($_POST["strUsername"]) && isset($_POST["strPassword"]) && isset($_POST["strEmail"])){
	include("../php/Authenticate.php");
	
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "killertrips";

	try {
		if(Authenticate::register($_POST["strUsername"], $_POST["strPassword"])){
			header("location: http://localhost:8080/killer-trips/src/views/homepage.php");
		}
		else{
			echo 'Unable to login, try a different username.';
			$_SESSION['loggedin'] = false;
		}
	}
	catch(mysqli_sql_exception $e){
		echo "Connection failed: " . $e->getMessage();
	}

}


?>