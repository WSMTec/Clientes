<?php

use Source\Read;

$data = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
//var_dump($data);
?>
<div class="app_modal" data-modalclose="true">


    <div class="app_modal_box app_modal_select_cfop">
        <p class="title icon-calendar-minus-o"> Selecione o CFOP:</p>
        <div class="app_modal_box_form">
            <form class="form_modal" method="post" action="../source/App/Search.php">
                <input type="hidden" name="action" value="cfop"/>
                <input class="input_focus" placeholder="Buscar código ou descrição" type="text" name="buscar">
                <button class="btn-default btn-green" type="submit">Buscar</button>
            </form>
        </div>
        <div class="app_modal_box_select">
            <table class="table-default" width="100%">
                <thead class="th-default">
                <tr>
                    <th>Codigo</th>
                    <th>Descrição</th>
                </tr>
                </thead>
                <tbody class="tbody_select">

                </tbody>
            </table>
        </div>
    </div>

    <div class="app_modal_box app_modal_select_icms">
        <p class="title icon-calendar-minus-o"> Selecione o ICMS:</p>
        <div class="app_modal_box_form">
            <form class="form_modal ajax_off" method="post" data-offform=".app_modal_select_icms">
                <input placeholder="Buscar código ou descrição" class="input_search" type="text" name="buscar">
                <button class="btn-default btn-green">Buscar</button>
            </form>
        </div>
        <div class="app_modal_box_select">
            <table class="table-default" width="100%">
                <thead class="th-default">
                <tr>
                    <th>ICMS</th>
                </tr>
                </thead>
                <tbody class="tbody_select">
                <tr>
                    <td><a class='select_opt' data-select=".input_icms" data-value="101"> 101 - Tributada com
                            Permissão de Crédito </a></td>
                </tr>
                <tr>
                    <td><a class='select_opt' data-select=".input_icms" data-value="102"> 102 - Tributada sem
                            Permissão de Crédito </a></td>
                </tr>
                <tr>
                    <td><a class='select_opt' data-select=".input_icms" data-value="103"> 103 - Isenção do ICMS
                            para faixa de recita bruta </a></td>
                </tr>
                <tr>
                    <td><a class='select_opt' data-select=".input_icms" data-value="201"> 201 - Tributada com
                            permissão de Crédito e com cobrança do ICMS por ST </a></td>
                </tr>
                <tr>
                    <td><a class='select_opt' data-select=".input_icms" data-value="202"> 202 - Tributada sem
                            permissão de Crédito e com cobrança do ICMS por ST </a></td>
                </tr>
                <tr>
                    <td><a class='select_opt' data-select=".input_icms" data-value="203"> 203 - Isenção do ICMS
                            para faixa de receita bruta e com cobrança do ICMS por ST
                        </a></td>
                </tr>
                <tr>
                    <td><a class='select_opt' data-select=".input_icms" data-value="300"> 300 - Imune </a></td>
                </tr>
                <tr>
                    <td><a class='select_opt' data-select=".input_icms" data-value="400"> 400 - Não
                            Tributada </a></td>
                </tr>
                <tr>
                    <td><a class='select_opt' data-select=".input_icms" data-value="500"> 500 - ICMS cobrado
                            anteriormente por ST ou por antecipação </a></td>
                </tr>
                <tr>
                    <td><a class='select_opt' data-select=".input_icms" data-value="900"> 900 - Outros </a></td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>

    <div class="app_modal_box app_modal_select_ipi">
        <p class="title icon-calendar-minus-o"> Selecione o IPI:</p>
        <div class="app_modal_box_form">
            <form class="form_modal ajax_off" method="post" data-offform=".app_modal_select_ipi">
                <input placeholder="Buscar código ou descrição" class="input_search" type="text" name="buscar">
                <button class="btn-default btn-green">Buscar</button>
            </form>
        </div>
        <div class="app_modal_box_select">
            <table class="table-default" width="100%">
                <thead class="th-default">
                <tr>
                    <th>IPI</th>
                </tr>
                </thead>
                <tbody class="tbody_select">
                <tr>
                    <td><a class='select_opt' data-select=".input_ipi" data-value="00">
                            00 - Entrada com recuperação de Crédito </a></td>
                </tr>
                <tr>
                    <td><a class='select_opt' data-select=".input_ipi" data-value="01"> 01 - Entrada tributada
                            com aliquota zero </a></td>
                </tr>
                <tr>
                    <td><a class='select_opt' data-select=".input_ipi" data-value="02"> 02 - Entrada
                            isenta </a></td>
                </tr>
                <tr>
                    <td><a class='select_opt' data-select=".input_ipi" data-value="03"> 03 - Entrada não
                            tributada </a></td>
                </tr>
                <tr>
                    <td><a class='select_opt' data-select=".input_ipi" data-value="04"> 04 - Entrada
                            imune </a></td>
                </tr>
                <tr>
                    <td><a class='select_opt' data-select=".input_ipi" data-value="49"> 49 - Outras
                            entradas </a></td>
                </tr>
                <tr>
                    <td><a class='select_opt' data-select=".input_ipi" data-value="50">50 - Saida
                            tributada </a></td>
                </tr>
                <tr>
                    <td><a class='select_opt' data-select=".input_ipi" data-value="51"> 51 - Saidas tributadas
                            com aliquota zero </a></td>
                </tr>
                <tr>
                    <td><a class='select_opt' data-select=".input_ipi" data-value="52"> 52 - Saida Isenta </a>
                    </td>
                </tr>
                <tr>
                    <td><a class='select_opt' data-select=".input_ipi" data-value="53"> 53 - Saida não
                            tributada </a></td>
                </tr>
                <tr>
                    <td><a class='select_opt' data-select=".input_ipi" data-value="54"> 54 - Saida imune </a>
                    </td>
                </tr>
                <tr>
                    <td><a class='select_opt' data-select=".input_ipi" data-value="55"> 55 - Saida com
                            suspensão </a></td>
                </tr>
                <tr>
                    <td><a class='select_opt' data-select=".input_ipi" data-value="99"> 99 - Outras Saidas </a>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>

    <div class="app_modal_box app_modal_select_pis">
        <p class="title icon-calendar-minus-o"> Selecione o PIS:</p>
        <div class="app_modal_box_form">
            <form class="form_modal ajax_off" method="post" data-offform=".app_modal_select_pis">
                <input placeholder="Buscar código ou descrição" class="input_search" type="text" name="buscar">
                <button class="btn-default btn-green">Buscar</button>
            </form>
        </div>
        <div class="app_modal_box_select">
            <table class="table-default" width="100%">
                <thead class="th-default">
                <tr>
                    <th>PIS</th>
                </tr>
                </thead>
                <tbody class="tbody_select">
                <tr>
                    <td><a class='select_opt' data-select=".input_pis" data-value="01">
                            01 - Operação Tributável com Alíquota Básica </a></td>
                </tr>
                <tr>
                    <td><a class='select_opt' data-select=".input_pis" data-value="02"> 02 - Operação Tributável
                            com Alíquota Diferenciada </a></td>
                </tr>
                <tr>
                    <td><a class='select_opt' data-select=".input_pis" data-value="03"> 03 - Operação Tributável
                            com Alíquota por Unidade de Medida de Produto </a></td>
                </tr>
                <tr>
                    <td><a class='select_opt' data-select=".input_pis" data-value="04"> 04 - Operação Tributável
                            Monofásica - Revenda a Alíquota Zero </a></td>
                </tr>
                <tr>
                    <td><a class='select_opt' data-select=".input_pis" data-value="05"> 05 - Operação Tributável
                            por Substituição Tributária </a></td>
                </tr>
                <tr>
                    <td><a class='select_opt' data-select=".input_pis" data-value="06"> 06 - Operação Tributável
                            a Alíquota Zero </a></td>
                </tr>
                <tr>
                    <td><a class='select_opt' data-select=".input_pis" data-value="09">09 - Operação com
                            Suspensão da Contribuição </a></td>
                </tr>
                <tr>
                    <td><a class='select_opt' data-select=".input_pis" data-value="51"> 51 - Operação com
                            Direito a Crédito - Vinculada Exclusivamente a Receita Não Tributada no Mercado Interno </a>
                    </td>
                </tr>
                <tr>
                    <td><a class='select_opt' data-select=".input_pis" data-value="52"> 52 - Operação com
                            Direito a Crédito - Vinculada Exclusivamente a Receita de Exportação </a>
                    </td>
                </tr>
                <tr>
                    <td><a class='select_opt' data-select=".input_pis" data-value="53"> 53 - Operação com
                            Direito a Crédito - Vinculada a Receitas Tributadas e Não-Tributadas no Mercado Interno </a>
                    </td>
                </tr>
                <tr>
                    <td><a class='select_opt' data-select=".input_pis" data-value="54"> 54 - Saida imune </a>
                    </td>
                </tr>
                <tr>
                    <td><a class='select_opt' data-select=".input_pis" data-value="54"> 54 - Operação com
                            Direito a Crédito - Vinculada a Receitas Tributadas no Mercado Interno e de Exportação </a>
                    </td>
                </tr>
                <tr>
                    <td><a class='select_opt' data-select=".input_pis" data-value="55"> 55 - Operação com
                            Direito a Crédito - Vinculada a Receitas Não-Tributadas no Mercado Interno e de
                            Exportação </a>
                    </td>
                </tr>
                <tr>
                    <td><a class='select_opt' data-select=".input_pis" data-value="56"> 56 - Operação com
                            Direito a Crédito - Vinculada a Receitas Tributadas e Não-Tributadas no Mercado Interno, e
                            de Exportação </a>
                    </td>
                </tr>
                <tr>
                    <td><a class='select_opt' data-select=".input_pis" data-value="60"> 60 - Crédito Presumido -
                            Operação de Aquisição Vinculada Exclusivamente a Receita Tributada no Mercado Interno </a>
                    </td>
                </tr>
                <tr>
                    <td><a class='select_opt' data-select=".input_pis" data-value="61"> 61 - Crédito Presumido -
                            Operação de Aquisição Vinculada Exclusivamente a Receita Não-Tributada no Mercado
                            Interno </a>
                    </td>
                </tr>
                <tr>
                    <td><a class='select_opt' data-select=".input_pis" data-value="62"> 62 - Crédito Presumido -
                            Operação de Aquisição Vinculada Exclusivamente a Receita de Exportação </a>
                    </td>
                </tr>
                <tr>
                    <td><a class='select_opt' data-select=".input_pis" data-value="63"> 63 - Crédito Presumido -
                            Operação de Aquisição Vinculada a Receitas Tributadas e Não-Tributadas no Mercado
                            Interno</a>
                    </td>
                </tr>
                <tr>
                    <td><a class='select_opt' data-select=".input_pis" data-value="64"> 64 - Crédito Presumido -
                            Operação de Aquisição Vinculada a Receitas Tributadas no Mercado Interno e de
                            Exportação </a>
                    </td>
                </tr>
                <tr>
                    <td><a class='select_opt' data-select=".input_pis" data-value="65"> 65 - Crédito Presumido -
                            Operação de Aquisição Vinculada a Receitas Não-Tributadas no Mercado Interno e de
                            Exportação </a>
                    </td>
                </tr>
                <tr>
                    <td><a class='select_opt' data-select=".input_pis" data-value="66"> 66 - Crédito Presumido -
                            Operação de Aquisição Vinculada a Receitas Tributadas e Não-Tributadas no Mercado Interno, e
                            de Exportação
                        </a>
                    </td>
                </tr>
                <tr>
                    <td><a class='select_opt' data-select=".input_pis" data-value="67"> 67 - Crédito Presumido -
                            Outras Operações </a>
                    </td>
                </tr>
                <tr>
                    <td><a class='select_opt' data-select=".input_pis" data-value="70">70 - Operação de
                            Aquisição sem Direito a Crédito </a>
                    </td>
                </tr>
                <tr>
                    <td><a class='select_opt' data-select=".input_pis" data-value="71">71 - Operação de
                            Aquisição com Isenção </a>
                    </td>
                </tr>
                <tr>
                    <td><a class='select_opt' data-select=".input_pis" data-value="72">72 - Operação de
                            Aquisição com Suspensão </a>
                    </td>
                </tr>
                <tr>
                    <td><a class='select_opt' data-select=".input_pis" data-value="73">73 - Operação de
                            Aquisição a Alíquota Zero </a>
                    </td>
                </tr>
                <tr>
                    <td><a class='select_opt' data-select=".input_pis" data-value="74">74 - Operação de
                            Aquisição sem Incidência da Contribuição </a>
                    </td>
                </tr>
                <tr>
                    <td><a class='select_opt' data-select=".input_pis" data-value="75">75 - Operação de
                            Aquisição por Substituição Tributária </a>
                    </td>
                </tr>
                <tr>
                    <td><a class='select_opt' data-select=".input_pis" data-value="98">98 - Outras Operações de
                            Entrada </a>
                    </td>
                </tr>
                <tr>
                    <td><a class='select_opt' data-select=".input_pis" data-value="99">99 - Outras
                            Operações </a>
                    </td>
                </tr>

                </tbody>
            </table>
        </div>
    </div>

    <div class="app_modal_box app_modal_select_cofins">
        <p class="title icon-calendar-minus-o"> Selecione o COFINS:</p>
        <div class="app_modal_box_form">
            <form class="form_modal ajax_off" method="post" data-offform=".app_modal_select_cofins">
                <input placeholder="Buscar código ou descrição" class="input_search" type="text" name="buscar">
                <button class="btn-default btn-green">Buscar</button>
            </form>
        </div>
        <div class="app_modal_box_select">
            <table class="table-default" width="100%">
                <thead class="th-default">
                <tr>
                    <th>COFINS</th>
                </tr>
                </thead>
                <tbody class="tbody_select">
                <tr>
                    <td><a class='select_opt' data-select=".input_cofins" data-value="01">
                            01 - Operação Tributável com Alíquota Básica </a></td>
                </tr>
                <tr>
                    <td><a class='select_opt' data-select=".input_cofins" data-value="02"> 02 - Operação
                            Tributável
                            com Alíquota Diferenciada </a></td>
                </tr>
                <tr>
                    <td><a class='select_opt' data-select=".input_cofins" data-value="03"> 03 - Operação
                            Tributável
                            com Alíquota por Unidade de Medida de Produto </a></td>
                </tr>
                <tr>
                    <td><a class='select_opt' data-select=".input_cofins" data-value="04"> 04 - Operação
                            Tributável
                            Monofásica - Revenda a Alíquota Zero </a></td>
                </tr>
                <tr>
                    <td><a class='select_opt' data-select=".input_cofins" data-value="05"> 05 - Operação
                            Tributável
                            por Substituição Tributária </a></td>
                </tr>
                <tr>
                    <td><a class='select_opt' data-select=".input_cofins" data-value="06"> 06 - Operação
                            Tributável
                            a Alíquota Zero </a></td>
                </tr>
                <tr>
                    <td><a class='select_opt' data-select=".input_cofins" data-value="09">09 - Operação com
                            Suspensão da Contribuição </a></td>
                </tr>
                <tr>
                    <td><a class='select_opt' data-select=".input_cofins" data-value="51"> 51 - Operação com
                            Direito a Crédito - Vinculada Exclusivamente a Receita Não Tributada no Mercado Interno </a>
                    </td>
                </tr>
                <tr>
                    <td><a class='select_opt' data-select=".input_cofins" data-value="52"> 52 - Operação com
                            Direito a Crédito - Vinculada Exclusivamente a Receita de Exportação </a>
                    </td>
                </tr>
                <tr>
                    <td><a class='select_opt' data-select=".input_cofins" data-value="53"> 53 - Operação com
                            Direito a Crédito - Vinculada a Receitas Tributadas e Não-Tributadas no Mercado Interno </a>
                    </td>
                </tr>
                <tr>
                    <td><a class='select_opt' data-select=".input_cofins" data-value="54"> 54 - Saida imune </a>
                    </td>
                </tr>
                <tr>
                    <td><a class='select_opt' data-select=".input_cofins" data-value="54"> 54 - Operação com
                            Direito a Crédito - Vinculada a Receitas Tributadas no Mercado Interno e de Exportação </a>
                    </td>
                </tr>
                <tr>
                    <td><a class='select_opt' data-select=".input_cofins" data-value="55"> 55 - Operação com
                            Direito a Crédito - Vinculada a Receitas Não-Tributadas no Mercado Interno e de
                            Exportação </a>
                    </td>
                </tr>
                <tr>
                    <td><a class='select_opt' data-select=".input_cofins" data-value="56"> 56 - Operação com
                            Direito a Crédito - Vinculada a Receitas Tributadas e Não-Tributadas no Mercado Interno, e
                            de Exportação </a>
                    </td>
                </tr>
                <tr>
                    <td><a class='select_opt' data-select=".input_cofins" data-value="60"> 60 - Crédito
                            Presumido -
                            Operação de Aquisição Vinculada Exclusivamente a Receita Tributada no Mercado Interno </a>
                    </td>
                </tr>
                <tr>
                    <td><a class='select_opt' data-select=".input_cofins" data-value="61"> 61 - Crédito
                            Presumido -
                            Operação de Aquisição Vinculada Exclusivamente a Receita Não-Tributada no Mercado
                            Interno </a>
                    </td>
                </tr>
                <tr>
                    <td><a class='select_opt' data-select=".input_cofins" data-value="62"> 62 - Crédito
                            Presumido -
                            Operação de Aquisição Vinculada Exclusivamente a Receita de Exportação </a>
                    </td>
                </tr>
                <tr>
                    <td><a class='select_opt' data-select=".input_cofins" data-value="63"> 63 - Crédito
                            Presumido -
                            Operação de Aquisição Vinculada a Receitas Tributadas e Não-Tributadas no Mercado
                            Interno</a>
                    </td>
                </tr>
                <tr>
                    <td><a class='select_opt' data-select=".input_cofins" data-value="64"> 64 - Crédito
                            Presumido -
                            Operação de Aquisição Vinculada a Receitas Tributadas no Mercado Interno e de
                            Exportação </a>
                    </td>
                </tr>
                <tr>
                    <td><a class='select_opt' data-select=".input_cofins" data-value="65"> 65 - Crédito
                            Presumido -
                            Operação de Aquisição Vinculada a Receitas Não-Tributadas no Mercado Interno e de
                            Exportação </a>
                    </td>
                </tr>
                <tr>
                    <td><a class='select_opt' data-select=".input_cofins" data-value="66"> 66 - Crédito
                            Presumido -
                            Operação de Aquisição Vinculada a Receitas Tributadas e Não-Tributadas no Mercado Interno, e
                            de Exportação
                        </a>
                    </td>
                </tr>
                <tr>
                    <td><a class='select_opt' data-select=".input_cofins" data-value="67"> 67 - Crédito
                            Presumido -
                            Outras Operações </a>
                    </td>
                </tr>
                <tr>
                    <td><a class='select_opt' data-select=".input_cofins" data-value="70">70 - Operação de
                            Aquisição sem Direito a Crédito </a>
                    </td>
                </tr>
                <tr>
                    <td><a class='select_opt' data-select=".input_cofins" data-value="71">71 - Operação de
                            Aquisição com Isenção </a>
                    </td>
                </tr>
                <tr>
                    <td><a class='select_opt' data-select=".input_cofins" data-value="72">72 - Operação de
                            Aquisição com Suspensão </a>
                    </td>
                </tr>
                <tr>
                    <td><a class='select_opt' data-select=".input_cofins" data-value="73">73 - Operação de
                            Aquisição a Alíquota Zero </a>
                    </td>
                </tr>
                <tr>
                    <td><a class='select_opt' data-select=".input_cofins" data-value="74">74 - Operação de
                            Aquisição sem Incidência da Contribuição </a>
                    </td>
                </tr>
                <tr>
                    <td><a class='select_opt' data-select=".input_cofins" data-value="75">75 - Operação de
                            Aquisição por Substituição Tributária </a>
                    </td>
                </tr>
                <tr>
                    <td><a class='select_opt' data-select=".input_cofins" data-value="98">98 - Outras Operações
                            de
                            Entrada </a>
                    </td>
                </tr>
                <tr>
                    <td><a class='select_opt' data-select=".input_cofins" data-value="99">99 - Outras
                            Operações </a>
                    </td>
                </tr>

                </tbody>
            </table>
        </div>
    </div>

    <div class="app_modal_box app_modal_icms">
        <p class="title icon-calendar-minus-o">Cadastrar ICMS:</p>
        <form autocomplete="on" method="post" class=""
              action="../source/App/Admin.php">
            <input type="hidden" name="action" value="icms"/>

            <div class="row-m">
                <div class="row-m">
                    <label>
                        UF
                    </label>
                    <input class="empty_field" name="Estado" type="text" style="text-transform: uppercase;"/>
                </div>


                <div class="row-m">
                    <label>
                        %ICM
                    </label>
                    <input class="empty_field mask_percent" name="Aliquota" type="text"/>
                </div>
            </div>
            <div class="row-m">
                <label>
                    %Interna
                </label>
                <input class="empty_field mask_percent" name="AliqInterna" type="text"/>
            </div>


            <div class="row-btn">
                <button id="btn-form" class="btn-green btn-default" type="submit"><span
                            class="lnr lnr-checkmark-circle"></span> Salvar
                </button>
            </div>
        </form>
    </div>

    <div class="app_modal_box app_modal_ncm">
        <p class="title icon-calendar-minus-o">Cadastrar NCM/NBS:</p>
        <form autocomplete="on" method="post" class=""
              action="../source/App/Admin.php">
            <input type="hidden" name="action" value="ncm"/>

            <div class="row-m">
                <div class="row-m">
                    <label>
                        NCM/NBS
                    </label>
                    <input class="empty_field" name="Codigo" type="number"/>
                </div>
                <div class="row-m">
                    <label>
                        Descrição
                    </label>
                    <input class="empty_field" name="Descricao" type="text"/>
                </div>
            </div>
            <div class="row-m">
                <div class="row-m">
                    <label>
                        Aliq. Nacional
                    </label>
                    <input class="empty_field mask_percent" name="AliqNac" type="text"/>
                </div>
                <div class="row-m">
                    <label>
                        Aliq. Imposto
                    </label>
                    <input class="empty_field mask_percent" name="AliqImp" type="text"/>
                </div>
            </div>

            <div class="row-btn">
                <button id="btn-form" class="btn-green btn-default" type="submit"><span
                            class="lnr lnr-checkmark-circle"></span> Salvar
                </button>
            </div>
        </form>
    </div>

    <div class="app_modal_box app_modal_counties">
        <p class="title icon-calendar-minus-o">Cadastrar Município:</p>
        <form autocomplete="on" method="post" class=""
              action="../source/App/Admin.php">
            <input type="hidden" name="action" value="counties"/>
            <div class="row-m">
                <div class="row-m">
                    <label>
                        Código do município
                    </label>
                    <input class="empty_field" name="CodMunic" type="number"/>
                </div>
                <div class="row-m">
                    <label>
                        UF
                    </label>
                    <input class="empty_field" name="SiglaUf" type="text" style="text-transform: uppercase;"/>
                </div>
            </div>
            <div class="row-m">
                <label>
                    Nome município
                </label>
                <input class="empty_field" name="NomeMunic" type="text"/>
            </div>
            <div class="row-btn">
                <button id="btn-form" class="btn-green btn-default" type="submit"><span
                            class="lnr lnr-checkmark-circle"></span> Salvar
                </button>
            </div>
        </form>
    </div>

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

    <div class="app_modal_box app_modal_unittable">
        <p class="title icon-calendar-minus-o">Cadastrar unidades:</p>
        <form autocomplete="on" method="post" class=""
              action="../source/App/Admin.php">
            <input type="hidden" name="action" value="unittable"/>

            <div class="row-m">
                <div class="row-m">
                    <label>
                        Unidade
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