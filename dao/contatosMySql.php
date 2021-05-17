<?php
require_once '../config.php';

class contatosMySql
{

    private $pdo;
    public function __construct($drive)
    {
        $this->pdo = $drive;
    }

    public function insertContato(contato $c)
    {
    }
    public function updateContato()
    {
    }
    public function deleteContato($id_contato)
    {
    }
    public function searchContatoByName($nome_contato)
    {
    }
    public function searchContatoById($id_contato)
    {
    }
    public function listaContatos()
    {
    }
}
