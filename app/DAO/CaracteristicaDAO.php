<?php
namespace App\DAO;

use App\Models\Caracteristica;
use App\Core\Database;

class CaracteristicaDAO extends Database
{

    public function __construct() {
        parent::__construct();
    }

    ###############################################################################
    
    public function select(): array
    {
        $query = "SELECT * FROM caracteristica";

        $rows = $this->sql($query);

        foreach ($rows as $row) {
            $car = new Caracteristica();

            $car->setId($row["id_car"]);
            $car->setNome($row["nome"]);
            $car->setTipo($row["tipo"]);

            $cars[] = $car;
        }
        
        if (!isset($cars)) {
            throw new \Exception("Nenhuma característica encontrada.");
        }

        return $cars;
    }

    ###########################################################################

    public function selectById(int $id): ?Caracteristica
    {
        $query = "SELECT * FROM caracteristica WHERE id_car = ?";

        $rows = $this->sql($query, [$id]);

        if (count($rows) === 0) {
            return null;
        }

        $row = $rows[0];

        $car = new Caracteristica();

        $car->setId($row["id_car"]);
        $car->setNome($row["nome"]);
        $car->setTipo($row["tipo"]);

        return $car;
    }
    
}