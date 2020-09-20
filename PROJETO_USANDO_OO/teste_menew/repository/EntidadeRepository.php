<?php

    require_once 'C:/xampp/htdocs/teste_menew/init.php';
    
    class EntidadeRepository {
        
        protected $conexao;
        
        function __construct() {
            
            try{
                
                $this->conexao = new PDO("mysql:dbname=".BD_BANCO .";host=" .BD_SERVIDOR, BD_USUARIO, BD_SENHA);
            
            } catch (PDOException $exc) {
                echo "Erro relacionado com o banco de Dados -> " .$exc->getMessage();
                
                exit();
            } catch(Exception $ex){
                echo "Ops.. Erro no arquivo de conexão com o banco de dados -> " .$ex->getMessage();
                
                exit();
            }
            
        }
        
        public function listarEntidade() {
            
            $res = array();


            $cmd = $this->conexao->query("SELECT * FROM entidade order by nome");
            $res = $cmd->fetchAll(PDO::FETCH_ASSOC);

            return $res;
        }
        
        public function cadastrarEntidade($nome,$telefone,$email,$cidade,$estado,$tipo,$ativo) {

                $cmd = $this->conexao->prepare("SELECT idEntidade FROM entidade WHERE"
                        . " email = :email");
                $cmd->bindValue(":email", $email);
                $cmd->execute();

                if($cmd->rowCount() > 0){

                    echo "<script>alert('Email já utilizado')</script>";

                }else{

                    $cmd = $this->conexao->prepare("INSERT INTO entidade ("
                            . "nome, telefone, email, cidade, estado, tipo, ativo) VALUES "
                            . "(:nome, :telefone, :email, :cidade, :estado, :tipo, :ativo)");
                    $cmd->bindValue(":nome", $nome);
                    $cmd->bindValue(":telefone", $telefone);
                    $cmd->bindValue(":email", $email);
                    $cmd->bindValue(":cidade", $cidade);
                    $cmd->bindValue(":estado", $estado);
                    $cmd->bindValue(":tipo", $tipo);
                    $cmd->bindValue(":ativo", $ativo);
                    $cmd->execute();

                    return true;
                }
        }
            
        public function desativarEntidade($id) {
            
            $cmd = $this->conexao->prepare("UPDATE entidade SET ativo = 'N' WHERE idEntidade = :id");
            $cmd->bindValue(":id", $id);
            $cmd->execute();
            
        }
        
        public function ativarEntidade($id) {
            
            $cmd = $this->conexao->prepare("UPDATE entidade SET ativo = 'S' WHERE idEntidade = :id");
            $cmd->bindValue(":id", $id);
            $cmd->execute();
            
        }
        
        public function buscarEntidade($id) {
            
            $res = array();
            $cmd = $this->conexao->prepare("SELECT * FROM entidade"
                    . " WHERE idEntidade = :id");
            $cmd->bindValue(":id", $id);
            $cmd->execute();
            
            $res = $cmd->fetch(PDO::FETCH_ASSOC);
            
            return $res;
            
        }
        
        public function pesquisarEntidade($pesquisa) {
            
            $res = array();


            $cmd = $this->conexao->query("SELECT * FROM entidade WHERE nome like '%".$pesquisa."%' order by nome");
            //$cmd->bindValue(":nome", $pesquisa);
            $res = $cmd->fetchAll(PDO::FETCH_ASSOC);

            return $res;
            
        }
        
        public function atualizarEntidade($id, $nome, $telefone, $email,$cidade,$estado,$tipo,$ativo) {
            
            $cmd = $this->conexao->prepare("SELECT email FROM entidade WHERE"
                    . " email = :e");
            $cmd->bindValue(":e", $email);
            $cmd->execute();
            
            $teste_email = $cmd->fetch(PDO::FETCH_ASSOC);
            
            if($cmd->rowCount() > 0 && $teste_email['email'] != $email){
                
                return false;
                
            }else{
            
                $cmd2 = $this->conexao->prepare("UPDATE entidade SET "
                        . " nome = :nome,"
                        . " telefone = :telefone,"
                        . " email = :email,"
                        . " cidade = :cidade,"
                        . " estado = :estado,"
                        . " tipo = :tipo,"
                        . " ativo = :ativo"
                        . " WHERE idEntidade = :id");

                $cmd2->bindValue(":nome", $nome);
                $cmd2->bindValue(":telefone", $telefone);
                $cmd2->bindValue(":email", $email);
                $cmd2->bindValue(":cidade", $cidade);
                $cmd2->bindValue(":estado", $estado);
                $cmd2->bindValue(":tipo", $tipo);
                $cmd2->bindValue(":ativo", $ativo);
                $cmd2->bindValue(":id", $id);
                $cmd2->execute();
                
                return true;
                
            }    
        }
    }


