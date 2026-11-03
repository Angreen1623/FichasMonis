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
        $query = "UPDATE atributo SET agilidade = ?, espirito = ?, percepcao = ?, potencia = ?, presenca = ?, sagacidade = ? WHERE id_atributo = ?)";

        $parms = [
            $atributo->getAgilidade(),
            $atributo->getEspirito(),
            $atributo->getPercepcao(),
            $atributo->getPotencia(),
            $atributo->getPresenca(),
            $atributo->getSagacidade(),
            $atributo->getId()
        ];

        $this->sql($query, $parms);

        return $atributo;
    }

    ###############################################################################

    
}