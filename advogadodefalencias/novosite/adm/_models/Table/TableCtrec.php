<?php

$Col = array(
    0 => 'IdCliente',
    1 => 'Situacao',
    2 => 'Npeddo',
    3 => 'DEMIS',
    4 => 'DVENC',
    5 => 'VLPAG',
    6 => 'VLPAGO'
);

$Read = new Read;
$Read->FullRead("SELECT * FROM ctrec INNER JOIN n_clientes ON IdCliente = id_cli");
$Rows = $Read->getRowCount();
$TotalRows = $Rows;


//PESQUISA
$Query = "SELECT * FROM ctrec INNER JOIN n_clientes ON IdCliente = id_cli";

$Search = '';
if (!empty($Req['search']['value'])) {

    $Query .= " WHERE";
    $Query .= " (Situacao LIKE '%' :value '%'";
    $Query .= " OR NDOC LIKE '%' :value '%'";
    $Query .= " OR DESCRICAO LIKE '%' :value '%')";
    $Search = "value={$Req['search']['value']}";
}

$Read->FullRead($Query, $Search);
$Rows = $Read->getRowCount();

//ORDEM
$Query .= " ORDER BY {$Col[$Req['order'][0]['column']]} {$Req['order'][0]['dir']} LIMIT {$Req['start']}, {$Req['length']}";
$Read->FullRead($Query);
$Data = array();
foreach ($Read->getResult() as $dt):
    extract($dt);
    $Btns = null;
    $Situacaod = null;
    if ($Situacao == 'A') {
        $Situacaod = "<div style='color: #000;text-align: center;display: flex;align-items: center;justify-content: center;' class='span_aberto'>{$Situacao}</div>";
        $Btns = ""
                . "<div style='display: flex;justify-content: center;'>"
                . "<a data-modalopenv='.app_modal_viewsct' data-code='{$NCONT}' class='btn btn-blue btn-xss btn-left'><span class='lnr lnr-eye'></span></a> "
                . "<a href='?exe=billstoreceive/update&code={$NCONT}' class='btn btn-green button_rigth btn-xss'><span class='lnr lnr-enter-down'></span></a>"
                . "</div>";
    }
    if ($Situacao == 'Q') {
        $Situacaod = "<div style='color: #fff;text-align: center;display: flex;align-items: center;justify-content: center;' class='span_pagos'>{$Situacao}</div>";
        $Btns = ""
                . "<div style='display: flex;justify-content: center;'>"
                . "<a data-modalopenv='.app_modal_viewsct' data-code='{$NCONT}' class='btn btn-blue btn-xss btn-left'><span class='lnr lnr-eye'></span></a> "
                . "</div>";
    }
    if ($Situacao == 'C') {
        $Situacaod = "<div style='color: #fff;text-align: center;display: flex;align-items: center;justify-content: center;' class='span_cancelados'>{$Situacao}</div>";
        $Btns = ""
                . "<div style='display: flex;justify-content: center;'>"
                . "<a data-modalopenv='.app_modal_viewsct' data-code='{$NCONT}' class='btn btn-blue btn-xss btn-left'><span class='lnr lnr-eye'></span></a> "
                . "<a href='?exe=billstoreceive/update&code={$NCONT}' class='btn btn-green button_rigth btn-xss'><span class='lnr lnr-enter-down'></span></a>"
                . "</div>";
    }
    $SubData = array();
    $SubData[] = $nome_cli;
    $SubData[] = $Situacaod;
    $SubData[] = $NDOC;
    $SubData[] = date("d/m/Y", strtotime($DEMIS));
    $SubData[] = date("d/m/Y", strtotime($DVENC));
    $SubData[] = number_format($VLPAG, "2", ",", ".");
    $SubData[] = number_format($VLPAGO, "2", ",", ".");
    $SubData[] = $Btns;

    $Data[] = $SubData;
endforeach;

$Json = array(
    "draw" => intval($Req['draw']),
    "recordsTotal" => intval($Rows),
    "recordsFiltered" => intval($TotalRows),
    "data" => $Data
);

echo json_encode($Json);
