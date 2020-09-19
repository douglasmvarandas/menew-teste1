<?php

require_once 'C:/xampp/htdocs/teste_menew/repository/EntidadeRepository.php';
class AtivarEntidade {
        
    private $editar;
    
    function __construct($id) {
        $this->editar = new EntidadeRepository();
        if($this->editar->ativarEntidade($id) != TRUE){
            echo "<script>alert('Entidade ativada com sucesso!');document.location='../index.php'</script>";
        }else{
            echo "<script>alert('Erro ao ativar Entidade!');document.location='../index.php'</script>";
        }
    }
}
new AtivarEntidade($_GET['id_de']);

