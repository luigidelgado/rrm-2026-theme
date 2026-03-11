<?php
/**
 * The Template for displaying all single products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

get_header( 'shop' ); ?>

<?php 

	$argsGenerales = array(
		'numberposts' => 1,
		'post_type'   => 'generales',
		'order'     => 'ASC',
	);

	$generales = get_posts($argsGenerales);

	if ($generales) : foreach ($generales as $general) :
		$img_id = get_post_meta($general->ID, 'imagen_fondo_productos', true);
		$img = wp_get_attachment_image_src( $img_id, 'full' );
	endforeach;

	wp_reset_postdata();
	endif;

    get_template_part( 
        'partials/intro-header',
        'intro-header',
        array(
            'url' => $img[0]
        )
    );
?>

<div class="container">
	<?php
		/**
		 * woocommerce_before_main_content hook.
		 *
		 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
		 * @hooked woocommerce_breadcrumb - 20
		 */
		//do_action( 'woocommerce_before_main_content' );
	?>
        <div class="product-content">
            <?php while ( have_posts() ) : ?>
                <?php the_post(); ?>

                <?php 
					wc_get_template_part( 'content', 'single-product' ); 
				?>

            <?php endwhile; // end of the loop. ?>
        </div>
	<?php
		/**
		 * woocommerce_after_main_content hook.
		 *
		 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
		 */
		//do_action( 'woocommerce_after_main_content' );
	?>

	<?php
		/**
		 * woocommerce_sidebar hook.
		 *
		 * @hooked woocommerce_get_sidebar - 10
		 */
		do_action( 'woocommerce_sidebar' );
	?>
</div>
<?php
get_footer( 'shop' );

/* Omit closing PHP tag at the end of PHP files to avoid "headers already sent" issues. */
