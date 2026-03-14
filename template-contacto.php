<?php /* Template Name: Contact */

$argsGenerales = array(
	'numberposts' => 1,
	'post_type'   => 'generales',
	'order'       => 'ASC',
);
	$generales = get_posts( $argsGenerales );
if ( $generales ) :
	foreach ( $generales as $general ) :
		$whatsappContacto      = get_post_meta( $general->ID, 'whatsapp_contacto', true );
		$emailContacto         = get_post_meta( $general->ID, 'email_contacto', true );
		$emailContacto2        = get_post_meta( $general->ID, 'email_2_contacto', true );
		$direccionContacto     = get_post_meta( $general->ID, 'direccion_contacto', true );
		$whatsappTextoContacto = get_post_meta( $general->ID, 'whatsapp_texto_contacto', true );
	endforeach;
	wp_reset_postdata();
	endif;


if ( have_posts() ) :
	while ( have_posts() ) :
		the_post();
		$thumb = get_the_post_thumbnail_url( $post->ID, 'full' );
	endwhile;
	endif;
?>

<?php get_header(); ?>

<?php
		get_template_part(
			'partials/intro-header',
			'intro-header',
			array(
				'url' => $thumb,
			)
		);
		?>

<div class="container">
	<section class="contact">
		<div class="contact--left">
			<!-- <form action="" method="post" name="contact-me">
				<h2>Mandar Mensaje</h2>
				<p>
					Si tiene alguna pregunta o necesita más información, utilice el siguiente formulario para enviarnos
					un mensaje.
				</p>
				<div class="contact__block">
					<input type="text" id="nombre" placeholder="Nombre" required>
				</div>
				<div class="contact__block">
					<input type="email" id="correo" placeholder="Correo" required>
				</div>
				<div class="contact__block">
					<textarea placeholder="Tu mensaje" id="message" rows="4" required></textarea>
				</div>
				<button name="submitContactForm" type="submit">
					Enviar mensaje
				</button>
				<div class="respuesta-contacto"></div>
			</form> -->
			<div class="form-7">
				<h2><?php echo get_field( 'titulo_contacto' ); ?></h2>
				<p>
					<?php echo get_field( 'descripcion_contacto' ); ?>
				</p>
				<?php
					echo do_shortcode( '[contact-form-7 id="61b7025" title="Formulario de contacto 1"]' );
				?>
			</div>

		</div>
		<div class="contact--right">
			<?php
			if ( $direccionContacto != '' ) :
				$address_for_url = urlencode( $direccionContacto );
				else :
					$address_for_url = '#';
				endif;
				?>
			<a href="<?php echo 'https://www.google.com.mx/maps/search/' . $address_for_url; ?>" target="_blank" class="contact__location contact__row">
				<div>
					<img src="<?php echo get_template_directory_uri() . '/assets/images/contact/map-fill.svg'; ?>" alt="">
				</div>
				<div>
					<h3>Oficinas</h3>
					<div class="contact__info">
						<?php echo $direccionContacto; ?>
					</div>
				</div>
			</a>
			<a href="https://wa.me/<?php echo $whatsappContacto; ?>
			<?php
			if ( $whatsappTextoContacto != '' ) :
				echo '?text=' . $whatsappTextoContacto;
endif;
			?>
			" target="_blank" 
				class="contact__whatsapp contact__row">
				<div>
					<img src="<?php echo get_template_directory_uri() . '/assets/images/contact/whatsapp-fill.svg'; ?>"
						alt="">
				</div>
				<div>
					<h3>Envíanos WhatsApp</h3>
					<div class="contact__info">
						<?php echo $whatsappContacto; ?>
					</div>
				</div>
			</a>
			<a href="https://wa.me/<?php echo $whatsappContacto; ?>
			<?php
			if ( $whatsappTextoContacto != '' ) :
				echo '?text=' . $whatsappTextoContacto;
endif;
			?>
			" target="_blank" class="banner-whatsapp">
				<div>
					Envíanos WhatsApp
				</div>
				<div>
					<img src="<?php echo get_template_directory_uri() . '/assets/images/contact/WhatsApp.png'; ?>" alt="">
				</div>
			</a>
			<div href="#" class="contact__whatsapp contact__row">
				<div>
					<img src="<?php echo get_template_directory_uri() . '/assets/images/contact/mail.svg'; ?>" alt="">
				</div>
				<div>
					<h3>Correo</h3>
					<div class="contact__info">
						<a href="mailto:<?php echo $emailContacto; ?>"><?php echo $emailContacto; ?></a>
						<a href="mailto:<?php echo $emailContacto2; ?>"><?php echo $emailContacto2; ?></a>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>


<?php get_footer(); ?>