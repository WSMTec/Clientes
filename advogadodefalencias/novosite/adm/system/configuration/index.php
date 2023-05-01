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
    <!--</div>-->
    <div class="box content-box">
        <form id="form-config" method="post" class="form-config" action="configuration">
            <div class="row-f">
                <label>
                    <span class="lnr lnr-text-align-left"></span>   Home texto
                </label>
                <textarea name="config_content" class="inpt-null"><?= $config_content; ?></textarea>
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
