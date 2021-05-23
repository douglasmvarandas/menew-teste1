<?php
    include 'connect/connect.php';
    $id = $_GET['id'];

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Agenda | Atualizar Cadastro</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/cadastro.css">
</head>
<bod>
    <div>
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
            <div class="container-fluid">
                <a class="navbar-brand" href="index.php">Agenda</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="index.php">Início</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="cadastro.php">Cadastrar</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="listar.php">Listar</a>
                    </li>
                </ul>
                </div>
            </div>
        </nav>
    </div>

    <div class="container-fluid container" style="margin-bottom: 100px;">
        <h4>
            <p style="padding-top: 10px;">Atualizar Cadastro</p>
        </h4>
        <form action="_atualizar_cadastro.php" method="post">

            <?php
                $sql = "SELECT * FROM `agenda` WHERE id_agenda = $id";
                $listar = mysqli_query($connect, $sql);
                while ($array = mysqli_fetch_array($listar)){
                    $id_agenda = $array['id_agenda'];
                    $nome = $array['nome'];
                    $tel = $array['tel'];
                    $email = $array['email'];
                    $cidade = $array['cidade'];
                    $estado = $array['estado'];
                    $categoria = $array['categoria'];
                
            ?>
            <!--nome-->
            <div class="mb-3">
                <label class="form-label">Nome</label>
                <input type="text" class="form-control" name="nome" value="<?php echo $nome ?>" required>
                <input type="text" class="form-control" name="id" value="<?php echo $id ?>" style="display: none;">
            </div>
            <!--telefone-->
            <div class="mb-3">
                <label class="form-label">Telefone</label>
                <input type="number" class="form-control" name="tel" value="<?php echo $tel ?>" required>
            </div>
            <!--email-->
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email</label>
                <input type="email" class="form-control" name="email" id="exampleInputEmail1" value="<?php echo $email ?>" required>
            </div>
            <!--cidade-->
            <div class="mb-3">
                <label class="form-label">Cidade</label>
                <input type="text" class="form-control" name="cidade" value="<?php echo $cidade ?>" required>
            </div>
            <!--estado-->
            <div class="mb-3">
                <label class="form-label">Estado</label>
                <select class="form-control" name="estado" style="width: 100%;" value="<?php echo $estado ?>" required>
						<option></option>
						<option>Alogoas</option>
						<option>Bahia</option>
						<option>Ceará</option>
						<option>Maranhão</option>
						<option>Paraíba</option>
				</select>
            </div>
            <!--categoria-->
            <div class="mb-3">
                <label class="form-label">Categoria</label>
                <select class="form-control" name="categoria" value="<?php echo $categoria ?>" required>
						<option></option>
						<option>Cliente</option>
						<option>Fornecedor</option>
						<option>Funcionário</option>
			    </select>
            </div>
            <button type="submit" class="but">Atualizar</button>

            <?php } ?>
        </form>
    </div>

    
    <script type="text/javascript" src="js/bootstrap.js"></script>

</body>
</html>