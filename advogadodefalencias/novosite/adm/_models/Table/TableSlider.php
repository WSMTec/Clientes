<?php

$Col = array(
    0 => 'post_cover',
    1 => 'post_title',
    2 => 'post_date'
);
$Read = new Read;
$Read->FullRead("SELECT * FROM tb_slider");
$Rows = $Read->getRowCount();
$TotalRows = $Rows;

//PESQUISA
$Query = "SELECT * FROM tb_slider";
if (!empty($Req['search']['value'])) {
    $Query .= " WHERE";
    $Query .= " (post_title LIKE '%' :value '%')";
    $Query .= " OR (post_date LIKE '%' :value '%')";
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
    if ($post_cover != '') {
        $img = Check::Image('uploads/' . $post_cover, $post_title, 80, 30, true);
    } else {
        $img = Check::Image('uploads/slider/6.jpg', $post_title, 80, 30, true);
    }

    $SubData = array();
    $SubData[] = "<center>" . $img . "</center>";
    $SubData[] = "<div data-tootip='oiii'>{$post_title}</div>";
    $SubData[] = date("d/m/Y", strtotime($post_date));
    $SubData[] = ""
            . "<div>"
            . "<button name='btn-href[]' data-href='?exe=slider/update&posts={$post_id}' type='button' class='btn btn-primary btn-xs btn-left'><span class='lnr lnr-pencil'></span></button> "
            . "<button name='btn-modal[]' data-function='slider-delete' value='{$post_id}' type='button' class='btn btn-danger btn-xs btn-rigth'><span class='lnr lnr-trash'></span></button>"
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
