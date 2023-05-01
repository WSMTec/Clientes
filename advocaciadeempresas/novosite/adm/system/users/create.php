<?php
if (!$Adm):
    header('Location: painel.php');
    exit();
endif;
?>
<main class="content">

    <header class="header-box">
        <h2 class="header-box-h">Cadastro de usuários</h2>
        <div class="header-box-btn">
            <a class="btn-default btn-blue" href="?exe=users/index"><span class="lnr lnr-list"></span>  Usuários</a>
        </div>

    </header>

    <div class="box content-box">
        <form id="form-user" method="post" class="form-user" action="user">
            <div class="row-m">
                <label>
                    <span class="lnr lnr-user"></span>   Nome
                </label>
                <input name="user_name" class="inpt-null" type="text"/>
            </div>
            <div class="row-m">
                <label>
                    <span class="lnr lnr-user"></span>   Sobrenome
                </label>
                <input name="user_lastname" class="inpt-null" type="text"/>
            </div>
            <div class="row-m">
                <label>
                    <span class="lnr lnr-envelope"></span>   E-mail
                </label>
                <input name="user_email" class="inpt-null" type="email"/>
            </div>

            <div class="row-m">
                <label>
                    <span class="lnr lnr-lock"></span>   Senha
                </label>
                <input name="user_password" class="inpt-null" type="password"/>
            </div>
            <div class="row-m">
                <label>
                    <span class="lnr lnr-menu-circle"></span>   Nível
                </label>
                <select required="" id="user_level" class="inpt-null" name="user_level">
                    <option></option>
                    <!--<option  class="clik-op" value="1">Funcionário</option>-->                 
                    <option  class="clik-op" value="2">Advogado</option>                 
                    <option  class="clik-op" value="3">Administrador</option>                 
                </select>
            </div>

            <div class="row-btn">
                <button id="btn-form" class="btn-green btn-default" type="submit"><span class="lnr lnr-checkmark-circle"></span> Salvar Usuário</button>
            </div>
        </form>
    </div>
</main>
