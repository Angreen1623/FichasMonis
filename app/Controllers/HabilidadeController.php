<?php

namespace App\Controllers;

class HabilidadeController extends \App\Core\Controller
{
    public function listar(): void
    {
        $habs = $this->model('Habilidade');
        $habs = $habs->getAll();

        $this->view('catalogos/habilidades', ['habs' => $habs]);
    }

    
}