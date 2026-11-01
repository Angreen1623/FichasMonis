<?php
namespace App\DAO;

use App\Models\DetalheCaracteristica;
use App\Core\Database;

class DetalheCaracteristicaDAO extends Database
{

    public function __construct() {
        parent::__construct();
    }

    function selectByCaracteristica(int $id_caracteristica): array
    {
        $query = "SELECT * FROM detalhecaracteristica WHERE id_car = ?";
        
        $rows = $this->sql($query, [$id_caracteristica]);

        $dets = [];
        
        foreach ($rows as $row) {
            $det = new DetalheCaracteristica();

            $det->setId($row["id_det_car"]);
            $det->setIdCaracteristica($row["id_car"]);
            $det->setIdHabilidade($row["id_hab"]);
            $det->setNv($row["nv"]);

            
            array_push($dets, $det);
        }

        return $dets;
    }

}
