<?php
if ($Link->getData()):
    extract($Link->getData());
else:
    header('Location: ' . HOME . DIRECTORY_SEPARATOR . '404');
endif;
?>
<style>
    .section_heading_post:after{
        background-image: url(<?= ($post_cover ? '../uploads/' . $post_cover : '../uploads/blog/logo3.png'); ?>);
        /*background-attachment: fixed;*/
    }
</style>

<div class="main_blog">
    <section class="section_heading_post">
        <header class="main_header_post">
            <h1>
                <?= $post_title; ?>
            </h1>
            <p>
                <time datetime="<?= date('Y-m-d', strtotime($post_date)); ?>" pubdate>Enviada em: <?= date('d/m/Y H:i', strtotime($post_date)); ?>Hs</time>
            </p>
        </header>

    </section>
</div>
<div class="main_blog_option">
    <!--<div class="main_blog_option_div">--> 
    <span><?= $post_views; ?><img src="<?= INCLUDE_PATH; ?>/images/artigos/eye.png" width=""/></span>

    <?php if (isset($_SESSION['visitorlogin'])):
        ?>
        <?php
        $Read = new Read;
        $Read->ExeRead("tb_like", "WHERE like_visitor = :v AND like_post = :p", "v={$_SESSION['visitorlogin']['visitor_id']}&p={$post_id}");
//                    var_dump($Read->getRowCount());
        if ($Read->getRowCount()):
            ?>
            <span> <a style="color: rgb(215, 89, 74);" href="" class="like" id="unlike_<?= $post_id; ?>"><?= $post_like; ?></a> <img src="<?= INCLUDE_PATH; ?>/images/artigos/like.png" width=""/></span>
            <?php
        else:
            ?>
            <span> <a href="" class="like" id="like_<?= $post_id; ?>"><?= $post_like; ?></a> <img src="<?= INCLUDE_PATH; ?>/images/artigos/like.png" width=""/></span>
        <?php
        endif;
        ?>
    <?php else: ?>
        <span><?= $post_like; ?><img src="<?= INCLUDE_PATH; ?>/images/artigos/like.png" width=""/>  </span>
    <?php endif; ?>

                <!--<span><img src="<?= INCLUDE_PATH; ?>/images/artigos/twitter.png" width=""/> </span>-->
    <span><a target="_blank" href="https://api.whatsapp.com/send?text=<?= $post_title; ?> <?= HOME; ?>/artigo/<?= $post_name; ?>"><img src="<?= INCLUDE_PATH; ?>/images/artigos/whatsapp.png" width=""/> </a></span>
    <span class="facebook"> 
        <a class="faceb" href="https://facebook.com/sharer.php?u=<?php echo HOME . $_SERVER['REQUEST_URI'] ?>" target="_blank" title="Compartilhar"><img src="<?= INCLUDE_PATH; ?>/images/artigos/facebook.png" width=""/> </a>
    </span>
    <!--</div>-->
</div>
<div class="main_blog_post">
    <!--FECHA DIV FRASE-->
    <div class="content_flex">
        <article class="article_post">
            <div class="img_post">
                <?= Check::Image('adm/uploads' . DIRECTORY_SEPARATOR . $post_cover, $post_title, 578); ?>
            </div>  
            <?php
            if ($post_video != null) {
                ?>
                <iframe width="560" height="415" src="https://www.youtube.com/embed/<?= $post_video; ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                <?php
            }
            ?>
            <?= $post_content; ?>
        </article>
    </div>
    <!--    <div class="blog_coments">
            <div class="like_fb">
                <div class="fb-like" data-href="https://www.albertopreto.adv.br/new/<?= $post_name; ?>" data-width="" data-layout="standard" data-action="like" data-size="small" data-show-faces="true" data-share="true"></div>
            </div>  
            <div class="coments_fb">
                <div class="fb-comments" data-href="https://www.albertopreto.adv.br/new/<?= $post_name; ?>" data-width="600" data-numposts="10"></div>
            </div>
        </div>-->
