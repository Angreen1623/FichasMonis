<?php
namespace App\DAO;

use App\Models\Status;
use App\Core\Database;

class StatusDAO extends Database
{

    public function __construct() {
        parent::__construct();
    }

    ###############################################################################

    public function save(Status $status): Status
    {
        return ($status->getId() === null) ? $this->insert($status) : $this->update($status);
    }

    ###############################################################################
    
    public function selectById(int $id): Status
    {
        $query = "SELECT * FROM status WHERE id_status = ?";

        $rows = $this->sql($query, [$id]);

        if (!$rows) {
            throw new \Exception("Status não encontrado.");
        }

        $row = $rows[0];

        $status = new Status();

        $status->setId($id);
        $status->setVelCur($row["vel_cur"]);
        $status->setVelMax($row["vel_max"]);
        $status->setVelTemp($row["vel_temp"]);
        $status->setDefCur($row["def_cur"]);
        $status->setDefMax($row["def_max"]);
        $status->setDefTemp($row["def_temp"]);
        $status->setPvCur($row["pv_cur"]);
        $status->setPvMax($row["pv_max"]);
        $status->setPvTemp($row["pv_temp"]);
        $status->setPmCur($row["pm_cur"]);
        $status->setPmMax($row["pm_max"]);
        $status->setPmTemp($row["pm_temp"]);
        $status->setRd($row["rd"]);

        return $status;
    }
    

    ###############################################################################

    public function insert(Status $status): ?Status
    {
        $query = "INSERT INTO status (vel_cur, vel_max, vel_temp, def_cur, def_max, def_temp, pv_cur, pv_max, pv_temp, pm_cur, pm_max, pm_temp, rd) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?,?)";

        $params = [
            $status->getVelCur(),
            $status->getVelMax(),
            $status->getVelTemp(),
            $status->getDefCur(),
            $status->getDefMax(),
            $status->getDefTemp(),
            $status->getPvCur(),
            $status->getPvMax(),
            $status->getPvTemp(),
            $status->getPmCur(),
            $status->getPmMax(),
            $status->getPmTemp(),
            $status->getRd()
        ];

        $this->sql($query, $params);

        $status->setId($this->lastInsertId());

        return $status;
    }

    ###############################################################################

    public function update(Status $status): ?Status
    {
        $query = "SELECT * FROM status WHERE id_status = ?";
        $rows = $this->sql($query, [$status->getId()]);

        if (empty($rows)) {
            return null;
        }

        $row = $rows[0];

        $campos = [
            "vel_cur" => $status->getVelCur(), 
            "vel_max" => $status->getVelMax(), 
            "vel_temp" => $status->getVelTemp(),
            "def_cur" => $status->getDefCur(), 
            "def_max" => $status->getDefMax(), 
            "def_temp" => $status->getDefTemp(),
            "pv_cur" => $status->getPvCur(),  
            "pv_max" => $status->getPvMax(),  
            "pv_temp" => $status->getPvTemp(), 
            "pm_cur" => $status->getPmCur(),  
            "pm_max" => $status->getPmMax(),  
            "pm_temp" => $status->getPmTemp(), 
            "rd" => $status->getRd()
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
            $params[] = $status->getId();

            $query = "UPDATE status SET "
                . implode(', ', $sets)
                . " WHERE id_status = ?";

            $this->sql($query, $params);
        }

        return $status;
    }

    ###############################################################################
    
}