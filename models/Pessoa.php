<?php

require_once("../database/database.php");

class Pessoa
{
    private $database;

    function __construct()
    {
        $this->database = Database::getConnection();
    }

    public function findAll()
    {
        $query = $this->database->query("SELECT p.*, c.Descricao, c.ID ID_Cat FROM Pessoa p
            JOIN Categoria c ON p.Categoria = c.ID  
            ");
        $result = $query->fetch_all(MYSQLI_ASSOC);
        return $result;
    }

    public function findRow($id)
    {
        $query = $this->database->query("SELECT p.*, c.Descricao, c.ID ID_Cat FROM Pessoa p
            JOIN Categoria c ON p.Categoria = c.ID 
            WHERE p.ID = '{$id}'
            ");
        $result = $query->fetch_all(MYSQLI_ASSOC);
        return $result[0];
    }

    public function insertRow($nome, $telefone, $email, $cidade, $estado, $categoriaId)
    {
        $query = $this->database->query("
            INSERT INTO Pessoa (Nome,Telefone,Email,Cidade,Estado,Categoria)
            VALUES ('{$nome}','{$telefone}','{$email}','{$cidade}','{$estado}', {$categoriaId})");

        return $query;
    }

    public function updateRow($id, $nome, $telefone, $email, $cidade, $estado, $categoriaId)
    {
        $query = $this->database->query("
            UPDATE Pessoa
            SET Nome='{$nome}',Telefone='{$telefone}',Cidade='{$cidade}',Email='{$email}',Categoria={$categoriaId},Estado='{$estado}'
            WHERE ID={$id}");

        return $query;
    }

    public function search($value)
    {
        $query = $this->database->query("
            SELECT * FROM Pessoa p 
            JOIN Categoria c ON p.Categoria = c.ID 
            WHERE Nome LIKE '%{$value}%' OR Telefone LIKE '%{$value}%' OR
            Email LIKE '%{$value}%' OR Cidade LIKE '%{$value}%' OR
            Estado LIKE '%{$value}%' OR  Descricao LIKE '%{$value}%'
        ");
        $result = $query->fetch_all(MYSQLI_ASSOC);

        return $result;
    }
}
