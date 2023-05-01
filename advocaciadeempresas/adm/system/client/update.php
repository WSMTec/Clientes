<?php
if (!$Adm):
    header('Location: painel.php');
    exit();
endif;
?>
<main class="content">
    <?php
    $getOffice = filter_input(INPUT_GET, "posts", FILTER_DEFAULT);
//    var_dump($getOffice);
    ?>

    <header class="header-box">
        <h2 class="header-box-h">Editar perfil do cliente</h2>
        <div class="header-box-btn">
            <a class="btn-default btn-blue" href="?exe=client/index"><span class="lnr lnr-list"></span>  Clientes</a>
        </div>
    </header>

    <?php
    $Read = new Read;
    $Read->ExeRead("n_clientes", "WHERE id_cli = :id", "id={$getOffice}");
    extract($Read->getResult()[0]);
    ?>
    <div class="box content-box">
        <form id="form-client-update" method="post" class="form-client-update" action="client-update">
            <div class="row-f">
                <header>
                    <h3>
                        <span class="lnr lnr-user"></span> Dados Pessoais
                    </h3>
                </header>
            </div>
            <div class="row-m">
                <label>
                    Nome
                </label>
                <input autocomplete="off" class="inpt-null" name="nome_cli" type="text" value="<?= $nome_cli; ?>"/>
            </div>
            <div class="row-m">
                <label>
                    E-mail
                </label>
                <input class="inpt-null" name="email_cli" value="name@domain.com "type="email" value="<?= $email_cli; ?>"/>
            </div>
            <div class="row-m">
                <div class="row-m">
                    <label>
                        Sexo
                    </label>
                    <select class="inpt-null" name="sexo_cli">
                        <option></option>
                        <option <?= ($sexo_cli === "Masculino" ? 'selected="selected"' : ''); ?> value="Masculino">Masculino</option>
                        <option <?= ($sexo_cli === "Feminino" ? 'selected="selected"' : ''); ?> value="Feminino">Feminino</option>
                    </select>
                </div>
                <div class="row-m">
                    <label>
                        Data de Aniversário
                    </label>
                    <input autocomplete="off" class="inpt-null" name="nasc_cli" type="date" value="<?= $nasc_cli; ?>"/>
                </div>
            </div>

            <div class="row-m">
                <div class="row-m">
                    <label>
                        RG
                    </label>
                    <input autocomplete="off" class="inpt-null" name="rg_cli" type="text" value="<?= $rg_cli; ?>"/>
                </div>

                <div class="row-m">
                    <label>
                        CPF/CNPJ
                    </label>
                    <input autocomplete="off" class="inpt-null" name="cpf_cli" type="text" value="<?= $cpf_cli; ?>"/>
                </div>
            </div>

            <div class="row-m">
                <div class="row-m">
                    <label>
                        Estado civil
                    </label>
                    <select class="inpt-null" name="civil_cli">
                        <option></option>
                        <option <?= ($civil_cli === "Casado" ? 'selected="selected"' : ''); ?> value="Casado">Casado(a)</option>
                        <option <?= ($civil_cli === "Solteiro" ? 'selected="selected"' : ''); ?> value="Solteiro">Solteiro(a)</option>
                        <option <?= ($civil_cli === "Divorciado" ? 'selected="selected"' : ''); ?> value="Divorciado">Divorciado(a)</option>
                    </select>
                </div>

                <div class="row-m">
                    <label>
                        Nacionalidade
                    </label>
                    <input autocomplete="off" class="inpt-null" name="nacion_cli" type="text" value="<?= $nacion_cli; ?>"/>
                </div>
            </div>
            <div class="row-m">
                <label>
                    Pai
                </label>
                <input autocomplete="off" class="inpt-null" name="pai_cli" type="text" value="<?= $pai_cli; ?>"/>
            </div>

            <div class="row-m">
                <label>
                    Mãe
                </label>
                <input autocomplete="off" class="inpt-null" name="mae_cli" type="text" value="<?= $mae_cli; ?>"/>
            </div>

            <div class="row-m">
                <label>
                    CTPS
                </label>
                <input autocomplete="off" class="inpt-null" name="ctps_cli" type="text" value="<?= $ctps_cli; ?>"/>
            </div>

            <div class="row-m">
                <label>
                    PIS
                </label>
                <input autocomplete="off" class="inpt-null" name="pis_cli" type="text" value="<?= $pis_cli; ?>"/>
            </div>

            <div class="row-m">
                <label>
                    Profissão
                </label>
                <input autocomplete="off" class="inpt-null" name="prof_cli" type="text" value="<?= $prof_cli; ?>"/>
            </div>
            <div class="row-f">
                <label>
                    Observação do cliente
                </label>
                <textarea name="obs_cli"> <?= $obs_cli; ?></textarea>
            </div>

            <div class="row-f">
                <header>
                    <h3>
                        <span class="lnr lnr-apartment"></span> Dados de contato 
                    </h3>
                </header>
            </div>

            <div class="row-m">
                <label>
                    Telefone celular
                </label>
                <input class="inpt-null" name="tel_cli" type="text" value="<?= $tel_cli; ?>"/>
            </div>
            <div class="row-m">
                <label>
                    Telefone celular
                </label>
                <input class="inpt-null" name="telC_cli" type="text" value="<?= $telC_cli; ?>"/>
            </div>
            <div class="row-m">
                <label>
                    Telefone comercial
                </label>
                <input class="inpt-null" name="telR_cli" type="text" value="<?= $telR_cli; ?>"/>
            </div>
            <div class="row-m">
                <div class="row-m">
                    <label>
                        Cep
                    </label>
                    <input id="cep" class="inpt-null" name="cep_cli" type="text" value="<?= $cep_cli; ?>"/>
                </div>  
                <div class="row-m">
                    <label>
                        Estato
                    </label>
                    <input value="SP" id="uf" class="inpt-null" name="estado_cli" type="text" value="<?= $estado_cli; ?>"/>
                </div>
            </div>

            <div class="row-m">
                <div class="row-m">
                    <label>
                        Cidade
                    </label>
                    <input value="São Paulo" id="localidade" class="inpt-null" name="cidade_cli" type="text" value="<?= $cidade_cli; ?>"/>
                </div>
                <div class="row-m">
                    <label>
                        Bairro
                    </label>
                    <input id="bairro" class="inpt-null" name="bairro_cli" type="text" value="<?= $bairro_cli; ?>"/>
                </div>
            </div>
            <div class="row-m">
                <label>
                    Rua
                </label>
                <input id="logradouro" class="inpt-null" name="rua_cli" type="text" value="<?= $rua_cli; ?>"/>
            </div>
            <div class="row-m">
                <div class="row-m">
                    <label>
                        N° Casa
                    </label>
                    <input id="numero" class="inpt-null" name="numeroC_cli" type="number" value="<?= $numeroC_cli; ?>"/>
                </div>
                <div class="row-m">
                    <label>
                        Complemento
                    </label>
                    <input class="inpt-null" name="comple_cli" type="text" value="<?= $comple_cli; ?>"/>
                </div>
            </div>

            <div class="row-btn">
                <input name="id_cli" type="hidden" value="<?= $id_cli; ?>"/>
                <button id="btn-form" class="btn-green btn-default" type="submit"><span class="lnr lnr-checkmark-circle"></span> Atualizar Usuário</button>
            </div>
        </form>
    </div>
</main>
