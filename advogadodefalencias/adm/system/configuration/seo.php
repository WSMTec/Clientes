<?php
$Read = new Read;
$Read->FullRead("SELECT * FROM tb_seo");
extract($Read->getResult()[0]);
?>
<main class="content">
    <!--<div class="div-header">-->
    <header class="header-box">
        <h2 class="header-box-h">SEO Descrição</h2>
        <div class="header-box-btn">
            <!--<a class="btn-default btn-blue" href="?exe=categories/index"><span class="lnr lnr-list"></span>  Categorias</a>-->
        </div> 
    </header>
    <?php
    require 'sidebar.php';
    ?>
    <!--</div>-->
    <div class="box content-box">
        <form id="form-seo" method="post" class="form-seo" action="seo">
<!--            <div class="row-f">
                <label>
                    <span class="lnr lnr-text-align-left"></span>  Descrição INÍCIO (Página inicial)
                </label>
                <textarea name="config_content" class="inpt-null"><?= $config_content; ?></textarea>
            </div>
            <div class="row-f">
                <label>
                    <span class="lnr lnr-text-align-left"></span>  Descrição ESCRITÓRIO(Quem Somos)
                </label>
                <textarea name="config_content" class="inpt-null"><?= $config_content; ?></textarea>
            </div>
            <div class="row-f">
                <label>
                    <span class="lnr lnr-text-align-left"></span>  Descrição EQUIPE
                </label>
                <textarea name="config_content" class="inpt-null"><?= $config_content; ?></textarea>
            </div>
            <div class="row-f">
                <label>
                    <span class="lnr lnr-text-align-left"></span>  Descrição ÁREAS
                </label>
                <textarea name="config_content" class="inpt-null"><?= $config_content; ?></textarea>
            </div>
            <div class="row-f">
                <label>
                    <span class="lnr lnr-text-align-left"></span>  Descrição BLOG
                </label>
                <textarea name="config_content" class="inpt-null"><?= $config_content; ?></textarea>
            </div>
            <div class="row-f">
                <label>
                    <span class="lnr lnr-text-align-left"></span>  Descrição CONTATOS
                </label>
                <textarea name="config_content" class="inpt-null"><?= $config_content; ?></textarea>
            </div>-->


            <div class="row-btn">
                <input type="hidden" value="<?= $page_id; ?>" name="config_id"/>
                <button id="btn-form" class="btn-green btn-default" type="submit"><span class="lnr lnr-checkmark-circle"></span> Atualizar</button>
            </div>
        </form>
    </div>
</main>
