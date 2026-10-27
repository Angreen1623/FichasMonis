<?php
namespace App\DAO;

use App\Models\Habilidade;
use App\Core\Database;

class HabilidadeDAO extends Database
{

    public function __construct() {
        parent::__construct();
    }

    ###############################################################################
    
    public function select(): array
    {
        $query = "SELECT * FROM habilidade";

        $rows = $this->sql($query);

        foreach ($rows as $row) {
            $hab = new Habilidade();

            $hab->setId($row["id_hab"]);
            $hab->setNome($row["nome"]);
            $hab->setDescricao($row["descricao"]);
            $hab->setImg($row["img"]);

            $habs[] = $hab;
        }
        
        if (!isset($habs)) {
            throw new \Exception("Nenhuma habilidade encontrada.");
        }

        return $habs;
    }

    ###########################################################################
    
}