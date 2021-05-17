<?php

namespace app\model;

use Exception;
use PDO;
use PDOException;

class Database {
    // Gestão de banco de dados

    private $ligacao;

    private function ligar() {

        $this->ligacao = new PDO(
            'mysql:'.
            'host='.MYSQL_SERVER.';'.
            'dbname='.MYSQL_DATABASE.';'.
            'charset='.MYSQL_CHARSET,
            MYSQL_USER,
            MYSQL_PASS,
            array(PDO::ATTR_PERSISTENT => true)
        );

        // debug
        $this->ligacao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);

    }

    private function close() {
        $this->ligacao = null;
    }

    // ================== SELECT ======================
    public function select($sql, $parametros = null) {

        $sql = trim($sql);

        // verifica se é instrução SELECT
        if(!preg_match("/^SELECT/i", $sql)):
            throw new Exception('Banco de dados - Não é uma instrução SELECT.');
        endif;

        $this->ligar();

        $resultados = null;

        try {

            if(!empty($parametros)):
                $executar = $this->ligacao->prepare($sql);
                $executar->execute($parametros);
                $resultados = $executar->fetchALL(PDO::FETCH_CLASS);
            else:
                $executar = $this->ligacao->prepare($sql);
                $executar->execute();
                $resultados = $executar->fetchALL(PDO::FETCH_CLASS);
            endif;

        } catch (PDOException $e) {
            return false;
        }

        $this->close();

        return $resultados;
    }

    // ================== INSERT ======================
    public function insert($sql, $parametros = null) {

        $sql = trim($sql);

        // verifica se é instrução INSERT
        if(!preg_match("/^INSERT/i", $sql)):
            throw new Exception('Banco de dados - Não é uma instrução INSERT.');
        endif;

        $this->ligar();

        try {

            if(!empty($parametros)):
                $executar = $this->ligacao->prepare($sql);
                $executar->execute($parametros);
            else:
                $executar = $this->ligacao->prepare($sql);
                $executar->execute();
            endif;

        } catch (PDOException $e) {
            return false;
        }

        $this->close();

    }

    // ================== UPDATE ======================
    public function update($sql, $parametros = null) {

        $sql = trim($sql);

        // verifica se é instrução UPDATE
        if(!preg_match("/^UPDATE/i", $sql)):
            throw new Exception('Banco de dados - Não é uma instrução UPDATE.');
        endif;

        $this->ligar();

        try {

            if(!empty($parametros)):
                $executar = $this->ligacao->prepare($sql);
                $executar->execute($parametros);
            else:
                $executar = $this->ligacao->prepare($sql);
                $executar->execute();
            endif;

        } catch (PDOException $e) {
            return false;
        }

        $this->close();

    }

    // ================== DELETE ======================
    public function delete($sql, $parametros = null) {

        $sql = trim($sql);

        // verifica se é instrução DELETE
        if(!preg_match("/^DELETE/i", $sql)):
            throw new Exception('Banco de dados - Não é uma instrução DELETE.');
        endif;

        $this->ligar();

        try {

            if(!empty($parametros)):
                $executar = $this->ligacao->prepare($sql);
                $executar->execute($parametros);
            else:
                $executar = $this->ligacao->prepare($sql);
                $executar->execute();
            endif;

        } catch (PDOException $e) {
            return false;
        }

        $this->close();

    }

    // ================== OUTRAS INSTUÇÕES ======================
    public function statement($sql, $parametros = null) {

        $sql = trim($sql);

        // verifica se é instrução diferente
        if(preg_match("/^(SELECT|INSERT|UPDATE|DELETE)/i", $sql)):
            throw new Exception('Banco de dados - Instrução inválida.');
        endif;

        $this->ligar();

        try {

            if(!empty($parametros)):
                $executar = $this->ligacao->prepare($sql);
                $executar->execute($parametros);
            else:
                $executar = $this->ligacao->prepare($sql);
                $executar->execute();
            endif;

        } catch (PDOException $e) {
            return false;
        }

        $this->close();

    }

}

?>