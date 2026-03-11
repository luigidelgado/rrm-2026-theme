<?php
/**
 * Storefront engine room
 *
 * @package storefront
 */

/**
 * Assign the Storefront version to a var
 */
$theme              = wp_get_theme( 'storefront' );
$storefront_version = $theme['Version'];

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 980; /* pixels */
}

$storefront = (object) array(
	'version'    => $storefront_version,

	/**
	 * Initialize all the things.
	 */
	'main'       => require 'inc/class-storefront.php',
	'customizer' => require 'inc/customizer/class-storefront-customizer.php',
);

require 'inc/storefront-functions.php';
require 'inc/storefront-template-hooks.php';
require 'inc/rrm-template-functions.php';
require 'inc/storefront-template-functions.php';
require 'inc/wordpress-shims.php';

if ( class_exists( 'Jetpack' ) ) {
	$storefront->jetpack = require 'inc/jetpack/class-storefront-jetpack.php';
}

if ( storefront_is_woocommerce_activated() ) {
	$storefront->woocommerce            = require 'inc/woocommerce/class-storefront-woocommerce.php';
	$storefront->woocommerce_customizer = require 'inc/woocommerce/class-storefront-woocommerce-customizer.php';

	require 'inc/woocommerce/class-storefront-woocommerce-adjacent-products.php';

	require 'inc/woocommerce/storefront-woocommerce-template-hooks.php';
	require 'inc/woocommerce/storefront-woocommerce-template-functions.php';
	require 'inc/woocommerce/storefront-woocommerce-functions.php';
}

if ( is_admin() ) {
	$storefront->admin = require 'inc/admin/class-storefront-admin.php';

	require 'inc/admin/class-storefront-plugin-install.php';
}

/**
 * NUX
 * Only load if wp version is 4.7.3 or above because of this issue;
 * https://core.trac.wordpress.org/ticket/39610?cversion=1&cnum_hist=2
 */
if ( version_compare( get_bloginfo( 'version' ), '4.7.3', '>=' ) && ( is_admin() || is_customize_preview() ) ) {
	require 'inc/nux/class-storefront-nux-admin.php';
	require 'inc/nux/class-storefront-nux-guided-tour.php';
	require 'inc/nux/class-storefront-nux-starter-content.php';
}

/**
 * Note: Do not add any custom code here. Please use a custom plugin so that your customizations aren't lost during updates.
 * https://github.com/woocommerce/theme-customisations
 */


add_action('wp_enqueue_scripts', 'rr_register_styles');
add_action('wp_enqueue_scripts', 'profilegrid_user_profiles_groups_and_communities_callback',11);
add_action('wp_enqueue_scripts', 'rr_register_scripts');

function rr_register_styles()
{
  wp_enqueue_style('bootstrap-css', '//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.2/css/bootstrap.min.css', array(), '1.0', 'all');
  wp_enqueue_style('fonts', '//fonts.googleapis.com/css2?family=Teko:wght@300;400;500;700&display=swap', array(), '1.0', 'all');
  wp_enqueue_style('slick-css', '//cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css', array(), '1.0', 'all');
  wp_enqueue_style('slick-theme', '//cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.min.css', array(), '1.0', 'all');
  wp_enqueue_style( 'styles-swiper', 'https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css', false, '1.0', 'all');
  wp_enqueue_style( 'styles-date-picker', '//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css', false, '1.0', 'all');
  wp_enqueue_style('main-styles', get_template_directory_uri() . '/assets/dist/theme.css', array(), '1.4.2.2', 'all');
  wp_enqueue_style('secondary-styles', get_template_directory_uri() . '/assets/dist/theme-c.css', array(), '1.2.2.7', 'all');

  //Gallery
  wp_enqueue_style( 'lightgallery-css', '//cdn.jsdelivr.net/npm/lightgallery@2.0.0-beta.3/css/lightgallery.css', false, '1.0', 'all');
  wp_enqueue_style( 'lightgallery-zoom-css', '//cdn.jsdelivr.net/npm/lightgallery@2.0.0-beta.3/css/lg-zoom.css', false, '1.0', 'all');
  wp_enqueue_style( 'lightgallery-thumbnail-css', '//cdn.jsdelivr.net/npm/lightgallery@2.0.0-beta.3/css/lg-thumbnail.css', false, '1.0', 'all');
  wp_enqueue_style( 'lightgallery-screen-css', '//cdn.jsdelivr.net/npm/lightgallery@2.0.0-beta.3/css/lg-fullscreen.css', false, '1.0', 'all');
  wp_enqueue_style( 'lightgallery-autoplay-css', '//cdn.jsdelivr.net/npm/lightgallery@2.0.0-beta.3/css/lg-autoplay.css', false, '1.0', 'all');
  wp_enqueue_style( 'lightgallery-share-css', '//cdn.jsdelivr.net/npm/lightgallery@2.0.0-beta.3/css/lg-share.css', false, '1.0', 'all');
}


