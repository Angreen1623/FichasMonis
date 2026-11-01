<?php

namespace App\Models;

use App\DAO\DetalheCaracteristicaDAO;

class DetalheCaracteristica extends Model
{
    private ?int $id;
    private ?int $id_caracteristica;
    private ?int $id_habilidade;
    private ?int $nv;

    #region CRUD

    function getByCaracteristica(int $id_car): array
    {
        return (new DetalheCaracteristicaDAO())->selectByCaracteristica($id_car);
    }

    #endregion

    #region relationship
    
    function habilidade(): array
    {
        return (new Habilidade())->getById($this->id_habilidade);
    }

    #endregion

    #region CRUD
    function getId(): int
    {
        return $this->id;
    }

    function setId(int $id): void
    {
        $this->id = $id;
    }

    function getIdCaracteristica(): int
    {
        return $this->id_caracteristica;
    }

    function setIdCaracteristica(int $id_caracteristica): void  
    {
        $this->id_caracteristica = $id_caracteristica;
    }

    function getIdHabilidade(): int
    {
        return $this->id_habilidade;
    }

    function setIdHabilidade(int $id_habilidade): void
    {
        $this->id_habilidade = $id_habilidade;
    }

    function getNv(): int
    {
        return $this->nv;
    }

    function setNv(int $nv): void
    {
        $this->nv = $nv;
    }

    #endregion

}