<?php
$Read = new Read();
?>
<section class="section_equipe content">
    <header class="section_equipe_header">
        <h1>
            Equipe
        </h1>
        <p>
            <?php
            $Read->ExeRead("tb_configuration");
            if ($Read->getResult()[0]['config_team'] !== '') {
                echo $Read->getResult()[0]['config_team'];
            }
            ?>
        </p>
    </header>

    <?php
//    $Read = new Read;
    $Read->ExeRead("tb_team", "WHERE team_level = 1 ORDER BY team_id ASC");
    foreach ($Read->getResult() as $item):
        extract($item);
        ?>
        <article class="article_equipe">
            <a href="">
                <div class="thumb_news">
                    <!--<img alt="" title="" src="<?= HOME; ?>/tim.php?src=<?= HOME; ?>/uploads/<?= $team_cover; ?>&w=460" />-->
                    <img alt="" title="" src="<?= HOME; ?>/uploads/<?= ($team_cover ? $team_cover : 'blog/logo3.png'); ?>" width="460"/>
                </div>
            </a>
            <div class="small">
                <?= $team_function; ?>
            </div>
            <h2 style="flex-basis: 100%;">
                <a title="" href="" class="ancor">
                    <?= $team_title; ?>
                </a>
            </h2>
            <div class="adv_social">
                <a href="<?= $team_facebook; ?>" target="_blank" class="adv_ancor_social">
                    <img src="<?= INCLUDE_PATH; ?>/images/icones/facebook-logo2.png">
                </a>
                <a href="<?= $team_instagram; ?>" target="_blank" class="adv_ancor_social">
                    <img src="<?= INCLUDE_PATH; ?>/images/icones/instagram-social.png">
                </a>
                <a href="<?= $team_linkedin; ?>" target="_blank" class="adv_ancor_social">
                    <img src="<?= INCLUDE_PATH; ?>/images/icones/linkedin-logo.png">
                </a>
    <!--                <a href="<?= $team_title; ?>" class="adv_ancor_social">
                    <img src="<?= INCLUDE_PATH; ?>/images/icones/article-logo.png">
                </a>-->
            </div>
            <a href="" class="adv_info" data-adv="<?= $team_id; ?>">+ Informações</a>
        </article>  
        <?php
    endforeach;
    ?>
</section>

<?php
foreach ($Read->getResult() as $item):
    extract($item);
    ?>
    <section class="section_adv adv_<?= $team_id; ?>">
        <div class="div_adv">
            <span class="close">&times;</span>
            <header class="">
                <h1>
                    <?= $team_title; ?>
                </h1>
                <p>

                </p>
            </header>

            <article class="">
                <?= $team_formation; ?>
                <br/>
                <br/>
                <?= $team_content; ?>
            </article>
        </div>
    </section>
    <?php
endforeach;
?>