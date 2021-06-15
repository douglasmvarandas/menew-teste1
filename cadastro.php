<?php
include_once 'assets/includes/header.php';
?>

<div id="page-content">
    <div class="container">
        <div class="row">
            <div class="col pt-3">
                <h1>Cadastre um novo contato: </h1> <br>
                <form action="envio-insert.php" method="POST" class="mx-auto" style="width: 70%;">
                    <div class="mb-3">
                        <label for="nome" class="form-label">Nome:</label>
                        <input type="name" class="form-control" id="exampleInputEmail1" placeholder="Digite seu nome:" name="nome" required>
                    </div>
                    <div class="mb-3">
                        <label for="telefone" class="form-label">Telefone:</label>
                        <input type="telephone" class="form-control" name="telefone" placeholder="(xx)xxxxxxxxx" name="telefone" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">E-mail:</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="name@example.com" name="email">
                    </div>
                    <div class="mb-3">
                        <label for="cidade" class="form-label">Cidade:</label>
                        <input type="text" class="form-control" placeholder="Digite o nome de sua cidade:" name="cidade" required>
                    </div>
                    <div class="mb-3">
                        <label for="estado" class="form-label">Estado:</label>
                        <select class="form-control" name="estado" required>
                            <option selected disabled>Escolha seu estado:</option>
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
                        <select class="form-control" name="categoria" required>
                            <option selected disabled>Escolha sua categoria:</option>
                            <option value="Cliente">Cliente</option>
                            <option value="Fornecedor">Fornecedor</option>
                            <option value="Funcionário">Funcionário</option>
                        </select>
                    </div>

                    <div class="d-flex justify-content-between">
                        <a href="index.php" class="btn btn-primary">Início</a>
                        <button type="submit" class="btn btn-success">Salvar</button>

                    </div>

                </form>


            </div>
        </div>
    </div>

</div>


<?php
include_once 'assets/includes/footer.php';
?>