function rr_register_scripts()
{
  wp_deregister_script('pg-profile-menu.js');
  wp_dequeue_script('pg-profile-menu.js');
  wp_enqueue_script('pg-profile-menu.js-child', get_template_directory_uri().'/profilegrid-user-profiles-groups-and-communities/js/pg-profile-menu.js', array( 'jquery' ), '1.0', false );

  //Gallery
  wp_enqueue_script('lightgallery', '//cdn.jsdelivr.net/npm/lightgallery@2.0.0-beta.3/lightgallery.umd.js', array(), '1.0', true);
  wp_enqueue_script('lightgallery-zoom', '//cdn.jsdelivr.net/npm/lightgallery@2.0.0-beta.3/plugins/zoom/lg-zoom.umd.js', array(), '1.0', true);
  wp_enqueue_script('lightgallery-thumbnail', '//cdn.jsdelivr.net/npm/lightgallery@2.0.0-beta.3/plugins/thumbnail/lg-thumbnail.umd.js', array(), '1.0', true);
  wp_enqueue_script('lightgallery-fullscreen', '//cdn.jsdelivr.net/npm/lightgallery@2.0.0-beta.3/plugins/fullscreen/lg-fullscreen.umd.js', array(), '1.0', true);
  wp_enqueue_script('lightgallery-autoplay', '//cdn.jsdelivr.net/npm/lightgallery@2.0.0-beta.3/plugins/autoplay/lg-autoplay.umd.js', array(), '1.0', true);
  wp_enqueue_script('lightgallery-share', '//cdn.jsdelivr.net/npm/lightgallery@2.0.0-beta.3/plugins/share/lg-share.umd.js', array(), '1.0', true);
  wp_enqueue_script('lightgallery-hash', '//cdn.jsdelivr.net/npm/lightgallery@2.0.0-beta.3/plugins/hash/lg-hash.min.js', array(), '1.0', true);
  
  wp_enqueue_script('form-validate', '//unpkg.com/just-validate@latest/dist/just-validate.production.min.js', array(), '1.0', true);
  wp_enqueue_script('jquery', '//code.jquery.com/jquery-3.7.1.min.js', array(), '3.7.1', true);
  wp_enqueue_script('jquery-validate', '//cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.min.js', array(), '1.19.5', true);
  wp_enqueue_script('slick-js-defer', '//cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js', array(), '1.8.0', true);
  wp_enqueue_script( 'swiper', 'https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js');
  wp_enqueue_script('bootstrap-js', '//stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js', array(), '2.2.4', true);
  wp_enqueue_script('datepicker', '//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js', array(), '1.0.10', true);
  wp_enqueue_script('slicknav', '//cdnjs.cloudflare.com/ajax/libs/SlickNav/1.0.10/jquery.slicknav.min.js', array(), '1.0.10', true);
  wp_enqueue_script('recaptcha_g', '//google.com/recaptcha/api.js?onload=onloadCallback&render=explicit', array(), '1.0.12', true);
  wp_enqueue_script('main-scripts', get_template_directory_uri() .'/assets/dist/theme.js', array(), '1.2.0.4', true);
  wp_enqueue_script('secondary-scripts', get_template_directory_uri() .'/assets/dist/theme-c.js', array(), '1.0.7.13', true);
  wp_localize_script('main-scripts', 'cc_ajax_object', array('ajax_url' => admin_url('admin-ajax.php')));

}

function profilegrid_user_profiles_groups_and_communities_callback()
{
  if ( is_user_logged_in() ) :
    $pmrequests    = new PM_request();
    $dbhandler = new PM_DBhandler();
    $error                              = array();
    $error['valid_email']               = __( 'Please enter a valid e-mail address.', 'profilegrid-user-profiles-groups-and-communities' );
    $error['valid_number']              = __( 'Please enter a valid number.', 'profilegrid-user-profiles-groups-and-communities' );
    $error['valid_date']                = __( 'Please enter a valid date(yyyy-mm-dd format).', 'profilegrid-user-profiles-groups-and-communities' );
    $error['required_field']            = __( 'This is a required field.', 'profilegrid-user-profiles-groups-and-communities' );
    $error['file_type']                 = __( 'This file type is not allowed.', 'profilegrid-user-profiles-groups-and-communities' );
    $error['short_password']            = __( 'Your password should be at least 7 characters long.', 'profilegrid-user-profiles-groups-and-communities' );
    $error['pass_not_match']            = __( 'Password and confirm password do not match.', 'profilegrid-user-profiles-groups-and-communities' );
    $error['user_exist']                = __( 'Sorry, username already exist.', 'profilegrid-user-profiles-groups-and-communities' );
    $error['email_exist']               = __( 'Sorry, email already exist.', 'profilegrid-user-profiles-groups-and-communities' );
    $error['valid_facebook_url']        = __( 'Please enter a valid facebook url.', 'profilegrid-user-profiles-groups-and-communities' );
    $error['valid_twitter_url']         = __( 'Please enter a valid twitter url.', 'profilegrid-user-profiles-groups-and-communities' );
    $error['valid_google_url']          = __( 'Please enter a valid google+ url.', 'profilegrid-user-profiles-groups-and-communities' );
    $error['valid_linked_in_url']       = __( 'Please enter a valid linkedin url.', 'profilegrid-user-profiles-groups-and-communities' );
    $error['valid_youtube_url']         = __( 'Please enter a valid youtube url.', 'profilegrid-user-profiles-groups-and-communities' );
    $error['valid_mixcloud_url']        = __( 'Please enter a valid Mixcloud url.', 'profilegrid-user-profiles-groups-and-communities' );
    $error['valid_soundcloud_url']      = __( 'Please enter a valid SoundCloud url.', 'profilegrid-user-profiles-groups-and-communities' );
    $error['valid_instagram_url']       = __( 'Please enter a valid instagram url.', 'profilegrid-user-profiles-groups-and-communities' );
    $error['atleast_one_field']         = __( 'Select at least one field.', 'profilegrid-user-profiles-groups-and-communities' );
    $error['seprator_not_empty']        = __( 'Seperator field can not be empty.', 'profilegrid-user-profiles-groups-and-communities' );
    $error['choose_image']              = __( 'Choose Image', 'profilegrid-user-profiles-groups-and-communities' );
    $error['valid_image']               = __( 'This is not a valid image', 'profilegrid-user-profiles-groups-and-communities' );
    $error['valid_group_name']          = __( 'Please enter a valid group name.', 'profilegrid-user-profiles-groups-and-communities' );
    $error['group_manager_first']       = __( 'You must define a Group Manager first, before making a Group closed.', 'profilegrid-user-profiles-groups-and-communities' );
    $error['delete']                    = __( 'Delete', 'profilegrid-user-profiles-groups-and-communities' );
    $error['success']                   = __( 'Success', 'profilegrid-user-profiles-groups-and-communities' );
    $error['failure']                   = __( 'Failure', 'profilegrid-user-profiles-groups-and-communities' );
    $error['select_group']              = __( 'please select a group', 'profilegrid-user-profiles-groups-and-communities' );
    $error['no_user_search']            = __( 'Sorry, no user with this username in this group.', 'profilegrid-user-profiles-groups-and-communities' );
    $error['select_field_completeness'] = __( 'Select a Multiple Fields.', 'profilegrid-user-profiles-groups-and-communities' );
    $error['completeness_no_fields']    = __( 'Sorry, there are no fields like this here.', 'profilegrid-user-profiles-groups-and-communities' );

    $error['change_group']   = __( 'You are changing the group of this user. All data associated with profile fields of old group will be hidden and the user will have to edit and fill profile fields associated with the new group. Do you wish to continue?', 'profilegrid-user-profiles-groups-and-communities' );
    $error['allow_file_ext'] = $dbhandler->get_global_option_value( 'pm_allow_file_types', 'jpg|jpeg|png|gif' );
    $error['login_url'] = $pmrequests->profile_magic_get_frontend_url( 'pm_user_login_page', site_url( '/wp-login.php' ) );
    wp_dequeue_script('profilegrid-user-profiles-groups-and-communities');
    wp_deregister_script('profile-magic-admin-power.js');
    wp_dequeue_script('profile-magic-admin-power.js');
    
    wp_enqueue_script('profilegrid-user-profiles-groups-and-communities-child', get_stylesheet_directory_uri().'/profilegrid-user-profiles-groups-and-communities/js/profile-magic-public.js', array( 'jquery', 'jquery-form' ), null, true);
    wp_enqueue_script('profile-magic-admin-power.js-child', get_stylesheet_directory_uri().'/profilegrid-user-profiles-groups-and-communities/js/profile-magic-admin-power.js', array( 'jquery' ), null, true );
    
    wp_localize_script( 'profile-magic-admin-power.js-child', 'pm_error_object', $error );
  endif;
}



