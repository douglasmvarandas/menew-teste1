<?php
include ('connect/connect.php');
include 'kj.php';
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Desafio Menew - Teste 1</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="fontawesome/css/all.min.css">
    <link rel="stylesheet" href="sweetalert2.min.css">
    <script src="kj.js"></script>

    <style>
      #navbar{
        display: flex;
        justify-content: center;
        gap: 1.3rem;
        font-size: 30px;
        background-color: rgba(0, 0, 0, 0.1);
      }
      .buttonStyle{
        background-color: #0e5bb1;
        margin: 2rem;
        font-size: 18px;
      }
      .botoes{
        display: flex;
      }
      .selectEstados{
        margin: 10 10 10 10;
      }
      .campos{
        margin-top: 17px;
      }
      #header{
        width: 100%;
      }
      .icones{
        border:none;
      }
    </style>

</head>
<body>

<?php

switch($_GET['id']){
  case 1:
    alerta('success', 'Contato salvo com sucesso!');
  break;
  case 2:
      alerta('success', 'Contato deletado com sucesso!');
  break;
  default:
  break;
}

?>

  <header id="header">
      <nav id="navbar" class="navbar">
        <i class="far fa-address-book"></i>
        <label for="agenda">Agenda</label>
      </nav>
  </header>
  <main>
    <button type="button" class="btn btn-primary buttonStyle" data-toggle="modal" data-target="#addContato">
      Adicionar Contato
    </button>

    <div class="container">
      <div class="col-lg6 mb-5">
          <form class="p-4 border rounded">
            <div id="titulo-listagem">
              <h2 class="font-weight-bold">Contatos</h2>
              <hr>
            </div>
            <div class="table-responsive">

              <table class="table table-light table-striped col-lg-12">
                <thead>
                  <tr>
                    <th scope="col" class="coluna">Nome</th>
                    <th scope="col" class="coluna">Telefone</th>
                    <th scope="col" class="coluna">Email</th>
                    <th scope="col" class="coluna">Cidade</th>
                    <th scope="col" class="coluna">Estado</th>
                    <th scope="col" class="coluna">Categoria</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                    $consulta = 'SELECT * FROM contato';
                    $result = $conn -> query($consulta);

                    foreach($result as $row){
                  ?>
                    <tr>
                      <td class="coluna"><?php echo @$row['Nome']; ?></td>
                      <td class="coluna"><?php echo @$row['Telefone']; ?></td>
                      <td class="coluna"><?php echo @$row['Email']; ?></td>
                      <td class="coluna"><?php echo @$row['Cidade']; ?></td>
                      <td class="coluna"><?php echo @$row['Estado']; ?></td>
                      <td class="coluna"><?php echo @$row['Categoria']; ?></td>

                        <td id="editar"><!-- Edit -->
                          <a data-toggle="modal" data-target="#editContato" style="cursor:pointer;">
                              <i id="edit" class="far fa-edit" style="color:#0e5bb1; font-size:22px;"  >
                              </i>
                          </a>
                        </td>
                        <td id="deletar"><!-- Delete -->
                            <a href="deletarcontato.php?id=<?php echo $row['Id'] ?>">
                              <i class="far fa-trash-alt" style="color:#0e5bb1; font-size:22px;">
                              </i>
                            </a>
                        </td>

                    </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
          </form>
      </div>
    </div>
  </main>

  <!-- MODAL DE ADICIONAR CONTATO -->
  <div class="modal fade" id="addContato" tabindex="-1" role="dialog" aria-labelledby="Cadastro de contato" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <form action="incluicontato.php" method="post" enctype="multipart/form-data">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Dados do contato</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button> 
          </div>
          <div class="modal-body">
            <div class="row form-group">
                <div class="col-md-12 mb-3 mb-md-0 campos">
                    <label class="text-black" for="nome">Nome:</label>
                    <input autocomplete="off" type="text" name="Nome" id="nome" class="form-control" placeholder="Nome Completo" minlength="3" required>
                </div>

                  <div class="col-md-12 mb-3 mb-md-0 campos">
                    <label class="text-black" for="telefone">Telefone:</label>
                    <input autocomplete="off" type="text" name="Telefone" id="telefone" class="form-control" maxlength="14" minlength="14" placeholder="Ex: (99)99999-9999" onkeypress="$(this).mask('(00)00000-0000');" required>
                  </div>

                  <div class="col-md-12 mb-3 mb-md-0 campos">
                    <label class="text-black" for="email">Email:</label>
                    <input autocomplete="off" type="text" name="Email" id="email" class="form-control" placeholder="Informe o seu endereco de email" required>
                  </div>

                  <div class="col-md-12 mb-3 mb-md-0 campos">
                    <label class="text-black" for="cidade">Cidade:</label>
                    <input autocomplete="off" type="text" name="Cidade" id="telefone" class="form-control" placeholder="Informe sua cidade" required>
                  </div>

                  <div class="col-md-12 mb-3 mb-md-0 selectEstados campos">
                    <label class="text-black" for="estado">Estado:</label>
                    <div class="input-group mb-3">
                      <select name="Estado" class="custom-select" id="selectEstados">
                        <option value="São Paulo (SP)">São Paulo (SP)</option>
                        <option value="Bahia (BA)">Bahia (BA)</option>
                        <option value="Espírito Santo (ES)">Espírito Santo (ES)</option>
                        <option value="Paraná (PR)">Paraná (PR)</option>
                        <option value="Tocantins (TO)">Tocantins (TO)</option>
                      </select>
                      <div class="input-group-append">
                        <label class="input-group-text" for="selectEstados">Estados</label>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-12 mb-3 mb-md-0 selectEstados campos">
                    <label class="text-black" for="categoria">Categoria:</label>
                    <div class="input-group mb-3">
                      <select name="Categoria" class="custom-select" id="selectEstados">
                        <option value="Cliente">Cliente</option>
                        <option value="Fornecedor">Fornecedor</option>
                        <option value="Funcionario">Funcionario</option>
                      </select>
                      <div class="input-group-append">
                        <label class="input-group-text" for="selectEstados">Categoria</label>
                      </div>
                    </div>
                  </div>
                    <div class="botoes">
                      <button type="submit" class="btn btn-primary buttonStyle" style="margin-left: 90px;">Salvar</button>
                      <button type="button" class="btn btn-primary buttonStyle" data-dismiss="modal" style="margin-left: 90px;">Cancelar</button>
                    </div>
              </div>
            </div>
          </div>
          </form>
        </div>
    </div>
  </div>

   <!-- MODAL DE EDITAR CONTATO -->
   <div class="modal fade" id="editContato" tabindex="-1" role="dialog" aria-labelledby="Cadastro de contato" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <form action="updatecontato.php?id=<?php echo $row['Id']; ?>" method="post" enctype="multipart/form-data">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Dados do contato</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button> 
          </div>
          <div class="modal-body">
            <div class="row form-group">
                <div class="col-md-12 mb-3 mb-md-0 campos">
                    <label class="text-black" for="nome">Nome:</label>
                    <input value="<?php echo $row['Nome']; ?>" autocomplete="off" type="text" name="Nome" id="nome" class="form-control" placeholder="Nome Completo" minlength="3" required>
                </div>

                  <div class="col-md-12 mb-3 mb-md-0 campos">
                    <label class="text-black" for="telefone">Telefone:</label>
                    <input value="<?php echo $row['Telefone']; ?>" autocomplete="off" type="text" name="Telefone" id="telefone" class="form-control" maxlength="14" minlength="14" placeholder="Ex: (99)99999-9999" onkeypress="$(this).mask('(00)00000-0000');" required>
                  </div>

                  <div class="col-md-12 mb-3 mb-md-0 campos">
                    <label class="text-black" for="email">Email:</label>
                    <input value="<?php echo $row['Email']; ?>" autocomplete="off" type="text" name="Email" id="email" class="form-control" placeholder="Informe o seu endereco de email" required>
                  </div>

                  <div class="col-md-12 mb-3 mb-md-0 campos">
                    <label class="text-black" for="cidade">Cidade:</label>
                    <input value="<?php echo $row['Cidade']; ?>" autocomplete="off" type="text" name="Cidade" id="telefone" class="form-control" placeholder="Informe sua cidade" required>
                  </div>

                  <div class="col-md-12 mb-3 mb-md-0 selectEstados campos">
                    <label class="text-black" for="estado">Estado:</label>
                    <div class="input-group mb-3">
                      <select name="Estado" class="custom-select" id="selectEstados">
                        <option value="São Paulo (SP)"      <?php if($row['Estado'] == 'São Paulo (SP)'){ ?> selected <?php } ?> >São Paulo (SP)</option>
                        <option value="Bahia (BA)"          <?php if($row['Estado'] == 'Bahia (BA)'){ ?> selected <?php } ?> >Bahia (BA)</option>
                        <option value="Espírito Santo (ES)" <?php if($row['Estado'] == 'Espírito Santo (ES)'){ ?> selected <?php } ?>>Espírito Santo (ES)</option>
                        <option value="Paraná (PR)"         <?php if($row['Estado'] == 'Paraná (PR)'){ ?> selected <?php } ?>>Paraná (PR)</option>
                        <option value="Tocantins (TO)"      <?php if($row['Estado'] == 'Tocantins (TO)'){ ?> selected <?php } ?> >Tocantins (TO)</option>
                      </select>
                      <div class="input-group-append">
                        <label class="input-group-text" for="selectEstados">Estados</label>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-12 mb-3 mb-md-0 selectEstados campos">
                    <label class="text-black" for="categoria">Categoria:</label>
                    <div class="input-group mb-3">
                      <select name="Categoria" class="custom-select" id="selectEstados">
                        <option value="Cliente"     <?php if($row['Categoria'] == 'Cliente'){ ?> selected <?php } ?> >Cliente</option>
                        <option value="Fornecedor"  <?php if($row['Categoria'] == 'Fornecedor'){ ?> selected <?php } ?> >Fornecedor</option>
                        <option value="Funcionario" <?php if($row['Categoria'] == 'Funcionario'){ ?> selected <?php } ?> >Funcionario</option>
                      </select>
                      <div class="input-group-append">
                        <label class="input-group-text" for="selectEstados">Categoria</label>
                      </div>
                    </div>
                  </div>
                    <div class="botoes">
                      <button type="submit" class="btn btn-primary buttonStyle" style="margin-left: 90px;">Salvar</button>
                      <button type="button" class="btn btn-primary buttonStyle" data-dismiss="modal" style="margin-left: 90px;">Cancelar</button>
                    </div>
              </div>
            </div>
          </div>
          </form>
        </div>
    </div>
  </div>
    

</body>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="sweetalert2.all.min.js"></script>
<script src="sweetalert2.min.js"></script>

</html>