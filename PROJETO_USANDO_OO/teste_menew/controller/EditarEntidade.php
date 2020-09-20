<?php

require_once 'C:/xampp/htdocs/teste_menew/repository/EntidadeRepository.php';
require_once 'C:/xampp/htdocs/teste_menew/repository/conexao.php';

class EditarEntidade {
   
    public $editar;
    private $id;
    private $nome;
    private $telefone;
    private $email;
    private $cidade;
    private $estado;
    private $tipo;
    private $ativo;
    
    function __construct($id) {
        
        $this->editar = new EntidadeRepository();
        $this->buscarEntidade($id);
        
    }
    
    private function buscarEntidade($id) {
        $linha = $this->editar->buscarEntidade($id);
        $this->id = $linha['idEntidade'];
        $this->nome = $linha['nome'];
        $this->telefone = $linha['telefone'];
        $this->email = $linha['email'];
        $this->cidade = $linha['cidade'];
        $this->estado = $linha['estado'];
        $this->tipo = $linha['tipo'];
        $this->ativo = $linha['ativo'];
    }
    
    public function editarEntidade($id, $nome, $telefone, $email, $cidade, $estado, $tipo, $ativo) {
        
        if($this->editar->atualizarEntidade($id, $nome, $telefone, $email, $cidade, $estado, $tipo, $ativo)){
            echo "<script>alert('Registro atualizado com sucesso!');document.location='../index.php'</script>";
        }else{
            echo "<script>alert('Erro ao atualizar registro!');document.location='../index.php'</script>";
        }
    }
    
    function getEdit() {
        return $this->edit;
    }

    function getNome() {
        return $this->nome;
    }

    function getTelefone() {
        return $this->telefone;
    }

    function getEmail() {
        return $this->email;
    }

    function getCidade() {
        return $this->cidade;
    }

    function getEstado() {
        return $this->estado;
    }

    function getTipo() {
        return $this->tipo;
    }

    function getAtivo() {
        return $this->ativo;
    }
    
    function getId() {
        return $this->id;
    }
    
}

$id = filter_input(INPUT_GET, 'id');
$editar = new EditarEntidade($id);

if(isset($_POST['submit'])){
    $editar->editarEntidade($_POST['id'], utf8_encode($_POST['nome']),$_POST['telefone'],$_POST['email'], utf8_encode($_POST['cidade']),$_POST['estado'], utf8_encode($_POST['tipo']),$_POST['ativo']);
}

// consulta aos tipos
$tipoEntidade = "SELECT * ";
$tipoEntidade .= "FROM tipoentidade ";
$lista_tipos = mysqli_query($conect, $tipoEntidade);
if (!$lista_tipos) {
    die("erro no banco");
}

// consulta aos estados
$estados = "SELECT * ";
$estados .= "FROM estados ";
$lista_estados = mysqli_query($conect, $estados);
if (!$lista_estados) {
    die("erro no banco");
}