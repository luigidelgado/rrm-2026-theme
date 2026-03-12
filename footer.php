<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package storefront
 */

?>

</div><!-- .col-full -->
</div><!-- #content -->

<?php // do_action( 'storefront_before_footer' ); ?>

<footer role="contentinfo">
	<!--  <div class="col-full">-->
	<?php
			/**
			 * Functions hooked in to storefront_footer action
			 *
			 * @hooked storefront_footer_widgets - 10
			 * @hooked storefront_credit         - 20
			 */
			// do_action( 'storefront_footer' );

		// Footer//
		$titulo_contacto       = get_field( 'titulo_contacto', 546 );
		$titulo_menu_izquierdo = get_field( 'titulo_menu_izquierdo', 546 );
		$titulo_menu_derecho   = get_field( 'titulo_menu_derecho', 546 );
		$texto_redes_sociales  = get_field( 'texto_redes_sociales', 546 );

	?>
	<!-- </div> -->
	<?php
			// do_action( 'rr_hook_footer' );
			$argsGenerales = array(
				'numberposts' => 1,
				'post_type'   => 'generales',
				'order'       => 'ASC',
			);
			$generales     = get_posts( $argsGenerales );
			if ( $generales ) :
				foreach ( $generales as $general ) :
					$whatsappContacto = get_post_meta( $general->ID, 'whatsapp_contacto', true );
					$emailContacto    = get_post_meta( $general->ID, 'email_contacto', true );
					$urlFacebook      = get_post_meta( $general->ID, 'url_facebook', true );
					$urlInstagram     = get_post_meta( $general->ID, 'url_instagram', true );
					$urlTwitter       = get_post_meta( $general->ID, 'url_twitter', true );
					$urlYoutube       = get_post_meta( $general->ID, 'url_youtube', true );
			endforeach;
				wp_reset_postdata();
			endif;
			$logoA = get_template_directory_uri() . '/assets/images/footer/logo_amarillo.png';
			$face  = get_template_directory_uri() . '/assets/images/footer/fb.png';
			$insta = get_template_directory_uri() . '/assets/images/footer/insta.png';
			// $twi = get_template_directory_uri().'/assets/images/footer/twitter.png';
			$twi   = get_template_directory_uri() . '/assets/images/footer/twitter.svg';
			$you   = get_template_directory_uri() . '/assets/images/footer/youtube.png';
			$whats = get_template_directory_uri() . '/assets/images/footer/whatsapp.png';
			$email = get_template_directory_uri() . '/assets/images/footer/email.png';
			?>

	<div class="rr_footer">
		<div class="rr_footer_container">
			<div class="rr_contact_footer">
				<div class="container">
					<div class="rr_data_contact">
						<h3><?php echo $titulo_contacto; ?></h3>
						<a target="_blank" href="https://wa.me/<?php echo $whatsappContacto; ?>"><img
								src="<?php echo $whats; ?>" alt="<?php echo $whatsappContacto; ?>">
							<?php echo $whatsappContacto; ?></a>
						<a href="mailto:<?php echo $emailContacto; ?>"><img src="<?php echo $email; ?>"
								alt="<?php echo $emailContacto; ?>">
							<?php echo $emailContacto; ?></a>
					</div>
					<div class="rr_menus_contact">
						<div class="rr_submenu_accesos">
							<p><?php echo $titulo_menu_izquierdo; ?></p>

							<?php rr_footer_left_nav(); ?>
						</div>
						<div class="rr_submenu_interesar">
							<p><?php echo $titulo_menu_derecho; ?></p>
							<?php rr_footer_right_nav(); ?>
						</div>
					</div>
				</div>
			</div>
			<div class="rr_social_footer">
				<div class="container">
					<div class="rr_footer_copyright">
						<?php $copyright = get_field( 'copyright', 546 ); ?>
						<?php $copyright_second_line = get_field( 'copyright_segunda_linea', 546 ); ?>
						<p><?php echo $copyright; ?></p>
						<p><?php echo $copyright_second_line; ?></p>
						<p>Este sitio está protegido por reCAPTCHA</p>
						<p>y Google.</p>
						<p> <a href="https://policies.google.com/privacy" target="_blank">Política de
								privacidad</a> y
							<a href="https://policies.google.com/terms" target="_blank">Términos de Servicio</a>.
						</p>
						<!-- <p>Copyright © <?php // echo date('Y'); ?> Rodando Rutas Mágicas</p>
						<p>Diseño web y desarrollo por g4a</p> -->
					</div>
					<a class="logo" href="<?php ( site_url() ); ?>"><img src="<?php echo $logoA; ?>" alt="logo"></a>
					<div class="rr_footer_social">
						<p><?php echo $texto_redes_sociales; ?></p>
						<div class="rr_social">
							<a target="_blank" href="<?php echo $urlFacebook; ?>"><img src="<?php echo $face; ?>"
									alt="<?php echo $urlFacebook; ?>"></a>
							<a target="_blank" href="<?php echo $urlInstagram; ?>"><img src="<?php echo $insta; ?>"
									alt="<?php echo $urlInstagram; ?>"></a>
							<a target="_blank" href="<?php echo $urlTwitter; ?>"><img src="<?php echo $twi; ?>"
									alt="<?php echo $urlTwitter; ?>"></a>
							<a target="_blank" href="<?php echo $urlYoutube; ?>"><img src="<?php echo $you; ?>"
									alt="<?php echo $urlYoutube; ?>"></a>
						</div>

					</div>
				</div>
			</div>
			<div class="rr_line_footer">
				<div class="rr_line line_1"></div>
				<div class="rr_line line_2"></div>
				<div class="rr_line line_3"></div>
				<div class="rr_line line_4"></div>
				<div class="rr_line line_5"></div>
				<div class="rr_line line_6"></div>
			</div>
		</div>
	</div>
</footer><!-- #colophon -->

<?php // do_action( 'storefront_after_footer' ); ?>

</div><!-- #page -->

<?php wp_footer(); ?>

</body>

</html>