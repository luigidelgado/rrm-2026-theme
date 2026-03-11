<?php /* Template Name: Frequently Asked Questions */ ?>
<?php get_header();
    $args = array(
    'numberposts' => -1,
    'post_type'   => 'preguntas',
    'order'     => 'ASC',
    'tax_query' => array(
        array(
            'taxonomy' => 'tipo-de-pregunta-frecuente',
            'field' => 'slug',
            'terms' => 'preguntas-generales',
        )
    ),
    );
    $faqs = get_posts($args);

    $argsReglas = array(
        'numberposts' => 5,
        'post_type'   => 'reglas',
        'order'     => 'ASC',
        );
        $reglas = get_posts($argsReglas);


    if (have_posts()): while (have_posts()) : the_post();
        ////INTRO SECCION////
        $intro_img_id = get_post_meta($post->ID, 'imagen_seccion_intro', true);
        $intro_img = wp_get_attachment_image_src( $intro_img_id, 'full' );

        ////BENEFICIOS////
        $bene_titulo = get_post_meta($post->ID, 'b_beneficios_titulo', true);
        $bene_subtitulo = get_post_meta($post->ID, 'b_beneficios_subtitulo', true);
        $bene_tboton = get_post_meta($post->ID, 'b_beneficios_texto_boton', true);
        $bene_url = get_post_meta($post->ID, 'b_beneficios_url_boton', true);
        $bene_img_id = get_post_meta($post->ID, 'b_beneficios_imagen_fondo', true);
        $bene_img = wp_get_attachment_image_src( $bene_img_id, 'full' );
        $thumb = get_the_post_thumbnail_url($post->ID, 'full');

        ////FAQ////
        $titulo = get_post_meta($post->ID, 'titulo_principal', true);
        $titulo_reglas = get_post_meta($post->ID, 'titulo_reglas_de_participacion', true);
        $subtitulo_reglas = get_post_meta($post->ID, 'subtitulo_reglas_de_participacion', true);
    endwhile;
    endif; 
?>

<?php 
    get_template_part( 
        'partials/intro-header',
        'intro-header',
        array(
            'url' => $thumb
        )
    );
?>

<div class="container">
    <section class="faq">
        <h1>
            <?php echo $titulo ?>
        </h1>
        <div class="faq__boxes">

            <?php
            if ($faqs) : foreach ($faqs as $faq) :
            ?>
            <div class="faq-box">
                <button type="button">
                    <?php echo $faq->post_title ?>
                    <span></span>
                </button>
                <div class="faq-box__content">
                    <?php echo $faq->post_content ?>
                </div>
            </div>

            <?php
            endforeach;
            wp_reset_postdata();
            endif;?>
        </div>
    </section>

    <section class="rules">
        <?php 
            get_template_part( 
                'partials/title-rrm',
                'title-rrm',
                array(
                    'section' => $titulo_reglas,
                    'title' => $subtitulo_reglas
                )
            );
        ?>
        <div class="rules__content desktop">
            <div class="rules__tabs">
                <?php
                $index = 0;
                    if ($reglas) : foreach ($reglas as $regla) :
                    ?>
                <?php  if ($index == 0) { ?>
                <div class="rule-tab rule-tab--active">
                    <?php  } else { ?>
                    <div class="rule-tab">
                        <?php  } ?>
                        <?php echo $regla->post_title ?>
                    </div>
                    <?php
                    $index++;
                    endforeach;
                    wp_reset_postdata();
                    endif;
                    ?>
                </div>

                <?php
                $index = 0;
                    if ($reglas) : foreach ($reglas as $regla) :
                        $reglaImg = get_the_post_thumbnail_url($regla->ID, 'full');
                    ?>
                <?php  if ($index == 0) { ?>
                <div class="rule-info rule-info--active">
                    <?php  } else { ?>
                    <div class="rule-info">
                        <?php  } ?>
                        <div>
                            <img src="<?php echo $reglaImg ?>" alt="<?php echo $regla->post_title ?>">
                        </div>
                        <div>
                            <?php echo $regla->post_content ?>
                        </div>

                    </div>
                    <?php
                    $index++;
                    endforeach;
                    wp_reset_postdata();
                    endif;
                    ?>
                </div>

                <!-- Accordion for mobile only (Same content of rules__content desktop )-->
                <div class="rules__content mobile">
                    <div class="accordion">

                        <?php
                    if ($reglas) : foreach ($reglas as $regla) :
                        $reglaImg = get_the_post_thumbnail_url($regla->ID, 'full');
                    ?>
                        <div class="accordion-item">
                            <button id="accordion-button-1" aria-expanded="false">
                                <span class="accordion-title">
                                    <?php echo $regla->post_title ?>
                                </span></button>
                            <div class="accordion-content">
                                <div>
                                    <img src="<?php echo $reglaImg ?>" alt="<?php echo $regla->post_title ?>">
                                </div>
                                <div>
                                    <?php echo $regla->post_content ?>
                                </div>
                            </div>
                        </div>
                        <?php
                    endforeach;
                    wp_reset_postdata();
                    endif;
                    ?>
                    </div>
                </div>
    </section>

    <?php 
        get_template_part( 
            'partials/benefits',
            'benefits',
            array(
                'title' => $bene_titulo,
                'paragraph' => $bene_subtitulo,
                'boton-text' => $bene_tboton,
                'boton-url' => $bene_url,
                'image-url' => $bene_img[0]
            )
        );
    ?>

</div>




<?php get_footer(); ?>