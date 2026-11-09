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

    public function selectbyId(int $id): Personagem
    {
        $personagem = new Personagem();
        $query = "SELECT * FROM personagem WHERE id_perso = ?";
        $params = [$id];

        $rows = $this->sql($query, $params);


        if (!isset($rows)) {
            throw new \Exception("Nenhum personagem encontrado.");
        }

        $row = $rows[0];

        $personagem = new Personagem();

        $personagem->setNome($row["nome"]);
        $personagem->setRegiao($row["regiao"]);
        $personagem->setIdade($row["idade"]);
        $personagem->setImg($row["img"]);
        $personagem->setObjetivo($row["objetivo"]);
        $personagem->setDestino($row["destino"]);
        $personagem->setDim($row["dim"]);
        $personagem->setIdStatus($row["id_status"]);
        $personagem->setIdRaca($row["id_raca"]);
        $personagem->setIdNv($row["id_nv"]);
        $personagem->setIdAtributo($row["id_atributo"]);
        $personagem->setMons($row["mons"]);
        $personagem->setId($row["id_perso"]);


        return $personagem;
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

        $personagem->setId($this->lastInsertId());

        return $personagem;
    }

    ###########################################################################

    public function update(Personagem $personagem): ?Personagem
    {
        $query = "SELECT * FROM personagem WHERE id_perso = ?";
        $rows = $this->sql($query, [$personagem->getId()]);

        if (empty($rows)) {
            return null;
        }

        $row = $rows[0];

        $campos = [
            'nome' => $personagem->getNome(),
            'regiao' => $personagem->getRegiao(),
            'idade' => $personagem->getIdade(),
            'objetivo' => $personagem->getObjetivo(),
            'destino' => $personagem->getDestino(),
            'mons' => $personagem->getMons()
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
            $params[] = $personagem->getId();

            $query = "UPDATE personagem SET "
                . implode(', ', $sets)
                . " WHERE id_perso = ?";

            $this->sql($query, $params);
        }

        return $personagem;
    }

    ###############################################################################
    
}