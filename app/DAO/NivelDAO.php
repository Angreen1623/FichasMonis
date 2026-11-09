<?php
namespace App\DAO;

use App\Models\Nivel;
use App\Core\Database;

class NivelDAO extends Database
{

    public function __construct() {
        parent::__construct();
    }

    ###############################################################################

    public function save(Nivel $nivel): ?Nivel 
    {
        return ($nivel->getId() === null) ? $this->insert($nivel) : $this->update($nivel);
    }

    ##################################################################################
    
    public function selectById(int $id): Nivel
    {
        $query = "SELECT * FROM nivel WHERE id_nv = ?";

        $rows = $this->sql($query, [$id]);

        if (!$rows) {
            throw new \Exception("Nível não encontrado.");
        }

        $row = $rows[0];

        $nv = new Nivel;

        $nv->setId($row["id_nv"]);
        $nv->setNvAventureiro($row["nv_aventureiro"]);

        return $nv;
    }

    ##################################################################################

    public function insert(Nivel $nivel): ?Nivel
    {
        $query = "INSERT INTO nivel (nv_aventureiro) VALUES (?)";

        $this->sql($query, [$nivel->getNvAventureiro()]);

        $nivel->setId($this->lastInsertId());
        
        return $nivel;
    }

    ###############################################################################

    public function update(Nivel $nivel): ?Nivel
    {
        $query = "SELECT * FROM nivel WHERE id_nv = ?";
        $rows = $this->sql($query, [$nivel->getId()]);

        if (empty($rows)) {
            return null;
        }

        $row = $rows[0];

        $campos = [
            'nv_aventureiro' => $nivel->getNvAventureiro(),
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
            $params[] = $nivel->getId();

            $query = "UPDATE nivel SET "
                . implode(', ', $sets)
                . " WHERE id_nv = ?";

            $this->sql($query, $params);
        }

        return $nivel;
    }

    ###############################################################################
    
}