<?php
namespace App\DAO;

use App\Models\Arquetipo;
use App\Core\Database;

class ArquetipoDAO extends Database
{

    public function __construct() {
        parent::__construct();
    }

    ###############################################################################
    
    public function select(): array
    {
        $query = "SELECT * FROM arquetipo";

        $rows = $this->sql($query);

        foreach ($rows as $row) {
            $arq = new Arquetipo();

            $arq->setId($row["id_arq"]);
            $arq->setNome($row["nome"]);
            $arq->setDescricao($row["descricao"]);
            $arq->setPv($row["pv"]);
            $arq->setPm($row["pm"]);

            $arqs[] = $arq;
        }
        
        if (!isset($arqs)) {
            throw new \Exception("Nenhum arquetipo encontrado.");
        }

        return $arqs;
    }

    ###########################################################################

    public function selectById(int $id): ?Arquetipo
    {
        
        $query = "SELECT * FROM arquetipo WHERE id_arq = ?";

        $rows = $this->sql($query, [$id]);

        if (count($rows) === 0) {
            return null;
        }

        $row = $rows[0];

        $arq = new Arquetipo();

        $arq->setId($row["id_arq"]);
        $arq->setNome($row["nome"]);
        $arq->setDescricao($row["descricao"]);
        $arq->setPv($row["pv"]);
        $arq->setPm($row["pm"]);

        return $arq;
    }

    ###########################################################################
    
}