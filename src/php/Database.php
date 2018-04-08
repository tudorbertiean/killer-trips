<?php

class Database {
    // Singleton class to get an instance of mysqli from any other class
    private static $db;
    private $connection;

    private function __construct() {
        $env = $_SERVER["SERVER_NAME"];
        if ($env = "localhost") {
            $server = "localhost";
            $name = "root";
            $pass = "";
            $database = "killertrips";
        } else {
            $server = "us-cdbr-iron-east-05.cleardb.net";
            $name = "b3c2edf81b8059";
            $pass = "747ce8f5";
            $database = "heroku_a6b0a7fcdcbdc5d";
        }
        
        $this->connection = new mysqli($server, $name, $pass, $database);
    }

    function __destruct() {
        $this->connection->close();
    }

    public static function getConnection() {
        if (self::$db == null) {
            self::$db = new Database();
        }
        return self::$db->connection;
    }
}

?>