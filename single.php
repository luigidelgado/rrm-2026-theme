<?php
/**
 * The template for displaying all single posts.
 *
 * @package storefront
 */

get_header();

// var_dump(get_post_type());

$argsGenerales = array(
	'numberposts' => 1,
	'post_type'   => 'generales',
	'order'       => 'ASC',
);
	$generales = get_posts( $argsGenerales );
if ( $generales ) :
	foreach ( $generales as $general ) :
		if ( get_post_type() == 'desafios' ) :
			$img_id = get_post_meta( $general->ID, 'imagen_fondo_desafios', true );
			else :
				$img_id = get_post_meta( $general->ID, 'imagen_fondo_blog', true );
			endif;
			$img = wp_get_attachment_image_src( $img_id, 'full' );
	endforeach;
	wp_reset_postdata();
	endif;
?>

<?php
	get_template_part(
		'partials/intro-header',
		'intro-header',
		array(
			'url' => $img[0],
		)
	);
	?>

<div class="container">
	<div class="single-content">
		<main>
			<?php

			while ( have_posts() ) :
				the_post();
				?>
					<?php if ( has_post_thumbnail() ) : ?>
			<div class="single-content__featured-image">
				<img src="<?php echo get_the_post_thumbnail_url( get_the_ID(), 'full' ); ?>"
					alt="<?php echo get_the_title(); ?>">
			</div>
			<?php endif; ?>
			<div class="single-content__content">
				<!-- <div class="single-content__author">
					<div class="single-content__author-image">
						<img src="<?php // echo get_template_directory_uri().'/assets/images/single/unnamed.png'; ?>" alt="">
					</div>
					<div class="single-content__data">
						<div class="single-content__author-name">
							Nombre del autor que publica
						</div>
						<time datetime="2023-03-24">
							Marzo 24, 2023
						</time>
					</div>
				</div> -->
				<!-- The content-->
				<div class="single-content__the-content">

					<!-- do_action( 'storefront_single_post_before' ); -->
					<?php
					// get_template_part( 'content', 'single' );
					?>
						<article id="post-<?php echo $post->ID; ?>" class="post-<?php echo $post->ID; ?> page hentry">
							<div class="entry-header"></div>
							<div class="entry-content">
						<?php the_content(); ?>
							</div>
					<?php do_action( 'storefront_single_post_bottom' ); ?>
						</article>
						
					<!-- do_action( 'storefront_single_post_after' ); -->


					<!-- <div class="entry-content">
						<p>
						Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry’s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.
						</p>
						<blockquote>
							The rest of the journey through to Lagos was cool. Lucky for us traffic was light and we made 
							very good time. We ended the journey at the Cauldron in Alausa with thanks to the Almighty 
							for journey mercies and looking forward to doing it again.
						</blockquote>
						<p>
							Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry’s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.
						</p>
						<h3>
							El viaje nos llevó a través de la vida
						</h3>
						<img src="<?php // echo get_template_directory_uri().'/assets/images/single/gallery-4.png'; ?>" alt="">
						<p>
							Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry’s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.
						</p>
					</div>
					-->

				</div>
			</div>
				<?php
		endwhile;
			?>
		</main>
		<aside>
			<div class="aside-component recent-posts">
				<h2>Publicaciones recientes</h2>
				<?php getLastPosts(); ?>
			</div>
			<div class="aside-component categories">
				<h2>Categorias</h2>
				<ul>
					<?php getCategories(); ?>
				</ul>
			</div>
			<div class="aside-component tags">
				<h2>Tags</h2>
				<?php getTags(); ?>
			</div>
				<?php
				if ( is_active_sidebar( 'sidebar-blog' ) ) :
					?>
				<div class="banner-rrm sidebar-blog">
					<?php
					dynamic_sidebar( 'sidebar-blog' );
					?>
				</div>
			<?php endif; ?>
		</aside>
	</div>
</div>
<!--<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
		<?php
		/*
		while ( have_posts() ) :
			the_post();

			do_action( 'storefront_single_post_before' );

			get_template_part( 'content', 'single' );

			do_action( 'storefront_single_post_after' );

		endwhile; // End of the loop. */
		?>

		</main>
	</div>-->

<?php
do_action( 'storefront_sidebar' );
get_footer();