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
        try{
        $racas = $this->model("raca")->getAll();
        $arquetipos = $this->model("arquetipo")->getAll();
        }catch (\Exception $exception) {
            $e = $exception;
            $this->view("home/erro", ["erro" => $e->getMessage()]);
        }

        if(!isset($e)){
            $this->view('fichas/criar_ficha', ["racas" => $racas, "arquetipos" => $arquetipos]);
        }
    }

    public function editarFicha(int $id): void
    {
        try{
        $personagem = $this->model("personagem")->getById($id);
        $racas = $this->model("raca")->getAll();
        $arquetipos = $this->model("arquetipo")->getAll();

        }catch (\Exception $exception) {
            $e = $exception;
            $this->view("home/erro", ["erro" => $e->getMessage()]);
        }

        if(!isset($e)){
        $this->view('fichas/editar_ficha', ["perso" => $personagem, "racas" => $racas, "arquetipos" => $arquetipos]);
        }
    }

    public function criarDim(): void
    {
        try{
        $imgSv = $this->service("ImageMagick");
        $img = $imgSv->createDim(str_pad(rand(0,31), 2, '0', STR_PAD_LEFT) . "-". str_pad(rand(0,99999999), 8, '0', STR_PAD_LEFT));

        }catch (\Exception $exception) {
            $e = $exception;
            $this->view("home/erro", ["erro" => $e->getMessage()]);
        }

        if(!isset($e)){
            $this->view('home/dim', ["imagem" => $img]);
        }
    }

}