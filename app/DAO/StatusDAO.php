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
    
    public function selectById(int $id): array
    {
        $query = "SELECT * FROM status WHERE id = ?";

        $row = $this->sql($query, [$id]);

        if (!$row) {
            throw new \Exception("Status não encontrado.");
        }

        return $row;
    }

    ###########################################################################

    public function create(Status $status): ?Status
    {
        $query = "INSERT INTO status (vel_cur, vel_max, vel_temp, def_cur, def_max, def_temp, pv_cur, pv_max, pv_temp, pm_cur, pm_max, pm_temp, rd, dt_conjuracao) VALUES (NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL)";

        $this->sql($query);

        $status->setId($this->lastInsertId());

        return $status;
    }

    ###########################################################################
    
}