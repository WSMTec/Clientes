<div class="content">

    <!--<div class="div-header">-->
    <header class="header-box">
        <h2 class="header-box-h">Newsletter</h2>
    </header>
    <div class="loader">
        <div class="processing"></div>
    </div>
    <!--</div>-->

    <div class="box content-box">
        <form method="post" id="form-newsletter" class="form-newsletter form-horizontal" action="newsletter" enctype="multipart/form-data">
            <div class="row-f">
                <label>
                    <span class="lnr lnr-picture"></span> Posts
                </label>
                <select required="" class="inpt-null" name="post_id">
                    <option></option>
                    <?php
                    $Read = new Read;
                    $Read->FullRead("SELECT * FROM tb_posts ORDER BY post_id DESC");
                    foreach ($Read->getResult() as $d):
                        extract($d);
                        ?>
                        <option value="<?= $post_id; ?>"><?= $post_newsletter == '1' ? 'Enviado' : 'Não Enviado'; ?> --- <?= $post_title; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="row-btn" style="padding-top: 3%;">
                <button id="btn-form" class="btn-green btn-default" type="submit"><span class="lnr lnr-checkmark-circle"></span> Disparar e-mails</button>
            </div>
        </form>

        <div class="select_usr" style="margin-top: 1.5%; display: flex; flex-wrap: wrap; flex-basis: 100%;">
            <?php
            $i = 1;
            $Read->FullRead("SELECT * FROM tb_newsletter");
            foreach ($Read->getResult() as $d):
                extract($d);
                ?>
                <div class="emails-news">
                    <input class="new_id" name="select_user" type="checkbox" value="<?= $new_id; ?>" id="campo-checkbox<?= $i; ?>" />
                    <label for="campo-checkbox<?= $i; ?>">
                        <b style="font-size: 0.8em; font-weight: 900;">Nome:</b><br/>
                        <small><?= $new_name; ?></small><br/>
                        <b style="font-size: 0.8em; font-weight: 900;">Email:</b><br/> 
                        <small><?= $new_email; ?></small>
                    </label>
                </div>
                <?php
                $i++;
            endforeach;
            ?>
        </div>
    </div>

    <div class="content-box">
        <table class="table table-striped table-borderless" width='100%' style="width: 100%;">
            <thead class="thead-dark">
                <tr><th colspan="3">Selecionados recentemente</th></tr>
            </thead>
            <thead class="thead-light">
                <tr style="font-size: 0.9em;
                    font-weight: 600;"><td>Nome destinatário</td><td>Data e horário</td><td>Notícia enviada</td></tr>
            </thead>
            <tbody>
                <?php
                $Read->FullRead("SELECT * FROM tb_send
                        INNER JOIN tb_posts ON post_id = env_id_post
                        INNER JOIN tb_newsletter ON new_id = env_id_user
                        ORDER BY env_id DESC");
                if (!$Read->getRowCount()) {
                    echo '<tr><td colspan="3">Desculpe, nenhuma notícia foi enviada :(</td></tr>';
                } else {
                    foreach ($Read->getResult() as $It):
                        extract($It);
                        ?>
                        <tr>
                            <td><?= $new_name; ?></td>
                            <td><?= date("d/m/Y H:i:s", strtotime($env_date)); ?></td>
                            <td><?= Check::Words($post_title, 10, '...'); ?></td>
                        </tr>
                        <?php
                    endforeach;
                }
                ?>
            </tbody>
        </table>
    </div>

</div> <!-- content home -->