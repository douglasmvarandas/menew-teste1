<?php
    $acao='editar';
	require "privado/agenda_controller.php";  
?>

<html>
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>App Agenda Contatos | Editar</title>

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

        <main class="container">
 <?php if(isset($_GET['id'])){foreach ($contatoID as $indice =>$valor){;
     ?>      
<form  class="mt-5"method="post" action="privado/agenda_controller.php?editaid=<?php echo $valor['id_contatos']?>">

<div class="row">
 <div class="col">
    <div class="form-group">
    <label>Nome:</label>
        <input type="text" name='nome' class="form-control" value="<?php echo $valor['nome'];?>" required>
    </div>
    <div class="row">
    <div class="col-md-6">
    <div class="form-group">
        <label>E-mail</label>
        <input type="email" name='email' value="<?php echo $valor['email'];?>" class="form-control"  required>
    </div>
    </div>
    
    <div class="col-md-6">
    <div class="form-group">
        <label>Telefone:</label>
        <input type="tel" id="celular" name="telefone" value="<?php echo $valor['telefone'];?>" class="form-control" required>
    </div>
    </div>
    </div>

    <div class="row">
    <div class="col-md-3">
    <div class="form-group">
        <label>Cidade:</label>
        <input type="text" name="cidade" value="<?php echo $valor['cidade'];?>" class="form-control" required>
    </div>
    </div>
    
    <div class="col-md-3">
    <div class="form-group">
        <label>Estado:</label>
        <select name="estado" value="<?php echo $valor['estado'];?>" class="form-control" required>
            <option>Amazonas</option>
            <option>São Paulo</option>
            <option>Rio de Janeiro</option>
            <option>Ceará</option>
            <option>Goiás</option>
        </select>
    </div>
    </div>
    <div class="col-md-6">
    <div class="form-group">
        <label>Categoria:</label>
        <select name="categoria" value="<?php echo $valor['categoria'];?>" class="form-control" required>
            <option>Cliente</option>
            <option>Fornecedor</option>
            <option>Funcionário</option>
        </select>
    </div>
    </div>
    </div>
</div>
</div>
<button class="btn btn-outline-primary mt-3" type='submit'>Editar</button>
<a href="index.php"  class="btn btn-outline-primary mt-3" disabled>Voltar</a>
</form>

<?php } }else{ ?>
    <form  class="mt-5">

    <div class="row">
     <div class="col">
        <div class="form-group">
        <label>Nome:</label>
            <input type="text" class="form-control" disabled>
        </div>
        <div class="row">
        <div class="col-md-6">
        <div class="form-group">
            <label>E-mail</label>
            <input type="email" class="form-control" disabled>
        </div>
        </div>
        
        <div class="col-md-6">
        <div class="form-group">
            <label>Telefone:</label>
            <input type="tel" id="celular"  class="form-control" disabled>
        </div>
        </div>
        </div>
    
        <div class="row">
        <div class="col-md-3">
        <div class="form-group">
            <label>Cidade:</label>
            <input type="text" class="form-control" disabled>
        </div>
        </div>
        
        <div class="col-md-3">
        <div class="form-group">
            <label>Estado:</label>
            <select  class="form-control" disabled>
                <option>Amazonas</option>
                <option>São Paulo</option>
                <option>Rio de Janeiro</option>
                <option>Ceará</option>
                <option>Goiás</option>
            </select>
        </div>
        </div>
        <div class="col-md-6">
        <div class="form-group">
            <label>Categoria:</label>
            <select class="form-control" disabled>
                <option>Cliente</option>
                <option>Fornecedor</option>
                <option>Funcionário</option>
            </select>
        </div>
        </div>
        </div>
    </div>
    </div>

    <div class="text-success">Dados Cadastrados com Sucesso</div>

    <button class="btn btn-outline-primary mt-3" type='submit' disabled>Editar</button>
    <a href="index.php"  class="btn btn-outline-primary mt-3" disabled>Voltar</a>
    </form>
<?php } ?> 
</main>
</body>
</html>