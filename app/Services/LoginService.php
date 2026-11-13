<?php

namespace App\Services;

use App\Models\Usuario;
use App\Models\Session;

use DateTime;

class LoginService
{
    public function autenticar(String $usuario, string $senha): bool
    {
        $user = (new Usuario())->getByUsuario($usuario);

        $this->endSession();

        if($user == null){
            return false;
        }

        if(strlen($senha) < 8 || strlen($senha) > 100){
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
        $session = $session->getById($_COOKIE["session"]);

        if($session == null || $session->getExpiredAt() != null ){
            return false;
        }

        if($_SERVER['REMOTE_ADDR'] != $session->getIpAddress() || $_SERVER['HTTP_USER_AGENT'] != $session->getUserAgent()){
            
            setcookie('session', '', [
                'expires' => 0,
                'path' => '/',
                'secure' => false,
                'httponly' => true,
                'samesite' => 'Strict'
            ]);
            return false;
        }

        $now = new DateTime("now");
        $now = date_format($now, "Y-m-d H:i:s");

        if($now >= $session->getExpiresAt()){
            $session->setExpiredAt($session->getExpiresAt());
            $session->save();
            return false;
        }

        $session->setLastActivity($now);
        $session->save();

        return true;
    }

    private function regenerateSession(Usuario $user): void
    {
        $days2expire = 1;
        $seconds2expire = ($days2expire*24)*3600;

        $this->endSession();

        $dt = new DateTime("now");
        $expiring_date = new DateTime("now");
        $expiring_date->modify("+". $seconds2expire ." seconds");
        $dt = date_format($dt, "Y-m-d H:i:s");
        $expiring_date = date_format($expiring_date, "Y-m-d H:i:s");

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

    private function endSession(): void
    {

        $dt = new DateTime("now");
        $dt = date_format($dt, "Y-m-d H:i:s");

        if(isset($_COOKIE["session"])){
            $session = new Session();
            $session->setId($_COOKIE["session"]);
            $session->setExpiredAt($dt);
            $session->save();
        }
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