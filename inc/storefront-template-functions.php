<?php
/**
 * Storefront template functions.
 *
 * @package storefront
 */

if ( ! function_exists( 'storefront_display_comments' ) ) {
	/**
	 * Storefront display comments
	 *
	 * @since  1.0.0
	 */
	function storefront_display_comments() {
		// If comments are open or we have at least one comment, load up the comment template.
		if ( comments_open() || 0 !== intval( get_comments_number() ) ) :
			comments_template();
		endif;
	}
}

if ( ! function_exists( 'storefront_comment' ) ) {
	/**
	 * Storefront comment template
	 *
	 * @param array $comment the comment array.
	 * @param array $args the comment args.
	 * @param int   $depth the comment depth.
	 * @since 1.0.0
	 */
	function storefront_comment( $comment, $args, $depth ) {
		if ( 'div' === $args['style'] ) {
			$tag       = 'div';
			$add_below = 'comment';
		} else {
			$tag       = 'li';
			$add_below = 'div-comment';
		}
		?>
<<?php echo esc_attr( $tag ); ?> <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ); ?>
    id="comment-<?php comment_ID(); ?>">
    <div class="comment-body">
        <div class="comment-meta commentmetadata">
            <div class="comment-author vcard">
                <?php echo get_avatar( $comment, 128 ); ?>
            </div>
            <?php if ( '0' === $comment->comment_approved ) : ?>
            <em
                class="comment-awaiting-moderation"><?php esc_html_e( 'Your comment is awaiting moderation.', 'storefront' ); ?></em>
            <br />
            <?php endif; ?>
        </div>
        <?php if ( 'div' !== $args['style'] ) : ?>
        <div id="div-comment-<?php comment_ID(); ?>" class="comment-content">
            <?php endif; ?>
            <?php printf( wp_kses_post( '<cite class="fn">%s</cite>', 'storefront' ), get_comment_author_link() ); ?>
            <a href="<?php echo esc_url( htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ); ?>"
                class="comment-date">
                <?php echo '<time datetime="' . esc_attr( get_comment_date( 'c' ) ) . '">' . esc_html( get_comment_date() ) . '</time>'; ?>
            </a>
            <div class="comment-text">
                <?php comment_text(); ?>
            </div>
            <div class="reply">
                <?php
		comment_reply_link(
			array_merge(
				$args,
				array(
					'add_below' => $add_below,
					'depth'     => $depth,
					'max_depth' => $args['max_depth'],
				)
			)
		);
		?>
                <?php edit_comment_link( __( 'Edit', 'storefront' ), '  ', '' ); ?>
            </div>
        </div>
        <?php if ( 'div' !== $args['style'] ) : ?>
    </div>
    <?php endif; ?>
    <?php
	}
}

if ( ! function_exists( 'storefront_footer_widgets' ) ) {
	/**
	 * Display the footer widget regions.
	 *
	 * @since  1.0.0
	 * @return void
	 */
	function storefront_footer_widgets() {
		$rows    = intval( apply_filters( 'storefront_footer_widget_rows', 1 ) );
		$regions = intval( apply_filters( 'storefront_footer_widget_columns', 4 ) );

		for ( $row = 1; $row <= $rows; $row++ ) :

			// Defines the number of active columns in this footer row.
			for ( $region = $regions; 0 < $region; $region-- ) {
				if ( is_active_sidebar( 'footer-' . esc_attr( $region + $regions * ( $row - 1 ) ) ) ) {
					$columns = $region;
					break;
				}
			}

			if ( isset( $columns ) ) :
				?>
    <div class=<?php echo '"footer-widgets row-' . esc_attr( $row ) . ' col-' . esc_attr( $columns ) . ' fix"'; ?>>
        <?php
				for ( $column = 1; $column <= $columns; $column++ ) :
					$footer_n = $column + $regions * ( $row - 1 );

					if ( is_active_sidebar( 'footer-' . esc_attr( $footer_n ) ) ) :
						?>
        <div class="block footer-widget-<?php echo esc_attr( $column ); ?>">
            <?php dynamic_sidebar( 'footer-' . esc_attr( $footer_n ) ); ?>
        </div>
        <?php
					endif;
				endfor;
				?>
    </div><!-- .footer-widgets.row-<?php echo esc_attr( $row ); ?> -->
    <?php
				unset( $columns );
			endif;
		endfor;
	}
}

