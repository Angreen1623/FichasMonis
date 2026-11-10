<!DOCTYPE html>
<html lang="pt_br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fichas Monisland</title>
</head>
<body>

    <?php $this->view("layout/navbar"); ?>

    <?php if(!isset($perso)){
        echo "Personagem não encontrado";
        return;
    }?>

    <form action="/FichasMonis/update" method="POST">
        <div style="display: flex;" >
            <div>
            <input type="hidden" name="id_perso" value="<?= $perso->getId() ?>">
            Nome <input type="text" name="nome" placeholder="Nome do personagem" value="<?= $perso->getNome(); ?>" required> <br>
            <img src="../public/images/dim/dims/<?= ($dim ?? '') ?>" alt="Imagem do DIM"> <br>

            Raça <select name="id_raca" required>
                <?php
                if (isset($racas)) {
                    
                    foreach ($racas as $raca) {
                        if($perso->getIdRaca() == $raca->getId()){
                            echo "<option value='" . $raca->getId() . "' selected>" . $raca->getNome() . "</option>";
                        }else{
                            echo "<option value='" . $raca->getId() . "'>" . $raca->getNome() . "</option>";
                        }
                        
                    }
                } else {
                    echo "<option value=''>Nenhuma raça encontrada</option>";
                }
                ?>
            </select> <br>

            Região <input type="text" name="regiao" placeholder="Região" value="<?= $perso->getRegiao() ?>"> <br>
            Idade <input type="text" name="idade" placeholder="Idade" value="<?= $perso->getIdade() ?>"> <br>
            Objetivo <input type="text" name="objetivo" placeholder="Objetivo" value="<?= $perso->getObjetivo() ?>"> <br>
            Destino <input type="text" name="destino" placeholder="Destino" value="<?= $perso->getDestino() ?>"> <br>
            <div style="display: flex;">
            Mons <input type="text" id="mons" name="mons" placeholder="Mons" value="<?= $perso->getMons(); ?>"> 
            <button id="roll-mons" type="button">
                <svg xmlns="http://www.w3.org/2000/svg" version="1.0" width="20px" height="20px" viewBox="0 0 512.000000 512.000000" preserveAspectRatio="xMidYMid meet">
                <g transform="translate(0.000000,512.000000) scale(0.100000,-0.100000)" fill="#000000" stroke="none">
                <path d="M2035 4659 c-710 -253 -1300 -467 -1313 -475 -13 -8 -27 -25 -32 -37 -5 -12 -81 -483 -169 -1046 -118 -750 -158 -1028 -150 -1042 23 -44 -127 -89 2484 749 171 54 325 107 344 116 67 35 63 -6 121 1134 53 1058 53 1063 16 1062 -6 -1 -591 -208 -1301 -461z"/>
                <path d="M3486 4908 c-23 -331 -97 -1873 -92 -1920 3 -31 14 -79 24 -106 11 -29 297 -451 673 -993 l654 -943 6 579 c11 1009 10 1566 -2 1610 -13 47 -1227 1865 -1245 1865 -8 0 -14 -30 -18 -92z"/>
                <path d="M1806 2345 c-758 -244 -1383 -449 -1388 -457 -4 -7 -7 -23 -5 -34 6 -35 1408 -1831 1439 -1845 15 -6 40 -8 55 -5 16 4 636 174 1378 378 984 271 1356 377 1373 392 14 12 22 29 20 41 -3 15 -1197 1748 -1317 1912 -26 36 -84 63 -132 62 -28 -1 -541 -161 -1423 -444z"/>
                </g>
                </svg> 
            </button>
            </div>

            AGI <input type="number" name="agilidade" placeholder="Agilidade" value="<?= $perso->atributo()->getAgilidade() ?>" required> <br>
            ESP <input type="number" name="espirito" placeholder="Espírito" value="<?= $perso->atributo()->getEspirito() ?>" required> <br>
            PER <input type="number" name="percepcao" placeholder="Percepção" value="<?= $perso->atributo()->getPercepcao() ?>" required> <br>
            POT <input type="number" name="potencia" placeholder="Potência" value="<?= $perso->atributo()->getPotencia() ?>" required> <br>
            PRE <input type="number" name="presenca" placeholder="Presença" value="<?= $perso->atributo()->getPresenca() ?>" required> <br>
            SAG <input type="number" name="sagacidade" placeholder="Sagacidade" value="<?= $perso->atributo()->getSagacidade() ?>" required> <br>

            <?php for($i = 0; $i<=2; $i++){ ?>
                <select name="arquetipo<?= $i+1 ?>" required>
                <?php
                    if (isset($arquetipos)) {
                        foreach ($arquetipos as $arquetipo) {
                            if($arquetipo->getId() == $perso->nivel()->nivelarquetipo()[$i]->getIdArq()){
                                echo "<option value='" . $arquetipo->getId() . "' selected>" . $arquetipo->getNome() . "</option>";
                            }
                            if($arquetipo->getId() != $perso->nivel()->nivelarquetipo()[0]->getIdArq() 
                            && $arquetipo->getId() != $perso->nivel()->nivelarquetipo()[1]->getIdArq() 
                            && $arquetipo->getId() != $perso->nivel()->nivelarquetipo()[2]->getIdArq()){
                                echo("<option value='" . $arquetipo->getId() . "'>" . $arquetipo->getNome() . "</option>");
                            }
                        }
                    } else {
                        echo "<option value=''>Nenhum arquétipo encontrado.</option>";
                    }
                ?>
                </select>
            <?php } ?>
            <br>
            </div>

            <div>
                Nivel de Aventureiro <input type="number" name="nv_aventureiro" value="<?=  $perso->nivel()->getNvAventureiro(); ?>" required> <br>
                Nivel do arquetipo <?= ($perso->nivel()->nivelarquetipo()[0]->arquetipo()->getNome()) ?>  <input type="number" name="nv_aventureiro1" value="<?= $perso->nivel()->nivelarquetipo()[0]->getNvArq() ?>" required> <br>
                Nivel do arquetipo <?= ($perso->nivel()->nivelarquetipo()[1]->arquetipo()->getNome()) ?>  <input type="number" name="nv_aventureiro2" value="<?= $perso->nivel()->nivelarquetipo()[1]->getNvArq() ?>" required> <br>
                Nivel do arquetipo <?= ($perso->nivel()->nivelarquetipo()[2]->arquetipo()->getNome()) ?>  <input type="number" name="nv_aventureiro3" value="<?= $perso->nivel()->nivelarquetipo()[2]->getNvArq() ?>" required> <br>
                Nivel do conhecimento runico <input type="number" name="nv_cmt_runico" value="<?= ($perso->nivel()->cmtrunico() ? $perso->nivel()->cmtrunico()->getNvCmtRunico() : '0') ?>" required> <br>
                Nivel <?= ($perso->nivel()->nivelcaracteristica()[0]->caracteristica()->getTipo() == "traco_unico" ? "do traço unico:" : "da característica:");?> <?= ($perso->nivel()->nivelcaracteristica()[0]->caracteristica()->getNome()); ?>  <input type="number" name="nv_caracteristica1" value="<?= $perso->nivel()->nivelcaracteristica()[0]->getNvCar() ?>" required> <br>
                Nivel <?= ($perso->nivel()->nivelcaracteristica()[1]->caracteristica()->getTipo() == "traco_unico" ? "do traço unico:" : "da característica:");?> <?= ($perso->nivel()->nivelcaracteristica()[1]->caracteristica()->getNome()); ?>  <input type="number" name="nv_caracteristica2" value="<?= $perso->nivel()->nivelcaracteristica()[1]->getNvCar() ?>" required> <br>
                Nivel <?= ($perso->nivel()->nivelcaracteristica()[2]->caracteristica()->getTipo() == "traco_unico" ? "do traço unico:" : "da característica:");?> <?= ($perso->nivel()->nivelcaracteristica()[2]->caracteristica()->getNome()); ?>  <input type="number" name="nv_caracteristica3" value="<?= $perso->nivel()->nivelcaracteristica()[2]->getNvCar() ?>" required> <br>
                Nivel <?= ($perso->nivel()->nivelcaracteristica()[3]->caracteristica()->getTipo() == "traco_unico" ? "do traço unico:" : "da característica:");?> <?= ($perso->nivel()->nivelcaracteristica()[3]->caracteristica()->getNome()); ?>  <input type="number" name="nv_caracteristica4" value="<?= $perso->nivel()->nivelcaracteristica()[3]->getNvCar() ?>" required> <br>
                
                <hr>

                <?php
                    foreach($perso->cmtpersonagem() as $cmt){
                        echo $cmt->conhecimento()->getNome();
                        ?>
                        <input type="number" name="conhecimento[<?= $cmt->conhecimento()->getId() ?>]" value="<?= $cmt->getValor() ?>">
                        <?php
                        echo "<br>";
                    }
                ?>
            </div>
        
            <div>
            PV Max<input type="number" name="pv_max" value="<?=  $perso->status()->getPvMax(); ?>" required> <br>
            PV Atual<input type="number" name="pv_cur" value="<?=  $perso->status()->getPvCur(); ?>" required> <br>
            PV Temporario <input type="number" name="pv_temp" value="<?=  $perso->status()->getPvTemp(); ?>" required> <br>

            PM Max<input type="number" name="pm_max" value="<?=  $perso->status()->getPmMax(); ?>" required> <br>
            PM Atual<input type="number" name="pm_cur" value="<?=  $perso->status()->getPmCur(); ?>" required> <br>
            PM Temporario<input type="number" name="pm_temp" value="<?=  $perso->status()->getPmTemp(); ?>" required> <br>

            Vel Max<input type="number" name="vel_max" value="<?=  $perso->status()->getVelMax(); ?>" required> <br>
            Vel Atual<input type="number" name="vel_cur" value="<?=  $perso->status()->getVelCur(); ?>" required> <br>
            Vel Temporario<input type="number" name="vel_temp" value="<?=  $perso->status()->getVelTemp(); ?>" required> <br>
            
            Def Max<input type="number" name="def_max" value="<?=  $perso->status()->getDefMax(); ?>" required> <br>
            Def Atual<input type="number" name="def_cur" value="<?=  $perso->status()->getDefCur(); ?>" required> <br>
            Def Temporario<input type="number" name="def_temp" value="<?=  $perso->status()->getDefTemp(); ?>" required> <br>

            RD<input type="number" name="rd" value="<?=  $perso->status()->getRd(); ?>" required> <br>
            </select>

            <button type="submit">Editar Ficha</button>
            </div>

        </div> 
    </form>
    
</body>

<script language="javascript"> 
    const dice_btn = document.getElementById("roll-mons");
    const mons_input = document.getElementById("mons");
    dice_btn.addEventListener('click', async function(){
        mons = parseInt(mons_input.value);
        nv = <?= $perso->nivel()->getNvAventureiro() ?>;
        for(i = 1; i <= nv; i++){
            mons = mons + Math.floor(Math.random() * 6) + 1;
        }
        mons_input.value = mons;

    });
    /*const nome = document.querySelector('#nome');

    nome.addEventListener('change', async function () {

        const resposta = await fetch('/FichasMonis/ficha/atualizar', {
            method: 'POST',

            headers: {
                'Content-Type': 'application/json'
            },

            body: JSON.stringify({
                id: this.dataset.id,
                campo: 'nome',
                valor: this.value
            })
        });

        const resultado = await resposta.json();

        console.log(resultado);
    });*/
</script>

</html>