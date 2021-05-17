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

    //INSERIR CONTATO NO BANCO DE DADOS
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

    //ATUALIZAR CONTATO NO BANCO DE DADOS
    public function updateContato(contato $c)
    {
        $sql = $this->pdo->prepare(
            'UPDATE contato SET 
            nome = :nome, 
            telefone = :telefone, 
            email = :email, 
            cidade = :cidade,
            estado = :estado,
            categoria = :categoria
            WHERE id_contato = :id_contato
            '
        );
        $sql->bindValue(':nome', $c->nome);
        $sql->bindValue(':telefone', $c->telefone);
        $sql->bindValue(':email', $c->email);
        $sql->bindValue(':cidade', $c->cidade);
        $sql->bindValue(':estado', $c->estado);
        $sql->bindValue(':categoria', $c->categoria);
        $sql->bindValue(':id_contato', $c->id_contato);

        return $sql->execute();
    }

    //DELETAR CONTATO DO BANCO DE DADOS
    public function deleteContato($id_contato)
    {
        $sql = $this->pdo->prepare('DELETE FROM contato WHERE id_contato = :id_contato');
        $sql->bindValue(':id_contato', $id_contato);
        return $sql->execute();
    }

    //PROCURA NO BANCO DE DADOS POR NOME
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

    //PROCURA NO BANCO DE DADOS POR ID DO CONTATO
    public function searchContatoById($id_contato)
    {
        $sql = $this->pdo->prepare('SELECT * FROM contato WHERE id_contato = :id_contato');
        $sql->bindValue(':id_contato', $id_contato);
        $sql->execute();
        if ($sql->rowCount() > 0) {
            $data = $sql->fetch(PDO::FETCH_ASSOC);
            return $data;
        }
        return false;
    }

    //LISTA TODOS OS CONTATOS DO BANCO DE DADOS
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

    //TRANSFORMA CADA CONTATO DO ARRAY $data EM UM OBJETO DA MODEL CONTATO
    private function listToObject($data)
    {
        $arrayList = [];
        foreach ($data as $list) {
            $listObj = new contato();
            $listObj->id_contato = $list['id_contato'] ?? '';
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
