<?php

require "agenda_model.php";
require "agenda_servico.php";
require "conexao.php";

$conexao =new Conexao();
$agendaModel = new AgendaModel();
$agendaServico= new AgendaServico($agendaModel,$conexao);

///////////////////////////////////////////////////////////////////////CRIAR
 if (isset($_GET['acao']) && $_GET['acao'] == 'inserir'){
//inserindo dados do formulario nos atributos
$agendaModel->__set('nome',$_POST['nome']);
$agendaModel->__set('telefone',$_POST['telefone']);
$agendaModel->__set('email',$_POST['email']);
$agendaModel->__set('cidade',$_POST['cidade']);
$agendaModel->__set('estado',$_POST['estado']);
$agendaModel->__set('categoria',$_POST['categoria']);
//acionando o metodo cadastrarContatos
$agendaServico->cadastrarContato();
//redireciona para novo_cadastro e envia um  retorno via get
header("location:../../app_agenda/novo_cadastro.php?cadastro=1");
}
////////////////////////////////////////////////////////////////////////LISTAR
else if($acao == "recuperar"){ 
   $listar = $agendaServico->listarContatos();
}
//////////////////////////////////////////////////////////////////////EDITAR
else if($acao == 'editar' && isset($_GET['id'])){
$idLista = intval($_GET['id']);
$contatoID = $agendaServico->filtrarContatoId($idLista);
}else if(isset($_GET['editaid'])){
   
   $editaId = intval(($_GET['editaid']));
   $agendaModel->__set('nome',$_POST['nome']);
   $agendaModel->__set('telefone',$_POST['telefone']);
   $agendaModel->__set('email',$_POST['email']);
   $agendaModel->__set('cidade',$_POST['cidade']);
   $agendaModel->__set('estado',$_POST['estado']);
   $agendaModel->__set('categoria',$_POST['categoria']);

   $agendaServico->atualizarContato($editaId);
   header('location:../../app_agenda/editar.php?editado=1');
}
//////////////////////////////////////////////////////////////////////////////////EXCLUIR
else if(isset($_GET['idexcluir'])&& $acao=='excluir'){
   //recebe a requisição da página excluir com o ID do cliente
   $idExcluir = intval($_GET['idexcluir']);
   $contatoExcluir=$agendaServico->filtrarContatoId($idExcluir);
}else if(isset($_GET['excluirId'])){
   $excluirID=intval($_GET["excluirId"]);
   echo $excluirID;
   $agendaServico->excluirContato($excluirID);
   header('location:../../app_agenda/excluir.php?idExcluido=1');
}
