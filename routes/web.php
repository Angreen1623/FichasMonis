<?php

use App\Core\Router;

$router = new Router();
$router->get('/FichasMonis/signup', 'LoginController@showSign');
$router->post('/FichasMonis/signup', 'LoginController@sign');
$router->get('/FichasMonis/login', 'LoginController@showLogin');
$router->post('/FichasMonis/login', 'LoginController@Login');

$router->get('/FichasMonis/', 'HomeController@index', true);

$router->get('/FichasMonis/racas', 'RacasController@listar');

$router->get('/FichasMonis/habilidades', 'HabilidadeController@listar');

$router->get('/FichasMonis/caracteristicas', 'CaracteristicaController@listar');

$router->get('/FichasMonis/dim', 'HomeController@criarDim');

$router->get('/FichasMonis/criar-personagem', 'HomeController@cadastrarFicha', true);
$router->post('/FichasMonis/criar-ficha', 'FichaController@criar', true);
$router->get('/FichasMonis/personagens', 'FichaController@showFichas', true);

$router->get('/FichasMonis/editar-ficha/{id}', 'HomeController@editarFicha', true);
$router->post('/FichasMonis/update', 'FichaController@updateFicha', true);