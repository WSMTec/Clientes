<?php
$Read = new Read;
$Read->ExeRead("tb_configuration");
?>
<style>
<?php
if ($Read->getResult()[0]['config_slider'] == "A") {
    $Read->ExeRead("tb_slider", "WHERE post_status = '1' LIMIT 3");
    ?>
        .section_home {
            width: 100%;
            height: 650px;
            background-position: center center;
            background-repeat: no-repeat;
            background-size: cover;
        }
        .section_home {
            background-image: url("<?= HOME; ?>/uploads/<?= $Read->getResult()[0]['post_cover']; ?>");
            background-position: center center;
            animation-name: imagens;
            animation-duration: 20s;
            animation-iteration-count: infinite;
        }
        @keyframes imagens {

            20% 	 {background-image:url("<?= HOME; ?>/uploads/<?= $Read->getResult()[0]['post_cover']; ?>");}
            60% 	 {background-image:url("<?= HOME; ?>/uploads/<?= $Read->getResult()[1]['post_cover']; ?>");}
            100%   {background-image:url("<?= HOME; ?>/uploads/<?= $Read->getResult()[2]['post_cover']; ?>");}
            /*    80%   {background-image:url("https://www.albertopreto.adv.br/uploads/slider/2021/03/img-1.jpg");}
                100%  {background-image:url("https://www.albertopreto.adv.br/uploads/slider/2021/03/img-1.jpg");}*/

        }                   
    <?php
} else {
    ?>     
        .section_home {
            width: 100%;
            height: 400px;
            background-image: url("<?= INCLUDE_PATH; ?>/images/jpg/cpsite.jpg");
            background-attachment: fixed;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }            
    <?php
}
?>
</style>
<main>
    <section class="section_home">
        <?php
        $Read->ExeRead("tb_configuration");
        if (!empty($Read->getResult()[0]['config_content'])) {
            ?>
            <header class="section_home_header">
                <h1><?= $Read->getResult()[0]['config_content']; ?></h1>
            </header>
            <?php
        }
        ?>
    </section>

    <section class="section_sobre content">
        <header style="display: none;" class="section_sobre_header">
            <h1>
                <?php
                $Read->ExeRead("tb_configuration");
                if ($Read->getResult()[0]['config_home_about_title'] !== '') {
                    echo $Read->getResult()[0]['config_home_about_title'];
                }
                ?>
            </h1>
            <p>
                <?php
                if ($Read->getResult()[0]['config_home_about'] !== '') {
                    echo $Read->getResult()[0]['config_home_about'];
                }
                ?>
            </p>
        </header>

        <div class="section_sobre_div">

            <article class="section_sobre_article">
                <div class="sobre_img">
                    <!--<img src="<?= HOME; ?>/a/e1.jpg"/>-->
                </div>
                <div class="sobre_cont">
                    <h2>
                        <?php
                        if ($Read->getResult()[0]['config_home_about_title'] !== '') {
                            echo $Read->getResult()[0]['config_home_about_title'];
                        }
                        ?>
                    </h2>
                    <p>
                        <?php
                        if ($Read->getResult()[0]['config_home_about'] !== '') {
                            echo $Read->getResult()[0]['config_home_about'];
                        }
                        ?>
                    </p>
                </div>
            </article>   
        </div>
    </section>

    <section class="section_areas content">
        <header class="section_areas_header">
            <h1>Atuação</h1>
            <p>
                <!--A capacidade de articulação e aperfeiçoamento técnico permite que nossa equipe atue nos mais diversos ramos do direito e seja presença constante na solução dos conflitos trazidos por nossos clientes, essa atuação se dá na esfera administrativa ou judicial, através de consultoria, assessoria ou de forma contenciosa.-->
            </p>
        </header>

        <div class="section_areas_div">
            <?php
            $Read->ExeRead("tb_areas", "WHERE area_status = 1 ORDER BY area_title ASC, area_date DESC");
            foreach ($Read->getResult() as $item):
                extract($item);
                ?>
                <a href="<?= HOME; ?>/area/<?= $area_name; ?>" class="ancor_areas">
                    <article class="section_areas_article">
                        <div class="areas_cont">
                            <h2>
                                <img width="30" src="<?= HOME; ?>/uploads/<?= $area_icon; ?>"/>
                                <?= $area_title; ?>
                            </h2>
                            <p>
                                <?= $area_summary; ?>
                            </p>
                        </div>
                    </article>   
                </a>
                <?php
            endforeach;
            ?>
        </div>
    </section>

    <section class="section_faixa">
        <div class="content">
            <header class="section_faixa_header content">
                <h1>Fale conosco e tire todas suas dúvidas!</h1>
<!--                <p class="content">
                    Caso deseje conhecer um pouco melhor sobre os nossos serviços, entre em contato e certamente um dos profissionais poderá lhe ajudar!
                </p>-->
                <a class="btn_faixa" href="<?= HOME; ?>/contatos"> Entrar em contato!</a>
            </header>
        </div>
    </section>

    <section class="section_blog content">
        <header class="section_blog_header">
            <h1>Blog</h1>
<!--            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
                industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and
                scrambled it to make a type specimen book. It has survived not only five centuries</p>-->
        </header>

        <div class="section_blog_div autoplay">
            <?php
            $post = new Read;
            $post->ExeRead("tb_posts", "ORDER BY post_status ASC, post_date DESC LIMIT :limit OFFSET :offset", "limit=20&offset=0");
            if ($post->getRowCount()):
                foreach ($post->getResult() as $data):
                    extract($data);
                    ?>
                    <article class="article_news">
                        <a href="<?= HOME; ?>/artigo/<?= $post_name; ?>">
                            <div class="thumb-news-home">
                                <img alt="<?= $post_title; ?>" title="<?= $post_title; ?>" src="<?= HOME; ?>/tim.php?src=<?= HOME; ?>/uploads/<?= ($post_cover ? $post_cover : 'blog/logo3.png'); ?>&w=460&h=230" />
                                <?= $post_type == 'video' ? '<div class="imagem-mascara"></div>' : ''; ?>
                            </div>

                        </a>
                        <div class="small">
                            <?php
                            $post->ExeRead("tb_categories", "WHERE category_parent = {$post_cat_parent}");
                            echo $post->getResult()[0]['category_title'];
                            ?> - 
                            <time datetime="<?= date('Y-m-d', strtotime($post_date)); ?>" pubdate>
                                <?= date('d/m/Y H:i', strtotime($post_date)); ?>
                            </time>
                        </div>
                        <h2 style="flex-basis: 100%;">
                            <a title="<?= $post_title; ?>" href="<?= HOME; ?>/artigo/<?= $post_name; ?>">
                                <?= Check::Words($post_title, 40); ?>
                            </a>
                        </h2>
                        <p class="tagline">
                            <?= Check::Words($post_content, 15); ?>
                        </p>
                    </article>
                    <?php
                endforeach;
                ?>

                <?php
            else:
                echo "<div class='sorry'><span class='lnr lnr-sad'></span></div>";
            endif;
            ?>
        </div>

        <div class="section_blog_div_btn">
<!--            <a class="btn_blog" href="<?= HOME; ?>/blog"> <img src="<?= HOME; ?>/uploads/blog/icon/2.png" width="18px" style="margin-right: 3%;"/> Ver todos os artigos</a>
            <a class="btn_blog" href="<?= HOME; ?>/categoria/videos"> <img src="<?= HOME; ?>/uploads/blog/icon/3.png" width="18px" style="margin-right: 3%;"/> Ver todos os videos</a>                -->
        </div>
    </section>

</main>
