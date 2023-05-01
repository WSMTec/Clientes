<?php

use Source\Read;

$data = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
//var_dump($data);
?>
<div class="app_modal" data-modalclose="true">
    <div class="app_modal_box app_modal_multbaixar">
        <p class="title icon-calendar-minus-o">Multiplas baixas:</p>
        <form autocomplete="nope" autocomplete="none" method="post" class="form_multbaixar form_reset"
              action="../source/App/Admin.php">
            <input type="hidden" name="action" value="billstopay-multbaixar"/>
            <input type="hidden" name="data" class="input_data" value=""/>

            <div class="row-m">
                <label>
                    Selecione o banco
                </label>
                <select name="CodBco" id="seletor" required="" class="codbanc" style="text-align: center">
                    <option></option>
                    <?php
                    $Read = new Read();
                    $Read->ExeRead("cadbco", "WHERE IdEmpresa = {$userlogin['IdEmpresa']}");
                    if ($Read->getResult()):
                        foreach ($Read->getResult() as $item):
                            ?>
                            <option value="<?= $item['IdReg']; ?>">
                                ⦿ <?= "{$item['NomeBco']} / {$item['Agencia']} / {$item['NConta']} / {$item['TpBoleto']} / {$item['NsNumero']}"; ?></option>
                            <?php
                        endforeach;
                    endif;
                    ?>
                </select>
            </div>


            <div class="row-m">
                <label>
                    P. Conta
                </label>
                <select name="IdPlConta" id="seletor" required="" class="codbanc" style="text-align: center">
                    <option></option>
                    <?php
                    $Read->ExeRead("plconta", "WHERE IdEmpresa = {$userlogin['IdEmpresa']}");
                    if ($Read->getResult()):
                        foreach ($Read->getResult() as $item):
                            ?>
                            <option value="<?= $item['IdPlConta']; ?>">
                                ⦿ <?= "{$item['Descricao']}"; ?></option>
                            <?php
                        endforeach;
                    endif;
                    ?>
                </select>
            </div>

            <div class="row-btn">
                <button id="btn-form" class="btn-green btn-default" type="submit"><span
                        class="lnr lnr-checkmark-circle"></span> Baixar
                </button>
            </div>
        </form>
    </div>

    <div class="app_modal_box app_modal_replic">
        <p class="title icon-calendar-minus-o">Replicar:</p>
        <form autocomplete="nope" autocomplete="none" method="post" class="form_replic form_reset"
              action="../source/App/Admin.php">
            <input type="hidden" name="action" value="billstopay-replic"/>
            <input type="hidden" name="data" class="input_data" value=""/>

            <div class="row-f">
                <div class="row-m">
                    <div class="row-m">
                        <label>
                            Quant. Parcelas
                        </label>
                        <input name="NPARC" type="number" required="" min="1" value="1"/>
                    </div>
                    <div class="row-m">
                        <label>
                            Iniciar Parcela N°
                        </label>
                        <input name="INPARC" type="number" required="" min="1" value="1"/>
                    </div>
                </div>
                <div class="row-m">
                    <div class="row-m">
                        <label>

                        </label>
                        <div class="toggle-check" style="flex-basis: auto !important; display: block !important;">
                            <label>
                                <input type="checkbox" name="IncrementarDoc" checked value="S"/>
                                Incrementar N° Doc
                            </label>
                        </div>
                    </div>
                    <div class="row-m">
                        <label>

                        </label>
                        <div class="toggle-check" style="flex-basis: auto !important; display: block !important;">
                            <label>
                                <input type="checkbox" name="ManterData" checked value="S"/>
                                Manter dia p/vencimento
                            </label>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row-btn">
                <button id="btn-form" class="btn-green btn-default" type="submit"><span
                        class="lnr lnr-checkmark-circle"></span> Gerar
                </button>
            </div>
        </form>
    </div>

    <div class="app_modal_box app_modal_views ctpag" data-class="ctpag">
        <p class="title icon-calendar-minus-o">Visualizar conta a pagar:</p>
        <div class="box_views">

        </div>
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