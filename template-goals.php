<?php /* Template Name: Goals */ ?>
<?php
get_header();
	$mision  = get_template_directory_uri() . '/assets/images/home/mision/mision.png';
	$vision  = get_template_directory_uri() . '/assets/images/home/mision/vision.png';
	$valores = get_template_directory_uri() . '/assets/images/home/mision/valores.png';

	$argsObjetivos = array(
		'numberposts' => -1,
		'post_type'   => 'objetivos',
		'order'       => 'ASC',
	);
	$objetivosPost = get_posts( $argsObjetivos );

	if ( have_posts() ) :
		while ( have_posts() ) :
			the_post();
			// INTRO SECCION////
			$intro_img_id = get_post_meta( $post->ID, 'imagen_seccion_intro', true );
			$intro_img    = wp_get_attachment_image_src( $intro_img_id, 'full' );

			// MISION////
			$mision_titulo    = get_post_meta( $post->ID, 'hacemos_titulo_seccion', true );
			$mision_subtitulo = get_post_meta( $post->ID, 'hacemos_subtitulo_seccion', true );
			$mision_tizq      = get_post_meta( $post->ID, 'hacemos_titulo_izquierda', true );
			$mision_tc        = get_post_meta( $post->ID, 'hacemos_titulo_centro', true );
			$mision_tder      = get_post_meta( $post->ID, 'hacemos_titulo_derecha', true );
			$mision_dizq      = get_post_meta( $post->ID, 'hacemos_descripcion_izquierda', true );
			$mision_dc        = get_post_meta( $post->ID, 'hacemos_descripcion_centro', true );
			$mision_dder      = get_post_meta( $post->ID, 'hacemos_descripcion_derecha', true );

			// HISTORIA////
			$h_titulo      = get_post_meta( $post->ID, 'historia_titulo', true );
			$h_descripcion = get_post_meta( $post->ID, 'historia_descripcion', true );
			$h_tboton      = get_post_meta( $post->ID, 'historia_texto_boton', true );
			$h_link        = get_post_meta( $post->ID, 'historia_url_boton', true );
			$h_url         = get_permalink( $h_link );
			$h_slogan      = get_post_meta( $post->ID, 'historia_slogan_derecha', true );
			$h_img_iz      = get_post_meta( $post->ID, 'historia_imagen_izquierda', true );
			$h_img_izq     = wp_get_attachment_image_src( $h_img_iz, 'full' );
			$h_img_d       = get_post_meta( $post->ID, 'historia_imagen_derecha', true );
			$h_img_der     = wp_get_attachment_image_src( $h_img_d, 'full' );

			// BENEFICIOS////
			$bene_titulo    = get_post_meta( $post->ID, 'b_beneficios_titulo', true );
			$bene_subtitulo = get_post_meta( $post->ID, 'b_beneficios_subtitulo', true );
			$bene_tboton    = get_post_meta( $post->ID, 'b_beneficios_texto_boton', true );
			$bene_link      = get_post_meta( $post->ID, 'b_beneficios_url_boton', true );
			$bene_url       = get_permalink( $bene_link );
			$bene_img_id    = get_post_meta( $post->ID, 'b_beneficios_imagen_fondo', true );
			$bene_img       = wp_get_attachment_image_src( $bene_img_id, 'full' );

			// OBJETIVOS////
			$acordion_titulo    = get_post_meta( $post->ID, 'acordion_objetivos_titulo', true );
			$acordion_subtitulo = get_post_meta( $post->ID, 'acordion_objetivos_subtitulo', true );
			$acordion_img_id    = get_post_meta( $post->ID, 'acordion_objetivos_imagen', true );
			$acordion_img       = wp_get_attachment_image_src( $acordion_img_id, 'full' );

			// BANNER 2 RETOS////
			$b2_titulo      = get_post_meta( $post->ID, 'b2_titulo', true );
			$b2_descripcion = get_post_meta( $post->ID, 'b2_subtitulo', true );
			$b2_url         = get_post_meta( $post->ID, 'b2_url_boton', true );
			$b2_txt_url     = get_post_meta( $post->ID, 'b2_texto_boton', true );
			$b2_img         = get_post_meta( $post->ID, 'b2_imagen_fondo', true );
			$b2_bg          = wp_get_attachment_image_src( $b2_img, 'full' );

			$thumb = get_the_post_thumbnail_url( $post->ID, 'full' );
	endwhile;
	endif;

	$argsGenerales = array(
		'numberposts' => 1,
		'post_type'   => 'generales',
		'order'       => 'ASC',
	);
	$generales     = get_posts( $argsGenerales );
	if ( $generales ) :
		foreach ( $generales as $general ) :
			$accordionObjetivosTitulo    = get_post_meta( $general->ID, 'acordion_objetivos_titulo', true );
			$accordionObjetivosSubtitulo = get_post_meta( $general->ID, 'acordion_objetivos_subtitulo', true );
			$accordionObjetivosImagen    = get_post_meta( $general->ID, 'acordion_objetivos_imagen', true );
	endforeach;
		wp_reset_postdata();
	endif;

	?>
