<!DOCTYPE html>
<html lang="pt_br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fichas Monisland</title>
</head>
<body>

    Arquivo "home.php" encontrado

    <?php if (isset($raca)) : ?>
        <h2>Dados do Modelo:</h2>
        <ul>
                <li><strong><?php echo($raca["nome"]); ?>:</strong></li>
                <li><strong><?php echo($raca["cap_carga"]); ?>:</strong></li>
                <li><strong><?php echo($raca["descricao"]); ?>:</strong></li>
                <li><strong><?php echo($raca["velocidadex"]); ?>:</strong></li>
        </ul>
    <?php else : ?>
        <p>Nenhum dado disponível.</p>
    <?php endif; ?>
    
</body>
</html>