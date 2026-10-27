<?php

namespace App\Models;

use App\DAO\RacaDAO;

class Raca
{
    private $id;
    private $nome;
    private $cap_carga;
    private $descricao;
    private $velocidade;

    function save(): Raca
    {
        return (new RacaDAO())->save($this);
    }

    function getById(int $id): ?Raca
    {
        return new Raca();
    }

    function getAll(): array
    {
        return [new Raca()];
    }

    function delete(int $id): bool
    {
        return false;
    }
    
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
    
}