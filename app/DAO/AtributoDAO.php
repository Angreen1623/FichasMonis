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
    
    public function selectById(int $id): array
    {
        $query = "SELECT * FROM Atributo WHERE id_atributo = ?";

        $row = $this->sql($query, [$id]);

        if (!$row) {
            throw new \Exception("Atributo não encontrado.");
        }

        return $row;
    }

    ###############################################################################

    public function create(Atributo $atributo): ?Atributo
    {
        $query = "INSERT INTO Atributo (agilidade, espirito, percepcao, potencia, presenca, sagacidade) VALUES (?, ?, ?, ?, ?, ?)";

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

    
}