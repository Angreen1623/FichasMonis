<?php

namespace App\Models;

use App\DAO\CaracteristicaDAO;

class Caracteristica extends Model
{
    private ?int $id;
    private ?string $nome;
    private ?string $tipo;

    #region CRUD

    function getAll(): array
    {
        return (new CaracteristicaDAO())->select();
    }

    function getById(int $id): ?Caracteristica
    {
        return (new CaracteristicaDAO())->selectById($id);
    }

    #endregion

    #region relationships

    function detalheCaracteristica(): array
    {
        return (new DetalheCaracteristica())->getByCaracteristica($this->id);
    }

    #endregion

    #region Getters and Setters

    function getId(): int
    {
        return $this->id;
    }

    function setId(int $id): void
    {
        $this->id = $id;
    }

    function getNome(): string
    {
        return $this->nome;
    }

    function setNome(string $nome): void
    {
        $this->nome = $nome;
    }

    function getTipo(): string
    {
        return $this->tipo;
    }

    function setTipo(string $tipo): void
    {
        if (!in_array($tipo, ['comum', 'traco_unico']) || empty($tipo)) {
            throw new \InvalidArgumentException("Tipo inválido. Deve ser 'comum' ou 'traco_unico'.");
        }
        $this->tipo = $tipo;
    }

    #endregion
}
