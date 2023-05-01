<?php

ob_start();
session_start();
include '../../_app/Config.inc.php';
require_once '../../_app/Helpers/Trigger.php';
$trigger = new Trigger;
$action = filter_input(INPUT_GET, 'action', FILTER_DEFAULT);
$data = filter_input_array(INPUT_POST, FILTER_DEFAULT);
//SITE
if ($action === 'search-categories-delete'):
    $Read = new Read;
    $Read->ExeRead("tb_categories", "WHERE category_id = :id LIMIT 1", "id={$data['codigo']}");

    $json['title'] = "Deletar";
    $json['description'] = "Deseja remover a categoria <b>{$Read->getResult()[0]['category_title']}</b>?";
    echo json_encode($json);
endif;
if ($action === 'search-comment-delete'):
    $Read = new Read;
    $Read->ExeRead("tb_comment", "WHERE comment_id = :id LIMIT 1", "id={$data['codigo']}");

    $json['title'] = "Deletar";
    $json['description'] = "Deseja remover esse comentário <b>{$Read->getResult()[0]['comment_content']}</b>?";
    echo json_encode($json);
endif;
if ($action === 'search-posts-delete'):
    $Read = new Read;
    $Read->ExeRead("tb_posts", "WHERE post_id = :id LIMIT 1", "id={$data['codigo']}");

    $json['title'] = "Deletar";
    $json['description'] = "Deseja remover o post <b>{$Read->getResult()[0]['post_title']}</b>?";
    echo json_encode($json);
endif;
if ($action === 'search-slider-delete'):
    $Read = new Read;
    $Read->ExeRead("tb_slider", "WHERE post_id = :id LIMIT 1", "id={$data['codigo']}");

    $json['title'] = "Deletar";
    $json['description'] = "Deseja remover a imagem <b>{$Read->getResult()[0]['post_title']}</b>?";
    echo json_encode($json);
endif;
if ($action === 'search-team-delete'):
    $Read = new Read;
    $Read->ExeRead("tb_team", "WHERE team_id = :id LIMIT 1", "id={$data['codigo']}");

    $json['title'] = "Deletar";
    $json['description'] = "Deseja remover o Advogado <b>{$Read->getResult()[0]['team_title']}</b>?";
    echo json_encode($json);
endif;
if ($action === 'search-sitemap-delete'):
    $Read = new Read;
    $Read->ExeRead("tb_sitemap", "WHERE page_id = :id LIMIT 1", "id={$data['codigo']}");

    $json['title'] = "Deletar";
    $json['description'] = "Deseja remover a URL <b>{$Read->getResult()[0]['page_name']}</b>?";
    echo json_encode($json);
endif;
if ($action === 'search-area-delete'):
    $Read = new Read;
    $Read->ExeRead("tb_areas", "WHERE area_id = :id LIMIT 1", "id={$data['codigo']}");

    $json['title'] = "Deletar";
    $json['description'] = "Deseja remover a area <b>{$Read->getResult()[0]['area_title']}</b>?";
    echo json_encode($json);
endif;
if ($action === 'search-ebook-delete'):
    $Read = new Read;
    $Read->ExeRead("tb_ebook", "WHERE ebook_id = :id LIMIT 1", "id={$data['codigo']}");

    $json['title'] = "Deletar";
    $json['description'] = "Deseja remover o eBook <b>{$Read->getResult()[0]['ebook_title']}</b>?";
    echo json_encode($json);
endif;
if ($action === 'search-services-delete'):
    $Read = new Read;
    $Read->ExeRead("tb_services", "WHERE serv_id = :id LIMIT 1", "id={$data['codigo']}");

    $json['title'] = "Deletar";
    $json['description'] = "Deseja remover o serviço <b>{$Read->getResult()[0]['serv_title']}</b>?";
    echo json_encode($json);
endif;

//DASHBOARD SISTEMA

if ($action === 'search-user-delete'):
    $Read = new Read;
    $Read->ExeRead("tb_users", "WHERE user_id = :id LIMIT 1", "id={$data['codigo']}");

    $json['title'] = "Deletar";
    $json['description'] = "Deseja remover o usuário <b>{$Read->getResult()[0]['user_name']}</b>";
    echo json_encode($json);
endif;

if ($action === 'search-upload-delete'):
    $Read = new Read;
    $Read->ExeRead("tb_uploads", "WHERE audio_id = :u LIMIT 1", "u={$data['codigo']}");

    $json['title'] = "Deletar";
    $json['description'] = "Deseja remover o upload <b>{$Read->getResult()[0]['audio_title']}</b>";
    echo json_encode($json);
endif;

if ($action === 'search-client-delete'):
    $Read = new Read;
    $Read->ExeRead("n_clientes", "WHERE id_cli = :u LIMIT 1", "u={$data['codigo']}");

    $json['title'] = "Deletar";
    $json['description'] = "Deseja remover o cliente <b>{$Read->getResult()[0]['nome_cli']}</b>";
    echo json_encode($json);
endif;

if ($action === 'search-process-delete'):
    $Read = new Read;
    $Read->ExeRead("n_processos", "WHERE id_proc = :u LIMIT 1", "u={$data['codigo']}");

    $json['title'] = "Deletar";
    $json['description'] = "Deseja remover o processo <b>{$Read->getResult()[0]['procn_cli']}</b>";
    echo json_encode($json);
endif;

if ($action === 'search-servicos-delete'):
    $Read = new Read;
    $Read->ExeRead("tb_servicos", "WHERE IdServico = :u LIMIT 1", "u={$data['codigo']}");

    $json['title'] = "Deletar";
    $json['description'] = "Deseja remover o serviço <b>{$Read->getResult()[0]['NomeServico']}</b>";
    echo json_encode($json);
endif;

if ($action === 'search-reports-delete'):
    $Read = new Read;
    $Read->ExeRead("tb_relatorios", "WHERE IdRelatorio = :u LIMIT 1", "u={$data['codigo']}");

    $json['title'] = "Deletar";
    $json['description'] = "Deseja remover o relatório <b>{$Read->getResult()[0]['ProjetoRelatorio']}</b>";
    echo json_encode($json);
endif;

if ($action === 'search-tickets-active'):
    $Read = new Read;
    $Read->ExeRead("tb_tickets", "WHERE id = :u LIMIT 1", "u={$data['codigo']}");

    $json['title'] = "Ativação";
    $json['description'] = "Deseja aceitar o ticket <b>{$Read->getResult()[0]['assunto']}</b>";
    echo json_encode($json);
endif;

if ($action === 'search-tickets-finalize'):
    $Read = new Read;
    $Read->ExeRead("tb_tickets", "WHERE id = :u LIMIT 1", "u={$data['codigo']}");

    $json['title'] = "Finalizar";
    $json['description'] = "Deseja finalizar o ticket <b>{$Read->getResult()[0]['assunto']}</b>";
    echo json_encode($json);
endif;

if ($action === 'search-list-department'):
    $codigo = filter_input(INPUT_GET, 'codigo', FILTER_DEFAULT);
    $Department = array();
    $Read = new Read;
    $Read->ExeRead("tb_department", "WHERE dep_id_companies = :id AND dep_title != 'DIRETORIA'", "id={$codigo}");
    foreach ($Read->getResult() as $v):
        $Department[] = array(
            "dep_id" => $v['dep_id'],
            "dep_title" => $v['dep_title']
        );
    endforeach;
    echo( json_encode($Department) );
endif;

