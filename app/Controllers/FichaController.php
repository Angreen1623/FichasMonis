<?php

namespace App\Controllers;

use App\Models\NivelArquetipo;
use App\Models\NivelCaracteristica;
use App\Models\Personagem;
use Exception;

class FichaController extends \App\Core\Controller
{
    public function criar(): void
    {
        try{
            $this->beginTransaction();

            $personagem = $this->model('Personagem');
            $personagem->setNome($_POST['nome']);
            $personagem->setIdRaca($_POST['id_raca']);

            $id_nv = $this->model('Nivel')->save()->getId();

            $personagem->setIdNv($id_nv);

            for ($i=1; $i<=3; $i++) { 
                $nivelArquetipo = $this->model('NivelArquetipo');
                $nivelArquetipo->setIdNv($id_nv);
                $nivelArquetipo->setIdArq($_POST['arquetipo' . $i]);
                $nivelArquetipo->setNvArq(1);
                $nivelArquetipo->save();
            }

            $status = $this->model('Status')->save();

            $personagem->setIdStatus($status->getId());
            $personagem->setDim($this->gerarDim($_POST['nome'], $_POST['id_raca']));

            $atributos = $this->model('Atributo');
            $atributos->setPotencia($_POST['potencia']);
            $atributos->setAgilidade($_POST['agilidade']);
            $atributos->setSagacidade($_POST['sagacidade']);
            $atributos->setPresenca($_POST['presenca']);
            $atributos->setEspirito($_POST['espirito']);
            $atributos->setPercepcao($_POST['percepcao']);
            $atributos->save();
            $personagem->setIdAtributo($atributos->getId());

            $personagem->save();

            foreach ($personagem->raca()->carraca() as $carraca) {
                $nivelCaracteristica = $this->model('NivelCaracteristica');
                $nivelCaracteristica->setIdNv($id_nv);
                $nivelCaracteristica->setIdCar($carraca->caracteristica()->getId());
                $nivelCaracteristica->setNvCar(0);
                $nivelCaracteristica->save();
            }

            $cmtRunico = $this->model("CmtRunico");
            $cmtRunico->setIdNv($id_nv);
            $cmtRunico->setNvCmtRunico(0);
            $cmtRunico->save();

            $calculadora = $this->service("CalcularStatus");

            $status->setVelCur($personagem->raca()->getVelocidade());
            $status->setVelMax($personagem->raca()->getVelocidade());

            $status->setDefCur($calculadora->calcularDef($personagem));
            $status->setDefMax($calculadora->calcularDef($personagem));

            $status->setPvCur($calculadora->calcularPv($personagem));
            $status->setPvMax($calculadora->calcularPv($personagem));

            $status->setPmCur($calculadora->calcularPm($personagem));
            $status->setPmMax($calculadora->calcularPm($personagem));

            $status->save();

            $conhecimento = $this->model("Conhecimento");
            $cmts = $conhecimento->getAll();

            foreach($cmts as $cmt){
                $cmt_personagem = $this->model("CmtPersonagem");
                $cmt_personagem->setIdCmt($cmt->getId());
                $cmt_personagem->setIdPerso($personagem->getId());
                $cmt_personagem->setValor(0);
                $cmt_personagem->save();
            }

            $this->commitTransaction();
            
        } catch (Exception $e) {
            $this->rollbackTransaction();
            throw $e;
        }

        $this->redirect("editar-ficha/". $personagem->getId());

    }

