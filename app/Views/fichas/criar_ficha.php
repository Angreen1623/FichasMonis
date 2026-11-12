<!DOCTYPE html>
<html lang="pt_br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fichas Monisland</title>
</head>
<body>

    <?php $this->view("layout/navbar"); ?>

    <form action="/FichasMonis/criar-ficha" method="post">
        <input type="text" name="nome" placeholder="Nome do personagem" value="Keyko" required> <br>

        <select name="id_raca" required>
            <option value="7">Elemental de Terra</option>
            <?php
            if (isset($racas)) {
                foreach ($racas as $raca) {
                    echo "<option value='" . $raca->getId() . "'>" . $raca->getNome() . "</option>";
                }
            } else {
                echo "<option value=''>Nenhuma raça encontrada</option>";
            }
            ?>
        </select> <br>

        AGI<input type="number" name="agilidade" placeholder="Agilidade" value="2" required> <br>
        ESP<input type="number" name="espirito" placeholder="Espírito" value="2" required> <br>
        PER<input type="number" name="percepcao" placeholder="Percepção" value="2" required> <br>
        POT<input type="number" name="potencia" placeholder="Potência" value="3" required> <br>
        PRE<input type="number" name="presenca" placeholder="Presença" value="2" required> <br>
        SAG<input type="number" name="sagacidade" placeholder="Sagacidade" value="1" required> <br>


        <select name="arquetipo1" required>
            <option value="14">Protetor</option>
        <?php
            if (isset($arquetipos)) {
                foreach ($arquetipos as $arquetipo) {
                    echo "<option value='" . $arquetipo->getId() . "'>" . $arquetipo->getNome() . "</option>";
                }
            } else {
                echo "<option value=''>Nenhum arquétipo encontrado.</option>";
            }
        ?>
        </select>

        <select name="arquetipo2" required>
            <option value="12">Lutador</option>
        <?php
            if (isset($arquetipos)) {
                foreach ($arquetipos as $arquetipo) {
                    echo "<option value='" . $arquetipo->getId() . "'>" . $arquetipo->getNome() . "</option>";
                }
            } else {
                echo "<option value=''>Nenhum arquétipo encontrado.</option>";
            }
        ?>
        </select>

        <select name="arquetipo3" required>
            <option value="6">Diplomata</option>
        <?php
            if (isset($arquetipos)) {
                foreach ($arquetipos as $arquetipo) {
                    echo "<option value='" . $arquetipo->getId() . "'>" . $arquetipo->getNome() . "</option>";
                }
            } else {
                echo "<option value=''>Nenhum arquétipo encontrado.</option>";
            }
        ?>
        </select>

        <button type="submit">Criar Ficha</button>
    </form>
    
</body>
</html>