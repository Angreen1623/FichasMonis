<?php
namespace App\DAO;

use App\Models\ItemInventario;
use App\Core\Database;

class ItemInventarioDAO extends Database
{

    public function __construct() {
        parent::__construct();
    }

    ###############################################################################
    
    public function selectByPersoId(int $id): array
    {
        $query = "SELECT * FROM iteminventario WHERE id_personagem = ?";

        $rows = $this->sql($query, [$id]);

        if (!$rows) {
            throw new \Exception("Item inventário não encontrado.");
        }

        $itensInventario = [];
        foreach ($rows as $row) {
            $itemInventario = new ItemInventario();
            $itemInventario->setId($row['id']);
            $itemInventario->setIdPersonagem($row['id_personagem']);
            $itemInventario->setIdItem($row['id_item']);
            $itemInventario->setQtd($row['qtd']);
            $itensInventario[] = $itemInventario;
        }

        return $itensInventario = [];
    }

    ###########################################################################
    
}