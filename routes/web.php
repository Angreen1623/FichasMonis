<?php

use App\Core\Router;

$router = new Router();
$router->get('/FichasMonis', 'HomeController@index');
$router->get('/FichasMonis/', 'HomeController@index');
$router->get('/FichasMonis/racas', 'RacasController@listar');
$router->get('/FichasMonis/habilidades', 'HabilidadeController@listar');