if ( ! function_exists( 'storefront_credit' ) ) {
	/**
	 * Display the theme credit
	 *
	 * @since  1.0.0
	 * @return void
	 */
	function storefront_credit() {
		$links_output = '';

		if ( apply_filters( 'storefront_credit_link', true ) ) {
			if ( storefront_is_woocommerce_activated() ) {
				$links_output .= '<a href="https://woocommerce.com" target="_blank" title="' . esc_attr__( 'WooCommerce - The Best eCommerce Platform for WordPress', 'storefront' ) . '" rel="noreferrer nofollow">' . esc_html__( 'Built with Storefront &amp; WooCommerce', 'storefront' ) . '</a>.';
			} else {
				$links_output .= '<a href="https://woocommerce.com/products/storefront/" target="_blank" title="' . esc_attr__( 'Storefront -  The perfect platform for your next WooCommerce project.', 'storefront' ) . '" rel="noreferrer nofollow">' . esc_html__( 'Built with Storefront', 'storefront' ) . '</a>.';
			}
		}

		if ( apply_filters( 'storefront_privacy_policy_link', true ) && function_exists( 'the_privacy_policy_link' ) ) {
			$separator    = '<span role="separator" aria-hidden="true"></span>';
			$links_output = get_the_privacy_policy_link( '', ( ! empty( $links_output ) ? $separator : '' ) ) . $links_output;
		}

		$links_output = apply_filters( 'storefront_credit_links_output', $links_output );
		?>
    <div class="site-info">
        <?php echo esc_html( apply_filters( 'storefront_copyright_text', $content = '&copy; ' . get_bloginfo( 'name' ) . ' ' . gmdate( 'Y' ) ) ); ?>

        <?php if ( ! empty( $links_output ) ) { ?>
        <br />
        <?php echo wp_kses_post( $links_output ); ?>
        <?php } ?>
    </div><!-- .site-info -->
    <?php
	}
}

if ( ! function_exists( 'storefront_header_widget_region' ) ) {
	/**
	 * Display header widget region
	 *
	 * @since  1.0.0
	 */
	function storefront_header_widget_region() {
		if ( is_active_sidebar( 'header-1' ) ) {
			?>
    <div class="header-widget-region" role="complementary">
        <div class="col-full">
            <?php dynamic_sidebar( 'header-1' ); ?>
        </div>
    </div>
    <?php
		}
	}
}

if ( ! function_exists( 'storefront_site_branding' ) ) {
	/**
	 * Site branding wrapper and display
	 *
	 * @since  1.0.0
	 * @return void
	 */
	function storefront_site_branding() {
		?>
    <div class="site-branding">
        <?php storefront_site_title_or_logo(); ?>
    </div>
    <?php
	}
}

if ( ! function_exists( 'storefront_site_title_or_logo' ) ) {
	/**
	 * Display the site title or logo
	 *
	 * @since 2.1.0
	 * @param bool $echo Echo the string or return it.
	 * @return string
	 */
	function storefront_site_title_or_logo( $echo = true ) {
		if ( function_exists( 'the_custom_logo' ) && has_custom_logo() ) {
			$logo = get_custom_logo();
			$html = is_home() ? '<h1 class="logo">' . $logo . '</h1>' : $logo;
		} else {
			$tag = is_home() ? 'h1' : 'div';

			$html = '<' . esc_attr( $tag ) . ' class="beta site-title"><a href="' . esc_url( home_url( '/' ) ) . '" rel="home">' . esc_html( get_bloginfo( 'name' ) ) . '</a></' . esc_attr( $tag ) . '>';

			if ( '' !== get_bloginfo( 'description' ) ) {
				$html .= '<p class="site-description">' . esc_html( get_bloginfo( 'description', 'display' ) ) . '</p>';
			}
		}

		if ( ! $echo ) {
			return $html;
		}

		echo $html; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
	}
}

if ( ! function_exists( 'storefront_primary_navigation' ) ) {
	/**
	 * Display Primary Navigation
	 *
	 * @since  1.0.0
	 * @return void
	 */
	function storefront_primary_navigation() {
		?>
    <nav id="site-navigation" class="main-navigation" role="navigation"
        aria-label="<?php esc_attr_e( 'Primary Navigation', 'storefront' ); ?>">
        <button id="site-navigation-menu-toggle" class="menu-toggle" aria-controls="site-navigation"
            aria-expanded="false"><span><?php echo esc_html( apply_filters( 'storefront_menu_toggle_text', __( 'Menu', 'storefront' ) ) ); ?></span></button>
        <?php
			wp_nav_menu(
				array(
					'theme_location'  => 'primary',
					'container_class' => 'primary-navigation',
				)
			);

			wp_nav_menu(
				array(
					'theme_location'  => 'handheld',
					'container_class' => 'handheld-navigation',
				)
			);
			?>
    </nav><!-- #site-navigation -->
    <?php
	}
}

if ( ! function_exists( 'storefront_secondary_navigation' ) ) {
	/**
	 * Display Secondary Navigation
	 *
	 * @since  1.0.0
	 * @return void
	 */
	function storefront_secondary_navigation() {
		if ( has_nav_menu( 'secondary' ) ) {
			?>
    <nav class="secondary-navigation" role="navigation"
        aria-label="<?php esc_attr_e( 'Secondary Navigation', 'storefront' ); ?>">
        <?php
					wp_nav_menu(
						array(
							'theme_location' => 'secondary',
							'fallback_cb'    => '',
						)
					);
				?>
    </nav><!-- #site-navigation -->
    <?php
		}
	}
}

