<?php

namespace App\Controllers;

class HomeController extends \App\Core\Controller
{
    public function index(): void
    {
        $raca = $this->model('Raca');

        $raca->setNome("teste");
        $raca->setCapCarga(10);
        $raca->setDescricao('teste');
        $raca->setVelocidade(5);
        $raca->save();

        #$this->view('Home/home');
    }

    public function listar(): void
    {
        $Raca = $this->model('Raca');
        $Raca = $Raca->getAll();

        $this->view('Home/home', ['Raca' => $Raca]);
    }

    
}