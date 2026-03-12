<?php /* Template Name: History */ ?>
<?php


get_header();

$argTemp = array(
	'numberposts' => -1,
	'post_type'   => 'linea_temporal',
	'meta_key'    => 'fecha_linea_temporal',
	'orderby'     => 'fecha_linea_temporal',
	'order'       => 'ASC',
);

$lineasTemporales = get_posts( $argTemp );

// $argTemp = array(
// 'numberposts' => -1,
// 'post_type'   => 'linea_temporal',
// 'order'     => 'DESC',
// 'meta_query' => array(
// array(
// 'key' => 'fecha_acontecimiento',
// 'value' => date('Ymd'),
// 'compare' => '<',
// 'type' => 'DATE'
// )
// ),
// );

// $lineasTemporales = get_posts($argTemp);



if ( have_posts() ) :
	while ( have_posts() ) :
		the_post();
		// INTRO SECCION////
		$intro_img_id = get_post_meta( $post->ID, 'imagen_seccion_intro', true );
		$intro_img    = wp_get_attachment_image_src( $intro_img_id, 'full' );

		// ORIGEN////
		$origen_titulo      = get_post_meta( $post->ID, 'origen_titulo', true );
		$origen_descripcion = get_post_meta( $post->ID, 'origen_descripcion', true );
		$origen_img         = get_post_meta( $post->ID, 'origen_imagen', true );
		$origen_bg          = wp_get_attachment_image_src( $origen_img, 'full' );

		// SLOGAN////
		$historia_slogan = get_post_meta( $post->ID, 'seccion_slogan', true );

		// HISTORIA////
		$historia_titulo      = get_post_meta( $post->ID, 'linea_nombre_seccion', true );
		$historia_descripcion = get_post_meta( $post->ID, 'linea_titulo_seccion', true );

		// EXPERIENCIA////
		$exp_titulo = get_post_meta( $post->ID, 'exp_titulo', true );
		$exp_sub    = get_post_meta( $post->ID, 'exp_subtitulo', true );
		$exp_desc   = get_post_meta( $post->ID, 'exp_descripcion', true );
		$exp_img    = get_post_meta( $post->ID, 'exp_imagen', true );
		$exp_bg     = wp_get_attachment_image_src( $exp_img, 'full' );

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

<div class="container">
	<section class="history-intro">
		<div class="history-intro--left">
			<div class="history-intro__image">
				<img src="<?php echo $origen_bg[0]; ?>" alt="">
			</div>
		</div>
		<div class="history-intro--right">
			<div class="history-intro__info">
				<h2>
					<?php echo $origen_titulo; ?>
				</h2>
				<div class="history-intro__content">
					<?php echo $origen_descripcion; ?>
				</div>
			</div>
		</div>
	</section>

	<?php
		get_template_part(
			'partials/blockquote',
			'blockquote',
			array(
				'content' => $historia_slogan,
			)
		);
		?>

	<div class="line-separator"></div>

	<section class="history-rrm">

		<?php
			get_template_part(
				'partials/title-rrm',
				'title-rrm',
				array(
					'section' => $historia_titulo,
					'title'   => $historia_descripcion,
				)
			);
			?>

		<div class="history-rrm__content">
			<div class="history-rrm--left">
				<?php
						$index = 0;
				if ( $lineasTemporales ) :
					foreach ( $lineasTemporales as $line ) :
										$img = get_the_post_thumbnail_url( $line->ID, 'full' );
						?>
						<?php if ( $index == 0 ) { ?>
				<div class="tab-content-image tab-content-image--active">
					<?php } else { ?>
					<div class="tab-content-image">
						<?php } ?>
						<img src="<?php echo $img; ?>" alt="">
					</div>
						<?php
						++$index;
						endforeach;
					wp_reset_postdata();
						endif;
				?>
				</div>
				<div class="history-rrm--right">
					<div class="timeline-box">
						<div class="tabs">
							<?php
							$index = 0;
							if ( $lineasTemporales ) :
								foreach ( $lineasTemporales as $line ) :
																$fecha = get_post_meta( $line->ID, 'fecha_linea_temporal', true );
																$img   = get_the_post_thumbnail_url( $line->ID, 'full' );
									?>
									<?php if ( $index == 0 ) { ?>
							<div class="tab tab--active">
								<?php } else { ?>
								<div class="tab">
									<?php } ?>
									<span></span>
									<div><?php echo substr( $fecha, 0, 4 ); ?></div>
								</div>
									<?php
															++$index;
							endforeach;
								wp_reset_postdata();
						endif;
							?>
							</div>

							<?php
							$index = 0;
							if ( $lineasTemporales ) :
								foreach ( $lineasTemporales as $line ) :
																$fecha = get_post_meta( $line->ID, 'fecha_linea_temporal', true );
																$img   = get_the_post_thumbnail_url( $line->ID, 'full' );
									?>
									<?php if ( $index == 0 ) { ?>
							<div class="tab-content tab-content--active">
								<?php } else { ?>
								<div class="tab-content">
									<?php } ?>
									<h2><?php echo $line->post_title; ?></h2>
									<h3><?php echo substr( $fecha, 0, 4 ); ?></h3>
									<div class="tab-content__info">
										<?php echo $line->post_content; ?>
									</div>
								</div>
									<?php
															++$index;
							endforeach;
								wp_reset_postdata();
						endif;
							?>
							</div>
						</div>
					</div>
	</section>

	<section class="history-experience">
		<?php
			get_template_part(
				'partials/title-rrm',
				'title-rrm',
				array(
					'section' => $exp_sub,
					'title'   => $exp_titulo,
				)
			);
			?>

		<div class="history-experience__content">
			<div class="history-experience--left">
				<div>
					<?php echo $exp_desc; ?>
				</div>
			</div>
			<div class="history-experience--right">
				<img src="<?php echo $exp_bg[0]; ?>" alt="">
			</div>
		</div>

	</section>

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