if ( ! function_exists( 'storefront_skip_links' ) ) {
	/**
	 * Skip links
	 *
	 * @since  1.4.1
	 * @return void
	 */
	function storefront_skip_links() {
		?>
    <a class="skip-link screen-reader-text"
        href="#site-navigation"><?php esc_html_e( 'Skip to navigation', 'storefront' ); ?></a>
    <a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'storefront' ); ?></a>
    <?php
	}
}

if ( ! function_exists( 'storefront_homepage_header' ) ) {
	/**
	 * Display the page header without the featured image
	 *
	 * @since 1.0.0
	 */
	function storefront_homepage_header() {
		edit_post_link( __( 'Edit this section', 'storefront' ), '', '', '', 'button storefront-hero__button-edit' );
		?>
    <header class="entry-header">
        <?php
			the_title( '<h1 class="entry-title">', '</h1>' );
			?>
    </header><!-- .entry-header -->
    <?php
	}
}

if ( ! function_exists( 'storefront_page_header' ) ) {
	/**
	 * Display the page header
	 *
	 * @since 1.0.0
	 */
	function storefront_page_header() {
		if ( is_front_page() && is_page_template( 'template-fullwidth.php' ) ) {
			return;
		}

		?>
    <header class="entry-header">
        <?php
			storefront_post_thumbnail( 'full' );
			the_title( '<h1 class="entry-title">', '</h1>' );
			?>
    </header><!-- .entry-header -->
    <?php
	}
}

if ( ! function_exists( 'storefront_page_content' ) ) {
	/**
	 * Display the post content
	 *
	 * @since 1.0.0
	 */
	function storefront_page_content() {
		?>
    <div class="entry-content">
        <?php the_content(); ?>
        <?php
				wp_link_pages(
					array(
						'before' => '<div class="page-links">' . __( 'Pages:', 'storefront' ),
						'after'  => '</div>',
					)
				);
			?>
    </div><!-- .entry-content -->
    <?php
	}
}

if ( ! function_exists( 'storefront_post_header' ) ) {
	/**
	 * Display the post header with a link to the single post
	 *
	 * @since 1.0.0
	 */
	function storefront_post_header() {
		?>
    <header class="entry-header">
        <?php

		/**
		 * Functions hooked in to storefront_post_header_before action.
		 *
		 * @hooked storefront_post_meta - 10
		 */
		do_action( 'storefront_post_header_before' );

		if ( is_single() ) {
			the_title( '<h1 class="entry-title">', '</h1>' );
		} else {
			the_title( sprintf( '<h2 class="alpha entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' );
		}

		do_action( 'storefront_post_header_after' );
		?>
    </header><!-- .entry-header -->
    <?php
	}
}

if ( ! function_exists( 'storefront_post_content' ) ) {
	/**
	 * Display the post content with a link to the single post
	 *
	 * @since 1.0.0
	 */
	function storefront_post_content() {
		?>
    <div class="entry-content">
        <?php

		/**
		 * Functions hooked in to storefront_post_content_before action.
		 *
		 * @hooked storefront_post_thumbnail - 10
		 */
		do_action( 'storefront_post_content_before' );

		the_content(
			sprintf(
				/* translators: %s: post title */
				__( 'Continue reading %s', 'storefront' ),
				'<span class="screen-reader-text">' . get_the_title() . '</span>'
			)
		);

		do_action( 'storefront_post_content_after' );

		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'storefront' ),
				'after'  => '</div>',
			)
		);
		?>
    </div><!-- .entry-content -->
    <?php
	}
}

