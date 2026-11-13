<?php

namespace App\Controllers;

class LoginController extends \App\Core\Controller
{
    public function showLogin(): void
    {
        $this->view('usuario/login');
    }

    public function Login(): void
    {
        try{
        $this->service("Login")->autenticar($_POST["usuario"], $_POST["senha"]);
        
        }catch (\Exception $exception) {
            $e = $exception;
            $this->view("home/erro", ["erro" => $e->getMessage()]);
        }

        if(!isset($e)){
            $this->redirect('/FichasMonis');
        }
    }

    public function showSign(): void
    {
        $this->view('usuario/signup');
    }

    public function Sign(): void
    {
        try{
        $this->beginTransaction();
        $user = $this->model("Usuario");
        
        $user->setUsuario($_POST["usuario"]);
        $user->setSenha(password_hash($_POST["senha"], PASSWORD_DEFAULT));
        $user->save();

        $this->commitTransaction();

        }catch (\Exception $exception) {
            $this->rollbackTransaction();
            $e = $exception;
            $this->view("home/erro", ["erro" => $e->getMessage()]);
        }

        if(!isset($e)){
            $this->redirect('/FichasMonis');
        }
    }

}