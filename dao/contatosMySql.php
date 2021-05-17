<?php
require_once dirname(__DIR__) . '/config.php';
require_once dirname(__DIR__) . '/models/contato.php';

class contatosMySql
{

    private $pdo;
    public function __construct($drive)
    {
        $this->pdo = $drive;
    }

    public function insertContato(contato $c)
    {
        $sql = $this->pdo->prepare(
            'INSERT INTO 
        contato (nome, telefone, email, cidade, estado, categoria)
        VALUES 
        (:nome,:telefone,:email,:cidade,:estado,:categoria)'
        );
        $sql->bindValue(':nome', $c->nome);
        $sql->bindValue(':telefone', $c->telefone);
        $sql->bindValue(':email', $c->email);
        $sql->bindValue(':cidade', $c->cidade);
        $sql->bindValue(':estado', $c->estado);
        $sql->bindValue(':categoria', $c->categoria);
        return $sql->execute();
    }
    public function updateContato()
    {
    }
    public function deleteContato($id_contato)
    {
    }
    public function searchContatoByName($nome_contato)
    {
        $sql = $this->pdo->prepare('SELECT * FROM contato WHERE nome LIKE :nome_contato');
        $nome_contato = "%" . $nome_contato . "%";
        $sql->bindValue(':nome_contato', $nome_contato);
        $sql->execute();
        if ($sql->rowCount() > 0) {
            $data = $sql->fetchAll(PDO::FETCH_ASSOC);
            $list = $this->listToObject($data);
            return $list;
        }
        return false;
    }
    public function searchContatoById($id_contato)
    {
        $sql = $this->pdo->prepare('SELECT * FROM contato WHERE id_contato = :id_contato');
        $sql->bindValue(':id_contato', $id_contato);
        $sql->execute();
        if ($sql->rowCount() > 0) {
            $data = $sql->fetchAll(PDO::FETCH_ASSOC);
            $list = $this->listToObject($data);
            return $list;
        }
        return false;
    }
    public function listContatos()
    {
        $sql = $this->pdo->prepare('SELECT * FROM contato');
        $sql->execute();
        if ($sql->rowCount() > 0) {
            $data = $sql->fetchAll(PDO::FETCH_ASSOC);
            $list = $this->listToObject($data);
            return $list;
        }
        return false;
    }
    private function listToObject($data)
    {
        $arrayList = [];
        foreach ($data as $list) {
            $listObj = new contato();
            $listObj->nome = $list['nome'];
            $listObj->telefone = $list['telefone'];
            $listObj->email = $list['email'];
            $listObj->cidade = $list['cidade'];
            $listObj->estado = $list['estado'];
            $listObj->categoria = $list['categoria'];
            $arrayList[] = $listObj;
        }
        return $arrayList;
    }
}
