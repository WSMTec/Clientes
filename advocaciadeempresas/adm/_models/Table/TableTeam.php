<?php

$Col = array(
    0 => 'team_cover',
    1 => 'team_title',
    2 => 'team_function',
    3 => 'team_email'
);
$Read = new Read;
$Read->FullRead("SELECT * FROM tb_team");
$Rows = $Read->getRowCount();
$TotalRows = $Rows;

//PESQUISA
$Query = "SELECT * FROM tb_team";
if (!empty($Req['search']['value'])) {
    $Query .= " WHERE";
    $Query .= " (team_title LIKE '%' :value '%')";
    $Query .= " OR (team_function LIKE '%' :value '%')";
//} else {
//    $Query .= " WHERE category_parent IS NULL";
}
$Read->FullRead($Query, "value={$Req['search']['value']}");
$Rows = $Read->getRowCount();

//ORDEM
$Query .= " ORDER BY {$Col[$Req['order'][0]['column']]} {$Req['order'][0]['dir']} LIMIT {$Req['start']}, {$Req['length']}";
$Read->FullRead($Query);
$Data = array();

foreach ($Read->getResult() as $dt):
    extract($dt);
    if ($team_cover != '') {
        $img = Check::Image('uploads/' . $team_cover, $team_title, 40, null, true);
    } else {
        $img = Check::Image('uploads/blog/logo3.png', $team_title, 40, null, true);
    }

    $SubData = array();
    $SubData[] = "<center>" . $img . "</center>";
    $SubData[] = "<div data-tootip='oiii'>{$team_title}</div>";
    $SubData[] = $team_function;
    $SubData[] = $team_email;
    $SubData[] = ""
            . "<div>"
            . "<button name='btn-href[]' data-href='?exe=team/update&team={$team_id}' type='button' class='btn btn-primary btn-xs btn-left'><span class='lnr lnr-pencil'></span></button> "
            . "<button name='btn-modal[]' data-function='team-delete' value='{$team_id}' type='button' class='btn btn-danger btn-xs btn-rigth'><span class='lnr lnr-trash'></span></button>"
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
