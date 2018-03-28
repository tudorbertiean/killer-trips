<?php

class User {
	public static function getUserById($userid){
        include_once("../php/Database.php");        
		try {
            $db = Database::getConnection();
            $queryString = "SELECT * FROM `users` WHERE `userid` = $userid";
            $result = $db->query($queryString);
            $user = $result->fetch_assoc();
        }
        catch(mysqli_sql_exception $e){
            echo "Connection failed: " . $e->getMessage();
        }
        return $user;
    }
}

?>