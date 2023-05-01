<header class="main_header">
    <div class="main_header_nav">
        <div class="logo" style="display: flex;
             align-items: center;">
            <img title="" alt="" src="<?= INCLUDE_PATH; ?>/images/logo/logo2.png" width="440"/>
            <!--<img style="" title="" alt="" src="<?= INCLUDE_PATH; ?>/images/logo/logo4.png" width="640"/>-->
        </div>
        <nav class="main_header_content_nav">
            <div class="nav_one"> 
                <ul class="main_header_content_nav_social"> 
                    <?php
                    $read = new Read;
                    $read->ExeRead("tb_uploads", "WHERE 1 = :id ORDER BY audio_id DESC", "id=1");
                    if ($read->getResult()) {
                        ?>
                        <li>
                            <button style="background-color: <?= $read->getResult()[0]['audio_btn']; ?>;
    color: <?= $read->getResult()[0]['audio_txt']; ?>;
    padding: 0.2em 1em;
    border-radius: 8px;
    border-color: #fff;
    border: none;" onClick="Play()">Ouçam nossa apresentação <span class="lnr lnr-volume-high"></span></button>
                            <audio id="audioval" style="height: 50px; background-color: #000;display: none;" controls="controls">
                                <source src="<?= HOME; ?>/adm/uploads/<?= $read->getResult()[0]['audio_file']; ?>" type="audio/mp3" />
                                seu navegador não suporta HTML5
                            </audio>
                        </li>
                        <?php
                    }
                    ?>


                    <li>
                          
                        <a title="telefone">
                            <img src="<?= INCLUDE_PATH; ?>/images/icones/telefone.png" width="14"/> (11) 3085-4648</a>
                    </li>
                    <li>
                        <a target="_blank" href="mailto:contato@advogadodefalencias.com.br"
                           title="e-mail contato@advogadodefalencias.com.br">
                            <img src="<?= INCLUDE_PATH; ?>/images/icones/email.png"
                                 width="17"/></a>
                    </li>
                    <!--                    <li>
                                            <a target="_blank" href="https://www.facebook.com/albertopretoadvocacia"
                                               title="Facebook Alberto Preto">
                                                <img src="<?= INCLUDE_PATH; ?>/images/icones/facebook.png"
                                                     width="12"/></a>
                                        </li>
                                        <li>
                                            <a target="_blank" href="https://www.instagram.com/alberto_preto/" title="Instagram Alberto Preto">
                                                <img
                                                    src="<?= INCLUDE_PATH; ?>/images/icones/instagram-logo.png" width="12"/></a>
                                        </li>
                    
                                        <li>
                                            <a target="_blank" href="https://www.linkedin.com/in/alberto-preto-ab448b10b?trk=hp-identity-name" title="Linkedin Alberto Preto">
                                                <img src="<?= INCLUDE_PATH; ?>/images/icones/linkedin.png"
                                                     width="12"/></a>
                                        </li>-->
                    <li>
                        <a target="_blank" href="https://wa.me/5511999154058" title="Whatsapp Dr. Antonio Luiz Mazzilli">
                            <img src="<?= INCLUDE_PATH; ?>/images/icones/whatsapp.png"
                                 width="14"/></a>
                    </li>
                    <li>
                        <a target="_blank" href="<?= HOME; ?>/adm" target="_top"
                           title="Área restrita" class="a_restrita">
                            <!--<img src="<?= INCLUDE_PATH; ?>/images/icones/login.png" width="12"/>-->
                            Painel</a>
                    </li>
                </ul>
            </div>
            <div>
                <ul class="main_header_content_nav_menu" style="    margin-top: 2%;">

                    <li><a href="<?= HOME ?>" title="">Home</a></li>

                    <li><a href="<?= HOME ?>/escritorio" title="">Quem somos</a></li>

                    <li><a href="<?= HOME ?>/equipe" title="">Equipe</a></li>

                    <li class="nav_menu_area_ancor">
                        <a href="<?= HOME ?>/areas" title="">Atuação</a>
                        <ul style="top: 66%;" class="main_header_content_nav_menu_area">
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
             <?php
                    $read = new Read;
                    $read->ExeRead("tb_uploads", "WHERE 1 = :id ORDER BY audio_id DESC", "id=1");
                    if ($read->getResult()) {
                        ?>
                        <div>
                            <button style="background-color: <?= $read->getResult()[0]['audio_btn']; ?>;
    color: <?= $read->getResult()[0]['audio_txt']; ?>;
    padding: 0.2em 1em;
    border-radius: 8px;
    border-color: #363636;
    border: none;
    position: fixed;
    left: 5px;
    bottom: 15px;" onClick="Play()">Ouçam nossa apresentação <span class="lnr lnr-volume-high"></span></button>
                            <audio id="audioval" style="height: 50px; background-color: #000;display: none;" controls="controls">
                                <source src="<?= HOME; ?>/adm/uploads/<?= $read->getResult()[0]['audio_file']; ?>" type="audio/mp3" />
                                seu navegador não suporta HTML5
                            </audio>
                        </div>
                        <?php
                    }
                    ?>
            <ul>
                <li><span class="icon-menu icon-notext content_mobile"></span>
                    <ul class="ul_sub_mobile ds_none">
                        <li><a href="<?= HOME ?>" title="">Home</a></li>
                        <li><a href="<?= HOME ?>/escritorio" title="">Quem somos</a></li>
                        <li><a href="<?= HOME ?>/equipe" title="">Equipe</a></li>
                        <li><a href="<?= HOME ?>/areas" title="">Atuação</a></li>
                        <li><a href="<?= HOME ?>/blog" title="">Blog</a></li>
                        <li><a href="<?= HOME ?>/contatos" title="">Contatos</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
    </div>
                          <script type="text/javascript">
      function Play()
      {
        var myAudio = document.getElementById("audioval");
        if(myAudio.paused) {
            myAudio.play();
        }
        else {
           myAudio.pause();
        }
      }
    </script>
</header>

<!--    <div class="content">-->

<!--    </div>-->


<!--FECHA CABEÇALHO-->