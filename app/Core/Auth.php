<?php

namespace App\Core;

use App\Services\LoginService;

class Auth
{
    public static function check(): bool
    {
        $login_service = new LoginService();
        return $login_service->isLogged();
    }

}