/*------------------------------------*\
START - Register Post Type
\*------------------------------------*/
function createPostType()
{
  register_post_type( 'slider-home',
    array(
      'labels'          => array(
        'name'          => __( 'Slider Home' ),
        'singular_name' => __( 'Slider Home' )
      ),
      'public'              => true,
      'has_archive'         => false,
      'publicly_queryable'  => false,
      'exclude_from_search' => true,
      // 'rewrite'             => array( 'slug' => 'fondo-home' ),
      'supports'            => ['title','editor','thumbnail','custom-fields'],
      'menu_icon'   => 'dashicons-slides',
    )
  );
  
  register_post_type( 'preguntas',
    array(
      'labels'          => array(
        'name'          => __( 'FAQ' ),
        'singular_name' => __( 'FAQ' )
      ),
      'public'              => true,
      'has_archive'         => false,
      'publicly_queryable'  => false,
      'exclude_from_search' => true,
      'supports'            => ['title','editor','custom-fields'],
      'menu_icon'   => 'dashicons-clipboard',
    )
  );

  register_post_type( 'objetivos',
    array(
      'labels'          => array(
        'name'          => __( 'Objetivos' ),
        'singular_name' => __( 'Objetivos' )
      ),
      'public'              => true,
      'has_archive'         => false,
      'publicly_queryable'  => false,
      'exclude_from_search' => true,
      'supports'            => ['title','editor','custom-fields'],
      'menu_icon'   => 'dashicons-saved',
    )
  );

  register_post_type( 'reglas',
    array(
      'labels'          => array(
        'name'          => __( 'Reglas Participación' ),
        'singular_name' => __( 'Regla de Participación' )
      ),
      'public'              => true,
      'has_archive'         => false,
      'publicly_queryable'  => false,
      'exclude_from_search' => true,
      'supports'            => ['title','editor','thumbnail','custom-fields'],
      'menu_icon'   => 'dashicons-forms',
    )
  );

  register_post_type( 'linea_temporal',
    array(
      'labels'          => array(
        'name'          => __( 'Línea Temporal' ),
        'singular_name' => __( 'Línea Temporal' )
      ),
      'public'              => true,
      'has_archive'         => false,
      'publicly_queryable'  => false,
      'exclude_from_search' => true,
      'supports'            => ['title','editor','thumbnail','custom-fields'],
      'menu_icon'   => 'dashicons-clock',
    )
  );
  register_post_type( 'significados_parches',
    array(
      'labels'          => array(
        'name'          => __( 'Significados Parches' ),
        'singular_name' => __( 'Significados Parches' )
      ),
      'public'              => true,
      'has_archive'         => false,
      'publicly_queryable'  => false,
      'exclude_from_search' => true,
      'supports'            => ['title','editor','thumbnail','custom-fields'],
      'menu_icon'   => 'dashicons-shield-alt',
    )
  );

  register_post_type( 'generales',
    array(
      'labels'          => array(
        'name'          => __( 'Generales' ),
        'singular_name' => __( 'Generales' )
      ),
      'public'              => true,
      'has_archive'         => false,
      'publicly_queryable'  => false,
      'exclude_from_search' => true,
      'supports'            => ['title','custom-fields'],
      'menu_icon'   => 'dashicons-index-card',
    )
  );
}
add_action( 'init', 'createPostType' );


add_action('init', 'initCustoms');
function initCustoms()
{
    add_action( 'add_meta_boxes', 'registerAllMetaBoxes' );
	  add_action( 'save_post', 'saveCustomMeta' );
}


  function registerAllMetaBoxes()
  {
	  add_meta_box( 'box-data-text-slider-home', 'Texto URL', 'textUrlSlideHome', 'slider-home', 'normal');
    add_meta_box( 'box-data-slider-home', 'URL', 'urlSlideHome', 'slider-home', 'normal');
    //add_meta_box( 'box-data-title-temporal-line', 'Título', 'titleLine', 'linea_temporal', 'normal');
  }

  function textUrlSlideHome($post){ 
    $text_url_slide_home = get_post_meta( $post->ID, '_text_url_slide_home', true );
    ?>
<div>
    <input type="text" id="_text_url_slide_home" name="_text_url_slide_home" value="<?php echo $text_url_slide_home; ?>"
        style="width: 50%;" />
</div>
<?php
  }



  function urlSlideHome($post){ 
    $url_slide_home = get_post_meta( $post->ID, '_url_slide_home', true );
    ?>
<div>
    <input type="url" id="_url_slide_home" name="_url_slide_home" pattern="https://.*" placeholder="https://example.com"
        value="<?php echo $url_slide_home; ?>" style="width: 50%;" />
</div>
<?php
  }

/*  function titleLine($post){ 
    $title_line = get_post_meta( $post->ID, '_title_line', true );
    ?>
<div>
    <input type="text" id="_title_line" name="_title_line" value="<?php echo $title_line; ?>" style="width: 50%;" />
</div>
<?php
  }*/



function saveCustomMeta($post_id)
  {
	  if (isset($_POST['_text_url_slide_home']) && !empty($_POST['_text_url_slide_home'])) 
      update_post_meta( $post_id, '_text_url_slide_home', $_POST['_text_url_slide_home'] );

    if (isset($_POST['_url_slide_home']) && !empty($_POST['_url_slide_home'])) 
      update_post_meta( $post_id, '_url_slide_home', $_POST['_url_slide_home'] ); 

   // if (isset($_POST['_title_line']) && !empty($_POST['_title_line'])) 
    //  update_post_meta( $post_id, '_title_line', $_POST['_title_line'] ); 

}

