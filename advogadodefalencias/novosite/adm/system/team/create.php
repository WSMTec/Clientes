<?php
if (!$Adm):
    header('Location: painel.php');
    exit();
endif;
?>
<main class="content">

    <header class="header-box">
        <h2 class="header-box-h">Cadastro de Advogados no site</h2>
        <div class="header-box-btn">
            <a class="btn-default btn-blue" href="?exe=team/index"><span class="lnr lnr-list"></span>  Advogados</a>
        </div>

    </header>

    <div class="box content-box">
        <form method="post" id="form-team" class="form-team form-horizontal" action="team" enctype="multipart/form-data">
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
                <input required="" class="inpt-null" name="team_title" type="text"/>
            </div>

            <div class="row-m">
                <label>
                    <span class="lnr lnr-graduation-hat"></span>  Função
                </label>
                <input required="" class="inpt-null" name="team_function" type="text"/>
            </div>

            <div class="row-m">
                <label>
                    <span class="lnr lnr-graduation-hat"></span>  E-mail
                </label>
                <input required="" class="inpt-null" name="team_email" type="text"/>
            </div>

            <div class="row-m">
                <label>
                    <span class="lnr lnr-graduation-hat"></span>  Facebook
                </label>
                <input class="inpt-null" name="team_facebook" type="text"/>
            </div>

            <div class="row-m">
                <label>
                    <span class="lnr lnr-graduation-hat"></span>  Instagram
                </label>
                <input class="inpt-null" name="team_instagram" type="text"/>
            </div>

            <div class="row-m">
                <label>
                    <span class="lnr lnr-graduation-hat"></span>  Linkedin
                </label>
                <input class="inpt-null" name="team_linkedin" type="text"/>
            </div>

            <div class="row-f">
                <label>
                    <span class="lnr lnr-text-align-left"></span>   Formação
                </label>
                <textarea class="inpt-null js_editor" name="team_formation" type="text"></textarea>
            </div>

            <div class="row-f">
                <label>
                    <span class="lnr lnr-text-align-left"></span>   Conteúdo
                </label>
                <textarea class="inpt-null js_editor" name="team_content" type="text"></textarea>
            </div>


            <div class="row-btn">
                <button id="btn-form" class="btn-green btn-default" type="submit"><span class="lnr lnr-checkmark-circle"></span> Adicionar Advogado</button>
            </div>
        </form>
    </div>
</main>
