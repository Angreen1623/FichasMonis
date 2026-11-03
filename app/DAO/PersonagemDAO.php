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

    public function save(Personagem $personagem): Personagem
    {
        return ($personagem->getId() === null) ? $this->insert($personagem) : $this->update($personagem);
    }

    ###############################################################################
    
    public function insert(Personagem $personagem): Personagem
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

    public function update(Personagem $personagem): ?Personagem
    {
        $query = "UPDATE personagem SET nome = ?, regiao = ?, idade = ?, img = ?, objetivo = ?, destino = ?, dim = ?, id_status = ?, id_raca = ?, id_nv = ?, id_atributo = ?, mons = ? WHERE id_perso = ?";

        $parms = [
            $personagem->getNome(),
            $personagem->getRegiao(),
            $personagem->getIdade(),
            $personagem->getImg(),
            $personagem->getObjetivo(),
            $personagem->getDestino(),
            $personagem->getDim(),
            $personagem->getIdStatus(),
            $personagem->getIdRaca(),
            $personagem->getIdNv(),
            $personagem->getIdAtributo(),
            $personagem->getMons(),
            $personagem->getId()
        ];

        $this->sql($query, $parms);

        return $personagem;
    }

    ###############################################################################
    
}