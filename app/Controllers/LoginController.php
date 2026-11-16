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

        if(strlen($_POST["senha"]) < 8 || strlen($_POST["senha"]) > 100){
            throw new \Exception("Senha menor que 8 digitos ou maior que 100.");
        }

        if($_POST["usuario"] == ""){
            throw new \Exception("Usuário vazio.");
        }

        $this->beginTransaction();
        $user = $this->model("Usuario");
        
        $user->setUsuario($_POST["usuario"]);
        $user->setSenha(password_hash($_POST["senha"], PASSWORD_DEFAULT));
        $user->save();

        $this->commitTransaction();

        $this->service("Login")->autenticar($_POST["usuario"], $_POST["senha"]);
        

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