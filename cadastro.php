<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Agenda | Cadastrar</title>
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
                        <a class="nav-link  active" href="cadastro.php">Cadastrar</a>
                    </li>
                    <!--<li class="nav-item">
                        <a class="nav-link" href="#"></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
                    </li>-->
                </ul>
                </div>
            </div>
        </nav>
    </div>
    <div class="display">
    <div class="container-fluid container" style="margin-bottom: 100px;">
        <h4>
            <p style="padding-top: 10px;">Cadastro</p>
        </h4>
        <form action="index.php">
            <!--nome-->
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Nome</label>
                <input type="text" class="form-control" autocomplete="off" required>
            </div>
            <!--telefone-->
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Telefone</label>
                <input type="text" class="form-control" id="exampleInputPassword1" autocomplete="off" required>
            </div>
            <!--email-->
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email</label>
                <input type="email" class="form-control" id="exampleInputEmail1" autocomplete="off" aria-describedby="emailHelp">
            </div>
            <!--cidade-->
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Cidade</label>
                <input type="text" class="form-control" autocomplete="off" required>
            </div>
            <!--estado-->
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Estado</label>
                <select class="form-control" name="estadoC" style="width: 100%;" required>
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
                <label for="exampleInputEmail1" class="form-label">Categoria</label>
                <select class="form-control" name="categoriaC" required>
						<option></option>
						<option>Cliente</option>
						<option>Fornecedor</option>
						<option>Funcionário</option>
			    </select>
            </div>
            <button type="submit" class="btn">Cadastrar</button>
        </form>
    </div>
    </div>
    


    
  
    <script type="text/javascript" src="js/bootstrap.js"></script>

</body>
</html>