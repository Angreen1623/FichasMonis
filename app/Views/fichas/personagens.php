<!DOCTYPE html>
<html lang="pt_br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fichas Monisland</title>
</head>
<body>

    <?php $this->view("layout/navbar"); ?>

    <br>

    <?php if(!isset($perso)){
        echo "Personagem não encontrado";
        return;
    }

    foreach($perso as $p){
        ?>
        <a href="editar-ficha/<?= $p->getId() ?>"> <?= $p->getNome() ?></a> <br>
        <?php
    }
    ?>
    
</body>
</html>