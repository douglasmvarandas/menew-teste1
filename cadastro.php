<!doctype html>
<html lang="pt-br">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta nome="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <title>Formulário de Cadastro</title>
    <link rel="shortcut icon" href="imagens/pessoas.png">
  </head>     

  <body>
    <div class="container-fluid" style="margin-top: 30px;">
    <form action="cadastro_script.php" method="POST">
        <div class="container" style="max-width:370px;">
        <h2>Formulário de Cadastro</h2>
        <hr>
        <div class="form-group" style="margin-top:50px;">
            <strong label for="nome">Nome</label>
            <input type="text" class="form-control" id="nome" aria-describedby="nome" placeholder="Digite seu nome" name="nome" required>
        </div>
        
        <div class="form-group">
            <label for="telefone">Telefone</label>
            <input type="text" maxlength="15" class="form-control" id="telefone" aria-describedby="telefone" placeholder="(00) 00000-0000" name="telefone" onkeypress="mask(this, telmask);" onblur="mask(this, telmask);" required> 
        </div>

        <div class="form-group">
            <label for="e-mail">Endereço de e-mail</label>
            <input type="email" class="form-control" id="email" aria-describedby="email" placeholder="Digite seu e-mail" name="email" required>
        </div>

        <div class="form-group">
            <label for="cidade">Cidade</label>
            <input type="text" class="form-control" id="cidade" aria-describedby="cidade" placeholder="Digite a sua cidade" name="cidade" required>
        </div>
        <div class="form-group">
            <label>Estado</label>        
            <select class="form-control" aria-label="Default select example" name="estado" required>
              <option value="">Selecione...</option>
              <option value="PB">PB</option>
              <option value="PE">PE</option>
              <option value="RN">RN</option>
              <option value="AL">AL</option>
              <option value="BA">BA</option>
            </select>
            <div class="form-group" style="margin-top: 10px;">
            <label>Categoria</label>          
            <select class="form-control" aria-label="Default select example" name="categoria" required>
              <option value="">Selecione...</option>
              <option value="Cliente">Cliente</option>
              <option value="Fornecedor">Fornecedor</option>
              <option value="Funcionário">Funcionário</option>
            </select>
        </div>
        </div>
           <button type="submit" class="btn btn-success">Cadastrar</button>
    </form>
    <a href="index.php" class="btn btn-primary">Voltar</a>
    </div>
    </div>
    
    </strong>  

    <script type="text/javascript">
    function mask(o, f) {
  setTimeout(function() {
    var v = telmask(o.value);
    if (v != o.value) {
      o.value = v;
    }
  }, 1);
}

function telmask(v) {
  var r = v.replace(/\D/g, "");
  r = r.replace(/^0/, "");
  if (r.length > 10) {
    r = r.replace(/^(\d\d)(\d{5})(\d{4}).*/, "($1) $2-$3");
  } else if (r.length > 5) {
    r = r.replace(/^(\d\d)(\d{4})(\d{0,4}).*/, "($1) $2-$3");
  } else if (r.length > 2) {
    r = r.replace(/^(\d\d)(\d{0,5})/, "($1) $2");
  } else {
    r = r.replace(/^(\d*)/, "($1");
  }
  return r;
}
    </script>  

      <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
  </body>
</html>