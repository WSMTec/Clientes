<?php

$Col = array(
    0 => 'user_name',
    1 => 'user_email',
    2 => 'user_level'
);

$Read = new Read;
$Read->FullRead("SELECT * FROM tb_users WHERE user_id != :id AND user_level <= :nivel",
        "id={$_SESSION['userlogin']['user_id']}&nivel=3");
$Rows = $Read->getRowCount();
$TotalRows = $Rows;

$Query = "SELECT * FROM tb_users WHERE user_id != :id AND user_level <= :nivel";
$par = "id={$_SESSION['userlogin']['user_id']}&nivel=3";

if (!empty($Req['search']['value'])) {
    $Query .= " AND user_name LIKE '%' :value '%'";
    $Query .= " OR user_email LIKE '%' :value '";
    $Query .= " AND user_id != :id";
    $Query .= " AND user_level <= :nivel";
    $par = "id={$_SESSION['userlogin']['user_id']}&value={$Req['search']['value']}&nivel=3";
}

$Read->FullRead($Query, $par);
$Rows = $Read->getRowCount();

$Query .= " ORDER BY {$Col[$Req['order'][0]['column']]} {$Req['order'][0]['dir']} LIMIT {$Req['start']}, {$Req['length']}";
$Read->FullRead($Query);
$Data = array();

foreach ($Read->getResult() as $dt):
    extract($dt);
    if ($user_level == '3') {
        $lev = 'Administrador';
        $btn = "";
    } else {
        $lev = 'Advogado';
        $btn = ""
                . "<div>"
                . "<button name='btn-href[]' data-href='?exe=users/update&users={$user_id}' type='button' class='btn btn-primary btn-xs btn-left'><span class='lnr lnr-pencil'></span></button> "
                . "<button name='btn-modal[]' data-function='user-delete' data-name='usuario' value='{$user_id}' type='button' class='btn btn-danger btn-xs btn-rigth'><span class='lnr lnr-trash'></span></button>"
                . "</div>";
    }
    $SubData = array();
    $SubData[] = $user_name . " " . $user_lastname;
    $SubData[] = $user_email;
    $SubData[] = $lev;
    $SubData[] = $btn;
    $Data[] = $SubData;
endforeach;

$Json = array(
    "draw" => intval($Req['draw']),
    "recordsTotal" => intval($Rows),
    "recordsFiltered" => intval($TotalRows),
    "data" => $Data
);
echo json_encode($Json);