//if ($action === 'search-ticket-msg-push-adm'):
//    $Read = new Read;
//    $Read->FullRead("SELECT * FROM tb_mensagens WHERE statusmsg = 'N' AND (destino = :i OR destino = '0') ORDER BY idmsg DESC LIMIT 1", "i={$data['codigo']}");
//    if ($Read->getResult()):
//        echo json_encode($Read->getResult()[0]);
//    else:
//        echo json_encode(null);
//    endif;
//endif;
//
//if ($action === 'search-ticket-msg-push'):
//    $Read = new Read;
//    $Read->FullRead("SELECT * FROM tb_mensagens WHERE statusmsg = 'N' AND destino = :i ORDER BY idmsg DESC LIMIT 1", "i={$data['codigo']}");
//    if ($Read->getResult()):
//        $v = strip_tags($Read->getResult()[0]);
//        echo json_encode($Read->getResult()[0]);
//    else:
//        echo json_encode(null);
//    endif;
//endif;
//
//if ($action === 'search-ticket-msg-pushs'):
//    $Read = new Read;
//    $Read->FullRead("SELECT * FROM tb_mensagens WHERE statusmsg = 'N' AND destino = :i ORDER BY idmsg DESC LIMIT 1", "i={$_SESSION['userlogin']['user_id']}");
//    if ($Read->getResult()):
//        $v = strip_tags($Read->getResult()[0]);
//        echo json_encode($v);
//    else:
//        echo json_encode(null);
//    endif;
//endif;
if (isset($data['action'])) {
    switch ($data['action']):
        case 'billstoreceive-download':
            unset($data['action']);
            require('./Class/AdminCtrec.class.php');
            $Post = new AdminCtrec;
            $Post->ExeDown($data);
            if ($Post->getResult()):
                $json['erro'] = true;
                $json['href'] = "painel.php?exe=billstoreceive/index";
                $json['reset'] = true;
                $json['notify'] = $trigger->notify($Post->getError()[0], $Post->getError()[1], $Post->getError()[2], $Post->getError()[3]);
            else:
                $json['erro'] = false;
                $json['reset'] = false;
                $json['notify'] = $trigger->notify($Post->getError()[0], $Post->getError()[1], $Post->getError()[2], $Post->getError()[3]);
            endif;
            echo json_encode($json);
            break;
    endswitch;
}
switch ($action):
//    SITE
    case 'categories':
        require('./Class/AdminCategory.class.php');
        $Cat = new AdminCategory;
        $Cat->ExeCreate($data);
        if ($Cat->getResult()):
            $json['erro'] = true;
            $json['reset'] = true;
            $json['notify'] = $trigger->notify($Cat->getError()[0], $Cat->getError()[1], $Cat->getError()[2], $Cat->getError()[3]);
        else:
            $json['erro'] = false;
            $json['reset'] = false;
            $json['notify'] = $trigger->notify($Cat->getError()[0], $Cat->getError()[1], $Cat->getError()[2], $Cat->getError()[3]);
        endif;
        echo json_encode($json);
        break;
    case 'categories-update':
        require('./Class/AdminCategory.class.php');
        $Cat = new AdminCategory;
        $IdCat = $data['category_id'];
        unset($data['category_id']);
        $Cat->ExeUpdate($IdCat, $data);
        if ($Cat->getResult()):
            $json['erro'] = true;
            $json['reset'] = false;
            $json['notify'] = $trigger->notify($Cat->getError()[0], $Cat->getError()[1], $Cat->getError()[2], $Cat->getError()[3]);
        else:
            $json['erro'] = false;
            $json['reset'] = true;
            $json['notify'] = $trigger->notify($Cat->getError()[0], $Cat->getError()[1], $Cat->getError()[2], $Cat->getError()[3]);
        endif;
        echo json_encode($json);
        break;
    case 'categories-delete':
        require('./Class/AdminCategory.class.php');
        $Cat = new AdminCategory;
        $Cat->ExeDelete($data['codigo']);
        if ($Cat->getResult()):
            $json['row'] = true;
//            $json['grid'] = true;
            $json['erro'] = true;
            $json['reset'] = true;
            $json['notify'] = $trigger->notify($Cat->getError()[0], $Cat->getError()[1], $Cat->getError()[2], $Cat->getError()[3]);
        else:
            $json['row'] = false;
//            $json['grid'] = false;
            $json['erro'] = false;
            $json['reset'] = false;
            $json['notify'] = $trigger->notify($Cat->getError()[0], $Cat->getError()[1], $Cat->getError()[2], $Cat->getError()[3]);
        endif;
        echo json_encode($json);
        break;
    case 'sitemap':
        require('./Class/AdminSitemap.class.php');
        $Cat = new AdminSitemap;
        $Cat->ExeCreate($data);
        if ($Cat->getResult()):
            $json['erro'] = true;
            $json['reset'] = true;
            $json['notify'] = $trigger->notify($Cat->getError()[0], $Cat->getError()[1], $Cat->getError()[2], $Cat->getError()[3]);
        else:
            $json['erro'] = false;
            $json['reset'] = false;
            $json['notify'] = $trigger->notify($Cat->getError()[0], $Cat->getError()[1], $Cat->getError()[2], $Cat->getError()[3]);
        endif;
        echo json_encode($json);
        break;
    case 'sitemap-update':
        require('./Class/AdminSitemap.class.php');
        $Cat = new AdminSitemap;
        $IdCat = $data['page_id'];
        unset($data['page_id']);
        $Cat->ExeUpdate($IdCat, $data);
        if ($Cat->getResult()):
            $json['erro'] = true;
            $json['reset'] = false;
            $json['notify'] = $trigger->notify($Cat->getError()[0], $Cat->getError()[1], $Cat->getError()[2], $Cat->getError()[3]);
        else:
            $json['erro'] = false;
            $json['reset'] = true;
            $json['notify'] = $trigger->notify($Cat->getError()[0], $Cat->getError()[1], $Cat->getError()[2], $Cat->getError()[3]);
        endif;
        echo json_encode($json);
        break;
    case 'sitemap-delete':
        require('./Class/AdminSitemap.class.php');
        $Cat = new AdminSitemap;
        $Cat->ExeDelete($data['codigo']);
        if ($Cat->getResult()):
            $json['row'] = true;
//            $json['grid'] = true;
            $json['erro'] = true;
            $json['reset'] = true;
            $json['notify'] = $trigger->notify($Cat->getError()[0], $Cat->getError()[1], $Cat->getError()[2], $Cat->getError()[3]);
        else:
            $json['row'] = false;
//            $json['grid'] = false;
            $json['erro'] = false;
            $json['reset'] = false;
            $json['notify'] = $trigger->notify($Cat->getError()[0], $Cat->getError()[1], $Cat->getError()[2], $Cat->getError()[3]);
        endif;
        echo json_encode($json);
        break;
