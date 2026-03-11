<?php
/**
 * The template for displaying archive pages.
 *
 * Learn more: https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package storefront
 */


get_header(); 
$argsGenerales = array(
'numberposts' => 1,
'post_type'   => 'generales',
'order'     => 'ASC',
);
$generales = get_posts($argsGenerales);
if ($generales) : foreach ($generales as $general) :
	$img_id = get_post_meta($general->ID, 'imagen_fondo_blog', true);
	$img = wp_get_attachment_image_src( $img_id, 'full' );
	
endforeach;
wp_reset_postdata();
endif;
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
    <div class="archive-content">
        <main>
            <div class="archive-posts">
                <?php 
					//global $paged;
					$paged = get_query_var('paged')? get_query_var('paged') : 1;
					$args = [
						'post_type' => 'post',
						//'posts_per_page' => 2, 
						'paged' => $paged,
                        'order'           => 'DESC',
                        'post_status'     => 'publish',
					];
					//$wp_query = new WP_Query($args);

					/*?><pre style="color: white;"><?php var_dump( $wp_query->posts ); ?></pre><?php*/

					//while ( $wp_query->have_posts() ) : $wp_query->the_post(); 


					if ( have_posts() ) : 

						while ( have_posts() ) : the_post();

						//get_template_part( 'template-parts/content', get_post_format() );
						$post = get_post();
						// Se arman los links de los shares
						$link = get_the_permalink($post->ID);
						$title = get_the_title( $post->ID );
						$facebookLink = "https://www.facebook.com/sharer/sharer.php?u=".$link."&title=".$title;
						$twitterLink = "http://twitter.com/intent/tweet?text=".$title."&url=".$link;
						//   $mail = "mailto:?subject=".$title."&body=".$link;
						$whatsapp = "https://web.whatsapp.com/send?text=".$title." - ".$link;
						
						$useragent=$_SERVER['HTTP_USER_AGENT'];
						
						if(preg_match('/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i',$useragent)||preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i',substr($useragent,0,4))) {
							$whatsapp = "whatsapp://send?text=".$title." - ".$link;
						}

						get_template_part( 
							'partials/entry-blog',
							'entry-blog',
							array(
								'url' => get_the_post_thumbnail_url( get_the_ID(), 'full'),
								'title' => get_the_title(),
								'time' => get_the_date(),
								'excerpt' => get_the_excerpt(),
								'url-post' => get_post_permalink(),
								'share-facebook' => $facebookLink,
								'share-twitter' => $twitterLink,
								'share-whatsapp' => $whatsapp
							)
						);

						// the_posts_pagination( array(
						// 	'mid_size' => 2,
						// 	'prev_text' => __( 'Anterior', 'textdomain' ),
						// 	'next_text' => __( 'Siguiente', 'textdomain' ),
						// ) );

						endwhile;
					else :

						echo '<p class="not-found-entries">' . __( 'No se han econtrado entradas.', 'storefront' ) . '</p>';
				
					endif;
                    wp_reset_postdata();  ?>
                <nav class="pagination-rrm">
                    <?php wpbeginner_numeric_posts_nav($wp_query->max_num_pages);?>
					<?php //wpbeginner_numeric_posts_nav(3);?>
                </nav>
                <!--<nav class="pagination-rrm">
                    <ul class="page-numbers">
                        <li><a class="prev page-numbers" href="#">&#171</a></li>
                        <li><a class="page-numbers" href="#">1</a></li>
                        <li><span aria-current="page" class="page-numbers current">2</span></li>
                        <li><a class="page-numbers" href="#">3</a></li>
                        <li><a class="next page-numbers" href="#">&#187</a></li>
                    </ul>
                </nav> -->
            </div>
			<?php
				if ( is_active_sidebar( 'bottom-blog' ) ):
			?>
				<div class="banner-rrm bottom-blog">
			<?php
					dynamic_sidebar( 'bottom-blog' );
			?>
				</div>
			<?php endif; ?>
        </main>
        <aside>
            <div class="aside-component recent-posts">
                <h2>Publicaciones recientes</h2>
                <?php getLastPosts(); ?>

            </div>
            <div class="aside-component categories">
                <h2>Categorias</h2>
                <ul><?php getCategories(); ?></ul>
            </div>
            <div class="aside-component tags">
                <h2>Tags</h2>
                <?php getTags(); ?>
            </div>
			<?php
				if ( is_active_sidebar( 'sidebar-blog' ) ):
			?>
				<div class="banner-rrm sidebar-blog">
			<?php
					dynamic_sidebar( 'sidebar-blog' );
			?>
				</div>
			<?php endif; ?>
        </aside>
    </div>
</div>
<!-- <div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php /*if ( have_posts() ) : */?>

			<header class="page-header">
				<?php
				/*
					the_archive_title( '<h1 class="page-title">', '</h1>' );
					the_archive_description( '<div class="taxonomy-description">', '</div>' );
					*/
				?>
			</header>

			<?php /*
			get_template_part( 'loop' );

		else :

			get_template_part( 'content', 'none' );

		endif;*/
		?>
	
		</main>
	</div> -->
<?php

do_action( 'storefront_sidebar' );
get_footer();