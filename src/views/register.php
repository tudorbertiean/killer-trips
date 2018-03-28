<!DOCTYPE html>
<head> <title>PHP Script</title>
<link rel="stylesheet" href="../css/login.css">
</head>
<body>
<div id="header">
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
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "killertrips";

	try {
		$mysqli = new mysqli($servername, $username, $password, $dbname);
		$queryString = "INSERT INTO `users`(`username`, `password`, `permission`) VALUES ('".$_POST["strUsername"]."',MD5('".$_POST["strPassword"]."'),'full')";
		$result = $mysqli->query($queryString);
		session_start();
		if ($result==true){
			$_SESSION['loggedin'] = true;
			$_SESSION['username'] = $username;
			header("location: homepage.php");
		}
		else {
			$_SESSION['loggedin'] = false;
			echo '<h1 class = "inputLabel">Incorrect Username and/or password!</h1>';
		}
	}
	catch(mysqli_sql_exception $e){
		echo "Connection failed: " . $e->getMessage();
	}

}


?>