<?php

require "conn.php";

$sql = mysqli_query($conn, "SELECT id, nome, telefone, email, cidade, estado, categoria FROM registros");

$line = mysqli_num_rows($sql);

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <!-- Meta Tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Sistema para Gerenciamento de Pessoas">
    <meta name="author" content="Lucas Belarmino">

    <!-- Título da Página -->
    <title>Gestão de Pessoas - LB Dev</title>

    <!-- Ícone da Página -->
    <link rel="shortcut icon" href="img/menew.png">

    <!-- Icons CSS -->
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">

    <!-- Fontes Especiais -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/main.css" rel="stylesheet" media="all">


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">



    <!-- Center Block CSS-->
    <style type="text/css">
    .center-block {
    display: block;
    margin-left: auto;
    margin-right: auto;
    margin-top: -50px;
 	}

    .center-button {
    display: block;
    margin-left: auto;
    margin-right: auto;
    }

    </style>


</head>

<body style="">
    <div class="page-wrapper bg-gra-02 p-t-130 p-b-100 font-poppins">
        <div class="wrapper wrapper--w960">
            <div class="card card-4">
                <div class="card-body">
                	<img src="img/menew.png" class="center-block rounded mx-auto d-block" alt="Menew Logo">
                    <h2 class="title center-button" style="margin-top: 20px;text-align: center;">Listagem de pessoas</h2>

                    <div align="center">

    <table class="table table-bordered">
        <thead class="thead-dark">
            <tr>
                <th class="align-middle">ID</td>
                <th class="align-middle">Nome</td>
                <th class="align-middle">Telefone</td>
                <th class="align-middle">E-mail</td>
                <th class="align-middle">Cidade</td>
                <th class="align-middle">Estado</td>
                <th class="align-middle">Categoria</td>
                <th class="align-middle">Editar</td>
            </tr>
            <thead class="thead-dark">
            <?php while($line = mysqli_fetch_array($sql)){ ?>
            <tr>
                <td><?php echo $line["id"]; ?></td>
                <td><?php echo $line["nome"]; ?></td>
                <td><?php echo $line["telefone"]; ?></td>
                <td><?php echo $line["email"]; ?></td>
                <td><?php echo $line["cidade"]; ?></td>
                <td><?php echo $line["estado"]; ?></td>
                <td><?php echo $line["categoria"]; ?></td>
                <td><a href="editar.php?id=<?php echo $line['id'] ?>" class="btn btn-warning">Editar</a></td>
            </tr> 
            <?php } ?>       
        </table>
        </div>

                </div>
            </div>
        </div>
        <a href="index.php">
    <button type="" class="center-button btn btn--radius-2" style="margin-top: 50px;color: white;">Voltar ao Menu</button>
    </a>
    </div>

    

    <!-- JS Cidades/Estados-->

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

    <!-- JS Cidades/Estados-->

    <script type="text/javascript">
	
function buscaCidades(e){
   document.querySelector("#cidade").innerHTML = '';
   var cidade_select = document.querySelector("#cidade");

   var num_estados = json_cidades.estados.length;
   var j_index = -1;

   // aqui eu pego o index do Estado dentro do JSON
   for(var x=0;x<num_estados;x++){
      if(json_cidades.estados[x].sigla == e){
         j_index = x;
      }
   }

   if(j_index != -1){
  
      // aqui eu percorro todas as cidades e crio os OPTIONS
      json_cidades.estados[j_index].cidades.forEach(function(cidade){
         var cid_opts = document.createElement('option');
         cid_opts.setAttribute('value',cidade)
         cid_opts.innerHTML = cidade;
         cidade_select.appendChild(cid_opts);
      });
   }else{
      document.querySelector("#cidade").innerHTML = '';
   }
}
	</script>

	<!-- Cidades/Estados JS-->
    <script src="js/cidades.js"></script>

    <!-- Jquery JS-->
    <script src="vendor/jquery/jquery.min.js"></script>

    <!-- Vendor JS-->
    <script src="vendor/select2/select2.min.js"></script>
    <script src="vendor/datepicker/moment.min.js"></script>
    <script src="vendor/datepicker/daterangepicker.js"></script>

    <!-- Main JS-->
    <script src="js/global.js"></script>

</body>

</html>