//    case 'comment':
//        require('./Class/AdminComment.class.php');
//        $Cat = new AdminComment;
//        $Cat->ExeCreate($data);
//        if ($Cat->getResult()):
//            $json['erro'] = true;
//            $json['reset'] = true;
//            $json['notify'] = $trigger->notify($Cat->getError()[0], $Cat->getError()[1], $Cat->getError()[2], $Cat->getError()[3]);
//        else:
//            $json['erro'] = false;
//            $json['reset'] = false;
//            $json['notify'] = $trigger->notify($Cat->getError()[0], $Cat->getError()[1], $Cat->getError()[2], $Cat->getError()[3]);
//        endif;
//        echo json_encode($json);
//        break;
    case 'configuration':
        require('./Class/AdminConfig.class.php');
        $Cat = new AdminConfig;
        $IdCat = $data['config_id'];
        unset($data['config_id']);
        $Cat->ExeUpdate($IdCat, $data);

        if ($Cat->getResult()):
            $json['erro'] = true;
            $json['reset'] = false;
            $json['notify'] = $trigger->notify($Cat->getError()[0], $Cat->getError()[1], $Cat->getError()[2], $Cat->getError()[3]);
        else:
            $json['erro'] = false;
            $json['reset'] = false;
            $json['notify'] = $trigger->notify($Cat->getError()[0], $Cat->getError()[1], $Cat->getError()[2], $Cat->getError()[3]);
        endif;
        echo json_encode($json);
        break;
    case 'comment-update':
        require('./Class/AdminComment.class.php');
        $Cat = new AdminComment;
        $IdCat = $data['comment_answer'];
        $Cat->ExeCreate($data);
        if ($Cat->getResult()):
            $json['resp'] = ''
                    . '<br/>
            <label><b>Resposta:</b></label><br/>
            <div class="box_title">
            ' . $data['comment_content'] . '
            </div>';
            $json['erro'] = true;
            $json['reset'] = true;
            $json['notify'] = $trigger->notify($Cat->getError()[0], $Cat->getError()[1], $Cat->getError()[2], $Cat->getError()[3]);
        else:
            $json['erro'] = false;
            $json['reset'] = false;
            $json['notify'] = $trigger->notify($Cat->getError()[0], $Cat->getError()[1], $Cat->getError()[2], $Cat->getError()[3]);
        endif;
        echo json_encode($json);
        break;

    case 'comment-delete':
        require('./Class/AdminComment.class.php');
        $Cat = new AdminComment;
        $Cat->ExeDelete($data['codigo']);
        if ($Cat->getResult()):
            $json['row'] = true;
//            $json['grid'] = true;
            $json['erro'] = true;
            $json['reset'] = true;
            $json['notify'] = $trigger->notify($Cat->getError()[0], $Cat->getError()[1], $Cat->getError()[2], $Cat->getError()[3]);
        else:
            $json['row'] = false;
//            $json['grid'] = false;
            $json['erro'] = false;
            $json['reset'] = false;
            $json['notify'] = $trigger->notify($Cat->getError()[0], $Cat->getError()[1], $Cat->getError()[2], $Cat->getError()[3]);
        endif;
        echo json_encode($json);
        break;
    case 'posts':
        require('./Class/AdminPost.class.php');
        require('./Class/AdminNewsletter.class.php');
        $data['post_cover'] = (isset($_FILES['post_cover']['tmp_name']) ? $_FILES['post_cover'] : '');
        if ($data['post_video'] == '') {
            $data['post_video'] = 'null';
            $data['post_type'] = 'post';
        } else {
            $data['post_content'] = ($data['post_content'] == '' ? 'null' : $data['post_content']);
            $data['post_type'] = 'video';
        }
//        var_dump($data);
        $Post = new AdminPost;
        $Post->ExeCreate($data);
        if ($Post->getResult()):
            $json['erro'] = true;
            $json['reset'] = true;
            $json['notify'] = $trigger->notify($Post->getError()[0], $Post->getError()[1], $Post->getError()[2], $Post->getError()[3]);
        else:
            $json['erro'] = false;
            $json['reset'] = false;
            $json['notify'] = $trigger->notify($Post->getError()[0], $Post->getError()[1], $Post->getError()[2], $Post->getError()[3]);
        endif;
        echo json_encode($json);
        break;
    case 'posts-delete':
        require('./Class/AdminPost.class.php');
        $Post = new AdminPost;
        $Post->ExeDelete($data['codigo']);
        if ($Post->getResult()):
            $json['row'] = true;
            $json['erro'] = true;
            $json['reset'] = true;
            $json['notify'] = $trigger->notify($Post->getError()[0], $Post->getError()[1], $Post->getError()[2], $Post->getError()[3]);
        else:
            $json['row'] = false;
            $json['erro'] = false;
            $json['reset'] = false;
            $json['notify'] = $trigger->notify($Post->getError()[0], $Post->getError()[1], $Post->getError()[2], $Post->getError()[3]);
        endif;
        echo json_encode($json);
        break;
    case 'posts-update':
        require('./Class/AdminPost.class.php');
