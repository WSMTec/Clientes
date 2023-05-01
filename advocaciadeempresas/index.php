<?php
ob_start();
require('./_app/Config.inc.php');
$Session = new Session;

//$Modal = false;
//if (!isset($_COOKIE["cookieModal"])) {
//    $Read = new Read;
//    $Read->ExeRead("tb_ebook", "WHERE ebook_status = 1");
//    if ($Read->getRowCount()) {
//        $diasparaexpirar = 1;
//        setcookie('cookieModal', 'ok', (time() + ($diasparaexpirar * 24 * 3600)));
//        $Modal = true;
//    }
//}
$logoff = filter_input(INPUT_GET, 'sair', FILTER_VALIDATE_BOOLEAN);
?>

<!DOCTYPE html>
<html lang="pt-br" itemscope itemtype="https://schema.org/Article">
    <head>
        <meta charset="UTF-8">
        <meta name="mit" content="2017-05-16T12:07:01-03:00+48186">
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <!--[if lt IE 9]>
        <script src"<?= HOME; ?>/_cdn/html5.js"></script>
        <![endif]-->
        <link rel="alternate" type="application/rss+xml" href="<?= HOME; ?>/rss.xml"/>
        <link rel="sitemap" type="application/xml" href="<?= HOME; ?>/sitemap.xml"/>

        <?php
        $Link = new Link;
        $Link->getTags();
        ?>

        <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
        <link rel="stylesheet" href="<?= INCLUDE_PATH; ?>/css/icon/fonticon.css" type="text/css"/>
        <link rel="stylesheet" href="<?= INCLUDE_PATH; ?>/fonts/linearicons/web-font.css" type="text/css"/>
        <link rel="stylesheet" href="<?= INCLUDE_PATH; ?>/css/boot.css">
        <link rel="stylesheet" href="<?= INCLUDE_PATH; ?>/css/style.css?t=<?= time(); ?>">
        <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css">
        <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.css">
        <!--<link href="http://getbootstrap.com/dist/css/bootstrap.min.css" rel="stylesheet">-->

        <?php
        if ($logoff):
            unset($_SESSION['visitorlogin']);
            echo '<script>window.history.back();</script>';
        endif;
        ?>
        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-197270970-1">
        </script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag() {
                dataLayer.push(arguments);
            }
            gtag('js', new Date());

            gtag('config', 'UA-197270970-1');
        </script>
    </head>
    <body>
        <?php
