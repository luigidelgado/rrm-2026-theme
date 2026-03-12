<?php /* Template Name: Home */ ?>
<?php
get_header();
		$back        = get_template_directory_uri() . '/assets/images/home/slider/back.png';
		$next        = get_template_directory_uri() . '/assets/images/home/slider/next.png';
		$logoBlack   = get_template_directory_uri() . '/assets/images/home/nosotros/logo_black.png';
		$logoColor   = get_template_directory_uri() . '/assets/images/home/nosotros/logo_color.png';
		$mision      = get_template_directory_uri() . '/assets/images/home/mision/mision.png';
		$vision      = get_template_directory_uri() . '/assets/images/home/mision/vision.png';
		$valores     = get_template_directory_uri() . '/assets/images/home/mision/valores.png';
		$banner_full = get_template_directory_uri() . '/assets/images/home/banner_full/banner_full.png';
		$salon1      = get_template_directory_uri() . '/assets/images/home/salon_fama/slide_1.png';
		$salon2      = get_template_directory_uri() . '/assets/images/home/salon_fama/slide_2.png';
		$salon3      = get_template_directory_uri() . '/assets/images/home/salon_fama/slide_3.png';
		$bg_desafios = get_template_directory_uri() . '/assets/images/home/desafios/bg_desafios.png';
		$desafios_1  = get_template_directory_uri() . '/assets/images/home/desafios/slide_1.png';
		$desafios_2  = get_template_directory_uri() . '/assets/images/home/desafios/slide_2.png';
		$desafios_3  = get_template_directory_uri() . '/assets/images/home/desafios/slide_3.png';
		$desafios_4  = get_template_directory_uri() . '/assets/images/home/desafios/slide_4.png';
		$desafios_5  = get_template_directory_uri() . '/assets/images/home/desafios/slide_5.png';
		$recorrido1  = get_template_directory_uri() . '/assets/images/home/recorriendo/img1.png';
		$recorrido2  = get_template_directory_uri() . '/assets/images/home/recorriendo/img2.png';
		$recorrido3  = get_template_directory_uri() . '/assets/images/home/recorriendo/img3.png';
		$parche_1    = get_template_directory_uri() . '/assets/images/logos_desafios/MEXICO_UNICO.png';
		$parche_2    = get_template_directory_uri() . '/assets/images/logos_desafios/MEXICO_GASTRONOMICO.png';
		$parche_3    = get_template_directory_uri() . '/assets/images/logos_desafios/CARRETERAS_FAMOSAS.png';
		$parche_4    = get_template_directory_uri() . '/assets/images/logos_desafios/MEXICO_CAPITALES.png';
		$bg_unete    = get_template_directory_uri() . '/assets/images/home/unete/bg-unete.png';
		$email       = get_template_directory_uri() . '/assets/images/home/unete/email.png';

?>

<style type="text/css">
#slider-top .slick-next,
#home_top_desafios .slider_desafios .slick-next {
	display: block;
	height: 24px;
	width: 14px;
	background: url(<?php echo esc_url( $next ); ?>) no-repeat;
}

#slider-top .slick-prev,
#home_top_desafios .slider_desafios .slick-prev {
	display: block;
	height: 24px;
	width: 14px;
	background: url(<?php echo esc_url( $back ); ?>) no-repeat;
}
</style>

