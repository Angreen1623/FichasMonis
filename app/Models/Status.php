<?php

namespace App\Models;

use App\DAO\StatusDAO;

class Status extends Model
{
    private ?int $id = null;
    private ?int $vel_cur = 0;
    private ?int $vel_max = 0;
    private ?int $vel_temp = 0;
    private ?int $def_cur = 0;
    private ?int $def_max = 0;
    private ?int $def_temp = 0;
    private ?int $pv_cur = 0;
    private ?int $pv_max = 0;
    private ?int $pv_temp = 0;
    private ?int $pm_cur = 0;
    private ?int $pm_max = 0;
    private ?int $pm_temp = 0;
    private ?int $rd = 0;
    private ?int $dt_conjuracao = 0;

    #region CRUD

    public function getById(int $id): Status
    {
        return (new StatusDAO())->selectById($id);
    }

    public function save(): ?Status
    {
        return (new StatusDAO())->save($this);
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

    public function getVelCur(): ?int
    {
        return $this->vel_cur;
    }

    public function setVelCur(?int $vel_cur): void
    {
        $this->vel_cur = $vel_cur;
    }

    public function getVelMax(): ?int
    {
        return $this->vel_max;
    }

    public function setVelMax(?int $vel_max): void
    {
        $this->vel_max = $vel_max;
    }

    public function getVelTemp(): ?int
    {
        return $this->vel_temp;
    }

    public function setVelTemp(?int $vel_temp): void
    {
        $this->vel_temp = $vel_temp;
    }

    public function getDefCur(): ?int
    {
        return $this->def_cur;
    }

    public function setDefCur(?int $def_cur): void
    {
        $this->def_cur = $def_cur;
    }

    public function getDefMax(): ?int
    {
        return $this->def_max;
    }

    public function setDefMax(?int $def_max): void
    {
        $this->def_max = $def_max;
    }

    public function getDefTemp(): ?int
    {
        return $this->def_temp;
    }

    public function setDefTemp(?int $def_temp): void
    {
        $this->def_temp = $def_temp;
    }

    public function getPvCur(): ?int
    {
        return $this->pv_cur;
    }

    public function setPvCur(?int $pv_cur): void
    {
        $this->pv_cur = $pv_cur;
    }

    public function getPvMax(): ?int
    {
        return $this->pv_max;
    }

    public function setPvMax(?int $pv_max): void
    {
        $this->pv_max = $pv_max;
    }

    public function getPvTemp(): ?int
    {
        return $this->pv_temp;
    }

    public function setPvTemp(?int $pv_temp): void
    {
        $this->pv_temp = $pv_temp;
    }

    public function getPmCur(): ?int
    {
        return $this->pm_cur;
    }

    public function setPmCur(?int $pm_cur): void
    {
        $this->pm_cur = $pm_cur;
    }

    public function getPmMax(): ?int
    {
        return $this->pm_max;
    }

    public function setPmMax(?int $pm_max): void
    {
        $this->pm_max = $pm_max;
    }

    public function getPmTemp(): ?int
    {
        return $this->pm_temp;
    }

    public function setPmTemp(?int $pm_temp): void
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

    public function getDtConjuracao(): ?int
    {
        return $this->dt_conjuracao;
    }

    public function setDtConjuracao(?int $dt_conjuracao): void
    {
        $this->dt_conjuracao = $dt_conjuracao;
    }

    #endregion

}