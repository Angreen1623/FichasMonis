<?php

namespace App\Controllers;

class HabilidadeController extends \App\Core\Controller
{
    public function listar(): void
    {
        try{
            
        $hab = $this->model('Habilidade');
        $hab = $hab->getAll();

        }catch (\Exception $exception) {
            $e = $exception;
            $this->view("home/erro", ["erro" => $e->getMessage()]);
        }

        if(!isset($e)){
            $this->view('catalogos/habilidades', ['hab' => $hab]);
        }
    }

    
}