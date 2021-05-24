<?php 
    include "conn.php";


    $id = $_GET['id'];
    $query = mysqli_query($conn, "SELECT * FROM registros WHERE id=$id");
    $data = mysqli_fetch_assoc($query);

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

    </style>


</head>

<body style="">
    <div class="page-wrapper bg-gra-02 p-t-130 p-b-100 font-poppins">
        <div class="wrapper wrapper--w680">
            <div class="card card-4">
                <div class="card-body">
                	<img src="img/menew.png" class="center-block rounded mx-auto d-block" alt="Menew Logo">
                    <h2 class="title center-button" style="margin-top: 20px;text-align: center;">Editar Cadastro</h2>
                    <form action="update_edicao.php" method="POST">
                        <input type="hidden" name="id" value="<?php echo $data['id']; ?>">
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Nome</label>
                                    <input class="input--style-4" type="text" name="nome" value="<?php echo $data['nome']; ?>">
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Telefone</label>
                                    <input class="input--style-4" type="text" name="telefone" placeholder="(00) 00000-0000" name="telefone" onkeypress="mask(this, telmask);" onblur="mask(this, telmask);" value="<?php echo $data['telefone']; ?>">
                                </div>
                            </div>
                        </div>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Email</label>
                                    <input class="input--style-4" type="email" name="email" value="<?php echo $data['email']; ?>">
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Estado</label>
                                    <div class="rs-select2 js-select-simple select--no-search">
                                <select id="estado" name="estado" onchange="buscaCidades(this.value)" required>
                                    <option disabled="disabled" selected="selected" value=""><?php echo $data['estado']; ?></option>
                                    <option value="AL">Alagoas</option>
                                    <option value="BA">Bahia</option>
                                    <option value="CE">Ceará</option>
                                    <option value="MA">Maranhão</option>
                                    <option value="PB">Paraíba</option>
                                </select>
                                <div class="select-dropdown"></div>
                            </div>
                                </div>
                            </div>
                        </div>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Cidade</label>
                                    <div class="rs-select2 js-select-simple select--no-search">
                                <select id="cidade" name="cidade">
                                    <option disabled="disabled" selected="selected" value=""><?php echo $data['cidade']; ?></option>
                                </select>
                                <div class="select-dropdown"></div>
                            </div>
                                </div>
                            </div>
                            <div class="col-2">
                               <div class="input-group">
                            <label class="label">Categoria</label>
                            <div class="rs-select2 js-select-simple select--no-search">
                                <select name="categoria" required>
                                    <option disabled="disabled" selected="selected" value=""><?php echo $data['categoria']; ?></option>
                                    <option>Cliente</option>
                                    <option>Fornecedor</option>
                                    <option>Funcionário</option>
                                </select>
                                <div class="select-dropdown"></div>
                            </div>
                        </div>
                    </div>
                        <div class="p-t-15 center-button">
                            <button class="btn btn--radius-2 btn--green" type="submit">Atualizar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <a href="index.php">
    <button type="" class="center-button btn btn--radius-2" style="margin-top: 50px;">Voltar ao Menu</button>
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