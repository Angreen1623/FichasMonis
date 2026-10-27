<?php

namespace App\Models;

use App\DAO\HabilidadeDAO;

class Habilidade
{
    private $id;
    private $nome;
    private $descricao;
    private $img;

    #region CRUD
    function getAll(): array
    {
        return (new HabilidadeDAO())->select();
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

    public function getImg(): ?string
    {
        return $this->img;
    }

    public function setImg(?string $img): void
    {
        $this->img = $img;
    }

    #endregion

}