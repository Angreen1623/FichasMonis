<?php

use App\Core\Router;

$router = new Router();
$router->get('/FichasMonis/', 'HomeController@index');

$router->get('/FichasMonis/racas', 'RacasController@listar');

$router->get('/FichasMonis/habilidades', 'HabilidadeController@listar');

$router->get('/FichasMonis/caracteristicas', 'CaracteristicaController@listar');

$router->get('/FichasMonis/dim', 'HomeController@criarDim');

$router->get('/FichasMonis/criar-personagem', 'HomeController@cadastrarFicha');
$router->post('/FichasMonis/criar-ficha', 'FichaController@criar');

$router->get('/FichasMonis/editar-ficha/{id}', 'HomeController@editarFicha');
$router->post('/FichasMonis/update', 'FichaController@updateFicha');