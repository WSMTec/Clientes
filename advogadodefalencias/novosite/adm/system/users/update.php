<?php
if (!$Adm):
    header('Location: painel.php');
    exit();
endif;
?>
<main class="content">
    <?php
    $getOffice = filter_input(INPUT_GET, "users", FILTER_DEFAULT);
    $user = $getOffice;
    ?>

    <header class="header-box">
        <h2 class="header-box-h">Editar usuário</h2>
        <div class="header-box-btn">
            <a class="btn-default btn-blue" href="?exe=users/index"><span class="lnr lnr-list"></span>  Usuários</a>
        </div>
    </header>

    <?php
    $Read = new Read;
    $Read->ExeRead("tb_users", "WHERE user_id = :id", "id={$user}");
    extract($Read->getResult()[0]);
    ?>
    <div class="box content-box">
        <form id="form-user-update" method="post" class="form-user-update" action="user-update">
            <div class="row-m">
                <label>
                    <span class="lnr lnr-user"></span>   Nome
                </label>
                <input name="user_name" class="inpt-null" type="text" value="<?= $user_name; ?>"/>
            </div>
            <div class="row-m">
                <label>
                    <span class="lnr lnr-user"></span>   Sobrenome
                </label>
                <input name="user_lastname" class="inpt-null" type="text" value="<?= $user_lastname; ?>"/>
            </div>
            <div class="row-m">
                <label>
                    <span class="lnr lnr-envelope"></span>   E-mail
                </label>
                <input name="user_email" class="inpt-null" type="email" value="<?= $user_email; ?>"/>
            </div>

            <div class="row-m">
                <label>
                    <span class="lnr lnr-lock"></span>   Nova senha?
                </label>
                <input name="user_password" class="inpt-null" type="password"/>
            </div>
            <div class="row-m">
                <label>
                    <span class="lnr lnr-menu-circle"></span>   Nível
                </label>
                <select disabled="disabled" id="user_level" class="inpt-null" name="user_level">
                    <option></option>
                    <!--<option  class="clik-op" value="1">Funcionário</option>-->                 
                    <option <?= ($user_level === "2" ? 'selected="selected"' : ''); ?> class="clik-op" value="2">Advogado</option>                 
                    <option <?= ($user_level === "3" ? 'selected="selected"' : ''); ?> class="clik-op" value="3">Administrador</option>                 
                </select>
            </div>


            <div class="row-btn">
                <input name="user_id" type="hidden" value="<?= $user_id; ?>"/>
                <button id="btn-form" class="btn-green btn-default" type="submit"><span class="lnr lnr-checkmark-circle"></span> Atualizar</button>
            </div>
        </form>
    </div>
</main>
