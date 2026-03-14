<?php /* Template Name: Gallery */ ?>
<?php get_header(); ?>

<?php
if ( have_posts() ) :
	while ( have_posts() ) :
		the_post();
		$thumb = get_the_post_thumbnail_url( $post->ID, 'full' );
	endwhile;
	endif;
	$user_id                 = get_current_user_id();
	$can_user_access_content = 0;
if ( ! can_user_access_content( $user_id, $post->ID ) ) :
	$can_user_access_content = 1;
	endif;

	get_template_part(
		'partials/intro-header',
		'intro-header',
		array(
			'url' => $thumb,
		)
	);
	?>

<?php
	// $current_params = http_build_query($_GET);
	// var_dump($current_params);
	$no    = 12;
	$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
if ( $paged == 1 ) :
	$offset = 0;
	else :
		$offset = ( $paged - 1 ) * $no;
	endif;

	$args2 = array(
		'post_type'      => 'galerias',
		'post_status'    => array( 'publish', 'pending' ),
		'posts_per_page' => -1,
	);
	// if (!can_user_access_content($user_id, $post->ID)) :
	$gallery_query2 = new WP_Query( $args2 );
	$gallery_count2 = count( $gallery_query2->get_posts() );
	// endif;

	// if(isset($_GET['challengue-challengue']) && $_GET['challengue-challengue'] !== '' ) {
		$args = array(
			'post_type'      => 'galerias',
			'post_status'    => 'publish',
			'posts_per_page' => $no,
			'offset'         => $offset,
			'author__not_in' => getUsersExcludePrivacy(),
		);
		// }
		// else{
		// $args = array();
		// }


		// Whitelist para orderby
		$allowed_orderby = array( 'ASC', 'DESC' );
		if ( isset( $_GET['orderby'] ) && in_array( $_GET['orderby'], $allowed_orderby, true ) ) {
			$paramOrder              = sanitize_text_field( wp_unslash( $_GET['orderby'] ) );
			$args['orderby']['date'] = $paramOrder;
		}

		if ( isset( $_GET['challengue-challengue'] ) && $_GET['challengue-challengue'] !== '' ) {
			$paramSearch                    = absint( $_GET['challengue-challengue'] );
			$args['meta_query'][0]['key']   = 'reto';
			$args['meta_query'][0]['value'] = $paramSearch;
		}

		if ( isset( $_GET['challengue-state'] ) && $_GET['challengue-state'] !== '' ) {
			$paramSearch2                     = absint( $_GET['challengue-state'] );
			$args['tax_query'][0]['taxonomy'] = 'destinos';
			$args['tax_query'][0]['field']    = 'term_id';
			$args['tax_query'][0]['terms']    = $paramSearch2;
		}

		if ( isset( $_GET['challengue-activity'] ) && $_GET['challengue-activity'] !== '' ) {
			$paramSearch3                     = absint( $_GET['challengue-activity'] );
			$args['tax_query']['relation']    = 'AND';
			$args['tax_query'][1]['taxonomy'] = 'destinos';
			$args['tax_query'][1]['field']    = 'term_id';
			$args['tax_query'][1]['terms']    = $paramSearch3;
		}
		// if (!can_user_access_content($user_id, $post->ID)) :
		if ( $can_user_access_content ) :
			$gallery_query = new WP_Query( $args );
			$gallery_count = $gallery_query->found_posts;
			// echo $gallery_query->found_posts." "."</br>";
			// echo $gallery_query->post_count." "."</br>";
			// echo '<pre>';
			// var_dump($gallery_query);
			// echo '</pre>';
			$total_pages = ceil( $gallery_count / $no );
			$end         = $no * $paged;
			$start       = $end - $no + 1;
	endif;

		?>
