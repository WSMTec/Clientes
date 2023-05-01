<?php

ob_start();
session_start();
include '../../_app/Config.inc.php';

$Read = new Read;
$action = filter_input(INPUT_GET, 'action', FILTER_DEFAULT);

if ($action == 'bar'):
    if ($_SESSION['userlogin']['user_level'] == 3):
        $Read->FullRead("
            SELECT category_title AS label, SUM(post_views) AS value FROM tb_categories  
            INNER JOIN tb_posts ON post_cat_parent = category_id
            WHERE post_views BETWEEN 0 AND 5000
            GROUP BY category_title
            ");
    else:
        $Read->FullRead("");
    endif;
    $Data = array();
    if (!$Read->getResult()):
        $Data[] = ['label' => 'Sem Registro'];
    else:
        foreach ($Read->getResult() as $dt):
            (int) $dt['value'];
            $Data[] = $dt;
        endforeach;
    endif;
    echo json_encode($Data);
endif;

if ($action == 'pie'):
    if ($_SESSION['userlogin']['user_level'] == 3):
        $Read->FullRead("
            SELECT category_title AS label, SUM(post_views) AS value FROM tb_categories  
            INNER JOIN tb_posts ON post_cat_parent = category_id
            WHERE post_views BETWEEN 0 AND 5000
            GROUP BY category_title
            ");
    else:
        $Read->FullRead("");
    endif;

    $Data = array();
    if (!$Read->getResult()):
        $Data[] = ['label' => 'Sem Registro'];
    else:
        foreach ($Read->getResult() as $dt):
            $Data[] = $dt;
        endforeach;
    endif;
    echo json_encode($Data);
endif;

if ($action == 'pie-c'):
    if ($_SESSION['userlogin']['user_level'] == 3):
        $Read->FullRead("
            SELECT category_title AS label, SUM(post_views) AS value FROM tb_categories  
            INNER JOIN tb_posts ON post_cat_parent = category_id
            WHERE post_views BETWEEN 0 AND 5000
            GROUP BY category_title
            ");
    else:
        $Read->FullRead("");
    endif;

    $Data = array();
    if (!$Read->getResult()):
        $Data[] = ['label' => 'Sem Registro'];
    else:
        foreach ($Read->getResult() as $dt):
            $Data[] = $dt;
        endforeach;
    endif;
    echo json_encode($Data);
endif;


if ($action == 'bar-t'):
    if ($_SESSION['userlogin']['user_level'] == 3):
        $Read->FullRead("
            SELECT category_title AS label, SUM(post_views) AS value FROM tb_categories  
            INNER JOIN tb_posts ON post_cat_parent = category_id
            WHERE post_views BETWEEN 0 AND 5000
            GROUP BY category_title
            ");
    else:
        $Read->FullRead("");
    endif;
    $Data = array();
    if (!$Read->getResult()):
        $Data[] = ['label' => 'Sem Registro'];
    else:
        foreach ($Read->getResult() as $dt):
            $Data[] = $dt;
        endforeach;
    endif;
    echo json_encode($Data);
endif;
