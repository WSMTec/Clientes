<?php

ob_start();
session_start();
include '../_app/Config.inc.php';

$action = filter_input(INPUT_GET, 'action', FILTER_DEFAULT);
$data = filter_input_array(INPUT_POST, FILTER_DEFAULT);


switch ($action):
    case 'visitor_pass':
        $Read = new Read;
        $Create = new Create;
        $Update = new Update();

        $data = array_map('strip_tags', $data);
        $data = array_map('trim', $data);

        if (in_array('', $data)):
            $json['erro'] = false;
            $json['reset'] = false;
            $json['notify'] = "Pfv, preencha todos os campos!";
        else:
            $Read->ExeRead("tb_visitor", "WHERE visitor_email = :mail", "mail={$data['visitor_email']}");
            if (!$Read->getRowCount()):
                $json['erro'] = false;
                $json['reset'] = false;
                $json['notify'] = "Esse e-mail não está cadastrado em nosso sistema!";
            else:
                $Id = $Read->getResult()[0]['visitor_id'];
                $pass = Check::geraSenha(4, false, true, false);
                $data['visitor_password'] = md5($pass);
//                $data['visitor_date'] = date("Y-m-d H:i");
                $Update->ExeUpdate("tb_visitor", $data, "WHERE visitor_id = :id", "id={$Id}");
                if ($Update->getResult()):
//                    if (!session_id()):
//                        session_start();
//                    endif;
//                    $_SESSION['visitorlogin'] = array("visitor_id" => $Create->getResult(), "visitor_name" => $data['visitor_name'], "visitor_email" => $data['visitor_email']);


                    $Contato['Assunto'] = "Dr. Antonio Luiz Mazzilli";
                    $Contato['Mensagem'] = "Parabéns, uma senha foi gerada! <br>e-mail: {$data['visitor_email']} <br>senha: {$pass}";
                    $Contato['RemetenteNome'] = "Dr. Antonio Luiz Mazzilli";
                    $Contato['RemetenteEmail'] = "contato@advocaciadeempresas.com.br";
                    $Contato['DestinoNome'] = "{$Read->getResult()[0]['visitor_name']}";
                    $Contato['DestinoEmail'] = $data['visitor_email'];

                    $SendMail = new EmailContato();
                    $SendMail->Enviar($Contato);


                    $json['erro'] = true;
                    $json['reset'] = true;
                    $json['notify'] = "Pronto! Uma senha foi gerada, favor verifique seu email, <a href=''>Atualizar</a>.";
         
                else:
                    $json['erro'] = false;
                    $json['reset'] = false;
                    $json['notify'] = "Desculpe, erro ao cadastrar.";
                endif;
            endif;

            $json['erro'] = true;
            $json['reset'] = true;
            $json['notify'] = "Pronto! Uma senha foi gerada, favor verifique seu email, <a href=''>Atualizar</a>.";
            return;
        endif;
        echo json_encode($json);
        break;
    case 'visitor':
        $Read = new Read;
        $Create = new Create;

        $data = array_map('strip_tags', $data);
        $data = array_map('trim', $data);

//        var_dump($data);
//        exit();

        if (in_array('', $data)):
            $json['erro'] = false;
            $json['reset'] = false;
            $json['notify'] = "Pfv, preencha todos os campos!";
        else:
            if (isset($data['visitor_type'])):
                $Read->ExeRead("tb_newsletter", "WHERE new_email = :mail", "mail={$data['visitor_email']}");
                if (!$Read->getRowCount()):
                    $Create->ExeCreate("tb_newsletter", array(
                        "new_name" => $data['visitor_name'],
                        "new_email" => $data['visitor_email'],
                        "new_phone" => $data['visitor_phone'],
                        "new_type" => $data['visitor_type']
                    ));
                endif;
            endif;
            $Read->ExeRead("tb_visitor", "WHERE visitor_email = :mail", "mail={$data['visitor_email']}");
            if (!$Read->getRowCount()):
                $pass = $data['visitor_password'];
                $data['visitor_password'] = md5($data['visitor_password']);
                $data['visitor_date'] = date("Y-m-d H:i");
                $Create->ExeCreate("tb_visitor", $data);
                if ($Create->getResult()):
                    if (!session_id()):
                        session_start();
                    endif;

                    $_SESSION['visitorlogin'] = array("visitor_id" => $Create->getResult(), "visitor_name" => $data['visitor_name'], "visitor_email" => $data['visitor_email']);


                    $Contato['Assunto'] = "Dr. Antonio Luiz Mazzilli";
                    $Contato['Mensagem'] = "Parabéns, você está cadastrado em nosso site! <br>e-mail: {$data['visitor_email']} <br>senha: {$pass}";
                    $Contato['RemetenteNome'] = "Dr. Antonio Luiz Mazzilli";
                    $Contato['RemetenteEmail'] = "contato@advocaciadeempresas.com.br";
                    $Contato['DestinoNome'] = "{$data['visitor_name']}";
                    $Contato['DestinoEmail'] = $data['visitor_email'];

                    $SendMail = new EmailContato();
                    $SendMail->Enviar($Contato);


                    $json['erro'] = true;
                    $json['reset'] = true;
                    $json['notify'] = "Pronto! Verifique seu email, <a href=''>Atualizar</a>.";
                else:
                    $json['erro'] = false;
                    $json['reset'] = false;
                    $json['notify'] = "Desculpe, erro ao cadastrar.";
                endif;
            else:
                $json['erro'] = true;
                $json['reset'] = true;
                $json['notify'] = "Você já está cadastrado, faça o login.";
            endif;
        endif;
        echo json_encode($json);
        break;

    case 'visitor_login':
        $Read = new Read;
        $Create = new Create;

        $data = array_map('strip_tags', $data);
        $data = array_map('trim', $data);

        if (in_array('', $data)):
            $json['erro'] = false;
            $json['reset'] = false;
            $json['notify'] = "Pfv, preencha todos os campos para entrar!";
        else:
            if (!$data['visitor_email'] || !$data['visitor_password'] || !Check::Email($data['visitor_email'])):
                $json['erro'] = false;
                $json['reset'] = false;
                $json['notify'] = "Informe seu E-mail e senha para efetuar o login!";
            else:
                $data['visitor_password'] = md5($data['visitor_password']);
                $Read->ExeRead("tb_visitor", "WHERE visitor_email = :e AND visitor_password = :p", "e={$data['visitor_email']}&p={$data['visitor_password']}");
                if (!$Read->getResult()):
                    $json['erro'] = false;
                    $json['reset'] = false;
                    $json['notify'] = "Os dados informados não são compatíveis!";
                else:
                    if (!session_id()):
                        session_start();
                    endif;
                    $_SESSION['visitorlogin'] = array(
                        "visitor_id" => $Read->getResult()[0]['visitor_id'],
                        "visitor_name" => $Read->getResult()[0]['visitor_name'],
                        "visitor_email" => $Read->getResult()[0]['visitor_email']);
                    $json['erro'] = true;
                    $json['reset'] = true;
                    $json['reload'] = true;
                    $json['notify'] = "Os dados informados são compatíveis! <a href=''>Atualizar</a>.";
                endif;
            endif;
        endif;
        echo json_encode($json);
        break;
    case 'comment':
