<?php
namespace App\DAO;

use App\Models\NivelArquetipo;
use App\Core\Database;

class NivelArquetipoDAO extends Database
{

    public function __construct() {
        parent::__construct();
    }

    ###############################################################################

    public function save(NivelArquetipo $nv): NivelArquetipo
    {
        return ($nv->getId() === null) ? $this->insert($nv) : $this->update($nv);
    }

    ###############################################################################

    public function selectByNivel(int $id_nivel): array
    {
        $query = "SELECT * FROM nivelarquetipo WHERE id_nv = ?";

        $rows = $this->sql($query, [$id_nivel]);

        foreach ($rows as $row) {
            $nv = new NivelArquetipo();

            $nv->setId($row["id_nv_arq"]);
            $nv->setIdArq($row["id_arq"]);
            $nv->setIdNv($row["id_nv"]);
            $nv->setNvArq($row["nv_arq"]);

            $nvs[] = $nv;
        }
        
        if (!isset($nvs)) {
            throw new \Exception("Nenhum arquetipo encontrado para o id nivel informado.");
        }

        return $nvs;
    }

    ###############################################################################

    public function selectByNivel_Arquetipo(int $id_nivel, int $id_arq): NivelArquetipo
    {
        $query = "SELECT * FROM nivelarquetipo WHERE id_nv = ? AND id_arq = ?";

        $rows = $this->sql($query, [$id_nivel, $id_arq]);

        if (!isset($rows)) {
            throw new \Exception("Nenhum arquetipo encontrado para o id nivel informado.");
        }

        $row = $rows[0];
        
        $nv = new NivelArquetipo();

        $nv->setId($row["id_nv_arq"]);
        $nv->setIdArq($row["id_arq"]);
        $nv->setIdNv($row["id_nv"]);
        $nv->setNvArq($row["nv_arq"]);        
        

        return $nv;
    }
    
    ###############################################################################
    
    public function insert(NivelArquetipo $nv): NivelArquetipo
    {
        $query = "INSERT INTO nivelarquetipo (id_nv, id_arq, nv_arq) values (?,?,?)";

        $params = [
            $nv->getIdNv(),
            $nv->getIdArq(),
            $nv->getNvArq()
        ];

        $this->sql($query, $params);
        return $nv;
    }

    ###############################################################################

    public function update(NivelArquetipo $nivelarquetipo): ?NivelArquetipo
    {
        $query = "SELECT * FROM nivelarquetipo WHERE id_nv_arq = ?";
        $rows = $this->sql($query, [$nivelarquetipo->getId()]);

        if (empty($rows)) {
            return null;
        }

        $row = $rows[0];

        $campos = [
            'id_nv' => $nivelarquetipo->getIdNv(),
            'id_arq' => $nivelarquetipo->getIdArq(),
            'nv_arq' => $nivelarquetipo->getNvArq(),
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
            $params[] = $nivelarquetipo->getId();

            $query = "UPDATE nivelarquetipo SET "
                . implode(', ', $sets)
                . " WHERE id_nv_arq = ?";

            $this->sql($query, $params);
        }

        return $nivelarquetipo;
    }

    ###############################################################################

    
}