if ( ! function_exists( 'storefront_post_meta' ) ) {
	/**
	 * Display the post meta
	 *
	 * @since 1.0.0
	 */
	function storefront_post_meta() {
		if ( 'post' !== get_post_type() ) {
			return;
		}

		// Posted on.
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';

		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
		}

		$time_string = sprintf(
			$time_string,
			esc_attr( get_the_date( 'c' ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( 'c' ) ),
			esc_html( get_the_modified_date() )
		);

		$output_time_string = sprintf( '<a href="%1$s" rel="bookmark">%2$s</a>', esc_url( get_permalink() ), $time_string );

		$tagOpen = '<div>';
		$tagClose = '</div>';
		$avatar =  sprintf('<div>%1$s</div>',
			get_avatar(get_the_author_meta( 'ID' ))
		);
		
		$posted_on = '
			<span class="posted-on">' .
			/* translators: %s: post date */
			sprintf( __( '%s', 'storefront' ), $output_time_string ) .
			'</span>';

		// Author.
		$author = sprintf(
			'<span class="post-author"><a href="%1$s" class="url fn" rel="author">%2$s</a></span>',
			esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
			esc_html( get_the_author() )
		);

		// Comments.
		$comments = '';

		if ( ! post_password_required() && ( comments_open() || 0 !== intval( get_comments_number() ) ) ) {
			$comments_number = get_comments_number_text( __( 'Leave a comment', 'storefront' ), __( '1 Comment', 'storefront' ), __( '% Comments', 'storefront' ) );

			$comments = sprintf(
				'<span class="post-comments"> <a href="%1$s">%2$s</a></span>',
				esc_url( get_comments_link() ),
				$comments_number
			);
		}

		echo wp_kses(
			sprintf( '%1$s %2$s %3$s %4$s %5$s %6$s', $avatar, $tagOpen, $author, $posted_on, $comments,$tagClose),
			array(
				'div' => array(
					'class' => array(),
				),
				'img' => array(
					'class' => array(),
					'src' => array()
				),
				'span' => array(
					'class' => array(),
				),
				'a'    => array(
					'href'  => array(),
					'title' => array(),
					'rel'   => array(),
				),
				'time' => array(
					'datetime' => array(),
					'class'    => array(),
				),
			)
		);
	}
}

if ( ! function_exists( 'storefront_edit_post_link' ) ) {
	/**
	 * Display the edit link
	 *
	 * @since 2.5.0
	 */
	function storefront_edit_post_link() {
		edit_post_link(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Edit <span class="screen-reader-text">%s</span>', 'storefront' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				get_the_title()
			),
			'<div class="edit-link">',
			'</div>'
		);
	}
}

if ( ! function_exists( 'storefront_post_taxonomy' ) ) {
	/**
	 * Display the post taxonomies
	 *
	 * @since 2.4.0
	 */
	function storefront_post_taxonomy() {
		/* translators: used between list items, there is a space after the comma */
		$categories_list = get_the_category_list( __( ', ', 'storefront' ) );

		/* translators: used between list items, there is a space after the comma */
		$tags_list = get_the_tag_list( '', __( ', ', 'storefront' ) );
		?>

    <aside class="entry-taxonomy">
        <?php if ( $categories_list ) : ?>
        <div class="cat-links">
            <?php echo esc_html( _n( 'Category:', 'Categories:', count( get_the_category() ), 'storefront' ) ); ?>
            <?php echo wp_kses_post( $categories_list ); ?>
        </div>
        <?php endif; ?>

        <?php if ( $tags_list ) : ?>
        <div class="tags-links">
            <?php echo esc_html( _n( 'Tag:', 'Tags:', count( get_the_tags() ), 'storefront' ) ); ?>
            <?php echo wp_kses_post( $tags_list ); ?>
        </div>
        <?php endif; ?>
    </aside>

    <?php
	}
}

if ( ! function_exists( 'storefront_paging_nav' ) ) {
	/**
	 * Display navigation to next/previous set of posts when applicable.
	 */
	function storefront_paging_nav() {
		global $wp_query;

		$args = array(
			'type'      => 'list',
			'next_text' => _x( 'Next', 'Next post', 'storefront' ),
			'prev_text' => _x( 'Previous', 'Previous post', 'storefront' ),
		);

		the_posts_pagination( $args );
	}
}

if ( ! function_exists( 'storefront_post_nav' ) ) {
	/**
	 * Display navigation to next/previous post when applicable.
	 */
	function storefront_post_nav() {
		$args = array(
			'next_text' => '<span class="screen-reader-text">' . esc_html__( 'Next post:', 'storefront' ) . ' </span>%title',
			'prev_text' => '<span class="screen-reader-text">' . esc_html__( 'Previous post:', 'storefront' ) . ' </span>%title',
		);
		the_post_navigation( $args );
	}
}

if ( ! function_exists( 'storefront_homepage_content' ) ) {
	/**
	 * Display homepage content
	 * Hooked into the `homepage` action in the homepage template
	 *
	 * @since  1.0.0
	 * @return  void
	 */
	function storefront_homepage_content() {
		while ( have_posts() ) {
			the_post();

			get_template_part( 'content', 'homepage' );

		} // end of the loop.
	}
}

if ( ! function_exists( 'storefront_social_icons' ) ) {
	/**
	 * Display social icons
	 * If the subscribe and connect plugin is active, display the icons.
	 *
	 * @link http://wordpress.org/plugins/subscribe-and-connect/
	 * @since 1.0.0
	 */
	function storefront_social_icons() {
		if ( class_exists( 'Subscribe_And_Connect' ) ) {
			echo '<div class="subscribe-and-connect-connect">';
			subscribe_and_connect_connect();
			echo '</div>';
		}
	}
}