//        var_dump($data);
//        exit();
        $Read = new Read;
        $Create = new Create;
        if (in_array('', $data)):
            $json['erro'] = false;
            $json['reset'] = false;
            $json['notify'] = "Pfv, preencha todos os campos!";
        else:
            $data = array_map('strip_tags', $data);
            $data = array_map('trim', $data);
            $data['comment_date'] = date("Y-m-d H:i");
            $data['comment_status'] = "A";


            $Create->ExeCreate("tb_comment", $data);
            $json['erro'] = true;
            $json['reset'] = true;
            $json['com'] = 'ok';
            $json['notify'] = "Pronto! Seu comentário será postado.";
        endif;

        echo json_encode($json);
        break;

    case 'like':
    case 'unlike':
//        var_dump($_SESSION['visitorlogin']);
        $Read = new Read;
        $Update = new Update;
        $Create = new Create;
        $Delete = new Delete;

        $data = array_map('strip_tags', $data);
        $data = array_map('trim', $data);
        if ($data['type'] == '1') {
            $Read->ExeRead("tb_posts", "WHERE post_id = :i", "i={$data['postid']}");
            extract($Read->getResult()[0]);

            $ArrUpdate = ['post_like' => $post_like + 1];
            $Update->ExeUpdate("tb_posts", $ArrUpdate, "WHERE post_id = :postid", "postid={$post_id}");

            $Create->ExeCreate("tb_like", array("like_post" => $post_id, "like_visitor" => $_SESSION['visitorlogin']['visitor_id'], "like_date" => date("Y-m-d H:i")));

            $json['erro'] = true;
            $json['number'] = $ArrUpdate['post_like'];
            $json['type'] = "unlike_{$data['postid']}";
            $json['notify'] = "like_{$data['postid']}";
        } else {
            $Read->ExeRead("tb_posts", "WHERE post_id = :i", "i={$data['postid']}");
            extract($Read->getResult()[0]);

            $ArrUpdate = ['post_like' => $post_like - 1];
            $Update->ExeUpdate("tb_posts", $ArrUpdate, "WHERE post_id = :postid", "postid={$post_id}");

            $Delete->ExeDelete("tb_like", "WHERE like_post = :p AND like_visitor = :v", "p={$post_id}&v={$_SESSION['visitorlogin']['visitor_id']}");

            $json['erro'] = false;
            $json['number'] = $ArrUpdate['post_like'];
            $json['type'] = "like_{$data['postid']}";
            $json['notify'] = "unlike_{$data['postid']}";
        }
        echo json_encode($json);
        break;

    case 'newsletter':
        $Read = new Read;
        $Create = new Create;

        array_map('strip_tags', $data);
        array_map('trim', $data);

        if (in_array('', $data)):
            $json['erro'] = false;
            $json['reset'] = false;
            $json['notify'] = "Pfv, preencha todos os campos!";
        else:
            if (!isset($data['new_type'])):
                $data['new_type'] = "news";
            endif;

            $Read->ExeRead("tb_newsletter", "WHERE new_email = :mail", "mail={$data['new_email']}");
            if (!$Read->getRowCount()):
                $Create->ExeCreate("tb_newsletter", array(
                    "new_name" => $data['new_name'],
                    "new_email" => $data['new_email'],
                    "new_phone" => (isset($data['new_phone']) ? $data['new_phone'] : null),
                    "new_type" => $data['new_type']
                ));
            endif;

            $json['erro'] = true;
            $json['reset'] = true;
            $json['notify'] = "Pronto! você foi cadastrado em nossa newsletter.";
        endif;
        echo json_encode($json);
        break;
endswitch;
