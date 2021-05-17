<!DOCTYPE html>
<html>
	<head>
		<title>Cadastrar Usuario</title>
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
		</nav>

		<main role="role" class="container">
			<div class="row">
				<div class="col-md-12">
					<form action="../controller/UsuariosController.php" method="POST" enctype="multipart/form-data">
						<legend>Cadastro de Usuários</legend>
						<input type="hidden" name= "acao" value="adicionar">
						<div class="row">
							<div class="col-lg-3 col-sm-12">
								<div class="form-group">
									<label>Nome</label>
									<input type="text" class="form-control" name="nome" placeholder="Informe seu nome completo" autocomplete="off">
								</div>
								<div class="form-group">
									<label>Telefone</label>
									<input type="text" class="form-control" name="telefone" placeholder="(99)99999-9999" autocomplete="off" maxlength="12">
								</div>
								<div class="form-group">
									<label>Email</label>
									<input type="text" class="form-control" name="email" placeholder="fulano@hotmail.com" autocomplete="off" maxlength="">
								</div>
								<div class="form-group">
									<label>Cidade</label>
									<input type="text" class="form-control" name="cidade" placeholder="" autocomplete="off" maxlength="">
								</div>
								<div class="form-group">
									<label>Estado</label>
										<select name="estado">
  										<option value="Minas Gerais">Minas Gerais</option>
  										<option value="Sao Paulo">São Paulo</option>
  										<option value="Rio de Janeiro">Rio de Janeiro</option>
  										<option value="Santa Catarina">Santa Catarina</option>
											<option value="Espirito Santo">Espirito Santo</option>
										</select>
									<!--<input type="text" class="form-control" name="estado" placeholder=" " autocomplete="off">-->
								</div>
								<div class="form-group">
									<label>Categoria</label>
										<select name="categoria">
											<option value="Cliente">Cliente</option>
											<option value="Fornecedor">Fornecedor</option>
											<option value="Funcionario">Funcionario</option>
										</select>
									<!-- <input type="text" class="form-control" name="categoria" placeholder=" " autocomplete="off"> -->
								</div>
							</div>
						</div>
						<button type="submit" class="btn btn-primary">Cadastrar</button>
						<a class="btn btn-danger" href="ViewListar.php">Cancelar</a>
					</form>
				</div>
			</div>
		</main>

		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="../assets/js/bootstrap/bootstrap.js"></script>
	</body>
</html>
