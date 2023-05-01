<header class="main_header_two">
    <div class="main_header_nav">
        <div class="logo">
            <img title="" alt="" src="<?= INCLUDE_PATH; ?>/images/logo/logo2.png" width="148"/>
        </div>
        <nav class="main_header_content_nav">
            <div>
                <ul class="main_header_content_nav_menu">

                    <li><a href="<?= HOME ?>" title="">Home</a></li>

                    <li><a href="<?= HOME ?>/escritorio" title="">Quem somos</a></li>

                    <li><a href="<?= HOME ?>/equipe" title="">Equipe</a></li>

                    <li class="nav_menu_area_ancor">
                        <a href="<?= HOME ?>/areas" title="">Atuação</a>
                        <ul class="main_header_content_nav_menu_area">
                            <?php
                            $post = new Read;
                            $post->ExeRead("tb_areas", "WHERE area_status = 1 ORDER BY area_title ASC, area_date DESC");
                            foreach ($post->getResult() as $item):
                                extract($item);
                                ?>
                                <li><a href="<?= HOME; ?>/area/<?= $area_name; ?>" class=""><?= $area_title; ?></a></li> 
                                <?php
                            endforeach;
                            ?>
                        </ul>
                    </li>

                    <li><a href="<?= HOME ?>/blog" title="">Blog</a></li>

                    <li><a href="<?= HOME ?>/contatos" title="">Contatos</a></li>

                    <?php if (isset($_SESSION['visitorlogin'])): ?>
                        <li><a title="" href="<?= HOME; ?>/blog&sair=true" id="login_sair" class="login_sair"><span class="lnr lnr-exit"></span> Sair</a></li> 
                    <?php else: ?>
                        <li><a title="" id="login_entrar" class="login_entrar"><span class="lnr lnr-user"></span></a></li> 
                    <?php endif; ?>
                </ul>
            </div>
        </nav>

        <nav class="menu_mobile">
            <ul>
                <li><span class="icon-menu icon-notext content_mobile"></span>
                    <ul class="ul_sub_mobile ds_none">

                        <li><a href="<?= HOME ?>" title="">Home</a></li>

                        <li><a href="<?= HOME ?>/escritorio" title="">Quem somos</a></li>

                        <li><a href="<?= HOME ?>/equipe" title="">Equipe</a></li>

                        <li><a href="<?= HOME ?>/areas" title="">Atuação</a></li>

                        <li><a href="<?= HOME ?>/blog" title="">Blog</a></li>

                        <li><a href="<?= HOME ?>/contatos" title="">Contatos</a></li>

                        <!--<li><a href="<?= HOME ?>/entrar" title="">Entrar</a></li>--> 
                    </ul>
                </li>
            </ul>
        </nav>
    </div>
</header>

<!--    <div class="content">-->

<!--    </div>-->


<!--FECHA CABEÇALHO-->