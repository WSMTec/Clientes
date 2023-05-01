<section class="section_escritorio">

    <header class="section_escritorio_header">
        <div class="content">
            <h1>Quem somos</h1>
            <div class="quem_s">
                <p>
                    <?php
                    $Read = new Read;
                    $Read->ExeRead("tb_configuration");
                    if ($Read->getResult()[0]['config_about'] !== '') {
                        echo $Read->getResult()[0]['config_about'];
                    }
                    ?>
                </p>
                <!--                <br/>
                                <p>
                                    
                                </p>-->
            </div>
        </div>
    </header>
    <div class="section_escritorio_div content">
        <!--<div class="content">-->
        <article class="section_escritorio_article">
            <h2>
                MISSÃO
            </h2>
            <p>
                <?php
                if ($Read->getResult()[0]['config_about_miss'] !== '') {
                    echo $Read->getResult()[0]['config_about_miss'];
                }
                ?>
            </p>
        </article>
        <article class="section_escritorio_article">
            <h2>
                VISÃO
            </h2>
            <p>
                <?php
                if ($Read->getResult()[0]['config_about_vis'] !== '') {
                    echo $Read->getResult()[0]['config_about_vis'];
                }
                ?>
            <p/>
        </article>
        <article class="section_escritorio_article">
            <h2>
                VALORES
            </h2>
            <p>
                <?php
                if ($Read->getResult()[0]['config_about_val'] !== '') {
                    echo $Read->getResult()[0]['config_about_val'];
                }
                ?>
            <p/>
        </article>
        <!--</div>-->
    </div>
</section>

