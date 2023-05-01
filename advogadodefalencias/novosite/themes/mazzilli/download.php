<?php

$url = explode('/', $_SERVER['REQUEST_URI']);
$Name = end($url);
$Read = new Read;
$Read->ExeRead("tb_ebook", "WHERE ebook_name = :n", "n={$Name}");
if ($Read->getRowCount() < 1):
    header('Location: ' . HOME . DIRECTORY_SEPARATOR . '404');
else:
    extract($Read->getResult()[0]);
endif;
if (!isset($ebook_pdf) && !file_exists(HOME . '/uploads/' . $ebook_pdf)) {
    
} else {
    $ArrUpdate = ['ebook_download' => $ebook_views + 1];
    $Update = new Update();
    $Update->ExeUpdate("tb_ebook", $ArrUpdate, "WHERE ebook_id = :postid", "postid={$ebook_id}");


    switch (strtolower(substr(strrchr(basename(HOME . '/uploads/' . $ebook_pdf), "."), 1))) {

        case "pdf": $tipo = "application/pdf";
            break;
        case "exe": $tipo = "application/octet-stream";
            break;
        case "zip": $tipo = "application/zip";
            break;
        case "doc": $tipo = "application/msword";
            break;
        case "xls": $tipo = "application/vnd.ms-excel";
            break;
        case "ppt": $tipo = "application/vnd.ms-powerpoint";
            break;
        case "gif": $tipo = "image/gif";
            break;
        case "png": $tipo = "image/png";
            break;
        case "jpg": $tipo = "image/jpg";
            break;
        case "mp3": $tipo = "audio/mpeg";
            break;
        case "php":
        case "htm":
        case "html":
    }
    header("Content-Type: " . $tipo);
    // informa o tipo do arquivo ao navegador
    header("Content-Length: " . filesize(HOME . '/uploads/' . $ebook_pdf));
    // informa o tamanho do arquivo ao navegador
    header("Content-Disposition: attachment; filename=" . basename(HOME . '/uploads/' . $ebook_pdf));
    // informa ao navegador que é tipo anexo e faz abrir a janela de download, 
    //tambem informa o nome do arquivo
    readfile(HOME . '/uploads/' . $ebook_pdf); // lê o arquivo
    exit;
}
