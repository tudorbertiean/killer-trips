<?php

class Authenticate {

	public static $servername = "localhost";
	public static $username = "root";
	public static $password = "";
	public static $dbname = "killertrips";
	
	public static function testReg($un,$pw){
		$valid = false;
		try {
            $mysqli = new mysqli(self::$servername, self::$username, self::$password, self::$dbname);
            $queryString = "SELECT * FROM `users` WHERE username = '".$un."' and password = MD5('".$pw."');";
            $result = $mysqli->query($queryString);
            if (($result->num_rows)>0){
                $valid = true;
            }
        }
        catch(mysqli_sql_exception $e){
            echo "Connection failed: " . $e->getMessage();
        }
        return $valid;
	}
	
}

?>