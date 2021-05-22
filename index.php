<?php 
		include 'header.php';
	?>

	<body>


		<center><h2>Teste 1</h2>
		<hr>
		<small>Elaborar uma aplicação de agenda para listar, cadastrar e editar informações.</small>		

		<h3>Cadastro de contato</h3></center>

		<center><form action="valida-formularios.php" method="post">
			
			Nome: *
			<br>
			<input type="text" name="nome" class="field">
			<br><br>

			Telefone: *
			<br>
			<input type="text" name="telefone" class="field">
			<br><br>
			
			E-mail: *
			<br>
			<input type="text" name="email" class="field">
			<br><br>

			Cidade: *
			<br>
			<input type="text" name="cidade" class="field">
			<br><br>

			Estado: *
			<br>
			<input type="hidden" />
			<select name="estado" id="estado">
			<option value="paraiba">Paraíba</option>
			<option value="pernambuco">Pernambuco</option>
			<option value="alagoas">Alagoas</option>
			<option value="sergipe">Sergipe</option>
			<option value="bahia">Bahia</option>
			</select>
			<br><br>

			Categoria: *
			<br>
			<input type="hidden" />
			<select name="categoria" id="categoria">
			<option value="cliente">Cliente</option>
			<option value="fornecedor">Fornecedor</option>
			<option value="funcionario">Funcionário</option>
			</select>
			<br><br>

			<input type="submit" name="submit" class="submit"><br>

		</form></center>

	</body>

</html>