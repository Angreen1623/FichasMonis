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
    
    public function selectById(int $id): array
    {
        $query = "SELECT * FROM nivel WHERE id = ?";

        $row = $this->sql($query, [$id]);

        if (!$row) {
            throw new \Exception("Nível não encontrado.");
        }

        return $row;
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

    public function update(Nivel $atributo): ?Nivel
    {
        $query = "UPDATE nivel SET nv_aventureiro =  WHERE id_nv = ?)";

        $parms = [
            $atributo->getNvAventureiro(),
            $atributo->getId()
        ];

        $this->sql($query, $parms);

        return $atributo;
    }

    ###############################################################################
    
}