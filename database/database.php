<?php
class Database
{

    public static function getConnection()
    {
        $hostDb = "127.0.0.1";
        $usuarioDb = "root";
        $passwordDb = "12345";
        $database = "agenda";

        $mysqli = new mysqli($hostDb, $usuarioDb, $passwordDb, $database);
        if ($mysqli->connect_errno) {
            echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
            return null;
        }
        return $mysqli;
    }
}