//        require('./Class/AdminNewsletter.class.php');
        $data['post_cover'] = (isset($_FILES['post_cover']['tmp_name']) ? $_FILES['post_cover'] : 'null');
        if ($data['post_video'] == '') {
            $data['post_video'] = 'null';
            $data['post_type'] = 'post';
        } else {
            $data['post_content'] = ($data['post_content'] == '' ? 'null' : $data['post_content']);
            $data['post_type'] = 'video';
        }
        $Post = new AdminPost;
        $IdPost = $data['post_id'];
        unset($data['post_id']);
        $Post->ExeUpdate($IdPost, $data);
        if ($Post->getResult()):
            $json['erro'] = true;
            $json['reset'] = false;
            $json['notify'] = $trigger->notify($Post->getError()[0], $Post->getError()[1], $Post->getError()[2], $Post->getError()[3]);
        else:
            $json['erro'] = false;
            $json['reset'] = true;
            $json['notify'] = $trigger->notify($Post->getError()[0], $Post->getError()[1], $Post->getError()[2], $Post->getError()[3]);
        endif;
        echo json_encode($json);
        break;
    case 'slider':
        require('./Class/AdminSlider.class.php');
        $data['post_cover'] = (isset($_FILES['post_cover']['tmp_name']) ? $_FILES['post_cover'] : '');
        $Post = new AdminSlider;
        $Post->ExeCreate($data);
        if ($Post->getResult()):
            $json['erro'] = true;
            $json['reset'] = true;
            $json['notify'] = $trigger->notify($Post->getError()[0], $Post->getError()[1], $Post->getError()[2], $Post->getError()[3]);
        else:
            $json['erro'] = false;
            $json['reset'] = false;
            $json['notify'] = $trigger->notify($Post->getError()[0], $Post->getError()[1], $Post->getError()[2], $Post->getError()[3]);
        endif;
        echo json_encode($json);
        break;
    case 'slider-delete':
        require('./Class/AdminSlider.class.php');
        $Post = new AdminSlider;
        $Post->ExeDelete($data['codigo']);
        if ($Post->getResult()):
            $json['row'] = true;
            $json['erro'] = true;
            $json['reset'] = true;
            $json['notify'] = $trigger->notify($Post->getError()[0], $Post->getError()[1], $Post->getError()[2], $Post->getError()[3]);
        else:
            $json['row'] = false;
            $json['erro'] = false;
            $json['reset'] = false;
            $json['notify'] = $trigger->notify($Post->getError()[0], $Post->getError()[1], $Post->getError()[2], $Post->getError()[3]);
        endif;
        echo json_encode($json);
        break;
    case 'slider-update':
        require('./Class/AdminSlider.class.php');
        $data['post_cover'] = (isset($_FILES['post_cover']['tmp_name']) ? $_FILES['post_cover'] : 'null');
        $Post = new AdminSlider;
        $IdPost = $data['post_id'];
        unset($data['post_id']);
        $Post->ExeUpdate($IdPost, $data);
        if ($Post->getResult()):
            $json['erro'] = true;
            $json['reset'] = false;
            $json['notify'] = $trigger->notify($Post->getError()[0], $Post->getError()[1], $Post->getError()[2], $Post->getError()[3]);
        else:
            $json['erro'] = false;
            $json['reset'] = true;
            $json['notify'] = $trigger->notify($Post->getError()[0], $Post->getError()[1], $Post->getError()[2], $Post->getError()[3]);
        endif;
        echo json_encode($json);
        break;
    case 'client':
        require('./Class/AdminClient.class.php');
        $Post = new AdminClient;
        $Post->ExeCreate($data);
        if ($Post->getResult()):
            $json['erro'] = true;
            $json['reset'] = true;
            $json['notify'] = $trigger->notify($Post->getError()[0], $Post->getError()[1], $Post->getError()[2], $Post->getError()[3]);
        else:
            $json['erro'] = false;
            $json['reset'] = false;
            $json['notify'] = $trigger->notify($Post->getError()[0], $Post->getError()[1], $Post->getError()[2], $Post->getError()[3]);
        endif;
        echo json_encode($json);
        break;
    case 'client-delete':
        require('./Class/AdminClient.class.php');
        $Post = new AdminClient;
        $Post->ExeDelete($data['codigo']);
        if ($Post->getResult()):
            $json['row'] = true;
            $json['erro'] = true;
            $json['reset'] = true;
            $json['notify'] = $trigger->notify($Post->getError()[0], $Post->getError()[1], $Post->getError()[2], $Post->getError()[3]);
        else:
            $json['row'] = false;
            $json['erro'] = false;
            $json['reset'] = false;
            $json['notify'] = $trigger->notify($Post->getError()[0], $Post->getError()[1], $Post->getError()[2], $Post->getError()[3]);
        endif;
        echo json_encode($json);
        break;
    case 'client-update':
        require('./Class/AdminClient.class.php');
        $Post = new AdminClient;
        $IdPost = $data['id_cli'];
        unset($data['id_cli']);
        $Post->ExeUpdate($IdPost, $data);
        if ($Post->getResult()):
            $json['erro'] = true;
            $json['reset'] = false;
            $json['notify'] = $trigger->notify($Post->getError()[0], $Post->getError()[1], $Post->getError()[2], $Post->getError()[3]);
        else:
            $json['erro'] = false;
            $json['reset'] = true;
            $json['notify'] = $trigger->notify($Post->getError()[0], $Post->getError()[1], $Post->getError()[2], $Post->getError()[3]);
        endif;
        echo json_encode($json);
        break;
    case 'process':
        require('./Class/AdminProcess.class.php');
        $Post = new AdminProcess;
        $Post->ExeCreate($data);
        if ($Post->getResult()):
            $json['erro'] = true;
            $json['reset'] = true;
            $json['notify'] = $trigger->notify($Post->getError()[0], $Post->getError()[1], $Post->getError()[2], $Post->getError()[3]);
        else:
            $json['erro'] = false;
            $json['reset'] = false;
            $json['notify'] = $trigger->notify($Post->getError()[0], $Post->getError()[1], $Post->getError()[2], $Post->getError()[3]);
        endif;
        echo json_encode($json);
        break;
    case 'process-delete':
        require('./Class/AdminProcess.class.php');
        $Post = new AdminProcess;
        $Post->ExeDelete($data['codigo']);
        if ($Post->getResult()):
            $json['row'] = true;
            $json['erro'] = true;
            $json['reset'] = true;
            $json['notify'] = $trigger->notify($Post->getError()[0], $Post->getError()[1], $Post->getError()[2], $Post->getError()[3]);
        else:
            $json['row'] = false;
            $json['erro'] = false;
            $json['reset'] = false;
            $json['notify'] = $trigger->notify($Post->getError()[0], $Post->getError()[1], $Post->getError()[2], $Post->getError()[3]);
        endif;
        echo json_encode($json);
        break;
    case 'process-update':
        require('./Class/AdminProcess.class.php');
        $Post = new AdminProcess;
        $IdPost = $data['id_proc'];
        unset($data['id_proc']);
        $Post->ExeUpdate($IdPost, $data);
        if ($Post->getResult()):
            $json['erro'] = true;
            $json['reset'] = false;
            $json['notify'] = $trigger->notify($Post->getError()[0], $Post->getError()[1], $Post->getError()[2], $Post->getError()[3]);
        else:
            $json['erro'] = false;
            $json['reset'] = true;
            $json['notify'] = $trigger->notify($Post->getError()[0], $Post->getError()[1], $Post->getError()[2], $Post->getError()[3]);
        endif;
        echo json_encode($json);
        break;
    case 'ctrec':
        require('./Class/AdminCtrec.class.php');
        $Post = new AdminCtrec;
        $Post->ExeCreate($data);
        if ($Post->getResult()):
            $json['erro'] = true;
            $json['reloadtime'] = true;
            $json['reset'] = true;
            $json['notify'] = $trigger->notify($Post->getError()[0], $Post->getError()[1], $Post->getError()[2], $Post->getError()[3]);
        else:
            $json['erro'] = false;
            $json['reset'] = false;
            $json['notify'] = $trigger->notify($Post->getError()[0], $Post->getError()[1], $Post->getError()[2], $Post->getError()[3]);
        endif;
        echo json_encode($json);
        break;
    case 'area':
        require('./Class/AdminArea.class.php');
        $data['area_icon'] = (isset($_FILES['area_icon']['tmp_name']) ? $_FILES['area_icon'] : '');
