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
    $Read->ExeRead("tb_slider", "WHERE post_id = :id", "id={$office}");
    ?>

    <header class="header-box">
        <h2 class="header-box-h">Atualizar imagem <?= $Read->getResult()[0]['post_title']; ?></h2>
        <div class="header-box-btn">
            <a class="btn-default btn-blue" href="?exe=slider/index"><span class="lnr lnr-list"></span>  Imagens</a>
        </div>
    </header>
    <div class="loader">
        <div class="processing"></div>
    </div>

    <?php
    extract($Read->getResult()[0]);
    ?>
    <div class="box content-box">
        <form method="post" class="form-slider" id="form-slider-update" action="slider-update">
            <div class="row-m">
                <label>
                    <span class="lnr lnr-picture"></span>  Foto
                </label>
                <input type="file" name="post_cover" class="post_cover inpt-null"/> 
            </div>
            <div class="row-m">
                <label>
                    <span class="lnr lnr-graduation-hat"></span>  Titulo
                </label>
                <input class="inpt-null" name="post_title" type="text" value="<?= $post_title; ?>"/>
            </div>
            <div class="row-m">
                <label>
                    <span class="lnr lnr-question-circle"></span> Publicar?
                </label>
                <select class="inpt-null" name="post_status">
                    <option></option>
                    <option <?= ($post_status == '1' ? 'selected' : ''); ?> value="1">Sim</option>
                    <option <?= ($post_status == '0' ? 'selected' : ''); ?> value="0">Não</option>
                </select>
            </div>
            <div class="row-btn">
                <input name="post_id" type="hidden" value="<?= $post_id; ?>"/>
                <button id="btn-form" class="btn-green btn-default" type="submit"><span class="lnr lnr-checkmark-circle"></span> Atualizar</button>
            </div>
        </form>
    </div>
</main>
