<?php

namespace App\Core;

class TransactionManager extends Database
{
    public function __construct() {
        parent::__construct();
    }
    
    public function begin(): void
    {
        Database::getConnection()->beginTransaction();
    }

    public function commit(): void
    {
        Database::getConnection()->commit();
    }

    public function rollback(): void
    {
        $pdo = Database::getConnection();

        if ($pdo->inTransaction()) {
            $pdo->rollBack();
        }
    }
}