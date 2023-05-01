<?php
if (!$Adm) :
    header('Location: ../../painel.php');
    die;
endif;
?>
<main class="content">
    <!--<div class="div-header">-->
    <header class="header-box">
        <h2 class="header-box-h">Cadastro de processos no sistema</h2>
        <div class="header-box-btn">
            <a class="btn-default btn-blue" href="?exe=process/index"><span class="lnr lnr-list"></span>  Processos</a>
        </div>
    </header>
    <div class="loader">
        <div class="processing"></div>
    </div>
    <!--</div>-->

    <div class="box content-box">
        <form method="post" id="form-process" class="form-services form-horizontal" action="process" enctype="multipart/form-data">
            <div class="row-m">
                <label>
                    <span class="lnr lnr-layers"></span> Cliente
                </label>
                <select class="inpt-null" name="id_cli">
                    <option></option>
                    <?php
                    $Read = new Read;
                    $Read->FullRead("SELECT * FROM n_clientes");
                    foreach ($Read->getResult() as $v):
                        ?>
                        <option value="<?= $v['id_cli']; ?>"><?= $v['nome_cli']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="row-m">
                <label>
                    <span class="lnr lnr-layers"></span> Processo
                </label>
                <select required name="proc_cli" type="text" id="proc_cli"  > 
                    <option value="TRABALHISTA" >TRABALHISTA</option>
                    <option value="CIVEL" >CIVEL</option>
                    <option value="CRIMINAL" >CRIMINAL</option>
                    <option value="CONSUMIDOR" >CONSUMIDOR</option>
                    <option value="FAMILIA" >FAMILIA</option>
                    <option value="IMOBILIARIO" >IMOBILIARIO</option>
                    <option value="CERTIDOES" >CERTIDÕES</option>
                    <option value="FALENCIA E RECUPERCAO" > FALÊNCIA E RECUPERÇÃO</option>
                    <option value="OUTROS">OUTROS</option>
                </select>
            </div>
            <div class="row-f">
                <label>
                    <span class="lnr lnr-graduation-hat"></span>  N° Processo
                </label>
                <input class="inpt-null" name="procn_cli" type="text"/>
            </div>
            <div class="row-f">
                <label>
                    <span class="lnr lnr-graduation-hat"></span>  Vara
                </label>
                <input class="inpt-null" name="vara_cli" type="text"/>
            </div>
            <div class="row-f">
                <label>
                    <span class="lnr lnr-graduation-hat"></span>  Fórum
                </label>
                <input class="inpt-null" name="forum_cli" type="text"/>
            </div>
            <div class="row-f">
                <label>
                    <span class="lnr lnr-text-align-left"></span>   Recursos
                </label>
                <textarea class="inpt-null " name="recu_cli" type="text"></textarea>
            </div>
            <div class="row-f">
                <label>
                    <span class="lnr lnr-graduation-hat"></span>  Ação
                </label>
                <input class="inpt-null" name="acao_cli" type="text"/>
            </div>
            <div class="row-f">
                <label>
                    <span class="lnr lnr-graduation-hat"></span>  Part. Contraria
                </label>
                <input class="inpt-null" name="cont_cli" type="text"/>
            </div>
            <div class="row-f">
                <label>
                    <span class="lnr lnr-graduation-hat"></span>  Adv. Parte Contraria
                </label>
                <input class="inpt-null" name="advcont_cli" type="text"/>
            </div>
            <div class="row-f">
                <label>
                    <span class="lnr lnr-graduation-hat"></span>  Tel. Part. Contraria
                </label>
                <input class="inpt-null" name="telcont_cli" type="text"/>
            </div>
            <div class="row-f">
                <label>
                    <span class="lnr lnr-text-align-left"></span>   Observações
                </label>
                <textarea class="inpt-null " name="obscont_cli" type="text"></textarea>
            </div>

            <div class="row-btn">
                <!--<input name="post_author" type="hidden" value="<?= $userlogin['user_id']; ?>"/>-->
                <button id="btn-form" class="btn-green btn-default" type="submit"><span class="lnr lnr-checkmark-circle"></span> Salvar</button>
            </div>
        </form>
    </div>
</main>