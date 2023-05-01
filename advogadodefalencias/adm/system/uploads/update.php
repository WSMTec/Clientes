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
                <input style="background-color: #ccc;" disabled="" class="inpt-null" type="text" value="<?= $audio_title; ?>"/>
                <!--<input name="name_up" value="<?= $name_up; ?>" type="hidden"/>-->
            </div>
            <div class="row-m">
                <label>
                    <span class="lnr lnr-upload"></span>  Tipo
                </label>
                <input style="background-color: #ccc;" disabled="" class="inpt-null" type="text" value="<?= $audio_type; ?>"/>
            </div>
               <div class="row-f">
                <label>
                    <span class="lnr lnr-upload"></span>  Upload
                </label>
                <input class="inpt-null" name="audio_file" type="file"/>
            </div>
            <div class="row-f" style="    justify-content: space-around !important;
    margin-top: 15px !important;">
             
                        <div class="content-input" style="text-align: center;
    display: flex;
    justify-content: center;
    flex-wrap: wrap;">
                            <label class="input-color-label-txt" for="input-color-txt" style="height: auto !important;padding: 0 !important;">
                                Escolha uma cor para o texto!
                        
                            </label>
                            <div class="input-color-container-txt">
                                <input  value="<?= $audio_txt; ?>" name="audio_txt" id="input-color-txt" class="input-color" type="color">
                            </div>

                        </div>

                        <div class="content-input" style="text-align: center;
    display: flex;
    justify-content: center;
    flex-wrap: wrap;">
                            <label class="input-color-label" for="input-color" style="height: auto !important;padding: 0 !important;">
                                Escolha uma cor para o fundo!
                          
                            </label>
                            <div  class="input-color-container">
                                <input value="<?= $audio_btn; ?>" name="audio_btn" id="input-color" class="input-color" type="color">
                            </div>
                        </div>
</div>
  <div class="row-btn">
                <input name="audio_id" type="hidden" value="<?= $audio_id; ?>"/>
                <input name="audio_title" type="hidden" value="<?= $audio_title; ?>"/>
                <button id="btn-form" class="btn-green btn-default" type="submit"><span class="lnr lnr-checkmark-circle"></span> Atualizar</button>
            </div>
        </form>
    </div>
</main>
