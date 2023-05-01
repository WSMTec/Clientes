<?php
$Read = new Read;
$urlAudio = explode('/', $_SERVER['REQUEST_URI']);
$Read->ExeRead("tb_audio", "WHERE audio_title = :link", "link=" . (isset($urlAudio[2]) ? $urlAudio[2] : null) . "");
$audioTitle = (isset($Read->getResult()[0]['audio_title']) ? $Read->getResult()[0]['audio_title'] : null);

if ($_SERVER['REQUEST_URI'] !== '/newsletter' && $_SERVER['REQUEST_URI'] !== "/audio/{$audioTitle}"):
    ?>
    <section id = "news" class = "section_news">
        <a target="_blank" href="https://wa.me/5511999154058" title="Whatsapp Dr. Antonio Luiz Mazzilli" class="whats_fixed"></a>
        <header class = "section_news_header">
            <h1>Newsletter</h1>
            <p class = "content">Gostaria de receber novidades por e-mail? Assine nossa newsletter</p>
              <div class='notify_site'></div>
        </header>

        <form method="post" class="form_newsl" id="form_modal_news" action="newsletter">
            <div class="div_form_news">
                <input placeholder="Seu nome" required="" type="text" name="new_name">
                <input placeholder="Seu e-mail" required="" type="email" name="new_email">
            </div>
            <div class="section_news_div_btn">
                <!--<a class ="btn_news" > Quero ficar por dentro!</a>-->
                <button class="btn_news_new" type="submit"> Quero ficar por dentro!</button>
                <!--<img src="https://www.rosangelamatos.com.br/uploads/news/icon/2.png" width="26" style="margin-right: 2%;"/>-->
            </div>
        </form>
        <!--        <div class = "section_news_div_btn">
                    <a class = "btn_news" href = ""> <img src = "<?= HOME; ?>/uploads/news/icon/2.png" width = "26" style = "margin-right: 2%;"/> Quero receber todas as novidades!</a>
                </div>-->
    </section>
    <?php
endif;
?>

<footer class="main_footer" style="background-color:  #272727; display: flex;     flex-wrap: wrap;">
    <!--    <div class="footer_top">
            <a href="#">
                <span class="lnr lnr-chevron-up"></span>
                <p>Ir para top</p>
            </a>
        </div>-->
    <section class="main_footer_section" style="background-color:  rgb(25 25 25);     flex-basis: 100%;">
        <div class="content">
            <header class="main_footer_section_header" style="display: none;">
                <h1>Outras informações:</h1>
            </header>
            <div class="main_footer_section_article" style="display: flex; flex-wrap: nowrap;">
                <article>
                    <header><h2>Mapa do site</h2></header>
                    <ul>
                        <li><a href="<?= HOME ?>" title="">Home</a></li> 

                        <li><a href="<?= HOME ?>/escritorio" title="">Quem somos</a></li> 

                        <li><a href="<?= HOME ?>/equipe" title="">Equipe</a></li>

                        <li><a href="<?= HOME ?>/areas" title="">Atuação</a></li>

                        <li><a href="<?= HOME ?>/blog" title="">Blog</a></li>

                        <li><a href="<?= HOME ?>/contatos" title="">Contatos</a></li>

                        <li class="li_a_retrita"><a href="<?= HOME ?>/adm" title="">Painel</a></li>
                    </ul>
                </article>
                <article>
                    <header><h2>Áreas de Atuação</h2></header>
                    <ul>
                        <?php
                        $Read->ExeRead("tb_areas", "WHERE area_status = 1 ORDER BY area_title ASC, area_date DESC");
                        foreach ($Read->getResult() as $item):
                            extract($item);
                            ?>
                            <li><a href="<?= HOME; ?>/area/<?= $area_name; ?>" class=""><?= $area_title; ?></a></li>                            
                            <?php
                        endforeach;
                        ?>
                    </ul>

                </article>

                <article>
                    <header><h2>Outros Sites</h2></header>
                    <ul>
                        <li><a href="http://www.tjsp.jus.br" target="_blank">Tribunal de Justiça de São Paulo</a></li>
                        <li><a href="http://www.trtsp.jus.br" target="_blank">Tribunal Regional do Trabalho de São Paulo</a></li>
                        <li><a href="http://www.stf.jus.br" target="_blank">Supremo Tribunal Federal</a></li>
                        <li><a href="http://www.stj.jus.br" target="_blank">Superior Tribunal de Justiça</a></li>
                        <li><a href="http://www.oabsp.org.br" target="_blank">OAB São Paulo</a></li>
                        <li><a href="http://www.aasp.org.br" target="_blank">Associação dos Advogados de São Paulo</a></li>
                        <!--                        <li><a target="_blank" href="//www.receita.fazenda.gov.br">Receita Federal do Brasil – RFB</a> </li>
                                                <li><a target="_blank" href="//www.fazenda.sp.gov.br/">Secretaria da Fazenda Estadual – SEFAZ </a></li>
                                                <li><a target="_blank" href="http://www.capital.sp.gov.br/">Prefeitura de São Paulo </a></li>
                                                <li><a target="_blank" href="http://www.oabsp.org.br/">Ordem dos Advogados do Brasil – São Paulo</a> </li>
                                                <li><a target="_blank" href="//www.aasp.org.br/aasp/">Associação dos Advogados de São Paulo – AASP</a> </li>
                                                <li><a target="_blank" href="//www.policiamilitar.sp.gov.br/">Policia Militar do Estado de São Paulo – PM</a> </li>
                                                <li><a target="_blank" href="//www.detran.sp.gov.br/">Departamento de Trânsito de São Paulo – DETRAN </a></li>
                                                <li><a target="_blank" href="//www.conjur.com.br">Consultor Jurídico – CONJUR</a> </li>-->
                    </ul>

