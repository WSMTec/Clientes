<?php



use Source\Read;

$data = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);


//var_dump($data);
?>
<div class="app_modal" data-modalclose="true">
    <div class="app_modal_box app_modal_taxmessage">
        <p class="title icon-calendar-minus-o">Cadastrar mensagem:</p>
        <form autocomplete="on" method="post" class=""
              action="../source/App/Admin.php">
            <input type="hidden" name="action" value="taxmessage"/>
            <div class="row-f">
                <label>
                    Simbolo
                </label>
                <input class="empty_field" name="SimbRed" type="text"/>
            </div>
            <div class="row-f">
                <label>
                    Descrição
                </label>
                <textarea name="Mensagem"></textarea>
            </div>

            <div class="row-btn">
                <button id="btn-form" class="btn-green btn-default" type="submit">
                    <span class="lnr lnr-checkmark-circle"></span> Salvar
                </button>
            </div>
        </form>
    </div>

    <div class="app_modal_box app_modal_costcenters">
        <p class="title icon-calendar-minus-o">Cadastrar centros de custo:</p>
        <form autocomplete="on" method="post" class=""
              action="../source/App/Admin.php">
            <input type="hidden" name="action" value="costcenters"/>

            <div class="row-f">
                <label>
                    Descrição
                </label>
                <input class="empty_field" name="DescricaoCCusto" type="text"/>
            </div>

            <div class="row-btn">
                <button id="btn-form" class="btn-green btn-default" type="submit"><span
                            class="lnr lnr-checkmark-circle"></span> Salvar
                </button>
            </div>
        </form>
    </div>
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
        <div class="app_modal_box app_modal_unittable">
            <p class="title icon-calendar-minus-o">Cadastrar unidades:</p>
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
                            ?>
                        </label>
                        <input class="empty_field" name="Unidade" type="text"/>
                    </div>
                    <div class="row-m">
                        <label>
                            Descrição
                        </label>
                        <input class="empty_field" name="Descricao" type="text"/>
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
    <!--SUPPORT-->
    <div class="app_modal_box app_modal_planbills">
        <p class="title icon-calendar-minus-o">Cadastrar Planos de contas:</p>
        <form autocomplete="on" method="post" class=""
              action="../source/App/Admin.php">
            <input type="hidden" name="action" value="planbills"/>

            <div class="row-m">
                <div class="row-m">
                    <label>
                        Grupo *
                    </label>
                    <input class="empty_field" name="Grupo" type="text"/>
                </div>
                <div class="row-m">
                    <label>
                        S. Grupo
                    </label>
                    <input class="empty_field" name="SubGrupo" type="text"/>
                </div>
            </div>
            <div class="row-m">
                <label>
                    Conta
                </label>
                <input class="empty_field" name="Conta" type="text"/>
            </div>
            <div class="row-m">
                <div class="row-m">
                    <label>
                        Descrição
                    </label>
                    <input class="empty_field" name="Descricao" type="text"/>
                </div>

                <div class="row-m">
                    <label>
                        Tipo
                    </label>
                    <input class="empty_field" name="Tipo" type="text"/>
                </div>
            </div>
            <div class="row-btn">
                <button id="btn-form" class="btn-green btn-default" type="submit"><span
                            class="lnr lnr-checkmark-circle"></span> Salvar
                </button>
            </div>
        </form>
    </div>
</div>