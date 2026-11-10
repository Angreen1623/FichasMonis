<?php
namespace App\DAO;

use App\Models\CmtPersonagem;
use App\Core\Database;

class CmtPersonagemDAO extends Database
{

    public function __construct() {
        parent::__construct();
    }

    function select(): array
    {
        $query = "SELECT * FROM cmt_personagem";

        $rows = $this->sql($query);

        foreach ($rows as $row) {
            $cmt = new CmtPersonagem();

            $cmt->setIdCmt($row["id_cmt"]);
            $cmt->setIdPerso($row["id_perso"]);
            $cmt->setValor($row["valor"]);

            $cmts[] = $cmt;
        }
        
        if (!isset($cmts)) {
            throw new \Exception("Nenhum conhecimento encontrado.");
        }

        return $cmts;
    }

    ###########################################################################

    public function save(CmtPersonagem $conhecimento): ?CmtPersonagem 
    {
        return ($conhecimento->getId() === null) ? $this->insert($conhecimento) : $this->update($conhecimento);
    }

    ###########################################################################

    public function insert(CmtPersonagem $conhecimento): ?CmtPersonagem
    {
        $query = "INSERT INTO cmtpersonagem (id_cmt, id_perso, valor) VALUES (?, ?, ?)";

        $parms = [
            $conhecimento->getIdCmt(),
            $conhecimento->getIdPerso(),
            $conhecimento->getValor()
        ];

        $this->sql($query, $parms);

        $conhecimento->setId($this->lastInsertId());

        return $conhecimento;
    }

    ###########################################################################

    public function update(CmtPersonagem $conhecimento): ?CmtPersonagem
    {
        $query = "SELECT * FROM cmtpersonagem WHERE id_cmt_perso = ?";
        $rows = $this->sql($query, [$conhecimento->getId()]);

        if (empty($rows)) {
            return null;
        }

        $row = $rows[0];

        $campos = [
            'id_cmt' => $conhecimento->getIdCmt(),
            'id_perso' => $conhecimento->getIdPerso(),
            'valor' => $conhecimento->getValor(),
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
            $params[] = $conhecimento->getId();

            $query = "UPDATE cmtpersonagem SET "
                . implode(', ', $sets)
                . " WHERE id_cmt_perso = ?";

            $this->sql($query, $params);
        }

        return $conhecimento;
    }

    ###########################################################################

    function selectByPerso(int $id_perso): array
    {
        $query = "SELECT * FROM cmtpersonagem WHERE id_perso = ?";
        
        $rows = $this->sql($query, [$id_perso]);

        $cmts = [];
        
        foreach ($rows as $row) {
            $cmt = new CmtPersonagem();

            $cmt->setId($row["id_cmt_perso"]);
            $cmt->setIdCmt($row["id_cmt"]);
            $cmt->setIdPerso($row["id_perso"]);
            $cmt->setValor($row["valor"]);

            
            array_push($cmts, $cmt);
        }

        if ($cmts == null) {
            throw new \Exception("Nenhum conhecimento encontrado para este personagem.");
        }

        return $cmts;
    }

    ###########################################################################

    function selectByCmt_Perso(int $id_cmt, int $id_perso): CmtPersonagem
    {
        $query = "SELECT * FROM cmtpersonagem WHERE id_cmt = ? AND id_perso = ?";

        $rows = $this->sql($query, [$id_cmt, $id_perso]);

        if (!isset($rows)) {
            throw new \Exception("Nenhum conhecimento encontrado para o personagem informado.");
        }

        $row = $rows[0];
        
        $cmt_personagem = new CmtPersonagem();

        $cmt_personagem->setId($row["id_cmt_perso"]);
        $cmt_personagem->setIdCmt($row["id_cmt"]);
        $cmt_personagem->setIdPerso($row["id_perso"]);
        $cmt_personagem->setValor($row["valor"]);        
        

        return $cmt_personagem;
    }

}
