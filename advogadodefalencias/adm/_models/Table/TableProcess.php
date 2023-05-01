<?php

$Col = array(
    0 => 'procn_cli',
    1 => 'proc_cli',
    2 => 'acao_cli'
);

$Read = new Read;
$Read->FullRead("SELECT * FROM n_processos INNER JOIN n_clientes ON n_clientes.id_cli = n_processos.id_cli");
$Rows = $Read->getRowCount();
$TotalRows = $Rows;

$Query = "SELECT * FROM n_processos INNER JOIN n_clientes ON n_clientes.id_cli = n_processos.id_cli";
$par = null;
if (!empty($Req['search']['value'])) {
    $Query .= " WHERE procn_cli LIKE '%' :value '%'";
    $Query .= " OR proc_cli LIKE '%' :value '%'";
    $Query .= " OR acao_cli LIKE '%' :value '%'";
    $Query .= " OR nome_cli LIKE '%' :value '%'";
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
    $SubData[] = $procn_cli;
    $SubData[] = $proc_cli;
    $SubData[] = $acao_cli;
    $SubData[] = ""
            . "<div>"
            . "<button name='btn-href[]' data-href='?exe=process/update&posts={$id_proc}' type='button' class='btn btn-primary btn-xs btn-left'><span class='lnr lnr-pencil'></span></button> "
            . "<button name='btn-modal[]' data-function='process-delete' data-name='process' value='{$id_proc}' type='button' class='btn btn-danger btn-xs btn-rigth'><span class='lnr lnr-trash'></span></button>"
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
