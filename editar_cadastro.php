<?php 
	include "conexao.php";


	$id = $_GET['id'];
    $query = mysqli_query($conn, "SELECT * FROM pessoas WHERE cod_pessoas=$id");
    $data = mysqli_fetch_assoc($query);

?>

<html>
    <head>
        <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta nome="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <title>Editar cadastro</title>
    <link rel="shortcut icon" href="imagens/pessoas.png">
    </head>
    <body>
    <div class="container col-md-12" style="max-width:400px;margin-top:100px;" align="center">
    <h2>Editar Cadastro</h2>
		<hr>
		<form method="post" action="salvar_edicao.php" id="formCadastrarse">
            <input type="hidden" name="id" value="<?php echo $data['cod_pessoas']; ?>">

			<div class="form-group">
				<label class="form-label">Nome: </label>
				<input type="text" class="form-control" id="nome" name="nome" value="<?php echo $data['nome']; ?>" required>
			</div>

			<div class="form-group">
				<label class="form-label">Telefone: </label>
				<input type="text" class="form-control" id="telefone" name="telefone" value="<?php echo $data['telefone']; ?>" onkeypress="mask(this, telmask);" onblur="mask(this, telmask);" required>
			</div>

			<div class="form-group">
				<label class="form-label">E-mail: </label>
				<input type="email" class="form-control" id="email" name="email" value="<?php echo $data['email']; ?>" required>
			</div>

			<div class="form-group">
				<label class="form-label">Cidade: </label>
				<input type="text" class="form-control" id="cidade" name="cidade" value="<?php echo $data['cidade']; ?>" required>
			</div>

			<div class="form-group">
				<label class="form-label">Estado: </label>
				<select class="form-control" name="estado" class="form-select">
					<option><?php echo $data['estado']; ?></option>
					<option value="Paraíba">PB</option>
					<option value="PE">PE</option>
					<option value="RN">RN</option>
					<option value="AL">AL</option>
					<option value="BA">BA</option> 
				</select>
			</div>

			<div class="form-group">
			<label class="form-label">Categoria: </label>
				<select class="form-control" name="categoria" class="form-select">
					<option><?php echo $data['categoria']; ?></option>
					<option value="Cliente">Cliente</option>
					<option value="Fornecedor">Fornecedor</option>
					<option value="Funcionário">Funcionário</option>
				</select>
			</div>
			<hr>
			<a href="">
				<button type="submit" class="btn btn-success form-contro">ATUALIZAR</button>
                <a href="consulta.php" class="btn btn-primary">Voltar</a>
			</a>
		</form>
	</div>
    <script type="text/javascript">
    function mask(o, f) {
  setTimeout(function() {
    var v = telmask(o.value);
    if (v != o.value) {
      o.value = v;
    }
  }, 1);
}

function telmask(v) {
  var r = v.replace(/\D/g, "");
  r = r.replace(/^0/, "");
  if (r.length > 10) {
    r = r.replace(/^(\d\d)(\d{5})(\d{4}).*/, "($1) $2-$3");
  } else if (r.length > 5) {
    r = r.replace(/^(\d\d)(\d{4})(\d{0,4}).*/, "($1) $2-$3");
  } else if (r.length > 2) {
    r = r.replace(/^(\d\d)(\d{0,5})/, "($1) $2");
  } else {
    r = r.replace(/^(\d*)/, "($1");
  }
  return r;
}
    </script>  
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
    </body>
</html>     
