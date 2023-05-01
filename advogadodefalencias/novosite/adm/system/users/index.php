<?php
if (!$Adm):
    header('Location: painel.php');
    exit();
endif;
?>
<main class="content">
    <!--<div class="div-header">-->
    <header class="header-box">
        <h2 class="header-box-h">Gerencie todos os usuários do sistema</h2>
        <div class="header-box-btn">
            <a class="btn-default btn-blue" href="?exe=users/create"><span class="lnr lnr-plus-circle"></span> Novo Usuário</a>
        </div>
    </header>
    
    <!--</div>-->
    <div class="box">
        <table id="table-users" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th><span class="lnr lnr-user"></span> Usuário</th>
                    <th><span class="lnr lnr-envelope"></span> E-mail</th>
                    <th><span class="lnr lnr-menu-circle"></span> Nivel</th>
                    <th></th>
                </tr>
            </thead>

            <tfoot>
                <tr>
                    <th><span class="lnr lnr-user"></span> Usuário</th>
                    <th><span class="lnr lnr-envelope"></span> E-mail</th>
                    <th><span class="lnr lnr-menu-circle"></span> Nivel</th>
                    <th></th>
                </tr>
            </tfoot>
        </table>
    </div>
</main>