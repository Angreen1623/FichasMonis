<?php

namespace App\Controllers;

class RacasController extends \App\Core\Controller
{
    public function listar(): void
    {
        $racas = $this->model('Raca');
        $racas = $racas->getAll();

        $this->view('catalogos/racas', ['racas' => $racas]);
    }

    
}