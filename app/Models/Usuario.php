<?php

namespace App\Models;

use App\DAO\UsuarioDAO;

class Usuario extends Model
{
    private ?int $id = null;
    private ?string $usuario = null;
    private ?string $senha = null;

    #region CRUD

    public function save(): ?Usuario
    {
        return (new UsuarioDAO())->save($this);
    }

    public function getByUsuario(string $usuario): ?Usuario
    {
        return (new UsuarioDAO())->selectByUsuario($usuario);
    }

    public function getById(int $id): ?Usuario
    {
        return (new UsuarioDAO())->selectById($id);
    }

    #endregion

    #region Getters and Setters

    public function getId(): int {
        return $this->id;
    }

    public function setId(int $id): void {
        $this->id = $id;
    }

    public function getUsuario(): string {
        return $this->usuario;
    }

    public function setUsuario(string $usuario): void {
        $this->usuario = $usuario;
    }

    public function getSenha(): string {
        return $this->senha;
    }

    public function setSenha(string $senha): void {
        if(password_get_info($senha)["algo"] == null || strlen($senha) < 8 || strlen($senha) > 100){
            throw new \Exception("Senha Invalida", 1);
        }
        $this->senha = $senha;
    }

    #endregion
}