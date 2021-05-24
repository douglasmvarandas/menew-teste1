<?php
	$acao ='recuperar';
	$acao2='procura';
	require "../app_agenda/privado/agenda_controller.php";
	///////////////////////////////////////////////////////////////////////////////PESQUISAR
	if(isset($_GET['search']) && $acao2='procura'){
		$search=$_POST['search'];
		$pesquisa=$agendaServico->pesquisarContato($search);
	}

?>

<html>
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>App Agenda Contatos</title>

		<link rel="stylesheet" href="css/estilo.css">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
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
						<li class="list-group-item active  border-primary "><a class="pr-3" href="#">Todos os Contatos</a></li>
						<li class="list-group-item "><a class="pr-3" href="novo_cadastro.php">Cadatrar Novo Contato</a></li>
					</ul>
				</div>

				<div class="col-md-9 col-sm-12">
					<div class="pagina">
						<div class="row">
							<div class="col-md-6">
								<h3 class="text-primary">Meus Contatos</h3>
							</div>

							<div class="col-md-6">
								<form method="post" action="index.php?search=1" class="form-inline">
								 <input class="form-control mr-2" type="search" name="search" placeholder="Pesquisar Nome">
								 <button class="btn-lg bg-primary text-light" type="submit"> <i class="fas fa-search fa-lg"></i> </button>
								</form>
							 </div>
						</div>

						<?php if(!isset($_GET['search'])&& !isset($_GET['pesquisando']) ){ foreach($listar as $indic => $valores) { ?> 
						<div class="row mb-4 d-flex align-items-center tarefa">
						 
								<div class="col-sm-10">
								 <h5><?php echo ucfirst($valores['nome']) ?> </h5>
								 <p>Telefone: <?php echo $valores['telefone']; ?> <br> E-mail: <?php echo  $valores['email'] ?> <br> Cidade: <?php echo $valores['cidade'] ?> <br> Estado: <?php echo $valores['estado'] ?><br> Categoria: <?php echo $valores['categoria'] ?></p>
								</div>
									<div class="col-sm-2 mt-2 d-flex justify-content-between">
										<a href="editar.php?id=<?php echo $valores['id_contatos'];?>"><i class="fas fa-edit fa-lg text-info"></i></a>
										<a href="excluir.php?idexcluir=<?php echo $valores['id_contatos'];?>"><i class="fas fa-trash-alt fa-lg text-danger"></i></a>
									</div>
								</div>
							<hr>
						<?php } }else if(isset($_GET['search'])&& $_GET['search']==1){foreach($pesquisa as $indice => $valores){ ?>
							<div class="row mb-4 d-flex align-items-center tarefa">
						 
								<div class="col-sm-10">
								 <h5><?php echo ucfirst($valores['nome']) ?> </h5>
								 <p>Telefone: <?php echo $valores['telefone']; ?> <br> E-mail: <?php echo  $valores['email'] ?> <br> Cidade: <?php echo $valores['cidade'] ?> <br> Estado: <?php echo $valores['estado'] ?><br> Categoria: <?php echo $valores['categoria'] ?></p>
								</div>
									<div class="col-sm-2 mt-2 d-flex justify-content-between">
										<a href="editar.php?id=<?php echo $valores['id_contatos'];?>"><i class="fas fa-edit fa-lg text-info"></i></a>
										<a href="excluir.php?idexcluir=<?php echo $valores['id_contatos'];?>"><i class="fas fa-trash-alt fa-lg text-danger"></i></a>
									</div>
								</div>
							<hr>
						<?php }} ?>	


					</div>
				</div>
			</div>
		</div>
	</body>
</html>