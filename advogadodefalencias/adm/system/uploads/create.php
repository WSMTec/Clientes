<main class="content">
    <header class="header-box">
        <h2 class="header-box-h">Cadastro de uploads no sistema</h2>
        <div class="header-box-btn">
            <a class="btn-default btn-blue" href="?exe=uploads/index"><span class="lnr lnr-list"></span>  Uploads</a>
        </div>
    </header>
    <div class="loader">
        <div class="processing"></div>
    </div>
    <!--    <div class="progress">
            <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 75%"></div>
        </div>-->
    <div class="box content-box">
        <form id="form-upload" method="post" enctype="multipart/form-data" class="form-upload" action="upload">
            <div class="row-m">
                <label>
                    <span class="lnr lnr-graduation-hat"></span>   Nome
                </label>
                <input class="inpt-null" name="audio_title" type="text"/>
            </div>
            <div class="row-m">
                <label>
                    <span class="lnr lnr-upload"></span>  Upload
                </label>
                <input class="inpt-null" name="audio_file" type="file"/>
            </div>
            <!--            <div class="row-f">
                            <label>
                                <span class="lnr lnr-text-align-left"></span>   Descrição
                            </label>
                            <textarea class="inpt-null" name="DescUp"></textarea>
                        </div>-->
            <div class="row-f">
                <label>
                    <span class="lnr lnr-apartment"></span>   Tipo
                </label>

                <select class="select_option" name="audio_type">
                    <option value=""></option>
                    <option value="pdf">PDF</option>
                    <option value="audio">AUDIO</option>
                    <option value="video">VIDEO</option>
                    <option value="audiosite">AUDIO SITE</option>
                </select>
            </div>
            <div class="div_link" style="    width: 100%; display: none;">
            <div class="row-f" style="    justify-content: space-around !important;
    margin-top: 15px !important;">
             
                        <div class="content-input" style="text-align: center;
    display: flex;
    justify-content: center;
    flex-wrap: wrap;">
                            <label class="input-color-label-txt" for="input-color-txt" style="height: auto !important;padding: 0 !important;">
                                Escolha uma cor para o texto!
                        
                            </label>
                            <div class="input-color-container-txt">
                                <input name="audio_txt" id="input-color-txt" class="input-color" type="color">
                            </div>

                        </div>

                        <div class="content-input" style="text-align: center;
    display: flex;
    justify-content: center;
    flex-wrap: wrap;">
                            <label class="input-color-label" for="input-color" style="height: auto !important;padding: 0 !important;">
                                Escolha uma cor para o fundo!
                          
                            </label>
                            <div class="input-color-container">
                                <input name="audio_btn" id="input-color" class="input-color" type="color">
                            </div>
                        </div>
</div>
</div>
            <div class="row-btn">
                <button id="btn-form" class="btn-green btn-default" type="submit"><span class="lnr lnr-checkmark-circle"></span> Salvar Upload</button>
            </div>
        </form>
    </div>
</main>