    public function updateFicha(): void
    {
        try{
            $this->beginTransaction();

            $personagem = $this->model("Personagem");

            $personagem->setId($_POST['id_perso']);
            $personagem->setNome($_POST['nome']);
            $personagem->setRegiao($_POST['regiao']);
            $personagem->setIdade($_POST['idade']);
            $personagem->setObjetivo($_POST['objetivo']);
            $personagem->setDestino($_POST['destino']);
            $personagem->setMons($_POST['mons']);
            $personagem->save();

            $personagem = $personagem->getById($personagem->getId());

            $atributos = $personagem->atributo();

            $atributos->setAgilidade($_POST['agilidade']);
            $atributos->setEspirito($_POST['espirito']);
            $atributos->setPercepcao($_POST['percepcao']);
            $atributos->setPotencia($_POST['potencia']);
            $atributos->setPresenca($_POST['presenca']);
            $atributos->setSagacidade($_POST['sagacidade']);
            $atributos->save();

            $nv = $personagem->nivel();
            $nv->setNvAventureiro($_POST['nv_aventureiro']);
            $nv->save();

            for ($i = 1; $i <= 3; $i++){
                $nv_arquetipo = (new NivelArquetipo)->getByNivel_Arquetipo($personagem->getIdNv(), $personagem->nivel()->nivelarquetipo()[$i-1]->getIdArq());
                $nv_arquetipo->setIdArq($_POST["arquetipo". $i]);
                $nv_arquetipo->setNvArq($_POST["nv_aventureiro". $i]);
                $nv_arquetipo->save();
            }

            $nv_caracteristica = new NivelCaracteristica();

            if($personagem->getIdRaca() != $_POST["id_raca"]){
                $personagem->setIdRaca($_POST["id_raca"]);
                $personagem->save();

                foreach($personagem->nivel()->nivelCaracteristica() as $caracteristica){
                    $caracteristica->delete();
                }

                foreach ($personagem->raca()->carraca() as $carraca) {
                    $nivelCaracteristica = $this->model('NivelCaracteristica');
                    $nivelCaracteristica->setIdNv($personagem->getIdNv());
                    $nivelCaracteristica->setIdCar($carraca->caracteristica()->getId());
                    $nivelCaracteristica->setNvCar(0);
                    $nivelCaracteristica->save();
                }
            }else{
                $nv_caracteristica = $personagem->nivel()->nivelcaracteristica()[0];
                $nv_caracteristica->setNvCar($_POST["nv_caracteristica1"]);
                $nv_caracteristica->save();

                $nv_caracteristica = $personagem->nivel()->nivelcaracteristica()[1];
                $nv_caracteristica->setNvCar($_POST["nv_caracteristica2"]);
                $nv_caracteristica->save();

                $nv_caracteristica = $personagem->nivel()->nivelcaracteristica()[2];
                $nv_caracteristica->setNvCar($_POST["nv_caracteristica3"]);
                $nv_caracteristica->save();

                $nv_caracteristica = $personagem->nivel()->nivelcaracteristica()[3];
                $nv_caracteristica->setNvCar($_POST["nv_caracteristica4"]);
                $nv_caracteristica->save();

                $cmt_runico = $nv->cmtrunico();
                $cmt_runico->setNvCmtRunico($_POST['nv_cmt_runico']);
                $cmt_runico->save();

            }

            $status = $personagem->status();

            $status->setVelCur($_POST["vel_cur"]);
            $status->setVelMax($_POST["vel_max"]);
            $status->setVelTemp($_POST["vel_temp"]);
            $status->setDefCur($_POST["def_cur"]);
            $status->setDefMax($_POST["def_max"]);
            $status->setDefTemp($_POST["def_temp"]);
            $status->setPvCur($_POST["pv_cur"]);
            $status->setPvMax($_POST["pv_max"]);
            $status->setPvTemp($_POST["pv_temp"]);
            $status->setPmCur($_POST["pm_cur"]);
            $status->setPmMax($_POST["pm_max"]);
            $status->setPmTemp($_POST["pm_temp"]);
            $status->setRd($_POST["rd"]);
            $status->save();

            $this->commitTransaction();
            
        } catch (Exception $e) {
            $this->rollbackTransaction();
            throw $e;
        }

        $this->redirect("editar-ficha/". $personagem->getId());

    }

    #######################################################################################    

    private function gerarDim(string $nome_marca, string $raca): string
    {
        $marca = $this->gerarMarca($nome_marca);

        $min = date("i");
        $min = (int)(($min/60) * 100);
        $min = str_pad($min, 2, '0', STR_PAD_LEFT);
    
        $seg = date("s");
        $seg = (int)(($seg/60) * 100);
        $seg = str_pad($seg, 2, '0', STR_PAD_LEFT);

        $random = rand(0, 99);

        $random = str_pad($random, 2, '0', STR_PAD_LEFT);

        $raca = str_pad($raca, 2, '0', STR_PAD_LEFT);

        return $raca. "-". $marca . $min . $seg . $random;
    }

    private function gerarMarca(string $marca): string
    {
        $letter1 = $marca[0];
        $letter2 = $marca[strlen($marca) - 1];

        $letter1 = ord($letter1);
        $letter2 = ord($letter2);

        $letter1 = (string) $letter1;
        $letter2 = (string) $letter2;

        $letter1 = $letter1[strlen($letter1) - 1];
        $letter2 = $letter2[strlen($letter2) - 1];

        return (int) $letter1 . (int) $letter2;
    }
}

