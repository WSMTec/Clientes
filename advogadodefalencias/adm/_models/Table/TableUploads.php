<?php

$Col = array(
    0 => 'audio_title',
    1 => 'audio_file',
    2 => 'audio_type'
);

$Read = new Read;
$Read->FullRead("SELECT * FROM tb_uploads");
$Rows = $Read->getRowCount();
$TotalRows = $Rows;

$Query = "SELECT * FROM tb_uploads ";
if (!empty($Req['search']['value'])) {
    $Query .= " WHERE";
    $Query .= " audio_title LIKE '%' :value '%'";
}

$Read->FullRead($Query, "value={$Req['search']['value']}");
$Rows = $Read->getRowCount();

$Query .= " ORDER BY {$Col[$Req['order'][0]['column']]} {$Req['order'][0]['dir']} LIMIT {$Req['start']}, {$Req['length']}";
$Read->FullRead($Query);
$Data = array();

foreach ($Read->getResult() as $dt):
    extract($dt);
    $edit = null;
    $v = null;
    if($audio_type == 'audiosite'){
        $edit = "<button name='btn-href[]' data-href='?exe=uploads/update&uploads={$audio_id}' type='button' class='btn btn-primary btn-xs btn-left'><span class='lnr lnr-pencil'></span></button>";
        $v = '';
    }else{
        $edit = '';
        $v = "<button name='btn-href[]' data-href='?exe=uploads/update&uploads={$audio_id}' type='button' class='btn btn-primary btn-xs btn-left'><span class='lnr lnr-eye'></span></button> ";
    }
    $SubData = array();
    $SubData[] = $audio_title;
    $SubData[] = "<a id='btn-download' href='?exe=uploads/index&action={$audio_id}' class='btn-download'>{$audio_file}</a>";
    $SubData[] = $audio_file;
    $SubData[] = ""
            . "<div style='display: flex;
    gap: 10px;'>"
            . "{$edit}"
            . "{$v}"
            . "<button name='btn-modal[]' data-function='upload-delete' value='{$audio_id}' type='button' class='btn btn-danger btn-xs btn-rigth'><span class='lnr lnr-trash'></span></button>"
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
