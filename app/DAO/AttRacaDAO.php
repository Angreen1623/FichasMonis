<?php
namespace App\DAO;

use App\Models\AttRaca;
use App\Core\Database;

class AttRacaDAO extends Database
{

    public function __construct() {
        parent::__construct();
    }

    ###############################################################################
    
    public function selectByIdRaca(int $id_raca): array
    {
        $query = "SELECT * FROM attraca WHERE id_raca = ?";

        $rows = $this->sql($query, [$id_raca]);

        $atrbs = [];
        foreach($rows as $row){
            $atrb = new AttRaca();
            $atrb->setAtributo($row["atributo"]);
            $atrb->setId($row["id_att_raca"]);
            $atrb->setIdRaca($row["id_raca"]);
            $atrbs[] = $atrb;
        }

        return $atrbs;
    }

    ###############################################################################

    
}