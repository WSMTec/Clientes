<?php
if (!$Adm):
    header('Location: painel.php');
    exit();
endif;
?>
<main class="content">
    <!--<div class="div-header">-->
    <header class="header-box">
        <h2 class="header-box-h">Cadastro de areas no site</h2>
        <div class="header-box-btn">
            <a class="btn-default btn-blue" href="?exe=areas/index"><span class="lnr lnr-list"></span>  Areas</a>
        </div>
    </header>
    <!--</div>-->
    <div class="box content-box">

        <form method="post" id="form-area" class="form-area form-horizontal" action="area" enctype="multipart/form-data">
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
                <input name="area_title" class="inpt-null" type="text"/>
            </div>
            <div class="row-m">
                <label>
                    <span class="lnr lnr-user"></span>   Resumo
                </label>
                <input name="area_summary" class="inpt-null" type="text"/>
            </div>

            <div class="row-f">
                <label>
                    <span class="lnr lnr-text-align-left"></span>   Conteúdo
                </label>
                <textarea name="area_content" class="inpt-null js_editor"></textarea>
            </div>
            <div class="row-m">
                <label>
                    <span class="lnr lnr-calendar-full"></span>   Data
                </label>
                <input name="area_date" class="inpt-null" type="text" value="<?= date("d/m/Y H:i:s"); ?>"/>
            </div>

            <div class="row-m">
                <label>
                    <span class="lnr lnr-question-circle"></span> Publicar?
                </label>
                <select class="inpt-null" name="area_status">
                    <option></option>
                    <option value="1">Sim</option>
                    <option value="0">Não</option>
                </select>
            </div>

            <div class="row-btn">
                <input name="area_author" type="hidden" value="<?= $userlogin['user_id']; ?>"/>
                <button id="btn-form" class="btn-green btn-default" type="submit"><span class="lnr lnr-checkmark-circle"></span> Salvar Area</button>
            </div>
        </form>
    </div>
</div>
</main>
