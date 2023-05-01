<?php


use Source\Read;
$data = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
//var_dump($data);
?>
<div class="app_modal" data-modalclose="true">

    <?php
    //    $Session = new \Source\Core\Session();
    //    var_dump($Session);
    //    if (isset($data['title']) && $data['title'] === 'unittable'):
    //        require "../../vendor/autoload.php";
    //        require("../../source/Config.inc.php");
    //        $Session = new \Source\Core\Session();
    //        $Read = new Read();
    //        $Read->ExeRead("unidades", "WHERE IdUnidade = :id AND IdEmpresa = {$_SESSION['userlogin']['IdEmpresa']}", "id={$data['code']}");
    //
    //        ?>
    <div class="app_modal_box app_modal_counties">
        <p class="title icon-calendar-minus-o">Cadastrar Município:</p>
        <form autocomplete="on" method="post" class=""
              action="../source/App/Admin.php">
            <input type="hidden" name="action" value="counties"/>

            <div class="row-m">
                <div class="row-m">
                    <label>
                        Código
                    </label>
                    <input class="empty_field" name="Unidade" type="text"/>
                </div>
                <div class="row-m">
                    <label>
                        UF
                    </label>
                    <input class="empty_field" name="Descricao" type="text"/>
                </div>
            </div>
            <div class="row-m">
                <label>
                    Município
                </label>
                <input class="empty_field" name="Descricao" type="text"/>
            </div>

            <div class="row-btn">
                <button id="btn-form" class="btn-green btn-default" type="submit"><span
                            class="lnr lnr-checkmark-circle"></span> Salvar
                </button>
            </div>
        </form>
    </div>
    <?php
    //    endif;
    ?>

    <?php
    //    $Session = new \Source\Core\Session();
    //    var_dump($Session);
    //    if (isset($data['title']) && $data['title'] === 'unittable'):
    //        require "../../vendor/autoload.php";
    //        require("../../source/Config.inc.php");
    //        $Session = new \Source\Core\Session();
    //        $Read = new Read();
    //        $Read->ExeRead("unidades", "WHERE IdUnidade = :id AND IdEmpresa = {$_SESSION['userlogin']['IdEmpresa']}", "id={$data['code']}");
    //
    //        ?>
    <div class="app_modal_box app_modaledit_unittable">
        <p class="title icon-calendar-minus-o">Editar unidade:</p>
        <form autocomplete="on" method="post" class=""
              action="../source/App/Admin.php">
            <input type="hidden" name="action" value="unittable"/>

            <div class="row-m">
                <div class="row-m">
                    <label>
                        Unidade
                        <?php
                        $Read = new Read();
                        $Read->FullRead("SELECT * FROM cadven");
                        echo $Read->getResult()[0]['NOME'];
                        echo $data['code'];
                        var_dump($data);
                        ?>
                    </label>
                    <input class="empty_field" name="Unidade" type="text" value="<?= $data['code'] ?>"/>
                </div>
                <div class="row-m">
                    <label>
                        Descrição
                    </label>
                    <input class="empty_field" name="Descricao" type="text" value="<?= $data['title'] ?>"/>
                </div>
            </div>

            <div class="row-btn">
                <button id="btn-form" class="btn-green btn-default" type="submit"><span
                            class="lnr lnr-checkmark-circle"></span> Salvar
                </button>
            </div>
        </form>
    </div>
    <?php
    //    endif;
    ?>

</div>