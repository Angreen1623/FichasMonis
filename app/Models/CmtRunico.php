<?php

namespace App\Models;

use App\DAO\CmtRunicoDAO;

class CmtRunico extends Model
{
    private ?int $id = null;
    private ?int $id_nv = null;
    private ?int $nv_cmt_runico = null;
    
    #region CRUD

    public function save(): ?CmtRunico
    {
        return (new CmtRunicoDAO())->save($this);
    }

    public function getByNivel(int $id_nivel): ?CmtRunico
    {
        return (new CmtRunicoDAO())->selectByNivel($id_nivel);
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

    public function getIdNv(): ?int
    {
        return $this->id_nv;
    }

    public function setIdNv(?int $id_nv): void
    {
        $this->id_nv = $id_nv;
    }

    public function getNvCmtRunico(): ?int
    {
        return $this->nv_cmt_runico;
    }

    public function setNvCmtRunico(?int $nv_cmt_runico): void
    {
        $this->nv_cmt_runico = $nv_cmt_runico;
    }

    #endregion

}