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

    <!-- Navbar CSS-->
    <link rel="stylesheet" href="fonts/icomoon/style.css">

    <link rel="stylesheet" href="css/owl.carousel.min.css">
    
    <!-- Style Nav -->
    <link rel="stylesheet" href="css/style.css">

    <!-- Fim Navbar CSS-->

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

    .form-group{
        display: inline-block;
}

    </style>


</head>

<body style="">
    <div class="page-wrapper bg-gra-02 p-t-130 p-b-100 font-poppins">
        <div class="wrapper wrapper--w680">
            <div class="card card-4">
                <div class="card-body">
                	<img src="img/menew.png" class="center-block rounded mx-auto d-block" alt="Menew Logo">
                    <h2 class="title center-button" style="margin-top: 20px;text-align: center;">Menu Principal</h2>
        <form method="post" action="busca.php">
    <div align="center">
    <div class="form-group col-md-2">    
        <input type="text" name="busca" class="form-control input--style-4" placeholder="Buscar Pessoa..."> 
    </div>
        <button type="submit" class="btn btn--radius-3 btn--vinho">Ir</button>
    </div>
        </form>
                                              
    <a href="cadastro.php">
    <button type="" class="center-button btn btn--radius-2 btn--color2" style="margin-top: 10px;">Cadastrar Pessoa</button>
    </a>

    <a href="listar.php">
    <button type="" class="center-button btn btn--radius-2 btn--color3" style="margin-top: 10px;">Listar Pessoas</button>
    </a>

   

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