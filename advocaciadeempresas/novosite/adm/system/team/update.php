<?php
if (!$Adm):
    header('Location: painel.php');
    exit();
endif;
?>
<main class="content">
    <?php
    $office = filter_input(INPUT_GET, "team", FILTER_VALIDATE_INT);
    $Read = new Read;
    $Read->ExeRead("tb_team", "WHERE team_id = :id", "id={$office}");
    ?>

    <header class="header-box">
        <h2 class="header-box-h">Atualizar Adv <?= $Read->getResult()[0]['team_name']; ?></h2>
        <div class="header-box-btn">
            <a class="btn-default btn-blue" href="?exe=team/index"><span class="lnr lnr-list"></span>  Advogados</a>
        </div>
    </header>
    <div class="loader">
        <div class="processing"></div>
    </div>

    <?php
    extract($Read->getResult()[0]);
    ?>
    <div class="box content-box">
        <form id="form-team-update" method="team" class="form-team-update" action="team-update">
            <div class="row-f">
                <label>
                    <span class="lnr lnr-picture"></span>  Foto
                </label>
                <input type="file" name="team_cover" class="post_cover inpt-null"/> 
            </div>

            <div class="row-m">
                <label>
                    <span class="lnr lnr-graduation-hat"></span>  Nome
                </label>
                <input class="inpt-null" name="team_title" type="text" value="<?= $team_title; ?>"/>
            </div>

            <div class="row-m">
                <label>
                    <span class="lnr lnr-graduation-hat"></span>  Função
                </label>
                <input class="inpt-null" name="team_function" type="text" value="<?= $team_function; ?>"/>
            </div>

            <div class="row-m">
                <label>
                    <span class="lnr lnr-graduation-hat"></span>  E-mail
                </label>
                <input class="inpt-null" name="team_email" type="text" value="<?= $team_email; ?>"/>
            </div>

            <div class="row-m">
                <label>
                    <span class="lnr lnr-graduation-hat"></span>  Facebook
                </label>
                <input class="inpt-null" name="team_facebook" type="text" value="<?= $team_facebook; ?>"/>
            </div>

            <div class="row-m">
                <label>
                    <span class="lnr lnr-graduation-hat"></span>  Instagram
                </label>
                <input class="inpt-null" name="team_instagram" type="text" value="<?= $team_instagram; ?>"/>
            </div>

            <div class="row-m">
                <label>
                    <span class="lnr lnr-graduation-hat"></span>  Linkedin
                </label>
                <input class="inpt-null" name="team_linkedin" type="text" value="<?= $team_linkedin; ?>"/>
            </div>

            <div class="row-f">
                <label>
                    <span class="lnr lnr-text-align-left"></span>   Formação
                </label>
                <textarea class="inpt-null js_editor" name="team_formation" type="text"><?= $team_formation; ?></textarea>
            </div>

            <div class="row-f">
                <label>
                    <span class="lnr lnr-text-align-left"></span>   Conteúdo
                </label>
                <textarea class="inpt-null js_editor" name="team_content" type="text"><?= $team_content; ?></textarea>
            </div>
            <div class="row-btn">
                <input name="team_id" type="hidden" value="<?= $team_id; ?>"/>
                <button id="btn-form" class="btn-green btn-default" type="submit"><span class="lnr lnr-checkmark-circle"></span> Atualizar Advogado</button>
            </div>
        </form>
    </div>
</main>
