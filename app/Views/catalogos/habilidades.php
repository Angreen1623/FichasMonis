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

    if (isset($habs)) {
        echo "<h2>Habilidades:</h2>";
        foreach ($habs as $hab) {
            echo "<p>Nome: " . $hab->getNome() . "</p>";
            echo "<p>Descrição: " . $hab->getDescricao() . "</p>";
            echo "<p>Imagem: " . $hab->getImg() . "</p>";
            echo "<hr>";
        }
    } else {
        echo "Nenhuma habilidade encontrada.";
    }
    ?>
    
</body>
</html>