//        var_dump($data);
        $Post = new AdminArea;
        $Post->ExeCreate($data);
        if ($Post->getResult()):
            $json['erro'] = true;
            $json['reset'] = true;
            $json['notify'] = $trigger->notify($Post->getError()[0], $Post->getError()[1], $Post->getError()[2], $Post->getError()[3]);
        else:
            $json['erro'] = false;
            $json['reset'] = false;
            $json['notify'] = $trigger->notify($Post->getError()[0], $Post->getError()[1], $Post->getError()[2], $Post->getError()[3]);
        endif;
        echo json_encode($json);
        break;
    case 'area-delete':
        require('./Class/AdminArea.class.php');
        $Post = new AdminArea;
        $Post->ExeDelete($data['codigo']);
        if ($Post->getResult()):
            $json['row'] = true;
            $json['erro'] = true;
            $json['reset'] = true;
            $json['notify'] = $trigger->notify($Post->getError()[0], $Post->getError()[1], $Post->getError()[2], $Post->getError()[3]);
        else:
            $json['row'] = false;
            $json['erro'] = false;
            $json['reset'] = false;
            $json['notify'] = $trigger->notify($Post->getError()[0], $Post->getError()[1], $Post->getError()[2], $Post->getError()[3]);
        endif;
        echo json_encode($json);
        break;
    case 'area-update':
        require('./Class/AdminArea.class.php');
        $data['area_icon'] = (isset($_FILES['area_icon']['tmp_name']) ? $_FILES['area_icon'] : 'null');
        $Post = new AdminArea;
        $IdPost = $data['area_id'];
        unset($data['area_id']);
        $Post->ExeUpdate($IdPost, $data);
        if ($Post->getResult()):
            $json['erro'] = true;
            $json['reset'] = false;
            $json['notify'] = $trigger->notify($Post->getError()[0], $Post->getError()[1], $Post->getError()[2], $Post->getError()[3]);
        else:
            $json['erro'] = false;
            $json['reset'] = true;
            $json['notify'] = $trigger->notify($Post->getError()[0], $Post->getError()[1], $Post->getError()[2], $Post->getError()[3]);
        endif;
        echo json_encode($json);
        break;
    case 'team':
        require('./Class/AdminTeam.class.php');
        $data['team_cover'] = (isset($_FILES['team_cover']['tmp_name']) ? $_FILES['team_cover'] : '');
        $Post = new AdminTeam;
        $Post->ExeCreate($data);
        if ($Post->getResult()):
            $json['erro'] = true;
            $json['reset'] = true;
            $json['notify'] = $trigger->notify($Post->getError()[0], $Post->getError()[1], $Post->getError()[2], $Post->getError()[3]);
        else:
            $json['erro'] = false;
            $json['reset'] = false;
            $json['notify'] = $trigger->notify($Post->getError()[0], $Post->getError()[1], $Post->getError()[2], $Post->getError()[3]);
        endif;
        echo json_encode($json);
        break;
    case 'team-delete':
        require('./Class/AdminTeam.class.php');
        $Post = new AdminTeam;
        $Post->ExeDelete($data['codigo']);
        if ($Post->getResult()):
            $json['row'] = true;
            $json['erro'] = true;
            $json['reset'] = true;
            $json['notify'] = $trigger->notify($Post->getError()[0], $Post->getError()[1], $Post->getError()[2], $Post->getError()[3]);
        else:
            $json['row'] = false;
            $json['erro'] = false;
            $json['reset'] = false;
            $json['notify'] = $trigger->notify($Post->getError()[0], $Post->getError()[1], $Post->getError()[2], $Post->getError()[3]);
        endif;
        echo json_encode($json);
        break;
    case 'team-update':
        require('./Class/AdminTeam.class.php');
        $data['team_cover'] = (isset($_FILES['team_cover']['tmp_name']) ? $_FILES['team_cover'] : 'null');
        $Post = new AdminTeam;
        $IdPost = $data['team_id'];
        unset($data['team_id']);
        $Post->ExeUpdate($IdPost, $data);
        if ($Post->getResult()):
            $json['erro'] = true;
            $json['reset'] = false;
            $json['notify'] = $trigger->notify($Post->getError()[0], $Post->getError()[1], $Post->getError()[2], $Post->getError()[3]);
        else:
            $json['erro'] = false;
            $json['reset'] = true;
            $json['notify'] = $trigger->notify($Post->getError()[0], $Post->getError()[1], $Post->getError()[2], $Post->getError()[3]);
        endif;
        echo json_encode($json);
        break;

    case 'ebook':
        require('./Class/AdminEbook.class.php');
        require('./Class/AdminNewsletter.class.php');
        $data['ebook_popup'] = (isset($_FILES['ebook_popup']['tmp_name']) ? $_FILES['ebook_popup'] : '');
        $data['ebook_cover'] = (isset($_FILES['ebook_cover']['tmp_name']) ? $_FILES['ebook_cover'] : '');
        $data['ebook_pdf'] = (isset($_FILES['ebook_pdf']['tmp_name']) ? $_FILES['ebook_pdf'] : '');

//        var_dump($data);

        $Post = new AdminEbook;
        $Post->ExeCreate($data);
        if ($Post->getResult()):
            $json['erro'] = true;
            $json['reset'] = true;
            $json['notify'] = $trigger->notify($Post->getError()[0], $Post->getError()[1], $Post->getError()[2], $Post->getError()[3]);
        else:
            $json['erro'] = false;
            $json['reset'] = false;
            $json['notify'] = $trigger->notify($Post->getError()[0], $Post->getError()[1], $Post->getError()[2], $Post->getError()[3]);
        endif;
        echo json_encode($json);
        break;
    case 'ebook-delete':
        require('./Class/AdminEbook.class.php');
        $Post = new AdminEbook;
        $Post->ExeDelete($data['codigo']);
        if ($Post->getResult()):
            $json['row'] = true;
            $json['erro'] = true;
            $json['reset'] = true;
            $json['notify'] = $trigger->notify($Post->getError()[0], $Post->getError()[1], $Post->getError()[2], $Post->getError()[3]);
        else:
            $json['row'] = false;
            $json['erro'] = false;
            $json['reset'] = false;
            $json['notify'] = $trigger->notify($Post->getError()[0], $Post->getError()[1], $Post->getError()[2], $Post->getError()[3]);
        endif;
        echo json_encode($json);
        break;
    case 'ebook-update':
        require('./Class/AdminEbook.class.php');
        require('./Class/AdminNewsletter.class.php');
        $data['ebook_popup'] = (isset($_FILES['ebook_popup']['tmp_name']) ? $_FILES['ebook_popup'] : 'null');
        $data['ebook_cover'] = (isset($_FILES['ebook_cover']['tmp_name']) ? $_FILES['ebook_cover'] : 'null');
        $data['ebook_pdf'] = (isset($_FILES['ebook_pdf']['tmp_name']) ? $_FILES['ebook_pdf'] : 'null');
        $Post = new AdminEbook;
        $IdPost = $data['ebook_id'];
        unset($data['ebook_id']);
        $Post->ExeUpdate($IdPost, $data);
        if ($Post->getResult()):
            $json['erro'] = true;
            $json['reset'] = false;
            $json['notify'] = $trigger->notify($Post->getError()[0], $Post->getError()[1], $Post->getError()[2], $Post->getError()[3]);
        else:
            $json['erro'] = false;
            $json['reset'] = true;
            $json['notify'] = $trigger->notify($Post->getError()[0], $Post->getError()[1], $Post->getError()[2], $Post->getError()[3]);
        endif;
        echo json_encode($json);
        break;
    case 'services':
        require('./Class/AdminServices.class.php');
        $data['serv_img'] = (isset($_FILES['serv_img']['tmp_name']) ? $_FILES['serv_img'] : '');
        $Service = new AdminServices;
        $Service->ExeCreate($data);
        if ($Service->getResult()):
            $json['erro'] = true;
            $json['reset'] = true;
            $json['notify'] = $trigger->notify($Service->getError()[0], $Service->getError()[1], $Service->getError()[2], $Service->getError()[3]);
        else:
            $json['erro'] = false;
            $json['reset'] = false;
            $json['notify'] = $trigger->notify($Service->getError()[0], $Service->getError()[1], $Service->getError()[2], $Service->getError()[3]);
        endif;
        echo json_encode($json);
        break;
    case 'services-update':
        require('./Class/AdminServices.class.php');
        $data['serv_img'] = (isset($_FILES['serv_img']['tmp_name']) ? $_FILES['serv_img'] : 'null');
        $Service = new AdminServices;
        $IdPost = $data['serv_id'];
        unset($data['serv_id']);
        $Service->ExeUpdate($IdPost, $data);
        if ($Service->getResult()):
            $json['erro'] = true;
            $json['reset'] = false;
            $json['notify'] = $trigger->notify($Service->getError()[0], $Service->getError()[1], $Service->getError()[2], $Service->getError()[3]);
        else:
            $json['erro'] = false;
            $json['reset'] = true;
            $json['notify'] = $trigger->notify($Service->getError()[0], $Service->getError()[1], $Service->getError()[2], $Service->getError()[3]);
        endif;
        echo json_encode($json);
        break;
    case 'services-delete':
        require('./Class/AdminServices.class.php');
        $data['serv_img'] = (isset($_FILES['serv_img']['tmp_name']) ? $_FILES['serv_img'] : 'null');
        $Service = new AdminServices;
        $Service->ExeDelete($data['codigo']);
        if ($Service->getResult()):
            $json['erro'] = true;
            $json['row'] = true;
            $json['notify'] = $trigger->notify($Service->getError()[0], $Service->getError()[1], $Service->getError()[2], $Service->getError()[3]);
        else:
            $json['erro'] = false;
            $json['row'] = false;
            $json['notify'] = $trigger->notify($Service->getError()[0], $Service->getError()[1], $Service->getError()[2], $Service->getError()[3]);
        endif;
        echo json_encode($json);
        break;
    case 'product':
        require('./Class/AdminProduct.class.php');
        $data['prod_img'] = (isset($_FILES['prod_img']['tmp_name']) ? $_FILES['prod_img'] : '');
        $Product = new AdminProduct;
        $Product->ExeCreate($data);
        if ($Product->getResult()):
            $json['erro'] = true;
            $json['reset'] = true;
            $json['notify'] = $trigger->notify($Product->getError()[0], $Product->getError()[1], $Product->getError()[2], $Product->getError()[3]);
        else:
            $json['erro'] = false;
            $json['reset'] = false;
            $json['notify'] = $trigger->notify($Product->getError()[0], $Product->getError()[1], $Product->getError()[2], $Product->getError()[3]);
        endif;
        echo json_encode($json);
        break;
    case 'product-update':
        require('./Class/AdminProduct.class.php');
        $data['prod_img'] = (isset($_FILES['prod_img']['tmp_name']) ? $_FILES['prod_img'] : 'null');
        $Product = new AdminProduct;
        $IdPost = $data['prod_id'];
        unset($data['prod_id']);
        $Product->ExeUpdate($IdPost, $data);
        if ($Product->getResult()):
            $json['erro'] = true;
            $json['reset'] = false;
            $json['notify'] = $trigger->notify($Product->getError()[0], $Product->getError()[1], $Product->getError()[2], $Product->getError()[3]);
        else:
            $json['erro'] = false;
            $json['reset'] = true;
            $json['notify'] = $trigger->notify($Product->getError()[0], $Product->getError()[1], $Product->getError()[2], $Product->getError()[3]);
        endif;
        echo json_encode($json);
        break;
    case 'product-delete':
        require('./Class/AdminProduct.class.php');
        $Product = new AdminProduct;
        $Product->ExeDelete($data['codigo']);
        if ($Product->getResult()):
            $json['erro'] = true;
            $json['row'] = true;
            $json['notify'] = $trigger->notify($Product->getError()[0], $Product->getError()[1], $Product->getError()[2], $Product->getError()[3]);
        else:
            $json['erro'] = false;
            $json['row'] = false;
            $json['notify'] = $trigger->notify($Product->getError()[0], $Product->getError()[1], $Product->getError()[2], $Product->getError()[3]);
        endif;
        echo json_encode($json);
        break;
    case 'newsletter':
        require('./Class/AdminNewsletter.class.php');