</div>
<article class="comment_post content">
    <?php
    if (isset($_SESSION['visitorlogin'])) {
        ?>
        <form id="form_modal_comment" class="form_comment" action="comment" method="post">

            <label><strong>Comentar</strong></label><br/>
            <textarea class="text_comment" name="comment_content"></textarea>
            <input name="comment_visitor" type="hidden" value="<?= $_SESSION['visitorlogin']['visitor_id']; ?>"/>
            <input name="comment_post" type="hidden" value="<?= $post_id; ?>"/>
            <input value="Comentar" type="submit" class="submit_comment"/>
        </form>
        <?php
    } else {
        ?>
        <a title="" id="login_entrar" class="login_entrar btn_comment">
            <span class="lnr lnr-user"></span>  Comentar: Entrar ou cadastrar.
        </a>
        <div class="notify_site_c">

        </div>
        <?php
    }
    ?>
    <?php
    $comment = new Read;
    $comment->FullRead("SELECT * FROM tb_comment "
            . " INNER JOIN tb_visitor ON comment_visitor = visitor_id"
            . " WHERE comment_post = :id AND comment_answer IS NULL ORDER BY comment_date DESC", "id={$post_id}");
    if (!$comment->getResult()):
        echo "<div class='sorry'><span class='lnr lnr-sad'></span> <br/> <span style='font-size:0.4em;'>Nenhum comentário.</span></div>";
    else:
        ?>
        <h5 style="margin-top: 3%;">Comentarios:</h5>
        <?php
        foreach ($comment->getResult() as $data):
            ?>
            <div class="div_comment" style="width: 100%; position: relative; float: right;">
                <p style="font-size: 0.8em;"><?= $data['visitor_name']; ?> <small><?= date("d/m/Y H:i", strtotime($data['comment_date'])); ?></small></p>
                <p><?= $data['comment_content']; ?></p>
            </div>
            <?php
            $Read->FullRead("SELECT * FROM tb_comment WHERE comment_visitor = {$data['comment_visitor']} AND comment_answer = {$data['comment_id']}");
            ?>
            <div class="div_comment" style="width: 95%; position: relative; float: right;">
                <p style="font-size: 0.8em;">Administrador <small><?= date("d/m/Y H:i", strtotime($Read->getResult()[0]['comment_date'])); ?></small></p>
                <p><?= $Read->getResult()[0]['comment_content']; ?></p>
            </div>
            <?php
        endforeach;
    endif;
    ?>
</article>
<aside class="aside_post">
    <header class="aside_header">
        <h1>
            Posts Relacionados
        </h1>
    </header>
    <div class="aside_flex">
        <?php
        $post = new Read;
        $post->ExeRead("tb_posts", "WHERE post_status = 1 AND (post_cat_parent = :cat OR post_category = :cat) ORDER BY post_date DESC LIMIT :limit OFFSET :offset", "cat={$post_category}&limit=6&offset=1");
        if (!$post->getResult()):
            echo "<div class='sorry'><span class='lnr lnr-sad'></span></div>";
        else:
            foreach ($post->getResult() as $data):
                extract($data);
                ?>
                <!--152 76-->
                <article class="aside_article_post">
                    <div class="aside_article_post_img">
                        <img alt="<?= $post_title; ?>" title="<?= $post_title; ?>" src="<?= HOME; ?>/tim.php?src=<?= HOME; ?>/uploads/<?= ($post_cover ? $post_cover : 'blog/logo3.png'); ?>&w=152&h=82" />
                    </div>
                    <div class="time-post">
                        <time datetime="<?= date('Y-m-d', strtotime($post_date)); ?>" pubdate><?= date('d/m/Y H:i', strtotime($post_date)); ?></time>
                    </div>
                    <header class="aside_article_post_header">
                        <h1><a href="<?= HOME; ?>/artigo/<?= $post_name; ?>"><?= Check::Words($post_title, 6); ?></a></h1>
                    </header>
                </article>
                <?php
            endforeach;
        endif;
        ?>
    </div>
</aside>

