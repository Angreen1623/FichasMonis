<!DOCTYPE html>
<html lang="pt_br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fichas Monisland</title>
</head>
<body>

    <?php 
    $this->view("layout/navbar");

    if (isset($data)) {
        echo "<h2>Caracteristicas:</h2>";
        foreach ($data as $caracteristica) {
            echo "<p>Caracteristica: " . $caracteristica->getNome() . " | Tipo: " . $caracteristica->getTipo();
            foreach ($caracteristica->detalheCaracteristica() as $detalhe) {
                $habilidade = $detalhe->habilidade();
                if (!empty($habilidade)) {
                    echo "<br>Habilidades: <br>";
                }
                foreach ($habilidade as $hab) {
                    echo " " . $hab->getNome() . " (Nv: " . $detalhe->getNv() . ") <br>";
                    echo "Descrição: " . $hab->getDescricao() . "<br>";
                    echo "<img src='" . $hab->getImg() . "' alt=' imagem da habilidade " . $hab->getNome() . "'><br>";
                }
            }
        }
        
    } else {
        echo "Nenhuma característica encontrada.";
    }
    
    ?>
    
</body>
</html>