/*------------------------------------*\
Start - Agregar tamaños de imagenes
\*------------------------------------*/
// add_action( 'after_setup_theme', 'wpdocs_theme_setup' );
// function wpdocs_theme_setup() {
//   //add_image_size( 'category-thumb', 300 ); // 300 pixels wide (and unlimited height)
//   add_image_size( 'woocommerce_single', 445, 445, true ); // (cropped)
// }
/*------------------------------------*\
End -Agregar tamaños de imagenes
\*------------------------------------*/


function rr_nav()
{
 wp_nav_menu(
     array(
      'theme_location'  => 'header-menu'
  )
 );
}


function rr_footer_left_nav()
{
 wp_nav_menu(
     array(
      'theme_location'  => 'footer-menu-left'
  )
 );
}

function hide_menu_conditional($items, $args) {
  if ($args->theme_location == 'header-menu') {
      if (is_user_logged_in()) {
          foreach ($items as $key => $item) {
              if ($item->title == 'Regístrate') {
                  unset($items[$key]);
                  break;
              }
          }
      }
  }
  return $items;
}

add_filter('wp_nav_menu_objects', 'hide_menu_conditional', 10, 2);


function rr_footer_right_nav()
{
 wp_nav_menu(
     array(
      'theme_location'  => 'footer-menu-right'
  )
 );
}


function register_rr_menu()
{
    register_nav_menus(array(
        'header-menu' => __('Header Menu', 'rr'),
        'footer-menu-right' => __('Footer Right Menu', 'rr'),
        'footer-menu-left' => __('Footer Left Menu', 'rr')
    ));
}

function my_wp_nav_menu_args($args = '')
{
    $args['container'] = false;
    return $args;
}

add_action('init', 'register_rr_menu');
add_filter('wp_nav_menu_args', 'my_wp_nav_menu_args');


function wpbeginner_numeric_posts_nav($max_num_pages = 0) {

  /** Stop execution if there's only 1 page */
  if( $max_num_pages <= 1 )
      return;
  $paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
  
  /** Add current page to the array */
  if ( $paged >= 1 )
      $links[] = $paged;
  
  /** Add the pages around the current page to the array */
  if ( $paged >= 3 ) {
      $links[] = $paged - 1;
      $links[] = $paged - 2;
  }
  
  if ( ( $paged + 2 ) <= $max_num_pages ) {
      $links[] = $paged + 2;
      $links[] = $paged + 1;
  }
  echo '<div class="navigation"><ul>' . "\n";
  
  /** Previous Post Link */
  if ( get_previous_posts_link() )
      printf( '<li>%s</li>' . "\n", get_previous_posts_link() );
  
  /** Link to first page, plus ellipses if necessary */
  if ( ! in_array( 1, $links ) ) {
      $class = 1 == $paged ? ' class="page-numbers current"' : 'page-numbers';
      printf( '<li%s><a '.$class .' href="%s">%s</a></li>' . "\n", null, esc_url( get_pagenum_link( 1 ) ), '1' );
      if ( ! in_array( 2, $links ) )
          echo '<li>…</li>';
  }
  
  /** Link to current page, plus 2 pages in either direction if necessary */
  sort( $links );
  foreach ( (array) $links as $link ) {
      $class = $paged == $link ? ' class="page-numbers current"' : 'page-numbers';
      printf( '<li%s><a '.$class .' href="%s">%s</a></li>' . "\n", null, esc_url( get_pagenum_link( $link ) ), $link );
  }
  
  /** Link to last page, plus ellipses if necessary */
  if ( ! in_array( $max_num_pages, $links ) ) {
      if ( ! in_array( $max_num_pages - 1, $links ) )
          echo '<li>…</li>' . "\n";
      $class = $paged == $max_num_pages ? ' class="page-numbers current"' : 'page-numbers';
      printf( '<li%s><a '.$class .' href="%s">%s</a></li>' . "\n", null, esc_url( get_pagenum_link( $max_num_pages ) ), $max_num_pages );
  }
  
  /** Next Post Link */
  if ( get_next_posts_link() )
      printf( '<li>%s</li>' . "\n", get_next_posts_link() );
  echo '</ul></div>' . "\n";
  }


  function getLastPosts(){
    $argsRecents = [
      'post_type' => 'post',
      'posts_per_page' => 3, 
      'order'           => 'DESC',
      'post_status'     => 'publish',
    ];
    $wp_queryRecents = new WP_Query($argsRecents);

    while ( $wp_queryRecents->have_posts() ) : $wp_queryRecents->the_post(); 
              get_template_part( 
      'partials/entry-blog-sidebar',
      'entry-blog-sidebar',
      array(
        'image-url' => get_the_post_thumbnail_url( get_the_ID()),
        'post-title' => get_the_title(),
        'date' => get_the_date(),
        'post-url' => get_post_permalink()
        //'url-post' => get_the_permalink(get_the_ID())
      )
    );
              endwhile;
              wp_reset_postdata(); 
  }


  function getCategories(){
    $categories = get_categories( array(
        'orderby' => 'name',
        'order'   => 'ASC'
    ) );
    foreach( $categories as $category ) {
        $category_link = sprintf( 
            '<a href="%1$s" alt="%2$s">%3$s</a>',
            esc_url( get_category_link( $category->term_id ) ),
            esc_attr( sprintf( __( '%s', 'textdomain' ), $category->name ) ),
            esc_html( $category->name )
        );
        echo '<li>' . sprintf( $category_link ) . '</li> ';
    } 
  }

function getTags(){
  $tags = get_tags(array(
    'hide_empty' => true
  ));
  $html = '<ul>';
  foreach ( $tags as $tag ) {
      $tag_link = get_tag_link( $tag->term_id );

      $html .= "<li><a href='{$tag_link}' title='{$tag->name} Tag' class='{$tag->slug}'>";
      $html .= "{$tag->name}</a></li>";
  }
  $html .= '</ul>';
  echo $html;
}

