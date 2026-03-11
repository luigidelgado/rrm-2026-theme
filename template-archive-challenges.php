<?php /* Template Name: Archive Challenges */ ?>
<?php get_header();
$argsGenerales = array(
    'numberposts' => 1,
    'post_type'   => 'generales',
    'order'     => 'ASC',
    );
    $generales = get_posts($argsGenerales);
    if ($generales) : foreach ($generales as $general) :
        $img_id = get_post_meta($general->ID, 'imagen_fondo_desafios', true);
        $img = wp_get_attachment_image_src( $img_id, 'full' );
    endforeach;
    wp_reset_postdata();
    endif;

    $intro_desafios = get_post_meta($post->ID, 'intro_desafios', true);
    $texto_boton = get_post_meta($post->ID, 'texto_boton', true);
?>

<?php 
    get_template_part( 
        'partials/intro-header',
        'intro-header',
        array(
            'url' => $img[0]
        )
    );
?>
<div class="container">

    <section class="challenges">

        <?php 
                get_template_part( 
                    'partials/title-rrm',
                    'title-rrm',
                    array(
                        'section' => $intro_desafios
                    )
                );
            ?>

        <div class="challenges__content">

            <?php 
					$paged = get_query_var('paged')? get_query_var('paged') : 1;
					$args = [
						'post_type' => 'desafios',
						'posts_per_page' => -1, 
						'paged' => $paged,
                        'order'           => 'ASC',
                        'post_status'     => 'publish',
					];
					$wp_query = new WP_Query($args);

					while ( $wp_query->have_posts() ) : $wp_query->the_post(); 

                    $p_img = get_post_meta($post->ID, 'logo', true);
                    $patch = wp_get_attachment_image_src( $p_img, 'full' );
                    get_template_part( 
                        'partials/entry-challenge',
                        'entry-challenge',
                        array(
                            'url-image' => get_the_post_thumbnail_url( get_the_ID(), 'full'),
                            'url-medal' => $patch[0],
                            'category' => 'Touring',
                            'title' => get_the_title(),
                            'button-text' => $texto_boton,
                            'url' => get_post_permalink()
                        )
                    );
                    endwhile;
                    wp_reset_postdata();  ?>

            <?php  
                /*get_template_part( 
                        'partials/entry-challenge',
                        'entry-challenge',
                        array(
                            'url-image' => get_template_directory_uri().'/assets/images/challenges/pueblos-magicos.png',
                            'url-medal' => get_template_directory_uri().'/assets/images/logos_desafios/CARRETERAS FAMOSAS.png',
                            'category' => 'Touring',
                            'title' => 'Desafío méxico único',
                            'button-text' => 'Conoce más',
                            'url' => '#'
                        )
                    );*/

                ?>

        </div>

    </section>

    <!-- <nav class="pagination-rrm">

        <?php //wpbeginner_numeric_posts_nav($wp_query ->max_num_pages);?>
        
        <ul class="page-numbers">
            <li><a class="prev page-numbers" href="#">&#171</a></li>
            <li><a class="page-numbers" href="#">1</a></li>
            <li><span aria-current="page" class="page-numbers current">2</span></li>
            <li><a class="page-numbers" href="#">3</a></li>
            <li><a class="next page-numbers" href="#">&#187</a></li>
        </ul> 
    </nav>-->

</div>


<?php get_footer(); ?>