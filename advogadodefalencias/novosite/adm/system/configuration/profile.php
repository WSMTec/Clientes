<?php
//if (!$Adm):
//    header('Location: painel.php');
//    exit();
//endif;
?>
<main class="content">
    <header class="header-box">
        <h2 class="header-box-h">Meu perfil</h2>
    </header>
    <?php
    $Read = new Read;
    $Read->ExeRead("tb_users", "WHERE user_id = :id", "id={$userlogin['user_id']}");
    extract($Read->getResult()[0]);
    ?>
    <div class="box content-box">
        <form id="form-user-profile" method="post" class="form-user-profile" action="user-profile">
            <div class="row-m">
                <label>
                    <span class="lnr lnr-user"></span>  Nome
                </label>
                <input name="user_name" class="inpt-null" type="text" value="<?= $user_name; ?>"/>
            </div>
            <div class="row-m">
                <label>
                    <span class="lnr lnr-user"></span>  Sobrenome
                </label>
                <input name="user_lastname" class="inpt-null" type="text" value="<?= $user_lastname; ?>"/>
            </div>
            <div class="row-m">
                <label>
                    <span class="lnr lnr-lock"></span>  Nova Senha?
                </label>
                <input name="user_password" type="password"/>
            </div>
            <div class="row-m">
                <label>
                    <span class="lnr lnr-envelope"></span>   E-mail
                </label>
                <input name="user_email" class="inpt-null" type="email" value="<?= $user_email; ?>"/>
            </div>

            <div class="row-btn">
                <button id="btn-form" class="btn-green btn-default" type="submit"><span class="lnr lnr-checkmark-circle"></span> Atualizar Perfil</button>
            </div>
        </form>
    </div>
</main>