add_filter( 'woocommerce_add_to_cart_fragments', 'wc_mini_cart_refresh_items');
function wc_mini_cart_refresh_items($fragments){
    ob_start();
    ?>
<div id="carrito-m">
    <form class="woocommerce-cart-form-mobile" action="<?php echo esc_url( wc_get_cart_url() ); ?>" method="post">
        <?php foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
                                $_product = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
                                $product_id = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item,
                                $cart_item_key );
                                $product_name = apply_filters( 'woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key );

                        if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters(
                        'woocommerce_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
                        $product_permalink = apply_filters( 'woocommerce_cart_item_permalink', $_product->is_visible() ?
                        $_product->get_permalink( $cart_item ) : '', $cart_item, $cart_item_key );
                        ?>
        <div
            class="item_carrito <?php echo esc_attr( apply_filters( 'woocommerce_cart_item_class', 'cart_item', $cart_item, $cart_item_key ) ); ?>">
            <div class="img_product">
                <?php
                                        $thumbnail = apply_filters( 'woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key );

                                        if ( ! $product_permalink ) {
                                            echo $thumbnail;
                                        } else {
                                            printf( '<a href="%s">%s</a>', esc_url( $product_permalink ), $thumbnail ); 
                                        }
                                        ?>
            </div>
            <div class="data_product">
                <p class="name_product" data-title="<?php esc_attr_e( 'Product', 'woocommerce' ); ?>">
                    <?php
                                    if ( ! $product_permalink ) {
                                        echo wp_kses_post( $product_name . '&nbsp;' );
                                    } else {
                                        echo wp_kses_post( apply_filters( 'woocommerce_cart_item_name', sprintf( '<a href="%s">%s</a>', esc_url( $product_permalink ), $_product->get_name() ), $cart_item, $cart_item_key ) );
                                    }

                                    do_action( 'woocommerce_after_cart_item_name', $cart_item, $cart_item_key );

                                    echo wc_get_formatted_cart_item_data( $cart_item ); 

                                    if ( $_product->backorders_require_notification() && $_product->is_on_backorder( $cart_item['quantity'] ) ) {
                                        echo wp_kses_post( apply_filters( 'woocommerce_cart_item_backorder_notification', '<p class="backorder_notification">' . esc_html__( 'Available on backorder', 'woocommerce' ) . '</p>', $product_id ) );
                                    }
                                    ?>
                </p>
                <p class="price_product" data-title="<?php esc_attr_e( 'Price', 'woocommerce' ); ?>">
                    <?php echo $cart_item['quantity'] ?> x <?php
								        echo apply_filters( 'woocommerce_cart_item_price', WC()->cart->get_product_price( $_product ), $cart_item, $cart_item_key );
							        ?></p>
            </div>
            <?php
								echo apply_filters( 
									'woocommerce_cart_item_remove_link',
									sprintf(
										'<a href="%s" class="img_remove" aria-label="%s" data-product_id="%s" data-product_sku="%s"><i class="icon-close"></i></a>',
										esc_url( wc_get_cart_remove_url( $cart_item_key ) ),
										esc_attr( sprintf( __( 'Remove %s from cart', 'woocommerce' ), wp_strip_all_tags( $product_name ) ) ),
										esc_attr( $product_id ),
										esc_attr( $_product->get_sku() )
									),
									$cart_item_key
								);
							?>
        </div>
        <?php
                                }
                            }?>
    </form>
</div>
<?php
        $fragments['#carrito-m'] = ob_get_clean();
    return $fragments;
}



/*------------------------------------*\
 Guardar post garage
\*------------------------------------*/
add_action('wp_ajax_save_garage_item', 'save_garage_item');
add_action('wp_ajax_nopriv_save_garage_item', 'save_garage_item');
 
function save_garage_item(){
    if ( empty( $_POST["name"] ) ) {
      //$response ="Ingresa un nombre";
      wp_send_json_error('Ingresa un nombre.');
    }else {
      $user = wp_get_current_user();
      $name = $_POST["name"]; 
      $marca = $_POST["brand"]; 
      $color = $_POST["color"]; 
      $modelo = $_POST["model"]; 
      $estatus = $_POST["status"]; 
      $estilo = $_POST["style"]; 
      $image = $_POST["image"]; 
      $args = array(
        'post_type' => 'garage',
        'post_title' => $name,
        'author' => $user,
        'post_status' => 'publish',
      );
      $post_id = wp_insert_post($args);
      $termMarca  = get_term_by( 'id', $marca, 'marca');
      $termBrandId  = wp_set_object_terms($post_id, $termMarca->name, 'marca');

      $termColor  = get_term_by( 'id', $color, 'color');
      $termColorId  = wp_set_object_terms($post_id, $termColor->name, 'color');

      //$termModelo  = get_term_by( 'id', $modelo, 'modelo');
      //wp_set_object_terms($post_id, $termModelo->name, 'modelo');
      $updateFieldId  = update_field( 'modelo_moto', $modelo , $post_id);

      $termEstaus  = get_term_by( 'id', $estatus, 'estaus');
      $termStatusId = wp_set_object_terms($post_id, $termEstaus->name, 'estaus');

      $termEstilo  = get_term_by( 'id', $estilo, 'estilo');
      $termStyleId = wp_set_object_terms($post_id, $termEstilo->name, 'estilo');
      

      // if (!function_exists('wp_handle_upload')) {
      //   require_once(ABSPATH . 'wp-admin/includes/file.php');
      // }
      // $uploadedfile = $_FILES['image'];
      // $upload_overrides = array('test_form' => false);
      // $movefile = wp_handle_upload($uploadedfile, $upload_overrides);
      // $filename = $movefile['url'];
      // $filetype = wp_check_filetype( basename( $filename ), null );
     
      // $wp_upload_dir = wp_upload_dir();
      // $attachment = array(
      //   'guid'           => $wp_upload_dir['url'] . '/' . basename( $filename ), 
      //   'post_mime_type' => $filetype['type'],
      //   'post_title'     => preg_replace( '/\.[^.]+$/', '', basename( $filename ) ),
      //   'post_content'   => '',
      //   'post_status'    => 'inherit'
      // );
      
      // $attach_id = wp_insert_attachment( $attachment, $filename, $post_id);
      
      // require_once( ABSPATH . 'wp-admin/includes/image.php' );
      
      // $attach_data = wp_generate_attachment_metadata( $attach_id, $filename );
      // wp_update_attachment_metadata( $attach_id, $attach_data );
      
      // set_post_thumbnail( $post_id, $attach_id );

      // $image = $_FILES['image'];
      // $attach = upload_image($image, $post_id);
      // wp_update_attachment_metadata( $attach[0], $attach[1] );
      // $postThumbnail = set_post_thumbnail( $post_id, $attach[0] );

      if(!empty($_FILES['image'])){
        $image = $_FILES['image'];
        $attach = upload_image($image, $post_id);
        if($attach == false){
          wp_delete_post($post_id, true); 
          wp_send_json_error('Error al subir la imagen, la imagen no debe pesar mas de 2MB y no medir mas de 2560 píxeles, por favor vuelva a intentarlo');
        }
        wp_update_attachment_metadata( $attach[0], $attach[1] );
        set_post_thumbnail( $post_id, $attach[0] );
    }
    //if($post_id && $challengue && $u_id && !is_wp_error( $termChallengueStateId) && !is_wp_error( $termChallengueActivityId) && $postThumbnail){
   
    if ($post_id  && !is_wp_error( $termBrandId ) && !is_wp_error( $termColorId ) && !is_wp_error( $termStatusId ) && !is_wp_error( $termStyleId && $updateFieldId == true ) ) {
      wp_send_json_success( "Se ha guardado correctamente.");
        //echo true;
    } else {
      wp_delete_post($post_id, true);
      wp_send_json_error( 'Ha ocurrido un error, favor de intentarlo nuevamente.');
    }
  }
    //print_r(json_encode($response));
    exit;
}

