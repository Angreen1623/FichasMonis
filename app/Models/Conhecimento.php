<?php

namespace App\Models;

use App\DAO\ConhecimentoDAO;

class Conhecimento extends Model
{
    private ?int $id = null;
    private ?string $nome = null;

    #region CRUD

    function getAll(): array
    {
        return (new ConhecimentoDAO())->select();
    }

    function getById(int $id): ?Conhecimento
    {
        return (new ConhecimentoDAO())->selectById($id);
    }

    #endregion

    #region relationship
    #endregion

    #region CRUD
    function getId(): ?int
    {
        return $this->id;
    }

    function setId(int $id): void
    {
        $this->id = $id;
    }

    function getNome(): ?string
    {
        return $this->nome;
    }

    function setNome(string $nome): void  
    {
        $this->nome = $nome;
    }

    #endregion

}