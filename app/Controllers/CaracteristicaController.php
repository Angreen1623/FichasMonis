<?php

namespace App\Controllers;

class CaracteristicaController extends \App\Core\Controller
{
    public function listar(): void
    {
        $car = $this->model('Caracteristica')->getAll();

        $this->view('catalogos/caracteristica', $car);
    }
}

