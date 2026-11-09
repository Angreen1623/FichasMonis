<?php
namespace App\DAO;

use App\Models\Atributo;
use App\Core\Database;

class AtributoDAO extends Database
{

    public function __construct() {
        parent::__construct();
    }

    ###############################################################################

    public function save(Atributo $atributo): Atributo
    {
        return ($atributo->getId() === null) ? $this->insert($atributo) : $this->update($atributo);
    }

    ###############################################################################
    
    public function selectById(int $id): Atributo
    {
        $query = "SELECT * FROM Atributo WHERE id_atributo = ?";

        $rows = $this->sql($query, [$id]);

        if (!$rows) {
            throw new \Exception("Atributo não encontrado.");
        }

        $row = $rows[0];

        $atributo = new Atributo();

        $atributo->setId($id);
        $atributo->setPotencia($row["potencia"]);
        $atributo->setAgilidade($row["agilidade"]);
        $atributo->setSagacidade($row["sagacidade"]);
        $atributo->setPresenca($row["presenca"]);
        $atributo->setEspirito($row["espirito"]);
        $atributo->setPercepcao($row["percepcao"]);

        return $atributo;
    }

    ###############################################################################

    public function insert(Atributo $atributo): ?Atributo
    {
        $query = "INSERT INTO atributo (agilidade, espirito, percepcao, potencia, presenca, sagacidade) VALUES (?, ?, ?, ?, ?, ?)";

        $parms = [
            $atributo->getAgilidade(),
            $atributo->getEspirito(),
            $atributo->getPercepcao(),
            $atributo->getPotencia(),
            $atributo->getPresenca(),
            $atributo->getSagacidade()
        ];

        $this->sql($query, $parms);

        $atributo->setId($this->lastInsertId());

        return $atributo;
    }

    ###############################################################################

    public function update(Atributo $atributo): ?Atributo
    {
        $query = "SELECT * FROM atributo WHERE id_atributo = ?";
        $rows = $this->sql($query, [$atributo->getId()]);

        if (empty($rows)) {
            return null;
        }

        $row = $rows[0];

        $campos = [
            'agilidade' => $atributo->getAgilidade(),
            'espirito' => $atributo->getEspirito(),
            'percepcao' => $atributo->getPercepcao(),
            'potencia' => $atributo->getPotencia(),
            'presenca' => $atributo->getPresenca(),
            'sagacidade' => $atributo->getSagacidade()
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
            $params[] = $atributo->getId();

            $query = "UPDATE atributo SET "
                . implode(', ', $sets)
                . " WHERE id_atributo = ?";

            $this->sql($query, $params);
        }
        
        return $atributo;
    }

    ###############################################################################

    
}