<?php
	$argSlide   = array(
		'numberposts' => -1,
		'post_type'   => 'slider-home',
		'order'       => 'ASC',
	);
	$sliderHome = get_posts( $argSlide );

	$argDesafios = array(
		'numberposts' => 4,
		'post_type'   => 'desafios',
		'order'       => 'DESC',
	);
	$desafios    = get_posts( $argDesafios );


	$argSalon  = array(
		'numberposts' => 5,
		'post_type'   => 'salonfamahome',
		'order'       => 'ASC',
	);
	$salonFama = get_posts( $argSalon );

	if ( have_posts() ) :
		while ( have_posts() ) :
			the_post();

			// NOSOTROS////
			$nosotros_titulo = get_post_meta( $post->ID, 'titulo_nosotros', true );
			$nosotros_desc   = get_post_meta( $post->ID, 'descripcion_nosotros', true );
			$nosotros_nci    = get_post_meta( $post->ID, 'numero_columna_izquierda', true );
			$nosotros_ncc    = get_post_meta( $post->ID, 'numero_columna_central', true );
			$nosotros_ncd    = get_post_meta( $post->ID, 'numero_columna_derecha', true );
			$nosotros_tci    = get_post_meta( $post->ID, 'texto_columna_izquierda', true );
			$nosotros_tcc    = get_post_meta( $post->ID, 'texto_columna_central', true );
			$nosotros_tcd    = get_post_meta( $post->ID, 'texto_columna_derecha', true );

			$nosotros_img = get_post_meta( $post->ID, 'imagen_nosotros', true );
			$nosotros_img = wp_get_attachment_image_src( $nosotros_img, 'full' );

			$nosotros_img_url = get_post_meta( $post->ID, 'imagen_nosotros_url', true );

			// BANNER 1////
			$b1_titulo      = get_post_meta( $post->ID, 'titulo_banner', true );
			$b1_descripcion = get_post_meta( $post->ID, 'descripcion_banner', true );
			$b1_url         = get_post_meta( $post->ID, 'url_banner', true );
			$b1_txt_url     = get_post_meta( $post->ID, 'texto_url_banner', true );
			$b1_img         = get_post_meta( $post->ID, 'imagen_fondo_banner', true );
			$b1_bg          = wp_get_attachment_image_src( $b1_img, 'full' );
			$b1_img_der     = get_post_meta( $post->ID, 'imagen_derecha_banner', true );
			$b1_id          = wp_get_attachment_image_src( $b1_img_der, 'full' );


			// MISION////
			$mision_titulo    = get_post_meta( $post->ID, 'hacemos_titulo_seccion', true );
			$mision_subtitulo = get_post_meta( $post->ID, 'hacemos_subtitulo_seccion', true );
			$mision_tizq      = get_post_meta( $post->ID, 'hacemos_titulo_izquierda', true );
			$mision_tc        = get_post_meta( $post->ID, 'hacemos_titulo_centro', true );
			$mision_tder      = get_post_meta( $post->ID, 'hacemos_titulo_derecha', true );
			$mision_dizq      = get_post_meta( $post->ID, 'hacemos_descripcion_izquierda', true );
			$mision_dc        = get_post_meta( $post->ID, 'hacemos_descripcion_centro', true );
			$mision_dder      = get_post_meta( $post->ID, 'hacemos_descripcion_derecha', true );

			// BANNER 2////
			$b2_titulo      = get_post_meta( $post->ID, 'b2_titulo', true );
			$b2_descripcion = get_post_meta( $post->ID, 'b2_subtitulo', true );
			$b2_url         = get_post_meta( $post->ID, 'b2_url_boton', true );
			$b2_txt_url     = get_post_meta( $post->ID, 'b2_texto_boton', true );
			$b2_img         = get_post_meta( $post->ID, 'b2_imagen_fondo', true );
			$b2_bg          = wp_get_attachment_image_src( $b2_img, 'full' );

			// LOCALIZA////
			$bl_titulo    = get_post_meta( $post->ID, 'localiza_titulo', true );
			$bl_subtitulo = get_post_meta( $post->ID, 'localiza_subtitulo', true );
			$bl_url       = get_post_meta( $post->ID, 'localiza_url', true );
			// $bl_id_page = get_post_meta($post->ID, 'localiza_url', true);
			// $bl_url = get_permalink( $bl_id_page);
			$bl_txt_url = get_post_meta( $post->ID, 'localiza_texto_url', true );
			$bl_img     = get_post_meta( $post->ID, 'localiza_imagen_fondo', true );

			$bl_bg_url = get_post_meta( $post->ID, 'url_imagen_fondo', true );

			$bl_bg = wp_get_attachment_image_src( $bl_img, 'full' );

			// SALON DE LA FAMA///
			$salon_fama_intro  = get_post_meta( $post->ID, 'salon_de_la_fama_intro', true );
			$salon_fama_titulo = get_post_meta( $post->ID, 'salon_de_la_fama_titulo', true );
			$salon_fama_txt_bt = get_post_meta( $post->ID, 'salon_de_la_fama_texto_boton', true );

			// ULTIMAS FOTOS///
			$ultimas_fotos_intro  = get_post_meta( $post->ID, 'ultimas_fotos_intro', true );
			$ultimas_fotos_titulo = get_post_meta( $post->ID, 'ultimas_fotos_titulo', true );
			$ultimas_fotos_txt_bt = get_post_meta( $post->ID, 'ultimas_fotos_boton_texto', true );

			// RECORRIENDO MÉXICO///
			$recorriendo_mexico_intro          = get_post_meta( $post->ID, 'recorriendo_mexico_intro', true );
			$recorriendo_mexico_titulo         = get_post_meta( $post->ID, 'recorriendo_mexico_titulo', true );
			$recorriendo_mexico_desafio_txt_bt = get_post_meta( $post->ID, 'recorriendo_mexico_texto_desafio_boton', true );
			$recorriendo_mexico_txt_bt         = get_post_meta( $post->ID, 'recorriendo_mexico_texto_boton', true );

			// PASIÓN BIKER//
			$pasion_biker_intro  = get_post_meta( $post->ID, 'pasion_biker_intro', true );
			$pasion_biker_titulo = get_post_meta( $post->ID, 'pasion_biker_titulo', true );
			$pasion_biker_txt_bt = get_post_meta( $post->ID, 'pasion_biker_texto_boton', true );

			// NEWSLETTER//
			$newsletter_titulo      = get_field( 'titulo_newsletter', 546 );
			$newsletter_descripcion = get_field( 'descripcion_newsletter', 546 );
			$newsletter_placeholder = get_field( 'placeholder_newsletter', 546 );
			$newsletter_txt_bt      = get_field( 'texto_boton_newsletter', 546 );

	endwhile;
	endif;
	?>

