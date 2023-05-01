<?php

$Col = array(
    0 => 'visitor_name',
    1 => 'comment_content',
    3 => 'comment_status'
);
$Read = new Read;
$Read->FullRead("SELECT * FROM tb_comment "
        . "INNER JOIN tb_posts ON comment_post = post_id "
        . "INNER JOIN tb_visitor ON comment_visitor = visitor_id WHERE comment_answer is null ");
$Rows = $Read->getRowCount();
$TotalRows = $Rows;

//PESQUISA
$Query = "SELECT * FROM tb_comment INNER JOIN tb_posts ON comment_post = post_id INNER JOIN tb_visitor ON comment_visitor = visitor_id ";
if (!empty($Req['search']['value'])) {
    $Query .= " WHERE comment_answer is null AND";
    $Query .= " (visitor_name LIKE '%' :value '%')";
    $Query .= " ";
} else {
    $Query .= " WHERE comment_answer is null";
}
$Read->FullRead($Query, "value={$Req['search']['value']}");
$Rows = $Read->getRowCount();

//ORDEM
$Query .= " ORDER BY {$Col[$Req['order'][0]['column']]} {$Req['order'][0]['dir']} LIMIT {$Req['start']}, {$Req['length']}";
$Read->FullRead($Query);
$Data = array();

foreach ($Read->getResult() as $dt):
    extract($dt);
    if ($comment_status == 'A') {
        $comment_status = "Aberto";
    } else {
        $comment_status = "Respondido";
    }
    $SubData = array();
    $SubData[] = $visitor_name;
    $SubData[] = $comment_content;
    $SubData[] = $comment_status;
    $SubData[] = ""
            . "<div>"
            . "<button name='btn-href[]' data-href='?exe=comment/update&category={$comment_id}' type='button' class='btn btn-primary btn-xs btn-left'><span class='lnr lnr-pencil'></span></button> "
            . "<button name='btn-modal[]' data-function='comment-delete' value='{$comment_id}' type='button' class='btn btn-danger btn-xs btn-rigth'><span class='lnr lnr-trash'></span></button>"
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
