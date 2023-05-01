<?php

$Col = array(
    0 => 'nome_cli',
    1 => 'email_cli',
    2 => 'tel_cli'
);

$Read = new Read;
$Read->FullRead("SELECT * FROM n_clientes");
$Rows = $Read->getRowCount();
$TotalRows = $Rows;

$Query = "SELECT * FROM n_clientes";
$par = null;
if (!empty($Req['search']['value'])) {
    $Query .= " WHERE nome_cli LIKE '%' :value '%'";
    $Query .= " OR email_cli LIKE '%' :value '%'";
    $Query .= " OR tel_cli LIKE '%' :value '%'";
    $par = "value={$Req['search']['value']}";
}

$Read->FullRead($Query, $par);
$Rows = $Read->getRowCount();

$Query .= " ORDER BY {$Col[$Req['order'][0]['column']]} {$Req['order'][0]['dir']} LIMIT {$Req['start']}, {$Req['length']}";
$Read->FullRead($Query);
$Data = array();

foreach ($Read->getResult() as $dt):
    extract($dt);
    $SubData = array();
    $SubData[] = $nome_cli;
    $SubData[] = $email_cli;
    $SubData[] = $tel_cli;
    $SubData[] = ""
            . "<div>"
            . "<button name='btn-href[]' data-href='?exe=client/update&posts={$id_cli}' type='button' class='btn btn-primary btn-xs btn-left'><span class='lnr lnr-pencil'></span></button> "
            . "<button name='btn-modal[]' data-function='client-delete' data-name='usuario' value='{$id_cli}' type='button' class='btn btn-danger btn-xs btn-rigth'><span class='lnr lnr-trash'></span></button>"
            . "</div>";
    $Data[] = $SubData;
endforeach;

$Json = array(
    "draw" => intval($Req['draw']),
    "recordsTotal" => intval($Rows),
    "recordsFiltered" => intval($TotalRows),
    "data" => $Data
);
echo json_encode($Json);
