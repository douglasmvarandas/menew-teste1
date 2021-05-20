<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.css">
    <link rel="stylesheet" href="style.css">
    <title>Menew Teste</title>
</head>

<body>
    <div class="col-md-8 container def-background page">
        <h1 class="text-center" id="titulo">Menew Teste</h1>
        <div class="def-background text-center" id="list-container">
            <form name="frmBusca" method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>?a=buscar" >
                <a href="index.php" class="botao btn-light">Início</a>
                <div class="row" id="buscador">
                    <div class="col-md-6">
                        <label for="busca">Buscar por Nome</label>
                        <input type="text" name="busca"/>
                    </div>                    
                    <div class="col-md-3">                       
                        <select class="form-control" name="estado" id="estado" style="<?php if($set)validar($estado, $camposErrados); ?>">  
                            <option selected disabled>Estado</option>
                            <option value="Paraíba">Paraíba</option>
                            <option value="Rio Grande do Norte">Rio Grande do Norte</option>
                            <option value="Bahia">Bahia</option>
                            <option value="Pernambuco">Pernambuco</option>
                            <option value="Ceará">Ceará</option>
                        </select> 
                    </div>  
                    <div class="col-md-3">                            
                            <select class="form-control" name="categoria" id="categoria" style="<?php if($set)validar($categoria, $camposErrados); ?>">
                                <option selected disabled>Categoria</option>
                                <option value="Cliente">Cliente</option>
                                <option value="Fornecedor">Fornecedor</option>
                                <option value="Funcionário">Funcionário</option>
                            </select>
                        </div>                                  
                </div>                
                <input type="submit"  value="Buscar" />
            </form>
            <div class="content container">
                <?php include('listar.php'); ?>
            </div>            
        </div>
    </div>
</body>

<script type="text/javascript">
    document.getElementsByName('nome');
</script>

</html>