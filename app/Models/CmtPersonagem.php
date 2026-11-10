<?php

namespace App\Models;

use App\Models\Conhecimento;
use App\DAO\CmtPersonagemDAO;

class CmtPersonagem extends Model
{
    private ?int $id = null;
    private ?int $id_cmt = null;
    private ?int $id_perso = null;
    private ?int $valor = null;

    #region CRUD

    function save() : CmtPersonagem
    {
        return (new CmtPersonagemDAO())->save($this);
    }

    function select(): array
    {
        return (new CmtPersonagemDAO())->select();
    }

    function getByPerso(int $id_perso): array
    {
        return (new CmtPersonagemDAO())->selectByPerso($id_perso);
    }

    #endregion

    #region relationship
    
    function conhecimento(): Conhecimento
    {
        return (new Conhecimento())->getById($this->id_cmt);
    }

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

    function getIdCmt(): ?int
    {
        return $this->id_cmt;
    }

    function setIdCmt(int $id_cmt): void  
    {
        $this->id_cmt = $id_cmt;
    }

    function getIdPerso(): ?int
    {
        return $this->id_perso;
    }

    function setIdPerso(int $id_perso): void
    {
        $this->id_perso = $id_perso;
    }

    function getValor(): ?int
    {
        return $this->valor;
    }

    function setValor(int $valor): void
    {
        $this->valor = $valor;
    }

    #endregion

}