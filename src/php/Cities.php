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
    
    public static function addCity($city, $country, $description, $attractionNames, $attractionDesc, $killerNames, $killerDesc, $userid){
        include_once("../php/Database.php");        
		try {
            $db = Database::getConnection();

			$file = $_FILES['cityImg']['name'];
			$file_loc = $_FILES['cityImg']['tmp_name'];
			$file_size = $_FILES['cityImg']['size'];
			$file_type = $_FILES['cityImg']['type'];
            $folder="../images/";

            // new file size in KB
			$new_size = $file_size/1024;  
			// make file name in lower case
			$new_file_name = strtolower($file);
			// make file name in lower case
			$final_file=str_replace(' ', '-', $new_file_name);
			
            if(move_uploaded_file($file_loc, $folder.$final_file)) {
                $queryString = "INSERT INTO `cities` (`city`, `country`, `description`, `image`) VALUES ('".$city."', '".$country."', '".$description."', '".$final_file."')";

                if ($db->query($queryString) === TRUE) {
                    // // Insert attractions and kill info
                    $cityid = $db->insert_id;
                    $attSql = "INSERT INTO `attractions` (`name`, `description`, `cityid`) VALUES ";
                    for ($i = 0; $i < count($attractionNames); $i++) {
                        $name = $attractionNames[$i];
                        $description = $attractionDesc[$i];
                        $attSql = $attSql."('".$name."', '".$description."', '".$cityid."'), ";
                    }
                    $db->query(rtrim($attSql,", ").";");
                    header("Location: http://localhost:8080/killer-trips/src/views/city.php?cityid=".$cityid);
                }
            }
        }
        catch(mysqli_sql_exception $e){
            echo "Connection failed: " . $e->getMessage();
        }
	}
}

?>