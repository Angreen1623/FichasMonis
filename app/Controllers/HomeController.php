<?php

namespace App\Controllers;

class HomeController extends \App\Core\Controller
{
    public function index(): void
    {
        $data["racas"] = $this->model("raca")->getAll();
        $data["arquetipos"] = $this->model("arquetipo")->getAll();
        $this->view('home/home', $data);
    }

}