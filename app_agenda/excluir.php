<?php
    $acao='excluir';
	require "privado/agenda_controller.php";  
?>

<html>
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>App Agenda Contatos | Excluir</title>

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
        <main class="container mt-5 p-5 border rounded">
		<?php if(isset($_GET['idexcluir'])){ foreach($contatoExcluir as $indice => $valores) ?>

			<div class="row">
				<div class="col justify-content-center text-center">
					<h1 class="text-primary">Você tem Certeza ?</h1> <br> <br>
					<p> <h5>deseja continuar a excluir o contato " <?php echo ucfirst($valores['nome']) ;?> " ?</h5></p>
					<br>
					<form method="post" action="privado/agenda_controller.php?excluirId=<?php echo $valores['id_contatos'];?>">
					<div class="form-group">
					<input type="hidden" class="form-control">
					</div>
					<button class="btn btn-outline-primary mt-2 mr-2" type='submit' >Sim, Excluir</button>
    				<a href="index.php"  class="btn btn-outline-primary mt-2 active">Não, Voltar</a>
					</form>
				</div>
			</div>
			
			<?php } else{ ?>

			<div class="col justify-content-center text-center">
				<h1 class="text-Success">Contato Excluido Com Sucesso !</h1>
				<form>
				<a href="index.php"  class="btn btn-outline-primary mt-2 active">Voltar</a>
				</form>
			</div>

			<?php } ?>
        </main>
    </body>
</html>