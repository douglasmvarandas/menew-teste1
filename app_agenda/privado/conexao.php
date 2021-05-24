<?php
class Conexao{
    private $host = 'localhost';
    private $dbname = 'db_agenda';
    private $usuario = 'root';
    private $pass='';

    public function conectar(){

        try{
            $conexao = new PDO(
                'mysql:host='.$this->host.';dbname='.$this->dbname.'',
                $this->usuario,
                $this->pass
            );

            return $conexao;

        } catch (PDOException $e) {
            echo '<p>'.$e->getMessage().'</p>';
        }

    }
}

?>