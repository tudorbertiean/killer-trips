<?php

class Cities {
	public static function getNumCities(){
        include_once("../php/Database.php");        
		try {
            $db = Database::getConnection();
            $queryString = "SELECT * FROM `cities`";
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
    
    public static function getCityById($id){
        include_once("../php/Database.php");        
		try {
            $db = Database::getConnection();
            $queryString = "SELECT * FROM `cities` WHERE `cityid` = $id";
            $result = $db->query($queryString);
            if (($result->num_rows)>0){
                $city = $result->fetch_assoc();
            } else {
                // Invalid city, redirect to 404
                header("Location: http://localhost:8080/killer-trips/src/views/404.php");
            }

            return $city;
        }
        catch(mysqli_sql_exception $e){
            echo "Connection failed: " . $e->getMessage();
        }
	}
}

?>