<!--                    <a target="_blank" href="https://www.facebook.com/" title=""><img
                            src="<?= INCLUDE_PATH; ?>/images/icones/facebook.png" width="16"/></a>
                    <a target="_blank" href="https://twitter.com/" title=""><img
                            src="<?= INCLUDE_PATH; ?>/images/icones/instagram-logo.png" width="16"/></a>-->
                </article>
                <article>
                    <header><h2>Contatos</h2></header>
                    <ul>
                        <li><a href="<?= HOME ?>" title=""><span class="lnr lnr-apartment"></span> Alameda Franca no 1331 11° Andar / Jardim Paulista, São Paulo/SP - CEP: 01422-001</a></li>
                        <!--<li><a href="<?= HOME ?>" title=""><span class="lnr lnr-apartment"></span> Rua Antonio do Valle Melo no 1078 / Centro, Sumaré/SP - CEP: 13170-011</a></li>-->
                        <li><a href="<?= HOME ?>" title=""><span class="lnr lnr-phone-handset"></span> 11 3085-4648 / 11 3085-9246 / 11 99915-4058</a></li>
                        <!--<li><a href="<?= HOME ?>" title=""><span class="lnr lnr-phone-handset"></span> 19 3828-8404 / 19 3803-4175</a></li>-->
                        <li><a target="_blank" href="mailto:contato@advogadodefalencias.com.br"
                               title="e-mail contato@advogadodefalencias.com.br"><span class="lnr lnr-envelope"></span> contato@advogadodefalencias.com.br</a></li>                  
                    </ul>
                </article>

            </div>
        </div>
    </section>
    <article class="footer_logo">
        <div style="padding: 1em 0;">
            <img title="Dr. Antonio Luiz Mazzilli" alt="[Dr. Antonio Luiz Mazzilli]"
                 src="<?= INCLUDE_PATH; ?>/images/logo/logo5.png" width="216"/>
        </div>
        <div class="footer_logo_sociais">
            <a href="https://www.facebook.com/antonioluiz.mazzilli" target="_blank"><img src="<?= INCLUDE_PATH; ?>/images/footer/facebook.png"/></a>
            <a href="https://www.instagram.com/mazzilliadvogados/" target="_blank"><img src="<?= INCLUDE_PATH; ?>/images/footer/instagram.png"/></a>
            <!--<a href="https://twitter.com/" target="_blank"><img src="<?= INCLUDE_PATH; ?>/images/footer/twitter.png"/></a>-->
            <!--<a href="https://www.linkedin.com/in/" target="_blank"><img src="<?= INCLUDE_PATH; ?>/images/footer/linkedin.png"/></a>-->
            <a href="https://wa.me/5511999154058" target="_blank"><img src="<?= INCLUDE_PATH; ?>/images/footer/whatsapp.png"/></a>
            <!--<a href="https://www.youtube.com/" target="_blank"><img src="<?= INCLUDE_PATH; ?>/images/footer/youtube.png"/></a>-->
        </div>
        <p class="p_footer">Todos os direitos reservados. Dr. Antonio Luiz Mazzilli ®</p>
    </article>
</footer>

<div id="modalbook" class="modal-fade">
    <div class="modal-dialog">
        <?php
        $Read->ExeRead("tb_ebook", "WHERE ebook_status = 1 LIMIT 1");
        ?>
        <a href="<?= HOME . '/ebook/' . $Read->getResult()[0]['ebook_name']; ?>">
            <img src="<?= HOME . "/uploads/" . $Read->getResult()[0]['ebook_popup']; ?>" />
        </a>
        <div class="modal-close">
            <span class="lnr lnr-cross-circle"></span>
        </div>
    </div>
</div>


<!--<div id="modal_form_news" class="modal_news">
    <div class="modal_news_div" style="display: none;">
        <span class="close">&times;</span>
        <div class="content_flex content_modal">
            <div class="div_form">
                <div class="notify_site">
                    <div class="msg_notify"></div>
                </div>

                <form id="form_modal_news" method="post" action="newsletter">
                    <span class="title_modal">Newsletter</span>
                    <p style="color: #ccc;">Cadastre-se para receber nossas novidades!</p>
                    <div class="div_input">
                        <input type="text" name="new_name" placeholder="Seu Nome" class="inpt-null"/>
                        <span class="notfy_nome"></span>
                    </div>
                    <div class="div_input">
                        <input type="email" name="new_email" placeholder="Seu melhor e-mail" class="inpt-null"/>
                        <span class="notfy_email"></span>
                    </div>
                    <label class="label_check"> 
                        <span>Desejo receber eBooks gratuitamente.</span>
                        <input type="checkbox" checked="checked" name="new_type" value="all" class="inpt-null">
                        <span class="checkmark"></span>
                    </label>
                    <div class="div_input">
                        <button class="button_submit_logar" id="btn_form" type="submit">Entrar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>-->





