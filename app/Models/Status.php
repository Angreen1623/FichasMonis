<?php

namespace App\Models;

use App\DAO\StatusDAO;

class Status extends Model
{
    private ?int $id;
    private ?int $id_status;
    private ?int $vel_cur;
    private ?int $vel_max;
    private ?int $vel_temp;
    private ?int $def_cur;
    private ?int $def_max;
    private ?int $def_temp;
    private ?int $pv_cur;
    private ?int $pv_max;
    private ?int $pv_temp;
    private ?int $pm_cur;
    private ?int $pm_max;
    private ?int $pm_temp;
    private ?int $rd;
    private ?int $dt_conjuracao;

    #region CRUD

    public function getById(int $id): array
    {
        return (new StatusDAO())->selectById($id);
    }

    public function save(): ?Status
    {
        return (new StatusDAO())->create($this);
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

    public function getId_status(): ?int
    {
        return $this->id_status;
    }

    public function setId_status(?int $id_status): void
    {
        $this->id_status = $id_status;
    }

    public function getVel_cur(): ?int
    {
        return $this->vel_cur;
    }

    public function setVel_cur(?int $vel_cur): void
    {
        $this->vel_cur = $vel_cur;
    }

    public function getVel_max(): ?int
    {
        return $this->vel_max;
    }

    public function setVel_max(?int $vel_max): void
    {
        $this->vel_max = $vel_max;
    }

    public function getVel_temp(): ?int
    {
        return $this->vel_temp;
    }

    public function setVel_temp(?int $vel_temp): void
    {
        $this->vel_temp = $vel_temp;
    }

    public function getDef_cur(): ?int
    {
        return $this->def_cur;
    }

    public function setDef_cur(?int $def_cur): void
    {
        $this->def_cur = $def_cur;
    }

    public function getDef_max(): ?int
    {
        return $this->def_max;
    }

    public function setDef_max(?int $def_max): void
    {
        $this->def_max = $def_max;
    }

    public function getDef_temp(): ?int
    {
        return $this->def_temp;
    }

    public function setDef_temp(?int $def_temp): void
    {
        $this->def_temp = $def_temp;
    }

    public function getPv_cur(): ?int
    {
        return $this->pv_cur;
    }

    public function setPv_cur(?int $pv_cur): void
    {
        $this->pv_cur = $pv_cur;
    }

    public function getPv_max(): ?int
    {
        return $this->pv_max;
    }

    public function setPv_max(?int $pv_max): void
    {
        $this->pv_max = $pv_max;
    }

    public function getPv_temp(): ?int
    {
        return $this->pv_temp;
    }

    public function setPv_temp(?int $pv_temp): void
    {
        $this->pv_temp = $pv_temp;
    }

    public function getPm_cur(): ?int
    {
        return $this->pm_cur;
    }

    public function setPm_cur(?int $pm_cur): void
    {
        $this->pm_cur = $pm_cur;
    }

    public function getPm_max(): ?int
    {
        return $this->pm_max;
    }

    public function setPm_max(?int $pm_max): void
    {
        $this->pm_max = $pm_max;
    }

    public function getPm_temp(): ?int
    {
        return $this->pm_temp;
    }

    public function setPm_temp(?int $pm_temp): void
    {
        $this->pm_temp = $pm_temp;
    }

    public function getRd(): ?int
    {
        return $this->rd;
    }

    public function setRd(?int $rd): void
    {
        $this->rd = $rd;
    }

    public function getDt_conjuracao(): ?int
    {
        return $this->dt_conjuracao;
    }

    public function setDt_conjuracao(?int $dt_conjuracao): void
    {
        $this->dt_conjuracao = $dt_conjuracao;
    }

    #endregion

}