<?php

require_once("../database/database.php");

class Categoria
{
    private $database;

    function __construct()
    {
        $this->database = Database::getConnection();
    }

    public function findAll()
    {
        $query = $this->database->query("SELECT * FROM Categoria");
        $result = $query->fetch_all(MYSQLI_ASSOC);
        return $result;
    }
}
