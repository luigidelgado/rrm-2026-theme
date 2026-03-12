<?php /* Template Name: Wheelers*/ ?>
<?php
get_header();
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

	$pmrequests  = new PM_request();
	$profile_url = $pmrequests->profile_magic_get_frontend_url( 'pm_user_profile_page', '' );

	$no    = 9;
	$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
if ( $paged == 1 ) {
	$offset = 0;
} else {
	$offset = ( $paged - 1 ) * $no;
}

	$paramSearch = '';
	$orderBy     = 'fotos';
	$order       = 'DESC';
if ( isset( $_GET['orderby'] ) ) {
	$paramOrder = $_GET['orderby'];
	if ( $paramOrder == 'name_asc' ) {
		$orderBy = 'display_name';
		$order   = 'ASC';
	} elseif ( $paramOrder == 'name_desc' ) {
		$orderBy = 'display_name';
		$order   = 'DESC';
	} elseif ( $paramOrder == 'more_photos' || $paramOrder == '' ) {
		$orderBy = 'fotos';
		$order   = 'DESC';
	} elseif ( $paramOrder == 'less_photos' ) {
		$orderBy = 'fotos';
		$order   = 'ASC';
	}
}

if ( isset( $_GET['search'] ) ) {
	$paramSearch = sanitize_text_field( wp_unslash( $_GET['search'] ) );
}

	/*
	$args = array(
		'role' => 'Subscriber',
		'number' => $no,
		'offset' => $offset,
		'orderby' => $orderBy,
		'order' => $order,
		'meta_query' => array(
			'relation' => 'OR',
			array(
				'key' => 'first_name',
				'value' => $paramSearch,
				'compare' => 'LIKE'
			),
			array(
				'key' => 'last_name',
				'value' => $paramSearch,
				'compare' => 'LIKE'
			),
		)
	);*/
	// $user_query = new WP_User_Query($args);

	// $query = "SELECT u.ID,u.display_name,u.user_registered,MAX(CASE WHEN um.meta_key = 'first_name' THEN meta_value END) AS first_name, MAX(CASE WHEN um.meta_key = 'last_name' THEN meta_value END) AS last_name, COUNT(gal.id) AS fotos FROM $wpdb->users AS u LEFT JOIN wphr_galerias_migration AS gal ON u.ID = gal.id_user LEFT JOIN wphr_usermeta AS um ON u.ID = um.user_id WHERE display_name LIKE \"%$paramSearch%\" GROUP BY u.ID";

