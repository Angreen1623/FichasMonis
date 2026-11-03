<?php

namespace App\Models;

use App\DAO\AttRacaDAO;

class AttRaca extends Model
{
    private ?int $id = null;
    private ?int $id_raca = null;
    private ?string $atributo = null;

    #region CRUD

    public function getByRaca(int $id_raca): ?array
    {
        return (new AttRacaDAO)->selectByIdRaca($id_raca);
    }

    #endregion

    #region Getters and Setters

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getIdRaca(): ?int
    {
        return $this->id_raca;
    }

    public function setIdRaca(int $id_raca): void
    {
        $this->id_raca = $id_raca;
    }

    public function getAtributo(): ?string
    {
        return $this->atributo;
    }

    public function setAtributo(string $atributo): void
    {
        $this->atributo = $atributo;
    }


    #endregion
}