<?php

class Database {
    // Singleton class to get an instance of mysqli from any other class
    private static $db;
    private $connection;

    private function __construct() {
        $this->connection = new mysqli("localhost", "root", "", "killertrips");
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