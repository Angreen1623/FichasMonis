<?php

namespace App\Models;

use App\DAO\PersonagemDAO;

class Personagem extends Model
{
    private ?int $id;
    private ?string $nome;
    private ?string $regiao;
    private ?string $idade;
    private ?string $img;
    private ?string $objetivo;
    private ?string $destino;
    private ?string $dim;
    private ?int $id_status;
    private ?int $id_raca;
    private ?int $id_nv;
    private ?int $id_atributo;
    private ?int $mons;

    #region CRUD

    public function save(): ?Personagem
    {
        return (new PersonagemDAO())->create($this);
    }

    #endregion

    #region relationships

    public function status(): ?array
    {
        return (new Status())->getById($this->id_status);
    }

    public function raca(): ?Raca
    {
        return (new Raca())->getById($this->id_raca);
    }

    public function atributo(): ?array
    {
        return (new Atributo())->getById($this->id_atributo);
    }

    public function nivel(): ?array
    {
        return (new Nivel())->getById($this->id_nv);
    }

    public function itemInventario(): ?array
    {
        return (new ItemInventario())->getByPersonagem($this->id);
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

    public function getNome(): ?string
    {
        return $this->nome;
    }

    public function setNome(?string $nome): void
    {
        $this->nome = $nome;
    }

    public function getRegiao(): ?string
    {
        return $this->regiao;
    }

    public function setRegiao(?string $regiao): void
    {
        $this->regiao = $regiao;
    }

    public function getIdade(): ?int
    {
        return $this->idade;
    }

    public function setIdade(?int $idade): void
    {
        $this->idade = $idade;
    }

    public function getImg(): ?string
    {
        return $this->img;
    }

    public function setImg(?string $img): void
    {
        $this->img = $img;
    }

    public function getObjetivo(): ?string
    {
        return $this->objetivo;
    }

    public function setObjetivo(?string $objetivo): void
    {
        $this->objetivo = $objetivo;
    }

    public function getDestino(): ?string
    {
        return $this->destino;
    }

    public function setDestino(?string $destino): void
    {
        $this->destino = $destino;
    }

    public function getDim(): ?string
    {
        return $this->dim;
    }

    public function setDim(?string $dim): void
    {
        $this->dim = $dim;
    }

    public function getIdStatus(): ?int
    {
        return $this->id_status;
    }

    public function setIdStatus(?int $id_status): void
    {
        $this->id_status = $id_status;
    }

    public function getIdNv(): ?int
    {
        return $this->id_nv;
    }

    public function setIdNv(?int $id_nv): void
    {
        $this->id_nv = $id_nv;
    }


    public function getIdRaca(): ?int
    {
        return $this->id_raca;
    }

    public function setIdRaca(?int $id_raca): void
    {
        $this->id_raca = $id_raca;
    }

    public function getIdAtributo(): ?int
    {
        return $this->id_atributo;
    }

    public function setIdAtributo(?int $id_atributo): void
    {
        $this->id_atributo = $id_atributo;
    }

    public function getMons(): ?int
    {
        return $this->mons;
    }

    public function setMons(?int $mons): void
    {
        $this->mons = $mons;
    }

    #endregion

}