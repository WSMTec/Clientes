<?php
if (!$Adm):
    header('Location: painel.php');
    exit();
endif;
?>
<main class="content">
    <?php
    $office = filter_input(INPUT_GET, "posts", FILTER_VALIDATE_INT);
    $Read = new Read;
    $Read->ExeRead("n_clientes", "WHERE id_cli = :id", "id={$office}");
    ?>

    <header class="header-box">
        <h2 class="header-box-h">Gerar Formúlarios</h2>
        <div class="header-box-btn">
            <a class="btn-default btn-blue" href="?exe=forms/index"><span class="lnr lnr-list"></span>  Fomulários</a>
        </div>
    </header>
    <div class="loader">
        <div class="processing"></div>
    </div>

    <?php
    extract($Read->getResult()[0]);
    ?>
    <div class="box content-box">
        <div class="tabs-container">

            <input type="radio" name="tabs" class="tabs" id="tab1" checked>
            <label for="tab1">Procuração</label>
            <div>
                <div style="width: 100%; margin: 2em auto;">
                    <a style="padding: 1em; background-color: #444; color: #fff; border-radius: 7px;" class="word-export" href="javascript:void(0)"> Exportar para Word </a> 
                </div>
                <div id="page-content">
                    <p style="width:50%;
                       margin:auto;
                       text-align:justify;
                       font-family:calibri;
                       font-size:24px;
                       line-height:30px;">
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>PROCURAÇÃO “AD JUDICIA”</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br>
                        <br>
                        <br>

                    </p>
                    <p style="width:80%;
                       float:left;
                       font-family:calibri;
                       font-size:16px;
                       text-align:justify;
                       line-height:15px;
                       margin:0;">

                        <b>Outorgante:</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b><?php echo $nome_cli ?></b>, <?php echo $nacion_cli ?>, <?php echo $civil_cli ?>, <?php echo $prof_cli ?>, portador(a) da cédula de identidade R.G. n.º <?php echo $rg_cli ?> e inscrito(a) no CPF/MF sob n.º <?php echo $cpf_cli ?>, residente e domiciliado(a) à Rua: <?php echo $rua_cli ?>, <?php echo $numeroC_cli ?>, <?php echo $bairro_cli ?> CEP <?php echo $cep_cli ?>
                        <br><br>
                        <b>Outorgados:</b>&nbsp;&nbsp;&nbsp;	<b>MARCELO D’AURIA SAMPAIO – OAB/SP 227.677</b>, com escritório nesta Capital, à Rua Manuel Gaya, 1850, Jd. Tremembé, São Paulo, CEP: 02313-001, Tel. 2981-7285, onde receberão intimações e publicações;<br>
                        <br>
                        <b>Poderes:</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;	amplos e ilimitados, podendo receber, dar quitações, assinar, transigir, desistir, acordar, firmar compromissos, apresentar primeiras e ultimas declarações, substabelecer, propor em juízo quaisquer ações de interesse da Outorgante, defendê-la nas que lhe foram contrárias, acompanhando umas e outras em todos os seus atos, termos e incidentes, perante qualquer Juízo, Instância ou Tribunal, em quaisquer Comarcas, inclusive com os poderes do artigo 991 Inciso III do CPC, representá-la em repartições Administrativas, sejam elas Federais, Estaduais ou Municipais, usar todos os recursos cabíveis, fazer provas, justificações, requerer e tomar vista em processos ou expedientes administrativos, tomar ciência, fazer defesas administrativas, recorrer de decisões administrativas, praticando enfim, todos os demais atos necessários ao fiel cumprimento deste mandato.<br>
                        <br>
                        <br>
                        <br>




                        <b>São Paulo, 16 de julho de 2015</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <br>
                        <br>

                        ___________________________
                        <br>
                        <b>Outorgante</b>

                    </p>
                </div>
            </div>


            <input type="radio" name="tabs" class="tabs" id="tab2">
            <label for="tab2">Declaração</label>
            <div>
                <div style="width: 100%; margin: 2em auto;">
                    <a style="padding: 1em; background-color: #444; color: #fff; border-radius: 7px;" class="word-exports" href="javascript:void(0)"> Exportar para Word </a> 
                </div>
                <div id="page-contents">
                    <span style="color:#000000;  font-weight:lighter; font-family:Times New Roman;"><center><strong> <h2 style="text-decoration:underline; font-size:18px;letter-spacing:10px;margin-top:100px;margin-bottom:100px;">DECLARAÇÃO</h2> </strong>
                        </center></span>


                    <div id="texto">
                        <p style="width:50%;
                           margin:auto;
                           text-align:justify;
                           font-family:Times New Roman;
                           font-size:18px;
                           line-height:40px;
                           margin-bottom:100px;">
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Eu, <span style="text-transform:uppercase;"><?php echo $nome_cli; ?></span>, <?php echo $nacion_cli; ?>, <?php echo $civil_cli; ?>, <?php echo $prof_cli; ?>, portador(a) de cédula de identidade R.G. n.º <?php echo $rg_cli; ?> e inscrito(a) no CPF/MF sob n.º <?php echo $cpf_cli; ?>, residente e domiciliado(a) à Rua: <?php echo $rua_cli; ?>, <?php echo $numeroC_cli; ?>, <?php echo $bairro_cli; ?>, CEP <?php echo $cep_cli; ?> <?php echo $cidade_cli; ?>, <?php echo $estado_cli; ?>. Declaro, sob as penas da lei, que não tenho condições de arcar com eventuais custas processuais sem prejuízo do meu sustento e da minha família, requerendo, portanto os benefícios da Justiça Gratuita, nos termos da Lei 1.060/50.
                        </p>
                    </div>


                    <?php
                    switch (date("m")) {
                        case "01": @$mes = 'Janeiro';
                            break;
                        case "02": @$mes = 'Fevereiro';
                            break;
                        case "03": @$mes = 'Março';
                            break;
                        case "04": @$mes = 'Abril';
                            break;
                        case "05": @$mes = 'Maio';
                            break;
                        case "06": @$mes = 'Junho';
                            break;
                        case "07": @$mes = 'Julho';
                            break;
                        case "08": @$mes = 'Agosto';
                            break;
                        case "09": @$mes = 'Setembro';
                            break;
                        case "10": @$mes = 'Outubro';
                            break;
                        case "11": @$mes = 'Novembro';
                            break;
                        case "12": @$mes = 'Dezembro';
                            break;
                    }
                    ?>
                    <p style="width:50%;
                       margin:auto;
                       text-align:right;
                       font-family:Times New Roman;
                       font-size:18px;
                       line-height:40px;
                       margin-bottom:100px;"">
                        <span>
                            São Paulo, <?php
                            $data = date("d") . " de " . $mes . " de " . date("Y");
                            echo $data
                            ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        </span>
                        <br>
                        <br>
                        <br>

                        ____________________________________<br>

                    </p>

                </div>
            </div>  



            <input type="radio" name="tabs" class="tabs" id="tab3">
            <label for="tab3">Contrato</label>
            <div>
                <div style="width: 100%; margin: 2em auto;">
                    <a style="padding: 1em; background-color: #444; color: #fff; border-radius: 7px;" class="word-exportt" href="javascript:void(0)"> Exportar para Word </a> 
                </div>
                <div id="page-contentt">
                    <span style="color:#000000;  font-weight:lighter; font-family:Verdana;">
                        <center>
                            <strong> 
                                <h2 style="text-decoration:underline; font-size:18px;margin-top:100px;margin-bottom:100px;">
                                    CONTRATO DE PRESTAÇÃO DE <br><br> SERVIÇOS ADVOCATÍCIOS
                                </h2> 
                            </strong>
                        </center></span>



                    <p style="width:50%;
                       margin:auto;
                       text-align:justify;
                       font-family:Verdana;
                       font-size:14px;
                       line-height:30px;
                       margin-bottom:50px;">
                        <b>CONTRATANTE: <?php echo $nome_cli; ?>,</b>  <?php echo $nacion_cli; ?>,  <?php echo $civil_cli; ?>,  <?php echo $prof_cli; ?>, portador(a) da Cédula de Identidade RG nº  <?php echo $rg_cli; ?> SSP/SP e inscrito(a) no CPF/MF nº  <?php echo $cpf_cli; ?>, residente e domiciliado(a) à Rua: <?php echo $rua_cli; ?>, nº  <?php echo $numeroC_cli; ?>,   <?php echo $bairro_cli; ?>  <?php echo $cidade_cli; ?> -  <?php echo $estado_cli; ?>, CEP:  <?php echo $cep_cli; ?><br>
                        <br>

                        <b>CONTRATADO: DR. MARCELO D’AURIA SAMPAIO,</b> inscrito na Ordem dos Advogados do Brasil sob nº 227.677, com escritório à Rua Manuel Gaya, 1850, Jd. Tremembé, São Paulo, CEP: 02313-001 doravante denominado CONTRATADO;<br>
                        <br>

                        <b>
                            Resolvem celebrar o presente contrato nos termos e cláusulas adiante descritas:<br>
                        </b>
                    </p>
                    <h3 style="width:99%;padding:1%;border:1px solid #000;text-align:center;font-size:14px;font-family:verdana;font-weight:bold;margin:0;"><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;CLÁUSULA PRIMEIRA: DOS SERVIÇOS&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        </b></h3>
                    <p style="width:50%;
                       margin:auto;
                       text-align:justify;
                       font-family:Verdana;
                       font-size:14px;
                       line-height:30px;margin-bottom:0;">
                        <b>Serviços Profissionais:</b> <span style="color:red">propor ação Trabalhista em face de Credial Empreendimentos e Serviços Ltda. e Banco Pecúnia S/A (campo para preenchimento)</span>


                        <b>Profissional Especializado:</b> o CONTRATADO e/ou as pessoas contratadas ou agenciadas, sob sua responsabilidade profissional, e designados para execução dos serviços profissionais.

                    </p>

                    <h3 style="width:99%;padding:1%;border:1px solid #000;text-align:center;font-size:14px;font-family:verdana;font-weight:bold;"><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;CLÁUSULA SEGUNDA: DO OBJETO E DO PRAZO&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></h3>

                    <p style="width:50%;
                       margin:auto;
                       text-align:justify;
                       font-family:Verdana;
                       font-size:14px;
                       line-height:30px;">
                        O presente instrumento tem como OBJETO a prestação de serviços advocatícios pelo CONTRATADO, conforme condições definidas na cláusula primeira.<br>
                        <br>


                        Parágrafo Primeiro: Qualquer alteração dos serviços profissionais aqui contratados será objeto de novo contrato ou de aditivo formal entre CONTRATANTE e CONTRATADO<br>
                        <br>


                        Parágrafo Único: O Presente contrato é celebrado por prazo indeterminado.


                    </p>
                    <h3 style="width:99%;padding:1%;border:1px solid #000;text-align:center;font-size:14px;font-family:verdana;font-weight:bold;"><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;CLÁUSULA TERCEIRA: DOS HONORÁRIOS&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></h3>

                    <p style="width:50%;
                       margin:auto;
                       text-align:justify;
                       font-family:Verdana;
                       font-size:14px;
                       line-height:30px;">
                        O CONTRATANTE, em decorrência dos serviços prestados, pagará ao CONTRATADO a título de honorários advocatícios, <span style="color:red;">o valor correspondente a 25% dos valores brutos obtidos na aludida ação trabalhista objeto do presente contrato (campo para preenchimento)</span><br>
                        <br>


                        <b>Parágrafo Primeiro:</b> Caso haja morte ou incapacidade civil do CONTRATADO, seus sucessores ou representante legal receberão os honorários na proporção do trabalho realizado.<br>
                        <br>


                        <b>Parágrafo Segundo:</b> Havendo acordo entre o CONTRATANTE e a parte contrária, este acordo não prejudicará o recebimento dos honorários contratados nem os de sucumbência por parte do CONTRATADO.<br>
                        <br>


                        <b>Parágrafo Terceiro:</b> Os eventuais honorários de sucumbência arbitrados por decisão judicial pertencem com exclusividade ao CONTRATADO, não se compensando em hipótese alguma com os honorários ora contratado.<br>
                        <br>


                        <b>Parágrafo Quarto:</b> Todas as despesas que forem autorizadas expressamente pelo CONTRATANTE e incorridas comprovadamente pelo CONTRATADO, mediante apresentação de documentação comprobatória, tais como: custas processuais, taxas judiciárias, cópias xerográficas, autenticações e reconhecimento de firmas e outras que se fizerem necessárias ao fiel cumprimento deste contrato, serão reembolsadas de imediato pelo CONTRATANTE. 


                    </p>
                    <h3 style="width:99%;padding:1%;border:1px solid #000;text-align:center;font-size:14px;font-family:verdana;font-weight:bold;"><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;CLÁUSULA QUARTA: DA TAXA DE MANUTENÇÃO&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></h3>


                    <p style="width:50%;
                       margin:auto;
                       text-align:justify;
                       font-family:Verdana;
                       font-size:14px;
                       line-height:30px;">
                        <span style="color:red">ISENTO (campo para Preenchimento)</span>


                    </p>
                    <b><h3 style="width:99%;padding:1%;border:1px solid #000;text-align:center;font-size:14px;font-family:verdana;font-weight:bold;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;CLÁUSULA QUINTA: DA CONFIDENCIALIDADE&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></h3>
                    <p style="width:50%;
                       margin:auto;
                       text-align:justify;
                       font-family:Verdana;
                       font-size:14px;
                       line-height:30px;">

                        O CONTRATADO obriga-se a manter sigilo em relação a todas as informações a que tiver acesso no exercício dos serviços contratados, utilizando essas informações dentro dos estritos limites éticos da advocacia.


                    </p>
                    <b><h3 style="width:99%;padding:1%;border:1px solid #000;text-align:center;font-size:14px;font-family:verdana;font-weight:bold;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;CLÁUSULA SEXTA: DAS PENALIDADES&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></h3>
                    <p style="width:50%;
                       margin:auto;
                       text-align:justify;
                       font-family:Verdana;
                       font-size:14px;
                       line-height:30px;">

                        O inadimplemento do CONTRATANTE verificado pelo simples vencimento de prazo estabelecido ou data fixada, relativamente às parcelas contratadas neste instrumento, sejam elas verbas principais ou acessórias, valores parciais ou totais e que sejam de sua responsabilidade, implicará na sua constituição em mora, de pleno direito, independentemente de notificação, interpelação ou protesto judiciais ou extrajudiciais, em decorrência do que a partir de então, considerar-se-ão vencidas as eventuais parcelas vincendas e, sobre o total do débito apurado incidirão juros moratórios de 1% (um por cento) ao mês e correção monetária pelos índices da Tabela Pratica do Tribunal de Justiça do Estado de São Paulo e multa de 20% (vinte por cento) sobre o saldo devedor.

                    </p>
                    <b><h3 style="width:99%;padding:1%;border:1px solid #000;text-align:center;font-size:14px;font-family:verdana;font-weight:bold;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;CLÁUSULA SÉTIMA: DA RESCISÃO&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h3></b>
                    <p style="width:50%;
                       margin:auto;
                       text-align:justify;
                       font-family:Verdana;
                       font-size:14px;
                       line-height:30px;">
                        O presente contrato poderá ser rescindido no caso do descumprimento dos seus termos e condições.
                        <br>
                        <br>

                        <b>Parágrafo Único:</b> No caso de rescisão antecipada, fica estabelecida que, se iniciado algum ato por parte do CONTRATADO, independente da fase em que ocorrer o substabelecimento ou renúncia do feito é reconhecida pelo CONTRATANTE como sendo dívida líquida e certa a percentagem da metade dos honorários aqui estipulados.

                    </p>
                    <b><h3 style="width:99%;padding:1%;border:1px solid #000;text-align:center;font-size:14px;font-family:verdana;font-weight:bold;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;CLÁUSULA OITAVA: DA DENÚNCIA&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h3></b>
                    <p style="width:50%;
                       margin:auto;
                       text-align:justify;
                       font-family:Verdana;
                       font-size:14px;
                       line-height:30px;">
                        Este contrato poderá ser denunciado por qualquer das partes, a qualquer tempo, bastando apenas, prévia notificação por escrito à outra parte, com antecedência mínima de 30 (trinta) dias, em cujo prazo as partes cumprirão as obrigações eventualmente pendentes.

                    </p>
                    <h3 style="width:99%;padding:1%;border:1px solid #000;text-align:center;font-size:14px;font-family:verdana;font-weight:bold;"><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;CLÁUSULA NONA: DAS DISPOSIÇÕES GERAIS&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></h3>

                    <p style="width:50%;
                       margin:auto;
                       text-align:justify;
                       font-family:Verdana;
                       font-size:14px;
                       line-height:30px;">

                        Os casos omissos neste contrato serão admitidos á luz da legislação vigente e/ou dos usos e costumes, quando em direitos admitidos.<br>
                        <br>


                        Os direitos e obrigações decorrentes do presente contrato não poderão ser, de qualquer forma, cedidos ou transferidos por qualquer das partes.<br>
                        <br>


                        A tolerância das partes a qualquer infrigência às disposições ora contratadas não implicarão em renúncia, novação ou alteração ora pactuadas.
                    </p>
                    <b><h3 style="width:99%;padding:1%;border:1px solid #000;text-align:center;font-size:14px;font-family:verdana;font-weight:bold;"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;CLÁUSULA DÉCIMA: DO FORO&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h3></b>
                    <p style="width:50%;
                       margin:auto;
                       text-align:justify;
                       font-family:Verdana;
                       font-size:14px;
                       line-height:30px;
                       margin-top:0;">

                        As partes elegem o Foro Central da Comarca de São Paulo, Capital, para dirimir quaisquer dúvidas decorrentes do presente contrato, renunciando expressamente qualquer outro por mais privilegiado que seja.<br>
                        <br>


                        E assim, por estarem justas e contratadas, as partes assinam o presente contrato em 02 (duas) vias de igual teor e forma, para um só efeito, na presença de 02 (duas) testemunhas, abaixo qualificadas.<br>
                        <br>




                        <br>
                    </p>
                    <p style="width:50%;
                       margin:auto;
                       text-align:justify;
                       font-family:Verdana;
                       font-size:14px;
                       line-height:30px;
                       margin-top:0;">
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;São Paulo 16 de julho de 2015&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                        <br>
                        <br>
                        <br>


                        <b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;CONTRATANTE&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b>

                        <br>
                        <br>
                        <br>


                        <b> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;CONTRATADO&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </b>

                        <br>
                        <br>
                        <br>


                        <b><u>TESTEMUNHAS:</u></b>

                        <br>
                        <br>
                        <br>
                    </p>

                    <p style="width:50%;
                       margin:auto;
                       font-family:Verdana;
                       font-size:14px;
                       line-height:30px;
                       margin-bottom:100px;">
                        ________________________ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ________________________<br>
                        Nome: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Nome:<br>
                        CPF: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; CPF: 

                    </p>
                </div>
            </div>
        </div>

    </div>
</main>
