<?php
if ($Link->getData()):
    $Read = new Read;
    extract($Link->getData());
else:
    header('Location: ' . HOME . DIRECTORY_SEPARATOR . '404');
endif;
?>
<section class="section_areas_page">
    <header class="section_areas_page_header">
        <div class="content">
            <h1><?= $area_title; ?></h1>
        </div>
    </header>

    <div class="section_areas_div">
        <div class="content section_areas_div_area">
            <div style="width: 100%">
                <p>
                    <?= $area_content; ?>
                </p>
            </div>

            <article class="section_areas_div_area_article">
                <h2>Alguma dúvida na <?= $area_title; ?>?</h2>
                <p style="margin-bottom: 3%">
                    <?php
                    $Contato = filter_input_array(INPUT_POST, FILTER_DEFAULT);
                    if (isset($Contato) && isset($Contato['SendPostForm'])):
                        unset($Contato['SendPostForm']);
                        $Contato['Assunto'] = $Contato['area'] . " Dr. Antonio Luiz Mazzilli - " . $Contato['assunto'];
                        $Contato['Mensagem'] = $Contato['mensagem'] . "<br/><br/><br/>Nome: {$Contato['nome']}<br/>E-mail: {$Contato['email']}<br/>Telefone: {$Contato['telefone']}";
                        $Contato['RemetenteNome'] = $Contato['nome'];
                        $Contato['RemetenteEmail'] = $Contato['email'];
                        $Contato['DestinoNome'] = 'Site - Dr. Antonio Luiz Mazzilli';

                        $Read->FullRead("SELECT * FROM tb_configuration");
                        $Contato['DestinoEmail'] = ($Read->getResult()[0]['config_mail_d'] == '' ? 'contato@advocaciadeempresas.com.br' : $Read->getResult()[0]['config_mail_d']);

                        $SendMail = new EmailContatos;
                        $SendMail->Enviar($Contato);

                        if ($SendMail->getError()):
                            Erro($SendMail->getError()[0], $SendMail->getError()[1]);
                        endif;
                    endif;
                    ?>
                </p>
                <form method="post" action="">
                    <div class="form_area_div">
                        <input type="text" placeholder="Nome" name="nome"/>
                        <input type="tel" placeholder="Telefone" name="telefone"/>
                    </div>

                    <input type="email" placeholder="Email" name="email"/>
                    <input type="text" placeholder="Assunto" name="assunto"/>
                    <input type="hidden" value="<?= $area_title ?>" name="area"/>

                    <textarea name="mensagem" placeholder="Mensagem"></textarea>
                    <button name="SendPostForm" type="submit">Solicitar ajuda</button>
                </form>
            </article>

        </div>
    </div>
</section>

