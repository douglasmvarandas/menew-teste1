<?php

    //Abrindo conexao
    $servidor   = "localhost";
    $usuario    = "root";
    $senha      = "";
    $banco      = "teste_menew";
    $conect = mysqli_connect($servidor,$usuario,$senha,$banco);

    //Testando Conexão
    if(mysqli_connect_errno()){
        die("A conexão falhou.: " . mysqli_connect_errno());
    }  
?>
