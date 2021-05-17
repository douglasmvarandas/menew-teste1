<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: Content-Type");
require_once dirname(__DIR__) . '/config.php';
require_once dirname(__DIR__) . '/dao/contatosMySql.php';


$params = json_decode(file_get_contents("php://input"));

$contatosDao = new contatosMySql($pdo);
$resultado = $contatosDao->deleteContato($params->id);
$arrayRetorno = [];
if ($resultado === true) {
    $arrayRetorno['aviso'] = 'Excluido com sucesso';
    $_SESSION['aviso'] = 'Excluído com sucesso';
    $_SESSION['tipo'] = 'success';
} else {
    $arrayRetorno['aviso'] = 'Erro ao excluir';
    $_SESSION['aviso'] = 'Erro ao excluír';
    $_SESSION['tipo'] = 'danger';
}

$arrayRetorno['base'] = $base;
print_r(json_encode($arrayRetorno));
