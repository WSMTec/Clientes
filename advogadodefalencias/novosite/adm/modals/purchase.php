<?php

use Source\Read;

$data = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
//var_dump($data);
?>
<div class="app_modal" data-modalclose="true">

    <div class="app_modal_box app_modal_purchase">
        <p class="title icon-calendar-minus-o">Adcionar Item/Produto:</p>
        <form data-class=".form_product" autocomplete="nope" autocomplete="none" method="post" class="form_product form_reset"
              action="../source/App/Search.php">
            <input type="hidden" name="action" value="purchase-item"/>

            <div class="row-m">
                <label>
                    Item/Produto
                </label>
                <input class="empty_field input_codigo" name="IdProduto" type="hidden" value=""/>
                <input autocomplete="off" class="empty_field search_product" name="DESCRICAO" type="text"
                       placeholder="Ex: Pão, Chocolate, Arroz" required/>
                <div class="qd">

                </div>
            </div>
            <div class="row-f">
                <div class="row-m">
                    <label>
                        Quantidade
                    </label>
                    <input autocomplete="off" class="empty_field input_quant" name="QUANT" type="number" required/>
                </div>
                <div class="row-m">
                    <label>
                        Comissão
                    </label>
                    <input class="empty_field mask_percent input_comi" name="VlCom" type="text"/>
                </div>
            </div>
            <div class="row-f">
                <label>
                    Local da saída
                </label>

                <div class="toggle-check">
                    <?php
                    //                    $Read = new Read;
                    //                    $Read->ExeRead("tb_empresas", "WHERE status_cmp != 'R'");
                    //                    foreach ($Read->getResult() as $comp):
                    ?>
                    <label>
                        <input class="loca_inp" type="radio" checked name="local" value="M"/>
                        Matriz
                    </label>
                    <label>
                        <input class="loca_inp" type="radio" name="local" value="F"/>
                        Filial
                    </label>
                    <?php
                    //                    endforeach;
                    ?>
                </div>
            </div>
            <div class="row-f footer_calc_fixed_b" style="width: 100%">
                <div class="row-m">
                    <label>
                        Valor unitário
                    </label>
                    <span class="valormodal">R$ 0,00</span>
                </div>
                <div class="row-m">
                    <label>
                        Valor Total
                    </label>
                    <span class="vtotalmodal">R$ 0,00</span>
                </div>
            </div>
            <div class="row-btn">
                <button id="btn-form" class="btn-green btn-default" type="submit"><span
                        class="lnr lnr-checkmark-circle"></span> Salvar
                </button>
            </div>
        </form>
    </div>

    <div class="app_modal_box app_modal_up_requests">
        <p class="title icon-calendar-minus-o">Editar Item/Produto:</p>
        <form data-class=".form_update_product" autocomplete="nope" autocomplete="none" method="post"
              class="form_update_product form_reset"
              action="../source/App/Search.php">
            <input type="hidden" class="input_action" name="action" value="purchase-update-item"/>

            <div class="row-m">
                <label>
                    Item/Produto
                </label>
                <input class="empty_field input_chave" name="chave" type="hidden" value=""/>
                <input class="empty_field input_codigo" name="IdProduto" type="hidden" value=""/>
                <input disabled="" autocomplete="off" class="empty_field search_product focus_inp" name="DESCRICAO" type="text"
                       placeholder="Ex: Pão, Chocolate, Arroz" required/>
                <div class="qd">

                </div>
            </div>
            <div class="row-f">
                <div class="row-m">
                    <label>
                        Quantidade
                    </label>
                    <input autocomplete="off" class="empty_field input_quant" name="QUANT" type="number" required/>
                </div>
                <div class="row-m">
                    <label>
                        Comissão
                    </label>
                    <input class="empty_field mask_percent input_comi" name="VlCom" type="text"/>
                </div>
            </div>
            <div class="row-f">
                <label>
                    Local da saída
                </label>

                <div class="toggle-check">
                    <?php
                    //                    $Read = new Read;
                    //                    $Read->ExeRead("tb_empresas", "WHERE status_cmp != 'R'");
                    //                    foreach ($Read->getResult() as $comp):
                    ?>
                    <label>
                        <input type="radio" checked name="local" value="M"/>
                        Matriz
                    </label>
                    <label>
                        <input type="radio" name="local" value="F"/>
                        Filial
                    </label>
                    <?php
                    //                    endforeach;
                    ?>
                </div>
            </div>
            <div class="row-f footer_calc_fixed_b" style="width: 100%">
                <div class="row-m">
                    <label>
                        Valor unitário
                    </label>
                    <span class="valormodal">0</span>
                    <input type="hidden" class="valorunitario">
                </div>
                <div class="row-m">
                    <label>
                        Valor Total
                    </label>
                    <span class="vtotalmodal">0</span>
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

<!---->
<!--<div class="app_modal_box app_modal_ipi">-->
<!--    <p class="title icon-calendar-minus-o">Selecione o IPI:</p>-->
<!--    <div class="app_modal_box_form">-->
<!--        <form class="form_modal" method="post" action="../source/App/Search.php">-->
<!--            <input type="hidden" name="action" value="ipi"/>-->
<!--            <input placeholder="Buscar código ou descrição" type="text" name="buscar">-->
<!--            <button class="btn-default btn-green" type="submit">Buscar</button>-->
<!--        </form>-->
<!--    </div>-->
<!--    <div class="app_modal_box_select">-->
<!--        <table class="table-default" width="100%">-->
<!--            <thead class="th-default">-->
<!--            <tr>-->
<!--                <th>Codigo</th>-->
<!--                <th>Descrição</th>-->
<!--            </tr>-->
<!--            </thead>-->
<!--            <tbody class="tbody_select_ipi">-->
<!---->
<!--            </tbody>-->
<!--        </table>-->
<!--    </div>-->
<!--</div>-->
<!---->
<!--<div class="app_modal_box app_modal_pis">-->
<!--    <p class="title icon-calendar-minus-o">Selecione o PIS:</p>-->
<!--    <div class="app_modal_box_form">-->
<!--        <form class="form_modal" method="post" action="../source/App/Search.php">-->
<!--            <input type="hidden" name="action" value="pis"/>-->
<!--            <input placeholder="Buscar código ou descrição" type="text" name="buscar">-->
<!--            <button class="btn-default btn-green" type="submit">Buscar</button>-->
<!--        </form>-->
<!--    </div>-->
<!--    <div class="app_modal_box_select">-->
<!--        <table class="table-default" width="100%">-->
<!--            <thead class="th-default">-->
<!--            <tr>-->
<!--                <th>Codigo</th>-->
<!--                <th>Descrição</th>-->
<!--            </tr>-->
<!--            </thead>-->
<!--            <tbody class="tbody_select_pis">-->
<!---->
<!--            </tbody>-->
<!--        </table>-->
<!--    </div>-->
<!--</div>-->