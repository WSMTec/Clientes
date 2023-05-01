<?php
if (!$Adm):
    header('Location: painel.php');
    exit();
endif;
?>
<main class="content">
    <?php
    $office = filter_input(INPUT_GET, "post", FILTER_VALIDATE_INT);
    $Read = new Read;
    ?>

    <header class="header-box">
        <h2 class="header-box-h">Atualizar area do site</h2>
        <div class="header-box-btn">
            <a class="btn-default btn-blue" href="?exe=areas/index"><span class="lnr lnr-list"></span>  Areas</a>
        </div>
    </header>

    <?php
    $Read->ExeRead("tb_areas", "WHERE area_id = :id", "id={$office}");
    extract($Read->getResult()[0]);
    ?>
    <div class="box content-box">
        <form method="post" id="form-area-update" class="form-area form-horizontal" action="area-update" enctype="multipart/form-data">

            <div class="row-f">
                <label>
                    <span class="lnr lnr-picture"></span>  Icon
                </label>
                <input type="file" name="area_icon" class="post_cover inpt-null"/> 
            </div>
            <div class="row-m">
                <label>
                    <span class="lnr lnr-user"></span>   Titulo
                </label>
                <input name="area_title" class="inpt-null" type="text" value="<?= $area_title; ?>"/>
            </div>
            <div class="row-m">
                <label>
                    <span class="lnr lnr-user"></span>   Resumo
                </label>
                <input name="area_summary" class="inpt-null" type="text" value="<?= $area_summary; ?>"/>
            </div>
            <div class="row-f">
                <label>
                    <span class="lnr lnr-text-align-left"></span>   Conteúdo
                </label>
                <textarea name="area_content" class="inpt-null js_editor"><?= $area_content; ?></textarea>
            </div>

            <div class="row-m">
                <label>
                    <span class="lnr lnr-question-circle"></span> Publicar?
                </label>
                <select class="inpt-null" name="area_status">
                    <option></option>
                    <option <?= ($area_status == '1' ? 'selected' : ''); ?> value="1">Sim</option>
                    <option <?= ($area_status == '0' ? 'selected' : ''); ?> value="0">Não</option>
                </select>
            </div>

            <div class="row-btn">
                <input name="area_id" type="hidden" value="<?= $area_id; ?>"/>
                <button class="btn-green btn-default" type="submit"><span class="lnr lnr-checkmark-circle"></span> Atualizar Area</button>
            </div>
        </form>
    </div>
</main>
