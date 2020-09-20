<?php

require_once 'C:/xampp/htdocs/teste_menew/model/Entidade.php';
class CadastrarEntidade {
    
    private $entidade;
    
    function __construct() {
        
        $this->entidade = new Entidade();
        $this->incluir();
    }

    
    public function incluir() {
        
        $this->entidade->setNome($_POST['nome']);
        $this->entidade->setTelefone($_POST['telefone']);
        $this->entidade->setEmail($_POST['email']);
        $this->entidade->setCidade($_POST['cidade']);
        $this->entidade->setEstado($_POST['estado']);
        $this->entidade->setCategoria($_POST['tipo']);
        $this->entidade->setAtivo($_POST['ativo']);
        $cmd = $this->entidade->incluir();
        
        if($cmd >= 1){
            echo "<script>alert('Entidade Cadastrada com sucesso');document.location='../index.php'</script>";
        }else{
            echo "<script>alert('Erro ao Cadastrar Entidade');document.location='../index.php'</script>";
        }
    }
    
}
new CadastrarEntidade();