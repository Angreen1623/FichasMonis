<?php

namespace App\Models;

use App\DAO\NivelDAO;

class Nivel extends Model
{
    private ?int $id = null;
    private ?int $nv_aventureiro = 3;
    
    #region CRUD

    public function save(): ?Nivel
    {
        return (new NivelDAO())->save($this);
    }

    public function getById(int $id): ?Nivel
    {
        return (new NivelDAO())->selectById($id);
    }

    #endregion

    #region relationships

    public function nivelarquetipo(): array
    {
        return (new NivelArquetipo())->getByNivel($this->id);
    }

    public function nivelcaracteristica(): ?array 
    {
        return (new NivelCaracteristica())->getByNivel($this->id);
    }

    public function cmtrunico(): ?CmtRunico 
    {
        return (new CmtRunico())->getByNivel($this->id);
    }

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