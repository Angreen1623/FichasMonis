<?php

namespace App\Controllers;

class HomeController extends \App\Core\Controller
{
    public function index(): void
    {
        $this->view('home/home');
    }

    public function cadastrarFicha(): void
    {
        $racas = $this->model("raca")->getAll();
        $arquetipos = $this->model("arquetipo")->getAll();
        $this->view('fichas/criar_ficha', ["racas" => $racas, "arquetipos" => $arquetipos]);
    }

    public function editarFicha($id): void
    {
        $personagem = $this->model("personagem")->getById($id);
        $racas = $this->model("raca")->getAll();
        $arquetipos = $this->model("arquetipo")->getAll();
        $dim = $this->service("ImageMagick")->createDim($personagem->getDim());

        $this->view('fichas/editar_ficha', ["perso" => $personagem, "racas" => $racas, "arquetipos" => $arquetipos, "dim" => $dim]);
    }

    public function criarDim(): void
    {
        $imgSv = $this->service("ImageMagick");
        $img = $imgSv->createDim(str_pad(rand(0,31), 2, '0', STR_PAD_LEFT) . "-". str_pad(rand(0,99999999), 8, '0', STR_PAD_LEFT));

        $this->view('home/dim', ["imagem" => $img]);
    }

}