<div id="rr_home">
	<section id="slider-top">
		<?php
		if ( $sliderHome ) :
			foreach ( $sliderHome as $slideH ) :
				$textSlide = get_post_meta( $slideH->ID, '_text_url_slide_home', true );
				$urlSlide  = get_post_meta( $slideH->ID, '_url_slide_home', true );
				$imgSlide  = get_the_post_thumbnail_url( $slideH->ID, 'full' );
				?>
		<div class="slide"
			style="background-image:linear-gradient(0deg, rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url(<?php echo esc_url( $imgSlide ); ?>);">
			<div class="container caption-slide">
				<div class="subtitle"><?php echo wp_kses_post( $slideH->post_content ); ?></div>
				<h2><?php echo esc_html( $slideH->post_title ); ?></h2>
				<a href="<?php echo esc_url( $urlSlide ); ?>"><?php echo esc_html( $textSlide ); ?></a>
			</div>
		</div>
				<?php
			endforeach;
			wp_reset_postdata();
			endif;
		?>
	</section>

	<?php
	if ( is_active_sidebar( 'bottom-slider-home' ) ) :
		?>
		<div class="banner-rrm bottom-slider-home">
		<?php
		dynamic_sidebar( 'bottom-slider-home' );
		?>
		</div>
	<?php endif; ?>
	<?php
		$countChallengues = wp_count_posts( 'desafios' )->publish;

		$countTermsMagicTowns = 0;
		// Nombre de la taxonomía
		$taxonomy = 'destinos';
		// $post = get_page_by_title('Desafío Pueblos Mágicos RRM', null , 'desafios');
		// echo gettype($post->ID);
		// echo str_replace(' ', '', $post->ID).'<br />';
		$post_id = 26513;
		// echo $post_id;
		// Obtener los términos seleccionados de la taxonomía asociados con el post
		// $parent_terms = wp_get_post_terms( $post->ID, $taxonomy, array( 'parent' => 0, 'hide_empty' => false) );
		$parent_terms = wp_get_post_terms(
			$post_id,
			$taxonomy,
			array(
				'parent'     => 0,
				'hide_empty' => false,
			)
		);
		// Inicializar la variable para contar la suma de la cantidad total de términos hijos
		$total_count = 0;

		// Verificar si se encontraron términos seleccionados de la taxonomía asociados con el post
		if ( ! empty( $parent_terms ) ) {
			// Iterar sobre los términos seleccionados
			foreach ( $parent_terms as $parent_term ) {
				// $child_terms = wp_get_post_terms( $post->ID, $taxonomy, array( 'parent' => $parent_term->term_id, 'hide_empty' => false) );
				$child_terms = wp_get_post_terms(
					$post_id,
					$taxonomy,
					array(
						'parent'     => $parent_term->term_id,
						'hide_empty' => false,
					)
				);
				// Verificar si se encontraron términos hijos
				if ( ! empty( $child_terms ) ) {
					$total_count += count( $child_terms );
				}
			}
		}
		$countTermsMagicTowns = $total_count;

		$countUsersSuscribers = count( get_users( array( 'role' => 'subscriber' ) ) );
		?>

	<section id="home_nosotros">
		<div class="container">
			<div class="content_nosotros">
				<div class="left_content">
					<h1><?php echo $nosotros_titulo; ?></h1>
					<?php /* <p><?php echo $nosotros_desc ?></p> */ ?>
					<?php echo wpautop( $nosotros_desc ); ?>
					<div class="stats top_content_desk">
						<div class="stat-item">
							<div class="stat-number">
								<?php // echo $nosotros_nci ?>
								<?php echo $countChallengues; ?>
							</div>
							<div class="divider"></div>
							<div class="stat-text"><?php echo $nosotros_tci; ?></div>
						</div>
						<div class="stat-item">
							<div class="stat-number">
								<?php // echo $nosotros_ncc ?>
								<?php echo $countTermsMagicTowns; ?>
							</div>
							<div class="divider"></div>
							<div class="stat-text"><?php echo $nosotros_tcc; ?></div>
						</div>
						<div class="stat-item">
							<div class="stat-number">
								<?php // echo $nosotros_ncd ?>
								<?php
									echo $countUsersSuscribers;
								?>
							</div>
							<div class="divider"></div>
							<div class="stat-text"><?php echo $nosotros_tcd; ?></div>
						</div>
					</div>
				</div>
				<?php if ( $nosotros_img != '' ) : ?>
				<div class="right_content">
					<?php if ( $nosotros_img_url != '' ) : ?>
					<a href="<?php echo $nosotros_img_url; ?>">
					<?php endif; ?>
						<img src="<?php echo $nosotros_img[0]; ?>" alt="">
					<?php if ( $nosotros_img_url != '' ) : ?>
					</a>
					<?php endif; ?>
				</div>
				<?php else : ?>
				<div class="right_content">
					<?php if ( $nosotros_img_url != '' ) : ?>
					<a href="<?php echo $nosotros_img_url; ?>">
					<?php endif; ?>
					<img src="<?php echo $logoBlack; ?>" alt="logo_black">
					<img src="<?php echo $logoColor; ?>" class="img-top">
					<?php if ( $nosotros_img_url != '' ) : ?>
					</a>
					<?php endif; ?>
				</div>
				<?php endif; ?>
				<div class="left_content down_content_mobile">
					<div class="stats">
						<div class="stat-item">
							<div class="stat-number">
								<?php // echo $nosotros_nci ?>
								<?php echo $countChallengues; ?>
							</div>
							<div class="divider"></div>
							<div class="stat-text"><?php echo $nosotros_tci; ?></div>
						</div>
						<div class="stat-item">
							<div class="stat-number">
								<?php // echo $nosotros_ncc ?>
								<?php echo $countTermsMagicTowns; ?>
							</div>
							<div class="divider"></div>
							<div class="stat-text"><?php echo $nosotros_tcc; ?></div>
						</div>
						<div class="stat-item">
							<div class="stat-number">
								<?php // echo $nosotros_ncd ?>
								<?php
									echo $countUsersSuscribers;
								?>
							</div>
							<div class="divider"></div>
							<div class="stat-text"><?php echo $nosotros_tcd; ?></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section id="home_banner_1">
		<div class="container ">
			<div class="content_banner">
				<div class="bg_banner" style="background-image:url(<?php echo $b1_bg[0]; ?>);">
					<div class="left_content">
						<h2><?php echo $b1_titulo; ?></h2>
						<p><?php echo $b1_descripcion; ?></p>
						<a href="<?php echo $b1_url; ?>"><?php echo $b1_txt_url; ?></a>
					</div>
					<div class="right_content">
						<img src="<?php echo $b1_id[0]; ?>" alt="pin">
					</div>
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
						<img src="<?php echo $mision; ?>" alt="mision">
						<h3><?php echo $mision_tizq; ?></h3>
						<?php /* <p><?php echo $mision_dizq ?></p> */ ?>
						<?php echo wpautop( $mision_dizq ); ?>
					</div>
					<div class="card_mision center_card">
						<img src="<?php echo $vision; ?>" alt="vision">
						<h3><?php echo $mision_tc; ?></h3>
						<?php /*<p><?php echo $mision_dc ?></p>*/ ?>
						<?php echo wpautop( $mision_dc ); ?>
					</div>
					<div class="card_mision">
						<img src="<?php echo $valores; ?>" alt="valores">
						<h3><?php echo $mision_tder; ?></h3>
						<?php /*<p><?php echo $mision_dder ?></p>*/ ?>
						<?php echo wpautop( $mision_dder ); ?>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section id="home_banner_full">
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

	<?php
	if ( is_active_sidebar( 'between-extreme-challengue-halloffame-home' ) ) :
		?>
		<div class="banner-rrm between-extreme-challengue-halloffame-home">
		<?php
		dynamic_sidebar( 'between-extreme-challengue-halloffame-home' );
		?>
		</div>
	<?php endif; ?>

	<section id="home_salon_fama">
		<div class="container">
			<div class="content_salon">
				<div class="left_content">
					<div class="title_small">
						<p><?php echo $salon_fama_intro; ?></p>
					</div>
					<h2><?php echo $salon_fama_titulo; ?></h2>
					<a class="content_salon__button desktop"
						href="<?php echo esc_url( get_permalink( 91 ) ); ?>"><?php echo $salon_fama_txt_bt; ?></a>
				</div>
				<div class="right_content">
					<div class="degraded"></div>
					<div class="slider_salon">

						<?php
						if ( $salonFama ) :
							foreach ( $salonFama as $sf ) :
								$thumb = get_the_post_thumbnail_url( $sf->ID, 'full' );
								// $user_level = rrm_user_level($user->ID);
								$rodador    = get_field( 'rodador', $sf->ID );
								$user_level = rrm_user_level( $rodador );
								$user_info  = get_userdata( $rodador );
								$user_name  = $user_info->first_name . ' ' . $user_info->last_name;
								?>

						<a class="slide_salon" href="<?php echo get_permalink( $sf->ID ); ?>">
							<img src="<?php echo $thumb; ?>" alt="salon">
							<div class="caption_slide">
								<p class="user_name"><?php echo $user_name; ?></p>
								<p class="user_id"><?php echo $user_level['level']; ?></p>
							</div>
						</a>
								<?php
						endforeach;
							wp_reset_postdata();
						endif;
						?>
					</div>
				</div>
			</div>
			<a class="content_salon__button mobile" href="<?php echo esc_url( get_permalink( 91 ) ); ?>">Conócelos</a>
		</div>
	</section>
	
   
	<?php
		$args         = array(
			'post_type'      => 'galerias',
			'posts_per_page' => 10, // Obtener los últimos 10 posts
			'post_status'    => 'publish', // Obtener solo los posts publicados
			'orderby'        => 'date', // Ordenar por fecha
			'order'          => 'DESC', // Orden descendente (los más recientes primero)
			'author__not_in' => getUsersExcludePrivacy(),
		);
		$galleryPosts = get_posts( $args );
		?>

	<section id="home_top_desafios">
		<div class="bg_top_desafios" style="background-image:url(<?php echo $bg_desafios; ?>);">
			<div class="container">
				<div class="top_content">
					<p><?php echo $ultimas_fotos_intro; ?></p>
					<h2><?php echo $ultimas_fotos_titulo; ?></h2>
				</div>
				<!-- <div class="slider_desafios">
					<div class="slider">
						<img src="<?php // echo $desafios_1; ?>" alt="desafios_1">
						<img src="<?php // echo $desafios_2; ?>" alt="desafios_2">
						<img src="<?php // echo $desafios_3; ?>" alt="desafios_3">
						<img src="<?php // echo $desafios_4; ?>" alt="desafios_4">
						<img src="<?php // echo $desafios_5; ?>" alt="desafios_5">
						<img src="<?php // echo $desafios_1; ?>" alt="desafios_1">
						<img src="<?php // echo $desafios_2; ?>" alt="desafios_2">
					</div>
				</div> -->
				<div class="slider_desafios">
					<div class="slider">
						<?php
						if ( $galleryPosts ) {
							foreach ( $galleryPosts as $post ) {
								setup_postdata( $post );
								?>
								<?php echo the_post_thumbnail( 'shop_thumbnail' ); ?>
								<?php
							}
							wp_reset_postdata();
						}
						?>
					</div>
				</div>
				<div class="down_content">
					<a href="<?php echo esc_url( get_permalink( 102 ) ); ?>"><?php echo $ultimas_fotos_txt_bt; ?></a>
				</div>
			</div>
		</div>
	</section>

	
	<section id="home_recorriendo">
		<div class="container">
			<div class="top_content">
				<p><?php echo $recorriendo_mexico_intro; ?></p>
				<h2><?php echo $recorriendo_mexico_titulo; ?></h2>
			</div>
			<div class="center_content">
				<?php
				if ( $desafios ) :
					foreach ( $desafios as $desafio ) :
						$p_img = get_post_meta( $desafio->ID, 'logo', true );
						$patch = wp_get_attachment_image_src( $p_img, 'full' );
						$thumb = get_the_post_thumbnail_url( $desafio->ID, 'full' )
						?>

				<div class="image-grid__item">
					<div class="grid-item">
						<div class="grid-item__image" style="background-image: url(<?php echo $thumb; ?>)">
						</div>
						<div class="caption_item">
							<!-- <p>Touring</p> -->
							<h4><?php echo $desafio->post_title; ?></h4>
							<a href="<?php echo get_permalink( $desafio->ID ); ?>"><?php echo $recorriendo_mexico_desafio_txt_bt; ?></a>
						</div>
						<img src="<?php echo $patch[0]; ?>" alt="parche">
					</div>
				</div>
						<?php
					endforeach;
					wp_reset_postdata();
					endif;
				?>
			</div>
			<div class="down_content">
				<a href="<?php echo esc_url( get_permalink( 82 ) ); ?>"><?php echo $recorriendo_mexico_txt_bt; ?></a>
			</div>
		</div>
	</section>
	
	<?php
	if ( is_active_sidebar( 'between-challengue-blog-home' ) ) :
		?>
		<div class="banner-rrm between-challengue-blog-home">
		<?php
		dynamic_sidebar( 'between-challengue-blog-home' );
		?>
		</div>
	<?php endif; ?>

	<section id="home_pasion">
		<?php
			$page_id   = 556; // Reemplaza este ID con el ID de tu página personalizada
			$blog_link = get_permalink( $page_id );
		?>
		<div class="container">
			<div class="content_pasion">
				<div class="left_content">
					<div class="title_small">
						<p><?php echo $pasion_biker_intro; ?></p>
					</div>
					<h2><?php echo $pasion_biker_titulo; ?> </h2>
					<!-- <a href="<?php // echo get_post_type_archive_link('post'); ?>"><?php // echo $pasion_biker_txt_bt; ?></a>-->
					<a href="<?php echo $blog_link; ?>"><?php echo $pasion_biker_txt_bt; ?></a>  
				</div>
				<div class="right_content">
					<?php
					$args           = array(
						'posts_per_page' => '3',
						'post_type'      => 'post',
						'order'          => 'DESC',
						'post_status'    => 'publish',
					);
						$postsArray = query_posts( $args );

					if ( $postsArray ) :
						foreach ( $postsArray as $post ) :
							setup_postdata( $post );
							$thumb = get_the_post_thumbnail_url( $post->ID, 'full' )
							?>
					<a href="<?php the_permalink(); ?>" class="card_pasion">
						<img src="<?php echo $thumb; ?>" alt="pasion">
						<div class="info_pasion">
							<p class="title"><?php the_title(); ?></p>
							<p class="date"><?php echo get_the_date(); ?></p>
						</div>
					</a>
							<?php
						endforeach;
						wp_reset_postdata();
					endif;
					?>
				</div>
			</div>

			<div class="btn_pasion_mobile">
				<?php /*<a href="<?php echo get_post_type_archive_link('post');  ?>"><?php echo $pasion_biker_txt_bt; ?></a> */ ?>
				<a href="<?php echo $blog_link; ?>"><?php echo $pasion_biker_txt_bt; ?></a>   
			</div>
		</div>
	</section>
