<?php
/**
 * The template for displaying full width pages.
 *
 * Template Name: Contenido exclusivo
 *
 * @package storefront
 */

get_header(); ?>

	<?php 
		get_template_part( 
			'partials/intro-header',
			'intro-header',
			array(
				'url' => get_template_directory_uri().'/assets/images/checkout/headeimage.png'
			)
		);
	?>
    <div class="container">
		<?php 
		$message_key = 'content_restricted_message_no_products';
			$message = WC_Memberships_User_Messages::get_message( $message_key);
			if ( $message ) : ?>
				<div class="woocommerce">
					<div class="woocommerce-info wc-memberships-restriction-message wc-memberships-message wc-memberships-content-restricted-message">
						<?php echo $message; ?>    
					</div>
				</div>
			<?php
			endif;
		?>
	</div><!-- #primary -->

<?php
get_footer();
