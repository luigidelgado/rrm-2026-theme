<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package storefront
 */

get_header(); ?>
<?php
		$slide1      = get_template_directory_uri() . '/assets/images/slider/slide1.jpg';
		$slide2      = get_template_directory_uri() . '/assets/images/slider/slide2.jpg';
		$back        = get_template_directory_uri() . '/assets/images/home/slider/back.png';
		$next        = get_template_directory_uri() . '/assets/images/home/slider/next.png';
		$logoBlack   = get_template_directory_uri() . '/assets/images/home/nosotros/logo_black.png';
		$logoColor   = get_template_directory_uri() . '/assets/images/home/nosotros/logo_color.png';
		$banner1     = get_template_directory_uri() . '/assets/images/home/banner_1/banner_1.png';
		$pin         = get_template_directory_uri() . '/assets/images/home/banner_1/pin.png';
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
		$pasion_1    = get_template_directory_uri() . '/assets/images/home/pasion/pasion_1.png';
		$pasion_2    = get_template_directory_uri() . '/assets/images/home/pasion/pasion_2.png';
		$pasion_3    = get_template_directory_uri() . '/assets/images/home/pasion/pasion_3.png';
		$mapa        = get_template_directory_uri() . '/assets/images/home/localiza/mapa.png';
		$bg_unete    = get_template_directory_uri() . '/assets/images/home/unete/bg-unete.png';
		$email       = get_template_directory_uri() . '/assets/images/home/unete/email.png';

?>
<!--<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">-->

<style type="text/css">
#slider-top .slick-next,
#home_top_desafios .slider_desafios .slick-next {
	display: block;
	height: 24px;
	width: 14px;
	background: url(<?php echo $next; ?>) no-repeat;
}

#slider-top .slick-prev,
#home_top_desafios .slider_desafios .slick-prev {
	display: block;
	height: 24px;
	width: 14px;
	background: url(<?php echo $back; ?>) no-repeat;
}
</style>

<?php
		/*
		if ( have_posts() ) :

			get_template_part( 'loop' );

		else :

			get_template_part( 'content', 'none' );

		endif; */
?>

<!--</main><
	</div>-->

