<?php
namespace App\DAO;

use App\Models\Conhecimento;
use App\Core\Database;

class ConhecimentoDAO extends Database
{

    public function __construct() {
        parent::__construct();
    }

    function select(): array
    {
        $query = "SELECT * FROM conhecimento";

        $rows = $this->sql($query);

        foreach ($rows as $row) {
            $cmt = new Conhecimento();

            $cmt->setId($row["id_cmt"]);
            $cmt->setNome($row["nome"]);
            $cmts[] = $cmt;
        }
        
        if (!isset($cmts)) {
            throw new \Exception("Nenhum conhecimento encontrado.");
        }

        return $cmts;
    }

    public function selectById(int $id): ?Conhecimento
    {
        
        $query = "SELECT * FROM conhecimento WHERE id_cmt = ?";

        $rows = $this->sql($query, [$id]);

        if (count($rows) === 0) {
            return null;
        }

        $row = $rows[0];

        $cmt = new Conhecimento();

        $cmt->setId($row["id_cmt"]);
        $cmt->setNome($row["nome"]);

        return $cmt;
    }

}
