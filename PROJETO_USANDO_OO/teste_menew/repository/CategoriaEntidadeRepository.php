<?php

    require_once 'C:/xampp/htdocs/teste_menew/init.php';
    
    class CategoriaEntidadeRepository {

        protected $conexao;

        function __construct() {

            try {

                $this->conexao = new PDO("mysql:dbname=" . BD_BANCO . ";host=" . BD_SERVIDOR, BD_USUARIO, BD_SENHA);
            } catch (PDOException $exc) {
                echo "Erro relacionado com o banco de Dados -> " . $exc->getMessage();

                exit();
            } catch (Exception $ex) {
                echo "Ops.. Erro no arquivo de conexão com o banco de dados -> " . $ex->getMessage();

                exit();
            }
        }

        public function listarTipoEntidade() {

            $res = array();
            $cmd = $this->conexao->query("SELECT * FROM tipoentidade order by nomeEntidade");
            $res = $cmd->fetchAll(PDO::FETCH_ASSOC);

            return $res;
        }

    }
