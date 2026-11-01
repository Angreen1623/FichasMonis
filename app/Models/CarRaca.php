<?php

namespace App\Models;

use App\DAO\CarRacaDAO;

class CarRaca extends Model
{
    private ?int $id = null;
    private ?string $id_car = null;
    private ?string $id_raca = null;

    #region CRUD

    function getByRaca(int $id_raca): array
    {
        return (new CarRacaDAO())->selectByRaca($id_raca);
    }

    #endregion

    #region relationships

    function caracteristica(): ?Caracteristica
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

    public function getIdCar(): ?string
    {
        return $this->id_car;
    }

    public function setIdCar(?string $id_car): void
    {
        $this->id_car = $id_car;
    }

    public function getIdRaca(): ?string
    {
        return $this->id_raca;
    }

    public function setIdRaca(?string $id_raca): void
    {
        $this->id_raca = $id_raca;
    }

    #endregion
}