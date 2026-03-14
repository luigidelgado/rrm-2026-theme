<?php /* Template Name: Membership */ ?>
<?php
get_header();
$args     = array(
	'numberposts' => -1,
	'post_type'   => 'preguntas',
	'order'       => 'ASC',
	'tax_query'   => array(
		array(
			'taxonomy' => 'tipo-de-pregunta-frecuente',
			'field'    => 'slug',
			'terms'    => 'preguntas-membresias',
		),
	),
);
	$faqs = get_posts( $args );

	$argsObjetivos = array(
		'numberposts' => -1,
		'post_type'   => 'objetivos',
		'order'       => 'ASC',
	);
	$objetivosPost = get_posts( $argsObjetivos );

	if ( have_posts() ) :
		while ( have_posts() ) :
			the_post();
			// $acordion_titulo = get_post_meta($post->ID, 'acordion_objetivos_titulo', true);
			// $acordion_subtitulo = get_post_meta($post->ID, 'acordion_objetivos_subtitulo', true);
			// $acordion_img_id = get_post_meta($post->ID, 'acordion_objetivos_imagen', true);
			// $acordion_img = wp_get_attachment_image_src( $acordion_img_id, 'full' );
	endwhile;
	endif;

	// $acordion_titulo = get_post_meta(66, 'acordion_objetivos_titulo', true);
	// $acordion_subtitulo = get_post_meta(66, 'acordion_objetivos_subtitulo', true);
	// $acordion_img_id = get_post_meta(66, 'acordion_objetivos_imagen', true);
	// $acordion_img = wp_get_attachment_image_src( $acordion_img_id, 'full' );

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

	// $argsGenerales = array(
	// 'numberposts' => 1,
	// 'post_type'   => 'generales',
	// 'order'     => 'ASC',
	// );
	// $generales = get_posts($argsGenerales);
	// if ($generales) : foreach ($generales as $general) :
	// $img_id = get_post_meta($general->ID, 'imagen_fondo_membresias', true);
	// $img = wp_get_attachment_image_src( $img_id, 'full' );
	// endforeach;
	// wp_reset_postdata();
	// endif;

	if ( have_posts() ) :
		while ( have_posts() ) :
			the_post();
			$thumb = get_the_post_thumbnail_url( $post->ID, 'full' );
	endwhile;
	endif;

	?>
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
	<!-- 
		La clase colrrm-3 indica las columnas en el css
		(Se dejo preparado para si se tenia que agregar otra columna, es decir solo se podria poner colrrm-3 o colrrm-4)
	-->
	

		<?php
		while ( have_posts() ) :
			the_post();

			?>
			   
				<?php the_content(); ?>
				
			<?php
				endwhile; // End of the loop.
		?>

		<!-- Header table -->
		<?php
		/*
		<section class="membership-options colrrm-3">
		<!-- Header table -->
		<!-- Fila Comienza-->
		<div>
			<img src="[get_upload_url]/2024/05/PIN@2x.png" alt="" style="object-fit: contain;width: 100%;height: 100%;">
		</div>
		<div>
			<img src="[get_theme_url]/assets/images/membership/piston-ico-1.svg" alt="">
			<h2>Perfil Básico</h2>
			<h3>Gratis</h3>
		</div>
		<div>
			<img src="[get_theme_url]/assets/images/membership/brotherhood-fill-icon.svg"
				alt="">
			<h2>Membresía Premium</h2>
			<h3>$650.00 pesos</h3>
			<p>Kit + 1er. año</p>
		</div>
		<!-- Fila Termina-->
		<!-- Header table -->

		<!-- Content -->
		<!-- Fila Comienza-->
		<div>
			<div>Kit RRM</div>
			<div>Brazalete Identificador</div>
		</div>
		<div>
			No Aplica
		</div>
		<div>
			<img src="[get_theme_url]/assets/images/membership/task-fill-green.svg"
				alt="">
		</div>
		<!-- Fila Termina-->
		<!-- Fila Comienza-->
		<div>
			Servicio de almacenamiento y resguardo de fotos en el servidor.
		</div>
		<div>
			Limitado
		</div>
		<div>
			<img src="[get_theme_url]/assets/images/membership/task-fill-green.svg"
				alt="">
		</div>
		<!-- Fila Termina-->
		<!-- Fila Comienza-->
		<div>
			Servicios administrativos de tu participación en RRM
		</div>
		<div>
			Limitado
		</div>
		<div>
			<img src="[get_theme_url]/assets/images/membership/task-fill-green.svg"
				alt="">
		</div>
		<!-- Fila Termina-->
		<!-- Fila Comienza-->
		<div>
			Precio especial en eventos RRM
		</div>
		<div>
			<img src="[get_theme_url]/assets/images/membership/block-fill.svg" alt="">
		</div>
		<div>
			<img src="[get_theme_url]/assets/images/membership/task-fill-green.svg"
				alt="">
		</div>
		<!-- Fila Termina-->
		<!-- Fila Comienza-->
		<div>
			Descuentos especiales con prestadores de servicios vigentes
		</div>
		<div>
			<img src="[get_theme_url]/assets/images/membership/block-fill.svg" alt="">
		</div>
		<div>
			<img src="[get_theme_url]/assets/images/membership/task-fill-green.svg"
				alt="">
		</div>
		<!-- Fila Termina-->
		<!-- Fila Comienza-->
		<div>
			<div>Desafios</div>
		</div>
		<div>
			Limitado
		</div>
		<div>
			<img src="[get_theme_url]/assets/images/membership/task-fill-green.svg"
				alt="">
		</div>
		<!-- Fila Termina-->
		<!-- Fila Comienza-->
		<div>
			México concentraciones
		</div>
		<div>
			<img src="[get_theme_url]/assets/images/membership/task-fill-green.svg"
				alt="">
		</div>
		<div>
			<img src="[get_theme_url]/assets/images/membership/task-fill-green.svg"
				alt="">
		</div>
		<!-- Fila Termina-->
		<!-- Fila Comienza-->
		<div>
			Pueblos mágicos
		</div>
		<div>
			<img src="[get_theme_url]/assets/images/membership/task-fill-green.svg"
				alt="">
		</div>
		<div>
			<img src="[get_theme_url]/assets/images/membership/task-fill-green.svg"
				alt="">
		</div>
		<!-- Fila Termina-->
		<!-- Fila Comienza-->
		<div>
			México único
		</div>
		<div>
			<img src="[get_theme_url]/assets/images/membership/task-fill-green.svg"
				alt="">
		</div>
		<div>
			<img src="[get_theme_url]/assets/images/membership/task-fill-green.svg"
				alt="">
		</div>
		<!-- Fila Termina-->
		<!-- Fila Comienza-->
		<div>
			México gastrónomico
		</div>
		<div>
			<img src="[get_theme_url]/assets/images/membership/task-fill-green.svg"
				alt="">
		</div>
		<div>
			<img src="[get_theme_url]/assets/images/membership/task-fill-green.svg"
				alt="">
		</div>
		<!-- Fila Termina-->
		<!-- Fila Comienza-->
		<div>
			Carreteras famosas
		</div>
		<div>
			<img src="[get_theme_url]/assets/images/membership/task-fill-green.svg"
				alt="">
		</div>
		<div>
			<img src="[get_theme_url]/assets/images/membership/task-fill-green.svg"
				alt="">
		</div>
		<!-- Fila Termina-->
		<!-- Fila Comienza-->
		<div>
			México capitales
		</div>
		<div>
			<img src="[get_theme_url]/assets/images/membership/task-fill-green.svg"
				alt="">
		</div>
		<div>
			<img src="[get_theme_url]/assets/images/membership/task-fill-green.svg"
				alt="">
		</div>
		<!-- Fila Termina-->
		<!-- Fila Comienza-->
		<div>
			México emblemáticos
		</div>
		<div>
			<img src="[get_theme_url]/assets/images/membership/task-fill-green.svg"
				alt="">
		</div>
		<div>
			<img src="[get_theme_url]/assets/images/membership/task-fill-green.svg"
				alt="">
		</div>
		<!-- Fila Termina-->
		<!-- Última fila Empieza -->
		<div>

		</div>
		<div>
			<a href="/mi-perfil/">
				Perfil Gratuito
			</a>
		</div>
		<div>
			<a href="/producto/suscripcion/">
				Quiero ser Premium
			</a>
		</div>
		<!-- Última fila Termina -->
		</section>
		*/
		?>
	</section>

	<!-- <section class="membership-options colrrm-4"> -->

	<!-- Header table -->
	<!-- <div>
			<img src="<?php // echo get_template_directory_uri().'/assets/images/membership/PIN.png'; ?>" alt="">
		</div>
		<div>
			<img src="<?php // echo get_template_directory_uri().'/assets/images/membership/piston-ico-1.svg'; ?>" alt="">
			<h2>Básico</h2>
			<h3>Gratis</h3>
		</div>
		<div>
			<img src="<?php // echo get_template_directory_uri().'/assets/images/membership/brotherhood-fill-icon.svg'; ?>" alt="">
			<h2>Advance</h2>
			<h3>$650.0</h3>
			<p>Anual</p>
		</div>
		<div>
			<img src="<?php // echo get_template_directory_uri().'/assets/images/membership/brotherhood-fill-icon.svg'; ?>" alt="">
			<h2>Advance</h2>
			<h3>$650.0</h3>
			<p>Anual</p>
		</div> -->
	<!-- Header table -->

	<!-- Content -->

	<!-- <div>
			<div>Kir RRM</div>
			<div>Brazalete Identificador</div>
		</div>
		<div>
			No Aplica
		</div>
		<div>
			hola
		</div>
		<div>
			hola
		</div>

		<div>
			Servicio de almacenamiento y resguardo de fotos en el servidor.
		</div>
		<div>
			Limitado
		</div>
		<div>
			<img src="<?php // echo get_template_directory_uri().'/assets/images/membership/task-fill-green.svg'; ?>" alt="">
		</div>
		<div>
			Hola
		</div>

		<div>
			Servicios administrativos de tu participación en RRM
		</div>
		<div>
			Limitado
		</div>
		<div>
			<img src="<?php // echo get_template_directory_uri().'/assets/images/membership/task-fill-green.svg'; ?>" alt="">
		</div>
		<div>
			Hola
		</div>
		-->
	</section>

	<section class="faq">
		<div class="faq__boxes">
			<?php
			if ( $faqs ) :
				foreach ( $faqs as $faq ) :
					?>
			<div class="faq-box">
				<button type="button">
					<?php echo $faq->post_title; ?>
					<span></span>
				</button>
				<div class="faq-box__content">
					<?php echo $faq->post_content; ?>
				</div>
			</div>
					<?php
			endforeach;
				wp_reset_postdata();
			endif;
			?>
		</div>
		<a href="/<?php echo get_field( 'enlace_boton_faq' ); ?>" class="faq__more-faq">
		<?php echo get_field( 'texto_boton_faq' ); ?>
		</a>
	</section>
</div>


<section id="history_accordion">
	<?php $objetivos = get_template_directory_uri() . '/assets/images/goals/objetivos.png'; ?>
	<div class="container">
		<?php
			get_template_part(
				'partials/title-rrm',
				'title-rrm',
				array(
					'section' => $accordionObjetivosTitulo,
					'title'   => $accordionObjetivosSubtitulo,
				)
			);
			?>
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



<?php get_footer(); ?>