add_action('wp_ajax_refresh_garage', 'refresh_garage');
add_action( 'wp_ajax_nopriv_refresh_garage', 'refresh_garage' );

function refresh_garage() {
    if( isset($_POST['refresh-garage']) && $_POST['refresh-garage'] == 'yes' ) {
        echo do_shortcode('[my_garage]'); 
    }
    die();
}


/*------------------------------------*\
START - Enviar correo de contacto
\*------------------------------------*/
add_action('wp_ajax_get_contact_form', 'get_contact_form');
add_action('wp_ajax_nopriv_get_contact_form', 'get_contact_form');
 
function get_contact_form(){
    if ( empty( $_POST["name"] ) ) {
      $response ="Ingresa un nombre";
    }else if ( empty( $_POST["mail"] ) ) {
      $response ='Ingresa tu email';
    }else if ( empty( $_POST["message"] ) ) {
      $response =  "Ingresa un mensaje";
    }else {
      $headers .= 'Content-Type: text/html; charset=UTF-8' . "\r\n"; 
      $headers .= 'From: '.$_POST["mail"] . "\r\n";
      $to = 'mo_ska_182343@hotmail.com';
      $subject = 'Mensaje de Contacto';
      $body  = 'From: ' . $_POST['name'] . '\n';
      $body .= 'Email: ' . $_POST['mail'] . '\n';
      $body .= 'Message: ' . $_POST['message'] . '\n';
      $response =  wp_mail( $to, $subject, $body, $headers );
      $response = mail("josel@g4all.mx","Contacto",$_POST['message']);
    }
    print_r(json_encode($response));
    exit;
}


function rrm_is_active_user($user_id){
  $args = array(
    'status' => array( 'active' ),
  );

  $memberships_info = wc_memberships_get_user_active_memberships($user_id, $args);

  if($memberships_info){
    foreach ($memberships_info as $membership => $val) {
      if($val->plan->name == 'VIP Membership'){
        
        return true;
      }else{
        return false;
      }
      
  };
  }
  
}

function rrm_desafios_usuario($user_id){
  global $wpdb;
  $countParent = 0;
  $countTotalChild = 0;
  $result = $wpdb->get_results( "SELECT DISTINCT id_reto FROM wphr_galerias_migration WHERE id_user = $user_id" );
  foreach ($result as $desafio) {
    $countTotalChild += rrm_galerias_usuario($user_id,$desafio->id_reto);
  }
  $countParent = count($result);
  return json_encode([$countParent, $countTotalChild]);
}

function rrm_galerias_usuario($user_id,$id_reto){
  global $wpdb;
  $galerias_reto = 0;
  $result = $wpdb->get_results( "SELECT id_new FROM wphr_galerias_migration WHERE id_user = $user_id AND id_reto = $id_reto" );
  $galerias_reto = count($result);
  return $galerias_reto;
}

function rrm_user_level($user_id){
  global $wpdb;
  $desafios = 0;
  $galerias = 0;
  $pueblos = 0;
  $result = $wpdb->get_results( "SELECT DISTINCT id_reto FROM wphr_galerias_migration WHERE id_user = $user_id" );
  foreach ($result as $desafio) {
    $galerias += rrm_galerias_usuario($user_id,$desafio->id_reto);
  }
  $resPueblos = $wpdb->get_results( "SELECT id_reto FROM wphr_galerias_migration WHERE id_user = $user_id AND id_reto = 26513" );
  if($resPueblos){
    $pueblos = count($resPueblos);
  }

  $desa = get_user_meta($user_id, 'challengues_selected', true);
  if($desa){
    $desafios = count($desa);
  }
  //return rrm_tipo_rodador($galerias,$desafios);
  return rrm_tipo_rodador($desafios,$galerias,$pueblos);
}

