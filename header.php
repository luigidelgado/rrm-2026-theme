<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package storefront
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
    <script type="text/javascript">
    let siteUrl = '<?php echo esc_url( home_url() ); ?>';
    </script>
    <script>
    (g => {
        var h, a, k, p = "The Google Maps JavaScript API",
            c = "google",
            l = "importLibrary",
            q = "__ib__",
            m = document,
            b = window;
        b = b[c] || (b[c] = {});
        var d = b.maps || (b.maps = {}),
            r = new Set,
            e = new URLSearchParams,
            u = () => h || (h = new Promise(async (f, n) => {
                await (a = m.createElement("script"));
                e.set("libraries", [...r] + "");
                for (k in g) e.set(k.replace(/[A-Z]/g, t => "_" + t[0].toLowerCase()), g[k]);
                e.set("callback", c + ".maps." + q);
                a.src = `https://maps.${c}apis.com/maps/api/js?` + e;
                d[q] = f;
                a.onerror = () => h = n(Error(p + " could not load."));
                a.nonce = m.querySelector("script[nonce]")?.nonce || "";
                m.head.append(a)
            }));
        d[l] ? console.warn(p + " only loads once. Ignoring:", g) : d[l] = (f, ...n) => r.add(f) && u().then(() =>
            d[l](f, ...n))
    })({
        key: "<?php echo esc_js( RRM_GOOGLE_MAPS_KEY ); ?>",
        // API Key configurada via constante RRM_GOOGLE_MAPS_KEY en wp-config.php
        // o mediante la opción 'rrm_google_maps_key' en la BD.
        // Add other bootstrap parameters as needed, using camel case.
        // Use the 'v' parameter to indicate the version to load (alpha, beta, weekly, etc.)
    });
    </script>
    <script>
    window.twttr = (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0],
            t = window.twttr || {};
        if (d.getElementById(id)) return t;
        js = d.createElement(s);
        js.id = id;
        js.src = "https://platform.twitter.com/widgets.js";
        fjs.parentNode.insertBefore(js, fjs);

        t._e = [];
        t.ready = function(f) {
            t._e.push(f);
        };

        return t;
    }(document, "script", "twitter-wjs"));
    </script>
    <script type="text/javascript">
    (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s);
        js.id = id;
        js.src = "https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.0";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
    </script>
    <!--<link rel="me" href="https://twitter.com/TwitterDev">-->
    <script>(function(a,m,o,c,r,m){a[m]={id:"1023091",hash:"0cd68341e966d391bd8843369ac68533b51521537a80be781f7c1b2eceda8c64",locale:"es",setMeta:function(p){this.params=(this.params||[]).concat([p])}};a[o]=a[o]||function(){(a[o].q=a[o].q||[]).push(arguments)};var d=a.document,s=d.createElement('script');s.async=true;s.id=m+'_script';s.src='https://gso.kommo.com/js/button.js';d.head&&d.head.appendChild(s)}(window,0,'crmPlugin',0,0,'crm_plugin'));</script>
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <div id="fb-root"></div>
    <?php //do_shortcode( '[xs_social_share provider="twitter"]' ); ?>
    <!-- <div class="fb-share-button" 
            data-href="https://rrm.devg4a.net/mi-perfil/?uid=7952" 
            data-layout="button"></div> -->
    <?php wp_body_open(); ?>

    <?php //do_action( 'storefront_before_site' ); 
        $argsGenerales = array(
        'numberposts' => 1,
        'post_type'   => 'generales',
        'order'     => 'ASC',
        );
        $generales = get_posts($argsGenerales);
        if ($generales) : foreach ($generales as $general) :
            $urlFacebook = get_post_meta( $general->ID, 'url_facebook', true );
            $urlInstagram = get_post_meta( $general->ID, 'url_instagram', true );
            $urlTwitter = get_post_meta( $general->ID, 'url_twitter', true );
            $urlYoutube = get_post_meta( $general->ID, 'url_youtube', true );
            $modal_img_id = get_post_meta($general->ID, 'modal_unete', true);
            $modal_img = wp_get_attachment_image_src( $modal_img_id, 'full' );
            $modal_titulo = get_post_meta( $general->ID, 'titulo_modal', true );
            $contenido_modal  = get_post_meta( $general->ID, 'contenido_modal', true );
            $eslogan  = get_post_meta( $general->ID, 'eslogan', true );
            $texto_redes_sociales  = get_post_meta( $general->ID, 'texto_redes_sociales', true );

            $duracion_banner  = get_post_meta( $general->ID, 'duracion_banner', true );
        endforeach;
        wp_reset_postdata();
        endif;


        

        $facebook = get_template_directory_uri().'/assets/images/social/fb-icon-fill.png';
        $instagram = get_template_directory_uri().'/assets/images/social/instagra-fill.png';
        $twitter = get_template_directory_uri().'/assets/images/social/twitter-fill.svg';
        $youtube = get_template_directory_uri().'/assets/images/social/yutube-fill.png';
        $search = get_template_directory_uri().'/assets/images/menu/search.png';
        $notification = get_template_directory_uri().'/assets/images/menu/notification.png';
        $cart = get_template_directory_uri().'/assets/images/menu/shopping_cart.png';
        $user = get_template_directory_uri().'/assets/images/menu/user.png';
        $up = get_template_directory_uri().'/assets/images/menu/up.png';
        $logoM = get_template_directory_uri().'/assets/images/menu/log_mobile.png';
        $menu = get_template_directory_uri().'/assets/images/menu/menu.png';
        $menuClose = get_template_directory_uri().'/assets/images/menu/menu_close.png';
        $bg_modal = get_template_directory_uri().'/assets/images/header/bg_modal.png';
        $close = get_template_directory_uri().'/assets/images/header/close.png';
        $add = get_template_directory_uri().'/assets/images/header/add.png';
        $logo = get_template_directory_uri().'/assets/images/menu/logo.png';
		$userProfile = get_template_directory_uri().'/assets/images/header/profile_user.jpg';
		$notificationP = get_template_directory_uri().'/assets/images/logos_desafios/pueblos_magicos.png';
		$patch_1 = get_template_directory_uri().'/assets/images/header/patch.jpg';
		$patch_2 = get_template_directory_uri().'/assets/images/header/patch_2.jpg';


        // ↓↓↓ NUEVO: inicializaciones seguras para evitar "Undefined variable"
        $active_user  = false;
        $u_level      = ['level' => ''];
        $orders       = [];
        $alertas      = [];
        $user_info    = null;
        $current_user = null;
        // ↑↑↑ FIN de inicializaciones


         if ( is_user_logged_in() ) {
            $current_user = wp_get_current_user();
            $active_user = rrm_is_active_user($current_user->ID);
            $u_level = rrm_user_level($current_user->ID); 
            $argsOrders = array(
                'customer'  => $current_user->ID,  
            );
            $orders = wc_get_orders( $argsOrders );
            $alertas = get_alertas_usuario($current_user->ID,5);
        }
    ?>

    <div id="page" class="hfeed site">
        <?php //do_action( 'storefront_before_header' ); ?>

        <!--<header id="masthead" class="site-header" role="banner" style="<?php storefront_header_styles(); ?>">-->
        <header>
            <?php
		/**
		 * Functions hooked into storefront_header action
		 *
		 * @hooked storefront_header_container                 - 0
		 * @hooked storefront_skip_links                       - 5
		 * @hooked storefront_social_icons                     - 10
		 * @hooked storefront_site_branding                    - 20
		 * @hooked storefront_secondary_navigation             - 30
		 * @hooked storefront_product_search                   - 40
		 * @hooked storefront_header_container_close           - 41
		 * @hooked storefront_primary_navigation_wrapper       - 42
		 * @hooked storefront_primary_navigation               - 50
		 * @hooked storefront_header_cart                      - 60
		 * @hooked storefront_primary_navigation_wrapper_close - 68
		 */
		//do_action( 'storefront_header' );
		
		?>
            <div class="rr_subheader">
                <div class="container d-flex">
                    <div class="rr_subheader_left_content">
                        <p><?php echo esc_html( $eslogan ); ?></p>
                        <div class="rr_subheader_social">
                            <p><?php echo esc_html( $texto_redes_sociales ); ?></p>
                            <a href="<?php echo esc_url( $urlFacebook ); ?>" target="_blank"><img src="<?php echo esc_url( $facebook ); ?>"
                                    alt="<?php echo esc_attr( $urlFacebook ); ?>"></a>
                            <a href="<?php echo esc_url( $urlInstagram ); ?>" target="_blank"><img src="<?php echo esc_url( $instagram ); ?>"
                                    alt="<?php echo esc_attr( $urlInstagram ); ?>"></a>
                            <a href="<?php echo esc_url( $urlTwitter ); ?>" target="_blank"><img src="<?php echo esc_url( $twitter ); ?>"
                                    alt="<?php echo esc_attr( $urlTwitter ); ?>"></a>
                            <a href="<?php echo esc_url( $urlYoutube ); ?>" target="_blank"><img src="<?php echo esc_url( $youtube ); ?>"
                                    alt="<?php echo esc_attr( $urlYoutube ); ?>"></a>
                        </div>
                    </div>
                    <div class="rr_subheader_right_content">
                        <a id="search_btn" href="#"><img src="<?php echo esc_url( $search ); ?>" alt="search"></a>
                        <a href="#" id="notification_btn">
                            <?php
                                if( is_user_logged_in() ){
                                    $found = get_user_meta( $current_user->ID, 'notification', true);
                                    if($found == "true"){
                                        ?> <span></span><?php
                                    }
                                }
                            ?>
                            <img src="<?php echo esc_url( $notification ); ?>" alt="notification"></a>
                        <a href="<?php echo esc_url( wc_get_cart_url() ); ?>" class="cart_d"><img src="<?php echo esc_url( $cart ); ?>"
                                alt="cart">
                            <div id="mini-cart-count"></div>
                        </a>
                        <a id="<?php if( is_user_logged_in() ){ ?>side_menu_btn<?php }else{ } ?>"
                            href="<?php if( is_user_logged_in() ){ ?>#<?php }else{ echo site_url( '/iniciar-sesion/', 'https' ); }?>"><img
                                src="<?php echo esc_url( $user ); ?>" alt="account"></a>

                        <div id="notifications_desk" class="notifications_desk">
                            <div class="notifications_content_mobile">
                                <div class="top_notifications">
                                    <p>Notificaciones</p>
                                    <!--<a href="#" id="close_notifications_menu"><i class="icon-close"></i></a>-->
                                </div>
                                <?php if( is_user_logged_in() ){ ?>
                                <div class="items_notifications">
                                    <?php if ($alertas) : foreach ($alertas as $alerta) : 
                                        $tipo = get_post_meta( $alerta->ID, 'tipo_notificacion', true );
                                        $adicional = get_post_meta( $alerta->ID, 'texto_adicional', true );
                                        $usuario = get_post_meta( $alerta->ID, 'usuario', true );
                                        $tiempo = tiempo_transcurrido($alerta->post_date);
                                        $icon = icon_notification($tipo);
                                    ?>
                                    <div class="item_notification">
                                        <i class="img_notification <?php echo esc_attr( $icon ); ?>"></i>
                                        <div class="data_notification">
                                            <p class="notification"><?php echo esc_html( $alerta->post_title ); ?></p>
                                            <?php if($adicional  != ""){ ?><p class="notification">
                                                <?php echo wp_kses_post( $adicional ); ?></p> <?php }?>
                                            <p class="date">
                                                <?php echo esc_html( $tiempo ); ?>
                                            </p>
                                        </div>
                                    </div>
                                    <?php 
                                    endforeach;
                                    wp_reset_postdata();
                                    endif; 
                                ?>
                                </div>

                                <div class="mas">
                                    <a href="<?php echo esc_url( get_permalink(10) ); ?>#misnotificaciones5">Ver
                                        todas</a>
                                </div>
                                <?php } ?>
                            </div>
                        </div>

                        <div id="side_menu_account_desk" class="side_menu_account_desk">
                            <div class="info_user">
                                <?php if ( is_user_logged_in() ) {
                                    $user_info = get_userdata($current_user->ID);
                                    $avatar_url = get_avatar( $user_info->user_email,50,'',false,array('class'=>'pm-user','force_display'=>true) );
                                    if ( ($current_user instanceof WP_User) ) {
                                        ?>

                                <div class="img_user">
                                    <?php echo $avatar_url; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- get_avatar() retorna HTML seguro ?>
                                </div>
                                <div class="data_user">
                                    <div class="name_user">
                                        <h3><?php echo esc_html( $current_user->first_name . ' ' . $current_user->last_name ); ?>
                                        </h3><?php if($active_user){ ?><i class="icon-verified"></i> <?php } ?>
                                    </div>
                                    <div class="type_user">
                                        <p><?php echo esc_html( $u_level['level'] ); ?></p>
                                    </div>
                                </div>
                                <?php
                                    }
                                }?>
                            </div>
                            <div class="options_account">
                                <a href="<?php echo esc_url( get_permalink(10) ); ?>" class="full_option"><i
                                        class="icon-account_circle-fill"></i> Ver mi perfil</a>
                                <a href="<?php echo esc_url( get_permalink(10) ); ?>#migarage2" class="hl_option"><i
                                        class="icon-gear"></i> Mi Garage</a>
                                <?php if(!empty($orders)){?>
                                <a href="<?php echo esc_url( get_permalink(10) ); ?>#pg-my-orders" class="hr_option"><i
                                        class="icon-shopping_cart-fill"></i> Mis compras</a>
                                <?php } ?>
                                <a href="<?php echo esc_url( get_permalink(10) ); ?>#upload-photo"
                                    class="full_option"><i class="icon-uploadpic"></i> Subir una foto</a>
                                <?php if($active_user == false){ ?><a
                                    href="<?php echo esc_url( get_permalink(100) ); ?>"
                                    class="full_option rodador_activo"><i class="icon-verified"></i> Conviértete en
                                    Rodador Premium</a> <?php } ?>
                                <a href="<?php echo esc_url( get_permalink(10) ); ?>#misdesafios1"
                                    class="full_option"><i class="icon-achievements"></i> Mis desafios</a>
                                <a href="<?php echo esc_url( get_permalink(88) ); ?>" class="full_option"><i
                                        class="icon-help"></i> Contactar a Soporte</a>
                                <a href="<?php echo esc_url( get_permalink(10) ); ?>#account-settings"
                                    class="full_option"><i class="icon-settings"></i> Ajustes de la cuenta</a>
                                <a href="<?php echo wp_logout_url( home_url()); ?>" class="full_option"><i
                                        class="icon-logout"></i>
                                    Cerrar Sesión</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="rr_scroll_top" class="scroll_top">
                <img src="<?php echo esc_url( $up ); ?>" alt="scroll_top">
            </div>

            <div class="menu_top_mobile">
                <div class="rr_logo_mobile">
                    <a href="<?php echo esc_url( home_url() ); ?>">
                        <?php /* <img src="<?php echo $logoM;?>" alt="logoM"> */ ?>
                        <?php echo wp_get_attachment_image( get_theme_mod( 'custom_logo' ), 'full' ); ?>
                    </a>
                </div>
                <div class="rr_menu_lateral_mobile">
                    <?php if (!is_user_logged_in()) { ?> <a href="<?php echo esc_url( get_permalink(100) ); ?>">
                        test</a><?php  }?>
                    <button class="mobile-menu-trigger">
                        <i class="icon-menu"></i>
                    </button>
                </div>
            </div>
            <div class="rr_header">
                <div class="container d-flex">
                    <div class="rr_logo">

                        <a href="<?php echo esc_url( home_url() ); ?>">
                            <?php /* <img src="<?php echo $logo; ?>" alt="logo"> */ ?>
                            <?php echo wp_get_attachment_image( get_theme_mod( 'custom_logo' ), 'full' ); ?>
                        </a>
                    </div>
                    <div class="rr_menu menu" id="rr_menu">
                        <?php rr_nav(); ?>
                        <!-- <ul>
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
                        </ul> -->
                    </div>
                </div>
            </div>
            <div class="side_menu_account">
                <div class="info_user">
                    <?php if ( is_user_logged_in() ) {
                        $avatar_url = get_avatar( $user_info->user_email,50,'',false,array('class'=>'pm-user','force_display'=>true) );
                        if ( ($current_user instanceof WP_User) ) {
                    ?>

                    <div class="img_user">
                        <?php echo $avatar_url; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- get_avatar() retorna HTML seguro ?>
                    </div>
                    <div class="data_user">
                        <div class="name_user">
                            <h3><?php echo esc_html( $current_user->first_name . ' ' . $current_user->last_name ); ?></h3>
                            <?php if($active_user){ ?><i class="icon-verified"></i> <?php } ?>
                        </div>
                        <div class="type_user">
                            <p><?php echo esc_html( $u_level['level'] ); ?></p>
                        </div>
                    </div>
                    <?php
                                    }
                                }?>
                    <div class="close_menu">
                        <a href="#" id="close_account_menu"><i class="icon-close"></i></a>
                    </div>
                </div>
                <div class="options_account">
                    <a href="<?php echo esc_url( get_permalink(10) ); ?>" class="full_option"><i
                            class="icon-account_circle-fill"></i> Ver mi perfil</a>
                    <a href="<?php echo esc_url( get_permalink(10) ); ?>#migarage2" class="hl_option"><i
                            class="icon-gear"></i> Mi Garage</a>
                    <?php if(!empty($orders)){?>
                    <a href="<?php echo esc_url( get_permalink(10) ); ?>#pg-my-orders" class="hr_option"><i
                            class="icon-shopping_cart-fill"></i> Mis compras</a>
                    <?php }?>
                    <a href="<?php echo esc_url( get_permalink(10) ); ?>#upload-photo" class="full_option"><i
                            class="icon-uploadpic"></i> Subir una foto</a>
                    <?php if($active_user == false){ ?><a href="<?php echo esc_url( get_permalink(100) ); ?>"
                        class="full_option rodador_activo"><i class="icon-verified"></i> Conviértete en
                        Rodador Premium</a> <?php } ?>

                    <a href="<?php echo esc_url( get_permalink(10) ); ?>#misdesafios1" class="full_option"><i
                            class="icon-achievements"></i> Mis desafios</a>
                    <a href="<?php echo esc_url( get_permalink(88) ); ?>" class="full_option"><i class="icon-help"></i>
                        Contactar a Soporte</a>
                    <a href="<?php echo esc_url( get_permalink(10) ); ?>#account-settings" class="full_option"><i
                            class="icon-settings"></i> Ajustes de la cuenta</a>
                    <a href="<?php echo wp_logout_url( home_url()); ?>" class="full_option"><i class="icon-logout"></i>
                        Cerrar Sesión</a>
                </div>
            </div>
        </header><!-- #masthead -->

        <div class="unete-modal" style="background-image:url(<?php echo esc_url( $modal_img[0] ); ?>);">
            <div class="unete-content-modal">
                <a id="unete-close"><img src="<?php echo esc_url( $close ); ?>" alt="close"></a>
                <h2><?php echo esc_html( $modal_titulo ); ?></h2>
                <div class="list_modal">
                    <?php echo wp_kses_post( $contenido_modal ); ?>
                </div>
                <a id="btn_unete_header" class="btn_unete" href="<?php echo esc_url( get_permalink(100) ); ?>">únete al
                    desafío</a>
            </div>
            <div class="unete-backdrop-modal"></div>
            <input type="hidden" name="time_banner" id="time_banner" value="<?php echo esc_attr( $duracion_banner ); ?>">
        </div>

        <div class="buscar-modal">
            <div class="buscar_content_modal">
                <!--<div class="input_search">
                    <a id="buscar-close"><img src="<?php echo esc_url( $close ); ?>" alt="close"></a>
                    <input type="text" placeholder="Ingresa tu busqueda">
                </div>-->
                <form role="search" method="get" class="woocommerce-product-search input_search"
                    action="<?php echo esc_url( home_url( '/' ) ); ?>">
                    <a id="buscar-close"><img src="<?php echo esc_url( $close ); ?>" alt="close"></a>
                    <input type="search"
                        id="woocommerce-product-search-field-<?php echo isset( $index ) ? absint( $index ) : 0; ?>"
                        class="search-field"
                        placeholder="<?php echo esc_attr__( 'Ingresa tu busqueda', 'woocommerce' ); ?>"
                        value="<?php echo get_search_query(); ?>" name="s" />
                    <!-- <input type="hidden" name="post_type" value="product" /> -->
                    <!-- <input type="hidden" name="post_type" value="post" /> -->
                    <!-- <input type="hidden" name="post_type[]" value="product" />
                    <input type="hidden" name="post_type[]" value="page" /> -->
                </form>

            </div>
        </div>
        <?php
	/**
	 * Functions hooked in to storefront_before_content
	 *
	 * @hooked storefront_header_widget_region - 10
	 * @hooked woocommerce_breadcrumb - 10
	 */
	//do_action( 'storefront_before_content' );
	?>

        <div id="content" class="" tabindex="-1">
            <div class="menu_down_mobile">
                <a href="#" id="search_btn_mobile" class="l_menu"><i class="icon-search"></i></a>
                <a href="" id="notification_btn_mobile" class="c_menu c_left">
                    <?php 
                        if( is_user_logged_in() ){ 
                            $found = get_user_meta( $current_user->ID, 'notification', true);
                            if($found == "true"){
                                ?> <span></span><?php
                            }
                        }
                    ?>
                    <i class="icon-notifications"></i></a>
                <a href="#" id="carrito_btn_mobile" class="c_menu c_right cart_m"><i class="icon-shopping_cart"></i>
                    <div id="mini-cart-count-m"></div>
                </a>
                <a href="<?php if( is_user_logged_in() ){ ?>#<?php }else{ echo site_url( '/iniciar-sesion/', 'https' ); }?>"
                    id="<?php if( is_user_logged_in() ){ ?>side_menu_btn_mobile<?php }else{ } ?>" class="l_menu"><i
                        class="icon-account_circle"></i></a>
            </div>
            <div id="mobile-menu-container" class="mobile-menu-container">
                <div class="mobile-menu-close">
                    <i class="icon-menu_open"></i>
                </div>
                <div id="mobile-menu-wrap"></div>
            </div>

            <div class="buscar_mobile">
                <div class="buscar_content_mobile">
                    <form role="search" method="get" class="woocommerce-product-search input_search"
                        action="<?php echo esc_url( home_url( "/" ) ); ?>">
                        <i class="icon-search"></i>
                        <input type="search"
                            id="woocommerce-product-search-field-<?php echo isset( $index ) ? absint( $index ) : 0; ?>"
                            class="search-field" placeholder="<?php echo esc_attr__( "Buscar", "woocommerce" ); ?>"
                            value="<?php echo get_search_query(); ?>" name="s" />
                        <!-- <input type="hidden" name="post_type" value="product" /> -->
                    </form>
                </div>
            </div>

            <div class="notifications_mobile">
                <div class="notifications_content_mobile">
                    <div class="top_notifications">
                        <p>Notificaciones</p>
                        <a href="#" id="close_notifications_menu"><i class="icon-close"></i></a>
                    </div>
                    <?php if( is_user_logged_in() ){ ?>
                    <div class="items_notifications">
                        <?php if ($alertas) : foreach ($alertas as $alerta) : 
                                $tipo = get_post_meta( $alerta->ID, 'tipo_notificacion', true );
                                $adicional = get_post_meta( $alerta->ID, 'texto_adicional', true );
                                $usuario = get_post_meta( $alerta->ID, 'usuario', true );
                                $tiempo = tiempo_transcurrido($alerta->post_date);
                                $icon = icon_notification($tipo);
                            ?>
                        <div class="item_notification">
                            <i class="img_notification <?php echo esc_attr( $icon ); ?>"></i>
                            <div class="data_notification">
                                <p class="notification"><?php echo esc_html( $alerta->post_title ); ?></p>
                                <?php if($adicional  != ""){ ?><p class="notification">
                                    <?php echo wp_kses_post( $adicional ); ?></p> <?php }?>
                                <p class="date">
                                    <?php echo esc_html( $tiempo ); ?>
                                </p>
                            </div>
                        </div>
                        <?php 
                            endforeach;
                            wp_reset_postdata();
                            endif; 
                        ?>
                    </div>

                    <div class="mas">
                        <a href="<?php echo esc_url( get_permalink(10) ); ?>#misnotificaciones5">Ver
                            todas</a>
                    </div>
                    <?php } ?>
                </div>
            </div>

            <div class="carrito_mobile">
                <div class="carrito_content_mobile">

                    <div class="top_carrito">
                        <p>Mi carrito</p>
                        <a href="#" id="close_carrito_menu"><i class="icon-close"></i></a>
                    </div>

                    <div class="items_carrito">
                        <div id="carrito-m"></div>
                    </div>
                    <div class="subtotal_carrito">
                        <p>Subtotal:
                            <span>
                                <?php wc_cart_totals_order_total_html(); ?></span>
                        </p>
                    </div>
                    <div class="buttons_carrito">
                        <a href="<?php echo wc_get_checkout_url(); ?>" class="checkout_btn">Checkout</a>
                        <a href="<?php echo wc_get_cart_url(); ?>" class="carrito_btn">Ver Carrito</a>
                    </div>

                </div>
            </div>

            <div class="">

                <?php
		//do_action( 'storefront_content_top' );