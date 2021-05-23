<?php 
	require_once("heade.php");
?>
<body>
	<div class="campoAgendamentos">
		<a href="index.php" style="text-align:center;">VOLTAR</a>
		<hr>
		<form method="post" action="agendamento.php" id="formCadastrarse">

			<div class="form-group">
				<label class="form-label">Nome: </label>
				<input type="text" class="form-control" id="nome" name="nome" placeholder="Nome" required="requiored">
			</div>

			<div class="form-group">
				<label class="form-label">Telefone: </label>
				<input type="text" class="form-control" id="telefone" name="telefone" placeholder="83 988008800" required="requiored">
			</div>

			<div class="form-group">
				<label class="form-label">E-Mail: </label>
				<input type="text" class="form-control" id="email" name="email" placeholder="emial@email.com" required="requiored">
			</div>

			<div class="form-group">
				<label class="form-label">Cidade: </label>
				<input type="text" class="form-control" id="cidade" name="cidade" placeholder="Ex: João Pessoa" required="requiored">
			</div>

			<div class="form-group">
				<label class="form-label">Estados: </label>
				<select class="form-control" name="estado" class="form-select" aria-label="Default select example">
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
					<option value="Cliente">Cliente</option>
					<option value="Fornecedor">Fornecedor</option>
					<option value="Funcionário">Funcionário</option>
				</select>
			</div>
			<hr>
			<a href="">
				<button type="submit" class="btn btn-danger form-control buttonAgendar">AGENDAR</button>
			</a>
		</form>
	</div>
</body>