function rrm_tipo_rodador($desafios,$galerias,$pueblos){
  $tier_1 = '';
  $tier_2 = '';
  $tier_3 = '';
  $img = array();
  $level = '';

  $response = [
    'level' => '',
    'badge' => 0,
  ];

  $argsG = array(
    'numberposts' => -1,
    'post_type'   => 'medalla',
    'meta_key' => 'tipo',
    'meta_value'    => 'galeria',
    );
  $medallaG = get_posts($argsG);
  if($medallaG){
    foreach ($medallaG as $mg) {
      $rango_i = get_post_meta( $mg->ID, 'rango_inferior', true );
      $rango_s = get_post_meta( $mg->ID, 'rango_superior', true );
      $nivel = get_post_meta( $mg->ID, 'nivel', true );
      if($galerias >= $rango_i  && $galerias <= $rango_s){
        $tier_1 = $mg->post_title;
        array_push($img,$nivel);
      }
    }
  }

  $argsD = array(
    'numberposts' => -1,
    'post_type'   => 'medalla',
    'meta_key' => 'tipo',
    'meta_value'    => 'destino',
    );
  $medallaD = get_posts($argsD);
  if($medallaD){
    foreach ($medallaD as $md) {
      $rango_id = get_post_meta( $md->ID, 'rango_inferior', true );
      $rango_sd = get_post_meta( $md->ID, 'rango_superior', true );
      $niveld = get_post_meta( $md->ID, 'nivel', true );
      if($desafios >= $rango_id  && $desafios <= $rango_sd){
        $tier_2 = $md->post_title;
        array_push($img,$niveld);
      }
    }
  }

  $argsP = array(
    'numberposts' => -1,
    'post_type'   => 'medalla',
    'meta_key' => 'tipo',
    'meta_value'    => 'pueblo',
    );
  $medallaP = get_posts($argsP);
  if($medallaP){
    foreach ($medallaP as $mp) {
      $rango_ip = get_post_meta( $mp->ID, 'rango_inferior', true );
      $rango_sp = get_post_meta( $mp->ID, 'rango_superior', true );
      $nivelp = get_post_meta( $mp->ID, 'nivel', true );
      if($pueblos >= $rango_ip  && $pueblos <= $rango_sp){
        $tier_3 = $mp->post_title;
        array_push($img,$nivelp);
      }
    }
  }




  if($tier_1 == '' && $tier_2 == '' && $tier_3 == ''){
    $level = 'RODADOR';
  }else if($tier_1 != '' && $tier_2 != '' && $tier_3 == ''){
    $level = $tier_1.' / '.$tier_2.' '.$tier_3;
  }else if($tier_1 != '' && $tier_2 == '' && $tier_3 != ''){
    $level = $tier_1.' '.$tier_2.' / '.$tier_3;
  }else if($tier_1 == '' && $tier_2 != '' && $tier_3 != ''){
    $level = $tier_1.' '.$tier_2.' / '.$tier_3;
  }else if($tier_1 != '' && $tier_2 != '' && $tier_3 != ''){
    $level = $tier_1.' / '.$tier_2.' / '.$tier_3;
  }else{
    $level = $tier_1.' '.$tier_2.' '.$tier_3;
  }

  $response = [
    'level' => $level,
    'badge' => $img,
  ];

  return $response;
}


//add_action( 'woocommerce_order_status_pending', 'mysite_pending');
//add_action( 'woocommerce_order_status_failed', 'mysite_failed');
add_action( 'woocommerce_order_status_on-hold', 'order_hold');
add_action( 'woocommerce_order_status_processing', 'order_processing');
add_action( 'woocommerce_order_status_completed', 'order_completed');
add_action( 'woocommerce_order_status_refunded', 'order_refunded');
add_action( 'woocommerce_order_status_cancelled', 'order_cancelled');


function order_cancelled($order_id) {
  $order = wc_get_order($order_id);
  $user_id = $order->get_user_id();
  $user = get_userdata( $user_id );
  save_new_alert($user_id, 'tienda', 'La orden #'.$order_id.' ha sido cancelada.');
  send_mail_notification($user->user_email, 'Orden Cancelada', 'La orden #'.$order_id.' ha sido cancelada.',$user->display_name);
  
}

function order_completed($order_id) {
  $order = wc_get_order($order_id);
  $user_id = $order->get_user_id();
  $user = get_userdata( $user_id );
  save_new_alert($user_id, 'tienda', 'La orden #'.$order_id.' ha sido completada.');
  send_mail_notification($user->user_email, 'Orden Completada', 'La orden #'.$order_id.' ha sido completada.',$user->display_name);
}

function order_processing($order_id) {
  $order = wc_get_order($order_id);
  $user_id = $order->get_user_id();
  $user = get_userdata( $user_id );
  save_new_alert($user_id, 'tienda', 'La orden #'.$order_id.' esta siendo procesada');
  send_mail_notification($user->user_email, 'Orden En Proceso', 'La orden #'.$order_id.' esta siendo procesada',$user->display_name);
}

function order_hold($order_id) {
  $order = wc_get_order($order_id);
  $user_id = $order->get_user_id();
  $user = get_userdata( $user_id );
  save_new_alert($user_id, 'tienda', 'La orden #'.$order_id.' esta en espera de ser procesada');
  send_mail_notification($user->user_email, 'Orden En Espera', 'La orden #'.$order_id.' esta en espera de ser procesada',$user->display_name);
}

function order_refunded($order_id) {
  $order = wc_get_order($order_id);
  $user_id = $order->get_user_id();
  $user = get_userdata( $user_id );
  save_new_alert($user_id, 'tienda', 'La orden #'.$order_id.' ha sido reembolsada');
  send_mail_notification($user->user_email, 'Orden Reembolsada', 'La orden #'.$order_id.' ha sido reembolsada',$user->display_name);
}


add_action('woocommerce_order_status_changed', 'so_status_completed', 10, 3);

function so_status_completed($order_id, $old_status, $new_status)
{
  $order = wc_get_order($order_id);
  $user_id = $order->get_user_id();
  //save_new_alert($user_id, 'tienda', 'STATUS: '.$new_status);
}

/*------------------------------------*\
 Guardar post alerta
\*------------------------------------*/

function save_new_alert($id_user, $type, $message){
    try {
      $args = array(
        'post_type' => 'alerta',
        'post_title' => $message,
        'post_status' => 'publish',
      );
      $post_id = wp_insert_post($args);
      update_post_meta($post_id,'usuario',$id_user);
      update_post_meta($post_id,'tipo_notificacion',$type);
      update_user_meta( $id_user, 'notification', 'true' );
      $response = true;
    } catch (\Throwable $th) {
      $response = false;
    }
    return $response;
    exit;
}


/*------------------------------------*\
 Obtener alertas del usuario
\*------------------------------------*/

function get_alertas_usuario($id_user, $posts){
  $argsAlertas = array(
    'numberposts' => $posts,
    'post_type'   => 'alerta',
    'order'     => 'DESC',
    //'meta_key' => 'usuario',
    //'meta_value'    => $id_user,
    'meta_query' => array(
      'relation' => 'OR',
      array(
          'key' => 'usuario',
          'value' => $id_user,
          'compare' => '='
      ),
      array(
          'key' => 'usuario',
          'value' => '',
          'compare' => '='
      ),
  )
    );
  $alertas = get_posts($argsAlertas);
  return $alertas;
}


/*------------------------------------*\
 Marcar alertas como leídas
\*------------------------------------*/
function tiempo_transcurrido($fecha_hora){
  date_default_timezone_set("America/Mexico_City");
  $today = date("Y-m-d H:i:s");
  $t1 = strtotime($fecha_hora);
  $t2 = strtotime($today);
  $diff = $t2 - $t1;
  $hours = $diff / ( 60 * 60 );
  if($hours >= 24):
    $days = $hours / 24;
    $daysText = floor($days) == 1 ? 'día' : 'días';
    $transcurrido = 'Hace '.floor($days).' '.$daysText;
  else:
    $hoursText = round($hours) == 1 ? 'hora' : 'horas';
    $transcurrido = 'Hace '.round($hours).' '.$hoursText;
  endif;
  return $transcurrido;
}


