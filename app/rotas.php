<?php

// controlador@metodo
$rotas = [
    'home'           => 'main@index',
    'adicionar'      => 'agendaController@adicionar',
    'save_contato'   => 'agendaController@save_contato',
    'edit'           => 'agendaController@edit',
    'edit_contato'   => 'agendaController@edit_contato',
    'delete_contato' => 'agendaController@delete_contato',
    '404'            => 'main@page404'
];

$page = 'home';

if(isset($_GET['p'])):
    if(!key_exists($_GET['p'], $rotas)):
        $page = '404';
    else:
        $page = $_GET['p'];
    endif;
endif;

$partes = explode('@', $rotas[$page]);

$controlador = 'app\\controllers\\'.ucfirst($partes[0]);
$metodo = $partes[1];

$ctr = new $controlador();
$ctr->$metodo();

?>