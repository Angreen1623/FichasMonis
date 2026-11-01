<?php

namespace App\Controllers;

class HabilidadeController extends \App\Core\Controller
{
    public function listar(): void
    {
        $hab = $this->model('Habilidade');
        $hab = $hab->getAll();

        $this->view('catalogos/habilidades', ['hab' => $hab]);
    }

    
}