//        var_dump($data);
//        exit();
        $News = new AdminNewsletter;
        if (empty($data['news'])) {
            $News->ExeNews("tb_posts", $data['post_id']);
        } else {
            $News->ExeNews("tb_posts", $data['post_id'], $data['news']);
        }

        if ($News->getResult()):
            $json['erro'] = true;
            $json['reloadtime'] = true;
            $json['reset'] = true;
            $json['notify'] = $trigger->notify($News->getError()[0], $News->getError()[1], $News->getError()[2], $News->getError()[3]);
        else:
            $json['erro'] = false;
            $json['reset'] = false;
            $json['notify'] = $trigger->notify($News->getError()[0], $News->getError()[1], $News->getError()[2], $News->getError()[3]);
        endif;
        echo json_encode($json);
        break;
//    DASHBOARD SISTEMA
    case 'user':
        require('./Class/AdminUser.class.php');
        $User = new AdminUser;
        $User->ExeCreate($data);
        if ($User->getResult()):
            $json['erro'] = true;
            $json['reset'] = true;
            $json['notify'] = $trigger->notify($User->getError()[0], $User->getError()[1], $User->getError()[2], $User->getError()[3]);
        else:
            $json['erro'] = false;
            $json['reset'] = false;
            $json['notify'] = $trigger->notify($User->getError()[0], $User->getError()[1], $User->getError()[2], $User->getError()[3]);
        endif;
        echo json_encode($json);
        break;
    case 'user-update':
        require('./Class/AdminUser.class.php');
        $User = new AdminUser;
        $idUser = $data['user_id'];
        unset($data['user_id']);
        $User->ExeUpdate($idUser, $data);
        if ($User->getResult()):
            $json['erro'] = true;
            $json['reset'] = false;
            $json['notify'] = $trigger->notify($User->getError()[0], $User->getError()[1], $User->getError()[2], $User->getError()[3]);
        else:
            $json['erro'] = false;
            $json['reset'] = true;
            $json['notify'] = $trigger->notify($User->getError()[0], $User->getError()[1], $User->getError()[2], $User->getError()[3]);
        endif;
        echo json_encode($json);
        break;
    case 'user-delete':
        require('./Class/AdminUser.class.php');
        $Id = $data['codigo'];
        unset($data['codigo']);
        $User = new AdminUser;
        $User->ExeDelete($Id);
        if ($User->getResult()):
            $json['row'] = true;
            $json['erro'] = true;
            $json['reset'] = false;
            $json['notify'] = $trigger->notify($User->getError()[0], $User->getError()[1], $User->getError()[2], $User->getError()[3]);
        else:
            $json['erro'] = false;
            $json['row'] = false;
            $json['reset'] = true;
            $json['notify'] = $trigger->notify($User->getError()[0], $User->getError()[1], $User->getError()[2], $User->getError()[3]);
        endif;
        echo json_encode($json);
        break;
    case 'user-profile':
        require('./Class/AdminUser.class.php');
        $User = new AdminUser;
        $User->ExeProfile($_SESSION['userlogin']['user_id'], $data);
        if ($User->getResult()):
            $json['erro'] = true;
            $json['reset'] = false;
            $json['notify'] = $trigger->notify($User->getError()[0], $User->getError()[1], $User->getError()[2], $User->getError()[3]);
        else:
            $json['erro'] = false;
            $json['reset'] = true;
            $json['notify'] = $trigger->notify($User->getError()[0], $User->getError()[1], $User->getError()[2], $User->getError()[3]);
        endif;
        echo json_encode($json);
        break;
    case 'companies':
        require('./Class/AdminCompanies.class.php');
        $Companies = new AdminCompanies;
        $Companies->ExeCreate($data);
        if ($Companies->getResult()):
            $json['erro'] = true;
            $json['reset'] = true;
            $json['notify'] = $trigger->notify($Companies->getError()[0], $Companies->getError()[1], $Companies->getError()[2], $Companies->getError()[3]);
        else:
            $json['erro'] = false;
            $json['reset'] = false;
            $json['notify'] = $trigger->notify($Companies->getError()[0], $Companies->getError()[1], $Companies->getError()[2], $Companies->getError()[3]);
        endif;
        echo json_encode($json);
        break;
    case 'companies-update':
        require('./Class/AdminCompanies.class.php');
        $Id = $data['IdEmpresa'];
        unset($data['IdEmpresa']);
        $Companies = new AdminCompanies;
        $Companies->ExeUpdate($Id, $data);
        if ($Companies->getResult()):
            $json['erro'] = true;
            $json['reset'] = false;
            $json['notify'] = $trigger->notify($Companies->getError()[0], $Companies->getError()[1], $Companies->getError()[2], $Companies->getError()[3]);
        else:
            $json['erro'] = false;
            $json['reset'] = true;
            $json['notify'] = $trigger->notify($Companies->getError()[0], $Companies->getError()[1], $Companies->getError()[2], $Companies->getError()[3]);
        endif;
        echo json_encode($json);
        break;
    case 'companies-delete':
        require('./Class/AdminCompanies.class.php');
        $Id = $data['codigo'];
        unset($data['codigo']);
        $Companies = new AdminCompanies;
        $Companies->ExeDelete($Id);
        if ($Companies->getResult()):
            $json['row'] = true;
            $json['erro'] = true;
            $json['reset'] = false;
            $json['notify'] = $trigger->notify($Companies->getError()[0], $Companies->getError()[1], $Companies->getError()[2], $Companies->getError()[3]);
        else:
            $json['erro'] = false;
            $json['row'] = false;
            $json['reset'] = true;
            $json['notify'] = $trigger->notify($Companies->getError()[0], $Companies->getError()[1], $Companies->getError()[2], $Companies->getError()[3]);
        endif;
        echo json_encode($json);
        break;
    case 'department':
        require('./Class/AdminDepartment.class.php');
        $Department = new AdminDepartment;
        $Department->ExeCreate($data);
        if ($Department->getResult()):
            $json['erro'] = true;
            $json['reset'] = true;
            $json['notify'] = $trigger->notify($Department->getError()[0], $Department->getError()[1], $Department->getError()[2], $Department->getError()[3]);
        else:
            $json['erro'] = false;
            $json['reset'] = false;
            $json['notify'] = $trigger->notify($Department->getError()[0], $Department->getError()[1], $Department->getError()[2], $Department->getError()[3]);
        endif;
        echo json_encode($json);
        break;
    case 'department-update':
        require('./Class/AdminDepartment.class.php');
        $Department = new AdminDepartment;
        $Id = $data['dep_id'];
        unset($data['dep_id']);
        $Department->ExeUpdate($Id, $data);
        if ($Department->getResult()):
            $json['erro'] = true;
            $json['reset'] = false;
            $json['notify'] = $trigger->notify($Department->getError()[0], $Department->getError()[1], $Department->getError()[2], $Department->getError()[3]);
        else:
            $json['erro'] = false;
            $json['reset'] = true;
            $json['notify'] = $trigger->notify($Department->getError()[0], $Department->getError()[1], $Department->getError()[2], $Department->getError()[3]);
        endif;
        echo json_encode($json);
        break;
    case 'department-delete':
        require('./Class/AdminDepartment.class.php');
        $Department = new AdminDepartment;
        $Id = $data['codigo'];
        unset($data['codigo']);
        $Department->ExeDelete($Id);
        if ($Department->getResult()):
            $json['erro'] = true;
            $json['reset'] = true;
            $json['row'] = true;
            $json['notify'] = $trigger->notify($Department->getError()[0], $Department->getError()[1], $Department->getError()[2], $Department->getError()[3]);
        else:
            $json['erro'] = false;
            $json['reset'] = false;
            $json['notify'] = $trigger->notify($Department->getError()[0], $Department->getError()[1], $Department->getError()[2], $Department->getError()[3]);
        endif;
        echo json_encode($json);
        break;
    case 'servicos':
        require('./Class/AdminServicos.class.php');
        $Servicos = new AdminServicos;
        $Servicos->ExeCreate($data);
        if ($Servicos->getResult()):
            $json['erro'] = true;
            $json['reset'] = true;
            $json['notify'] = $trigger->notify($Servicos->getError()[0], $Servicos->getError()[1], $Servicos->getError()[2], $Servicos->getError()[3]);
        else:
            $json['erro'] = false;
            $json['reset'] = false;
            $json['notify'] = $trigger->notify($Servicos->getError()[0], $Servicos->getError()[1], $Servicos->getError()[2], $Servicos->getError()[3]);
        endif;
        echo json_encode($json);
        break;
    case 'servicos-update':
        require('./Class/AdminServicos.class.php');
        $Servicos = new AdminServicos;
        $Id = $data['IdServico'];
        unset($data['IdServico']);
        $Servicos->ExeUpdate($Id, $data);
        if ($Servicos->getResult()):
            $json['erro'] = true;
            $json['reset'] = false;
            $json['notify'] = $trigger->notify($Servicos->getError()[0], $Servicos->getError()[1], $Servicos->getError()[2], $Servicos->getError()[3]);
        else:
            $json['erro'] = false;
            $json['reset'] = true;
            $json['notify'] = $trigger->notify($Servicos->getError()[0], $Servicos->getError()[1], $Servicos->getError()[2], $Servicos->getError()[3]);
        endif;
        echo json_encode($json);
        break;
    case 'servicos-delete':
        require('./Class/AdminServicos.class.php');
        $Servicos = new AdminServicos;
        $Id = $data['codigo'];
        unset($data['codigo']);
        $Servicos->ExeDelete($Id);
        if ($Servicos->getResult()):
            $json['row'] = true;
            $json['erro'] = true;
            $json['reset'] = false;
            $json['notify'] = $trigger->notify($Servicos->getError()[0], $Servicos->getError()[1], $Servicos->getError()[2], $Servicos->getError()[3]);
        else:
            $json['row'] = false;
            $json['erro'] = false;
            $json['reset'] = true;
            $json['notify'] = $trigger->notify($Servicos->getError()[0], $Servicos->getError()[1], $Servicos->getError()[2], $Servicos->getError()[3]);
        endif;
        echo json_encode($json);
        break;
    case 'reports':
        require('./Class/AdminReports.class.php');
        $Reports = new AdminReports;
        $Reports->ExeCreate($data);
        if ($Reports->getResult()):
            $json['erro'] = true;
            $json['reset'] = true;
            $json['notify'] = $trigger->notify($Reports->getError()[0], $Reports->getError()[1], $Reports->getError()[2], $Reports->getError()[3]);
        else:
            $json['erro'] = false;
            $json['reset'] = false;
            $json['notify'] = $trigger->notify($Reports->getError()[0], $Reports->getError()[1], $Reports->getError()[2], $Reports->getError()[3]);
        endif;
        echo json_encode($json);
        break;
    case 'reports-update':
        require('./Class/AdminReports.class.php');
        $Reports = new AdminReports;
        $Id = $data['IdRelatorio'];
        unset($data['IdRelatorio']);
        $Reports->ExeUpdate($Id, $data);
        if ($Reports->getResult()):
            $json['training'] = true;
            $json['erro'] = true;
            $json['reset'] = false;
            $json['notify'] = $trigger->notify($Reports->getError()[0], $Reports->getError()[1], $Reports->getError()[2], $Reports->getError()[3]);
        else:
            $json['training'] = false;
            $json['erro'] = false;
            $json['reset'] = true;
            $json['notify'] = $trigger->notify($Reports->getError()[0], $Reports->getError()[1], $Reports->getError()[2], $Reports->getError()[3]);
        endif;
        echo json_encode($json);
        break;
    case 'reports-delete':
        require('./Class/AdminReports.class.php');
        $Reports = new AdminReports;
        $Id = $data['codigo'];
        unset($data['codigo']);
        $Reports->ExeDelete($Id);
        if ($Reports->getResult()):
            $json['row'] = true;
            $json['erro'] = true;
            $json['reset'] = false;
            $json['notify'] = $trigger->notify($Reports->getError()[0], $Reports->getError()[1], $Reports->getError()[2], $Reports->getError()[3]);
        else:
            $json['row'] = false;
            $json['erro'] = false;
            $json['reset'] = true;
            $json['notify'] = $trigger->notify($Reports->getError()[0], $Reports->getError()[1], $Reports->getError()[2], $Reports->getError()[3]);
        endif;
        echo json_encode($json);
        break;
    case 'training-delete':
        require('./Class/AdminReports.class.php');
        $Reports = new AdminReports;
        $Id = $data['codigo'];
        unset($data['codigo']);
        $Reports->ExeDeleteTrain($Id);
        if ($Reports->getResult()):
            $json['grid'] = true;
            $json['erro'] = true;
            $json['reset'] = false;
            $json['notify'] = $trigger->notify($Reports->getError()[0], $Reports->getError()[1], $Reports->getError()[2], $Reports->getError()[3]);
        else:
            $json['grid'] = true;
            $json['erro'] = false;
            $json['reset'] = true;
            $json['notify'] = $trigger->notify($Reports->getError()[0], $Reports->getError()[1], $Reports->getError()[2], $Reports->getError()[3]);
        endif;
        echo json_encode($json);
        break;
    case 'upload':
        $data['audio_file'] = (isset($_FILES['audio_file']['tmp_name']) ? $_FILES['audio_file'] : null);
        require('./Class/AdminUpload.class.php');


        $Upload = new AdminUpload;
        $Upload->ExeCreate($data);
