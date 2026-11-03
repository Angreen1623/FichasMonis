<?php

namespace App\Models;

use App\DAO\NivelDAO;

class Nivel extends Model
{
    private ?int $id;
    private ?int $nv_aventureiro = 3;
    
    #region CRUD

    public function save(): ?Nivel
    {
        return (new NivelDAO())->save($this);
    }

    public function getById(int $id): array
    {
        return (new NivelDAO())->selectById($id);
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

    public function getNvAventureiro(): ?int
    {
        return $this->nv_aventureiro;
    }

    public function setNvAventureiro(?int $nv_aventureiro): void
    {
        $this->nv_aventureiro = $nv_aventureiro;
    }

    #endregion

}