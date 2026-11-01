<?php
namespace App\DAO;

use App\Models\CarRaca;
use App\Core\Database;

class CarRacaDAO extends Database
{

    public function __construct() {
        parent::__construct();
    }

    ###############################################################################
    
    public function selectByRaca(int $id_raca): array
    {
        $query = "SELECT * FROM carraca WHERE id_raca = ?";

        $rows = $this->sql($query, [$id_raca]);

        foreach ($rows as $row) {
            $car = new CarRaca();

            $car->setId($row["id_car_raca"]);
            $car->setIdCar($row["id_car"]);
            $car->setIdRaca($row["id_raca"]);

            $cars[] = $car;
        }
        
        if (!isset($cars)) {
            throw new \Exception("Nenhuma característica encontrada para a raça informada.");
        }

        return $cars;
    }

    ###########################################################################
    
}