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

    if (isset($racas)) {
        echo "<h2>Raças:</h2>";
        foreach ($racas as $raca) {
            echo "<p>Nome: " . $raca->getNome() . "</p>";
            echo "<p>Capacidade de Carga: " . $raca->getCapCarga() . "</p>";
            echo "<p>Velocidade: " . $raca->getVelocidade() . "</p>";
            echo "<p> Características: ";
            foreach($raca->carraca() as $carraca) {
                if ($carraca->caracteristica()->getTipo() === "comum") {
                    echo "" . $carraca->caracteristica()->getNome() . " | ";
                }else {
                    $traco_unico = $carraca->caracteristica();
                }
            }
            echo "</p>";
            if (isset($traco_unico)) {
                echo "<p>Traço único: " . $traco_unico->getNome() . "</p>";
            }
            echo "<p>Descrição: " . $raca->getDescricao() . "</p>";
            echo "<hr>";
        }
    } else {
        echo "Nenhuma raça encontrada.";
    }
    ?>
    
</body>
</html>