<?php
require_once dirname(__DIR__) . '/config.php';
require_once dirname(__DIR__) . '/models/contato.php';
require_once dirname(__DIR__) . '/dao/contatosMySql.php';

$params = filter_input_array(INPUT_POST, FILTER_DEFAULT);

if ($params['nome'] && $params['telefone'] && $params['cidade'] && $params['estado'] && $params['categoria']) {
    $novoContato = new contato();
    $contatoDao = new contatosMySql($pdo);
    $novoContato->nome = $params['nome'];
    $novoContato->telefone = $params['telefone'];
    $novoContato->email = $params['email'];
    $novoContato->cidade = $params['cidade'];
    $novoContato->estado = $params['estado'];
    $novoContato->categoria = $params['categoria'];
    $insertContato = $contatoDao->insertContato($novoContato);
    if ($insertContato === true) {
        $_SESSION['aviso'] = "Cadastro Realizado";
        $_SESSION['tipo'] = "success";
    } else {
        $_SESSION['aviso'] = "Erro no cadastro";
        $_SESSION['tipo'] = "danger";
    }
    header("Location:" . $base);
    exit;
}
