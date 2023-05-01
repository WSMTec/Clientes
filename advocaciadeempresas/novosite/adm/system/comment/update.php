<?php
if (!$Adm):
    header('Location: painel.php');
    exit();
endif;
?>
<main class="content">
    <?php
    $office = filter_input(INPUT_GET, "category", FILTER_VALIDATE_INT);
    $Read = new Read;
    ?>

    <header class="header-box">
        <h2 class="header-box-h">Reponder comentário</h2>
        <div class="header-box-btn">
            <a class="btn-default btn-blue" href="?exe=comment/index"><span class="lnr lnr-list"></span>  Comentários</a>
        </div>
    </header>

    <?php
    $Read->FullRead("SELECT * FROM tb_comment INNER JOIN tb_posts ON comment_post = post_id INNER JOIN tb_visitor ON comment_visitor = visitor_id WHERE comment_id = :id", "id={$office}");
    extract($Read->getResult()[0]);
    ?>
    <div class="box content-box">
        <label><b>Usuário/Artigo:</b></label><br/>
        <div class="box_title">
            <?= $visitor_name . " / " . $post_title; ?>
            <a style="padding: 0.5em;
               background-color: #fff;
               border-radius: 5px;
               color: #000;
               font-size: 0.8em;
               display: flex;" target="_blank" href="<?= HOME . "/artigo/" . $post_name; ?>">Ver post</a>
        </div>
        <br/>
        <label><b>Comentário:</b></label><br/>
        <div class="box_title">
            <?= $comment_content; ?>
        </div>

        <div class="resp">
            
        </div>

        <?php
        if ($comment_status == "R") {
            ?>
            <br/>
            <label><b>Resposta:</b></label><br/>
            <div class="box_title">
                <?php
                $Read->FullRead("SELECT * FROM tb_comment WHERE comment_visitor = {$comment_visitor} AND comment_answer = {$comment_id}");
                echo $Read->getResult()[0]['comment_content']
                ?>
            </div>
            <?php
        } else {
            ?>
            <form method="post" class="comment" id="form-comment-update" action="comment-update">
                <div class="row-f">
                    <label>
                        <span class="lnr lnr-text-align-left"></span>   Resposta
                    </label>
                    <textarea name="comment_content" class="inpt-null"></textarea>
                </div>
                <div class="row-btn">
                    <input name="comment_post" type="hidden" value="<?= $post_id; ?>"/>
                    <input name="comment_answer" type="hidden" value="<?= $comment_id; ?>"/>
                    <input name="comment_user" type="hidden" value="<?= $userlogin['user_id']; ?>"/>
                    <input name="comment_status" type="hidden" value="R"/>
                    <input name="comment_date" type="hidden" value="<?= date("Y-m-d H:i"); ?>"/>
                    <input name="comment_visitor" type="hidden" value="<?= $visitor_id; ?>"/>
                    <button class="btn-green btn-default" type="submit"><span class="lnr lnr-checkmark-circle"></span> Responder</button>
                </div>
            </form>
            <?php
        }
        ?>
    </div>
</main>
