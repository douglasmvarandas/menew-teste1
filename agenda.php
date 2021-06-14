<?php 
    include_once 'assets/includes/header.php';
    include "connect-bd.php";

    if (isset($_POST['pesquisa'])) {
        $resultado = $_POST['pesquisa'];
    }
    else {
        $resultado = '';
    }

    $sql = "SELECT * FROM pessoas WHERE nome LIKE '%$resultado%'";

    $dados = mysqli_query($connection, $sql); //A variável dados vai receber todos os objetos do banco

    // function delete($nome) {
    //     $sql = "SELECT * FROM pessoas WHERE nome LIKE '%$resultado%'"
    // }
    // <?php if(isset($_GET['id']))echo "<a class='btn-danger botao' href='processo.php ? id=" echo ($_GET[id]); & 'apagar=true' id='voltar'>Apagar</a>";

?>

<div class="row d-flex bd-highlight p-5" style="flex-wrap:nowrap;">
        <h1 style="flex-shrink:2">Sua agenda</h1>
            <form class="input-group" action="agenda.php" method="POST" style="width: 400px">
                <input class="form-control mr-sm-5" type="search" placeholder="Pesquisar" aria-label="Search" name="pesquisa" autofocus>
                <button class="btn btn-primary " type="submit">Pesquisar</button>
            </form>

    </div>
<div class="container justify-content-center">
    <div class="card  p-4">
        
    
        

        <div class="d-flex flex-row justify-content-between mb-3 table-responsive">
            
        <table class="table table-hover">
            <thead>
                <tr>
                <th scope="col">Nome</th>
                <th scope="col">Telefone</th>
                <th scope="col">E-mail</th>
                <th scope="col">Cidade</th>
                <th scope="col">Estado</th>
                <th scope="col">Categoria</th>
                <th scope="col">Ações</th>
                </tr>
            </thead> 
            <tbody>
                <?php 
                    while ($row = mysqli_fetch_assoc($dados)) {
                        // Estrutura de teste
                        // foreach ($row as $key => $value) {
                        //     echo "$key: $value<br>";
                        // }
                        $id_pessoa = $row['id'];
                        $nome = $row['nome'];
                        $telefone = $row['telefone'];
                        $email = $row['email'];
                        $cidade = $row['cidade'];
                        $estado = $row['estado'];
                        $categoria = $row['categoria'];
                        // <td> <button type="button" class="btn btn-info">
                        //             <span class="glyphicon glyphicon-pencil"></span> 
                        //       </button></td>
                        echo "
                        <tr>
                            <th scope='row'>$nome</th>
                                <td>$telefone</td>
                                <td>$email</td>
                                <td>$cidade</td>
                                <td>$estado</td>
                                <td>$categoria</td>
                                <td width=150px;> 
                                    <a href='edicao.php?id=$id_pessoa' class='btn btn-outline-success'><i class='bi bi-pencil'></i></a>
                                    <a href='' class='btn btn-outline-danger' data-toggle='modal' data-target='#confirm' 
                                    onclick=" .'"' ."get_data($id_pessoa, '$nome')" .'"' ."><i class='bi bi-trash'></i></a> 
                                    
                                </td>
                        </tr>
                        ";
                    }
                ?>
            </tbody>
        </table>
    </div>
</div>


<br>
<div class="d-flex flex-row-reverse">
                    <a href="index.php" class="btn btn-primary">Início</a>
        
</div>
</div>


<div class="modal fade" id="confirm" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Confirmação</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="envio-delete.php" method="POST">
            Você realmente deseja deletar <b id="nome_pessoa">Nome</b>?
    </div>
    <div class="modal-footer d-flex justify-content-between">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            <input type="hidden" name="id" id="id_pessoa" value=""> </input>
            <input type="hidden" name="nome" id="nome_pessoas" value=""> </input>
            <input type="submit" class="btn btn-danger" value="Excluir"></input>
        </form>
      </div>

    </div>
  </div>
</div>




<script type="text/javascript">
    function get_data(id, nome) {
        document.getElementById('nome_pessoa').innerHTML = nome;
        document.getElementById('nome_pessoas').value = nome;
        document.getElementById('id_pessoa').value = id;
    }
</script>

<?php 
    include_once 'assets/includes/footer.php';
?>