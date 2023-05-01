<?php

$Col = array(
    0 => 'ebook_title',
    0 => 'ebook_cover',
    1 => 'ebook_content',
    2 => 'ebook_data'
);
$Read = new Read;
$Read->FullRead("SELECT * FROM tb_ebook");
$Rows = $Read->getRowCount();
$TotalRows = $Rows;

//PESQUISA
$Query = "SELECT * FROM tb_ebook";
if (!empty($Req['search']['value'])) {
    $Query .= " WHERE";
    $Query .= " (ebook_title LIKE '%' :value '%')";
    $Query .= " OR (ebook_content LIKE '%' :value '%')";
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
    if ($ebook_cover != '') {
        $img = Check::Image('uploads/' . $ebook_cover, $ebook_title, 80, 30, true);
    } else {
        $img = Check::Image('uploads/blog/6.jpg', $ebook_title, 80, 30, true);
    }

    $SubData = array();
    $SubData[] = "<center>" . $img . "</center>";
    $SubData[] = "<div data-tootip='oiii'>{$ebook_title}</div>";
    $SubData[] = Check::Words($ebook_content, 10);
    $SubData[] = date("d/m/Y H:i", strtotime($ebook_date));
    $SubData[] = ""
            . "<div>"
            . "<button name='btn-href[]' data-href='?exe=ebook/update&posts={$ebook_id}' type='button' class='btn btn-primary btn-xs btn-left'><span class='lnr lnr-pencil'></span></button> "
            . "<button name='btn-modal[]' data-function='ebook-delete' value='{$ebook_id}' type='button' class='btn btn-danger btn-xs btn-rigth'><span class='lnr lnr-trash'></span></button>"
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
