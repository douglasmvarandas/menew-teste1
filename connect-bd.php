<?php
        $server = "localhost";
        $user = "root";
        $pass = ""; 
        $bd = "agenda-menew";

        if ( $connection = mysqli_connect($server, $user, $pass, $bd) ) {
                // echo "Conectado!";
        } else
                echo "Erro ao tentar conectar com o banco de dados.";

        

?>