//        var_dump($Upload);
//        exit;

        if ($Upload->getResult()):
            $json['erro'] = true;
            $json['reset'] = true;
            $json['notify'] = $trigger->notify($Upload->getError()[0], $Upload->getError()[1], $Upload->getError()[2], $Upload->getError()[3]);
        else:
            $json['erro'] = false;
            $json['reset'] = false;
            $json['notify'] = $trigger->notify($Upload->getError()[0], $Upload->getError()[1], $Upload->getError()[2], $Upload->getError()[3]);
        endif;
        echo json_encode($json);
        break;
    case 'upload-update':
        $data['audio_file'] = (isset($_FILES['audio_file']['tmp_name']) ? $_FILES['audio_file'] : 'null');
        require('./Class/AdminUpload.class.php');
        $Upload = new AdminUpload;
        $Upload->ExeUpdate($data);
        if ($Upload->getResult()):
            $json['erro'] = true;
            $json['reset'] = false;
            $json['notify'] = $trigger->notify($Upload->getError()[0], $Upload->getError()[1], $Upload->getError()[2], $Upload->getError()[3]);
        else:
            $json['erro'] = false;
            $json['reset'] = true;
            $json['notify'] = $trigger->notify($Upload->getError()[0], $Upload->getError()[1], $Upload->getError()[2], $Upload->getError()[3]);
        endif;
        echo json_encode($json);
        break;
    case 'upload-delete':
        require('./Class/AdminUpload.class.php');

