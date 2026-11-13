<?php

namespace App\Services;

use App\Models\Usuario;
use App\Models\Session;

use DateTime;
use DateTimeZone;

class LoginService
{
    public function autenticar(String $usuario, string $senha): bool
    {
        $user = (new Usuario())->getByUsuario($usuario);

        if($user == null){
            return false;
        }

        if(!password_verify($senha, $user->getSenha())){
            return false;
        }

        $this->regenerateSession($user);

        return true;
    }

    public function isLogged(): bool
    {
        if(!isset($_COOKIE["session"])){
            return false;
        }

        $session = new Session();
        $session->getById($_COOKIE["session"]);

        if($session == null){
            return false;
        }

        return true;
    }

    private function regenerateSession(Usuario $user): void
    {
        $days2expire = 1;
        $seconds2expire = ($days2expire*24)*3600;

        $dt = new DateTime("now");
        $expiring_date = new DateTime("now");
        $expiring_date->modify("+". $seconds2expire ." seconds");
        $dt = date_format($dt, "Y-m-d H:i:s");
        $expiring_date = date_format($expiring_date, "Y-m-d H:i:s");

        if(isset($_COOKIE["session"])){
            $session = new Session();
            $session->setId($_COOKIE["session"]);
            $session->setExpiredAt($dt);
            $session->save();
        }

        $session = new Session();
        $session->setIdUser($user->getId());
        $session->setIpAddress($_SERVER['REMOTE_ADDR']);
        $session->setUserAgent($_SERVER['HTTP_USER_AGENT']);
        $session->setCreatedAt($dt);
        $session->setLastActivity($dt);
        $session->setExpiresAt($expiring_date);
        $session->save();

        setcookie('session', $session->getId(), [
            'expires' => time() + $seconds2expire, 
            'path' => '/',
            'secure' => false,
            'httponly' => true,
            'samesite' => 'Strict'
        ]);
        
    }

    public function getIdUser(): ?int
    {
        if($_COOKIE["session"] == null){
            return null;
        }

        $session = (new Session())->getById($_COOKIE["session"]);
        return $session->getIdUser();
    }
}