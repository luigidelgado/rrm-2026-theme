<?php
/**
 * The template for displaying full width pages.
 *
 * Template Name: Profile
 *
 * @package storefront
 */

get_header(); ?>

	<?php 
		// get_template_part( 
		// 	'partials/intro-header',
		// 	'intro-header',
		// 	array(
		// 		'url' => get_template_directory_uri().'/assets/images/checkout/headeimage.png'
		// 	)
		// );
	?> 
    <div class="container">
        <div class="profile">
            <div class="profile__breadcrumb">
                <?php woocommerce_breadcrumb();  ?> 
            </div>
      
            <?php
                while ( have_posts() ) :
                    the_post();

                    do_action( 'storefront_page_before' );

                    get_template_part( 'content', 'page' );

                    /**
                     * Functions hooked in to storefront_page_after action
                     *
                     * @hooked storefront_display_comments - 10
                     */
                    do_action( 'storefront_page_after' );

                endwhile; // End of the loop.
            ?>
        </div>
	</div><!-- #primary -->

<?php
get_footer();
