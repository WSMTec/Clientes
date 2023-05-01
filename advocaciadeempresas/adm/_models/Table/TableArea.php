<?php

$Col = array(
    0 => 'area_icon',
    1 => 'area_title',
    2 => 'area_summary',
    3 => 'area_data',
);
$Read = new Read;
$Read->FullRead("SELECT * FROM tb_areas");
$Rows = $Read->getRowCount();
$TotalRows = $Rows;

//PESQUISA
$Query = "SELECT * FROM tb_areas";
if (!empty($Req['search']['value'])) {
    $Query .= " WHERE";
    $Query .= " (area_title LIKE '%' :value '%')";
    $Query .= " OR (area_content LIKE '%' :value '%')";
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
    if ($area_icon != '') {
        $img = Check::Image('uploads/' . $area_icon, $area_title, 40, null, true);
    } else {
        $img = Check::Image('uploads/blog/6.jpg', $area_title, 40, null, true);
    }

    $SubData = array();
    $SubData[] = "<center>" . $img . "</center>";
    $SubData[] = "<div data-tootip='oiii'>{$area_title}</div>";
    $SubData[] = Check::Words($area_summary, 10);
    $SubData[] = date("d/m/Y H:i", strtotime($area_date));
    $SubData[] = ""
            . "<div>"
            . "<button name='btn-href[]' data-href='?exe=areas/update&post={$area_id}' type='button' class='btn btn-primary btn-xs btn-left'><span class='lnr lnr-pencil'></span></button> "
            . "<button name='btn-modal[]' data-function='area-delete' value='{$area_id}' type='button' class='btn btn-danger btn-xs btn-rigth'><span class='lnr lnr-trash'></span></button>"
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
