<?php
namespace App\DAO;

use App\Models\Raca;
use App\Core\Database;

class RacaDAO extends Database
{

    public function __construct() {
        parent::__construct();
    }

    ###############################################################################

    public function save(Raca $raca): Raca
    {
        return ($raca->getId() === null) ? $this->insert($raca) : $this->update($raca);
    }

    ###############################################################################
    
    public function insert(Raca $raca): Raca
    {
        $query = "INSERT INTO raca (nome, cap_carga, descricao, velocidade) values (?,?,?,?)";

        $params = [
            $raca->getNome(),
            $raca->getCapCarga(),
            $raca->getDescricao(),
            $raca->getVelocidade()
        ];

        $this->sql($query, $params);
        return $raca;
    }

    ###############################################################################

    public function update(Raca $raca): Raca
    {
        $query = "UPDATE raca SET nome = ?, cap_carga = ?, descricao = ?, velocidade = ? WHERE id = ?";

        $params = [
            $raca->getNome(),
            $raca->getCapCarga(),
            $raca->getDescricao(),
            $raca->getVelocidade(),
            $raca->getId()
        ];
        
        $this->sql($query, $params);

        return $raca;
    }

    ###############################################################################
    
    public function selectbyId(int $id): Raca
    {
        $raca = new Raca();
        $query = "SELECT * FROM raca WHERE id_raca = ?";
        $params = [$id];

        $rows = $this->sql($query, $params);

        $row = $rows[0];

        $raca = new Raca();

        $raca->setId($row["id_raca"]);
        $raca->setNome($row["nome"]);
        $raca->setCapCarga($row["cap_carga"]);
        $raca->setDescricao($row["descricao"]);
        $raca->setVelocidade($row["velocidade"]);


        return $raca;
    }

    ###############################################################################
    
    public function select(): array
    {
        $query = "SELECT * FROM raca";

        $rows = $this->sql($query);

        foreach ($rows as $row) {
            $raca = new Raca();

            $raca->setId($row["id_raca"]);
            $raca->setNome($row["nome"]);
            $raca->setCapCarga($row["cap_carga"]);
            $raca->setDescricao($row["descricao"]);
            $raca->setVelocidade($row["velocidade"]);

            $racas[] = $raca;
        }
        
        if (!isset($racas)) {
            throw new \Exception("Nenhuma raça encontrada.");
        }

        return $racas;
    }

    ###############################################################################

    public function delete(int $id): bool
    {
        return false;
    }

    ###########################################################################
    
}