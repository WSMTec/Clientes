<section class="section_contato">
    <header class="section_contato_header content">
        <h1>Contatos</h1>
        <div class="sub_p">
            <div class="cols">
                <span class="lnr lnr-phone-handset"></span>
                <small>São Paulo/SP</small> <br/>
                11 3085-4648 / 11 3085-9246 / 11 99915-4058
                <br/>
                <span class="lnr lnr-phone-handset"></span>
                <small>Sumaré/SP</small> <br/>
                19 3828-8404 / 19 3803-4175
            </div>
            <div class="cols">
                <span class="lnr lnr-map-marker"></span>
               <small> Alameda Franca no 1331 11° andar / Jardim Paulista, São Paulo/SP - Cep: 01422-001</small>
                <br/>
                <span class="lnr lnr-map-marker"></span>
               <small> Rua Antonio do Valle Melo no 1078 / Centro, Sumaré/SP - Cep: 13170-011</small>
            </div>
            <div class="cols">
                <span class="lnr lnr-envelope"></span>
                almazzilli.adv@gmail.com
                <br>
                <!--<span class="lnr lnr-mic"></span> <a href="https://docs.google.com/forms/d/e/1FAIpQLSeq-pEKh6l32KM6oXL4_pzIuyCitlzCLMpvXVgDILa72vy9jg/viewform"> Pamfis SAC</a>-->
            </div>
        </div>
    </header>
    <div class="contato_div">
        <article class="article_contato">

            <div class="content">
                <?php
                $Contato = filter_input_array(INPUT_POST, FILTER_DEFAULT);
                if (isset($Contato) && isset($Contato['SendPostForm'])):
                    unset($Contato['SendPostForm']);
                    $Contato['Assunto'] = "Dr. Antonio Luiz Mazzilli - " . $Contato['assunto'];
                    $Contato['Mensagem'] = $Contato['mensagem'] . "<br/><br/><br/>Nome: {$Contato['nome']}<br/>E-mail: {$Contato['email']}<br/>Empresa: {$Contato['empresa']}<br/>Telefone: {$Contato['telefone']}";
                    $Contato['RemetenteNome'] = $Contato['nome'];
                    $Contato['RemetenteEmail'] = $Contato['email'];
                    $Contato['DestinoNome'] = 'Contato - Dr. Antonio Luiz Mazzilli';

                    $Read->FullRead("SELECT * FROM tb_configuration");
                    $Contato['DestinoEmail'] = ($Read->getResult()[0]['config_mail_d'] == '' ? 'contato@advocaciadeempresas.com.br/' : $Read->getResult()[0]['config_mail_d']);

                    $SendMail = new EmailContatos;
                    $SendMail->Enviar($Contato);

                    if ($SendMail->getError()):
                        Erro($SendMail->getError()[0], $SendMail->getError()[1]);
                    endif;
                endif;
                ?>
            </div>
            <form method="post" action="">
                <div class="smash">
                    <input type="text" name="nome" required="required" placeholder="Nome"/>
                    <input type="text" name="empresa" required="required" placeholder="Empresa"/>
                </div>
                <div class="smash">
                    <input type="tel" name="telefone" required="required" placeholder="Telefone"/>
                    <input type="email" name="email" required="required" placeholder="E-mail"/>
                </div>
                <div class="smash">
                    <input style="width: 100%" name="assunto" required="required" type="text" placeholder="Assunto"/>
                </div>
                <div class="smash">
                    <textarea style="resize: vertical; width: 100%;" name="mensagem" required="required"
                              placeholder="Mensagem"></textarea>
                </div>
                <div class="smash">
                    <input class="button_contato" value="Enviar Mensagem"
                           style="width: 100%; text-transform: uppercase; font-weight: 500;" type="submit"
                           name="SendPostForm"/>
                </div>
            </form>
        </article>
        <div class="maps">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3660.0305918529234!2d-46.60864838502417!3d-23.459360984733586!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94cef6890cf76a1f%3A0x13422cc5aa23b52a!2sRua%20Manuel%20Gaya%2C%201850%20-%20Vila%20Mazzei%2C%20S%C3%A3o%20Paulo%20-%20SP%2C%2002313-001!5e0!3m2!1spt-BR!2sbr!4v1609174351866!5m2!1spt-BR!2sbr"
                    width="100%" height="350" frameborder="0" style="border:0" allowfullscreen>sadsa
            </iframe>
        </div>
    </div>
</section>


