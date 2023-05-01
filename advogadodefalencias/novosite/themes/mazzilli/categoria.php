<?php
if ($Link->getData()):
    $Read = new Read;
    extract($Link->getData());
else:
    header('Location: ' . HOME . DIRECTORY_SEPARATOR . '404');
endif;
?>

<section class="section_blog_pag content">
    <header class="section_blog_header">
        <h1>
            Categoria <?= $category_title; ?>            
        </h1>
        <div class="section_blog_header_div">
            <p>
                <a href="<?= HOME; ?>/blog" class="section_blog_header_div_ancor <?= (mb_stripos(basename($_SERVER['REQUEST_URI']), "blog") !== false ? 'active' : ''); ?>">Todas</a>
                <?php
                $Read->FullRead("SELECT * FROM tb_categories WHERE category_parent is null GROUP BY category_title");
                foreach ($Read->getResult() as $item):
                    ?>
                    <a href="<?= HOME; ?>/categoria/<?= $item["category_name"]; ?>" class="section_blog_header_div_ancor <?= (mb_stripos(basename($_SERVER['REQUEST_URI']), $item["category_name"]) !== false ? 'active' : ''); ?>"><?= $item["category_title"]; ?></a>
                    <?php
                endforeach;
                ?>
            </p>
        </div>
    </header>
    <?php
    $getPage = filter_input(INPUT_GET, 'page', FILTER_VALIDATE_INT);
    $Pager = new Pager("{$category_name}&page=");
    $Pager->ExePager($getPage, 8);


    $post = new Read;
    $post->FullRead("SELECT * FROM tb_posts WHERE post_cat_parent = {$category_id} ORDER BY post_date DESC LIMIT :limit OFFSET :offset", "limit={$Pager->getLimit()}&offset={$Pager->getOffset()}");
    if ($post->getRowCount()):
        foreach ($post->getResult() as $data):
            extract($data);
            ?>
            <article class="article_news">
                <a href="<?= HOME; ?>/artigo/<?= $post_name; ?>">
                    <div class="thumb-news-home">
                        <img alt="<?= $post_title; ?>" title="<?= $post_title; ?>" src="<?= HOME; ?>/tim.php?src=<?= HOME; ?>/uploads/<?= ($post_cover ? $post_cover : 'blog/6.jpg'); ?>&w=460&h=230" />
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
                    <?= Check::Words($post_content, 30); ?>
                </p>
            </article>
            <?php
        endforeach;
    else:
        echo "<div class='sorry'><span class='lnr lnr-sad'></span></div>";
    endif;
    ?>
</section>

<?php
$Pager->ExePaginator("tb_posts", "WHERE post_cat_parent = {$category_id} ORDER BY post_date DESC");
echo $Pager->getPaginator();
?>