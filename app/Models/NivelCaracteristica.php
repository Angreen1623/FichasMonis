<?php

namespace App\Models;

use App\DAO\NivelCaracteristicaDAO;

class NivelCaracteristica extends Model
{
    private ?int $id = null;
    private ?int $id_nv = null;
    private ?int $id_car = null;
    private ?int $nv_car = null;
    
    #region CRUD

    public function save(): ?NivelCaracteristica
    {
        return (new NivelCaracteristicaDAO())->save($this);
    }

    public function getByNivel(int $id_nivel): ?array
    {
        return (new NivelCaracteristicaDAO())->selectByNivel($id_nivel);
    }

    #endregion

    #region relationships

    public function caracteristica(): ?Caracteristica
    {
        return (new Caracteristica())->getById($this->id_car);
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

    public function getIdNv(): ?int
    {
        return $this->id_nv;
    }

    public function setIdNv(?int $id_nv): void
    {
        $this->id_nv = $id_nv;
    }

    public function getIdCar(): ?int
    {
        return $this->id_car;
    }

    public function setIdCar(?int $id_car): void
    {
        $this->id_car = $id_car;
    }

    public function getNvCar(): ?int
    {
        return $this->nv_car;
    }

    public function setNvCar(?int $nv_car): void
    {
        $this->nv_car = $nv_car;
    }

    #endregion

}