<span class="loader"></span>
<div class="loader-layer"></div>
<div class="container">
	<div class="container-grid">
		<section class="counter-photography">
			<div class="counter-photography__container">
				<div class="counter-photography__image">
					<img src="<?php echo get_field( 'galeria_imagen_contador' ); ?>" alt="">
				</div>
				<div class="counter-photography__number-counter">
					<?php echo $gallery_count2; ?>
				</div>
				<div class="counter-photography__description">
					<?php echo get_field( 'galeria_texto_contador' ); ?>
				</div>
			</div>
		</section>
		<?php // var_dump(can_user_access_content($user_id, $post->ID)); ?>
		<?php // var_dump($user_id); ?>
		<?php if ( $can_user_access_content ) : ?>
		<section class="gallery-search">
			<div class="gallery-search__content">
				<h2>Buscar imágenes por desafio</h2>
				<?php if ( ! empty( get_field( 'galeria_texto_instrucciones' ) ) ) : ?>
				<p>
					<?php echo get_field( 'galeria_texto_instrucciones' ); ?>
				</p>
				<?php endif; ?>
				<?php // echo get_field('galeria_texto_instrucciones'); ?>
				<?php
					// $query = get_challengues();
					$query = get_all_challengues();
				?>
				<div class="widget woocommerce widget_product_search">
					<form role="search" method="get" class="woocommerce-product-search" action="<?php echo get_permalink(); ?>">
						<label class="screen-reader-text" for="woocommerce-product-search-field-0">Buscar por:</label>
						<!-- <input type="search" id="woocommerce-product-search-field-0" class="search-field" placeholder="Buscar" value="" name="s"> -->
						<div class="custom-rss-select">
							<select name="challengue-challengue" id="challengue-challengue">
								<option value="">Selecciona el desafío</option>
								<?php
								while ( $query->have_posts() ) {
									$query->the_post();
									$select = false;
									if ( isset( $_GET['challengue-challengue'] ) && $_GET['challengue-challengue'] !== '' ) {
										if ( $_GET['challengue-challengue'] == get_the_ID() ) {
											$select = true;
										}
									}
									echo '<option value="' . esc_attr( get_the_ID() ) . '"', ( $select ) ? 'selected' : '', '>' . esc_html( get_the_title() ) . '</option>';
								}

									wp_reset_query();
								?>
							</select>
						</div>
						<div class="custom-rss-select">
							<?php echo '<select name="challengue-state" id="challengue-state"', ( isset( $_GET['challengue-challengue'] ) && $_GET['challengue-challengue'] !== '' ) ? 'disabled' : '', '>'; ?>
							<!--<select name="challengue-state" id="challengue-state">-->
							<option value="">Selecciona el estado o zona</option>
							<!-- Inserta las opciones profile.js getStatesZones() -->
							<?php if ( isset( $_GET['challengue-state'] ) && $_GET['challengue-state'] !== '' ) : ?>
								<?php
								$term_state = get_term_by( 'term_taxonomy_id', absint( $_GET['challengue-state'] ), 'destinos' );
								echo '<option value="" selected="selected">' . ( $term_state ? esc_html( $term_state->name ) : '' ) . '</option>';
								?>
							<?php endif; ?>
							</select>
						</div>

						<div class="custom-rss-select">
							<?php echo '<select name="challengue-activity" id="challengue-activity"', ( isset( $_GET['challengue-challengue'] ) && $_GET['challengue-challengue'] !== '' ) ? ' disabled' : '', '>'; ?>
							<!-- <select name="challengue-activity" id="challengue-activity"> -->
							<option value="">Selecciona el destino turistico o actividad</option>
							<?php if ( isset( $_GET['challengue-activity'] ) && $_GET['challengue-activity'] !== '' ) : ?>
								<?php
								$term_activity = get_term_by( 'term_taxonomy_id', absint( $_GET['challengue-activity'] ), 'destinos' );
								echo '<option value="" selected="selected">' . ( $term_activity ? esc_html( $term_activity->name ) : '' ) . '</option>';
								?>
							<?php endif; ?>
							</select>
						</div>

						<button type="submit" value="Buscar" class="">
							Buscar
						</button>
					</form>
				</div>

			</div>

		</section>

		<section class="rrm-sorting">
			<div class="storefront-sorting">
				<div class="woocommerce-notices-wrapper"></div>
				<form class="woocommerce-ordering" method="get" action="">
					<div class="custom-rss-select">
						<p>Ordenar por</p>

						<select name="orderby" class="orderby" aria-label="Shop order">
							<?php echo '<option value=""', ( isset( $_GET['challengue-challengue'] ) && $_GET['challengue-challengue'] !== '' ) ? '' : 'selected', '> Seleccionar una opción: </option>'; ?>
							<?php $current_orderby = isset( $_GET['orderby'] ) ? sanitize_text_field( wp_unslash( $_GET['orderby'] ) ) : ''; ?>
							<?php echo '<option value="DESC"', ( $current_orderby === 'DESC' ) ? ' selected' : '', '> Más recientes </option>'; ?>
							<?php echo '<option value="ASC"', ( $current_orderby === 'ASC' ) ? ' selected' : '', '> Más antiguos </option>'; ?>
						</select>
					</div>
					<input type="hidden" name="paged" value="1">
					<input type="hidden" name="challengue-challengue"
						value="<?php echo absint( isset( $_GET['challengue-challengue'] ) ? $_GET['challengue-challengue'] : 0 ); ?>">
					<input type="hidden" name="challengue-state" value="<?php echo absint( isset( $_GET['challengue-state'] ) ? $_GET['challengue-state'] : 0 ); ?>">
					<input type="hidden" name="challengue-activity" value="<?php echo absint( isset( $_GET['challengue-activity'] ) ? $_GET['challengue-activity'] : 0 ); ?>">
				</form>
				<p class="woocommerce-result-count">
					<?php
					if ( $no > $gallery_count ) {
						$results_summary_html = 'Mostrando ' . $gallery_count . ' de ' . $gallery_count . ' resultados ';
					} elseif ( $end > $gallery_count ) {
						$results_summary_html = 'Mostrando ' . $start . '-' . $gallery_count . ' de' . $gallery_count . ' resultados ';
					} else {
						$results_summary_html = 'Mostrando ' . $start . '-' . $end . ' de ' . $gallery_count . ' resultados ';
					}
					echo $results_summary_html;
					?>
				</p>
			</div>
		</section>

		<section id="gallery-grid" class="gallery-grid">
			<?php
			if ( $gallery_query->have_posts() ) :

				// Comenzar el loop para mostrar las entradas
				while ( $gallery_query->have_posts() ) {
					$gallery_query->the_post();
					$wheelerId       = get_field( 'rodador', $gallery_query->ID );
					$wheeler         = get_user_by( 'id', $wheelerId );
					$user_level      = rrm_user_level( $wheelerId );
					$parent_term     = wp_get_post_terms(
						get_the_ID(),
						'destinos',
						array(
							'parent'     => 0,
							'hide_empty' => false,
						)
					);
					$child_term      = wp_get_post_terms(
						get_the_ID(),
						'destinos',
						array(
							'parent'     => $parent_term[0]->term_id,
							'hide_empty' => false,
						)
					);
					$reto            = get_field( 'reto', get_the_ID() );
					$name_challengue = get_the_title( $reto );
					// var_dump($reto);
					// echo get_the_title();
					// echo get_avatar( $wheelerId , array( 'size' => 190 ) );
					get_template_part(
						'partials/gallery-item',
						'gallery-item',
						array(
							// 'url-item' => "#",
							'url-image'          => wp_get_attachment_url( get_post_thumbnail_id( $gallery_query->ID ) ),
							'title-image'        => get_the_title(),
							'description-image'  => get_the_content(),
							'biker-image'        => get_avatar( $wheelerId, array( 'size' => 190 ) ),
							'biker-name'         => $wheeler->display_name,
							'biker-category'     => $user_level['level'],
							'member-active'      => rrm_is_active_user( $user->ID ),
							'destination-parent' => $parent_term[0]->name,
							'destination-child'  => $child_term[0]->name,
							'name-challengue'    => $name_challengue,
							// 'gallery' => array(
							// array(
							// 'content-description' => '<h2>Foto 1</h2>',
							// 'url-image' => get_template_directory_uri().'/assets/images/gallery/gallery1.png'
							// ),
							// array(
							// 'content-description' => '<h2>Foto 2</h2>',
							// 'url-image' => get_template_directory_uri().'/assets/images/profile/component3.png'
							// ),
							// array(
							// 'content-description' => '<h2>Foto 3</h2>',
							// 'url-image' => get_template_directory_uri().'/assets/images/profile/component4.png'
							// ),
							// array(
							// 'content-description' => '<h2>Foto 4</h2>',
							// 'url-image' => get_template_directory_uri().'/assets/images/profile/component5.png'
							// )
							// )
						)
					);
				}
				else :
					?>
			<div class="no-entry-found">
				No hay resultados que coincidan con los criterios de búsqueda.
			</div>
					<?php
				endif;
				?>
			<?php
				// get_template_part(
				// 'partials/gallery-item',
				// 'gallery-item',
				// array(
				// 'url-item' => "#",
				// 'url-image' => get_template_directory_uri().'/assets/images/gallery/gallery1.png',
				// 'biker-image' => get_template_directory_uri().'/assets/images/gallery/moto.png',
				// 'biker-name' => "José Paris Sánchez Rovirosa",
				// 'biker-category' => "Rodador elite",
				// 'gallery' => array(
				// array(
				// 'content-description' => '<h2>Foto 1</h2>',
				// 'url-image' => get_template_directory_uri().'/assets/images/gallery/gallery1.png'
				// ),
				// array(
				// 'content-description' => '<h2>Foto 2</h2>',
				// 'url-image' => get_template_directory_uri().'/assets/images/profile/component3.png'
				// ),
				// array(
				// 'content-description' => '<h2>Foto 3</h2>',
				// 'url-image' => get_template_directory_uri().'/assets/images/profile/component4.png'
				// ),
				// array(
				// 'content-description' => '<h2>Foto 4</h2>',
				// 'url-image' => get_template_directory_uri().'/assets/images/profile/component5.png'
				// )
				// )
				// )
				// );
			?>


		</section>

		<section class="gallery-nav">
			<!-- <nav class="pagination-rrm">
				<ul class="page-numbers">
					<li><a class="prev page-numbers" href="#">&#171</a></li>
					<li><a class="page-numbers" href="#">1</a></li>
					<li><span aria-current="page" class="page-numbers current">2</span></li>
					<li><a class="page-numbers" href="#">3</a></li>
					<li><a class="next page-numbers" href="#">&#187</a></li>
				</ul>
			</nav> -->
			<nav class="pagination-rrm">
				<?php
				echo paginate_links(
					array(
						'base'      => preg_replace( '/\?.*/', '/', get_pagenum_link( 1 ) ) . '%_%',
						'format'    => 'page/%#%',
						'current'   => $paged,
						'total'     => $total_pages,
						'prev_text' => '&#171',
						'next_text' => '&#187',
						'type'      => 'list',
					)
				);
				?>
			</nav>
		</section>
		<?php endif; ?>
	</div>

	<?php

		// Nombre del tipo de entrada personalizado
		$post_type = 'galerias';

		// Nombre de la taxonomía
		$taxonomy = 'destinos';

		// Obtener todos los términos padres de la taxonomía
		$parent_terms = get_terms(
			array(
				'taxonomy'   => $taxonomy,
				'parent'     => 0,
				'hide_empty' => false,
			)
		);

		// Inicializar un array para almacenar el conteo de posts por cada término padre
		$posts_count_by_parent = array();

		// Realizar la consulta para contar los posts por cada término padre
		foreach ( $parent_terms as $parent_term ) {
			$args = array(
				'post_type'      => $post_type,
				'order_by'       => 'asc',
				'posts_per_page' => -1, // Obtener todos los posts del tipo de entrada personalizado
				'tax_query'      => array(
					array(
						'taxonomy'         => $taxonomy,
						'field'            => 'term_id',
						'terms'            => $parent_term->term_id,
						'include_children' => false, // Incluir solo posts asociados directamente al término padre
					),
				),
			);

			$query = new WP_Query( $args );

			// Guardar el conteo de posts para el término padre actual
			$posts_count_by_parent[ $parent_term->name ] = $query->post_count;

			// Restablecer los datos de la consulta original
			wp_reset_postdata();
		}

		// echo "<pre>";
		// var_dump($posts_count_by_parent);
		// echo "</pre>";

		// aksort($posts_count_by_parent, true);
		arsort( $posts_count_by_parent );
		$posts_count_by_parent = array_slice( $posts_count_by_parent, 0, 10 );
		?>
	<?php if ( $can_user_access_content ) : ?>
	<section class="top-states">
		<?php
			get_template_part(
				'partials/title-rrm',
				'title-rrm',
				array(
					'section' => 'Lo más destacado',
					'title'   => 'Top 10 estados',
				)
			);
		?>
		<div class="top-states__container">
			<div class="top-states__content">
				<?php
					// Mostrar los resultados
				foreach ( $posts_count_by_parent as $parent_name => $post_count ) {
					get_template_part(
						'partials/state-item',
						'state-item',
						array(
							'number' => $post_count,
							'state'  => $parent_name,
						)
					);
				}
				?>

			</div>

			<?php
				get_template_part(
					'partials/title-rrm',
					'title-rrm',
					array(
						'section' => 'Lo más destacado',
						'title'   => 'Top 10 desafíos',
					)
				);
			?>

			<?php

					$args2 = array(
						'post_type'   => 'galerias',
						'post_status' => 'publish',
						'numberposts' => -1,
					);

					// Get all of the posts
					$posts_array2 = get_posts( $args2 );

					// echo "<pre>";
					// var_dump($posts_array2);
					// echo "</pre>";

					// Create a new array
					$grouped_posts = array();

					// Group it in a new array
					foreach ( $posts_array2 as $the_post ) {
						$reto = get_field( 'reto', $the_post->ID );
						array_push( $grouped_posts, $reto );
					}

					$grouped_posts = array_count_values( $grouped_posts );
					arsort( $grouped_posts );
					// echo "<pre>";
					// var_dump($grouped_posts);
					// echo "</pre>";
					$grouped_posts = array_slice( $grouped_posts, 0, 10, true );
					// arsort($grouped_posts);
					// echo "<pre>";
					// var_dump($grouped_posts);


					?>

			<div class="top-challenges__content">
				<?php
					// echo "<pre>";
					// var_dump($grouped_posts);
					// echo "</pre>";
				foreach ( $grouped_posts as $postId => $postCount ) {
					// echo $index;
					get_template_part(
						'partials/challenge-item',
						'challenge-item',
						array(
							'challengue-medal' => get_field( 'logo', $postId ),
							'number'           => $postCount,
							'medal-name'       => get_the_title( $postId ),
						)
					);
				}

				?>

			</div>

		</div>

	</section>
	<?php else : ?>
		<?php
			$message_key = 'page_content_restricted_message_no_products';
			$message     = WC_Memberships_User_Messages::get_message( $message_key );
		if ( $message ) :
			?>
				<div class="woocommerce">
					<div class="woocommerce-info wc-memberships-restriction-message wc-memberships-message wc-memberships-content-restricted-message">
						<?php echo $message; ?>    
					</div>
				</div>
			<?php
			endif;

			// echo '<div class="woocommerce"><div class="woocommerce-info wc-memberships-restriction-message wc-memberships-message wc-memberships-content-restricted-message">' . wc_memberships()->frontend->get_content_restricted_message( $post->ID ) . '</div></div>';
		?>
	<?php endif; ?>
</div>


<?php get_footer(); ?>