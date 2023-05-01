<section class="section_newsletter">

    <header class="section_newsletter_header">
        <div class="content">
            <h1>Newsletter</h1>
            <p>
                Se cadastre e receba exclusivamente em seu WhatsApp ou e-mail, as notícias jurídicas mais importantes que de alguma maneira afetam a vida de milhares de brasileiros, é rápido e fácil, clique abaixo:
            </p>
        </div>
    </header>

    <div class="section_newsletter_div">
        <?php
        $News = filter_input_array(INPUT_POST, FILTER_DEFAULT);
        if (isset($News) && isset($News['SendPostNews'])):
            $Read = new Read;
            $Create = new Create;

            array_map('strip_tags', $News);
            array_map('trim', $News);

            if (in_array('', $News)):
                Erro("Favor, preencher todos os campos para se cadastrar!", ERROR);
            else:
                if (!isset($News['new_type'])):
                    $News['new_type'] = "news";
                endif;

                $Read->ExeRead("tb_newsletter", "WHERE new_email = :mail", "mail={$News['new_email']}");
                if (!$Read->getRowCount()):
                    $Create->ExeCreate("tb_newsletter", array(
                        "new_name" => $News['new_name'],
                        "new_email" => $News['new_email'],
                        "new_phone" => (isset($News['new_phone']) ? $data['new_phone'] : null),
                        "new_type" => $News['new_type']
                    ));
                endif;
                
                Erro("Pronto! você foi cadastrado em nossa newsletter, agradecemos o seu interesse.", ACCEPT);
            endif;
        endif;
        ?>
        <form id="section_newsletter_form" class="section_newsletter_form" method="post" action="newsletter">
            <div class="div_input">
                <input required="" type="text" name="new_name" placeholder="Seu Nome" class="inpt-null"/>
                <span class="notfy_nome"></span>
            </div>
            <div class="div_input">
                <input required="" type="email" name="new_email" placeholder="Seu melhor e-mail" class="inpt-null"/>
                <span class="notfy_email"></span>
            </div>
            <label class="label_check"> 
                <span>Desejo receber eBooks gratuitamente.</span>
                <input type="checkbox" checked="checked" name="new_type" value="all" class="inpt-null">
                <input type="hidden" name="SendPostNews" value="true">
                <span class="checkmark"></span>
            </label>
            <div class="div_input">
                <button class="button_newsletter_submit" id="btn_form" type="submit">Cadastre-se</button>
            </div>
        </form>
    </div>
</section>