if ( $can_user_access_content ) :
	global $wpdb;
	// $query = "SELECT u.ID,u.display_name,u.user_registered, COUNT(gal.id) AS fotos, um.meta_key, um.meta_value FROM $wpdb->users AS u LEFT JOIN wphr_galerias_migration AS gal ON u.ID = gal.id_user LEFT JOIN wphr_usermeta AS um ON u.ID = um.user_id WHERE display_name LIKE \"%$paramSearch%\" AND um.meta_key = 'pm_profile_privacy' AND um.meta_value != 5 GROUP BY u.ID";

	// $query = "SELECT u.ID,u.display_name,u.user_registered,MAX(CASE WHEN um.meta_key = 'first_name' THEN meta_value END) AS first_name, MAX(CASE WHEN um.meta_key = 'last_name' THEN meta_value END) AS last_name, COUNT(gal.id) AS fotos FROM $wpdb->users AS u LEFT JOIN wphr_galerias_migration AS gal ON u.ID = gal.id_user LEFT JOIN wphr_usermeta AS um ON u.ID = um.user_id WHERE (display_name LIKE \"%$paramSearch%\") AND u.ID NOT IN (SELECT user_id FROM wphr_usermeta WHERE meta_key = 'pm_profile_privacy' AND meta_value = 5) GROUP BY u.ID";

	$like_search = '%' . $wpdb->esc_like( $paramSearch ) . '%';
	$offset_int  = (int) $offset;
	$no_int      = (int) $no;
	$query       = $wpdb->prepare(
		"SELECT u.ID,u.display_name,u.user_registered,
            MAX(CASE WHEN um.meta_key = 'first_name' THEN meta_value END) AS first_name,
            MAX(CASE WHEN um.meta_key = 'last_name' THEN meta_value END) AS last_name,
            COUNT(distinct gal.id) AS fotos
        FROM {$wpdb->users} AS u
        LEFT JOIN wphr_galerias_migration AS gal ON u.ID = gal.id_user
        LEFT JOIN {$wpdb->usermeta} AS um ON u.ID = um.user_id
        WHERE (display_name LIKE %s)
        AND u.ID NOT IN (
            SELECT user_id FROM {$wpdb->usermeta}
            WHERE meta_key = 'pm_profile_privacy' AND meta_value = 5
        )
        GROUP BY u.ID",
		$like_search
	);
	// $orderBy y $order provienen de whitelist de valores permitidos (seguro).
	$results     = $wpdb->get_results( $query . " ORDER BY {$orderBy} {$order} LIMIT {$offset_int}, {$no_int}" );
	$total_query = "SELECT COUNT(1) FROM ({$query}) AS combined_table";
	$total_user  = $wpdb->get_var( $total_query );
	// $total_user = count($results);
	$total_pages = ceil( $total_user / $no );
	$end         = $no * $paged;
	$start       = $end - $no + 1;
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
<?php if ( $can_user_access_content ) : ?>
	<div class="wheelers">
		<section class="wheelers-search">
			<h2>Buscar al rodador</h2>
			<div class="wheelers-search__content">
				<div class="widget woocommerce widget_product_search">
					<form role="search" method="get" class="woocommerce-product-search" action="<?php echo home_url(); ?>/rodadores/">
						<label class="screen-reader-text" for="woocommerce-product-search-field-0">Buscar por:</label>
						<input type="search" id="woocommerce-product-search-field-0" class="search-field"
							placeholder="Buscar" value="<?php echo $paramSearch; ?>" name="search">
						<button type="submit" value="Buscar" class="">
							Buscar
						</button>
						<input type="hidden" name="orderby" value="<?php echo $paramOrder; ?>">
					</form>
				</div>
			</div>
		</section>

		<section class="rrm-sorting">
			<div class="storefront-sorting">
				<div class="woocommerce-notices-wrapper"></div>
				<form class="woocommerce-ordering" method="get" action="<?php echo home_url(); ?>/rodadores/">
					<div class="custom-rss-select">
						<p>Ordenar por</p>
						<select name="orderby" class="orderby" selected="<?php echo $paramOrder; ?>"
							aria-label="Shop order">
							<option value="more_photos" <?php echo $paramOrder == 'more_photos' ? 'selected' : ''; ?>>
								Mas
								fotos subidas</option>
							<option value="less_photos" <?php echo $paramOrder == 'less_photos' ? 'selected' : ''; ?>>
								Menos fotos subidas</option>
							<option value="name_asc" <?php echo $paramOrder == 'name_asc' ? 'selected' : ''; ?>>Nombre
								A-Z</option>
							<option value="name_desc" <?php echo $paramOrder == 'name_desc' ? 'selected' : ''; ?>>Nombre
								Z-A</option>
						</select>
					</div>
					<input type="hidden" name="search" value="<?php echo $paramSearch; ?>">
					<!--<input type="hidden" name="paged" value="1">-->
				</form>
				<p class="woocommerce-result-count">
					<?php
					if ( $no > $total_user ) {
						$results_summary_html = 'Mostrando ' . $total_user . ' de ' . $total_user . ' resultados ';
					} elseif ( $end > $total_user ) {
						$results_summary_html = 'Mostrando ' . $start . '-' . $total_user . ' de' . $total_user . ' resultados ';
					} else {
						$results_summary_html = 'Mostrando ' . $start . '-' . $end . ' de ' . $total_user . ' resultados ';
					}
					echo $results_summary_html;
					?>
				</p>
			</div>
		</section>
		<section class="wheelers-profiles">
			<?php
			if ( ! empty( $results ) ) {
				foreach ( $results as $user ) {
					$user_data      = get_userdata( $user->ID );
					$description    = get_user_meta( $user->ID, 'description', true );
					$fecha_registro = get_user_meta( $user->ID, 'fecha_registro', true );
					if ( $fecha_registro == '' ) :
						$fecha_registro = $user_data->user_registered;
						endif;
					$registered_date = date( 'd/m/Y', strtotime( $fecha_registro ) );
					$user_level      = rrm_user_level( $user->ID );
					$user_name       = $user->first_name . ' ' . $user->last_name;
					get_template_part(
						'partials/entry-profile-active',
						'entry-profile-active',
						array(
							'post-url'            => add_query_arg( 'uid', $user->ID, $profile_url ),
							'profile-image-url'   => get_avatar( $user->ID, array( 'size' => 190 ) ),
							'profile-name'        => $user->display_name,
							'profile-status'      => $user_level['level'],
							'profile-description' => '<p>
                                   ' . $description . '
                                </p>',
							'member-since'        => 'miembro desde ' . $registered_date . '',
							'member-active'       => rrm_is_active_user( $user->ID ),
						)
					);
				}
			} else {
				echo '';
			}
			?>
		</section>
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
						'rewrite'   => false,
					)
				);
			?>
		</nav>
		<!--<section class="wheelers-profiles">
		</section>

		<nav class="pagination-rrm">
			<ul class="page-numbers">
				<li><a class="prev page-numbers" href="#">&#171</a></li>
				<li><a class="page-numbers" href="#">1</a></li>
				<li><span aria-current="page" class="page-numbers current">2</span></li>
				<li><a class="page-numbers" href="#">3</a></li>
				<li><a class="next page-numbers" href="#">&#187</a></li>
			</ul>
		</nav> -->

	</div>
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