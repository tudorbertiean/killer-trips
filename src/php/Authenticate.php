<?php

class Authenticate {

	public static $servername = "localhost";
	public static $username = "root";
	public static $password = "";
	public static $dbname = "killertrips";
	
	public static function login($un,$pw){
		$valid = false;
		try {
            $mysqli = new mysqli(self::$servername, self::$username, self::$password, self::$dbname);
            $queryString = "SELECT * FROM `users` WHERE username = '".$un."' and password = MD5('".$pw."');";
            $result = $mysqli->query($queryString);
            if (($result->num_rows)>0){
                session_start();
                $user = $result->fetch_assoc();
                $_SESSION['loggedin'] = true;
                $_SESSION['username'] = $un;
                $_SESSION['userid'] = $user["userid"];
                $valid = true;
            }
        }
        catch(mysqli_sql_exception $e){
            echo "Connection failed: " . $e->getMessage();
        }
        return $valid;
    }
    
    public static function register($un,$pw){
		$valid = false;
		try {
            $mysqli = new mysqli(self::$servername, self::$username, self::$password, self::$dbname);
            $queryString = "SELECT * FROM `users` WHERE username = '".$un."';";
            $result = $mysqli->query($queryString);
            if (($result->num_rows)>0){
                $valid = false;
            } else {
                $queryString = "INSERT INTO `users`(`username`, `password`, `permission`) VALUES ('".$un."',MD5('".$pw."'),'admin')";
                $result = $mysqli->query($queryString);
                session_start();
                if ($result==true){
                    $queryString = "SELECT * FROM `users` WHERE username = '".$un."';";
                    $result = $mysqli->query($queryString);
                    if (($result->num_rows) > 0){
                        $user = $result->fetch_assoc();
                        $_SESSION['loggedin'] = true;
                        $_SESSION['username'] = $un;
                        $_SESSION['userid'] = $user["userid"];
                        $valid = true;
                    }      
                }
            }
        }
        catch(mysqli_sql_exception $e){
            echo "Connection failed: " . $e->getMessage();
        }
        return $valid;
	}
	
}

?>