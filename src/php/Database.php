<?php

class Database {
    // Singleton class to get an instance of mysqli from any other class
    private static $db;
    private $connection;

    private function __construct() {
        $env = $_SERVER["SERVER_NAME"];
        // if ($env = "localhost") {
            // $server = "localhost";
            // $name = "root";
            // $pass = "";
            // $database = "killertrips";
        //     printf("s: %s\n", $server);
        // } else {
            //Get Heroku ClearDB connection information
        $cleardb_url = parse_url(getenv("CLEARDB_DATABASE_URL"));
        $server = $cleardb_url["host"];
        $name = $cleardb_url["user"];
        $pass = $cleardb_url["pass"];
        $database = substr($cleardb_url["path"],1);
        // }
        
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