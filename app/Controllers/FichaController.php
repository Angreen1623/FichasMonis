<?php

namespace App\Controllers;

class FichaController extends \App\Core\Controller
{
    public function criar(): void
    {
        var_dump($_POST);
        $personagem = $this->model('Personagem');
        $personagem->setNome($_POST['nome']);
        $personagem->setIdRaca($_POST['id_raca']);
        $personagem->setIdNv($this->model('Nivel')->save()->getId());
        $personagem->setIdStatus($this->model('Status')->save()->getId());
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

    }

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