//        var_dump($data);
//        exit();
        $Upload = new AdminUpload;
        $Name = $data['codigo'];
        unset($data['codigo']);

        $Upload->ExeDelete($Name);
        if ($Upload->getResult()):
            $json['erro'] = true;
            $json['row'] = true;
            $json['notify'] = $trigger->notify($Upload->getError()[0], $Upload->getError()[1], $Upload->getError()[2], $Upload->getError()[3]);
        else:
            $json['row'] = false;
            $json['erro'] = false;
            $json['notify'] = $trigger->notify($Upload->getError()[0], $Upload->getError()[1], $Upload->getError()[2], $Upload->getError()[3]);
        endif;
        echo json_encode($json);
        break;
    case 'tickets':
        $data['file'] = (isset($_FILES['file']['tmp_name']) ? $_FILES['file'] : 'null');
        require('./Class/AdminTickets.class.php');
        $Ticket = new AdminTickets;
        $Ticket->ExeCreate($data);
        if ($Ticket->getResult()):
            $json['erro'] = true;
            $json['reset'] = true;
            $json['notify'] = $trigger->notify($Ticket->getError()[0], $Ticket->getError()[1], $Ticket->getError()[2], $Ticket->getError()[3]);
        else:
            $json['erro'] = false;
            $json['reset'] = false;
            $json['notify'] = $trigger->notify($Ticket->getError()[0], $Ticket->getError()[1], $Ticket->getError()[2], $Ticket->getError()[3]);
        endif;
        echo json_encode($json);
        break;
    case 'tickets-active':
        require('./Class/AdminTickets.class.php');
        $Ticket = new AdminTickets;
        $Ticket->ExeActive($data['codigo']);
        if ($Ticket->getResult()):
            $json['erro'] = true;
            $json['href'] = $Ticket->getResult();
            $json['notify'] = $trigger->notify($Ticket->getError()[0], $Ticket->getError()[1], $Ticket->getError()[2], $Ticket->getError()[3]);
        else:
            $json['erro'] = false;
            $json['href'] = false;
            $json['notify'] = $trigger->notify($Ticket->getError()[0], $Ticket->getError()[1], $Ticket->getError()[2], $Ticket->getError()[3]);
        endif;
        echo json_encode($json);
        break;
    case 'tickets-msg':
        $data['file'] = (isset($_FILES['file']['tmp_name']) ? $_FILES['file'] : 'null');
        require('./Class/AdminTickets.class.php');
        $Ticket = new AdminTickets;

        $Id = $data['id'];
        unset($data['id']);
        $Ticket->ExeMsg($Id, $data);

        if ($Ticket->getResult()):
            $json['erro'] = true;
            $json['reset'] = true;
            $json['notify'] = $trigger->notify($Ticket->getError()[0], $Ticket->getError()[1], $Ticket->getError()[2], $Ticket->getError()[3]);
        else:
            $json['erro'] = false;
            $json['reset'] = false;
            $json['notify'] = $trigger->notify($Ticket->getError()[0], $Ticket->getError()[1], $Ticket->getError()[2], $Ticket->getError()[3]);
        endif;
        echo json_encode($json);
        break;
    case 'tickets-finalize':
        require('./Class/AdminTickets.class.php');
        $Ticket = new AdminTickets;
        $Ticket->ExeFinalize($data['codigo']);
        if ($Ticket->getResult()):
            $json['erro'] = true;
            $json['ticket'] = true;
            $json['notify'] = $trigger->notify($Ticket->getError()[0], $Ticket->getError()[1], $Ticket->getError()[2], $Ticket->getError()[3]);
        else:
            $json['erro'] = false;
            $json['ticket'] = false;
            $json['notify'] = $trigger->notify($Ticket->getError()[0], $Ticket->getError()[1], $Ticket->getError()[2], $Ticket->getError()[3]);
        endif;
        echo json_encode($json);
        break;
endswitch;


if ($action === 'search-notification'):
    if ($_SESSION['userlogin']['user_level'] >= 3):
        $Read = new Read;
        $Read->FullRead("SELECT * FROM n_notificacoes WHERE destiny_name = 'ADM' ORDER BY date_not DESC");
        if ($Read->getRowCount()):
            echo "<div class='content-ul'>";
            foreach ($Read->getResult() as $v):
                extract($v);
                $style = ($status_not === 'NL' ? "color: #000;font-style: oblique;" : "");
                $type = ($type_num_not == 1 ? "t" : "e");
                echo "<li class='li-not'><a style='{$style}' href='?exe=notificacoes/escritorio&n={$id_not}-{$type}'>{$type_not}</a><small>{$date_not}</small></li>";
            endforeach;
            echo "</div>";
        else:

        endif;
    else:
        echo '<center>Notificação</center>';
    endif;
endif;