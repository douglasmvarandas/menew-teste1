<?php
    require_once("../dao/UsuariosDAO.php");

    $UsuariosDAO = new UsuariosDAO();
    $stmtUsuarios = $UsuariosDAO->runQuery("SELECT * FROM usuarios WHERE id = '".$_REQUEST['id']."'");
    $stmtUsuarios->execute();
    $RowUsuarios = $stmtUsuarios->fetch(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html>
	<head>
		<title>Exclusão de Usuarios</title>
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
		    			<a class="nav-link" href="ViewListarMembro.php">Listar</a>
		    		</li>
		    		<li class="nav-item">
		    			<a class="nav-link" href="ViewFormCadastrarMembro.php">Cadastrar</a>
		    		</li>
		    	</ul>
		    </div>
		</nav>

		<main role="role" class="container">
			<div class="row">
				<div class="col-md-12">
					<form action="../controller/UsuariosController.php" method="POST" enctype="multipart/form-data">
						<legend>Confirmação de exclusão de pessoa</legend>
						<input type="hidden" name= "acao" value="excluir">
						<input type="hidden" name= "id" value="<?php echo $RowUsuarios['id']; ?>">
						<div class="row">
							<div class="col-lg-12 col-sm-12">
								<div class="form-group">
									Deseja realmente excluir as informações do membro <b><?php echo $RowUsuarios['nome']; ?></b>?
								</div>
							</div>
						</div>
						<button type="submit" class="btn btn-primary">Excluir</button>
						<a class="btn btn-danger" href="ViewListar.php">Cancelar</a>
					</form>
				</div>
			</div>
		</main>

		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="../assets/js/bootstrap/bootstrap.js"></script>
	</body>
</html>
