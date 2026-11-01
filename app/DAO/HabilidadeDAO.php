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

    public function selectById(int $id): array
    {
        $query = "SELECT * FROM habilidade WHERE id_hab = ?";

        $rows = $this->sql($query, [$id]);

        if (empty($rows)) {
            throw new \Exception("Habilidade não encontrada.");
        }

        $hab = new Habilidade();

        $row = $rows[0];

        $hab->setId($row["id_hab"]);
        $hab->setNome($row["nome"]);
        $hab->setDescricao($row["descricao"]);
        $hab->setImg($row["img"]);

        return [$hab];
    }

}