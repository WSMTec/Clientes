<?php
if (!$Adm):
    header('Location: painel.php');
    exit();
endif;
?>
<main class="content">
    <!--<div class="div-header">-->
    <header class="header-box">
        <h2 class="header-box-h">Gerencie todos os advogados do site</h2>
        <div class="header-box-btn">
            <a class="btn-default btn-blue" href="?exe=team/create"><span class="lnr lnr-plus-circle"></span> Novo Advogado</a>
        </div>
    </header>

    <!--</div>-->
    <div class="box">
        <table id="table-team" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th><span class="lnr lnr-user"></span> Foto</th>
                    <th><span class="lnr lnr-envelope"></span> Nome</th>
                    <th><span class="lnr lnr-menu-circle"></span> Função</th>
                    <th><span class="lnr lnr-apartment"></span> Email</th>
                    <th></th>
                </tr>
            </thead>

            <tfoot>
                <tr>
                    <th><span class="lnr lnr-user"></span> Foto</th>
                    <th><span class="lnr lnr-envelope"></span> Nome</th>
                    <th><span class="lnr lnr-menu-circle"></span> Função</th>
                    <th><span class="lnr lnr-apartment"></span> Email</th>
                    <th></th>
                </tr>
            </tfoot>
        </table>
    </div>
</main>