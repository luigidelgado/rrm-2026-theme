<?php
/**
 * Cross-sells
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/cross-sells.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 4.4.0
 */

defined( 'ABSPATH' ) || exit;

if ( $cross_sells ) : ?>

	<div class="slider-products cross-sells products">
		<?php
		$heading = apply_filters( 'woocommerce_product_cross_sells_products_heading', __( 'You may be interested in&hellip;', 'woocommerce' ) );

		if ( $heading ) :
			?>
            <div class="slider-products__header">
                <h2><?php echo esc_html( $heading ); ?></h2>
                <div class="slider-products__line">
                    <div></div>
                </div>
                <div class="slider-products__arrows">
                    <div class="swiper-button-prev-upsell">
                        <i class="icon-nav-left"></i>
                    </div>
                    <div class="swiper-button-next-upsell">
                    <i class="icon-nav-right"></i>
                    </div>
                </div>
            </div>
           
		<?php endif; ?>

		<?php //woocom merce_product_loop_start(); ?>
            <div class="swiper">
                <div class="swiper-wrapper">
                <?php foreach ( $cross_sells as $cross_sell ) : ?>

                    <?php
                        $post_object = get_post( $cross_sell->get_id() );

                        setup_postdata( $GLOBALS['post'] =& $post_object ); // phpcs:ignore WordPress.WP.GlobalVariablesOverride.Prohibited, Squiz.PHP.DisallowMultipleAssignments.Found
                    ?>
                        <div class="swiper-slide">
                    <?php
                        wc_get_template_part( 'content', 'product-slider' );
                    ?>
                        </div>
                <?php endforeach; ?>
                </div>
            </div>
		<?php //woocommerce_product_loop_end(); ?>

	</div>
	<?php
endif;

wp_reset_postdata();
