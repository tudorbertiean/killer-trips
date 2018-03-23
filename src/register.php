<!DOCTYPE html>
<head> <title>PHP Script</title>
<link rel="stylesheet" href="login.css">
</head>
<body>
<div id="header">
    <div id="left">
        <img src="logo.jpg" alt="logo" class="image">
    </div>
    <div id="right">
        <img src="logo.jpg" alt="logo" class="image">
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
$dbname = "users";

	try {
		$mysqli = new mysqli($servername, $username, $password, $dbname);
		$queryString = "INSERT INTO `credentials`(`username`, `password`, `email`) VALUES ('".$_POST["strUsername"]."',MD5('".$_POST["strPassword"]."'),'".$_POST["strEmail"]."')";
		$result = $mysqli->query($queryString);
		if ($result==true){
			 echo "<h1>Welcome</h1>";
		}
		else {
			echo "<h1>Incorrect Username and/or password!</h1>";;
		}
	}
	catch(mysqli_sql_exception $e){
		echo "Connection failed: " . $e->getMessage();
	}

}


?>