<?php
  $acao = $_POST["acao"];

  switch ($acao) {
    case 'adicionar':
      addUsuario();
      break;

    case 'editar':
      editarUsuario();
      break;

    case 'excluir':
      excluirUsuario();
      break;
    }

    function addUsuario() {
      require_once ('../model/UsuariosModel.php');
      require_once ('../dao/UsuariosDAO.php');
      require_once ('../database/Database.php');
      require_once("../controller/Util.php");

      $Util = new Util();
      $db = new Database();
      $dao = new UsuariosDAO($db);

      $nome = $_POST['nome'];
      $telefone = $_POST['telefone'];
      $email = $_POST['email'];
      $cidade = $_POST['cidade'];
      $estado = $_POST['estado'];
      $categoria = $_POST['categoria'];

      $Usuarios = new Usuarios();
      $Usuarios->setNome($nome);
      $Usuarios->setTelefone($telefone);
      $Usuarios->setEmail($email);
      $Usuarios->setCidade($cidade);
      $Usuarios->setEstado($estado);
      $Usuarios->setCategoria($categoria);

      $dao->add($Usuarios);
    }

  function editarUsuario() {
    require_once ('../model/UsuariosModel.php');
    require_once ('../dao/UsuariosDAO.php');
    require_once ('../database/Database.php');
    require_once("../controller/Util.php");

      $Util = new Util();
      $db = new Database();
      $dao = new UsuariosDAO($db);

      $id = $_POST['id'];
      $telefone = $_POST['telefone'];
      $email = $_POST['email'];
      $cidade = $_POST['cidade'];
      $estado = $_POST['estado'];
      $categoria = $_POST['categoria'];

      $Usuarios = new Usuarios();
      $Usuarios->setId($id);
      $Usuarios->setNome($nome);
      $Usuarios->setTelefone($telefone);
      $Usuarios->setEmail($email);
      $Usuarios->setCidade($cidade);
      $Usuarios->setEstado($estado);
      $Usuarios->setCategoria($categoria);

      $dao->update($Usuarios);
    }

  function excluirUsuario() {
    require_once ('../model/UsuariosModel.php');
    require_once ('../dao/UsuariosDAO.php');
    require_once ('../database/Database.php');
    require_once("../controller/Util.php");

     $db = new Database();
     $dao = new UsuariosDAO($db);
     $id = $_POST['id'];

     $Usuarios = new Usuarios();
     $Usuarios->setId($id);

     $dao->delete($Usuarios);
   }
