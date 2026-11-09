<?php

namespace App\Services;

use Imagick;
use ImagickPixel;

use App\Models\Raca;

class ImageMagickService
{

    public function createDim(string $dim): string
    {
        $raca = $this->getRaca($dim);

        $hex = sprintf('#%02x%02x%02x', rand(0,255), rand(0,255), rand(0,255));
        $cor = new ImagickPixel($hex);
        $opacidade = new ImagickPixel("rgba(255, 255, 255, 1)");

        $this->getImage("races/".$raca) != null 
        ? $raca_img = $this->getImage("races/".$raca) 
        : $raca_img = dirname(__DIR__, 2) . "/public/images/dim/races/misterious.png";;

        $marca = $this->getMarca($dim);
        $marca_img = [];
        foreach($marca as $char_mark) {
            $marca_img[] = $this->getImage("numbers/" . $this->getNumber($char_mark));
        }

        $min = $this->getMin($dim);
        $min_img = [];
        foreach ($min as $char_min) {
            $min_img[] = $this->getImage("numbers/" . $this->getNumber($char_min));
        }

        $seg = $this->getSeg($dim);
        $seg_img = [];
        foreach ($seg as $char_seg) {
            $seg_img[] = $this->getImage("numbers/" . $this->getNumber($char_seg));
        }

        $rand = $this->getRand($dim);
        $rand_img = [];
        foreach ($rand as $char_rand) {
            $rand_img[] = $this->getImage("numbers/" . $this->getNumber($char_rand));
        }

        $racaImagem = new Imagick($raca_img);

        $imagens[] = $racaImagem;
        $imagens[] = $this->agruparNumeros($marca_img);
        $imagens[] = $this->agruparNumeros($min_img);
        $imagens[] = $this->agruparNumeros($seg_img);
        $imagens[] = $this->agruparNumeros($rand_img);

        $imagem_final = $this->agruparImagem($imagens);
        $imagem_final->resizeImage(
            94*4,
            32*4,
            Imagick::FILTER_POINT,
            1,
        );

        $path = uniqid("dim_", true) . ".png";

        $imagem_final->colorizeImage($hex, $opacidade);
        $imagem_final->writeImage(dirname(__DIR__, 2) . '/public/images/dim/dims/' . $path);

        return $path;
    }

    private function agruparImagem(array $imgs){
        $canvas = new Imagick();
        $canvas->newImage(
            94,
            32,
            new ImagickPixel('transparent'),
            'png'
        );

        $posicoes = [
            [30, 0], #Posição da Raca
            [0, 0], #Posição da Marca
            [60, 0], #Posição dos minutos
            [0, 16], #Posição dos segundos
            [60, 16] #Posição do numero aleatório
        ];

        foreach ($imgs as $i => $imagem) {
            $canvas->compositeImage(
                $imagem,
                Imagick::COMPOSITE_OVER,
                $posicoes[$i][0],
                $posicoes[$i][1]
            );

            $imagem->clear();
        }

        $canvas->setImageFormat('png');
        return $canvas;
    }

    private function agruparNumeros(array $numeros) : Imagick
    {
        $width = 16;
        $height = 16;

        $canvas = new Imagick();
        $canvas->newImage(
            $width * 2,
            $height,
            new ImagickPixel('transparent'),
            'png'
        );

        $posicoes = [
            [$width*0, 0],
            [$width*1, 0]
        ];

        foreach ($numeros as $i => $caminho) {
            $imagem = new Imagick($caminho);

            $canvas->compositeImage(
                $imagem,
                Imagick::COMPOSITE_OVER,
                $posicoes[$i][0],
                $posicoes[$i][1]
            );

            $imagem->clear();
        }

        return $canvas;
    }

    private function getRaca($dim) : string
    {
        $raca_id = $dim[0].$dim[1];
        $raca_id = (int) $raca_id;

        $raca = new Raca();

        $raca->getById($raca_id) == null ? $raca_nome = "misterious" : $raca_nome = $raca->getById($raca_id)->getNome();

        // Remove conteúdo entre parênteses
        $raca_nome = preg_replace('/\([^)]*\)/', '', $raca_nome);
        // Remove acentos e cedilha
        $raca_nome = iconv('UTF-8', 'ASCII//TRANSLIT//IGNORE', $raca_nome);
        // Converte para minúsculo
        $raca_nome = strtolower($raca_nome);
        // Remove caracteres especiais
        $raca_nome = preg_replace('/[^a-z0-9\s]/', '', $raca_nome);
        // Substitui espaços por underscore
        $raca_nome = preg_replace('/\s+/', '_', trim($raca_nome));

        return $raca_nome;
    }

    private function getMarca($dim) : array 
    {
        $char[0] = $dim[3];
        $char[1] = $dim[4];

        return $char;
    }

    private function getMin($dim) : array
    {
        $char[0] = $dim[5];
        $char[1] = $dim[6];

        return $char;
    }
    
    private function getSeg($dim) : array
    {
        $char[0] = $dim[7];
        $char[1] = $dim[8];

        return $char;
    }

    private function getRand($dim) : array
    {
        $char[0] = $dim[9];
        $char[1] = $dim[10];

        return $char;
    }

    private function getImage(string $path_name): ?string
    {
        $path = dirname(__DIR__, 2) . "/public/images/dim/" . $path_name . ".png";
        if(!file_exists($path)){
            return null;
        }

        return $path;
    }

    private function getNumber($num): string
    {
        $numbers = [
            0 => "zero",
            1 => "um",
            2 => "dois",
            3 => "tres",
            4 => "quatro",
            5 => "cinco",
            6 => "seis",
            7 => "sete",
            8 => "oito",
            9 => "nove"
        ];

        return $numbers[$num];
    }
}