/*------------------------------------*\
 Marcar notificaciones como leídas
\*------------------------------------*/

add_action('wp_ajax_check_false_notifications', 'check_false_notifications');
add_action('wp_ajax_nopriv_check_false_notifications', 'check_false_notifications');

function check_false_notifications($fecha_hora){
  $current_user = wp_get_current_user();
  update_user_meta( $current_user->ID, 'notification', 'false' );
}



/*------------------------------------*\
 crear notificación de un post pendiente
\*------------------------------------*/
function pending_posts( $new_status, $old_status, $post ) {
  global $wpdb;
  $user_id = get_post_meta( $post->ID, 'rodador', true );
  $reto = get_post_meta( $post->ID, 'reto', true );
	if ( ( 'pending' === $new_status && 'pending' !== $old_status )
		&& 'galerias' === $post->post_type
	) {
    $reto = get_post_meta($post->ID,'reto',true);
    $destino  = "";
    $taxonomy = 'destinos';
    $post_terms = wp_get_post_terms($post->ID, $taxonomy);
    foreach ($post_terms as $term) {
      if ($term->parent !== 0) {
          $destino .= $term->name;
      }
    }
    save_new_alert($user_id, 'galeria', 'La evidencia del desafio '.get_the_title($reto).', '.$destino.'  no ha sido aprobada.');
    $results = $wpdb->get_results( "SELECT id FROM wphr_galerias_migration WHERE id_new = $post->ID" );
    foreach ($results as $galeria) { 
       $wpdb->query($wpdb->prepare("DELETE FROM wphr_galerias_migration WHERE id = '$galeria->id' "));
    }
    $user = get_userdata( $user_id );
    send_mail_notification($user->user_email, 'Evidencia No Aprobada', 'La evidencia del desafio '.get_the_title($reto).', '.$destino.'  no ha sido aprobada.'.'<br/>'.'El motivo es el siguiente: '.(get_field('aprobacion', $post->ID) ? get_field('aprobacion', $post->ID) : 'La imagen esta siendo revisada por el administrador.'),$user->display_name);
	}else if ( ( 'publish' === $new_status && 'pending' === $old_status )
  && 'galerias' === $post->post_type
  ) {
    $tableGalerias = $wpdb->prefix.'galerias_migration';
    $data=array(
      'id_reto' => $reto, 
      'id_user' => $user_id,
      'id_old' => 99999999, 
      'id_new' => $post->ID);
    $wpdb->insert( $tableGalerias, $data);
  }
  else if ( ( 'publish_to_trash' === $new_status || 'trash' === $new_status) && 'galerias' === $post->post_type ) {
    $results = $wpdb->get_results( "SELECT id FROM wphr_galerias_migration WHERE id_new = $post->ID" );
    foreach ($results as $galeria) { 
       $wpdb->query($wpdb->prepare("DELETE FROM wphr_galerias_migration WHERE id = '$galeria->id' "));
    }
  }
}
add_action( 'transition_post_status', 'pending_posts', 10, 3 );

/*------------------------------------*\
 crear notificacion general
\*------------------------------------*/
function general_notifications_posts( $post_id, $post, $update ) {
  if ( 'alerta' === $post->post_type) {
    if ( $update ){
      $tipo = get_post_meta($post_id, 'tipo_notificacion', true );
      $user_id = get_post_meta($post_id,'usuario', true );
      $user = get_userdata( $user_id );
      $texto = get_post_meta($post_id,'texto_adicional', true );
      if($tipo === 'general'){
        send_mail_notification($user->user_email,get_the_title($post_id),htmlspecialchars($texto),$user->display_name);
      }
    }
  }
}
add_action( 'save_post', 'general_notifications_posts', 10,3 );



function get_notification_email_html( $mailer, $email_heading = true, $text,  $usename ) {
  $template = 'notification-email.php';

  return wc_get_template_html( $template, array(      
      'email_heading' => $email_heading,
      'sent_to_admin' => false,
      'plain_text'    => true,
      'text'    => $text,
      'usename' =>  $usename,
      'email'         => $mailer
  ),  'email-templates/');
}


function send_mail_notification( $recipient, $subject, $text , $usename) {
	$mailer = WC()->mailer();
  $content = get_notification_email_html( $mailer, $subject, $text, $usename);
  $headers = "Content-Type: text/html\r\n";
  $mailer->send( $recipient, $subject, $content, $headers );
}


add_action('wc_memberships_user_membership_status_changed', 'prevenir_estado_delayed_tras_pago', 20, 3);
function prevenir_estado_delayed_tras_pago($membership, $old_status, $new_status) {
    // Verificar si el nuevo estado es "delayed"
    if ($new_status === 'delayed') {
        // Obtener el pedido asociado a la membresía
        $order_id = $membership->get_order_id();
        if ($order_id) {
            $order = wc_get_order($order_id);
            // Comprobar si el pedido está pagado (completed o processing)
            if ($order && in_array($order->get_status(), array('completed', 'processing'))) {
                // Forzar el estado a "active"
                $membership->update_status('active');
                $membership->add_note('Intento de cambio a "delayed" bloqueado. Forzado a "active" porque el pedido está pagado.');
            }else{
                $membership->add_note('La membresia cambio a "delayed" porque el estado del pedido es:'.$order->get_status());
            }
        }
    }
}

//https://www.godaddy.com/resources/skills/woocommerce-memberships-renew-with-a-different-plan

add_filter( 'wc_memberships_get_renew_membership_url', 'change_product_for_membership_vip_renewal', 10, 2 );

function change_product_for_membership_vip_renewal( $url, $membership ) {

  // ID del producto que el cliente quiere usar para la renovación
  $id_product = 185585;
  $id_vip_membership = 27;

  if ( $membership->get_plan_id() === $id_vip_membership) {
    //return get_permalink( $id_product );
    return $url = wc_get_checkout_url() . '?add-to-cart='.$id_product;
  }

  // Retorna la URL del producto de renovación
  return $url;
}

//https://rodandorutasmagicas.com/mi-cuenta/subscriptions/