<?php
include_once 'assets/includes/header.php';
include "connect-bd.php";

$id = $_GET['id'] ?? '';
$sql = "SELECT * FROM pessoas WHERE id = $id";

$dados = mysqli_query($connection, $sql);
$row = mysqli_fetch_assoc($dados);
?>

<div id="page-content">

    <div class="container">
        <div class="row">
            <div class="col pt-3">
                <h1>Edição</h1> <br>
                <form action="envio-update.php" method="POST" class="mx-auto" style="width: 70%;">
                    <div class="mb-3">
                        <label for="nome" class="form-label">Nome:</label>
                        <input type="name" class="form-control" id="exampleInputEmail1" placeholder="Digite seu nome:" name="nome" required value="<?php echo $row['nome'] ?>">
                    </div>
                    <div class="mb-3">
                        <label for="telefone" class="form-label">Telefone:</label>
                        <input type="telephone" class="form-control" name="telefone" placeholder="(xx)xxxxxxxxx" name="telefone" required value=" <?php echo $row['telefone'] ?>">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">E-mail:</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="name@example.com" name="email" value=" <?php echo $row['email'] ?>">
                    </div>
                    <div class="mb-3">
                        <label for="cidade" class="form-label">Cidade:</label>
                        <input type="text" class="form-control" placeholder="Digite o nome de sua cidade:" name="cidade" required value=" <?php echo $row['cidade'] ?>">
                    </div>
                    <div class="mb-3">
                        <label for="estado" class="form-label">Estado:</label>
                        <select class="form-control" name="estado" value=" <?php echo $row['estado'] ?>">
                            <option selected value="<?php echo $row['estado'] ?>"><?php echo $row['estado'] ?></option>
                            <option value="PB">PB</option>
                            <option value="PE">PE</option>
                            <option value="RN">RN</option>
                            <option value="CE">CE</option>
                            <option value="SE">SE</option>
                            <option value="BA">BA</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="estado" class="form-label">Categoria:</label>
                        <select class="form-control" name="categoria" value="<?php echo $row['categoria'] ?>">
                            <option selected value="<?php echo $row['categoria'] ?>"><?php echo $row['categoria'] ?></option>
                            <option value="Cliente">Cliente</option>
                            <option value="Fornecedor">Fornecedor</option>
                            <option value="Funcionário">Funcionário</option>
                        </select>
                    </div>

                    <div class="d-flex flex-row-reverse">
                        <button type="submit" class="btn btn-success">Salvar alterações</button>
                        <input type="hidden" name="id" value="<?php echo $row['id'] ?>">

                    </div>

                </form>


            </div>
        </div>
    </div>

</div>

<?php
include_once 'assets/includes/footer.php';
?>