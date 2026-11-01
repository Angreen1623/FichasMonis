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

    if (isset($hab)) {
        echo "<h2>Habilidades:</h2>";
        foreach ($hab as $h) {
            echo "<p>Nome: " . $h->getNome() . "</p>";
            echo "<p>Descrição: " . $h->getDescricao() . "</p>";
            echo "<p>Imagem: " . $h->getImg() . "</p>";
            echo "<hr>";
        }
    } else {
        echo "Nenhuma habilidade encontrada.";
    }
    ?>
    
</body>
</html>