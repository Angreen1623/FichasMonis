<?php
namespace App\DAO;

use App\Models\CmtRunico;
use App\Core\Database;

class CmtRunicoDAO extends Database
{

    public function __construct() {
        parent::__construct();
    }

    ###############################################################################

    public function save(CmtRunico $nv): CmtRunico
    {
        return ($nv->getId() === null) ? $this->insert($nv) : $this->update($nv);
    }

    ###############################################################################

    public function selectByNivel(int $id_nivel): ?CmtRunico
    {
        $query = "SELECT * FROM cmtrunico WHERE id_nv = ?";

        $rows = $this->sql($query, [$id_nivel]);

        if ($rows == null) {
            return null;
        }
        
        $row = $rows[0];

        $nv = new CmtRunico();

        $nv->setId($row["id_cmt_runico"]);
        $nv->setIdNv($row["id_nv"]);
        $nv->setNvCmtRunico($row["nv_cmt_runico"]);
        

        return $nv;
    }
    
    ###############################################################################
    
    public function insert(CmtRunico $nv): CmtRunico
    {
        $query = "INSERT INTO cmtrunico (id_nv, nv_cmt_runico) values (?,?)";

        $params = [
            $nv->getIdNv(),
            $nv->getNvCmtRunico()
        ];

        $this->sql($query, $params);
        
        $nv->setId($this->lastInsertId());

        return $nv;
    }

    ###############################################################################

    public function update(CmtRunico $cmtrunico): ?CmtRunico
    {
        $query = "SELECT * FROM cmtrunico WHERE id_nv = ?";
        $rows = $this->sql($query, [$cmtrunico->getIdNv()]);

        if (empty($rows)) {
            return null;
        }

        $row = $rows[0];

        $campos = [
            'nv_cmt_runico' => $cmtrunico->getNvCmtRunico(),
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
            $params[] = $cmtrunico->getId();

            $query = "UPDATE cmtrunico SET "
                . implode(', ', $sets)
                . " WHERE id_cmt_runico = ?";

            $this->sql($query, $params);
        }

        return $cmtrunico;
    }

    ###############################################################################
    
}