<?php
namespace App\DAO;

use App\Models\NivelCaracteristica;
use App\Core\Database;

class NivelCaracteristicaDAO extends Database
{

    public function __construct() {
        parent::__construct();
    }

    ###############################################################################

    public function save(NivelCaracteristica $nv): NivelCaracteristica
    {
        return ($nv->getId() === null) ? $this->insert($nv) : $this->update($nv);
    }

    ###############################################################################

    public function selectByNivel(int $id_nivel): ?array
    {
        $query = "SELECT * FROM nivelcaracteristica WHERE id_nv = ?";

        $rows = $this->sql($query, [$id_nivel]);

        foreach ($rows as $row) {
            $nv = new NivelCaracteristica();

            $nv->setId($row["id_nv_car"]);
            $nv->setIdCar($row["id_car"]);
            $nv->setIdNv($row["id_nv"]);
            $nv->setNvCar($row["nv_car"]);

            $nvs[] = $nv;
        }
        
        if (!isset($nvs)) {
            return null;
        }

        return $nvs;
    }
    
    ###############################################################################
    
    public function insert(NivelCaracteristica $nv): NivelCaracteristica
    {
        $query = "INSERT INTO nivelcaracteristica (id_nv, id_car, nv_car) values (?,?,?)";

        $params = [
            $nv->getIdNv(),
            $nv->getIdCar(),
            $nv->getNvCar()
        ];

        $this->sql($query, $params);

        $nv->setId($this->lastInsertId());

        return $nv;
    }

    ###########################################################################

    public function update(NivelCaracteristica $nivelcaracteristica): ?NivelCaracteristica
    {
        $query = "SELECT * FROM nivelcaracteristica WHERE id_nv_car = ?";
        $rows = $this->sql($query, [$nivelcaracteristica->getId()]);

        if (empty($rows)) {
            return null;
        }

        $row = $rows[0];

        $campos = [
            'id_nv' => $nivelcaracteristica->getIdNv(),
            'id_car' => $nivelcaracteristica->getIdCar(),
            'nv_car' => $nivelcaracteristica->getNvCar(),
        ];

        $sets = [];
        $params = [];

        foreach ($campos as $campo => $valor) {
            if ($valor != $row[$campo]) {
                $sets[] = "$campo = ?";
                $params[] = $valor;
            }
        }

        if (!empty($sets)) {
            $params[] = $nivelcaracteristica->getId();

            $query = "UPDATE nivelcaracteristica SET "
                . implode(', ', $sets)
                . " WHERE id_nv_car = ?";

            $this->sql($query, $params);
        }

        return $nivelcaracteristica;
    }

    ###############################################################################

    public function delete(int $id): bool
    {
        $query = "DELETE FROM nivelcaracteristica WHERE id_nv_car = ?";
        $this->sql($query, [$id]);
        
        return true;
    }

    ###########################################################################

    
}