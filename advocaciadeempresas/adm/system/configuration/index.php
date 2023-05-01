<?php
$Read = new Read;
$Read->FullRead("SELECT * FROM tb_configuration");
extract($Read->getResult()[0]);
?>
<main class="content">
    <!--<div class="div-header">-->
    <header class="header-box">
        <h2 class="header-box-h">Edições</h2>
        <div class="header-box-btn">
            <!--<a class="btn-default btn-blue" href="?exe=categories/index"><span class="lnr lnr-list"></span>  Categorias</a>-->
        </div>
    </header>
    <?php
    require 'sidebar.php';
    ?>
    <!--</div>-->
    <div class="box content-box">
        <form id="form-config" method="post" class="form-config" action="configuration">
            <div class="row-m">
                <label>
                    <span class="lnr lnr-question-circle"></span> Slider?
                </label>
                <select class="inpt-null" name="config_slider">
                    <option <?= ($config_slider == 'A' ? 'selected' : ''); ?> value="A">Ativo</option>
                    <option <?= ($config_slider == 'I' ? 'selected' : ''); ?> value="I">Desativado</option>
                </select>
            </div>
            <div class="row-m">
                <label>
                    <span class="lnr lnr-text-align-left"></span>   Home texto slider
                </label>
                <input name="config_content" type="text" value="<?= $config_content; ?>" class="inpt-null">
            </div>
            <div class="row-f">
                <label>
                    <span class="lnr lnr-text-align-left"></span>   Home sobre titulo
                </label>
                <input name="config_home_about_title" class="inpt-null" value="<?= $config_home_about_title; ?>" type="text"/>
                <!--<textarea name="" class="inpt-null"></textarea>-->
            </div>
            <div class="row-f">
                <label>
                    <span class="lnr lnr-text-align-left"></span>   Home sobre texto
                </label>
                <textarea name="config_home_about" class="inpt-null"><?= $config_home_about; ?></textarea>
            </div>
            <div class="row-f">
                <label>
                    <span class="lnr lnr-text-align-left"></span>   Sobre texto
                </label>
                <textarea name="config_about" class="inpt-null"><?= $config_about; ?></textarea>
            </div>
            <div class="row-f">
                <label>
                    <span class="lnr lnr-text-align-left"></span>   Sobre missão
                </label>
                <textarea name="config_about_miss" class="inpt-null"><?= $config_about_miss; ?></textarea>
            </div>
            <div class="row-f">
                <label>
                    <span class="lnr lnr-text-align-left"></span>   Sobre visão 
                </label>
                <textarea name="config_about_vis" class="inpt-null"><?= $config_about_vis; ?></textarea>
            </div>
            <div class="row-f">
                <label>
                    <span class="lnr lnr-text-align-left"></span>   Sobre valores
                </label>
                <textarea name="config_about_val" class="inpt-null"><?= $config_about_val; ?></textarea>
            </div>
            <div class="row-f">
                <label>
                    <span class="lnr lnr-text-align-left"></span>   Atuação sub-titulo
                </label>
                <textarea name="config_atua" class="inpt-null"><?= $config_atua; ?></textarea>
            </div>
            <div class="row-f">
                <label>
                    <span class="lnr lnr-text-align-left"></span>   Equipe texto
                </label>
                <textarea name="config_team" class="inpt-null"><?= $config_team; ?></textarea>
            </div>
            <div class="row-f">
                <label>Configurações de email</label>
            </div>
            <div class="row-m">
                <label>
                    E-mail Hopedagem
                </label>
                <input type="text" name="config_host" value="<?= $config_host; ?>">
            </div>
            <div class="row-m">
                <label>
                    Porta
                </label>
                <input type="text" name="config_port" value="<?= $config_port; ?>">
            </div>
            <div class="row-m">
                <label>
                    E-mail Usuário
                </label>
                <input type="text" name="config_mail" value="<?= $config_mail; ?>">
            </div><!-- comment -->
            <div class="row-m">
                <label>
                    E-mail Senha
                </label>
                <input type="password" name="config_pass" value="<?= $config_pass; ?>">
            </div>
            <div class="row-f">
                <label>
                    E-mail de destino
                </label>
                <input type="text" name="config_mail_d" value="<?= $config_mail_d; ?>">
            </div>


            <div class="row-btn">
                <input type="hidden" value="<?= $config_id; ?>" name="config_id"/>
                <button id="btn-form" class="btn-green btn-default" type="submit"><span class="lnr lnr-checkmark-circle"></span> Atualizar</button>
            </div>
        </form>
    </div>
</main>
