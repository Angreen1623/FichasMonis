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
        $query = "SELECT * FROM Arquetipo";

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
    
}