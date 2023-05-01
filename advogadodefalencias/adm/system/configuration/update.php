<?php
//if (!$Adm):
//    header('Location: painel.php');
//    exit();
//endif;
?>
<main class="content">
    <?php
    $office = filter_input(INPUT_GET, "posts", FILTER_VALIDATE_INT);
    $Read = new Read;
    $Read->ExeRead("tb_sitemap", "WHERE page_id = :id", "id={$office}");
    ?>
    <!--<div class="div-header">-->
    <header class="header-box">
        <h2 class="header-box-h">Editar URL estático</h2>
        <div class="header-box-btn">
            <a class="btn-default btn-blue" href="?exe=configuration/sitemap"><span class="lnr lnr-list"></span>  URLs</a>
        </div>
    </header>
    <!--</div>-->
    <?php
    extract($Read->getResult()[0]);
    ?>
    <div class="box content-box">
        <form id="form-sitemap-update" method="post" class="form-sitemap-update" action="sitemap-update">
            <div class="row-f">
                <label>
                    <span class="lnr lnr-user"></span>   Descrição(SEO)
                </label>
                <textarea name="page_description" class="inpt-null"><?= $page_description; ?></textarea>
            </div>
            <div class="row-f">
                <label>
                    <span class="lnr lnr-text-align-left"></span>   Name(ex: /areas, /sobre, /quem-somos...)
                </label>
                <input name="page_name" class="inpt-null" type="text" value="<?= $page_name; ?>"/>
            </div>

            <div class="row-btn">
                <input name="page_id" type="hidden" value="<?= $page_id; ?>"/>
                <button id="btn-form" class="btn-green btn-default" type="submit"><span class="lnr lnr-checkmark-circle"></span> Salvar</button>
            </div>
        </form>
    </div>
</main>
