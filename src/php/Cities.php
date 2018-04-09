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
                // Invalid city, redirect to 404 page
                header("Location: /src/views/404.php");
            }

            return $city;
        }
        catch(mysqli_sql_exception $e){
            echo "Connection failed: " . $e->getMessage();
        }
    }

    // Handles the searching. Searches based on city name, country name, and city description
    public static function getCitiesByKeyword($keyword){
        include_once("../php/Database.php");        
		try {
            $db = Database::getConnection();
            $queryString = "SELECT * FROM `cities` WHERE city LIKE '%$keyword%' or description LIKE '%$keyword%' or country LIKE '%$keyword%';";
            $result = $db->query($queryString);
            $num_rows = $result->num_rows;
            $rows = array();
            while ($row = $result->fetch_assoc()) {
                array_push($rows, $row);
            } 
        }
        catch(mysqli_sql_exception $e){
            echo "Connection failed: " . $e->getMessage();
        }

        return array($rows, $num_rows);
    }
    
    public static function addCity($city, $country, $description, $attractionNames, $attractionDesc, $killerNames, $killerDesc, $userid){
        include_once("../php/Database.php");        
		try {
            $db = Database::getConnection();
            
            $final_file = self::saveSingleImage('../images/', 'cityImg');
            $queryString = "INSERT INTO `cities` (`city`, `country`, `description`, `image`) VALUES ('".$city."', '".$country."', '".$description."', '".$final_file."')";

            if ($db->query($queryString) === TRUE) {
                // // Insert attractions and kill info
                $cityid = $db->insert_id;
                self::attractionsSql($db, $attractionNames, $attractionDesc, $cityid);
                self::killInfoSql($db, $killerNames, $killerDesc, $cityid);
            }
            
            header("Location: /src/views/city.php?cityid=".$cityid);
            
        }
        catch(mysqli_sql_exception $e){
            echo "Connection failed: " . $e->getMessage();
        }
    }

    // Inserts into the attractions table
    function attractionsSql($db, $attractionNames, $attractionDesc, $cityid){
        $attSql = "INSERT INTO `attractions` (`name`, `description`, `cityid`, `image`) VALUES ";
        
        // Collect each file name so we can add to DB
        $attractionImgs = array();
        foreach($_FILES['attractionImg']['tmp_name'] as $key => $tmp_name){
            $final_file = self::saveMultipleImages('../images/attractions/', 'attractionImg', $key);
            array_push($attractionImgs, $final_file);
        }

        for ($i = 0; $i < count($attractionNames); $i++) {
            $name = $attractionNames[$i];
            $description = $attractionDesc[$i];
            $image = $attractionImgs[$i];

            $attSql = $attSql."('".$name."', '".$description."', '".$cityid."', '".$image."'), ";
        }

        $db->query(rtrim($attSql,", ").";");
    }

    // Inserts into the killinfo table
    function killInfoSql($db, $killerNames, $killerDesc, $cityid){
        $killSql = "INSERT INTO `killinfo` (`killname`, `killtext`, `cityid`) VALUES ";
        
        for ($i = 0; $i < count($killerNames); $i++) {
            $name = $killerNames[$i];
            $description = $killerDesc[$i];

            $killSql = $killSql."('".$name."', '".$description."', '".$cityid."'), ";
        }

        $db->query(rtrim($killSql,", ").";");
    }
    
    // Used for the attractions images that are in an array
    function saveMultipleImages($folder, $file, $key) {
        $file_name = $_FILES[$file]['name'][$key];
        $file_loc = $_FILES[$file]['tmp_name'][$key];
        $file_size = $_FILES[$file]['size'][$key];
        $file_type = $_FILES[$file]['type'][$key];
 
        // make file name in lower case
        $new_file_name = strtolower($file_name);
        // remove any spaces and replace with `-`
        $final_file=str_replace(' ', '-', $new_file_name);

        if (move_uploaded_file($file_loc, $folder.$final_file)){
            return $final_file;
        }
        
        return "error.jpg";
    }

    // Used for city image which is not in an array
    function saveSingleImage($folder, $file) {
        $file_name = $_FILES[$file]['name'];
        $file_loc = $_FILES[$file]['tmp_name'];
        $file_size = $_FILES[$file]['size'];
        $file_type = $_FILES[$file]['type'];
 
        // make file name in lower case
        $new_file_name = strtolower($file_name);
        // remove any spaces and replace with `-`
        $final_file=str_replace(' ', '-', $new_file_name);

        if (move_uploaded_file($file_loc, $folder.$final_file)){
            return $final_file;
        }
        
        return "error.jpg";
    }
}

?>