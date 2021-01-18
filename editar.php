<?php 
    session_start();
    require_once("heade.php");
	require_once('database/dbConnect.php');

    $objDb = new db();
    $link = $objDb->conecta_mysql();

	$id = $_GET['id'];
    $consulta = "SELECT * FROM agendars WHERE id = $id";
    $editarAgendamento = mysqli_query($link, $consulta);
    $editarAgenda = mysqli_fetch_assoc($editarAgendamento);
?>
<body>
	<div class="campoAgendamentos">
		<a href="pesquisar.php" style="text-align:center;">VOLTAR</a>
		<hr>
		<form method="post" action="editarAgendamento.php" id="formCadastrarse">
            <input type="hidden" name="id" value="<?php echo $editarAgenda['id']; ?>">

			<div class="form-group">
				<label class="form-label">Nome: </label>
				<input type="text" class="form-control" id="nome" name="nome" required="requiored" value="<?php echo $editarAgenda['nome']; ?>">
			</div>
			
			<div class="form-group">
				<label class="form-label">Telefone: </label>
				<input type="text" class="form-control" id="telefone" name="telefone" required="requiored" value="<?php echo $editarAgenda['telefone']; ?>">
			</div>

			<div class="form-group">
				<label class="form-label">E-Mail: </label>
				<input type="text" class="form-control" id="email" name="email" required="requiored" value="<?php echo $editarAgenda['email']; ?>">
			</div>

			<div class="form-group">
				<label class="form-label">Cidade: </label>
				<input type="text" class="form-control" id="cidade" name="cidade" required="requiored" value="<?php echo $editarAgenda['cidade']; ?>">
			</div>

			<div class="form-group">
				<label class="form-label">Estados: </label>
				<select class="form-control" name="estado" class="form-select">
					<option><?php echo $editarAgenda['estado']; ?></option>
					<option value="Paraíba">Paraíba</option>
					<option value="Pernambuco">Pernambuco</option>
					<option value="Rio Grande Do Norte">Rio Grande Do Norte</option>
					<option value="Alagoas">Alagoas</option>
					<option value="Ceará">Ceará</option> 
				</select>
			</div>

			<div class="form-group">
			<label class="form-label">Categoria: </label>
				<select class="form-control" name="categoria" class="form-select" aria-label="Default select example">
					<option><?php echo $editarAgenda['categoria']; ?></option>
					<option value="Cliente">Cliente</option>
					<option value="Fornecedor">Fornecedor</option>
					<option value="Funcionário">Funcionário</option>
				</select>
			</div>
			<hr>
			<a href="">
				<button type="submit" class="btn btn-danger form-control buttonAgendar">ATUALIZAR</button>
			</a>
		</form>
	</div>
</body>
