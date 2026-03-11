<?php
/**
 * The template for displaying full width pages.
 *
 * Template Name: Custom RRM
 *
 * @package storefront
 */

get_header(); ?>

	<?php 

        if ( has_post_thumbnail() ) {
            $thumbnail_id = get_post_thumbnail_id( $post->ID );
            $thumbnail_url = wp_get_attachment_image_src( $thumbnail_id, 'full' );
            $thumbnail_url = $thumbnail_url[0]; // This will echo the URL of the full size featured image
        }
        else{
            $thumbnail_url = get_template_directory_uri().'/assets/images/checkout/headeimage.png';
        }
		get_template_part( 
			'partials/intro-header',
			'intro-header',
			array(
				'url' => $thumbnail_url
			)
		);
	?>
    <div class="container">
		<?php
			while ( have_posts() ) :
				the_post();

				do_action( 'storefront_page_before' );

				//get_template_part( 'content', 'page' );

				?>
				<article id="post-<?php echo $post->ID?>" class="post-<?php echo $post->ID?> page type-page status-publish hentry">
	   
				<div class="entry-content">
					<?php the_content(); ?>
				</div>
				
				</article>

				<?php
				/**
				 * Functions hooked in to storefront_page_after action
				 *
				 * @hooked storefront_display_comments - 10
				 */
				do_action( 'storefront_page_after' );

			endwhile; // End of the loop.
		?>
	</div><!-- #primary -->

<?php
get_footer();