//        ($_SERVER['REQUEST_URI'] !== '/novosite/' ? require(REQUIRE_PATH . '/inc/_header.inc.php') : require(REQUIRE_PATH . '/inc/header.inc.php'));
        ($_SERVER['REQUEST_URI'] !== '/' ? require(REQUIRE_PATH . '/inc/_header.inc.php') : require(REQUIRE_PATH . '/inc/header.inc.php'));

        if (!require($Link->getPatch())):
            Erro('Erro ao incluir arquivo de navegação!', ERROR, true);
        endif;

        require(REQUIRE_PATH . '/inc/footer.inc.php');
        ?>

        <div id="modal_form_login" class="modal_login">
            <div class="modal_login_div" style="display: none;">
                <span class="close">&times;</span>
                <div class="content_flex content_modal">
                    <div class="div_form">
                        <div class="notify_site">
                            <!--<div class="msg_notify"></div>-->
                        </div>

                        <form id="form_modal_login" method="post" action="visitor_login">
                            <span class="title_modal">Login</span>
                            <div class="div_input">
                                <input type="email" name="visitor_email" placeholder="Seu e-mail" class="inpt-null"/>
                                <span class="notfy_email"></span>
                            </div>
                            <div class="div_input">
                                <input type="password" name="visitor_password" placeholder="Sua senha" class="inpt-null"/>
                                <span class="notfy_nome"></span>
                            </div>
                            <div class="div_input">
                                <button style="background-color: #caa622;
                                        color: #fff;
                                        border: none;" class="button_submit_logar" id="btn_form" type="submit">Entrar</button>
                            </div>
                        </form>

                        <form id="form_modal_create" method="post" action="visitor">
                            <span class="title_modal">Cadastre-se</span>
                            <div class="div_input">
                                <input type="text" name="visitor_name" placeholder="Seu nome" class="inpt-null"/>
                                <span class="notfy_nome"></span>
                            </div>
                            <div class="div_input">
                                <input type="email" name="visitor_email" placeholder="Seu melhor e-mail" class="inpt-null"/>
                                <span class="notfy_email"></span>
                            </div>
                            <div class="div_input">
                                <input type="tel" name="visitor_phone" placeholder="Seu telefone"/>
                                <span class="notfy_nome"></span>
                            </div>
                            <div class="div_input">
                                <input type="password" name="visitor_password" placeholder="Sua senha"/>
                                <span class="notfy_nome"></span>
                            </div>

                            <label class="label_check"> 
                                <span>Desejo receber novidades gratuitamente.</span>
                                <input type="checkbox" checked="checked" name="visitor_type" value="all" class="inpt-null">
                                <span class="checkmark"></span>
                            </label>

                            <div class="div_input">
                                 <!--<input type="submit" value="oi">-->
                                <button style="background-color: #caa622;
                                        color: #fff;
                                        border: none;" class="button_submit_visitor" id="btn_form" type="submit">Cadastrar</button>
                            </div>
                        </form>

                        <form id="form_modal_pass" method="post" action="visitor_pass">
                            <span class="title_modal">Recuperar senha</span>
                            <div class="div_input">
                                <input type="email" name="visitor_email" placeholder="Seu e-mail" class="inpt-null"/>
                                <span class="notfy_email"></span>
                            </div>

                            <div class="div_input">
                                <button style="background-color: #caa622;
                                        color: #fff;
                                        border: none;" class="button_submit" id="btn_form" type="submit">Recuperar</button>
                            </div>
                        </form>

                        <div class="ancor_login">
                            <a href="" class="ancor_lg" style="display: none;">Faça o login</a>
                            <a href="" class="pass_lg">Recuperar senha</a>
                            <a href="" class="create_lg">Cadastre-se</a>
                        </div>
                    </div>
                </div>
                <!--                <hr/>
                                <span class="footer_modal"><p>Dr. Antonio Luiz Mazzilli agradece o seu interesse!</p></span>-->
            </div>
        </div> 
    </body>



    <!--<div id="fb-root"></div>-->
    <script src="<?= HOME ?>/_cdn/jquery.js"></script>
    <script src="<?= HOME ?>/_cdn/jquery-form.js" type="text/javascript"></script>
    <script src="<?= HOME ?>/_cdn/script.js"></script>
    <!--<script async defer crossorigin="anonymous" src="https://connect.facebook.net/pt_BR/sdk.js#xfbml=1&version=v3.3&appId=2127851007505922&autoLogAppEvents=1"></script>-->
    <!--<script src="<?= HOME ?>/_cdn/slider.js"></script>-->
    <?php // if ($Modal === true) : ?>
<!--        <script type="text/javascript">
            $(document).ready(function () {
                var modalbook = $('#modalbook');
                modalbook.show().animate({'opacity': '1'}, 200, function () {
                    $('.modal-dialog').animate({'margin-top': '5%', 'opacity': '1'}, 400);
                });
                $('.modal-close').click(function (e) {
                    $('.modal-dialog').animate({'margin-top': '0%', 'opacity': '0'}, 200, function () {
                        modalbook.animate({'opacity': '0'}, 400).hide();
                    });
                });
            });
        </script>-->
    <?php // endif; ?>
    <script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script>

//        var cbpAnimatedHeader = (function () {
//
//            var docElem = document.documentElement,
//                    header = document.querySelector('.cbp-af-header'),
//                    didScroll = false,
//                    changeHeaderOn = 300;
//
//            function init() {
//                window.addEventListener('scroll', function (event) {
//                    if (!didScroll) {
//                        didScroll = true;
//                        setTimeout(scrollPage, 250);
//                    }
//                }, false);
//            }
//
//            function scrollPage() {
//                var sy = scrollY();
//                if (sy >= changeHeaderOn) {
//                    classie.add(header, 'cbp-af-header-shrink');
//                } else {
//                    classie.remove(header, 'cbp-af-header-shrink');
//                }
//                didScroll = false;
//            }
//
//            function scrollY() {
//                return window.pageYOffset || docElem.scrollTop;
//            }
//
//            init();
//
//        })();
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"
            integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut"
    crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"
            integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k"
    crossorigin="anonymous"></script>
</html>

<?php
ob_end_flush();