<?php
/*
	<section id="home_localiza">
		<div class="container">
			<div class="content_localiza">
				<div class="banner_localiza" style="background-image:url(<?php echo $bl_bg[0]; ?>);">
					<div class="title_small">
						<p><?php echo $bl_subtitulo ?></p>
					</div>
					<h2><?php echo $bl_titulo ?></h2>
					<a href="<?php echo $bl_url ?>"><?php echo $bl_txt_url ?></a>
				</div>
			</div>
		</div>
	</section>
*/
?>
	<section id="home_localiza_c">
		<div class="container">
			<div class="content_localiza_c">
				<div class="content_localiza_c_left">
					<h3 class="content_localiza_c_title">
						<?php echo $bl_subtitulo; ?>
					</h3>
					<h2>
						<?php echo $bl_titulo; ?>
					</h2>
					<a href="<?php echo $bl_url; ?>"><?php echo $bl_txt_url; ?></a>
				</div>
				<div class="content_localiza_c_right">
					<a href="<?php echo $bl_bg_url; ?>">
						<img src="<?php echo $bl_bg[0]; ?>" alt="">
					</a>   
				</div>
				
			</div>
		</div>
	</section>

	<section id="home_unete">
		<div class="bg_unete" style="background-image:url(<?php echo $bg_unete; ?>);">
			<div class="container">
				<div class="banner_unete">
					<h2><?php echo $newsletter_titulo; ?></h2>
					<p><?php echo $newsletter_descripcion; ?></p>
					<?php echo do_shortcode( '[newsletter_form button_label="' . $newsletter_txt_bt . '"] [newsletter_field name="email" label="" placeholder="' . $newsletter_placeholder . '"] [/newsletter_form]' ); ?>
					<!-- <div class="form_suscribete">
						<input type="text" placeholder="Ingresa tu correo">
						<img src="<?php // echo $email; ?>" alt="email">
						<a href="#">Suscribete</a>
					</div> -->

				</div>
			</div>
		</div>
	</section>
</div>
<?php
get_footer();
