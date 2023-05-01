<?php

ob_start();
session_start();
include '../../_app/Config.inc.php';

$Nivel = [3, 4];
$Adm = (in_array($_SESSION['userlogin']['user_level'], $Nivel));

$Req = $_REQUEST;
$Param = strip_tags(trim($Req['Param']));
$Read = new Read;
$Value = strtoupper($Req['Value']);
//$Read->ExeRead("tb_empresas", "WHERE NomeEmpresa = :e LIMIT 1", "e={$Req['Value']}");
switch ($Param):
//    SITE
    case 'posts-index':
        require './Table/TablePosts.php';
        break;
    case 'comment-index':
        require './Table/TableComment.php';
        break;
    case 'slider-index':
        require './Table/TableSlider.php';
        break;
    case 'team-index':
        require './Table/TableTeam.php';
        break;
    case 'areas-index':
        require './Table/TableArea.php';
        break;
    case 'billstoreceive-index':
        require './Table/TableCtrec.php';
        break;
    case 'posts-ebook':
        require './Table/TableEbook.php';
        break;
    case 'categories-index':
        require './Table/TableCategories.php';
        break;
    case 'ebook-index':
        require './Table/TableEbook.php';
        break;
    case 'doc-index':
        require './Table/TableDoc.php';
        break;
//    DASHBOARD
    case 'administradores-index':
        unset($Req['value']);
        require './Table/TableAdm.php';
        break;
    case 'companies-index':
        unset($Req['value']);
        require './Table/TableCompanies.php';
        break;
    case 'users-index':
        unset($Req['value']);
        require './Table/TableUsers.php';
        break;
    case 'department-index':
        unset($Req['value']);
        require './Table/TableDepartment.php';
        break;
    case 'process-index':
        require './Table/TableProcess.php';
        break;
    case 'servicos-index':
        unset($Req['value']);
        require './Table/TableServicos.php';
        break;
    case 'reports-index':
        require './Table/TableReports.php';
        break;
    case 'uploads-index':
        require './Table/TableUploads.php';
        break;
    case 'client-index':
        require './Table/TableClient.php';
        break;
    case 'forms-index':
        require './Table/TableForms.php';
        break;
    case 'downloads-index':
        require './Table/TableDownloads.php';
        break;
    case 'tickets-index':
        $Adm;
        require './Table/TableTickets.php';
        break;
endswitch;