<div id="rr_home">

	<section id="slider-top">
		<div class="slide"
			style="background-image:linear-gradient(0deg, rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url(<?php echo $slide1; ?>);">
			<div class="container caption-slide">
				<p>desafiarte a ti mismo cada día</p>
				<h2>rodamos juntos</h2>
				<a href="#">Explora los desafíos</a>
			</div>
		</div>
		<div class="slide"
			style="background-image:linear-gradient(0deg, rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url(<?php echo $slide2; ?>);">
			<div class="container caption-slide">
				<p>desafiarte a ti mismo cada día</p>
				<h2>rodamos juntos</h2>
				<a href="#">Explora los desafíos</a>
			</div>
		</div>
	</section>


	<section id="home_nosotros">
		<div class="container">
			<div class="content_nosotros">
				<div class="left_content">
					<h2>no somos solo club de motos, somos equipo de vida de aventura</h2>
					<p>Rodando Rutas Mágicas (RRM) es una iniciativa que nace en 2014 enfocada en los motociclistas para
						registrar y dar fe del logro de los desafíos visitando puntos o poblaciones en la república
						mexicana
						bordo de su motocicleta. Nuestro objetivo es fomentar el Moto Turismo en México, Certificar al
						motociclista que cumpla con los protocolos de participación del programa RRM. Tenemos la idea de
						promover la culturalización individual o colectiva aprendiendo en cada viaje a través de la
						república
						mexicana.</p>
					<div class="stats top_content_desk">
						<div class="stat-item">
							<div class="stat-number">12</div>
							<div class="divider"></div>
							<div class="stat-text">Desafíos Cada uno cuenta con certificación oficial y parche</div>
						</div>
						<div class="stat-item">
							<div class="stat-number">132</div>
							<div class="divider"></div>
							<div class="stat-text">pueblos mágicos</div>
						</div>
						<div class="stat-item">
							<div class="stat-number">7,000</div>
							<div class="divider"></div>
							<div class="stat-text">motociclistas usuarios que han compartido sus logros</div>
						</div>
					</div>
				</div>
				<div class="right_content">
					<img src="<?php echo $logoBlack; ?>" alt="logo_black">
					<img src="<?php echo $logoColor; ?>" class="img-top" </div>
				</div>
				<div class="left_content down_content_mobile">
					<div class="stats">
						<div class="stat-item">
							<div class="stat-number">12</div>
							<div class="divider"></div>
							<div class="stat-text">Desafíos Cada uno cuenta con certificación oficial y parche</div>
						</div>
						<div class="stat-item">
							<div class="stat-number">132</div>
							<div class="divider"></div>
							<div class="stat-text">pueblos mágicos</div>
						</div>
						<div class="stat-item">
							<div class="stat-number">7,000</div>
							<div class="divider"></div>
							<div class="stat-text">motociclistas usuarios que han compartido sus logros</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>


	<section id="home_banner_1">
		<div class="container ">
			<div class="content_banner">
				<div class="bg_banner" style="background-image:url(<?php echo $banner1; ?>);">
					<div class="left_content">
						<h2>Renueva o adquiere tu membresía</h2>
						<p>Brazalete identificador como rodador activo, con el que podrás tomarte la foto y participar
							en
							los desafíos existentes en el programa.</p>
						<a href="#">membresía rrm</a>
					</div>
					<div class="right_content">
						<img src="<?php echo $pin; ?>" alt="pin">
					</div>
				</div>

			</div>
		</div>
	</section>

	<section id="home_mision">
		<div class="container">
			<div class="content_mision">
				<div class="top_content">
					<p>¿Que hacemos?</p>
					<h2>Nuestra misión</h2>
				</div>
				<div class="down_content">
					<div class="card_mision">
						<img src="<?php echo $mision; ?>" alt="mision">
						<h3>Misión</h3>
						<p>Impulsar el moto turismo en México orientado a disfrutar, vivir y experimentar las riquezas
							naturales, históricas y culturales que nuestro país ofrece.</p>
					</div>
					<div class="card_mision center_card">
						<img src="<?php echo $vision; ?>" alt="vision">
						<h3>VISIÓN</h3>
						<p>Ser la única unidad certificadora de Moto Turismo en México otorgando reconocimiento a la
							trayectoria de los motociclistas que viajan por la república mexicana.</p>
					</div>
					<div class="card_mision">
						<img src="<?php echo $valores; ?>" alt="valores">
						<h3>VALORES</h3>
						<p>Unidad, Hermandad, Respeto, Tolerancia
							Responsabilidad, Educación, Compromiso Social.</p>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section id="home_banner_full">
		<!--<div class="bg_banner_full" style="background:url(<?php echo $banner_full; ?>);">
			<div class="container">
				<p>¡VEN A VIAJAR CON NOSOTROS!</p>
				<h2>DESAFÍO MÉXICO X-TREMO</h2>
				<a href="#">Unete al Desafío</a>
			</div>
		</div> -->
		<?php
			get_template_part(
				'partials/challenges-rrm',
				'challenges-rrm',
				array(
					'url-image'   => get_template_directory_uri() . '/assets/images/home/banner_full/banner_full.png',
					'intro'       => '¡VEN A VIAJAR CON NOSOTROS!',
					'title'       => 'DESAFÍO MÉXICO X-TREMO',
					'button-text' => 'Unete al Desafío',
					'url'         => '#',
				)
			);
			?>
	</section>

	<section id="home_salon_fama">
		<div class="container">
			<div class="content_salon">
				<div class="left_content">
					<div class="title_small">
						<p>Rodadores activos</p>
					</div>
					<h2>Salon De la fama</h2>
					<a href="#">Conócelos</a>
				</div>
				<div class="right_content">
					<div class="slider_salon">
						<div class="slide_salon">
							<img src="<?php echo $salon1; ?>" alt="salon">
							<div class="caption_slide">
								<p class="user_name">Jorge Aguayo</p>
								<p class="user_id">Rodador 121 # 0</p>
							</div>
						</div>
						<div class="slide_salon">
							<img src="<?php echo $salon2; ?>" alt="salon">
							<div class="caption_slide">
								<p class="user_name">Ivan Arevalo</p>
								<p class="user_id">Rodador 121 # 2</p>
							</div>
						</div>
						<div class="slide_salon">
							<img src="<?php echo $salon3; ?>" alt="salon">
							<div class="caption_slide">
								<p class="user_name">Edgar Jonathan Hernandez Sanchez</p>
								<p class="user_id">Rodador 121 # 3</p>
							</div>
						</div>
						<div class="slide_salon">
							<img src="<?php echo $salon3; ?>" alt="salon">
							<div class="caption_slide">
								<p class="user_name">Edgar Jonathan Hernandez Sanchez</p>
								<p class="user_id">Rodador 121 # 3</p>
							</div>
						</div>
					</div>


				</div>
			</div>
		</div>
	</section>

	<section id="home_top_desafios">
		<div class="bg_top_desafios" style="background-image:url(<?php echo $bg_desafios; ?>);">
			<div class="container">
				<div class="top_content">
					<p>Top 10 Desafíos</p>
					<h2>Ultimas fotos</h2>
				</div>
				<div class="slider_desafios">
					<div class="slider">
						<img src="<?php echo $desafios_1; ?>" alt="desafios_1">
						<img src="<?php echo $desafios_2; ?>" alt="desafios_2">
						<img src="<?php echo $desafios_3; ?>" alt="desafios_3">
						<img src="<?php echo $desafios_4; ?>" alt="desafios_4">
						<img src="<?php echo $desafios_5; ?>" alt="desafios_5">
						<img src="<?php echo $desafios_1; ?>" alt="desafios_1">
						<img src="<?php echo $desafios_2; ?>" alt="desafios_2">
					</div>
				</div>
				<div class="down_content">
					<a href="#">Ver más</a>
				</div>
			</div>
		</div>
	</section>

	<section id="home_recorriendo">
		<div class="container">
			<div class="top_content">
				<p>desafiate a ti mismo cada día</p>
				<h2>Recorriendo México</h2>
			</div>
			<div class="center_content">
				<div class="image-grid__item">
					<div class="grid-item">
						<div class="grid-item__image" style="background-image: url(<?php echo $recorrido1; ?>)"></div>
						<div class="caption_item">
							<p>Touring</p>
							<h4>Desafío México Único</h4>
							<a href="#">conoce más</a>
						</div>
						<img src="<?php echo $parche_1; ?>" alt="parche">
					</div>
				</div>
				<div class="image-grid__item">
					<div class="grid-item">
						<div class="grid-item__image" style="background-image: url(<?php echo $recorrido2; ?>)">
						</div>
						<div class="caption_item">
							<p>Touring</p>
							<h4>Desafío México gastronómico</h4>
							<a href="#">conoce más</a>
						</div>
						<img src="<?php echo $parche_2; ?>" alt="parche">
					</div>
				</div>
				<div class="image-grid__item">
					<div class="grid-item">
						<div class="grid-item__image" style="background-image: url(<?php echo $recorrido3; ?>)">
						</div>
						<div class="caption_item">
							<p>Touring</p>
							<h4>DESAFÍO CARRETERAS FAMOSAS</h4>
							<a href="#">conoce más</a>
						</div>
						<img src="<?php echo $parche_3; ?>" alt="parche">
					</div>
				</div>
				<div class="image-grid__item">
					<div class="grid-item">
						<div class="grid-item__image" style="background-image: url(<?php echo $recorrido1; ?>)">
						</div>
						<div class="caption_item">
							<p>Touring</p>
							<h4>Desafío capitales</h4>
							<a href="#">conoce más</a>
						</div>
						<img src="<?php echo $parche_4; ?>" alt="parche">
					</div>
				</div>
			</div>
			<div class="down_content">
				<a href="#">Ver todos los desafios</a>
			</div>
		</div>
	</section>

	<section id="home_pasion">
		<div class="container">
			<div class="content_pasion">
				<div class="left_content">
					<div class="title_small">
						<p>El blog</p>
					</div>
					<h2>Pasión Biker</h2>
					<a href="#">Leer más</a>
				</div>
				<div class="right_content">
					<div class="card_pasion">
						<img src="<?php echo $pasion_1; ?>" alt="pasion">
						<div class="info_pasion">
							<a href="#" class="title">Las 7 motocicletas más baratas para turismo en 2022</a>
							<p class="date">Marzo 24, 2023</p>
						</div>
					</div>
					<div class="card_pasion">
						<img src="<?php echo $pasion_2; ?>" alt="pasion">
						<div class="info_pasion">
							<a href="#" class="title">8 consejos para preparar su moto ADV para la temporada</a>
							<p class="date">Marzo 24, 2023</p>
						</div>
					</div>
					<div class="card_pasion">
						<img src="<?php echo $pasion_3; ?>" alt="pasion">
						<div class="info_pasion">
							<a href="#" class="title">Cómo preparar tu mente y cuerpo para viajar</a>
							<p class="date">Marzo 24, 2023</p>
						</div>
					</div>
				</div>
			</div>
			<div class="btn_pasion_mobile">
				<a href="#">Leer más</a>
			</div>
		</div>
	</section>

	<section id="home_localiza">
		<div class="container">
			<div class="content_localiza">
				<div class="banner_localiza" style="background-image:url(<?php echo $mapa; ?>);">
					<div class="title_small">
						<p>Que esperas comienza hoy a rodar</p>
					</div>
					<h2>Localiza los destinos turísticos de cada desafío RRM y traza tu ruta…</h2>
					<a href="#">Visita el mapa</a>
				</div>
			</div>
		</div>
	</section>

	<section id="home_unete">
		<div class="bg_unete" style="background-image:url(<?php echo $bg_unete; ?>);">
			<div class="container">
				<div class="banner_unete">
					<h2>Unete al Desafío</h2>
					<p>RECIBA NOTICIAS, ACTUALIZACIONES, AVISOS DE EVENTOS ESPECIALES Y MÁS CUANDO SE UNE A NUESTRA
						LISTA DE
						CORREO ELECTRÓNICO</p>
					<div class="form_suscribete">
						<input type="text" placeholder="Ingresa tu correo">
						<img src="<?php echo $email; ?>" alt="email">
						<a href="#">Suscribete</a>
					</div>

				</div>
			</div>
		</div>
	</section>

</div>

<?php
// do_action( 'storefront_sidebar' );
get_footer();