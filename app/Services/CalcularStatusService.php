<?php

namespace App\Services;

use App\Models\Personagem;

class CalcularStatusService
{
    public function calcularPv(Personagem $personagem): int
    {
        $pv_per_nv = 2;
        $pv_per_arq = [];
        
        $pv = $personagem->nivel()->getNvAventureiro() * $pv_per_nv;
        foreach($personagem->nivel()->nivelarquetipo() as $nv_arq){
            $pv_per_arq[] = $nv_arq->arquetipo()->getPv();
            $pv += $nv_arq->getNvArq() * $nv_arq->arquetipo()->getPv();
        }

        if(null !== $personagem->nivel()->nivelcaracteristica()){
            foreach($personagem->nivel()->nivelcaracteristica() as $nv_car){
                $pv += max($pv_per_arq) * $nv_car->getNvCar();
            }
        }

        return $pv;
    }

    public function calcularPm(Personagem $personagem): int
    {
        $pm_per_nv = 2;
        $pm_per_arq = [];
        
        $pm = $personagem->nivel()->getNvAventureiro() * $pm_per_nv;
        foreach($personagem->nivel()->nivelarquetipo() as $nv_arq){
            $pm_per_arq[] = $nv_arq->arquetipo()->getPm();
            $pm += $nv_arq->getNvArq() * $nv_arq->arquetipo()->getPm();
        }

        if(null !== $personagem->nivel()->cmtrunico()){
            $pm += max($pm_per_arq) * $personagem->nivel()->cmtrunico()->getNvCmtRunico();
        }

        return $pm;
    }

    public function calcularDef(): int
    {
        $default = 1;
        return $default;
    }
}