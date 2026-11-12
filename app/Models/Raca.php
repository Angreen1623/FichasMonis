<?php

namespace App\Models;

use App\DAO\RacaDAO;

class Raca extends Model
{
    private ?int $id = null;
    private ?string $nome = null;
    private ?int $cap_carga = null;
    private ?string $descricao = null;
    private ?int $velocidade = null;

    #region CRUD

    function getAll(): array
    {
        return (new RacaDAO())->select();
    }

    function getById(int $id_raca): ?Raca
    {
        return (new RacaDAO())->selectById($id_raca);
    }

    #endregion

    #region relationships

    function carraca(): array
    {
        return (new CarRaca())->getByRaca($this->id);
    }

    function attraca(): array
    {
        return (new AttRaca())->getByRaca($this->id);
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

    public function getCapCarga(): ?int
    {
        return $this->cap_carga;
    }

    public function setCapCarga(?int $cap_carga): void
    {
        $this->cap_carga = $cap_carga;
    }

    public function getDescricao(): ?string
    {
        return $this->descricao;
    }

    public function setDescricao(?string $descricao): void
    {
        $this->descricao = $descricao;
    }

    public function getVelocidade(): ?int
    {
        return $this->velocidade;
    }

    public function setVelocidade(?int $velocidade): void
    {
        $this->velocidade = $velocidade;
    }
    #endregion
}