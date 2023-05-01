<?php
$EbookMail = filter_input_array(INPUT_POST, FILTER_DEFAULT);
if (!isset($EbookMail) && !isset($EbookMail['SendEbookForm'])):
    header('Location: ' . HOME . DIRECTORY_SEPARATOR . '404');
endif;
$Ebook = $EbookMail['ebook'];
unset($EbookMail['SendEbookForm'], $EbookMail['ebook']);
?>

<section class="section_confirm">
    <header class="section_confirm_header">
        <div class="content">
            <?php
            $Read = new Read;
            $Read->ExeRead("tb_ebook", "WHERE ebook_name = :e LIMIT 1", "e={$Ebook}");
            extract($Read->getResult()[0]);

            $Read->ExeRead("tb_newsletter", "WHERE new_email = :mail", "mail={$EbookMail['new_email']}");
            if ($Read->getRowCount() < 1):
                $Create = new Create();
                $Create->ExeCreate("tb_newsletter", $EbookMail);
            endif;

            $EbookMail = array_map('strip_tags', $EbookMail);
            $EbookMail = array_map('trim', $EbookMail);


//            $Mail['Assunto'] = "Seu eBook está pronto! Advocacia Alberto Preto";
//            $Mail['Mensagem'] = "A Advocacia Alberto Preto agradece o seu interesse."
//                    . "<br/> Para baixar o ebook <b>{$ebook_title}</b>, basta clicar no botão abaixo: <br/><br/><br/>"
//                    . "<a href='" . HOME . "/download/{$ebook_name}' style='padding: 0.7em 1em;
//                        background-color: rgb(38, 51, 94);
//                        border: 1px solid transparent;
//                        border-radius: 5px;
//                        text-decoration: none;
//                        color: #ffffff;
//                        font-weight: 300;'>Baixar eBook</a> <br/><br/><br/>";
//            $Mail['RemetenteNome'] = "Advocacia Alberto Preto";
//            $Mail['RemetenteEmail'] = "advocacia@albertopreto.adv.br";
//            $Mail['DestinoNome'] = "{$EbookMail['new_name']}";
//            $Mail['DestinoEmail'] = "{$EbookMail['new_email']}";
            $SendMail = new EmailContato;
            $SendMail->Enviar($Mail);
            if ($SendMail->getError()):
                ?>
                <div class="emoji">
                    <img src="<?= INCLUDE_PATH . '/images/icones/happy.png' ?>"/>
                </div>
                <h1>Tudo certo!!! <br/> <?= $EbookMail['new_name']; ?>, enviamos seu eBook para o e-mail <?= $EbookMail['new_email']; ?></h1>
                <p><a href="<?= HOME . '/blog'; ?>" class="section_confirm_ancor">Conheça nosso blog</a></p>
                <?php
            endif;
            ?>
        </div>
    </header>
</section>


