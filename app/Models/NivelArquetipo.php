<?php

namespace App\Models;

use App\DAO\NivelArquetipoDAO;

class NivelArquetipo extends Model
{
    private ?int $id = null;
    private ?int $id_nv = null;
    private ?int $id_arq = null;
    private ?int $nv_arq = null;
    
    #region CRUD

    public function save(): ?NivelArquetipo
    {
        return (new NivelArquetipoDAO())->save($this);
    }

    public function getByNivel(int $id_nivel): array
    {
        return (new NivelArquetipoDAO())->selectByNivel($id_nivel);
    }

    public function getByNivel_Arquetipo(int $id_nivel, int $id_arq): NivelArquetipo
    {
        return (new NivelArquetipoDAO())->selectByNivel_Arquetipo($id_nivel, $id_arq);
    }

    #endregion

    #region relationships

    public function arquetipo(){
        return (new Arquetipo())->getById($this->getIdArq());
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

    public function getIdNv(): ?int
    {
        return $this->id_nv;
    }

    public function setIdNv(?int $id_nv): void
    {
        $this->id_nv = $id_nv;
    }

    public function getIdArq(): ?int
    {
        return $this->id_arq;
    }

    public function setIdArq(?int $id_arq): void
    {
        $this->id_arq = $id_arq;
    }

    public function getNvArq(): ?int
    {
        return $this->nv_arq;
    }

    public function setNvArq(?int $nv_arq): void
    {
        $this->nv_arq = $nv_arq;
    }

    #endregion

}