if ( ! function_exists( 'storefront_get_sidebar' ) ) {
	/**
	 * Display storefront sidebar
	 *
	 * @uses get_sidebar()
	 * @since 1.0.0
	 */
	function storefront_get_sidebar() {
		get_sidebar();
	}
}

if ( ! function_exists( 'storefront_post_thumbnail' ) ) {
	/**
	 * Display post thumbnail
	 *
	 * @var $size thumbnail size. thumbnail|medium|large|full|$custom
	 * @uses has_post_thumbnail()
	 * @uses the_post_thumbnail
	 * @param string $size the post thumbnail size.
	 * @since 1.5.0
	 */
	function storefront_post_thumbnail( $size = 'full' ) {
		if ( has_post_thumbnail() ) {
			the_post_thumbnail( $size );
		}
	}
}

if ( ! function_exists( 'storefront_primary_navigation_wrapper' ) ) {
	/**
	 * The primary navigation wrapper
	 */
	function storefront_primary_navigation_wrapper() {
		echo '<div class="storefront-primary-navigation"><div class="col-full">';
	}
}

if ( ! function_exists( 'storefront_primary_navigation_wrapper_close' ) ) {
	/**
	 * The primary navigation wrapper close
	 */
	function storefront_primary_navigation_wrapper_close() {
		echo '</div></div>';
	}
}

if ( ! function_exists( 'storefront_header_container' ) ) {
	/**
	 * The header container
	 */
	function storefront_header_container() {
		echo '<div class="col-full">';
	}
}

if ( ! function_exists( 'storefront_header_container_close' ) ) {
	/**
	 * The header container close
	 */
	function storefront_header_container_close() {
		echo '</div>';
	}
}

///////////////////////
///RODANDO RUTAS/////
//////////////////////

if ( ! function_exists( 'rr_subheader' ) ) {
	/**
	 * The subheader
	 */
	function rr_subheader() {
		$facebook = get_template_directory_uri().'/assets/images/social/fb-icon-fill.png';
		$instagram = get_template_directory_uri().'/assets/images/social/instagra-fill.png';
		$twitter = get_template_directory_uri().'/assets/images/social/twitter-fill.png';
		$youtube = get_template_directory_uri().'/assets/images/social/yutube-fill.png';
		$search = get_template_directory_uri().'/assets/images/menu/search.png';
		$notification = get_template_directory_uri().'/assets/images/menu/notification.png';
		$cart = get_template_directory_uri().'/assets/images/menu/shopping_cart.png';
		$user = get_template_directory_uri().'/assets/images/menu/user.png';
		$up = get_template_directory_uri().'/assets/images/menu/up.png';
		$logoM = get_template_directory_uri().'/assets/images/menu/log_mobile.png';
		$menu = get_template_directory_uri().'/assets/images/menu/menu.png';
		$menuClose = get_template_directory_uri().'/assets/images/menu/menu_close.png';
		$content = '<div class="rr_subheader">
		<div class="container d-flex">
			<div class="rr_subheader_left_content">
				<p>Moto Turismo en Acción México</p>
				<div class="rr_subheader_social">
					<p>Síguenos</p> 
					<a href=""><img src="'.$facebook.'" alt="facebook"></a>
					<a href=""><img src="'.$instagram.'" alt="instagram"></a>
					<a href=""><img src="'.$twitter.'" alt="twitter"></a>
					<a href=""><img src="'.$youtube.'" alt="youtube"></a>
				</div>
			</div>
			<div class="rr_subheader_right_content">
				<a id="search_btn" href="#"><img src="'.$search.'" alt="search"></a>
				<a href=""><img src="'.$notification.'" alt="notification"></a>
				<a href="'.wc_get_cart_url().'"><img src="'.$cart.'" alt="cart"></a>
				<a href=""><img src="'.$user.'" alt="account"></a>
			</div>
		</div>
		</div>
		<div id="rr_scroll_top" class="scroll_top">
		    <img src="'.$up.'" alt="scroll_top">
		</div>
		
		<div class="menu_top_mobile">
			<div class="rr_logo_mobile">
				<a href="#"><img src="'.$logoM.'" alt="logoM"></a>
			</div>
			<div class="mobile-menu-container">
				<div class="mobile-menu-close">
					<i class="icon-menu_open"></i>
				</div>
				<div id="mobile-menu-wrap"></div>
			</div>
			<div class="rr_menu_lateral_mobile">
				<a href="#">unete al desafio</a>
				<button class="mobile-menu-trigger"> 
					<i class="icon-menu"></i>
				</button>
			</div>
		</div>';
		echo $content;
	}
}

