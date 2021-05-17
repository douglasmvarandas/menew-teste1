<?php
	//Inclue o arquivo UsuariosDAO.php
    require_once("../dao/UsuariosDAO.php");

    //Cria uma nova instância da classe UsuariosDAO
    $UsuariosDAO = new UsuariosDAO();

    //Chama a função runQuery da classe UsuariosDAO para executar a instrução SQL
    $stmtUsuarios = $UsuariosDAO->runQuery("SELECT * FROM usuarios WHERE id = '".$_REQUEST['id']."'");

    // Executa a instrução SQL
    $stmtUsuarios->execute();

    //Retorna uma matriz indexada pelo nome da coluna conforme resultado retornado pela execução da instrução SQL
    $RowUsuarios = $stmtUsuarios->fetch(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html>
	<head>
		<title>Editar Usuario</title>
    	<link rel="stylesheet" type="text/css" href="../assets/css/custom/custom.css">
    	<link rel="stylesheet" type="text/css" href="../assets/css/bootstrap/bootstrap.css">
    	<link rel="icon" type="imagem.png" href="../imagens/icone.png" />
	</head>
	<body>

		<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navBar" aria-controls="navBar" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
		    <div class="collapse navbar-collapse justify-content-md-end" id="navBar">
		    	<ul class="navbar-nav">
		    		<li class="nav-item">
		    			<a class="nav-link" href="ViewListar.php">Listar</a>
		    		</li>
		    		<li class="nav-item">
		    			<a class="nav-link" href="ViewCadastrar.php">Cadastrar</a>
		    		</li>
		    	</ul>
		    </div>
		</nav>>

		<main role="role" class="container">
			<div class="row">
				<div class="col-md-12">
					<form action="../controller/UsuariosController.php" method="POST" enctype="multipart/form-data">
						<legend>Formulário de edição de Usuários</legend>
						<input type="hidden" name= "acao" value="editar">
						<input type="hidden" name= "id" value="<?php echo $RowUsuarios['id']; ?>">
						<div class="row">

							<div class="col-lg-6 col-sm-12">
								<div class="form-group">
									<label>Nome</label>
									<input type="text" class="form-control" name= "nome" placeholder="" autocomplete="off" value="<?php echo $RowUsuarios['nome']; ?>">
								</div>
								<div class="form-group">
									<label>Telefone</label>
									<input type="text" class="form-control" name= "telefone" placeholder="" autocomplete="off" value="<?php echo $RowUsuarios['telefone']; ?>">
								</div>
								<div class="form-group">
									<label>Email</label>
									<input type="text" class="form-control" name= "email" placeholder="" autocomplete="off" value="<?php echo $RowUsuarios['email']; ?>">
								</div>
								<div class="form-group">
									<label>Cidade</label>
									<input type="text" class="form-control" name= "cidade" placeholder="" autocomplete="off" value="<?php echo $RowUsuarios['cidade']; ?>">
								</div>
								<div class="form-group">
									<label>Estado</label>
									<input type="text" class="form-control" name= "estado" placeholder="" autocomplete="off" value="<?php echo $RowUsuarios['estado']; ?>">
								</div>
								<div class="form-group">
									<label>Categoria</label>
									<input type="text" class="form-control" name= "categoria" placeholder="" autocomplete="off" value="<?php echo $RowUsuarios['categoria']; ?>">
								</div>
							</div>
						</div>
						<button type="submit" class="btn btn-primary">Salvar</button>
						<a class="btn btn-danger" href="ViewListar.php">Cancelar</a>
					</form>
				</div>
			</div>
		</main>

		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="../assets/js/bootstrap/bootstrap.js"></script>
	</body>
</html>
