<?php

class Votes {
    // Get the upvotes and the downvotes and return the difference
	public static function getVotesForCity($cityid){
        include_once("../php/Database.php");        
		try {
            $db = Database::getConnection();
            $queryString = "SELECT count(case when cityid = $cityid and score = 1 then 1 end) as upvote, count(case when cityid = $cityid and score = -1 then 1 end) as downvote FROM vote";
            $result = $db->query($queryString);
            $row = $result->fetch_assoc();
            $upvotes = $row["upvote"];
            $downvote = $row["downvote"];
            $difference = (int)$upvotes - (int)$downvote;
        }
        catch(mysqli_sql_exception $e){
            echo "Connection failed: " . $e->getMessage();
        }
        return $difference;
    }

    // Check if user has voted for this city already
    public static function hasUserVoted($cityid, $userid){
        include_once("../php/Database.php");        
		try {
            $db = Database::getConnection();
            $hasvoted = 0;
            $queryString = "SELECT * FROM `vote` where cityid = $cityid and userid = $userid";
            $result = $db->query($queryString);
            $row = mysqli_fetch_assoc($result);
            if ($result->num_rows > 0){
                $hasvoted = $row["score"];
            }
            
        }
        catch(mysqli_sql_exception $e){
            echo "Connection failed: " . $e->getMessage();
        }
        return (int)$hasvoted;
    }

    public static function postVote($userid, $cityid, $vote){
        include_once("../php/Database.php");        
		try {
            $db = Database::getConnection();
            $queryString = "INSERT INTO `vote` (`cityid`, `userid`, `score`) VALUES ('".$cityid."', '".$userid."', '".$vote."')";
            $result = $db->query($queryString);
        }
        catch(mysqli_sql_exception $e){
            echo "Connection failed: " . $e->getMessage();
        }
    }
}

?>