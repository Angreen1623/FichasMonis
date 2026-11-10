<?php

namespace App\Models;

use App\DAO\PersonagemDAO;

class Personagem extends Model
{
    private ?int $id = null;
    private ?string $nome = null;
    private ?string $regiao = null;
    private ?string $idade = null;
    private ?string $img = null;
    private ?string $objetivo = null;
    private ?string $destino = null;
    private ?string $dim = null;
    private ?int $id_status = null;
    private ?int $id_raca = null;
    private ?int $id_nv = null;
    private ?int $id_atributo = null;
    private ?int $mons = null;

    #region CRUD

    public function save(): ?Personagem
    {
        return (new PersonagemDAO())->save($this);
    }

    public function getById(int $id): ?Personagem
    {
        return (new PersonagemDAO())->selectbyId($id);
    }

    #endregion

    #region relationships

    public function status(): ?Status
    {
        return (new Status())->getById($this->id_status);
    }

    public function raca(): ?Raca
    {
        return (new Raca())->getById($this->id_raca);
    }

    public function atributo(): ?Atributo
    {
        return (new Atributo())->getById($this->id_atributo);
    }

    public function nivel(): ?Nivel
    {
        return (new Nivel())->getById($this->id_nv);
    }

    public function itemInventario(): ?array
    {
        return (new ItemInventario())->getByPersonagem($this->id);
    }

    public function cmtpersonagem(): ?array
    {
        return (new CmtPersonagem())->getByPerso($this->id);
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

    public function getIdade(): ?string
    {
        return $this->idade;
    }

    public function setIdade(?string $idade): void
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