<?php
    require_once("../controller/Util.php");
    $Util = new Util();

    require_once("../dao/UsuariosDAO.php");
    $UsuariosDAO = new UsuariosDAO();

    $stmtUsuarios = $UsuariosDAO->runQuery("SELECT * FROM usuarios");
    $stmtUsuarios->execute();

?>

<!DOCTYPE html>
<html>
	<head>
		<title>Teste 1 - Menew</title>
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
                    <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Pesquise pelo nome dos membros...">
                    <table id="myTable">
                    <tr class="header">
                        <th>#</th>
                        <th>Nome</th>
                        <th>Telefone</th>
                        <th>Email</th>
                        <th>Cidade</th>
                        <th>Estado</th>
                        <th>Categoria</th>
                        <th>Opções</th>
                    </tr>
							<?php
								//Retorna uma matriz indexada pelo nome da coluna conforme resultado retornado pela execução da instrução SQL
								while ($RowUsuarios = $stmtUsuarios->fetch(PDO::FETCH_ASSOC)) {
									echo
										'<tr>
											<td>'.$RowUsuarios["id"].'</td>
											<td>'.$RowUsuarios["nome"].'</td>
											<td>'.$Util->mask("(##)#####-####", $RowUsuarios["telefone"]).'</td>
											<td>'.$RowUsuarios["email"].'</td>
											<td>'.$RowUsuarios["cidade"].'</td>
											<td>'.$RowUsuarios["estado"].'</td>
                      <td>'.$RowUsuarios["categoria"].'</td>
											<td>
												<a class="btn btn-primary" href="ViewEditar.php?id='.$RowUsuarios["id"].'">Editar</a>
												<a class="btn btn-danger" href="ViewExcluir.php?id='.$RowUsuarios["id"].'">Excluir</a>
											</td>
										</tr>';
							    }
							?>
					</table>
				</div>
			</div>
		</main>

		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="../assets/js/bootstrap/bootstrap.js"></script>
	</body>
</html>

<style>
#myInput {
    background-image: url('/css/searchicon.png'); /* Add a search icon to input */
    background-position: 10px 12px; /* Position the search icon */
    background-repeat: no-repeat; /* Do not repeat the icon image */
    width: 100%; /* Full-width */
    font-size: 16px; /* Increase font-size */
    padding: 12px 20px 12px 40px; /* Add some padding */
    border: 1px solid #ddd; /* Add a grey border */
    margin-bottom: 12px; /* Add some space below the input */
}

#myTable {
    border-collapse: collapse; /* Collapse borders */
    width: 100%; /* Full-width */
    border: 1px solid #ddd; /* Add a grey border */
    font-size: 18px; /* Increase font-size */
}

#myTable th, #myTable td {
    text-align: left; /* Left-align text */
    padding: 12px; /* Add padding */
}

#myTable tr {
    /* Add a bottom border to all table rows */
    border-bottom: 1px solid #ddd;
}

#myTable tr.header, #myTable tr:hover {
    /* Add a grey background color to the table header and on hover */
    background-color: #f1f1f1;
}
</style>

<script>
function myFunction() {
  // Declare variables
  var input, filter, table, tr, td, i;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[1]; //escolher qual coluna vai pesquisar
    if (td) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }
}
</script>
