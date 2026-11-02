<?php

namespace App\Models;

use App\DAO\ItemInventarioDAO;

class ItemInventario extends Model
{
    private ?int $id;
    private ?int $id_personagem;
    private ?int $id_item;
    private ?int $qtd;
    

    #region CRUD

    public function getByPersonagem(int $id): array
    {
        return (new ItemInventarioDAO())->selectByPersoId($id);
    }

    #endregion

    #region relationships



    #endregion

    #region Getters and Setters

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(?int $id): void
    {
        $this->id = $id;
    }

    public function getIdPersonagem(): ?int
    {
        return $this->id_personagem;
    }

    public function setIdPersonagem(?int $id_personagem): void
    {
        $this->id_personagem = $id_personagem;
    }

    public function getIdItem(): ?int
    {
        return $this->id_item;
    }

    public function setIdItem(?int $id_item): void
    {
        $this->id_item = $id_item;
    }

    public function getQtd(): ?int
    {
        return $this->qtd;
    }

    public function setQtd(?int $qtd): void
    {
        $this->qtd = $qtd;
    }

    #endregion

}