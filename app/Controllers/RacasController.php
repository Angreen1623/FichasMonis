<?php

namespace App\Controllers;

class RacasController extends \App\Core\Controller
{
    public function listar(): void
    {
        try{
            $racas = $this->model('Raca');
            $racas = $racas->getAll();

        }catch (\Exception $exception) {
            $e = $exception;
            $this->view("home/erro", ["erro" => $e->getMessage()]);
        }

        if(!isset($e)){
            $this->view('catalogos/racas', ['racas' => $racas]);
        }
    }

}