if ( ! function_exists( 'rr_header' ) ) {
	/**
	 * The header 
	 */
	function rr_header() {
		$logo = get_template_directory_uri().'/assets/images/menu/logo.png';
		$userProfile = get_template_directory_uri().'/assets/images/header/profile_user.jpg';
		$notification = get_template_directory_uri().'/assets/images/logos_desafios/pueblos_magicos.png';
		$patch_1 = get_template_directory_uri().'/assets/images/header/patch.jpg';
		$patch_2 = get_template_directory_uri().'/assets/images/header/patch_2.jpg';
		$content = '<div class="rr_header">
			<div class="container d-flex">
				<div class="rr_logo">
					<a href="#"><img src="'.$logo.'" alt="logo"></a>
				</div>
				<div class="rr_menu menu" id="rr_menu">
					<ul>
						<li class="active">
							<a href="https://rrm.devg4a.net/">Home</a>
						</li>
						<li>
							<div>Sobre nosotros</div>
							<ul class="sub-menu">
                                <li><a href="#">Objetivo</a></li>
                                <li><a href="#">Parche</a></li>
                                <li><a href="#">Quienes Somos</a></li>
                            </ul>
						</li>
						<li>
							<a href="https://rrm.devg4a.net/">Salón de la fama</a>
						</li>
						<li>
							<a href="https://rrm.devg4a.net/">Rodadores activos</a>
						</li>
						<li>
							<a href="https://rrm.devg4a.net/">desafios</a>
						</li>
						<li>
							<a href="https://rrm.devg4a.net/">parches</a>
						</li>
						<li>
							<a href="https://rrm.devg4a.net/">tienda</a>
						</li>
						<li>
							<a href="https://rrm.devg4a.net/">Galerias</a>
						</li>
						<li>
							<a href="https://rrm.devg4a.net/">Contacto</a>
						</li>
						<li class="unete_menu">
							<a class="btn-unete" href="https://rrm.devg4a.net/">únete al desafío</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
		<div class="buscar_mobile">
            <div class="buscar_content_mobile">
				<form role="search" method="get" class="woocommerce-product-search input_search" action="'. (esc_url( home_url( "/" ) )) .'">
					<i class="icon-search"></i>
					<input type="search" id="woocommerce-product-search-field-'. (isset( $index ) ? absint( $index ) : 0 ).'"
						class="search-field" placeholder="'.(esc_attr__( "Buscar", "woocommerce" )).'"
						value="'.(get_search_query()).'" name="s" />
					<input type="hidden" name="post_type" value="product" />
				</form>
			</div>
		</div>
		<div class="notifications_mobile">
            <div class="notifications_content_mobile">
				<div class="top_notifications">
				    <p>Notificaciones</p>
					<a href="#" id="close_notifications_menu"><i class="icon-close"></i></a>
				</div>
				<div class="items_notifications">
				    <div class="item_notification">
						<i class="img_notification icon-check_circle"></i>
						<div class="data_notification">
						    <p class="notification">Tu comentario fue aprobado en la entrada de blog: “8 consejos para preparar sumoto ADV para la tem…”</p>
							<p class="date">Hace 4 horas</p>
						</div>
					</div>
					<div class="item_notification">
					<i class="img_notification icon-fact_check"></i>
						<div class="data_notification">
						    <p class="notification">Tus fotos del desafío “nombre del desafío máximo” Están en proceso de revisión</p>
							<p class="date">Hace 4 horas</p>
						</div>
					</div>
					<div class="item_notification">
						<i class="img_notification icon-badge"></i>
						<div class="data_notification">
						    <p class="notification">Tu membresía esa pro vencer recuerda renovarla.</p>
							<p class="date">Hace 4 horas</p>
						</div>
					</div>
					<div class="item_notification">
					<i class="img_notification icon-medal"></i>
						<div class="data_notification">
						    <p class="notification">¡Felicidades tus fotos del desafío “nombre del desafío máximo” han sido aprovadas!</p>
							<p class="date">Hace 4 horas</p>
						</div>
					</div>
					<div class="item_notification">
					    <img class="img_notification" src="'.$notification.'"  alt="img_notification">
						<div class="data_notification">
						    <p class="notification">Felicidades haz creado tu cuenta con éxito ¡Bienvenido y que comience la aventura!!!</p>
							<p class="date">Hace 4 horas</p>
						</div>
					</div>
				</div>
				<div class="mas">
				    <p>Ver todas</p>
				</div>
			</div>
		</div>
		<div class="carrito_mobile">
            <div class="carrito_content_mobile">
				<div class="top_carrito">
				    <p>Mi carrito</p>
					<a href="#" id="close_carrito_menu"><i class="icon-close"></i></a>
				</div>
				<div class="items_carrito">
				    <div class="item_carrito">
					    <img class="img_product" src="'.$patch_1.'"  alt="img_product">
						<div class="data_product">
						    <p class="name_product">El Mapa RRM coleccionador nuevos</p>
							<p class="price_product">3 x $173.04</p>
						</div>
						<a href="#" class="img_remove" ><i class="icon-close"></i></a>
					</div>
					<div class="item_carrito">
					    <img class="img_product" src="'.$patch_2.'"  alt="img_product">
						<div class="data_product">
						    <p class="name_product">El Mapa RRM coleccionador nuevos</p>
							<p class="price_product">3 x $173.04</p>
						</div>
						<a href="#" class="img_remove" ><i class="icon-close"></i></a>
					</div>
					<div class="item_carrito">
					    <img class="img_product" src="'.$patch_1.'"  alt="img_product">
						<div class="data_product">
						    <p class="name_product">El Mapa RRM coleccionador nuevos</p>
							<p class="price_product">3 x $173.04</p>
						</div>
						<a href="#" class="img_remove" ><i class="icon-close"></i></a>
					</div>
					<div class="item_carrito">
					    <img class="img_product" src="'.$patch_2.'"  alt="img_product">
						<div class="data_product">
						    <p class="name_product">El Mapa RRM coleccionador nuevos</p>
							<p class="price_product">3 x $173.04</p>
						</div>
						<a href="#" class="img_remove" ><i class="icon-close"></i></a>
					</div>
					<div class="item_carrito">
					    <img class="img_product" src="'.$patch_1.'"  alt="img_product">
						<div class="data_product">
						    <p class="name_product">El Mapa RRM coleccionador nuevos</p>
							<p class="price_product">3 x $173.04</p>
						</div>
						<a href="#" class="img_remove" ><i class="icon-close"></i></a>
					</div>

					
				</div>
				<div class="subtotal_carrito">
				    <p>Subtotal: <span>$797.25</span></p>
				</div>
				<div class="buttons_carrito">
				    <a href="#" class="checkout_btn">Checkout</a>
					<a href="#" class="carrito_btn">Ver Carrito</a>
				</div>
			</div>
		</div>
		<div class="side_menu_account">
		    <div class="info_user">
			    <div class="img_user">
				   <img src="'.$userProfile.'" alt="user_image">
				</div>
				<div class="data_user">
				    <div class="name_user"><h3>Alexander “Tig” Trager</h3> <i class="icon-verified"></i></div> 
					<div class="type_user"><p>Rodador ELITE</p></div> 
				</div>
				<div class="close_menu">
					<a href="#" id="close_account_menu"><i class="icon-close"></i></a>
				</div>
			</div>
			<div class="options_account">
               <a href="'.get_permalink( get_option('woocommerce_myaccount_page_id') ).'" class="full_option"><i class="icon-account_circle-fill"></i> Ver mi perfil</a>
			   <a class="hl_option"><i class="icon-gear"></i>  Mi Garage</a>
			   <a class="hr_option"><i class="icon-shopping_cart-fill"></i>  Mis compras</a>
			   <a class="full_option"><i class="icon-uploadpic"></i>  Subir una foto</a>
			   <a class="full_option rodador_activo"><i class="icon-verified"></i>  Conviértete en Rodador Activo</a>
			   <a class="full_option"><i class="icon-achievements"></i>  Mis desafios</a>
			   <a class="full_option"><i class="icon-help"></i>  Contactar a Soporte</a>
			   <a class="full_option"><i class="icon-settings"></i>  Ajustes de la cuenta</a>
			   <a class="full_option"><i class="icon-logout"></i>  Cerrar Sesión</a>
			</div>
		</div>
		<div class="menu_down_mobile">
			<a href="#" id="search_btn_mobile" class="l_menu"><i class="icon-search"></i></a>
			<a href="" id="notification_btn_mobile" class="c_menu c_left"><i class="icon-notifications"></i></a>
			<a href="#" id="carrito_btn_mobile" class="c_menu c_right"><i class="icon-shopping_cart"></i></a>
			<a href="#" id="side_menu_btn_mobile" class="l_menu"><i class="icon-account_circle"></i></a>
		</div>';
		echo $content;
		}
    }
    if ( ! function_exists( 'rr_footer' ) ) {
    /**
    * The header
    */
    function rr_footer() {
    $logoA = get_template_directory_uri().'/assets/images/footer/logo_amarillo.png';
    $face = get_template_directory_uri().'/assets/images/footer/fb.png';
    $insta = get_template_directory_uri().'/assets/images/footer/insta.png';
    $twi = get_template_directory_uri().'/assets/images/footer/twitter.png';
    $you = get_template_directory_uri().'/assets/images/footer/youtube.png';
    $whats = get_template_directory_uri().'/assets/images/footer/whatsapp.png';
    $email = get_template_directory_uri().'/assets/images/footer/email.png';
    $content = '<div class="rr_footer">
        <div class="rr_footer_container">
            <div class="rr_contact_footer">
                <div class="container">
                    <div class="rr_data_contact">
                        <h3>¿Tienes una pregunta?
                            No esperes, hablemos</h3>
                        <a href="#"><img src="'.$whats.'" alt="+(52) 512-78162021"> +(52) 512-78162021</a>
                        <a href="#"><img src="'.$email.'" alt="contacto@rodandorutasmagicas.com">
                            contacto@rodandorutasmagicas.com</a>
                    </div>
                    <div class="rr_menus_contact">
                        <div class="rr_submenu_accesos">
                            <p>Accesos rápidos</p>
                            <ul>
                                <li>
                                    <a href="https://rrm.devg4a.net/">Sobre nosotros</a>
                                </li>
                                <li>
                                    <a href="https://rrm.devg4a.net/">Eventos</a>
                                </li>
                                <li>
                                    <a href="https://rrm.devg4a.net/">Galeria</a>
                                </li>
                                <li>
                                    <a href="https://rrm.devg4a.net/">Blog</a>
                                </li>
                                <li>
                                    <a href="https://rrm.devg4a.net/">Mapa pueblos mágicos</a>
                                </li>
                            </ul>
                        </div>
                        <div class="rr_submenu_interesar">
                            <p>Te puede interesar</p>
							'. rr_footer_left_nav() .'
                            <ul>
                                <li>
                                    <a href="https://rrm.devg4a.net/">Términos y condiciones</a>
                                </li>
                                <li>
                                    <a href="https://rrm.devg4a.net/">Uso de cookies</a>
                                </li>
                                <li>
                                    <a href="https://rrm.devg4a.net/">Política de envíos</a>
                                </li>
                                <li>
                                    <a href="https://rrm.devg4a.net/">Política de devoluciones</a>
                                </li>
                                <li>
                                    <a href="https://rrm.devg4a.net/">FAQ</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="rr_social_footer">
                <div class="container">
                    <div class="rr_footer_copyright">
                        <p>Copyright © 2023 Rodando Rutas Mágicas</p>
                        <p>Diseño web y desarrollo por g4a</p>
                    </div>
                    <a class="logo" href="'.(site_url()).'"><img src="'.$logoA.'" alt="logo"></a>
                    <div class="rr_footer_social">
                        <p>Síguenos</p>
                        <div class="rr_social">
                            <a href="#"><img src="'.$face.'" alt="facebook"></a>
                            <a href="#"><img src="'.$insta.'" alt="instagram"></a>
                            <a href="#"><img src="'.$twi.'" alt="twitter"></a>
                            <a href="#"><img src="'.$you.'" alt="youtube"></a>
                        </div>

                    </div>
                </div>
            </div>
            <div class="rr_line_footer">
                <div class="rr_line line_1"></div>
                <div class="rr_line line_2"></div>
                <div class="rr_line line_3"></div>
                <div class="rr_line line_4"></div>
                <div class="rr_line line_5"></div>
                <div class="rr_line line_6"></div>
            </div>
        </div>
    </div>';
    echo $content;
    }
    }

