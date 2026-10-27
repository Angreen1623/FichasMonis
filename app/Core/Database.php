<?php
namespace App\Core;

use PDO;

class Database extends PDO
{
    private static ?PDO $pdo = null;

    public function __construct()
    {
        $dsn = "mysql:host=". $_ENV['db']['host'] .";dbname=". $_ENV['db']['database'];

        if (self::$pdo === null) {
            require __DIR__ . '/../../config/config.php';
            self::$pdo = new PDO(
                $dsn, 
                $_ENV['db']['user'], 
                $_ENV['db']['pass'],
                [
                    PDO::ATTR_PERSISTENT => true,
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8mb4'
            ]);
        }
    }

    public function sql($query, $params = [])
    {
        $stmt = self::$pdo->prepare($query);
        $stmt->execute($params);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}