<?php

namespace App\Controllers;

class CaracteristicaController extends \App\Core\Controller
{
    public function listar(): void
    {
        try{
        $car = $this->model('Caracteristica')->getAll();
        }catch (\Exception $exception) {
            $e = $exception;
            $this->view("home/erro", ["erro" => $e->getMessage()]);
        }

        if(!isset($e)){
            $this->view('catalogos/caracteristica', $car);
        }
    }
}