/* Modificar la estructura del breadcrumb (Start) */
function change_breadcrumb_delimiter_soldadura( $defaults ) {
	$defaults['delimiter'] = '<span class="breadcrumb-separator"> </span>';
	$defaults['wrap_before'] = '<div class="rrm-breadcrumb">
		<nav class="woocommerce-breadcrumb" aria-label="' . esc_attr__( 'breadcrumbs', 'storefront' ) . '">';
			$defaults['wrap_after'] = '</nav>
	</div>';
	return $defaults;
}

add_filter( 'woocommerce_breadcrumb_defaults', 'change_breadcrumb_delimiter_soldadura', 20 );
/* Modificar la estructura del breadcrumb (End) */

function filter_woocommerce_product_add_to_cart_text( $add_to_cart_text, $product ) {
	// Price empty & Product is out of stock
	if( ! $product->is_in_stock() ) {
		$add_to_cart_text = __( 'Agotado', 'woocommerce' );
	}

	return $add_to_cart_text;
}
add_filter( 'woocommerce_product_add_to_cart_text', 'filter_woocommerce_product_add_to_cart_text', 10, 2 );


add_filter( 'woocommerce_add_to_cart_fragments', 'wc_refresh_mini_cart_count');
function wc_refresh_mini_cart_count($fragments){
    ob_start();
    ?>
    <div id="mini-cart-count">
        <?php echo WC()->cart->get_cart_contents_count(); ?>
    </div>
    <?php
        $fragments['#mini-cart-count'] = ob_get_clean();
    return $fragments;
}

add_filter( 'woocommerce_add_to_cart_fragments', 'wc_refresh_mini_cart_count_mobile');
function wc_refresh_mini_cart_count_mobile($fragments){
    ob_start();
    ?>
    <div id="mini-cart-count-m">
        <?php echo WC()->cart->get_cart_contents_count(); ?>
    </div>
    <?php
        $fragments['#mini-cart-count-m'] = ob_get_clean();
    return $fragments;
}
	