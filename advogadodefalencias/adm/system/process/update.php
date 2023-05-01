<?php
if (!$Adm):
    header('Location: painel.php');
    exit();
endif;
?>
<main class="content">
    <?php
    $office = filter_input(INPUT_GET, "posts", FILTER_VALIDATE_INT);
    $Read = new Read;
    $Read->ExeRead("n_processos", "WHERE id_proc = :id", "id={$office}");
    ?>

    <header class="header-box">
        <h2 class="header-box-h">Atualizar processo <?= $Read->getResult()[0]['procn_cli']; ?></h2>
        <div class="header-box-btn">
            <a class="btn-default btn-blue" href="?exe=process/index"><span class="lnr lnr-list"></span>  Processos</a>
        </div>
    </header>
    <div class="loader">
        <div class="processing"></div>
    </div>

    <?php
    extract($Read->getResult()[0]);
    ?>
    <div class="box content-box">
        <form method="post" class="form-process" id="form-process-update" action="process-update">

            <div class="row-m">
                <label>
                    <span class="lnr lnr-layers"></span> Cliente
                </label>
                <select disabled="" class="inpt-null" name="id_cli">
                    <?php
                    $Read->FullRead("SELECT * FROM n_clientes WHERE id_cli = $id_cli");
                    ?>
                    <option><?= $Read->getResult()[0]['nome_cli']; ?></option>
                </select>
            </div>
            <div class="row-m">
                <label>
                    <span class="lnr lnr-layers"></span> Processo
                </label>
                <select required name="proc_cli" type="text" id="proc_cli"  > 
                    <option <?= ($proc_cli === "TRABALHISTA" ? 'selected="selected"' : ''); ?> value="TRABALHISTA" >TRABALHISTA</option>
                    <option <?= ($proc_cli === "CIVEL" ? 'selected="selected"' : ''); ?> value="CIVEL" >CIVEL</option>
                    <option <?= ($proc_cli === "CRIMINAL" ? 'selected="selected"' : ''); ?> value="CRIMINAL" >CRIMINAL</option>
                    <option <?= ($proc_cli === "CONSUMIDOR" ? 'selected="selected"' : ''); ?> value="CONSUMIDOR" >CONSUMIDOR</option>
                    <option <?= ($proc_cli === "FAMILIA" ? 'selected="selected"' : ''); ?> value="FAMILIA" >FAMILIA</option>
                    <option <?= ($proc_cli === "IMOBILIARIO" ? 'selected="selected"' : ''); ?> value="IMOBILIARIO" >IMOBILIARIO</option>
                    <option <?= ($proc_cli === "CERTIDOES" ? 'selected="selected"' : ''); ?> value="CERTIDOES" >CERTIDÕES</option>
                    <option <?= ($proc_cli === "FALENCIA E RECUPERCAO" ? 'selected="selected"' : ''); ?> value="FALENCIA E RECUPERCAO" > FALÊNCIA E RECUPERÇÃO</option>
                    <option <?= ($proc_cli === "OUTROS" ? 'selected="selected"' : ''); ?> value="OUTROS">OUTROS</option>
                </select>
            </div>
            <div class="row-f">
                <label>
                    <span class="lnr lnr-graduation-hat"></span>  N° Processo
                </label>
                <input class="inpt-null" name="procn_cli" type="text" value="<?= $procn_cli; ?>"/>
            </div>
            <div class="row-f">
                <label>
                    <span class="lnr lnr-graduation-hat"></span>  Vara
                </label>
                <input class="inpt-null" name="vara_cli" type="text" value="<?= $vara_cli; ?>"/>
            </div>
            <div class="row-f">
                <label>
                    <span class="lnr lnr-graduation-hat"></span>  Fórum
                </label>
                <input class="inpt-null" name="forum_cli" type="text" value="<?= $forum_cli; ?>"/>
            </div>
            <div class="row-f">
                <label>
                    <span class="lnr lnr-text-align-left"></span>   Recursos
                </label>
                <textarea class="inpt-null " name="recu_cli" type="text"><?= $recu_cli; ?></textarea>
            </div>
            <div class="row-f">
                <label>
                    <span class="lnr lnr-graduation-hat"></span>  Ação
                </label>
                <input class="inpt-null" name="acao_cli" type="text" value="<?= $acao_cli; ?>"/>
            </div>
            <div class="row-f">
                <label>
                    <span class="lnr lnr-graduation-hat"></span>  Part. Contraria
                </label>
                <input class="inpt-null" name="cont_cli" type="text" value="<?= $cont_cli; ?>"/>
            </div>
            <div class="row-f">
                <label>
                    <span class="lnr lnr-graduation-hat"></span>  Adv. Parte Contraria
                </label>
                <input class="inpt-null" name="advcont_cli" type="text" value="<?= $advcont_cli; ?>"/>
            </div>
            <div class="row-f">
                <label>
                    <span class="lnr lnr-graduation-hat"></span>  Tel. Part. Contraria
                </label>
                <input class="inpt-null" name="telcont_cli" type="text" value="<?= $telcont_cli; ?>"/>
            </div>
            <div class="row-f">
                <label>
                    <span class="lnr lnr-text-align-left"></span>   Observações
                </label>
                <textarea class="inpt-null" name="obscont_cli" type="text"><?= $obscont_cli; ?></textarea>
            </div>

            <div class="row-btn">
                <input name="id_proc" type="hidden" value="<?= $id_proc; ?>"/>
                <button id="btn-form" class="btn-green btn-default" type="submit"><span class="lnr lnr-checkmark-circle"></span> Atualizar</button>
            </div>
        </form>
    </div>
</main>
