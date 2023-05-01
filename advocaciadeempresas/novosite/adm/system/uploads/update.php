<?php
if (!$Adm):
    header('Location: painel.php');
    exit();
endif;
?>
<main class="content">
    <?php
    $office = filter_input(INPUT_GET, "uploads", FILTER_DEFAULT);
    $Read = new Read;
    $Read->FullRead("SELECT * FROM tb_uploads WHERE audio_id = :n", "n={$office}");
    ?>
    <!--<div class="div-header">-->
    <header class="header-box">
        <h2 class="header-box-h">Editar upload <?= $Read->getResult()[0]["audio_title"]; ?></h2>
        <div class="header-box-btn">
            <a class="btn-default btn-blue" href="?exe=uploads/index"><span class="lnr lnr-list"></span>  Uploads</a>
        </div>
    </header>
    <div class="loader">
        <div class="processing"></div>
    </div>
    <!--</div>-->
    <?php
    extract($Read->getResult()[0]);
    ?>
    <div class="box content-box">
        <form id="form-upload-update" method="post" enctype="multipart/form-data" class="form-upload-update" action="upload-update">
            <div class="row-m">
                <label>
                    <span class="lnr lnr-graduation-hat"></span>  Nome
                </label>
                <input style="background-color: #ccc;" disabled="" class="inpt-null" name="NomeUp" type="text" value="<?= $audio_title; ?>"/>
                <!--<input name="name_up" value="<?= $name_up; ?>" type="hidden"/>-->
            </div>
            <div class="row-m">
                <label>
                    <span class="lnr lnr-upload"></span>  Tipo
                </label>
                <input style="background-color: #ccc;" disabled="" class="inpt-null" name="NomeUp" type="text" value="<?= $audio_type; ?>"/>
            </div>
            <div class="row-f">
                <label>
                    <span class="lnr lnr-text-align-left"></span>  Qrcode
                </label>
                <img src="uploads/<?= $audio_qrcode; ?>"/>
            </div>

        </form>
    </div>
</main>
