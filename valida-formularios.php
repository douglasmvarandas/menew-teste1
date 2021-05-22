	<?php 
		include 'header.php';
	?>

	<?php 

		function clean_input($data) {
			$cleandata = trim($data);
			$cleandata = stripslashes($cleandata);
			$cleandata = htmlspecialchars($cleandata);

			return $cleandata;
		}

	?> 
	<body>


		<center><h2>Teste 1</h2>
		<hr>
		<small>Elaborar uma aplicação de agenda para listar, cadastrar e editar informações.</small>

		<h3>Cadastro de contato</h3></center>
		
		<?php 

			if ($_SERVER['REQUEST_METHOD'] == 'POST') {#esta linha indica que quando carregamos a página de formulário com o 'REQUEST_METHOD', a gente recolhe as variáveis argumentadas (que no caso são $nome, $telefone, $email etc) 
				$nome = $_POST['nome'];
				$telefone = $_POST['telefone'];
				$email = $_POST['email'];
				$cidade = $_POST['cidade'];
				$estado = $_POST['estado'];
				$categoria = $_POST['categoria'];

				if ($nome == "") { #If de mensagem de erro para caso o usuário não preencha o campo de "nome","email" etc
					$erro_nome = "* O campo nome é obrigatório";
				} elseif ($telefone == "") {
					$erro_telefone = "* O campo telefone é obrigatório";
				} elseif ($email == "") {
					$erro_email = "* O campo email é obrigatório";
				} elseif ( filter_var($email, FILTER_VALIDATE_EMAIL) == false ) {
					$erro_email = "* O e-mail informado é inválido";
				} elseif ($cidade == "") {
					$erro_cidade = "* O campo cidade é obrigatório";
				} else { #condição indicando que, caso os dados passem em todos esses testes, eles são coletados e os campos passam a ser limpados com o código abaixo
					$nome = clean_input($nome); #A função "clean_input" serve para limpar o campo caso chegue nessa condição"
					$telefone = clean_input($telefone);
					$email = clean_input($email);
					$cidade = clean_input($cidade);

					#Inicialmente vamos definir uma variável a cada recurso que utilizaremos
					$server = 'localhost';
					$user = 'root';
					$password = 'root';
					$dbname = 'testemenew';
					$port = '8889';			

					$db_connect = new mysqli($server, $user, $password, $dbname, $port); #comando de banco de dados sqli já integrado à linguagem de programação PHP

					if ($db_connect->connect_error == true) {
						$msg_envio = "Não foi possível enviar o formulário. " . $db_connect->connect_error; #caso você queira identificar erro de conexão em testes, você pode concatenar esta linha com o "$db_connect->connect_error;"
					} else {
						$sql = 	"INSERT INTO contatos (nome, telefone, email, cidade, estado, categoria) VALUES ('$nome', '$telefone', '$email', '$cidade', '$estado', '$categoria')"; #Variável indexada a argumentos que envolvem integração entre o código e o banco de dados.
						
						if ($db_connect->query($sql) == true) { #mensagem de confirmação caso os dados tenham sido enviados para o banco de dados.
							$msg_envio = "Formulário enviado com sucesso.";
							$nome = NULL; #Esta linha e as seguintes servem para que o campo preenchido pelo usuário seja limpo caso dê certo o envio dos dados para o banco de dados.
							$telefone = NULL;
							$email = NULL;
							$cidade = NULL;
						} else {
							$msg_envio = "Não foi possível enviar o formulário. " . mysqli_error($db_connect); #Caso você queira identificar um possível erro com a transferência de dados para o banco de dados, basta concatenar esta linha com "mysqli_error($db_connect);"
						}
					}

				}
			}

		?>

		<center><form action="valida-formularios.php" method="post">
			
			Nome: *
			<br>
			<input type="text" name="nome" class="field" value="<?php echo $nome; ?>">
			<br>
			<div class="erro-form"><?php echo $erro_nome; ?></div>
			<br>

			Telefone: *
			<br>
			<input type="tel" name="telefone" class="field" value="<?php echo $telefone; ?>">
			<br>
			<div class="erro-form"><?php echo $erro_telefone; ?></div>
			<br>
			
			E-mail: *
			<br>
			<input type="text" name="email" class="field" value="<?php echo $email; ?>">
			<br>
			<div class="erro-form"><?php echo $erro_email; ?></div>
			<br>

			Cidade: *
			<br>
			<input type="text" name="cidade" class="field" value="<?php echo $cidade; ?>">
			<br>
			<div class="erro-form"><?php echo $erro_cidade; ?></div>
			<br>

			Estado: *
			<br>
			<input type="hidden" name="estado" class="field" value="<?php echo $estado; ?>">
			<select name="estado" id="estado">
				<option value="paraiba">Paraíba</option>
				<option value="pernambuco">Pernambuco</option>
				<option value="alagoas">Alagoas</option>
				<option value="sergipe">Sergipe</option>
				<option value="bahia">Bahia</option>
			</select>
			<br>
			<br>

			Categoria: *
			<br>
			<select name="categoria" id="categoria">
				<option value="cliente">Cliente</option>
				<option value="fornecedor">Fornecedor</option>
				<option value="funcionario">Funcionário</option>
			</select>
			<br><br>

			<input type="submit" name="submit" class="submit"><br>
			<div class="sucesso-form"><?php echo $msg_envio; ?></div>

		</form></center>

	</body>

</html>