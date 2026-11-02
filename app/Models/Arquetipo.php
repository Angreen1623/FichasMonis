<?php

namespace App\Models;

use App\DAO\ArquetipoDAO;

class Arquetipo extends Model
{
    private ?int $id = null;
    private ?string $nome = null;
    private ?string $descricao = null;
    private ?int $pv = null;
    private ?int $pm = null;

    #region CRUD

    function getAll(): array
    {
        return (new ArquetipoDAO())->select();
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

    public function getDescricao(): ?string
    {
        return $this->descricao;
    }

    public function setDescricao(?string $descricao): void
    {
        $this->descricao = $descricao;
    }

    public function getPv(): ?int
    {
        return $this->pv;
    }

    public function setPv(?int $pv): void
    {
        $this->pv = $pv;
    }

    public function getPm(): ?int
    {
        return $this->pm;
    }

    public function setPm(?int $pm): void
    {
        $this->pm = $pm;
    }

    #endregion
}