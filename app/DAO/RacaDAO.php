<?php
namespace App\DAO;

use App\Models\Raca;
use App\Core\Database;

class RacaDAO extends Database
{

    public function __construct() {
        parent::__construct();
    }

    ###############################################################################
    
    public function select(): array
    {
        $query = "SELECT * FROM raca";

        $rows = $this->sql($query);

        foreach ($rows as $row) {
            $raca = new Raca();

            $raca->setId($row["id_raca"]);
            $raca->setNome($row["nome"]);
            $raca->setCapCarga($row["cap_carga"]);
            $raca->setDescricao($row["descricao"]);
            $raca->setVelocidade($row["velocidade"]);

            $racas[] = $raca;
        }
        
        if (!isset($racas)) {
            throw new \Exception("Nenhuma raça encontrada.");
        }

        return $racas;
    }

    ###########################################################################
    
}