<section class="section_areas_page">
    <header class="section_areas_page_header">
        <div class="content">
            <h1>ÁREAS DE ATUAÇÃO</h1>
            <p>
                O escritório Antonio Luiz Mazzilli & Advogados atua nas aréas de Falências, Recuperações Judiciais e Extrajudiciais e Advocacia Empresarial/Comercial
            </p>
        </div>
    </header>

    <div class="section_areas_div">
        <div class="content section_areas_div_div">
            <?php
            $Read = new Read;
            $Read->ExeRead("tb_areas", "WHERE area_status = 1 ORDER BY area_title ASC LIMIT 4 OFFSET 0 ");
            foreach ($Read->getResult() as $item):
                extract($item);
                ?>
                <a href="<?= HOME; ?>/area/<?= $area_name; ?>" class="ancor_areas">
                    <article class="section_areas_article">
                        <!--                        <div class="areas_img">
                                                    
                                                </div>-->
                        <div class="areas_cont">
                            <h2>
                                <img width="30" src="<?= HOME; ?>/uploads/<?= $area_icon; ?>"/>
                                <?= $area_title; ?>
                            </h2>
                            <p>
                                <?= $area_summary; ?>
                            </p>
                        </div>
                    </article>
                </a>
                <?php
            endforeach;
            ?>
        </div>
    </div>
</section>