<div id="rr_goals">
	<?php
		get_template_part(
			'partials/intro-header',
			'intro-header',
			array(
				'url' => $thumb,
			)
		);
		?>
	<section id="history">
		<div class="container">
			<div class="content_history">
				<div class="left_content">
					<h2><?php echo $h_titulo; ?></h2>
					<?php /*<p><?php echo $h_descripcion ?></p> */ ?>
					<?php echo wpautop( $h_descripcion ); ?>
					<?php // var_dump($h_link); ?>
					<a href="<?php echo esc_url( $h_link ); ?>"><?php echo $h_tboton; ?></a>
					<img src="<?php echo esc_url( $h_img_izq[0] ); ?>" alt="mision">
				</div>
				<div class="right_content">
					<img src="<?php echo esc_url( $h_img_der[0] ); ?>" alt="mision">
					<h3><?php echo $h_slogan; ?></h3>
				</div>
			</div>
		</div>
	</section>

	<section id="home_mision">
		<div class="container">
			<div class="content_mision">
				<div class="top_content">
					<p><?php echo $mision_subtitulo; ?></p>
					<h2><?php echo $mision_titulo; ?></h2>
				</div>
				<div class="down_content">
					<div class="card_mision">
						<img src="<?php echo esc_url( $mision ); ?>" alt="mision">
						<h3><?php echo $mision_tizq; ?></h3>
						<p><?php echo $mision_dizq; ?></p>
					</div>
					<div class="card_mision center_card">
						<img src="<?php echo esc_url( $vision ); ?>" alt="vision">
						<h3><?php echo $mision_tc; ?></h3>
						<p><?php echo $mision_dc; ?></p>
					</div>
					<div class="card_mision">
						<img src="<?php echo esc_url( $valores ); ?>" alt="valores">
						<h3><?php echo $mision_tder; ?></h3>
						<p><?php echo $mision_dder; ?></p>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section id="goals_banner_1">
		<div class="container ">
			<div class="content_banner">
				<div class="bg_banner" style="background-image:url(<?php echo esc_url( $bene_img[0] ); ?>);">
					<div class="left_content">
						<h2><?php echo $bene_titulo; ?></h2>
						<p><?php echo $bene_subtitulo; ?></p>
						<a href="<?php echo esc_url( $bene_link ); ?>"><?php echo $bene_tboton; ?></a>
					</div>
				</div>

			</div>
		</div>
	</section>

	<section id="history_accordion">
		<div class="container">
			<div class="top_content">
				<p><?php echo $accordionObjetivosTitulo; ?></p>
				<h2><?php echo $accordionObjetivosSubtitulo; ?></h2>
			</div>
			<div class="content_accordion">
				<img src="<?php echo wp_get_attachment_image_src( $accordionObjetivosImagen, 'full' )[0]; ?>" alt="objetivos">
				<div class="grid_accordion">
					<div class="h-accordion">
						<?php
						if ( $objetivosPost ) :
							foreach ( $objetivosPost as $obj ) :
								?>
						<div class="top_accordion">
							<i class="icon-add-fill"></i>
							<i class="icon-substract"></i>
							<h3><?php echo $obj->post_title; ?></h3>
						</div>
						<div>
							<p><?php echo $obj->post_content; ?></p>
						</div>
								<?php
					endforeach;
							wp_reset_postdata();
					endif;
						?>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section id="goals_banner_full">
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
	</section>
</div>



<?php get_footer(); ?>
