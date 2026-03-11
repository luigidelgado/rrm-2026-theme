<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @package storefront
 */

get_header(); ?>

	<div class="not-found-container">
		<img src="<?php echo get_template_directory_uri().'/assets/images/404/paisaje-montana-carretera.png'; ?>" alt="">
		<div class="container">
			<?php woocommerce_breadcrumb();  ?>
			<div class="not-found">
				<div class="not-found__main-content">
					<h1>
						404
					</h1>
					<h2>
						LA PÁGINA SOLICITADA NO EXISTE.
					</h2>
					<p>
						Esto puede deberse a que ingresó una URL incorrecta u obsoleta; verifíquela nuevamente. Es posible que hayamos archivado, movido o cambiado el nombre de la página que estás buscando.
					<p>
					<p>
						Es posible que pueda encontrar el contenido deseado a través de nuestra página de inicio.
					</p>
					<a href="<?php echo get_home_url(); ?>">
						Volver al inicio
					</a>
				</div>
			</div>
		</div>
	</div>
	

<?php
get_footer();
