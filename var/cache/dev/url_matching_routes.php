<?php

/**
 * This file has been auto-generated
 * by the Symfony Routing Component.
 */

return [
    false, // $matchHost
    [ // $staticRoutes
        '/' => [[['_route' => 'index', '_controller' => 'App\\Controller\\DefaultController::index'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/cadastro' => [[['_route' => 'cadastro', '_controller' => 'App\\Controller\\DefaultController::cadastro'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/consulta' => [[['_route' => 'consulta', '_controller' => 'App\\Controller\\DefaultController::consulta'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/quemsomos' => [[['_route' => 'quemsomos', '_controller' => 'App\\Controller\\DefaultController::quemsomos'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/sair' => [[['_route' => 'sair', '_controller' => 'App\\Controller\\DefaultController::sair'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/salvar' => [[['_route' => 'salvar', '_controller' => 'App\\Controller\\DefaultController::salvar'], null, ['POST' => 0, 'GET' => 1], null, false, false, null]],
        '/consultar' => [[['_route' => 'consultar', '_controller' => 'App\\Controller\\DefaultController::consultar'], null, ['POST' => 0, 'GET' => 1], null, false, false, null]],
    ],
    [ // $regexpList
        0 => '{^(?'
                .'|/_error/(\\d+)(?:\\.([^/]++))?(*:35)'
            .')/?$}sDu',
    ],
    [ // $dynamicRoutes
        35 => [
            [['_route' => '_preview_error', '_controller' => 'error_controller::preview', '_format' => 'html'], ['code', '_format'], null, null, false, true, null],
            [null, null, null, null, false, false, 0],
        ],
    ],
    null, // $checkCondition
];
