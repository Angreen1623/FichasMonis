<?php
namespace App\DAO;

use App\Models\Personagem;
use App\Core\Database;

class PersonagemDAO extends Database
{

    public function __construct() {
        parent::__construct();
    }

    ###############################################################################
    
    public function create(Personagem $personagem): Personagem
    {
        $query = "INSERT INTO personagem (nome, dim, id_status, id_raca, id_nv, id_atributo) VALUES (?, ?, ?, ?, ?, ?)";


        $parms = [
            $personagem->getNome(),
            $personagem->getDim(),
            $personagem->getIdStatus(),
            $personagem->getIdRaca(),
            $personagem->getIdNv(),
            $personagem->getIdAtributo()
        ];

        $this->sql($query, $parms);
        return $personagem;
    }

    ###########################################################################
    
}