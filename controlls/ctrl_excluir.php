<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: Content-Type");
require_once dirname(__DIR__) . '/config.php';
require_once dirname(__DIR__) . '/dao/contatosMySql.php';

$params = json_decode(file_get_contents("php://input"));

$deleteDao = new contatosMySql($pdo);
$resultado = $deleteDao->deleteContato($params->id);
$arrayRetorno = [];
if ($resultado === true) {
    $arrayRetorno['aviso'] = 'Excluido com sucesso';
} else {
    $arrayRetorno['aviso'] = 'Erro ao excluir';
}
$arrayRetorno['base'] = $base;
print_r(json_encode($arrayRetorno));
