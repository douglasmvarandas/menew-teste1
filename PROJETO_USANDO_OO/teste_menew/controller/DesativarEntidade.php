<?php

require_once 'C:/xampp/htdocs/teste_menew/repository/EntidadeRepository.php';
class DesativarEntidade {
    
    private $editar;
    
    function __construct($id) {
        $this->editar = new EntidadeRepository();
        if($this->editar->desativarEntidade($id) != TRUE){
            echo "<script>alert('Entidade desativada com sucesso!');document.location='../index.php'</script>";
        }else{
            echo "<script>alert('Erro ao desativar Entidade!');document.location='../index.php'</script>";
        }
    }
}
new DesativarEntidade($_GET['id_de']);
