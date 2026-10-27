<?php

use App\Core\Router;

$router = new Router();
$router->get('/FichasMonis/', 'HomeController@index');
