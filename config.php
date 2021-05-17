<?php
ini_set('display_errors', 1);
ini_set('display_startup_erros', 1);
error_reporting(E_ALL);
session_start();

//VERIFICAR SE ESTA VARIÁVEL ESTÁ COM A RAIZ DO PROJETO
$base = "http://localhost/Teste_menew/teste_01";

$db_name = "teste_menew";
$db_host = "localhost";
$db_user = "root";
$db_pass = "";

$pdo = new PDO("mysql:dbname=" . $db_name . ";host=" . $db_host, $db_user, $db_pass);

if ($_SESSION['aviso']) {
    $not = '
    $.notify({
        // options
        message:"' . $_SESSION['aviso'] . '"
    }, {
        // settings
        
        type: "' . $_SESSION['tipo'] . '",
        animate: {
            enter: "animated fadeInDown",
            exit: "animated fadeOutUp"
        }

    });';
} else {
    $not = null;
}
