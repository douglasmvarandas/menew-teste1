<html>
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>App Agenda Contatos | Cadastrar</title>

		<link rel="stylesheet" href="css/estilo.css">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>

    <script type="text/javascript">
    $("#celular").mask("(00) 00000-0000");
    </script>
	</head>

	<body>
	<nav class="navbar navbar-dark bg-primary">
			<div class="container">
				<a class="navbar-brand" href="#">
				<i class="far fa-address-book fa-lg d-inline-block mt-"></i> Minha Agenda de Contatos
				</a>
			</div>
		</nav>
				<div class="container app">
			<div class="row">
				<div class="col-md-3 menu sticky-top">
					<ul class="list-group">
						<li class="list-group-item "><a class="pr-3" href="index.php">Todos os Contatos</a></li>
						<li class="list-group-item active border-primary"><a class="pr-3" href="#">Cadatrar Novo Contato</a></li>
					</ul>
				</div>


				<div class="col-md-9">
					<div class="container pagina">
						<div class="row">
							<div class="col">
								<h3 class="text-primary">Novo Contato</h3>
								<hr />

								<form method="post" action="privado/agenda_controller.php?acao=inserir">

								<div class="row">
								 <div class="col">
									<div class="form-group">
									<label>Nome:</label>
										<input type="text" name='nome' class="form-control" placeholder="Seu nome Completo" required>
									</div>
									<div class="row">
								    <div class="col-md-6">
									<div class="form-group">
										<label>E-mail</label>
										<input type="email" name='email' class="form-control" placeholder="example@example.com" required>
									</div>
									</div>
									
								    <div class="col-md-6">
									<div class="form-group">
										<label>Telefone:</label>
										<input type="tel" id="celular" name="telefone" class="form-control" placeholder="(xx) xxxxx-xxxx" required>
									</div>
									</div>
									</div>

									<div class="row">
								    <div class="col-md-3">
									<div class="form-group">
										<label>Cidade:</label>
										<input type="text" name="cidade" class="form-control" placeholder="Manaus" required>
									</div>
									</div>
									
								    <div class="col-md-3">
									<div class="form-group">
										<label>Estado:</label>
										<select name="estado" class="form-control" required>
											<option>Amazonas</option>
											<option>São Paulo</option>
											<option>Rio de Janeiro</option>
											<option>Ceará</option>
											<option>Goiás</option>
										</select>
									</div>
									</div>
									</div>

									<div class="row">
									<div class="col-md-6">
									<div class="form-group">
										<label>Categoria:</label>
										<select name="categoria" class="form-control" required>
											<option>Cliente</option>
											<option>Fornecedor</option>
											<option>Funcionário</option>
										</select>
									</div>
									</div>
									</div>
								</div>
								
									
								
							</div>
							<?php if(isset($_GET['cadastro']) && $_GET['cadastro'] == 1){?>
								<div class="text-success">Cadastrado Com Sucesso !</div>
							<?php } ?>
							<button class="btn btn-outline-primary" type='submit'>Cadastrar</button>
								</form>
							</div>
						
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>