<?php /* Template Name: Patches */ ?>
<?php
get_header();

$args    = array(
	'numberposts' => -1,
	'post_type'   => 'significados_parches',
	'order'       => 'ASC',
);
$parches = get_posts( $args );

if ( have_posts() ) :
	while ( have_posts() ) :
		the_post();
		// INTRO SECCION////
		$intro_img_id = get_post_meta( $post->ID, 'imagen_seccion_intro', true );
		$intro_img    = wp_get_attachment_image_src( $intro_img_id, 'full' );

		// SLOGAN////
		$slogan = get_post_meta( $post->ID, 'seccion_slogan', true );

		// INTRO////
		$intro_titulo_b    = get_post_meta( $post->ID, 'intro_parches_titulo_blanco', true );
		$intro_titulo_r    = get_post_meta( $post->ID, 'intro_parches_titulo_rojo', true );
		$intro_desc        = get_post_meta( $post->ID, 'intro_parches_descripcion', true );
		$intro_desc2       = get_post_meta( $post->ID, 'intro_parches_descripcion_2', true );
		$intro_texto_boton = get_post_meta( $post->ID, 'intro_parches_texto_boton', true );
		$intro_url_boton   = get_post_meta( $post->ID, 'intro_parches_url_boton', true );
		$intro_id          = get_post_meta( $post->ID, 'intro_parches_imagen', true );
		$intro_bg          = wp_get_attachment_image_src( $intro_id, 'full' );

		// BANNER 2 RETOS////
		$b2_titulo      = get_post_meta( $post->ID, 'b2_titulo', true );
		$b2_descripcion = get_post_meta( $post->ID, 'b2_subtitulo', true );
		$b2_url         = get_post_meta( $post->ID, 'b2_url_boton', true );
		$b2_txt_url     = get_post_meta( $post->ID, 'b2_texto_boton', true );
		$b2_img         = get_post_meta( $post->ID, 'b2_imagen_fondo', true );
		$b2_bg          = wp_get_attachment_image_src( $b2_img, 'full' );

	endwhile;
	endif;
?>

<?php
	get_template_part(
		'partials/intro-header',
		'intro-header',
		array(
			'url' => $intro_img[0],
		)
	);
	?>
<div class="patches">
	<div class="container">
		<div class="patch-container">
			<div class="patch patch-row">
				<div class="patch__description">
					<h2>
						<?php echo $intro_titulo_b; ?> <span><?php echo $intro_titulo_r; ?></span>
					</h2>
					<div class="patch__the-content">
						<?php echo wpautop( $intro_desc ); ?>
						<?php
						/*
						<p>
							<?php echo $intro_desc; ?>
						</p>*/
						?>
						<a href="<?php echo esc_url( $intro_url_boton ); ?>">
							<?php echo $intro_texto_boton; ?>
						</a>
						<?php
						/*
						<p>
							<?php echo $intro_desc2; ?>
						</p>*/
						?>
						<?php echo wpautop( $intro_desc2 ); ?>
					</div>
				</div>
				<div class="patch__image">
					<img src="<?php echo esc_url( $intro_bg[0] ); ?>" alt="">
				</div>
			</div>

			<?php
			if ( $parches ) :
				foreach ( $parches as $parche ) :
					$imgPatch = get_the_post_thumbnail_url( $parche->ID, 'full' );
					?>
			<div class="patch patch-row">
				<div class="patch__description">
					<h2>
						<?php echo $parche->post_title; ?></h2>
					<div class="patch__the-content">
						<p><?php echo $parche->post_content; ?></p>
					</div>
				</div>
				<div class="patch__image">
					<img src="<?php echo esc_url( $imgPatch ); ?>" alt="">
				</div>
			</div>
					<?php
			endforeach;
				wp_reset_postdata();
			endif;
			?>
		</div>

		<?php
			get_template_part(
				'partials/blockquote',
				'blockquote',
				array(
					'content' => $slogan,
				)
			);
			?>
	</div>
</div>

<?php
	get_template_part(
		'partials/challenges-rrm',
		'challenges-rrm',
		array(
			'url-image'   => $b2_bg[0],
			'intro'       => $b2_descripcion,
			'title'       => $b2_titulo,
			'button-text' => $b2_txt_url,
			'url'         => $b2_url,
		)
	);
	?>

<?php get_footer(); ?>