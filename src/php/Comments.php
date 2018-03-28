<?php

class Comments {
	public static function getCommentsForCity($cityid){
        include_once("../php/Database.php");        
		try {
            $db = Database::getConnection();
            $queryString = "SELECT * FROM `comments` WHERE `cityid` = $cityid ORDER BY `date` DESC";
            $result = $db->query($queryString);
            $rows = array();
            while ($row = $result->fetch_assoc()) {
                array_push($rows, $row);
            }
        }
        catch(mysqli_sql_exception $e){
            echo "Connection failed: " . $e->getMessage();
        }
        return $rows;
    }

    public static function postComment($comment, $userid, $cityid){
        include_once("../php/Database.php");        
		try {
            $db = Database::getConnection();
            $queryString = "INSERT INTO `comments` (`comment`, `userid`, `cityid`) VALUES ('".$comment."', '".$userid."', '".$cityid."')";
            $result = $db->query($queryString);
        }
        catch(mysqli_sql_exception $e){
            echo "Connection failed: " . $e->getMessage();
        }
    }
}

?>