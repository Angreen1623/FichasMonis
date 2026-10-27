<?php
namespace App\Core;

use PDO;

class Database
{
    private static ?PDO $pdo = null;

    public static function conectar(): PDO
    {
        if (self::$pdo === null) {
            $c = require __DIR__ . '/../../config/config.php';
            self::$pdo = new PDO(
                "mysql:host={$c['host']};dbname={$c['db']};charset=utf8mb4",
                $c['user'],
                $c['pass'],
                [
                    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                ]
            );
        }
        return self::$pdo;
    }
}