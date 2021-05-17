<?php include("db.php"); ?>

<?php include('includes/header.php'); ?>

<main class="container p-4">
  <div class="row">
    <div class="col-md-4">
      <!-- MESSAGES -->

      <?php if (isset($_SESSION['message'])) { ?>
      <div class="alert alert-<?= $_SESSION['message_type']?> alert-dismissible fade show" role="alert">
        <?= $_SESSION['message']?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?php session_unset(); } ?>

      <!-- FORM PESQUISA -->
      <div class="card card-body">          
          <form method="POST" action="">                    
            <h5>Pesquisa</h5>
            <div class="form-group">              
              <input type="text" name="entrada" class="form-control" placeholder="Ex: Recife">
            </div>    

            <div class="form-group">                       
             <input type="submit" name="submit" class="btn btn-success btn-block" value="Pesquisar">
            </div>
        </form> 
      </div> 
      <!-- FIM - FORM PESQUISA -->
<br>
      <!-- FORMULARIO CADASTRO -->
      <div class="card card-body">
        <form action="save.php" method="POST">
          <h5>Novo Cadastro</h5>
          <div class="form-group">
            <input type="text" name="nome" class="form-control" placeholder="Nome" required="required" autofocus>
          </div>
          <div class="form-group">            
             <input type="tel" pattern="\d*" name="telefone" class="form-control" placeholder="Telefone" required="required">
          </div>
          <div class="form-group">
            <input type="email" name="email" class="form-control" placeholder="Email" required="required" autofocus>
          </div>
          <div class="form-group">
            <input type="text" name="cidade" class="form-control" placeholder="Cidade" required="required" autofocus>
          </div>

          <div class="form-group">
            Estado:
            <select name="estado" class="form-select" aria-label="Default select example">         
              <option>São Paulo</option>
              <option>Rio de Janeiro</option>
              <option>Recife</option>
              <option>Piaui</option>
              <option>Bahia</option>
            </select>
          </div>

          <div class="form-group">
            Categoria:
            <select name="categoria" class="form-select" aria-label="Default select example">      
              <option>Cliente</option>
              <option>Fornecedor</option>
              <option>Funcionario</option>
            </select>
          </div>
          <input type="submit" name="save" class="btn btn-success btn-block" value="Salvar">
        </form> 
      </div>
      <!-- FIM FORMULARIO CADASTRO-->

    <!-- TABELA COM DADOS DO BANCO-->
    </div>
    <div class="col-md-8">
      <div class="table-responsive">
        <table class="table table-bordered">
          <thead>
            <tr>
              <th>Nome</th>
              <th>Telefone</th>
              <th>Email</th>
              <th>Cidade</th>
              <th>Estado</th>
              <th>Categoria</th>
              <th>Ação</th>
            </tr>
          </thead>
          <body>

            <?php

            //CONFERE SE EXISTE ENTRADA NO CAMPO PESQUISA
            if ( isset( $_POST['entrada'] ) )
              {
                  $entrada = $_POST['entrada'];
              }
              else
              {
                  $entrada = '';
              }

            //QUERY
            $query = "SELECT * FROM cadastro WHERE `nome` LIKE '%$entrada%' or `telefone` LIKE '%$entrada%' or `email` LIKE '%$entrada%' or `cidade` LIKE '%$entrada%' or `estado` LIKE '%$entrada%' or `categoria` LIKE '%$entrada%' ";
            $result_cadastro = mysqli_query($conn, $query);    

            //IMPRIME OS RESULTADOS
            while($row = mysqli_fetch_assoc($result_cadastro)) { ?>
            <tr>
              <td><?php echo $row['nome']; ?></td>
              <td><?php echo $row['telefone']; ?></td>
              <td><?php echo $row['email']; ?></td>
              <td><?php echo $row['cidade']; ?></td>
              <td><?php echo $row['estado']; ?></td>
              <td><?php echo $row['categoria']; ?></td>
              <td>
                <a href="edit.php?id=<?php echo $row['id']?>" class="btn btn-secondary">
                  <i class="fas fa-marker"></i>
                </a>
                <a href="delete.php?id=<?php echo $row['id']?>" class="btn btn-danger">
                  <i class="far fa-trash-alt"></i>
                </a>
              </td>
            </tr>
            <?php } ?>
          </body>
        </table>
      </div>
    </div>
  </div>
</main>

<?php include('includes/footer.php'); ?>
