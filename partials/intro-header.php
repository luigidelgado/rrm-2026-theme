<div class="intro-header<?php echo (isset($args['is-transparent']) && $args['is-transparent']) ? ' degraded' : ''; ?>">
	<div class="intro-header__image">
		<img src="<?php echo $args['url']; ?>" alt="">
	</div>
	<div class="intro-header__title">
		<h1>
			<?php if ( !is_search() && !is_shop() && !is_category() && !is_tag()) : ?>
				<?php echo get_the_title(); ?>
			<?php endif; ?>
			<?php if ( is_category() || is_category() || is_tag()  ) : ?>
				<?php 
					$taxonomy = get_queried_object()->taxonomy; // Obtiene el nombre de la taxonomía
					$term = get_queried_object()->name; // Obtiene el nombre del término
					echo $term;
				?>
			<?php endif; ?>
			<?php if ( is_search() ) : ?>
				<?php echo "Resultados de búsqueda"; ?>
			<?php endif; ?>
			<?php if ( is_shop() ) : ?>
				<?php echo "Tienda"; ?>
			<?php endif; ?>
		</h1>
		<?php woocommerce_breadcrumb();  ?>
	</div>
</div>