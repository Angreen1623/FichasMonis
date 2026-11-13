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
        $this->service("Login")->autenticar($_POST["usuario"], $_POST["senha"]);

        $this->redirect('/FichasMonis');
    }

    public function showSign(): void
    {
        $this->view('usuario/signup');
    }

    public function Sign(): void
    {
        $user = $this->model("Usuario");
        
        $user->setUsuario($_POST["usuario"]);
        $user->setSenha(password_hash($_POST["senha"], PASSWORD_DEFAULT));
        $user->save();

        $this->service("Login")->autenticar($_POST["usuario"], $_POST["senha"]);

        $this->redirect('/FichasMonis');
    }

}