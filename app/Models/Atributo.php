<?php

namespace App\Models;

use App\DAO\AtributoDAO;

class Atributo extends Model
{
    private ?int $id;
    private ?int $potencia;
    private ?int $agilidade;
    private ?int $sagacidade;
    private ?int $presenca;
    private ?int $espirito;
    private ?int $percepcao;

    #region CRUD

    public function save(): ?Atributo
    {
        return (new AtributoDAO())->create($this);
    }
    
    function getById(int $id): array
    {
        return (new AtributoDAO())->selectById($id);
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

    public function getPotencia(): ?int
    {
        return $this->potencia;
    }

    public function setPotencia(?int $potencia): void
    {
        $this->potencia = $potencia;
    }

    public function getAgilidade(): ?int
    {
        return $this->agilidade;
    }

    public function setAgilidade(?int $agilidade): void
    {
        $this->agilidade = $agilidade;
    }

    public function getSagacidade(): ?int
    {
        return $this->sagacidade;
    }

    public function setSagacidade(?int $sagacidade): void
    {
        $this->sagacidade = $sagacidade;
    }

    public function getPresenca(): ?int
    {
        return $this->presenca;
    }

    public function setPresenca(?int $presenca): void
    {
        $this->presenca = $presenca;
    }

    public function getEspirito(): ?int
    {
        return $this->espirito;
    }

    public function setEspirito(?int $espirito): void
    {
        $this->espirito = $espirito;
    }

    public function getPercepcao(): ?int
    {
        return $this->percepcao;
    }

    public function setPercepcao(?int $percepcao): void
    {
        $this->percepcao = $percepcao;
    }

    #endregion

}