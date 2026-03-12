<?php

add_image_size( 'post-bike-thumbnail', 250, 234, true );
add_image_size( 'last-activity-gallery', 265, 210, true );

add_filter( 'woocommerce_get_image_size_single', function( $size ) {
	return array(
	'width' => 445,
	'height' => 445,
	'crop' => 0,
	);
} );

//======================================================================
// Show Share Links for single (Start)
//======================================================================

if ( ! function_exists( 'rrm_share' ) ) {
	function rrm_share(){
            $post = get_post();
			// Se arman los links de los shares
			$link = get_the_permalink($post->ID);
			$title = get_the_title( $post->ID );
			$facebookLink = "https://www.facebook.com/sharer/sharer.php?u=".$link."&title=".$title;
			$twitterLink = "http://twitter.com/intent/tweet?text=".$title."&url=".$link;
			//   $mail = "mailto:?subject=".$title."&body=".$link;
			$whatsapp = "https://web.whatsapp.com/send?text=".$title." - ".$link;
			
			$useragent=$_SERVER['HTTP_USER_AGENT'];
			
			if(preg_match('/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i',$useragent)||preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i',substr($useragent,0,4))) {
				$whatsapp = "whatsapp://send?text=".$title." - ".$link;
			}
			
			//$fbMessenger = 'fb-messenger://share/?link='.$link.'&app_id=224629124797648';
			//   $sms = "sms:?&body=".$link;

		?>
<div class="single-content__share">
    <h2><?php esc_html_e( 'Compartir', 'storefront' ); ?></h2>
    <ul>
        <li>
            <a href="<?php echo esc_url( $link ); ?>" id="copy-link">
                <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/single/share-fill-icon.svg' ); ?>" alt="">
            </a>
        </li>
        <li>
            <a href="<?php echo esc_url( urldecode( $facebookLink ) ); ?>"
                onclick="window.open(this.href, 'Facebook', 'left=20,top=20,width=500,height=500,toolbar=1,resizable=0'); return false;"
                target="_blank">
                <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/single/fb-icon-fill.svg' ); ?>" alt="">
            </a>
        </li>
        <li>
            <a href="<?php echo esc_url( urldecode( $twitterLink ) ); ?>"
                onclick="window.open(this.href, 'Twitter', 'left=20,top=20,width=500,height=500,toolbar=1,resizable=0'); return false;"
                target="_blank">
                <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/blog/twitter.svg' ); ?>" alt="">
            </a>
        </li>
        <li>
            <a href="<?php echo esc_url( urldecode( $whatsapp ) ); ?>" data-action="share/whatsapp/share" target="_blank">
                <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/single/whatsapp-fill-icon.svg' ); ?>"
                    alt="">
            </a>
        </li>
    </ul>
</div>
<?php
	}
}

//======================================================================
// Show Share Links for single (End)
//======================================================================


//======================================================================
// Custom Text Area (Profile) (Start)
//======================================================================

if ( ! function_exists( 'rrm_comment_custom_textarea' ) ) {

	function rrm_comment_custom_textarea() {

		$req   = get_option( 'require_name_email' );
		$html5 = 'html5' === $args['format'];

		// Define attributes in HTML5 or XHTML syntax.
		$required_attribute = ( $html5 ? ' required' : ' required="required"' );
		
		$comment_field =  sprintf(
			'<p class="comment-form-comment">%s</p>',
			sprintf(
				'<textarea id="comment" name="comment" placeholder="%s %s" cols="45" rows="8" maxlength="65525"%s></textarea>',
				_x( 'Comment', 'noun' ),
				( $req ? '*' : '' ),
				( $req ? $required_attribute : '' )
			)
		);
		return $comment_field;
	}
}

add_filter( 'comment_form_field_comment', 'rrm_comment_custom_textarea' );

//======================================================================
// Custom Text Area (End)
//======================================================================

function validate_gravatar($email) {
	$hash = md5(strtolower(trim($email)));
	$uri = 'http://www.gravatar.com/avatar/' . $hash . '?d=404';
	$headers = @get_headers($uri);
	print_r($headers);
	$has_valid_avatar = 0;
	if (!preg_match("|200|", $headers[0])) {
		$has_valid_avatar = 0;
	} else {
		$has_valid_avatar = 1;
	}
	return $has_valid_avatar;
}

//add_theme_support( 'bike-htumbnail');

//======================================================================
// Show My Map (Profile) (Start)
//======================================================================

/*
    * Se muestra la información del tab "Mi Mapa"
*/

function my_map_shortcode(){
	
	ob_start();
    $current_user = wp_get_current_user();
    $userID = getUserId();
    $homeURL = home_url( '' );
	?>
<?php 
// Solo para contenido, no paginas, no post
$membershipOption = in_array('mapa',getSectionsPlanMember($userID)); 
?>  
<?php if ($membershipOption): ?>
<div class="map">
    <div class="map__top">
        <div class="map__division">
            <div>
                <?php /* <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/profile/flag.png' ); ?>" alt="">
                */ ?>
                <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/profile/map-flag-rrm.svg' ); ?>" alt="">
            </div>
            <div>
                <?php 
                        $codeCountry = get_user_meta($userID , 'user_country', true);

                        //var_dump($codeCountry);
                        $countries = getCountries();
                        // var_dump($countries);
                        // return;
                        $index = array_search($codeCountry, array_column($countries,'code3'));
                       
                        if($index === 142):
                            $codeState = esc_attr(get_user_meta($userID , 'user_state', true));
                            $states = getMexStates();
                            $index2 = array_search($codeState, array_column($states,'clave'));
                        endif;
               
                    ?>
                <div>Origen</div>
                <?php
                    if ( false === $index ) {
                        echo esc_html__( 'No especificado', 'storefront' );
                    } else {
                        echo esc_html( $countries[ $index ]['name'] );
                        if ( 142 === $index ) :
                            echo '<span>' . esc_html( $states[ $index2 ]['nombre'] ) . '</span>';
                        endif;
                    }
                    ?>
                <!-- <div>Michoacán</div> -->
            </div>
        </div>
        <div class="map__magic-town">
            <div>
                <i class="icon-church"></i>
            </div>
            <?php $textMagicTownRoaded = 1 === getMagicTownRoaded() ? 'Pueblo Mágico rodado' : 'Pueblos Mágicos rodados'; ?>
            <div>
                <?php echo absint( getMagicTownRoaded() ); ?>
            </div>
            <div>
                <?php echo esc_html( $textMagicTownRoaded ); ?>
            </div>
        </div>
        <div class="map__challengue">
            <?php
                    $numCompletedChallengues = 0;     
                    $completedChallengues = [];       
                    if(!empty(completedChallengueByAdmin($userID))):
                        //$completedChallengues = array_intersect(completedChallengueByAdmin($current_user->ID), progressChallengue($current_user->ID)[1]); 
                        //$completedChallengues = array_intersect(completedChallengueByAdmin($userID), progressChallengue($userID)[1]);
                        $completedChallengues = completedChallengueByAdmin($userID);
                        $numCompletedChallengues = count($completedChallengues);
                    endif;
                ?>
            <div>
                <i class="icon-goal"></i>
            </div>
            <div>
                <?php echo absint( $numCompletedChallengues ); ?>
            </div>
            <div>
                <?php
                $textChallengueMilestone = 1 === $numCompletedChallengues ? 'desafío' : 'desafios';
                echo esc_html( $textChallengueMilestone . ' completados' );
                ?>
                <!-- Desafíos Cada completados En los últimos seis años -->
            </div>
        </div>
        <div class="map__photo">
            <div>
                <i class="icon-gallery"></i>
            </div>
            <div>
                <?php echo json_decode(rrm_desafios_usuario(esc_attr($userID)))[1]; ?>
                <?php /* <?php echo json_decode(rrm_desafios_usuario(esc_attr($current_user->ID)))[1]; ?> */ ?>
            </div>
            <div>
                <?php $textChallengue = json_decode(rrm_desafios_usuario(esc_attr($userID)))[1] == 1 ? "desafio "  : "desafíos "; ?>
                <?php $textChallengue2 = json_decode(rrm_desafios_usuario(esc_attr($userID)))[0] == 1 ? "diferente "  : "diferentes "; ?>
                <?php $textChallengue3 = json_decode(rrm_desafios_usuario(esc_attr($userID)))[1] == 1 ? "Foto subida "  : "Fotos subidas "; ?>
                <?php /* <?php $textChallengue = json_decode(rrm_desafios_usuario(esc_attr($current_user->ID)))[1] > 1 ? "desafios "  : "desafío "; ?>
                */ ?>
                <?php /* <?php echo 'Fotos subidas, en '.json_decode(rrm_desafios_usuario(esc_attr($current_user->ID)))[0].' '.$textChallengue.' diferentes' ?>
                */ ?>
                <?php echo $textChallengue3.', en '.json_decode(rrm_desafios_usuario(esc_attr($userID)))[0].' '.$textChallengue.' '.$textChallengue2; ?>
            </div>
        </div>
        <?php 
                $current_user = wp_get_current_user();
                if($current_user->ID == $userID): 
            ?>
        <div class="map__share">
            <i class="icon-share"></i>
            <div class="map__share-social">
                <div class="fb-share-button-custom"
                    data-href="<?php echo esc_url( $homeURL . '/mi-perfil/?uid=' . absint( $userID ) . '#mimapa3' ); ?>">
                    <i class="icon-fb-icon-fill"></i>
                    <span>Facebook</span>
                </div>
                <?php
                        $shareTitle =  get_field('titulo_compartir_mapa', 546);
                        $shareDescription =  get_field('descripcion_compartir_mapa', 546);
                    ?>
                <div class="twitter-share-button-custom"
                    data-href="<?php echo esc_url( 'https://twitter.com/intent/tweet?url=' . rawurlencode( get_permalink() . 'mi-perfil/?uid=' . absint( $userID ) . '#mimapa3' ) ); ?>"
                    data-text="<?php echo esc_attr( $shareTitle ); ?>" data-description="<?php echo esc_attr( $shareDescription ); ?>">
                    <i class="icon-twitter-fill"></i>
                    <span>Twitter</span>
                </div>
                <?php /*<a class="twitter-share-button"
                        href="https://twitter.com/intent/tweet?url=<?php echo urlencode(get_permalink().'mi-perfil/?uid='.$userID.'#mimapa3'); ?>"
                data-text="<?php echo $shareTitle ?>"
                data-description="<?php echo $shareDescription ?>"
                >
                Tweet
                </a>*/ ?>
                <a href="<?php echo esc_url( 'https://web.whatsapp.com/send?text=' . rawurlencode( $homeURL . '/mi-perfil/?uid=' . absint( $userID ) . '#mimapa3' ) ); ?>"
                    target="_blank">
                    <i class="icon-whatsapp"></i>
                    <span>whatsApp</span>
                </a>
            </div>

        </div>
        <?php endif; ?>
    </div>
    <div class="map__image">
        <?php /* <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/profile/mapmex.jpg' ); ?>" alt=""> */ ?>
        <div id="map"></div>
    </div>
    <?php getDestinyPlaceOfGalleryUser(); ?>
</div>
<?php else: ?>
        <?php
            if($current_user->ID==$userID):
                $message_key = 'content_restricted_message_no_products';
                $message = WC_Memberships_User_Messages::get_message( $message_key);
                if ( $message ) : ?>
                    <div class="woocommerce">
                        <div class="woocommerce-info wc-memberships-restriction-message wc-memberships-message wc-memberships-content-restricted-message">
                            <?php echo wp_kses_post( $message ); ?>    
                        </div>
                    </div>
                <?php
                endif;
            else:
                ?>
                <div class="woocommerce">
                        <div class="woocommerce-info wc-memberships-restriction-message wc-memberships-message wc-memberships-content-restricted-message">
                            <?php
                             esc_html_e( 'No member', 'storefront' );
                            ?>    
                        </div>
                    </div>
                <?php
                
            endif;
            
            
       
        ?>
    <?php endif; ?>
<?php

	$content = ob_get_clean();

	return $content;
}

add_shortcode('map', 'my_map_shortcode');

//======================================================================
// Show My Map (Profile) (End)
//======================================================================


//======================================================================
// Share social (Single post & profile)(Start)
//======================================================================

/*
    * Se agregan los meta tags necesarios para generar los posts para compartir en redes sociales
*/

function metaTwitter(){
    $idUser = getUserId();
    $shareTitle =  get_field('titulo_compartir_mapa', 546);
    $shareDescription =  get_field('descripcion_compartir_mapa', 546);
    $shareImage =  get_field('imagen_compartir_mapa', 546);
    if(is_page(10)):
        echo '<meta name="twitter:card" content="summary_large_image" /> ';
        echo '<meta name="twitter:domain" content="https://rodandorutasmagicas.com/" />';
        echo '<meta name="twitter:url" content="https://rodandorutasmagicas.com//mi-perfil/?uid='.$idUser.'" />';
       echo '<meta name="twitter:title" content="'.$shareTitle.'" />' ;
        echo '<meta name="twitter:description" content="'.$shareDescription.'" />' ;
        echo '<meta name="twitter:image" content="'.$shareImage.'" />' ;
    endif;
}

add_action('wp_head', 'metaTwitter');

function metaFacebook(){
    $idUser = getUserId();
    $shareTitle =  get_field('titulo_compartir_mapa', 546);
    $shareDescription =  get_field('descripcion_compartir_mapa', 546);
    $shareImage =  get_field('imagen_compartir_mapa', 546);
    if(is_page(10)):
        
    echo '<meta property="fb:app_id" content="446586411097466" />';
    echo '<meta property="og:url"                content="https://rodandorutasmagicas.com//mi-perfil/?uid='.$idUser.'" />';
    echo '<meta property="og:type"               content="article" />';
    echo '<meta property="og:title"              content="'.$shareTitle.'" />';
    echo '<meta property="og:description"        content="'.$shareDescription.'" />';
    echo '<meta property="og:image"              content="'.$shareImage.'" />';

    endif;
}
add_action('wp_head', 'metaFacebook');

function metaFacebookSingle(){
    $post_id = get_queried_object_id();
    $post_title = get_the_title($post_id);
    $post_url = get_permalink($post_id);
    $post_thumbnail_url = get_the_post_thumbnail_url($post_id);
    $post_excerpt = get_the_excerpt($post_id);
    if(is_single()):
        
    echo '<meta property="fb:app_id" content="446586411097466" />';
    echo '<meta property="og:url"                content="'.$post_url.'" />';
    echo '<meta property="og:type"               content="article" />';
    echo '<meta property="og:title"              content="'.strip_tags($post_title).'" />';
    if(!empty($post_excerpt )):
    echo '<meta property="og:description"        content="'.strip_tags($post_excerpt) .'" />';
    endif;
    echo '<meta property="og:image"              content="'.$post_thumbnail_url.'" />';

    endif;
}
add_action('wp_head', 'metaFacebookSingle');


function metaTwitterSingle(){
    $post_id = get_queried_object_id();
    $post_title = get_the_title($post_id);
    $post_url = get_permalink($post_id);
    $post_thumbnail_url = get_the_post_thumbnail_url($post_id);
    $post_excerpt = get_the_excerpt($post_id);
    if(is_single()):
        echo '<meta name="twitter:card" content="summary_large_image" /> ';
        echo '<meta name="twitter:domain" content="'.get_site_url().'" />';
        echo '<meta name="twitter:url" content="'.$post_url.'" />';
        echo '<meta name="twitter:title" content="'.strip_tags($post_title).'" />' ;
        if(!empty($post_excerpt )):
        echo '<meta name="twitter:description" content="'.strip_tags($post_excerpt).'" />' ;
        endif;
        echo '<meta name="twitter:image" content="'.$post_thumbnail_url.'" />' ;
    endif;
}

add_action('wp_head', 'metaTwitterSingle');

//======================================================================
// Share social (Single post & profile)(End)
//======================================================================

function getUserId() {
    $user   = wp_get_current_user();
    $uid    = isset( $_GET['uid'] ) ? absint( $_GET['uid'] ) : 0; // phpcs:ignore WordPress.Security.NonceVerification
    if ( $uid > 0 ) {
        return $uid;
    }
    return $user->ID;
}


//======================================================================
// Show About Me (Profile) (Start)
//======================================================================

/*
    * Se muestra la información del tab "Sobre mí"
*/

function about_me_shortcode(){
	ob_start();

    //$idUser = $uid != $current_user->ID ? $current_user->ID : $uid;
    $userID = getUserId();
    $userdata = array();
    // if ( $user->exists() ) {
    $userdata = get_user_meta( $userID  );
    //var_dump($userdata);
    ?>
<!-- About me -->
<div class="about-me">
    <p>
        <?php echo wp_kses_post( $userdata['description'][0] ); ?>
    </p>
    <ul>
        <?php if ( get_field( 'facebook', 'user_' . absint( $userID ) ) ) : ?>
        <li>
            <a href="<?php echo esc_url( 'https://www.facebook.com/' . get_field( 'facebook', 'user_' . absint( $userID ) ) ); ?>" target="_blank">
                <i class="icon-fb-icon-fill"></i>
                <span>/<?php echo esc_html( get_field( 'facebook', 'user_' . absint( $userID ) ) ); ?></span>
            </a>
        </li>
        <?php endif; ?>
        <li>
            <?php $userdata_obj = get_userdata( $userID ); ?>
            <?php if ( $userdata_obj && $userdata_obj->user_url ) : ?>
                <p><?php esc_html_e( 'Página web:', 'storefront' ); ?> <a href="<?php echo esc_url( $userdata_obj->user_url ); ?>" target="_blank"><?php echo esc_html( $userdata_obj->user_url ); ?></a></p>
            <?php endif; ?>
        </li>
        <!-- <li>
                    <a href="#">
                        <i class="icon-twitter-fill"></i>
                        <span>/Tigsoadxxx</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="icon-yutube-fill"></i>
                        <span>/Tigsoadxxx</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="icon-instagra-fill"></i>
                        <span>/Tigsoadxxx</span>
                    </a>
                </li> -->
    </ul>
</div>
<?php 
        // }
	?>

<div class="latest-activity">
    <div class="latest-activity__header">
        <h2>
            Ultima actividad
        </h2>
    </div>
    <?php echo last_posts_gallery($userID); ?>
    <?php /*
    <div class="activity">
        <div class="activity-action">
            <div class="activity-action__avatar">
                <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/profile/profile.png' ); ?>" alt="">
</div>
<div class="activity-action__description">
    <div>
        <div class="activity-action__name">
            Tig Trager
        </div>
        <div class="activity-action__action">
            Publico 5 fotos en el reto “nombre del reto en que se participa”
        </div>
    </div>
    <div class="activity-action__date">
        Marzo 24, 2023
    </div>
</div>
</div>
<div class="activity-content photos">
    <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/profile/mechanic-workshop.png' ); ?>" alt="">
</div>
</div>
<div class="activity">
    <div class="activity-action">
        <div class="activity-action__avatar">
            <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/profile/profile.png' ); ?>" alt="">
        </div>
        <div class="activity-action__description">
            <div>
                <div class="activity-action__name">
                    Tig Trager
                </div>
                <div class="activity-action__action">
                    Ha ganado su tercer medalla
                </div>
            </div>
            <div class="activity-action__date">
                Marzo 24, 2023
            </div>
        </div>
    </div>
    <div class="activity-content medal">
        <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/profile/medalla.png' ); ?>" alt="">
        <p>
            Alexander “Tig” Trager es un miembro de SAMCRO, ha completado 9 de los desafíos de Rodando Rutas Magicas
        </p>
    </div>
</div>
<div class="activity">
    <div class="activity-action">
        <div class="activity-action__avatar">
            <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/profile/profile.png' ); ?>" alt="">
        </div>
        <div class="activity-action__description">
            <div>
                <div class="activity-action__name">
                    Tig Trager
                </div>
                <div class="activity-action__action">
                    Ha ganado su tercer medalla
                </div>
            </div>
            <div class="activity-action__date">
                Marzo 24, 2023
            </div>
        </div>
    </div>
    <div class="activity-content challengue">

        <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/profile/challengue.png' ); ?>" alt="">
        <div>
            <h2>
                DESAFÍO MÉXICO ÚNICO
            </h2>
            <p>
                Alexander “Tig” Trager es un miembro de SAMCRO, ha completado 9 de los desafíos de Rodando Rutas
                Magicas
            </p>
        </div>

    </div>
</div>
*/
?>
</div>

<!-- About me -->

<?php
	$content = ob_get_clean();

	return $content;
}

add_shortcode('about-me', 'about_me_shortcode');

//======================================================================
// Show About Me (Profile) (End)
//======================================================================

function icon_notification($notification_type){
    $icon = "";
    switch($notification_type):
        case "desafio":
            $icon = "icon-medal";
            break;
        case "galeria":
            $icon = "icon-fact_check";
            break;
        case "general":
            $icon =  "icon-check_circle";
            break;
        case "tienda":
            $icon = "icon-deliver";
            break;
        default:
            $icon = "icon-check_circle";
    endswitch;
    return $icon;
}

function my_notifications_shortcode(){
	ob_start();
    $alertas = get_alertas_usuario(getUserId(),5);
    //var_dump($alertas);
	?>
<div class="my-notifications">

    <?php if ($alertas) : foreach ($alertas as $alerta) : 
            $tipo = get_post_meta( $alerta->ID, 'tipo_notificacion', true );
            $usuario = get_post_meta( $alerta->ID, 'usuario', true );
            $tiempo = tiempo_transcurrido($alerta->post_date);
            $adicional = get_post_meta( $alerta->ID, 'texto_adicional', true );
            $icon = icon_notification($tipo);
    ?>

    <div class="notification">
        <div class="notification__icon">
            <i class="<?php echo esc_attr( $icon ); ?>"></i>
        </div>
        <div class="notification__description">
            <p>
                <?php echo esc_html( $alerta->post_title ); ?>
            </p>
            <?php if ( '' !== $adicional ) : ?>
            <p class="notification__custom">
                <?php echo wp_kses_post( $adicional ); ?>
            </p>
            <?php endif; ?>
            <span>
                <?php echo esc_html( $tiempo ); ?>
            </span>
        </div>
    </div>

    <?php 
        endforeach;
        else:
            echo "<div class='notification__empty'>No hay notificaciones por el momento</div>";
        wp_reset_postdata();
        endif; 
    ?>
    <?php /*
    <div class="notification">
        <div class="notification__icon">
            <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/profile/fat-check.png' ); ?>" alt="">
</div>
<div class="notification__description">
    <p>
        Tus fotos del desafío <a href="#">““nombre del desafío máximo”</a> Están en proceso de revisión
    </p>
    <span>
        Hace 4 horas
    </span>
</div>
</div>
<div class="notification">
    <div class="notification__icon">
        <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/profile/badge.png' ); ?>" alt="">
    </div>
    <div class="notification__description">
        <p>
            Tu membresía esa por vencer recuerda renovarla. <a href="#">“Da click aquí para renovar”</a>
        </p>
        <span>
            Hace 4 horas
        </span>
    </div>
</div>
<div class="notification">
    <div class="notification__icon">
        <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/profile/medal.png' ); ?>" alt="">
    </div>
    <div class="notification__description">
        <p>
            ¡Felicidades tus fotos del desafío “nombre del desafío máximo” han sido aprovadas!
        </p>
        <span>
            Hace 4 horas
        </span>
    </div>
</div>*/?>
</div>

<?php
	$content = ob_get_clean();

	return $content;
}

add_shortcode('my-notifications', 'my_notifications_shortcode');


//======================================================================
// Lateral Section (Profile) (Start)
//======================================================================

/*
    * Se muestra la barra lateral en desktop y se muestra en los tabs como "Mis Logros" en mobile
    * Se muestran los pueblos mágicos rodados
    * Se muestran los desafios conquistados
    * Se muestra el número de galerías subias y su relacion con la cantidad de desafios
    * Se muestran los desafios terminados
    * Se muestran los desafios en progreso
*/

function getMedal($level){

    $urlBadge = "";    
           
    $args = array(
        'post_type' => 'medalla', // Reemplaza 'nombre_del_tipo_de_publicacion' por el nombre real de tu tipo de publicación personalizada
        'posts_per_page' => 1, // -1 para mostrar todas las entradas, o ajusta a la cantidad que desees mostrar
        'meta_key' => 'nivel',
        'meta_value' => $level
    );

    $query = new WP_Query($args);

    if ($query->have_posts()) :
        while ($query->have_posts()) : $query->the_post();
            $urlBadge = get_the_post_thumbnail_url();
        endwhile;
        wp_reset_postdata(); // Restaurar los datos del post global de WordPress
    endif; 
    return $urlBadge;
}

// function areArrayElementsZero($array) {
//     foreach ($array as $value) {
//         // Verificar si el valor no es cero
//         if ($value != 0) return false; // Si encontramos un valor que no es cero, retornamos falso
//     }
//     return true; // Si todos los valores son cero, retornamos verdadero
// }

function my_achievements_shortcode($atts){
    //$user_id = get_current_user_id();
    $current_user = wp_get_current_user();
    $userID = getUserId();
	ob_start();
    $defaults = array(
        'screen' => 'mobile',
    );
    $atts = shortcode_atts( $defaults, $atts );
	?>
<?php 
        $numCompletedChallengues = 0;     
        $completedChallengues = [];       
        //var_dump(completedChallengueByAdmin($userID));
        if(!empty(completedChallengueByAdmin($userID))):
            //$completedChallengues = array_intersect(completedChallengueByAdmin($userID ), progressChallengue($userID )[1]); 
            $completedChallengues = completedChallengueByAdmin($userID );
            $numCompletedChallengues = count($completedChallengues);
        endif;
        ?>
<div class="profile-content__achievements <?php echo esc_attr( $atts['screen'] ); ?>">
    <div class="profile-content__achievements-content">
        <h3>
            <div class="icon-achievements"></div>
            Mis logros
        </h3>
        <div class="profile-content__medal">
            <?php 
                        
                        $name =  esc_attr(get_field('first_name', 'user_'. $userID));
                        $lastName = esc_attr(get_field('last_name', 'user_'. $userID)); 
                        $belongsToClub =  esc_attr(get_field('pertenece_a_un_club', 'user_'. $userID )); 
                        $clubName = esc_attr(get_field('nombre_club', 'user_'. $userID ));

                        $achievements = array(
                            1 => "3 Desafíos conquistados", // Rodador Bronce
                            2 => "6 Desafíos conquistados", // Rodador Plata
                            3 => "9 Desafíos conquistados", // Rodador Oro
                            4 => "12 Desafíos conquistados", // Rodador Platinum
                            5 => "15 Desafíos conquistados", // Rodador Diamante
                            6 => "18 Desafíos conquistados", // Rodador Zafiro
                            7 => "+400 Destinos/Fotos subidas", // Rodador Distinguido
                            8 => "+500 Destinos/Fotos subidas", // Rodador Ultra
                            9 => "+600 Destinos/Fotos subidas", // Rodador Ilustre 
                            10 => "+700 Destinos/Fotos subidas", // Rodador Legendario
                            11 => "+800 Destinos/Fotos subidas", // Rodador Mítico
                            12 => "+1000 Destinos/Fotos subidas", // Rodador Cosmo
                            13 => "26 Pueblos Mágicos", // Rodador 26
                            14 => "50 Pueblos Mágicos", // Rodador 50
                            15 => "88 Pueblos Mágicos", // Rodador 88
                            16 => "121 Pueblos Mágicos", // Rodador 121
                            17 => "132 Pueblos Mágicos",  // Rodador 132
                            18 => "160 Pueblos Mágicos", // Rodador 160
                            19 => "177 Pueblos Mágicos", // Rodador 177
                        );

                        //$level = !empty(rrm_user_level($userID)['badge']) ? max(rrm_user_level($userID)['badge']) : 0;
                    ?>
            <?php
                //echo '<span style="color:white">'.$userID.'</span>';
                $membershipOption = in_array('logros',getSectionsPlanMember($userID)); 
            ?>  
            <?php if ($membershipOption): ?>
            <?php
                  
            if(!empty(rrm_user_level($userID)['badge'])): ?>
            <?php 
                            // var_dump(rrm_user_level($userID)['level']);
                            //var_dump(rrm_user_level($userID)['badge']);
                            
                            // if(areArrayElementsZero(rrm_user_level($userID)['badge'])):
                            //     echo '<div class="empty-achievements"> No tiene logros todavia</div>';
                            // else:
            foreach(rrm_user_level($userID)['badge'] as $index => $level):
                // echo '<br>';
                // echo $level;
                // echo '</br>';  
            ?>
            <?php //var_dump($level); ?>
            <?php 
                $args_medal = array(
                'post_type' => 'medalla', // Nombre de tu custom post type
                'meta_query' => array(
                    array(
                        'key' => 'nivel', // Nombre de tu meta key
                        'value' => $level, // Valor que quieres filtrar
                        'compare' => '=' // Comparador (puede ser '=', '!=', '>', '<', 'LIKE', etc.)
                    )
                )
            );

            $query_medal = new WP_Query($args_medal);
            $type_medal = "";
            $range_down_level = 0;
            $text = "";
            $text2 = "";
            if ($query_medal->have_posts()) {
                while ($query_medal->have_posts()) {
                    $query_medal->the_post();
                    $post_id = get_the_ID();
                    $type_medal = get_field('tipo', $post_id);
                    $range_down_level = get_field('rango_inferior', $post_id);
                }
            }
            wp_reset_postdata();
            ?>
                <div class="medal__content">
                    <div class="medal__image">
                        <img src="<?php echo esc_url( getMedal( $level ) ); ?>" alt="">
                    </div>
                    <div class="medal__description">
                        <?php echo esc_html( $name . ' ' . $lastName ); ?>
                        <?php if ( $belongsToClub && ! empty( $clubName ) ) : ?>
                            <?php echo ', ' . esc_html( get_field( 'pertenece_club', 546 ) . ' ' . strtoupper( $clubName ) ); ?>
                        <?php endif; ?>
                        <?php 

                            if($type_medal === "destino"):
                                $text = get_field('texto_mis_logros_destino', 546);
                            endif;
    
                            if($type_medal === "galeria"):
                                $text = get_field('texto_mis_logros_galeria', 546);
                            endif;
    
                            if($type_medal === "pueblo"):
                                $text = get_field('texto_mis_logros_pueblo', 546);
                            endif;
                        ?>
                        ,
                        <?php echo esc_html( $text . ' ' ); ?>
                        
                        <?php 
                            //echo $range_down_level." "; 

                            if($type_medal === "destino"):
                                $text2 = $range_down_level." ".get_field('texto_mis_logros_destino_fin', 546);
                            endif;

                            if($type_medal === "galeria"):
                                $text2 = "+".$range_down_level." ".get_field('texto_mis_logros_galeria_fin', 546);
                            endif;

                            if($type_medal === "pueblo"):
                                $text2 = $range_down_level." ".get_field('texto_mis_logros_pueblo_fin', 546);
                            endif;

                            echo $text2;
                        ?>
                        <?php //echo $achievements[$level]; ?>
                    </div>
                </div>
                <?php 
                endforeach;
                else:
                    echo '<div class="empty-achievements"> No tiene logros todavia</div>';
                endif; ?>
                 <?php else: ?>
                    <?php
                        if($current_user->ID==$userID):
                            $message_key = 'content_restricted_message_no_products';
                            $message = WC_Memberships_User_Messages::get_message( $message_key);
                            if ( $message ) : ?>
                                <div class="woocommerce">
                                    <div class="woocommerce-info wc-memberships-restriction-message wc-memberships-message wc-memberships-content-restricted-message">
                                        <?php echo wp_kses_post( $message ); ?>    
                                    </div>
                                </div>
                            <?php
                            endif;
                        else:
                            ?>
                            <div class="woocommerce">
                                    <div class="woocommerce-info wc-memberships-restriction-message wc-memberships-message wc-memberships-content-restricted-message">
                                        <?php
                                            esc_html_e( 'No member', 'storefront' );
                                        ?>    
                                    </div>
                                </div>
                            <?php
                        
                        endif;
                    ?>
                
            <?php endif; ?>
                
        </div>
        <div class="profile-content__milestones">
            <div class="milestone">
                <div class="milestone__icon">
                    <i class="icon-church"></i>
                </div>
                <div class="milestone__description">
                    <?php 
                                $textMagicTownRoaded = getMagicTownRoaded() == 1 ? "Pueblo Mágico rodado" : "Pueblos Mágicos rodados";
                                echo getMagicTownRoaded().' '.$textMagicTownRoaded 
                            ?>
                </div>
            </div>
            <div class="milestone">
                <div class="milestone__icon">
                    <i class="icon-goal"></i>
                </div>
                <div class="milestone__description">
                    <?php
                            $textChallengueMilestone = $numCompletedChallengues == 1 ? 'desafío' : 'desafios';
                            echo $numCompletedChallengues.' '.$textChallengueMilestone.' conquistados';
                        ?>
                </div>
            </div>
            <div class="milestone">
                <div class="milestone__icon">
                    <i class="icon-gallery"></i>
                </div>
                <div class="milestone__description">
                    <?php $textEvidence = json_decode(rrm_desafios_usuario(esc_attr($userID)))[1] == 1 ? "evidencia "  : "evidencias "; ?>
                    <?php $textChallengue = json_decode(rrm_desafios_usuario(esc_attr($userID)))[0] == 1 ? "desafio "  : "desafíos "; ?>
                    <?php echo json_decode(rrm_desafios_usuario(esc_attr($userID)))[1].' '.$textEvidence. "en " .json_decode(rrm_desafios_usuario(esc_attr($userID)))[0].' '.$textChallengue ?>
                </div>
            </div>
        </div>
        <div class="profile-content__challengues-finished">
            <h3>Desafios terminados</h3>
            <?php $membershipOptionFinishChallengue = in_array('terminados',getSectionsPlanMember($userID)); ?>
            <?php if ($membershipOptionFinishChallengue) : ?>
                <?php if(!empty($completedChallengues)): ?>
                    <div class="profile-content__challengues-finished-content">
                        <?php foreach($completedChallengues as $key => $challengue):
                                    //echo $challengue;
                                        $image = get_field('logo', $challengue);
                                        $imageEl = '';
                                        if( $image ) :
                                            $imageEl = wp_get_attachment_image( $image, 'full' );
                                        ?>
                        <div class="challengue-m">
                            <?php
                                                echo $imageEl;
                                            ?>
                        </div>
                        <?php
                                        endif;
                                    ?>
                        <?php endforeach; ?>
                        <?php 
                                        /*
                                            <div class="challenge-m">
                                                <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/profile/arenaymar.png' ); ?>"
                        alt="">
                    </div>
                    */
                    ?>
                </div>
                <?php else: ?>
                <div class="profile-content__challengues-not-finished">
                    <?php 
                                        $current_user = wp_get_current_user();
                                        if($current_user->ID == $userID):
                                    ?>
                    No has completado ningun desafío
                    <?php else: ?>
                    No ha completado ningun desafío
                    <?php endif; ?>
                </div>
                <?php endif; ?>
            <?php else: ?>
                <?php
                    // var_dump($current_user);
                    // var_dump(getUserId());
                    if($current_user->ID==$userID):
                        $message_key = 'content_restricted_message_no_products';
                        $message = WC_Memberships_User_Messages::get_message( $message_key);
                        if ( $message ) : ?>
                            <div class="woocommerce">
                                <div class="woocommerce-info wc-memberships-restriction-message wc-memberships-message wc-memberships-content-restricted-message">
                                    <?php echo wp_kses_post( $message ); ?>    
                                </div>
                            </div>
                        <?php
                        endif;
                    else:
                        ?>
                        <div class="woocommerce">
                                <div class="woocommerce-info wc-memberships-restriction-message wc-memberships-message wc-memberships-content-restricted-message">
                                    <?php
                                        esc_html_e( 'No member', 'storefront' );
                                    ?>    
                                </div>
                            </div>
                        <?php
                    
                endif;
            ?>
            <?php endif; ?>
        </div>
        <div class="profile-content__challengues-in-progress">
            <h3>Desafios en progreso</h3>
            <?php
                $membershipOptionProgressChallengue = in_array('desafios',getSectionsPlanMember($userID)); 
            ?>  
            <?php if ($membershipOptionProgressChallengue): ?>
                <div class="profile-content__challengues-in-progress-content">
                    <?php 
                    /*
                        * Se muestran los desafios en progreso del usuario 
                        * Si el usuario tiene el 100% y el administrador no ha aprobado el desafio se mostrará aqui
                    */
                    if(!empty(progressChallengue($userID)[0])):
                        echo progressChallengue($userID)[0]; 
                    else:
                    if($current_user->ID == $userID):
                    ?>
                        En estos momentos no tienes ningun progreso
                        <?php else: ?>
                        En estos momentos no tiene ningun progreso
                        <?php endif; ?>
                    <?php
                    endif;
                ?>
            </div>
            <?php else: ?>
                <?php
                     if($current_user->ID==$userID):
                        $message_key = 'content_restricted_message_no_products';
                        $message = WC_Memberships_User_Messages::get_message( $message_key);
                        if ( $message ) : ?>
                            <div class="woocommerce">
                                <div class="woocommerce-info wc-memberships-restriction-message wc-memberships-message wc-memberships-content-restricted-message">
                                    <?php echo wp_kses_post( $message ); ?>    
                                </div>
                            </div>
                        <?php
                        endif;
                    else:
                        ?>
                        <div class="woocommerce">
                                <div class="woocommerce-info wc-memberships-restriction-message wc-memberships-message wc-memberships-content-restricted-message">
                                    <?php
                                        esc_html_e( 'No member', 'storefront' );
                                    ?>    
                                </div>
                            </div>
                        <?php
                    
                    endif;
                ?>
            <?php endif; ?>
        </div>
    </div>
    <div class="lateral-profile-widget">               
        <?php
            if ( is_active_sidebar( 'bottom-profile-sidebar' ) ){
                dynamic_sidebar( 'bottom-profile-sidebar' );
            }
        ?>
    </div>
</div>

<?php
	$content = ob_get_clean();

	return $content;
}

add_shortcode('my_achievements', 'my_achievements_shortcode');

//======================================================================
// Lateral Section (Profile) (End)
//======================================================================

//======================================================================
// Show My Garage (Profile) (Start)
//======================================================================

/*
    * Se muestra la información del tab "Mi garage"
*/

function getTagGarage($tags){
    $tagName = '';
    $tagId = 0;
    if (is_iterable($tags)) :
        foreach ($tags as $index => $tag) : if ($index == 0) $tagName = $tag->name; $tagId = $tag->term_id; endforeach;
        return [$tagId,$tagName];
    else:
        return null;
    endif;
}

function my_garage_shortcode(){
	$cont = "";
	ob_start();
    $current_user = wp_get_current_user();
    $userID = getUserId();
    //if (is_user_logged_in()) {

        $current_user = wp_get_current_user();

        $args = array(
            'post_type' => 'garage', // Reemplaza 'nombre_del_custom_post' con el nombre de tu Custom Post Type
            //'author'    => $current_user->ID, // Filtrar por el ID del usuario actual
            'author' => $userID,
            'posts_per_page' => -1, // Obtener todas las entradas del usuario
        );

        $query = new WP_Query($args);

        if ($query->have_posts()) {
         
            // Comenzar el loop para mostrar las entradas
            while ($query->have_posts()) {
                $query->the_post();
                $tagsBrand = get_the_terms(get_the_ID(), 'marca');
                $tagsModel = get_the_terms(get_the_ID(), 'modelo');
                $tagsColor = get_the_terms(get_the_ID(), 'color');
                $tagsStatus = get_the_terms(get_the_ID(), 'estaus');
                $tagsStyle = get_the_terms(get_the_ID(), 'estilo');

                $tagsModelDescription = !empty(getTagGarage($tagsModel)[1]) ? getTagGarage($tagsModel)[1] : '';
                $tagsModelId = !empty(getTagGarage($tagsModel)[0]) ? getTagGarage($tagsModel)[0] : '';

                $year = get_field('modelo_moto', get_the_ID());

                $tagsBrandDescription = !empty(getTagGarage($tagsBrand)[1]) ? getTagGarage($tagsBrand)[1] : '';
                $tagsBrandId = !empty(getTagGarage($tagsBrand)[0]) ? getTagGarage($tagsBrand)[0] : '';

                $tagsColorDescription = !empty(getTagGarage($tagsColor)[1]) ? getTagGarage($tagsColor)[1] : '';
                $tagsColorId = !empty(getTagGarage($tagsColor)[0]) ? getTagGarage($tagsColor)[0] : '';

                $tagsStatusDescription = !empty(getTagGarage($tagsStatus)[1]) ? getTagGarage($tagsStatus)[1] : '';
                $tagsStatusId = !empty(getTagGarage($tagsStatus)[0]) ? getTagGarage($tagsStatus)[0] : '';

                $tagsStyleDescription = !empty(getTagGarage($tagsStyle)[1]) ? getTagGarage($tagsStyle)[1] : '';
                $tagsStyleId = !empty(getTagGarage($tagsStyle)[0]) ? getTagGarage($tagsStyle)[0] : '';

                get_template_part( 
                    'partials/bike-item',
                    'bike-item',
                    array(
                        'user' => array(
                            'current_user' => $current_user,
                            'user_id' => $userID
                        ),
                        'id-post' => get_the_ID(),
                        'bike-img' => get_the_post_thumbnail_url(get_the_ID(),'full'),
                        'features' => 
                        array(
                            array(
                                'feature-name' => 'Nombre o apodo',
                                'feature-description' => get_the_title() 
                            ),
                            array(
                                'feature-name' => 'Año',
                                'feature-description' => $tagsModelDescription == "" ? $year: $tagsModelDescription,
                                'feature-id' =>  $tagsModelId
                            ),
                            array(
                            'feature-name' => 'Marca',
                            'feature-description' =>  $tagsBrandDescription,  
                            'feature-id' =>  $tagsBrandId
                            ),
                            array(
                            'feature-name' => 'Color',
                            'feature-description' => $tagsColorDescription,
                            'feature-id' => $tagsColorId
                            ),
                            array(
                            'feature-name' => 'Estatus',
                            'feature-description' => $tagsStatusDescription,
                            'feature-id' => $tagsStatusId
                            ),
                            array(
                            'feature-name' => 'Estilo',
                            'feature-description' => $tagsStyleDescription, 
                            'feature-id' => $tagsStyleId
                            ),
                        )
                    )
                );
            }
            // Restaurar datos originales del post
            wp_reset_postdata();
        }else{
            if($current_user->ID == $userID):
            ?>
<div class="empty-garage">Por el momento tu garage esta vacío.</div>
<?php
            else:
        ?>
<div class="empty-garage">Por el momento su garage esta vacío.</div>
<?php
            endif;
        }

    //}

	$content = ob_get_clean();
    $membershipOptionGarage = in_array('garage',getSectionsPlanMember($userID)); 
    if ($membershipOptionGarage) : 
        $cont .= '<div class="tab-garage"><div class="tab-garage__content">';
        $cont .= $content;
        $cont .= '</div>';
        if($userID == $current_user->ID){
            $cont .= '<a href="#upload-bike" class="tab-garage__button" href="#upload-bike" data-backdrop="static" data-keyboard="false" data-toggle="modal"><i class="icon-bike"></i>Subir una moto nueva</a>';
        }
        $cont .= '</div>';
    else:
        
        $message_key = 'page_content_restricted_message_no_products';
        $message = WC_Memberships_User_Messages::get_message( $message_key);
        if ( $message ) : 
            $cont .= '<div class="woocommerce">';
            $cont .=  '<div class="woocommerce-info wc-memberships-restriction-message wc-memberships-message wc-memberships-content-restricted-message">';
            $cont .=  $message;     
            $cont .=  '</div>';
            $cont .= '</div>';
        
        endif;
        
        //echo '<div class="woocommerce"><div class="woocommerce-info wc-memberships-restriction-message wc-memberships-message wc-memberships-content-restricted-message">' . wc_memberships()->frontend->get_content_restricted_message( $post->ID ) . '</div></div>';
    ?>
<?php endif; 
    return $cont;
	
}

add_shortcode('my_garage', 'my_garage_shortcode');

//======================================================================
// Show My Garage (Profile) (End)
//======================================================================

//======================================================================
// Delete garage(Motorcycle)  (Start)
//======================================================================

/* 
 *  Borrar Motocicleta de garage
*/

add_action('wp_ajax_delete_garage_item', 'delete_garage_item');
add_action('wp_ajax_nopriv_delete_garage_item', 'delete_garage_item');

function delete_garage_item() {
    check_ajax_referer( 'rrm_delete_garage_item', 'nonce' );
    // Obtener el ID de la entrada enviado por la solicitud AJAX
    $entry_id = isset( $_POST['entry_id'] ) ? absint( $_POST['entry_id'] ) : 0;
    // Verificar si el ID de la entrada es válido
    if ($entry_id > 0) {
        // Eliminar la entrada del CPT
        $eliminado = wp_delete_post($entry_id, true);
        
        if ($eliminado) {
            //echo true;
            wp_send_json_success( "Se ha eliminado correctamente." );
        } else {
            wp_send_json_error( 'Error al eliminar la entrada.' );
            //echo 'Error al eliminar la entrada.';
        }
    } else {
        wp_send_json_error( 'ID de entrada no válido.' );
        //echo 'ID de entrada no válido.';
    }
    
    // Finalizar la ejecución de la solicitud AJAX
    wp_die();

}

//======================================================================
// Delete garage(Motorcycle)  (End)
//======================================================================

//======================================================================
// Account Details (Save info) (Start)
//======================================================================

/* 
 *  Guardar información de cuenta del usuario
*/

add_action('wp_ajax_update_profile', 'update_profile');
add_action('wp_ajax_nopriv_update_profile', 'update_profile');

function update_profile(){
    check_ajax_referer( 'rrm_update_profile', 'nonce' );
    $user_id = get_current_user_id();
    // phpcs:ignore WordPress.Security.ValidatedSanitizedInput.InputNotSanitized -- parse_str output is sanitized field-by-field below.
    parse_str( wp_unslash( $_POST['form_data'] ), $arr_data_profile ); // phpcs:ignore WordPress.Security.NonceVerification

    //Cambiar de format la fecha
    $arrayDate = array_reverse(explode('-',$arr_data_profile['update_date_birth'],3));
    $arrayDateFormat = trim($arrayDate[1] . '/' . $arrayDate[0] . '/' . $arrayDate[2]);

    $updated_first_name = 
    $updated_last_name  = 
    $updated_facebook = 
    $updated_genre =
    $updated_style =
    $updated_brand =
    $updated_belongs_to_club =
    $updated_name_club =
    $updated_origin_club = 
    $updated_number_member_clubs =
    $updated_origin_country =
    $updated_bio_info =
    $updated_web =
    "";

    if( !empty($arr_data_profile['update_first_name']) ){
        if ( $arr_data_profile['update_first_name'] != get_user_meta( $user_id,  'first_name', true ) ){
            $updated_first_name = update_user_meta( $user_id, 'first_name', sanitize_text_field($arr_data_profile['update_first_name']), get_user_meta( $user_id, 'first_name', true ) );
        }
    }
    else{
        $error = new WP_Error( '-1', 'El campo nombre es requerido' );
        wp_send_json_error( $error );
    }

    if( !empty($arr_data_profile['update_last_name']) ){
        if ( $arr_data_profile['update_last_name'] != get_user_meta( $user_id,  'last_name', true ) ){
            $updated_last_name = update_user_meta( $user_id, 'last_name', sanitize_text_field($arr_data_profile['update_last_name']), get_user_meta( $user_id, 'last_name', true ) );
        }
    }
    else{
        $error = new WP_Error( '-1', 'El campo apellidos es requerido' );
        wp_send_json_error( $error );
    }

    if( !empty($arrayDateFormat) ){
        if( $arrayDateFormat != get_field('fecha_de_nacimiento', 'user_'. $user_id )){
            $updated_date_birth = update_field( 'fecha_de_nacimiento', $arrayDateFormat , 'user_'.$user_id );
        }
    }
    else{
        $error = new WP_Error( '-1', 'El campo fecha de nacimiento es requerido' );
        wp_send_json_error( $error );
    }
    
   
    if( $arr_data_profile['update_facebook'] != get_field('facebook', 'user_'. $user_id )){
        $updated_facebook = update_field( 'facebook', sanitize_text_field($arr_data_profile['update_facebook']) , 'user_'.$user_id );
    }
    if( $arr_data_profile['update_genre'] != get_field('genero', 'user_'. $user_id )){
        $updated_genre = update_field( 'genero', $arr_data_profile['update_genre'] , 'user_'.$user_id );
    }
    if( $arr_data_profile['update_style'] != get_field('estilo', 'user_'. $user_id )){
        $updated_style = update_field( 'estilo', $arr_data_profile['update_style'] , 'user_'.$user_id );
    }
    if( $arr_data_profile['update_brand'] != get_field('marca', 'user_'. $user_id )){
        $updated_brand = update_field( 'marca', $arr_data_profile['update_brand'] , 'user_'.$user_id );
    }
    if( $arr_data_profile['update_belong_to_club'] != get_field('pertenece_a_un_club', 'user_'. $user_id )){
        $updated_belongs_to_club = update_field( 'pertenece_a_un_club', $arr_data_profile['update_belong_to_club'] , 'user_'.$user_id );
    }
    if( $arr_data_profile['update_name_club'] != get_field('nombre_club', 'user_'. $user_id )){
        $updated_name_club = update_field( 'nombre_club', sanitize_text_field($arr_data_profile['update_name_club']) , 'user_'.$user_id );
    }
    if( $arr_data_profile['update_origin_club'] != get_field('origen_del_club', 'user_'. $user_id )){
        $updated_origin_club = update_field( 'origen_del_club', $arr_data_profile['update_origin_club'] , 'user_'.$user_id );
    }
    if( $arr_data_profile['update_number_member_clubs'] != get_field('integrantes_del_club', 'user_'. $user_id )){
        $updated_number_member_clubs = update_field( 'integrantes_del_club', $arr_data_profile['update_number_member_clubs'] , 'user_'.$user_id );
    }
    if( $arr_data_profile['update_origin_country'] != get_field('user_country', 'user_'. $user_id )){
        $updated_origin_country = update_field( 'user_country', $arr_data_profile['update_origin_country'] , 'user_'.$user_id );
    }
    if( $arr_data_profile['update_origin_state'] != get_field('user_state', 'user_'. $user_id )){
        $updated_origin_state = update_field( 'user_state', $arr_data_profile['update_origin_state'] , 'user_'.$user_id );
    }
    if( $arr_data_profile['update_bio_info'] != get_user_meta($user_id, 'description', true)){
        $updated_bio_info = update_user_meta( $user_id, 'description', sanitize_textarea_field($arr_data_profile['update_bio_info']), get_user_meta($user_id, 'description', true) );        
    }
    if( $arr_data_profile['update_web'] != get_userdata($user_id)->user_url){
        //echo $arr_data_profile['update_web'];
        $updated_web = wp_update_user( array( 'ID' => $user_id, 'user_url' => esc_url($arr_data_profile['update_web'])));
        // wp_send_json_error( $updated_web );
        // die();        
    }
    
    // Si algun campo se actualizo se manda mensaje de exito
    if(
        $updated_first_name || 
        $updated_last_name ||  
        $updated_date_birth ||  
        $updated_facebook ||  
        $updated_genre ||  
        $updated_style ||  
        $updated_brand || 
        $updated_belongs_to_club || 
        $updated_name_club || 
        $updated_origin_club || 
        $updated_number_member_clubs ||
        $updated_origin_country ||
        $updated_origin_state ||
        $updated_bio_info ||
        $updated_web
    ){
        wp_send_json_success( "Se han actualizado correctamente los campos");
    }
    //Si no existen campos que actualizar 
    else{
        $error = new WP_Error( '-2', 'No hay cambios en los datos o no se han actualizado uno o más campos, intentar de nuevo' );
      	wp_send_json_error( $error );
    }
    wp_die();
}

//======================================================================
// Account Details (Save info) (End)
//======================================================================

//======================================================================
// Upload Image (Start)
//======================================================================

/* 
 *  Funcíon para subir imagen (General)
*/

function upload_image($image, $post_id) {
    
    // if (!function_exists('wp_handle_upload')) {
    //     require_once(ABSPATH . 'wp-admin/includes/file.php');
    //   }
    // require_once(ABSPATH . 'wp-admin/includes/media.php');
    // require_once(ABSPATH . 'wp-admin/includes/image.php');

    // $uploadedfile = $image;
    // $upload_overrides = array('test_form' => false);
    
    // $movefile = wp_handle_upload($uploadedfile, $upload_overrides);
     
    // $filename = $movefile['url'];
    // $filetype = wp_check_filetype( basename( $filename ), null );
    
    // $wp_upload_dir = wp_upload_dir();
    // $attachment = array(
    //     'guid'           => $wp_upload_dir['url'] . '/' . basename( $filename ), 
    //     'post_mime_type' => $filetype['type'],
    //     'post_title'     => preg_replace( '/\.[^.]+$/', '', basename( $filename ) ),
    //     'post_content'   => '',
    //     'post_status'    => 'inherit'
    // );
    // $attachment_id = wp_insert_attachment( $attachment, $filename, $post_id);
    
    // $attachment_data = wp_generate_attachment_metadata( $attach_id, $filename );
    
    // return [$attachment_id,$attachment_data];
     

    require_once( ABSPATH . "/wp-load.php");
	require_once( ABSPATH . "/wp-admin/includes/image.php");
	require_once( ABSPATH . "/wp-admin/includes/file.php");
	require_once( ABSPATH . "/wp-admin/includes/media.php");
	
	// Download url to a temp file
	//$tmp = download_url( $url );
	//if ( is_wp_error( $tmp ) ) return false;
	$tmp =  $image['tmp_name'];
    if ( is_wp_error( $tmp ) ) return false;

	// Get the filename and extension ("photo.png" => "photo", "png")
	//$filename = pathinfo($url, PATHINFO_FILENAME);
	//$extension = pathinfo($url, PATHINFO_EXTENSION);

    $filename = pathinfo($image['name'], PATHINFO_FILENAME);
    $extension = pathinfo($image['name'], PATHINFO_EXTENSION);

    //error_log("Extension:");
    //error_log($extension);

    //exit();
	// An extension is required or else WordPress will reject the upload
	if ( ! $extension ) {
		// Look up mime type, example: "/photo.png" -> "image/png"
		$mime = mime_content_type( $tmp );
		$mime = is_string($mime) ? sanitize_mime_type( $mime ) : false;
		
		// Only allow certain mime types because mime types do not always end in a valid extension (see the .doc example below)
		$mime_extensions = array(
			// mime_type         => extension (no period)
			'text/plain'         => 'txt',
			'text/csv'           => 'csv',
			'application/msword' => 'doc',
			'image/jpg'          => 'jpg',
			'image/jpeg'         => 'jpeg',
			'image/gif'          => 'gif',
			'image/png'          => 'png',
			'video/mp4'          => 'mp4',
		);
		
		if ( isset( $mime_extensions[$mime] ) ) {
			// Use the mapped extension
			$extension = $mime_extensions[$mime];
		}else{
			// Could not identify extension. Clear temp file and abort.
			wp_delete_file($tmp);
			return false;
		}
	}
	
	// Upload by "sideloading": "the same way as an uploaded file is handled by media_handle_upload"
	$args = array(
		'name' => "$filename.$extension",
		'tmp_name' => $tmp,
	);
	
	// Post data to override the post title, content, and alt text
	// $post_data = array();
	// if ( $title )   $post_data['post_title'] = $title;
	// if ( $content ) $post_data['post_content'] = $content;
	
	// Do the upload
	$attachment_id = media_handle_sideload( $args, $post_id );
    // error_log("attachment_id:");
    // error_log(json_encode($attachment_id));

	// Error uploading
	if ( is_wp_error($attachment_id) ) return false;

    $attachment_data = wp_get_attachment_metadata($attachment_id);

	// Clear temp file
	wp_delete_file($tmp);
	
	// Error uploading
	if ( is_wp_error($attachment_id) ) return false;
	
	// Save alt text as post meta if provided
	// if ( $alt ) {
	// 	update_post_meta( $attachment_id, '_wp_attachment_image_alt', $alt );
	// }
	
	// Success, return attachment ID
	return [(int) $attachment_id,$attachment_data];
       
}

//======================================================================
// Upload Image (End)
//======================================================================

//======================================================================
// Edit garage(Motorcycle) (Start)
//======================================================================

/* 
 *  Editar Motocicleta en garage
*/

add_action('wp_ajax_edit_garage_item', 'edit_garage_item');
add_action('wp_ajax_nopriv_edit_garage_item', 'edit_garage_item');

function edit_garage_item() {
    check_ajax_referer( 'rrm_edit_garage_item', 'nonce' );
    $entryId = isset( $_POST['entry_id'] ) ? absint( $_POST['entry_id'] ) : 0;
    $name    = isset( $_POST['name'] ) ? sanitize_text_field( wp_unslash( $_POST['name'] ) ) : '';
    $color   = isset( $_POST['color'] ) ? absint( $_POST['color'] ) : 0;
    $model   = isset( $_POST['model'] ) ? absint( $_POST['model'] ) : 0;
    $brand   = isset( $_POST['brand'] ) ? absint( $_POST['brand'] ) : 0;
    $status  = isset( $_POST['status'] ) ? absint( $_POST['status'] ) : 0;
    $style   = isset( $_POST['style'] ) ? absint( $_POST['style'] ) : 0;
    
    $user = wp_get_current_user();

    if (
        $entryId > 0 && 
        !empty($name) && 
        $color > 0 &&
        $model > 0 &&
        $brand > 0) 
    {

        $args = array(
            'ID'        => $entryId,
            'author'     => $user,
            'post_title'   => $name,
        );
        
        $updatedData = wp_update_post($args);

        $termBrand  = get_term_by( 'id', $brand, 'marca');
        $termBrandId = wp_set_object_terms($entryId, $termBrand->name, 'marca');
        
        $termColor  = get_term_by( 'id', $color, 'color');
        $termColorId = wp_set_object_terms($entryId, $termColor->name, 'color');
  
        // $termModel  = get_term_by( 'id', $model, 'modelo');
        // $termModelId = wp_set_object_terms($entryId, $termBrand->name, 'modelo');
        // if ( is_wp_error( $termBrandId ) ) echo 'Error al modificar la entrada.';

        $updateFieldId = update_field( 'modelo_moto', $model , $entryId);
        //if($updateFieldId == 0) echo $updateFieldId;

        $termStaus  = get_term_by( 'id', $status, 'estaus');
        $termStatusId = wp_set_object_terms($entryId, $termStaus->name, 'estaus');
        
  
        $termStyle  = get_term_by( 'id', $style, 'estilo');
        $termStyleId = wp_set_object_terms($entryId, $termStyle->name, 'estilo');
        

        // $image = $_FILES['image'];
        // $attach = upload_image($image, $entryId);
        // wp_update_attachment_metadata( $attach[0], $attach[1] );
        // set_post_thumbnail( $entryId, $attach[0] );

        if(!empty($_FILES['image'])){
            $image = $_FILES['image'];
            $attach = upload_image($image, $entryId);
            if(!$attach) wp_send_json_error('El post no se ha actualizado. Error al subir la imagen, la imagen no debe pesar mas de 2MB y no medir mas de 2560 píxeles, por favor vuelva a intentarlo.');
            wp_update_attachment_metadata( $attach[0], $attach[1] );
            set_post_thumbnail( $entryId, $attach[0] );
        }
        //if($post_id && $challengue && $u_id && !is_wp_error( $termChallengueStateId) && !is_wp_error( $termChallengueActivityId) && $postThumbnail){
       
        if ($updatedData && !is_wp_error( $termBrandId ) && !is_wp_error( $termColorId ) && !is_wp_error( $termStatusId ) && !is_wp_error( $termStyleId && $updateFieldId == true ) ) {
            wp_send_json_success("La entrada se ha modificado correctamente");
            //echo true;
        } else {
            wp_send_json_error('Error al modificar la entrada.');
        }
    } else {
        wp_send_json_error('Datos de entrada no válidos.');
    }
    
    wp_die();
}
//======================================================================
// Edit garage(Motorcycle) (End)
//======================================================================

//======================================================================
// Edit challengue (Start)
//======================================================================

/* 
 * Editar post de galería (Solo permite modificar la imagen) 
*/

add_action('wp_ajax_edit_challengue', 'edit_challengue');
add_action('wp_ajax_nopriv_edit_challengue', 'edit_challengue');

function edit_challengue() {
    check_ajax_referer( 'rrm_edit_challengue', 'nonce' );
    $post_id = isset( $_POST['entry_id'] ) ? absint( $_POST['entry_id'] ) : 0;

    if (
        $post_id > 0
    )
    {

        //if(filesize($_FILES['image'])) {
            // your file is not empty
            // $image = $_FILES['image'];
            // $attach = upload_image($image, $entryId);
            // wp_update_attachment_metadata( $attach[0], $attach[1] );
            // $postThumbnail = set_post_thumbnail( $entryId, $attach[0] );

            $image = $_FILES['image'];
            $attach = upload_image($image, $post_id);
            if($attach == false){
                //wp_delete_post($post_id, true);
                wp_send_json_error('El post no se ha actualizado. Error al subir la imagen, la imagen no debe pesar mas de 2MB y no medir mas de 2560 píxeles, por favor vuelva a intentarlo');
            }
            wp_update_attachment_metadata( $attach[0], $attach[1] );
            $postThumbnail = set_post_thumbnail( $post_id, $attach[0] );

             // Change from draft to published
             $my_post = array(
                'ID'           => $post_id,
                'post_type' => 'galerias',
                'post_status'   => 'publish',
              );
              // Update the post into the database
              $post = wp_update_post( $my_post );
        //}

        if(!is_wp_error($post) && $postThumbnail){
            wp_send_json_success( "Se ha guardado correctamente." );
        }
        else{
            //$error = new WP_Error( '-1', 'Ha ocurrido un error, favor de intentarlo nuevamente' );
      	    wp_send_json_error( 'Ha ocurrido un error, favor de intentarlo nuevamente');
        }

    } else {
        wp_send_json_error('Datos de entrada no válidos.');
    }
    
    wp_die();
}

//======================================================================
// Edit challengue (End)
//======================================================================

//======================================================================
// Save challengue (Start)
//======================================================================

/* 
 * Guardar post de galería con su desafío correspondiente 
*/

add_action('wp_ajax_save_challengue', 'save_challengue');
add_action('wp_ajax_nopriv_save_challengue', 'save_challengue');

function save_challengue(){
    check_ajax_referer( 'rrm_save_challengue', 'nonce' );
    global $wpdb;
    $tableGalerias = $wpdb->prefix.'galerias_migration';
    $challengueTitle       = isset( $_POST['challengueTitle'] ) ? sanitize_text_field( wp_unslash( $_POST['challengueTitle'] ) ) : '';
    $challengueDescription = isset( $_POST['challengueDescription'] ) ? sanitize_textarea_field( wp_unslash( $_POST['challengueDescription'] ) ) : '';
    $challengueChallengue  = isset( $_POST['challengueChallengue'] ) ? absint( $_POST['challengueChallengue'] ) : 0;
    $challengueState       = isset( $_POST['challengueState'] ) ? absint( $_POST['challengueState'] ) : 0;
    $challengueActivity    = isset( $_POST['challengueActivity'] ) ? absint( $_POST['challengueActivity'] ) : 0;
    
    $user = wp_get_current_user();
    $user_id = get_current_user_id();

    if (
        !empty($challengueTitle) &&
        !empty($challengueDescription) && 
        $challengueChallengue  > 0 &&
        $challengueState > 0 &&
        $challengueActivity > 0) 
    {

        // Se comprueba que no haya un post con los mismos $challengueChallengue, $challengueState y $challengueActivity
        $args = array(
            'post_type' => 'galerias',
            'posts_per_page' => -1, // Obtener todos los posts
            'author'         => $user_id,
            'meta_query' => array(
                array(
                    'key' => 'reto', // Reemplaza 'nombre_del_campo_acf' con el nombre de tu campo ACF
                    'value' => $challengueChallengue, // Reemplaza 'valor_deseado' con el valor que estás buscando
                    'compare' => '='
                ),
            ),
            'tax_query' => array(
                'relation' => 'AND',
                array(
                    'taxonomy' => 'destinos', // Reemplaza 'tu_taxonomy' con el nombre de tu taxonomía
                    'field' => 'term_id', // Puedes cambiar el campo de comparación según tus necesidades
                    'terms' => $challengueState, // Reemplaza [1, 2, 3] con los IDs de los términos que estás buscando
                    'operator' => 'IN' // La condición para los términos de la taxonomía
                ),
                array(
                    'taxonomy' => 'destinos', // Reemplaza 'tu_taxonomy' con el nombre de tu taxonomía
                    'field' => 'term_id', // Puedes cambiar el campo de comparación según tus necesidades
                    'terms' => $challengueActivity, // Reemplaza [1, 2, 3] con los IDs de los términos que estás buscando
                    'operator' => 'IN' // La condición para los términos de la taxonomía
                )
            )
        );
        
        // Realiza la consulta
        $query = new WP_Query($args);

        if ($query->have_posts()){
            //$error = new WP_Error( '-2',  );
      	    wp_send_json_error( 'Ya se tiene una publicación con las mismas caracterísitcas, no puede haber publicaciones repetidas.' );
            wp_die();
        }
    
        $args = array(
            'post_type' => 'galerias',
            'post_title' => $challengueTitle,
            'post_content' => $challengueDescription,
            'author' => $user,
            'post_status' => 'publish',
        );
        $post_id = wp_insert_post($args);

        $challengue = update_field('reto', $challengueChallengue, $post_id);
        $u_id = update_field('rodador', $user_id, $post_id);

        $termChallengueState  = get_term_by( 'id', $challengueState, 'destinos');
        $termChallengueStateId = wp_set_object_terms($post_id, $termChallengueState->term_id, 'destinos', true);
        $termChallengueActivity  = get_term_by( 'id', $challengueActivity, 'destinos');
        $termChallengueActivityId = wp_set_object_terms($post_id, $termChallengueActivity->term_id, 'destinos', true);
       
        $image = $_FILES['image'];
        $attach = upload_image($image, $post_id);
        if($attach == false){
            wp_delete_post($post_id, true);
            wp_send_json_error('El post no se ha guardado. Error al subir la imagen, la imagen no debe pesar mas de 2MB y no medir mas de 2560 píxeles, por favor vuelva a intentarlo.');
        }
        wp_update_attachment_metadata( $attach[0], $attach[1] );
        $postThumbnail = set_post_thumbnail( $post_id, $attach[0] );
        

        $data=array(
            'id_reto' => $challengueChallengue, 
            'id_user' => $user_id,
            'id_old' => 99999999, 
            'id_new' => $post_id
        );
        
        if($post_id && $challengue && $u_id && !is_wp_error( $termChallengueStateId) && !is_wp_error( $termChallengueActivityId) && $postThumbnail){
            //wp_send_json_success( "Se ha guardado correctamente.(Pendiente de aprobación por parte del administrador)");
            $wpdb->insert( $tableGalerias, $data);
            sendNotificationDesafio($challengueChallengue, $user_id);
            wp_send_json_success( "Se ha guardado correctamente.");
        }
        else{
            wp_delete_post($post_id, true);
            //$error = new WP_Error( '-1', 'Ha ocurrido un error, favor de intentarlo nuevamente' );
      	    wp_send_json_error( 'Ha ocurrido un error, favor de intentarlo nuevamente.');
        }
    }
    wp_die();
}

// add_filter('wp_insert_post_data', 'validate_custom_post_terms', 10, 2);

// function validate_custom_post_terms($data, $postarr) {
//     // Verifica si el post es de tu custom post type
//     // var_dump($data["post_author"]);
//     // var_dump($data["post_type"]);
//     //var_dump($postarr["ID"]);
//     // echo "<pre>";
//     // var_dump($data);
//     // echo "</pre>";
//     // echo "<pre>";
//     // var_dump($postarr);
//     // echo "</pre>";
//     // echo $postarr["acf"]["field_65d88d46f3208"]."<br />";
//     // var_dump($postarr["tax_input"]['destinos']);
//     if (($data['post_type'] === 'galerias') &&  ($data['post_status'] === 'publish')){
//         // Obtén los términos del post que se está insertando
//         //$terms = wp_get_post_terms($postarr["ID"], 'destinos');
        
//         //var_dump($terms);
       
//         //Verifica si el usuario ya tiene una entrada con los mismos términos
//         $user_posts_query = new WP_Query(array(
//             'post_type' => 'galerias',
//             'author' => $postarr["acf"]["field_65d88d46f3208"], // ID del autor
//             'tax_query' => array(
//                 array(
//                     'taxonomy' => 'destinos',
//                     'field' => 'term_id',
//                     'terms' => wp_list_pluck($postarr["tax_input"]['destinos'], 'term_id'), // Lista de IDs de términos
//                 ),
//             ),
//         ));
//         var_dump($user_posts_query->have_posts());
//         wp_die('limite');
//         // Si se encuentra una entrada con los mismos términos, detén la inserción y muestra un mensaje de error
//         if ($user_posts_query->have_posts()) {
//             wp_die('Ya tienes una entrada con los mismos términos.');
//         }
//     }
// }

//======================================================================
// Save challengue (End)
//======================================================================

//======================================================================
// Add Comments to Single (Start)
//======================================================================

/* 
 * Agregar comentarios al single de desafios 
*/

add_filter( 'comments_open', 'my_comments_open', 10, 2 );

function my_comments_open( $open, $post_id ) {
 
   $post = get_post( $post_id );
 
   if ( 'desafios' == $post->post_type )
       $open = true;
 
   return $open;
}

//======================================================================
// Add Comments to Single (End)
//======================================================================

//======================================================================
// Get Number of Roaded Magic Towns (Start)
//======================================================================

/*
 * Se obtiene el id del desafio en base al nombre del post,lo habia colocado con el id pero se cambiaba 
*/

function getMagicTownRoaded(){
    // Lo coloque asi por que se cambiaba el id del post
    //$post = get_page_by_title('Desafío Pueblos Mágicos RRM', null , 'desafios');
    //var_dump($post);
    //$user = wp_get_current_user();
    $userID = getUserId();
    //var_dump($userID);
    $args3 = array( 
        'post_type' => 'galerias',
        'post_status' => 'publish', 
        'post_per_page' => -1,
        'nopaging' => true,
        'meta_query' => array(
            'relation' => 'AND',
                array(
                    'key' => 'rodador',
                    //'value' => $user->ID,
                    'value' => $userID,
                    'compare' => '='
                ),
                array(
                    'key' => 'reto',
                    'value' => 26513, //Id de desafios de pueblos mágicos
                    'compare' => '='
                )
        )
    );
        
    $posts_array3 = new WP_Query( $args3 );
    //var_dump($posts_array3);
    return $posts_array3->post_count;
}

//======================================================================
// Get Number of Roaded Magic Towns (End)
//======================================================================

//======================================================================
// Get List of Challengues (Start)
//======================================================================

/*
 * Obtener la lista de los desafíos para mostrar en los dropdown, con la restricción de la membresía.
*/

function get_challengues(){
    
    //$results_transient_challengues = get_transient('challengues_transient');

    //if (false === $results_transient_challengues) {
        // El transient no existe, ejecutar la consulta
        $args = array(
            // Configura los argumentos de tu consulta WP_Query
            'post_type' => 'desafios',
            'post_status' => 'publish',
            'posts_per_page' => -1,
            'post__in'=> getAvalaiblesDestinosPlanMember(get_current_user_id())
        );
        $query = new WP_Query($args);

        // Guardar los resultados de la consulta en un transient
        //set_transient('challengues_transient', $query, 86400);

        // Devolver la consulta completa
        return $query;
//    } else {
        // El transient existe, devolver los resultados almacenados en él
  //      return $results_transient_challengues;
//    }
}

//======================================================================
// Get List of Challengues (End)
//======================================================================


//======================================================================
// Get All List of Challengues (Start)
//======================================================================

/*
 * Obtener la lista de los desafíos para mostrar en los dropdown 
*/

function get_all_challengues(){
    
    //$results_transient_challengues = get_transient('challengues_transient');

    //if (false === $results_transient_challengues) {
        // El transient no existe, ejecutar la consulta
        $args = array(
            // Configura los argumentos de tu consulta WP_Query
            'post_type' => 'desafios',
            'post_status' => 'publish',
            'posts_per_page' => -1,
            //'post__in'=> getAvalaiblesDestinosPlanMember(get_current_user_id())
        );
        $query = new WP_Query($args);

        // Guardar los resultados de la consulta en un transient
        //set_transient('challengues_transient', $query, 86400);

        // Devolver la consulta completa
        return $query;
//    } else {
        // El transient existe, devolver los resultados almacenados en él
  //      return $results_transient_challengues;
//    }
}

//======================================================================
// Get All List of Challengues(End)
//======================================================================


//======================================================================
// Show Post Aproval (Profile) (Start)
//======================================================================

/*
    * Mostrar los post de galería que no fueron aprobados
    * Se muestran 5 posts con la posibilidad de cargar más
*/

function post_aproval_shortcode(){
    ob_start();

    if (is_user_logged_in()) {

        $current_user = wp_get_current_user();
        $post_per_page = 5;
        $args = array(
            'post_type' => 'galerias', // Reemplaza 'nombre_del_custom_post' con el nombre de tu Custom Post Type
            'author'    => $current_user->ID, // Filtrar por el ID del usuario actual
            //'posts_per_page' => -1, // Obtener todas las entradas del usuario
            'posts_per_page' => $post_per_page,
            'post_status' => 'pending' 
        );

        $query = new WP_Query($args);
        if ($query->have_posts()) {
            ?>
<div class="aproval-gallery-content">
    <?php
            // Comenzar el loop para mostrar las entradas
            while ($query->have_posts()) {
                $query->the_post();

                $parent_term = wp_get_post_terms( get_the_ID(), "destinos", array( 'parent' => 0, 'hide_empty' => false) );
                $child_term = wp_get_post_terms( get_the_ID(), "destinos", array( 'parent' => $parent_term[0]->term_id, 'hide_empty' => false) );
                //var_dump($child_term[0]);
                get_template_part( 
                    'partials/entry-aproval',
                    'aproval-item',
                    array(
                        'id-post' => get_the_ID(),
                        'id-challengue' => get_field('reto', get_the_ID()),
                        'title' => get_the_title(),
                        'description' => get_the_content(),
                        'state-zone' => $parent_term[0],
                        'turistic-destination-activity' => $child_term[0],
                        'img-post' => wp_get_attachment_url( get_post_thumbnail_id($query->ID)),
                        'admin-aproval-text' => get_field('aprobacion', $query->ID),
                    )
                );
                //echo get_the_title();
            }
            ?>
</div>
<?php $count = $query->found_posts; ?>
<?php if($count > $post_per_page): ?>
<a href="#" id="more-posts-button">
    Cargar mas entradas
</a>
<?php endif; ?>
<?php

        }else{
            ?>
<div class="empty-aproval">
    No tienes publicaciones pendientes de aprobación
</div>
<?php
        }
        ?>



<span id="total-posts-count"><?php echo absint( $post_per_page ); ?></span>
<?php
    }
    ?>
<?php
    $content = ob_get_clean();

	return $content;
}

add_shortcode('post-aproval', 'post_aproval_shortcode');

//======================================================================
// Show Post Aproval (Profile) (End)
//======================================================================

//======================================================================
// Show More Posts Last activity (Gallery posts) (Profile) (Start)
//======================================================================

/*
 * Se muestran mas posts de galeria del usuario cuando se le da click al boton "Ver más" dentro de la pestaña sobre mi, en ultima actividad  
*/

add_action('wp_ajax_ajaxNextGalleryPosts', 'ajaxNextGalleryPosts');
add_action('wp_ajax_nopriv_ajaxNextGalleryPosts', 'ajaxNextGalleryPosts');

function ajaxNextGalleryPosts(){
    check_ajax_referer( 'rrm_ajaxNextGalleryPosts', 'nonce' );
    //Build query
   //if (is_user_logged_in()) {
        $userID = getUserId();
        // $current_user = wp_get_current_user();
        // $user_info = get_userdata( $current_user ->ID );
        $args = array(
            'post_type'   => 'galerias', // Reemplaza 'nombre_del_custom_post' con el nombre de tu Custom Post Type
            //'author'    => $current_user->ID, // Filtrar por el ID del usuario actual
            'author'      => $userID,
            'post_status' => 'publish' 
        );

        //Get offset
        if ( ! empty( $_GET['post_offset'] ) ) { // phpcs:ignore WordPress.Security.NonceVerification
            $args['offset']         = absint( $_GET['post_offset'] ); // phpcs:ignore WordPress.Security.NonceVerification
            $args['posts_per_page'] = 5;
        }

        $count_results = '0';

        $posts = new WP_Query( $args );

        //Results found
        if ($posts->have_posts()) {
            $results_html = '';
            $count_results = $posts->found_posts;
            ob_start();
            // Iterar sobre los Custom Post Types encontrados
            while ($posts->have_posts()) : 
               
                $posts->the_post();
                // Acceder a la información del Custom Post Type;
                $reto = get_field('reto', get_the_ID());
                ?>
<div class="activity">
    <div class="activity-action">
        <div class="activity-action__avatar">
            <?php /*<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/profile/profile.png' ); ?>" alt=""> */
            ?>
            <?php 
                                echo get_avatar( $userID,50,'',false); 
                            ?>
        </div>
        <div class="activity-action__description">
            <div>
                <div class="activity-action__name">
                    <?php echo get_userdata($userID)->display_name; ?>

                </div>
                <div class="activity-action__action">
                    <?php echo "Publico una nueva foto en el reto \"".get_the_title($reto)."\""; ?>
                </div>
            </div>
            <div class="activity-action__date">
                <?php echo get_the_date('F j , Y'); ?>
            </div>
        </div>
    </div>
    <div class="activity-content photos">
        <img src="<?php echo wp_get_attachment_url( get_post_thumbnail_id(get_the_ID(), "last-activity-gallery")); ?>"
            alt="desafio" />
        <?php /*<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/profile/mechanic-workshop.png' ); ?>"
        alt=""> */ ?>
    </div>
</div>
<?php
            endwhile;
            $results_html = ob_get_clean();
        }
        
    //}
 
    $response = array();

    //1. value is HTML of new posts and 2. is total count of posts
    array_push ( $response, $results_html, $count_results );
    echo json_encode( $response );

    //Always use die() in the end of ajax functions
    die();  
}

//======================================================================
// Show More Posts Las activity (Gallery posts) (Profile) (Start)
//======================================================================

//======================================================================
// Load More Aproval Gallery Posts (Start)
//======================================================================

/*
 * En el tab de "Pendientes de aprobación" del profile del usuario se cargan únicamente 5 posts, 
 * si el usuario da click en el boton de "cargar mas"
 * esta función se encarga de cargar los posts siguientes
*/

add_action('wp_ajax_ajaxNextPostsAproval', 'ajaxNextPostsAproval');
add_action('wp_ajax_nopriv_ajaxNextPostsAproval', 'ajaxNextPostsAproval');

function ajaxNextPostsAproval() {
    check_ajax_referer( 'rrm_ajaxNextPostsAproval', 'nonce' );

    //Build query
    if (is_user_logged_in()) {

        $current_user = wp_get_current_user();
        $args = array(
            'post_type' => 'galerias', // Reemplaza 'nombre_del_custom_post' con el nombre de tu Custom Post Type
            'author'    => $current_user->ID, // Filtrar por el ID del usuario actual
            'post_status' => 'pending' 
        );

        //Get offset
        if ( ! empty( $_GET['post_offset'] ) ) { // phpcs:ignore WordPress.Security.NonceVerification
            $args['offset']         = absint( $_GET['post_offset'] ); // phpcs:ignore WordPress.Security.NonceVerification
            $args['posts_per_page'] = 5;
        }

        $count_results = '0';

        $query_results = new WP_Query( $args );

        //Results found
        if ( $query_results->have_posts() ) {

            $count_results = $query_results->found_posts;
            $results_html = '';

            ob_start();

            while ( $query_results->have_posts() ) { 

                $query_results->the_post();

                //Your single post HTML here
                $parent_term = wp_get_post_terms( get_the_ID(), "destinos", array( 'parent' => 0, 'hide_empty' => false) );
                $child_term = wp_get_post_terms( get_the_ID(), "destinos", array( 'parent' => $parent_term[0]->term_id, 'hide_empty' => false) );
                //var_dump($child_term[0]);
                get_template_part( 
                    'partials/entry-aproval',
                    'aproval-item',
                    array(
                        'id-post' => get_the_ID(),
                        'id-challengue' => get_field('reto', get_the_ID()),
                        'title' => get_the_title(),
                        'description' => get_the_content(),
                        'state-zone' => $parent_term[0],
                        'turistic-destination-activity' => $child_term[0],
                        'img-post' => wp_get_attachment_url( get_post_thumbnail_id($query_results->ID)),
                        'admin-aproval-text' => get_field('aprobacion', $query_results->ID),
                    )
                );
            
            }    

            $results_html = ob_get_clean();  
        }
    }
 
    $response = array();

    //1. value is HTML of new posts and 2. is total count of posts
    array_push ( $response, $results_html, $count_results );
    echo json_encode( $response );

    //Always use die() in the end of ajax functions
    die();  
}

//======================================================================
// Load More Aproval Gallery Posts (End)
//======================================================================

//======================================================================
// Last posts gallery of user (Start)
//======================================================================

function last_posts_gallery($userID){
    ob_start();
    // $user = wp_get_current_user();
    // $user_info = get_userdata( $user->ID );
    $post_per_page = 5;
    $args = array( 
        //'author' => $user->ID,
        'post_type' => 'galerias',
        'post_status' => 'publish', 
        'meta_key'      => 'rodador',
        //'meta_value'    => $user->ID,
        'meta_value'    => $userID,
        'posts_per_page' => $post_per_page,
    );

    $posts = new WP_Query( $args );

    if ($posts->have_posts()) {
        // Iterar sobre los Custom Post Types encontrados
        while ($posts->have_posts()) : 
            $posts->the_post();
            // Acceder a la información del Custom Post Type;
            $reto = get_field('reto', get_the_ID());
            ?>
<div class="activity">
    <div class="activity-action">
        <div class="activity-action__avatar">
            <?php /*<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/profile/profile.png' ); ?>" alt=""> */
            ?>
            <?php 
                            echo get_avatar( $userID ,50,'',false); 
                        ?>
        </div>
        <div class="activity-action__description">
            <div>
                <div class="activity-action__name">
                    <?php echo get_userdata($userID)->display_name; ?>

                </div>
                <div class="activity-action__action">
                    <?php echo "Publico una nueva foto en el reto \"".get_the_title($reto)."\""; ?>
                </div>
            </div>
            <div class="activity-action__date">
                <?php echo get_the_date('F j , Y'); ?>
            </div>
        </div>
    </div>
    <div class="activity-content photos">
        <img src="<?php echo wp_get_attachment_url( get_post_thumbnail_id(get_the_ID(), "last-activity-gallery")); ?>"
            alt="desafio" />
        <?php /*<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/profile/mechanic-workshop.png' ); ?>"
        alt=""> */ ?>
    </div>
</div>
<?php
        endwhile;
        ?>
<?php $count = $posts->found_posts;?>
<?php if($count > $post_per_page): ?>
<a href="#" class="activity__button">
    Ver más
</a>
<?php endif; ?>
<?php
    }else{
        ?>
<div class="activity__no-activity">
    No hay actividad que mostrar
</div>
<?php
    }
    ?>
<span id="total-posts-count-gallery"><?php echo absint( $count ); ?></span>
<?php
    $content = ob_get_clean();

    return $content;
}


//======================================================================
// Last posts gallery of user (Start)
//======================================================================

//======================================================================
// Desafios completados (Start)
//======================================================================

/*
 * Utilizado en la barra lateral del perfil del rodador
*/

/*
 * Se muestra la lista de desafios para cada usuario en el administrador.
 * El administrador hace check en cada uno de ellos para validar que el desafio del rodador se ha completado.
*/

add_action( 'edit_user_profile', 'challengues_user_check', 3, 1 );

function challengues_user_check($user){
    
    $challengue_posts = get_posts(array(
        'post_type' => 'desafios',
        'posts_per_page' => -1, // Obtener todos los posts
    ));

    ?>

<h2 class="challengues-title">Desafíos completados</h2>

<?php
        $checked = '';
        $custom_html = '';
        $challengues_selected = get_user_meta($user->ID, 'challengues_selected', true);
    ?>
<table class="form-table">
    <tbody>
        <?php
        //var_dump($challengues_selected);
        foreach ($challengue_posts as $post) {
            $post_id = $post->ID;
            if(!empty($challengues_selected)):
                $checked = in_array($post_id, $challengues_selected) ? 'checked' : '';
            endif;
            $custom_html .= '<tr><td><label for="challengue_posts[]"><input type="checkbox" name="challengue_posts[]" value="' . $post_id . '" ' .$checked . '> ' . $post->post_title . '</label></td></tr>';
        }
        echo $custom_html;

    ?>
    </tbody>
</table>
<?php
}

/*
 * Se guarda el meta "challengues_selected" de cada usuario
*/

add_action('edit_user_profile_update', 'save_data_challengue_checkboxes');

function save_data_challengue_checkboxes($user_id) {
    
    if (!current_user_can('edit_user', $user_id)) {
        return false;
    }
  
    
    if(!isset($_POST['challengue_posts'])){
        delete_user_meta($user_id, 'challengues_selected');
        return ;
    }
  
    $challengues_selected = get_user_meta($user_id, 'challengues_selected', true);
    
    if(!is_array($challengues_selected))
        $challengues_selected=array();
    // phpcs:ignore WordPress.Security.NonceVerification -- Nonce verified by WordPress admin form submission.
    $challengue_posts = isset( $_POST['challengue_posts'] ) ? array_map( 'absint', (array) $_POST['challengue_posts'] ) : array();

    foreach ( $challengue_posts as $challenge ) {
        if ( ! in_array( $challenge, $challengues_selected, true ) ) {
            $post = get_post( $challenge );
            if ( $post ) {
                save_new_alert( $user_id, 'desafio', $post->post_title . ' ha sido aprobado.' );
                $user = get_userdata( $user_id );
                if ( $user ) {
                    send_mail_notification( $user->user_email, 'Desafio Aprobado', $post->post_title . ' ha sido aprobado.', $user->display_name );
                }
            }
        }
    }
    update_user_meta( $user_id, 'challengues_selected', $challengue_posts );
    
    
    
}

//======================================================================
// Desafios completados (End)
//======================================================================



//======================================================================
// Lista de paises (Start)
//======================================================================


function getCountries(){
    $countriesJson = file_get_contents(get_template_directory().'/assets/countries.json'); 
    return json_decode($countriesJson, true);
}

function getMexStates(){
    $stateJson = file_get_contents(get_template_directory().'/assets/src/scripts-c/profile/estados.json');
    return json_decode($stateJson, true);
}

function addStateSelectAdmin($user) {
    ?>

<h2><?php _e('Estado de origen', 'textdomain'); ?></h2>

<table class="form-table">
    <tr>
        <th><label for="user_state"><?php _e('Estado', 'textdomain'); ?></label></th>
        <td>
            <select name="user_state" id="user_state">
                <option value="">Selecciona una opcion</option>
                <?php
                        foreach (getMexStates() as $state) :
                            echo '<option value="' . esc_attr($state['clave']) . '"' . selected($state['clave'], get_user_meta($user->ID, 'user_state', true), false) . '>' . esc_html($state['nombre']) . '</option>';
                        endforeach;
                        ?>
            </select>
        </td>
    </tr>
</table>
<?php
}

function addCountrySelectAdmin($user) {
    ?>
<h2><?php _e('País de origen', 'textdomain'); ?></h2>

<table class="form-table">
    <tr>
        <th><label for="user_country"><?php _e('País', 'textdomain'); ?></label></th>
        <td>
            <select name="user_country" id="user_country">
                <option value="">Seleccionar una opción:</option>
                <?php
                     foreach (getCountries() as $country) :
                        echo '<option value="' . esc_attr($country['code3']) . '"' . selected($country['code3'], get_user_meta($user->ID, 'user_country', true), false) . '>' . esc_html($country['name']) . '</option>';
                     endforeach;
                    ?>
            </select>
        </td>
    </tr>
</table>
<?php
}

add_action('show_user_profile', 'addCountrySelectAdmin');
add_action('edit_user_profile', 'addCountrySelectAdmin');

add_action('show_user_profile', 'addStateSelectAdmin');
add_action('edit_user_profile', 'addStateSelectAdmin');

function saveOriginCountryUser($user_id) {
    if (!current_user_can('edit_user', $user_id)) {
        return false;
    }
    $user_country = isset( $_POST['user_country'] ) ? sanitize_text_field( wp_unslash( $_POST['user_country'] ) ) : '';
    update_user_meta( $user_id, 'user_country', $user_country );
}

add_action('personal_options_update', 'saveOriginCountryUser');
add_action('edit_user_profile_update', 'saveOriginCountryUser');


//======================================================================
// Lista de paises (End)
//======================================================================


//======================================================================
// Desafios en progreso (Start)
//======================================================================

/*
 * Se obtienen los desafios marcados por cada usuario
*/

function completedChallengueByAdmin($userID){
    //$user = wp_get_current_user();
    //$userID = getUserId();
    $userChallenguesCompleted = [];
  
    $userChallenguesSelected = get_user_meta($userID, 'challengues_selected', true); 
    // echo "userChallenguesCompleted";
    //var_dump($userChallenguesCompleted);
    // echo "userChallenguesCompleted";
    if(!empty($userChallenguesSelected)):
        $userChallenguesCompleted  = array_map('intval', $userChallenguesSelected );
    endif;
  
    return $userChallenguesCompleted;
}

/*
 * Se obtiene el porcentaje de cada desafio completado por usuario.
 * Se pinta el progreso de cada desafio [0]
 * Se regresan los ids de los desafios que ya completo el usuario [1]
*/

function progressChallengue($idUser){
    ob_start();
  
    $grouped_posts = userGalleryGroupedByChallengue($idUser);

    // echo "<pre style='color: white'>";
    // var_dump($grouped_posts);
    // echo "</pre>";

    $completedChallengues = [];
    $current_user = wp_get_current_user();
 
    if(!empty($grouped_posts)):
        foreach( $grouped_posts as $key => $challengue){
            $count = count($challengue);
            $pauta = get_field('progreso_completo', $key);
            
            if(empty($pauta)) continue;
            // echo "<br />";
            // var_dump($count);
            // echo "<br />";
            $percentage = ((int) $count * 100) / $pauta;
            // var_dump($count);
            // echo "<br/>";
            // var_dump($pauta);
            // echo "<br/>";
            // var_dump($percentage);
            // echo "<br/>";
            if($percentage >= 100):
                array_push($completedChallengues, $key);
            endif;
            $percentage_donut = $percentage > 95 ? 95 : $percentage;
            $image = get_field('logo', $key);
            //var_dump($image);
            $imageEl = '';
            if( $image ) :
                $imageEl = wp_get_attachment_image( $image, 'full' );
            endif;
            // var_dump(get_the_title($key)).'<br />';
            // var_dump(get_the_title($percentage));
            // var_dump(!in_array($key, completedChallengueByAdmin($idUser)));
            // var_dump($percentage);

            

            //if((!in_array($key, completedChallengueByAdmin($idUser))) || $percentage < 100 ):
            // Si no esta check en el admin
            if((!in_array($key, completedChallengueByAdmin($idUser)))):
                get_template_part( 
                    'partials/wheel-animation',
                    'wheel-animation',
                    array(
                        'title-challengue' => get_the_title($key),
                        'percentage' => $percentage_donut, // Colocar el porcentaje de desafios
                        'url-challengue' => $imageEl
                    )
                );
            endif;
           
        }
    else:
    ?>
<div class="profile-content__challengues-in-progress-not-finished">
    <?php 
                if($current_user->ID == $idUser):
            ?>
    En estos momentos no tienes ningun progreso
    <?php else: ?>
    En estos momentos no tiene ningun progreso
    <?php endif; ?>
</div>
<?php
    endif;
    $content = ob_get_clean();

    return [$content, $completedChallengues];
}

/*
 * Se obtienen los post de galería que han sido aprobados, agrupados por desafío
*/

function userGalleryGroupedByChallengue($userId){

  $grouped_posts = array();
  if ( !empty($userId)  ) {
  
      $args = array( 
          //'author' => $user->ID,
          'post_type' => 'galerias',
          'post_status' => 'publish', 
          'meta_key'      => 'rodador',
          'meta_value'    => $userId,
          'numberposts'      => -1,
          'nopaging' => true
      );

      $posts_array = get_posts( $args );
      // echo "<pre>";
      // var_dump($posts_array);
      // echo "</pre>";

      foreach( $posts_array as $the_post ) {
          $reto = get_field('reto', $the_post->ID);
          
          if( !isset($grouped_posts[$reto]) ){
              $grouped_posts[$reto] = array();
          }
          
          $grouped_posts[$reto][] = $the_post;
      }
  }

  return $grouped_posts;
}

//======================================================================
// Desafios en progreso (End)
//======================================================================

//======================================================================
// Desafios en Tab (Profile) (Start)
//======================================================================

/*
 * EL shortcode se coloca en el plugin de profilegrid para poder mostrarse en el tab
*/

function my_challengues_shortcode(){
    ob_start();
    //$user = wp_get_current_user();
    $userID = getUserId();
    //$grouped_posts = userGalleryGroupedByChallengue($user->ID);
    $grouped_posts = userGalleryGroupedByChallengue($userID);
    $count = 0;
    if(!empty($grouped_posts)){
        foreach( $grouped_posts as $key => $challengue){
            $postArray = array();
            foreach($challengue as $post){

                $parent_term = wp_get_post_terms( $post->ID, "destinos", array( 'parent' => 0, 'hide_empty' => false) );
                $child_term = wp_get_post_terms( $post->ID, "destinos", array( 'parent' => $parent_term[0]->term_id, 'hide_empty' => false) );
               //var_dump($child_term[0]->name);
                array_push(
                    $postArray,
                    Array(
                        'content-title' => $post->post_title,
                        'content-description' => $post->post_content,
                        'url-image' => wp_get_attachment_url( get_post_thumbnail_id($post->ID)),
                        'destination-parent' => $parent_term[0]->name,
                        'destination-child' => $child_term[0]->name,
                        'post-id' => $post->ID
                    )
                );
            }
            $textPhotos = "";
            $textPhotos .= count($challengue) .' foto';
            $textPhotos .= count($challengue) >= 2 ? 's' : '';
    
            get_template_part( 
                'partials/gallery-challengue-item',
                'gallery.challengue-item',
                array(
                    'title-challengue' => get_the_title($key),
                    'photo-number'  => $textPhotos,
                    'gallery' => $postArray,
                    'gallery-number' => $count,
                    'x-title' => get_field('titulo_compartir_x', 546)
                )
            );
            $count++;
            
        }
    }else{
        ?>
<div class="not-challengues-yet">
    No hay fotos que mostrar
</div>

<?php
    }
    
  
    $content = ob_get_clean();
    return '<div class="tab-challengues">'.$content.'</div>';
  }
  
  add_shortcode('my_challengues', 'my_challengues_shortcode');
  
//======================================================================
// Desafios en Tab (Profile) (End)
//======================================================================


//======================================================================
// Revisar si esta logueado el usuario (Profile) (Start)
//======================================================================

/*
 * Se manda a un js si el usuario ha sido logueado
*/

function isUserLoggedIn($uid){
    //echo $current_user;
    //echo $uid;
    $u_data = array(
        'is_user_logged_in' => is_user_logged_in() ? true : false,
        'id_user_logged' => wp_get_current_user()->ID,
        'id_user' => $uid
    );
    
    wp_localize_script('secondary-scripts', 'u_data', $u_data);
}   

add_action('wp_enqueue_scripts', 'isUserLoggedIn');


//======================================================================
// Revisar si esta logueado el usuario (Profile) (End)
//======================================================================

//======================================================================
// Obtener destinos para mapa (Profile) (Start)
//======================================================================

/*
 * Se obtienen los posts de galería del usuario, se obtiene el term asociado al post. Del term se obtiene la latitud y longitud.
 * Se obtiene el id del reto, para obtener la imagen del parche
 * Se mandan los datos a theme-c.js y a map.js 
*/

function getDestinyPlaceOfGalleryUser(){
  
    //$user = wp_get_current_user();
    $userID = getUserId();
    $child_term_info = array();

    $args = array(
        'post_type' => 'galerias',
        'meta_key'      => 'rodador',
        'meta_value'    => $userID,
        'posts_per_page' => -1, // Obtener todos los posts del usuario
        'post_status' => 'publish', // Obtener solo los posts publicados
    );

    $posts_query = new WP_Query($args);
    //var_dump($posts_query);
    if ($posts_query->have_posts()) {
        $taxonomy = 'destinos';
        $index = 0;
        // Iterar sobre los posts
        while ($posts_query->have_posts()) {
            $posts_query->the_post();
            // Obtener los términos de taxonomía asociados a este post
            $post_terms = wp_get_post_terms(get_the_ID(), $taxonomy);
            foreach ($post_terms as $term) {
                // Comprobar si el término es un child term (no es principal)
                if ($term->parent !== 0) {
                    $child_term_info[$index]['term_id'] = $term->term_id;
                    $child_term_info[$index]['post_id'] = get_the_ID();
                    $child_term_info[$index]['term_name'] = $term->name;
                }
            }
            $index++;
        }
    }

    array_unique(array_map(function($child_term) { return $child_term['term_id']; }, $child_term_info));

    foreach ($child_term_info as $key => $value) {
        $id_challengue = get_field_object('field_65d88fc2b9684', $value['post_id'])['value'];
        $image = get_field('logo', $id_challengue);
        if(!empty($image)){
            $image_url = wp_get_attachment_image_url($image);
        }else{
            $image_url = '';
        }
        $child_term_info[$key]['challengue_url'] = $image_url ;
        $child_term_info[$key]['latitude'] = get_field_object('field_65d5418f1543c','term_'.(string)$value['term_id'])['value'] ;
        $child_term_info[$key]['longitude'] = get_field_object('field_65d541a11543d','term_'.(string)$value['term_id'])['value'] ;
    }
    
    // echo "<pre>";
    // var_dump($child_term_info);
    // echo "</pre>";
    
    wp_localize_script('secondary-scripts', 'child_term_info', $child_term_info);
}   

add_action('wp_enqueue_scripts', 'getDestinyPlaceOfGalleryUser');

//======================================================================
// Obtener destinos para mapa (Profile) (End)
//======================================================================




//======================================================================
// Change icon of of view cart (Start)
//======================================================================

function change_view_cart_link( $params, $handle )
{
    switch ($handle) {
        case 'wc-add-to-cart':
            //$params['i18n_view_cart'] = "<i class='icon-shoppingcartplus'></i>"; //chnage Name of view cart button
            //$params['cart_url'] = "http://myshop.com/custom-page"; //change URL of view cart button
        break;
    }
    return $params;
}
add_filter( 'woocommerce_get_script_data', 'change_view_cart_link', 10, 2 );

//======================================================================
// Change icon of of view cart (End)
//======================================================================


//======================================================================
// Create custom post type logros (Start)
//======================================================================

function cpt_achievement(){
    $args = array(
        'public' => true,
        'label'  => 'Medallas',
        'supports'    => array( 'title', 'thumbnail' ),
        'menu_icon'   => 'dashicons-awards',
        // Agrega más argumentos según sea necesario
    );
    register_post_type( 'medalla', $args );
}

add_action( 'init', 'cpt_achievement' );

//======================================================================
// Create custom post type logros (End)
//======================================================================


//======================================================================
// Create email template (Start)
//======================================================================

/*
 * Se crea la plantilla para el "restablecmiento de la contraseña".
*/

function custom_mail_template($key, $user_login, $user_data) {
    ob_start(); ?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Email</title>
    <style>
    /* Estilos CSS para el correo */
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
    }

    .container {
        max-width: 600px;
        margin: 0 auto;
        padding: 20px;
        background-color: #ffffff;
        border-radius: 5px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }

    h1 {
        color: #333333;
    }

    p {
        color: #666666;
    }
    </style>
</head>

<body>
    <table id="bodyTable" style="background-color: #f4f4f4" border="0" width="100%" cellspacing="0" cellpadding="0">
        <tbody>
            <tr>
                <td class="bodyCell" align="center" valign="top">
                    <table id="root" border="0" width="100%" cellspacing="0" cellpadding="0">
                        <tbody class="mceWrapper" data-block-id="13">
                            <tr>
                                <td class="mceWrapperOuter" align="center" valign="top">
                                    <!-- [if (gte mso 9)|(IE)]&gt;-->
                                    <table style="width: 660px" border="0" width="660" cellspacing="0" cellpadding="0"
                                        align="center">
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <table style="max-width: 660px" role="presentation" border="0"
                                                        width="100%" cellspacing="0" cellpadding="0">
                                                        <tbody>
                                                            <tr>
                                                                <td class="mceWrapperInner"
                                                                    style="background-color: #ffffff;background-position: center;background-repeat: no-repeat;background-size: cover"
                                                                    valign="top">
                                                                    <table role="presentation" border="0" width="100%"
                                                                        cellspacing="0" cellpadding="0" align="center"
                                                                        data-block-id="12">
                                                                        <tbody>
                                                                            <tr class="mceRow">
                                                                                <td style="background-position: center;background-repeat: no-repeat;background-size: cover"
                                                                                    valign="top">
                                                                                    <table role="presentation"
                                                                                        border="0" width="100%"
                                                                                        cellspacing="0" cellpadding="0">
                                                                                        <tbody>
                                                                                            <tr>
                                                                                                <td class="mceColumn"
                                                                                                    style="padding-top: 0;padding-bottom: 0"
                                                                                                    colspan="12"
                                                                                                    valign="top"
                                                                                                    width="100%"
                                                                                                    data-block-id="-11">
                                                                                                    <table
                                                                                                        role="presentation"
                                                                                                        border="0"
                                                                                                        width="100%"
                                                                                                        cellspacing="0"
                                                                                                        cellpadding="0">
                                                                                                        <tbody>
                                                                                                            <tr>
                                                                                                                <td class="mceBlockContainer"
                                                                                                                    style="background-color: #1d1d1d;padding: 12px 48px 12px 48px"
                                                                                                                    align="center"
                                                                                                                    valign="top">
                                                                                                                    <img class="mceLogo"
                                                                                                                        style="width: 151px;height: auto;max-width: 151px !important"
                                                                                                                        src="https://mcusercontent.com/0c6390fedf01ff4c1897cca14/images/98985a90-c429-84a6-f642-52e1db2352fb.png"
                                                                                                                        alt="Logo"
                                                                                                                        width="151"
                                                                                                                        height="auto"
                                                                                                                        data-block-id="2" />
                                                                                                                </td>
                                                                                                            </tr>
                                                                                                            <tr>

                                                                                                                <td class="mceBlockContainer"
                                                                                                                    style="background-color: #1d1d1d;padding: 12px 24px 12px 24px"
                                                                                                                    valign="top">
                                                                                                                    <div id="dataBlockId-3"
                                                                                                                        class="mceText"
                                                                                                                        style="width: 100%"
                                                                                                                        data-block-id="3">
                                                                                                                        <h3>
                                                                                                                            <span
                                                                                                                                style="color: #ffffff">
                                                                                                                                <?php echo "Hola " . $user_data->display_name; ?></span>
                                                                                                                        </h3>
                                                                                                                        <p class="last-child"
                                                                                                                            style="max-width: 600px">
                                                                                                                            <span
                                                                                                                                style="color: #ffffff"><?php echo "Has solicitado restablecer la contraseña de tu cuenta en nuestro sitio web."; ?>
                                                                                                                                <br />
                                                                                                                                <br />
                                                                                                                                <span
                                                                                                                                    style="color: #ffffff"><?php echo "Si no solicitaste este restablecimiento de contraseña, puedes ignorar este mensaje;"; ?>
                                                                                                                                    <br />
                                                                                                                                    <br />

                                                                                                                                    <span
                                                                                                                                        style="color: #ffffff"><?php echo "Para restablecer tu contraseña, haz clic en el siguiente enlace:"; ?>
                                                                                                                                        <br />
                                                                                                                                        <br />
                                                                                                                                        <a style="color: #e81837"
                                                                                                                                            href="<?php echo site_url( "wp-login.php?action=rp&key=$key&login=" . rawurlencode( $user_login ), 'login' ); ?>">
                                                                                                                                            Restablecer
                                                                                                                                            contraseña
                                                                                                                                        </a>
                                                                                                                                        <br />
                                                                                                                                        <br />¡Gracias!
                                                                                                                                        <br />
                                                                                                                                    </span>
                                                                                                                        </p>
                                                                                                                    </div>
                                                                                                                </td>
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                <td class="mceBlockContainer"
                                                                                                                    style="background-color: #1d1d1d;padding: 12px 0 12px 0"
                                                                                                                    align="center"
                                                                                                                    valign="top">
                                                                                                                    <img class="imageDropZone mceImage"
                                                                                                                        style="width: 564px;height: auto;max-width: 960px !important"
                                                                                                                        role="presentation"
                                                                                                                        src="https://rodandorutasmagicas.com/www/wp-content/uploads/2024/08/rodar-nos-lleva_pass.png"
                                                                                                                        alt=""
                                                                                                                        width="600"
                                                                                                                        height="auto"
                                                                                                                        data-block-id="4" />
                                                                                                                </td>
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                <td class="mceBlockContainer"
                                                                                                                    style="background-color: #1d1d1d;padding: 20px 24px 20px 24px"
                                                                                                                    valign="top">
                                                                                                                    <table
                                                                                                                        style="background-color: #1d1d1d"
                                                                                                                        role="presentation"
                                                                                                                        border="0"
                                                                                                                        width="100%"
                                                                                                                        cellspacing="0"
                                                                                                                        cellpadding="0"
                                                                                                                        data-block-id="6">
                                                                                                                        <tbody>
                                                                                                                            <tr>
                                                                                                                                <td style="min-width: 100%;border-top: 2px solid #ffffff"
                                                                                                                                    valign="top">
                                                                                                                                </td>
                                                                                                                            </tr>
                                                                                                                        </tbody>
                                                                                                                    </table>
                                                                                                                </td>
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                <td class="mceLayoutContainer"
                                                                                                                    style="background-color: #1d1d1d;padding: 12px 0 12px 0"
                                                                                                                    valign="top">
                                                                                                                    <table
                                                                                                                        role="presentation"
                                                                                                                        border="0"
                                                                                                                        width="100%"
                                                                                                                        cellspacing="0"
                                                                                                                        cellpadding="0"
                                                                                                                        align="center"
                                                                                                                        data-block-id="7">
                                                                                                                        <tbody>
                                                                                                                            <tr
                                                                                                                                class="mceRow">
                                                                                                                                <td style="background-color: #1d1d1d;background-position: center;background-repeat: no-repeat;background-size: cover;padding-top: 0px;padding-bottom: 0px"
                                                                                                                                    valign="top">
                                                                                                                                    <table
                                                                                                                                        role="presentation"
                                                                                                                                        border="0"
                                                                                                                                        width="100%"
                                                                                                                                        cellspacing="24"
                                                                                                                                        cellpadding="0">
                                                                                                                                        <tbody>
                                                                                                                                            <tr>
                                                                                                                                                <td class="mceColumn"
                                                                                                                                                    style="margin-bottom: 24px"
                                                                                                                                                    colspan="12"
                                                                                                                                                    valign="top"
                                                                                                                                                    width="100%"
                                                                                                                                                    data-block-id="-10">
                                                                                                                                                    <table
                                                                                                                                                        role="presentation"
                                                                                                                                                        border="0"
                                                                                                                                                        width="100%"
                                                                                                                                                        cellspacing="0"
                                                                                                                                                        cellpadding="0">
                                                                                                                                                        <tbody>
                                                                                                                                                            <tr>
                                                                                                                                                                <td align="center"
                                                                                                                                                                    valign="top">
                                                                                                                                                                    <table
                                                                                                                                                                        class="mceClusterLayout"
                                                                                                                                                                        role="presentation"
                                                                                                                                                                        border="0"
                                                                                                                                                                        width=""
                                                                                                                                                                        cellspacing="0"
                                                                                                                                                                        cellpadding="0"
                                                                                                                                                                        data-block-id="-9">
                                                                                                                                                                        <tbody>
                                                                                                                                                                            <tr>
                                                                                                                                                                                <td class="mobileClass-3"
                                                                                                                                                                                    style="padding-left: 24px;padding-top: 0;padding-right: 24px"
                                                                                                                                                                                    valign="top"
                                                                                                                                                                                    data-breakpoint="3">
                                                                                                                                                                                    <a href="https://facebook.com/RodandoRutasMagicas"
                                                                                                                                                                                        target="_blank"
                                                                                                                                                                                        rel="noopener"
                                                                                                                                                                                        data-block-id="-5">
                                                                                                                                                                                        <img class="mceImage"
                                                                                                                                                                                            style="border: 0;width: 40px;height: auto;max-width: 40px !important"
                                                                                                                                                                                            src="https://cdn-images.mailchimp.com/icons/social-block-v3/block-icons-v3/facebook-filled-light-40.png"
                                                                                                                                                                                            alt="Facebook icon"
                                                                                                                                                                                            width="40"
                                                                                                                                                                                            height="auto" />
                                                                                                                                                                                    </a>
                                                                                                                                                                                </td>
                                                                                                                                                                                <td class="mobileClass-3"
                                                                                                                                                                                    style="padding-left: 24px;padding-top: 0;padding-right: 24px"
                                                                                                                                                                                    valign="top"
                                                                                                                                                                                    data-breakpoint="3">
                                                                                                                                                                                    <a href="https://instagram.com/rodandorutasmagicas/"
                                                                                                                                                                                        target="_blank"
                                                                                                                                                                                        rel="noopener"
                                                                                                                                                                                        data-block-id="-6">
                                                                                                                                                                                        <img class="mceImage"
                                                                                                                                                                                            style="border: 0;width: 40px;height: auto;max-width: 40px !important"
                                                                                                                                                                                            src="https://cdn-images.mailchimp.com/icons/social-block-v3/block-icons-v3/instagram-filled-light-40.png"
                                                                                                                                                                                            alt="Instagram icon"
                                                                                                                                                                                            width="40"
                                                                                                                                                                                            height="auto" />
                                                                                                                                                                                    </a>
                                                                                                                                                                                </td>
                                                                                                                                                                                <td class="mobileClass-3"
                                                                                                                                                                                    style="padding-left: 24px;padding-top: 0;padding-right: 24px"
                                                                                                                                                                                    valign="top"
                                                                                                                                                                                    data-breakpoint="3">
                                                                                                                                                                                    <a href="https://twitter.com/RRutasMagicas"
                                                                                                                                                                                        target="_blank"
                                                                                                                                                                                        rel="noopener"
                                                                                                                                                                                        data-block-id="-7">
                                                                                                                                                                                        <img class="mceImage"
                                                                                                                                                                                            style="border: 0;width: 40px;height: auto;max-width: 40px !important"
                                                                                                                                                                                            src="https://cdn-images.mailchimp.com/icons/social-block-v3/block-icons-v3/twitter-filled-light-40.png"
                                                                                                                                                                                            alt="Twitter icon"
                                                                                                                                                                                            width="40"
                                                                                                                                                                                            height="auto" />
                                                                                                                                                                                    </a>
                                                                                                                                                                                </td>
                                                                                                                                                                                <td class="mobileClass-3"
                                                                                                                                                                                    style="padding-left: 24px;padding-top: 0;padding-right: 24px"
                                                                                                                                                                                    valign="top"
                                                                                                                                                                                    data-breakpoint="3">
                                                                                                                                                                                    <a href="https://youtube.com/@rodandorutasmagicas"
                                                                                                                                                                                        target="_blank"
                                                                                                                                                                                        rel="noopener"
                                                                                                                                                                                        data-block-id="-8">
                                                                                                                                                                                        <img class="mceImage"
                                                                                                                                                                                            style="border: 0;width: 40px;height: auto;max-width: 40px !important"
                                                                                                                                                                                            src="https://cdn-images.mailchimp.com/icons/social-block-v3/block-icons-v3/youtube-filled-light-40.png"
                                                                                                                                                                                            alt="YouTube icon"
                                                                                                                                                                                            width="40"
                                                                                                                                                                                            height="auto" />
                                                                                                                                                                                    </a>
                                                                                                                                                                                </td>
                                                                                                                                                                            </tr>
                                                                                                                                                                        </tbody>
                                                                                                                                                                    </table>
                                                                                                                                                                </td>
                                                                                                                                                            </tr>
                                                                                                                                                        </tbody>
                                                                                                                                                    </table>
                                                                                                                                                </td>
                                                                                                                                            </tr>
                                                                                                                                        </tbody>
                                                                                                                                    </table>
                                                                                                                                </td>
                                                                                                                            </tr>
                                                                                                                        </tbody>
                                                                                                                    </table>
                                                                                                                </td>
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                <td class="mceLayoutContainer"
                                                                                                                    style="color: #fff;background-color: #1d1d1d;padding: 8px"
                                                                                                                    valign="top">
                                                                                                                    <table
                                                                                                                        id="section_bfa9f3ace6e164b7f4b5f10cf32ebf3c"
                                                                                                                        class="mceFooterSection"
                                                                                                                        role="presentation"
                                                                                                                        border="0"
                                                                                                                        width="100%"
                                                                                                                        cellspacing="0"
                                                                                                                        cellpadding="0"
                                                                                                                        align="center"
                                                                                                                        data-block-id="11">
                                                                                                                        <tbody>
                                                                                                                            <tr
                                                                                                                                class="mceRow">
                                                                                                                                <td style="background-color: #1d1d1d;background-position: center;background-repeat: no-repeat;background-size: cover;padding-top: 0px;padding-bottom: 0px"
                                                                                                                                    valign="top">
                                                                                                                                    <table
                                                                                                                                        role="presentation"
                                                                                                                                        border="0"
                                                                                                                                        width="100%"
                                                                                                                                        cellspacing="12"
                                                                                                                                        cellpadding="0">
                                                                                                                                        <tbody>
                                                                                                                                            <tr>
                                                                                                                                                <td class="mceColumn"
                                                                                                                                                    style="padding-top: 0;padding-bottom: 0;margin-bottom: 12px"
                                                                                                                                                    colspan="12"
                                                                                                                                                    valign="top"
                                                                                                                                                    width="100%"
                                                                                                                                                    data-block-id="-3">
                                                                                                                                                    <table
                                                                                                                                                        role="presentation"
                                                                                                                                                        border="0"
                                                                                                                                                        width="100%"
                                                                                                                                                        cellspacing="0"
                                                                                                                                                        cellpadding="0">
                                                                                                                                                        <tbody>
                                                                                                                                                            <tr>
                                                                                                                                                                <td class="mceBlockContainer"
                                                                                                                                                                    style="padding: 12px 48px 12px 48px"
                                                                                                                                                                    align="center"
                                                                                                                                                                    valign="top">
                                                                                                                                                                    <img class="mceLogo"
                                                                                                                                                                        style="width: 151px;height: auto;max-width: 151px !important"
                                                                                                                                                                        src="https://mcusercontent.com/0c6390fedf01ff4c1897cca14/images/98985a90-c429-84a6-f642-52e1db2352fb.png"
                                                                                                                                                                        alt="Logo"
                                                                                                                                                                        width="151"
                                                                                                                                                                        height="auto"
                                                                                                                                                                        data-block-id="8" />
                                                                                                                                                                </td>
                                                                                                                                                            </tr>
                                                                                                                                                            <tr>
                                                                                                                                                                <td class="mceBlockContainer"
                                                                                                                                                                    style="padding: 12px 16px 12px 16px"
                                                                                                                                                                    align="center"
                                                                                                                                                                    valign="top">
                                                                                                                                                                    <div id="dataBlockId-9"
                                                                                                                                                                        class="mceText"
                                                                                                                                                                        style="width: 100%"
                                                                                                                                                                        data-block-id="9">
                                                                                                                                                                        <p
                                                                                                                                                                            class="last-child">
                                                                                                                                                                            <em>
                                                                                                                                                                                <span
                                                                                                                                                                                    style="font-size: 12px">Copyright
                                                                                                                                                                                    (C)
                                                                                                                                                                                    2024
                                                                                                                                                                                    Rodando
                                                                                                                                                                                    Rutas
                                                                                                                                                                                    Mágicas.
                                                                                                                                                                                    Todos
                                                                                                                                                                                    los
                                                                                                                                                                                    derechos
                                                                                                                                                                                    reservados.</span>
                                                                                                                                                                            </em>
                                                                                                                                                                            <br />
                                                                                                                                                                            <span
                                                                                                                                                                                style="font-size: 12px">Nuestra
                                                                                                                                                                                dirección
                                                                                                                                                                                de
                                                                                                                                                                                correo
                                                                                                                                                                                es:</span>
                                                                                                                                                                            <br />
                                                                                                                                                                            <span
                                                                                                                                                                                style="font-size: 12px">contacto@rodandorutasmagicas.com</span>
                                                                                                                                                                            <br />
                                                                                                                                                                            <br />
                                                                                                                                                                        </p>
                                                                                                                                                                    </div>
                                                                                                                                                                </td>
                                                                                                                                                            </tr>
                                                                                                                                                        </tbody>
                                                                                                                                                    </table>
                                                                                                                                                </td>
                                                                                                                                            </tr>
                                                                                                                                        </tbody>
                                                                                                                                    </table>
                                                                                                                                </td>
                                                                                                                            </tr>
                                                                                                                        </tbody>
                                                                                                                    </table>
                                                                                                                </td>
                                                                                                            </tr>
                                                                                                        </tbody>
                                                                                                    </table>
                                                                                                </td>
                                                                                            </tr>
                                                                                        </tbody>
                                                                                    </table>
                                                                                </td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                    <!-- [if (gte mso 9)|(IE)]&gt;-->
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
        </tbody>
    </table>
</body>

</html>

<?php
    return ob_get_clean();
}

// Personalizar el correo electrónico de restablecimiento de contraseña
function custom_mail_restore_password( $message, $key, $user_login, $user_data ) {
    // Construir el nuevo mensaje personalizado
    $message = custom_mail_template($key, $user_login, $user_data);

    return $message;
}

add_filter( 'retrieve_password_message', 'custom_mail_restore_password', 10, 4 );

function type_email_html() {
    return 'text/html';
}
add_filter( 'wp_mail_content_type', 'type_email_html' );

//======================================================================
// Create email template (End)
//======================================================================

//======================================================================
// Create baner widget (Start)
//======================================================================

function banner_widget() {

	register_sidebar( array(
		'name'          => 'Bajo barra lateral de perfil de rodador',
		'id'            => 'bottom-profile-sidebar',
		'description'   => 'Se encuentra abajo de la barra lateral dentro del perfil del rodador',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	
    register_sidebar( array(
		'name'          => 'Bajo slider principal del home',
		'id'            => 'bottom-slider-home',
		'description'   => 'Se encuentra abajo del slider principal del home',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

    register_sidebar( array(
		'name'          => 'Arriba salón de la fama del home',
		'id'            => 'between-extreme-challengue-halloffame-home',
		'description'   => 'Se encuentra entre sección desafio mexico extremo y sección del salón de la fama en el home',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

    register_sidebar( array(
		'name'          => 'Bajo desafios del home',
		'id'            => 'between-challengue-blog-home',
		'description'   => 'Se encuentra entre sección de desafios y blog',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

    register_sidebar( array(
		'name'          => 'Bajo pestañas del profile del usuario',
		'id'            => 'bottom-tabs-profile',
		'description'   => 'Se encuentra abajo de las pestañas del perfil del usuario',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

    register_sidebar( array(
		'name'          => 'Barra lateral blog',
		'id'            => 'sidebar-blog',
		'description'   => 'Se en la barra lateral del blog',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

    register_sidebar( array(
		'name'          => 'Bajo entradas de blog',
		'id'            => 'bottom-blog',
		'description'   => 'Abajo de los posts del blog',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

}

add_action( 'widgets_init', 'banner_widget' );

//======================================================================
// Create baner widget (End)
//======================================================================

function getThemeURL() {
    return get_template_directory_uri();
}
// Registro del shortcode
add_shortcode('get_theme_url', 'getThemeURL');

// Función para obtener la URL del directorio de subidas
function getUploadUrl() {
    $uploads_dir = wp_upload_dir();
    $uploads_url = $uploads_dir['baseurl'];
    
    return $uploads_url;
}
// Registrar el shortcode
add_shortcode('get_upload_url', 'getUploadUrl');


function remove_admin_bar_bump() {
    remove_action('wp_head', '_admin_bar_bump_cb');
}

add_action('get_header', 'remove_admin_bar_bump');


add_shortcode('wdm_my_subscription', 'wmd_my_custom_function');
function wmd_my_custom_function(){
   WCS_Template_Loader::get_my_subscriptions();
}



if ( ! function_exists( 'rrm_tags' ) ) {
	function rrm_tags(){
		$tags_list = get_the_tag_list( '', __( ', ', 'storefront' ) );
		if ( $tags_list ) :
		?>
<div class="single-content__tags">
    <span>Tags</span>
    <ul>
        <?php echo '<li>' . wp_kses_post( $tags_list ) . '</li>'; ?>
    </ul>
</div>
<?php
        endif;
	}
}

if ( ! function_exists( 'rrm_pagination' ) ) {
	function rrm_pagination(){
		?>
<div class="single-content__pagination">
    <?php
                $prev_text = '<div> &#171 </div><span>Publicacion anterior</span><span>%title</span>';
                $next_text = '<span>Publicacion siguiente</span><span>%title</span><div>  &#187 </div>';
                $args = array(
                    'next_text' => $next_text,
                    'prev_text' => $prev_text,
                );
                the_post_navigation( $args );
            ?>
</div>
<?php
	}
}

if ( ! function_exists( 'rrm_comment_custom_fields' ) ) {

	function rrm_comment_custom_fields($comment_fields){

		$commenter     = wp_get_current_commenter();
		
		$req   = get_option( 'require_name_email' );
		$html5 = 'html5' === $args['format'];

		// Define attributes in HTML5 or XHTML syntax.
		$required_attribute = ( $html5 ? ' required' : ' required="required"' );

		$comment_fields = 
		array(
			'author' => sprintf(
				'<p class="comment-form-author">%s</p>',
				sprintf(
					'<input id="author" name="author" type="text" placeholder="%s %s" value="%s" size="30" maxlength="245" autocomplete="name"%s />',
					__( 'Name' ),
					( $req ? '*' : '' ),
					esc_attr( $commenter['comment_author'] ),
					( $req ? $required_attribute : '' )
				)
			),
			'email'  => sprintf(
				'<p class="comment-form-email">%s</p>',
				sprintf(
					'<input id="email" name="email" %s placeholder="%s %s" value="%s" size="30" maxlength="100" aria-describedby="email-notes" autocomplete="email"%s />',
					( $html5 ? 'type="email"' : 'type="text"' ),
					__( 'Email' ),
					( $req ? '*' : '' ),
					esc_attr( $commenter['comment_author_email'] ),
					( $req ? $required_attribute : '' )
				)
			),
			'url'    => sprintf(
				'<p class="comment-form-url">%s</p>',
				sprintf(
					'<input id="url" name="url" %s placeholder="%s" value="%s" size="30" maxlength="200" autocomplete="url" />',
					( $html5 ? 'type="url"' : 'type="text"' ),
					__( 'Website' ),
					esc_attr( $commenter['comment_author_url'] )
				)
			),
    
		);

		return $comment_fields;
	}
}

//add_filter( 'comment_form_default_fields', 'rrm_comment_custom_fields', 15 );



$objChallengue = [
    'rango' => 3,
    'empiezaRango' => 3,
    0 => 'Rodador Bronce', 
    1 => 'Rodador Plata',
    2 => 'Rodador Oro',
    3 => 'Rodador Platinum',
    4 => 'Rodador Diamante',
    5 => 'Rodador Zafiro',
];

$objGalerias = [
    'rango' => 100,
    'empiezaRango' => 400,
    0 => 'Rodador Distinguido', 
    1 => 'Rodador Ultra',
    2 => 'Rodador Ilustre',
    3 => 'Rodador Legendario',
    4 => 'Rodador Mítico',
    5 => 'Rodador Mítico',
    6 => 'Rodador Cosmo',
];

function rangeValue($qty, $objRange) {
    $lastIndex = array_key_last($objRange);
    $qty = floor(($qty - $objRange['empiezaRango']) / $objRange['rango']);
    if ($qty >= $lastIndex)  return $objRange[$lastIndex];
    return $objRange[$qty] ?? '';
}

function magicTown($numTown){
    if($numTown >= 177) return 'Rodador Élite';
    if($numTown >= 160 && $numTown < 176) return 'Rorador Pro';
    if($numTown >= 132 && $numTown <= 159) return 'Rodador 132';
}

function rrm_tipo_rodador2($challengues, $galleries, $towns){
  global $objChallengue, $objGalerias;
  $tier = rangeValue($challengues, $objChallengue);
  $tier2 = rangeValue($galleries, $objGalerias);
  $tier3 = magicTown($towns);
  $ctier = "$tier $tier2 $tier3";
  if ($tier == '' && $tier2 == '' && $tier3 == '') {
    $ctier = "Rodador";
  }
  return ltrim($ctier);
}


// Función de acción para el hook 'profile_magic_registration_process'
function mi_funcion_profile_magic_registration_process($POST, $FILES, $SERVER, $gid, $fields, $user_id) {
   
    wp_redirect(site_url('cuenta-creada'));
    exit();

    // En este ejemplo, simplemente imprimimos los datos para verlos en el archivo de registro
    // error_log('Datos POST: ' . print_r($POST, true));
    // error_log('Datos FILES: ' . print_r($FILES, true));
    // error_log('Datos SERVER: ' . print_r($SERVER, true));
    // error_log('ID del grupo: ' . $gid);
    // error_log('Campos del formulario: ' . print_r($fields, true));
    // error_log('ID de usuario: ' . $user_id);
}

// Agrega nuestra función de acción al hook 'profile_magic_registration_process'
add_action('profile_magic_registration_process', 'mi_funcion_profile_magic_registration_process', 10, 6);


//======================================================================
// Delete User Post Gallery (Start)
//======================================================================

/*
 * El usuario borra un post de su galeria
*/

add_action('wp_ajax_delete_post_gallery', 'delete_post_gallery');
add_action('wp_ajax_nopriv_delete_post_gallery', 'delete_post_gallery');

function delete_post_gallery() {
    check_ajax_referer( 'rrm_delete_post_gallery', 'nonce' );
    global $wpdb;
    $post_id        = isset( $_POST['post_id'] ) ? absint( $_POST['post_id'] ) : 0;
    $user_id_logged = isset( $_POST['user_id_logged'] ) ? absint( $_POST['user_id_logged'] ) : 0;
    $wheelerId      = get_field( 'rodador', $post_id );

    $deleteStatusPost = false;

    //validar que el usuario que quiere borrar la publicacion sea el mismo que la publico
    if((int)$wheelerId == (int)$user_id_logged){
        $deleteStatusPost = wp_delete_post($post_id, false);
        if($deleteStatusPost){
            $results = $wpdb->get_results( $wpdb->prepare( "SELECT id FROM wphr_galerias_migration WHERE id_new = %d", $post_id ) );
            foreach ($results as $galeria) {
                $wpdb->query( $wpdb->prepare( "DELETE FROM wphr_galerias_migration WHERE id = %d", $galeria->id ) );
            }
        }
    }
    //exit();

    if($deleteStatusPost == null || $deleteStatusPost == false):
        $error = new WP_Error( '-2', 'No se ha podido borrar el post' );
        wp_send_json_error( $error );
    else:
        wp_send_json_success( "Se ha borrado correctamente");
    endif;
   
    wp_die(); // Finaliza el proceso AJAX
}

//======================================================================
// Delete User Post Gallery (End)
//======================================================================

add_action('wp_ajax_filtered_options_upload_photo', 'filtered_options_upload_photo'); // Para usuarios autenticados
add_action('wp_ajax_nopriv_filtered_options_upload_photo', 'filtered_options_upload_photo');

function filtered_options_upload_photo(){
    check_ajax_referer( 'rrm_filtered_options_upload_photo', 'nonce' );

    $id_desafio = isset( $_POST['challengue_id'] ) ? absint( $_POST['challengue_id'] ) : 0;
    // Se necesita el id del desafio
    //var_dump($id_desafio);
    if (is_user_logged_in()) {
        //Obtener el id del usuario logueado
        $current_user = wp_get_current_user();

        //Obtener los posts del usuario logueado filtrados por el id del desafio
        $args = array(
            'post_type' => 'galerias', // Reemplaza 'nombre_del_custom_post' con el nombre de tu Custom Post Type
            'author'    => $current_user->ID, // Filtrar por el ID del usuario actual
            'posts_per_page' => -1, // Obtener todas las entradas del usuario
            'post_status' => array( 'publish','pending' ),
            'meta_query' => array(
                array(
                    'key' => 'reto', 
                    //'value' => 184863, 
                    'value' => $id_desafio, // Agregar el ID del desafio
                    'compare' => '='
                ),
            ),
        );

        $arrayCollection = array();
        $arrayCollection2 = array();

        $query = new WP_Query($args);
        if ($query->have_posts()) {
            while ($query->have_posts()) {
                $query->the_post();
                
                $arrayTerms = array();
                $parent_term = wp_get_post_terms( get_the_ID(), "destinos", array( 'parent' => 0, 'hide_empty' => false) );
                $child_term = wp_get_post_terms( get_the_ID(), "destinos", array( 'parent' => $parent_term[0]->term_id, 'hide_empty' => false) );
                
                $arrayTerms = array(
                    "parent_term" => $parent_term[0]->term_id,
                    "children_term" => $child_term[0]->term_id
                );
                $arrayCollection[] = $arrayTerms;
            }
        }

        // echo "<pre>";
        // echo "<span style='color:white'>";
        // var_dump($arrayCollection);
        // echo "</pre>";

        // Obtener todos los terms del desafio
        $post_id = $id_desafio;
        //$post_id = 184863;
        $taxonomy = 'destinos';
        $terms = wp_get_post_terms($post_id, $taxonomy);

        foreach ($terms as $term) {
            $parent_term = "";
            $child_term = "";
            if ($term->parent == 0) {
                $parent_term = $term->term_id;
                $child_terms = wp_get_post_terms( $post_id, "destinos", array( 'parent' => $parent_term, 'hide_empty' => false) );

                foreach($child_terms as $child_term){
                    $child_term = $child_term->term_id;
                    $arrayTerms2 = array(
                        "parent_term" => $parent_term,
                        "children_term" => $child_term
                    );
                    $arrayCollection2[] = $arrayTerms2;
                }
                
            } 
            
        }


        // echo "<pre>";
        // echo "<span style='color:white'>";
        // var_dump($arrayCollection2);
        // echo "</pre>";

        // Eliminar los terms que ya pertenezcan a un post del usuario
        $remaining_terms = $arrayCollection2;

        // Iterar sobre el primer array para comparar y eliminar los términos coincidentes
        foreach ($arrayCollection as $term1) {
            foreach ($remaining_terms as $key => $term2) {
                if ($term1['parent_term'] === $term2['parent_term'] && $term1['children_term'] === $term2['children_term']) {
                    unset($remaining_terms[$key]);
                }
            }
        }

        $remaining_terms = array_values($remaining_terms);

        // echo "<pre>";
        // echo "<span style='color:white'>";
        // var_dump($remaining_terms);
        // echo "</pre>";
        
        // Formatear el arreglo para mostrar en el front
        $grouped_terms = array();

        foreach ($remaining_terms as $term) {
            $parent = $term['parent_term'];
            $child = $term['children_term'];
        
            // Si el término padre no existe en el array agrupado, inicialízalo
            if (!isset($grouped_terms[$parent])) {
                $grouped_terms[$parent] = array(
                    'name' => get_term( $parent )->name,
                    'children' => array()
                );
            }
            
            // Añadir el término hijo al array del término padre
            $grouped_terms[$parent]['children'][] = array(
                //'index' => count($grouped_terms[$parent]), // Añadir índice
                'name' => get_term( $child )->name,
                'term_id' => $child
            );
        }

        // echo "<pre>";
        // echo "<span style='color:white'>";
        // var_dump($grouped_terms);
        // echo "</pre>";

        echo json_encode( $grouped_terms );
    }
    else{
        return false;
    }

    // Termina la ejecución del script
    wp_die();
}

function filtered_challengues_upload_photo(){

    if (is_user_logged_in()) {
        //Obtener el id del usuario logueado
        $current_user = wp_get_current_user();

        //var_dump(progressChallengue($current_user->ID)[1]);

        if(!empty(completedChallengueByAdmin($current_user->ID))):
            // Comente esta linea por que hay un caso en el que ya se subieron todos los post para completar el progreso, 
            // pero como el admin no le ha dado check, no se toma como completado, aunque ya tenga los posts con todos las 
            // combinaciones de destinos, el select de estado saldría vacio
            //$completedChallengues = array_intersect(completedChallengueByAdmin($current_user->ID), progressChallengue($current_user->ID)[1]);
            $completedChallengues = progressChallengue($current_user->ID)[1];
        endif;

        return $completedChallengues;
    }

}

//======================================================================
// BAC Instructions (Start)
//======================================================================

/*
 * Modificar instrucciones en el thankyou page cuando el usuario hace una compra mediante transferencia directa
*/

add_action('woocommerce_thankyou_bacs', 'custom_thankyou_bacs_instructions', 10, 1);

function custom_thankyou_bacs_instructions($order_id) {
    
    $bacs_gateway = new WC_Gateway_BACS();
    $bacs_description = $bacs_gateway->get_description();
    echo "<div class='bacs_instructions'>";
    echo "<h2>Instrucciones de pago</h2>";
    echo "<p>".$bacs_description."</p>";
    echo "</div>";
}

//======================================================================
// BAC Instructions (End)
//======================================================================

//======================================================================
// Local Pickup Instructions (Start)
//======================================================================

/*
 * Agregar instrucciones cuando el usuario utiliza la opcion de recolección local
*/

function mx_local_pickup_instructions_order_email( $order, $sent_to_admin, $plain_text, $email ) {
    // Only for processing and completed email notifications to customer
    if ($email->id == 'customer_on_hold_order' || 'customer_completed_order' == $email->id || 'customer_processing_order' == $email->id) {
        foreach( $order->get_items('shipping') as $shipping_item ){
            $shipping_rate_id = $shipping_item->get_method_id();
            $method_array = explode(':', $shipping_rate_id );
            $shipping_method_id = reset($method_array);
            
            //error_log('$shipping_method_id: '.$shipping_method_id);
            if( 'local_pickup' == $shipping_method_id ){
                $titulo_direction_pickup_store= get_field('titulo_direction_pickup_store',546);
                $instrucciones_direction_pickup_store = get_field('instrucciones_direction_pickup_store',546);
                $calle_direction_pickup_store = get_field('calle_direction_pickup_store',546);
                $colonia_direction_pickup_store = get_field('colonia_direction_pickup_store',546);
                $colonia_direction_pickup_store = get_field('colonia_direction_pickup_store',546);
                $ciudad_direction_pickup_store = get_field('ciudad_direction_pickup_store',546);
                $estado_direction_pickup_store = get_field('estado_direction_pickup_store',546);
                $url_google_maps_direction_pickup_store = get_field('url_google_maps_direction_pickup_store',546);
                $texto_direction_enlace_google_maps = get_field('texto_direction_enlace_google_maps',546);

            ?><h2><?php echo esc_html( $titulo_direction_pickup_store ); ?></h2>
            <p><?php echo wp_kses_post( $instrucciones_direction_pickup_store ); ?></p>
            <p>
                <?php echo esc_html( $calle_direction_pickup_store ); ?><br/>
                <?php echo esc_html( $colonia_direction_pickup_store ); ?><br/>
                <?php echo esc_html( $ciudad_direction_pickup_store . ',' . $estado_direction_pickup_store ); ?><br/><br/>
            </p>
            <p><a href="<?php echo esc_url( $url_google_maps_direction_pickup_store ); ?>" target="_blank"><?php echo esc_html( $texto_direction_enlace_google_maps ); ?></a></p>
            <?php
            }
        }
    }
}
add_action( 'woocommerce_email_after_order_table', 'mx_local_pickup_instructions_order_email', 10, 4 );

//======================================================================
// Local Pickup Instructions (End)
//======================================================================


//======================================================================
// Add phone shipping address from checkout (Start)
//======================================================================

/*
 * Agregar campo telefono en el checkout
*/

function custom_override_checkout_fields($fields) {
    // Agregar el campo de teléfono en los datos de envío
    $fields['shipping']['shipping_phone'] = array(
        'label'       => __('Teléfono', 'woocommerce'),
        'required'    => true,
        'class'       => array('form-row-wide'),
        'clear'       => true,
        'priority'    => 90,
        'type'        => 'tel',
        'validate'    => array('phone')
    );
    
    return $fields;
}

add_filter('woocommerce_checkout_fields', 'custom_override_checkout_fields');

function custom_validate_shipping_phone_field() {
    if (isset($_POST['shipping_phone']) && !empty($_POST['shipping_phone'])) {
        if (!preg_match('/^\+?\d{10,15}$/', $_POST['shipping_phone'])) {
            wc_add_notice(__('Por favor, introduce un número de teléfono válido.'), 'error');
        }
    }
}

add_action('woocommerce_checkout_process', 'custom_validate_shipping_phone_field');


//======================================================================
// Add phone shipping address from checkout (End)
//======================================================================


//======================================================================
// Remove billing address from checkout (Start)
//======================================================================

/*
 * Quitar los campos de dirección de facturación en el checkout
*/


add_filter('woocommerce_checkout_fields', 'custom_remove_billing_fields');

function custom_remove_billing_fields($fields) {
    // Aquí puedes agregar los campos que deseas eliminar
    if (is_user_logged_in()) {
        unset($fields['billing']['billing_first_name']);
        unset($fields['billing']['billing_last_name']);
        unset($fields['billing']['billing_company']);
        unset($fields['billing']['billing_address_1']);
        unset($fields['billing']['billing_address_2']);
        unset($fields['billing']['billing_city']);
        unset($fields['billing']['billing_postcode']);
        unset($fields['billing']['billing_country']);
        unset($fields['billing']['billing_state']);
        unset($fields['billing']['billing_phone']);
        unset($fields['billing']['billing_email']);
        return $fields;
    }
    else{
        unset($fields['billing']['billing_first_name']);
        unset($fields['billing']['billing_last_name']);
        unset($fields['billing']['billing_company']);
        unset($fields['billing']['billing_address_1']);
        unset($fields['billing']['billing_address_2']);
        unset($fields['billing']['billing_city']);
        unset($fields['billing']['billing_postcode']);
        unset($fields['billing']['billing_country']);
        unset($fields['billing']['billing_state']);
        unset($fields['billing']['billing_phone']);
        return $fields;
    }
}

//======================================================================
// Remove billing address from checkout (Start)
//======================================================================


//======================================================================
// Instructions of user if request bill (Start)
//======================================================================

/*
 * Como se quito la dirección de facturación, se agregaron instrucciones para el cliente
*/


function custom_text_after_shipping_address() {
    $contact_text = get_field('texto_request_bill',546);
    //$contact_email = get_field('texto_solicitar_factura',546);
    echo '<p class="request_bill">'.$contact_text.'</p>';
}
add_action('woocommerce_after_checkout_shipping_form', 'custom_text_after_shipping_address');


//======================================================================
// Instructions of user if request bill (End)
//======================================================================


function my_custom_comment_form_defaults( $defaults ) {
    $defaults['must_log_in'] = '<p class="must-log-in">' . sprintf(
        __( 'You must be <a href="%s">logged in</a> to post a comment.' ),
        home_url('/iniciar-sesion')
    ) . '</p>';
    return $defaults;
}
add_filter( 'comment_form_defaults', 'my_custom_comment_form_defaults' );

//======================================================================
// Validation comments for challengues (Start)
//======================================================================

/*
 * Se valida que los comentarios esten restringidos para los posts desafios
*/

function restrict_comments_to_logged_in_users($open, $post_id) {
    $post = get_post($post_id);

    if ($post->post_type == 'desafios') {
        if (!is_user_logged_in()) {
            return false;
        }
    }

    return $open;
}
add_filter('comments_open', 'restrict_comments_to_logged_in_users', 10, 2);

//======================================================================
// Validation comments for challengues (End)
//======================================================================


function custom_comments_closed_message($comments_template) {
    global $post;

    if ($post->post_type == 'desafios' && !comments_open($post->ID) && !is_user_logged_in()) {
        echo '<div id="comment-respond-custom" class="comment-respond"><p class="must-log-in">' . sprintf(
            __( 'You must be <a href="%s">logged in</a> to post a comment.' ),
            home_url('/iniciar-sesion')
        ) . '</p></div>';
    } else {
        // Dejar que WordPress maneje los comentarios cerrados para otros post types
        return $comments_template;
    }
}

// Agregar la función al filtro 'comments_template'
function add_custom_comments_closed_message() {
    if (!is_admin()) {
        add_filter('comments_template', 'custom_comments_closed_message');
    }
}
add_action('wp', 'add_custom_comments_closed_message');



//======================================================================
// Fixed format email moderate comments (Start)
//======================================================================

/*
 * Se corrige el problema del formato del cuerpo del correo cuando se pide permiso para aprobar un comentario
*/

function custom_comment_moderation_text($notify_message, $comment_id) {
    $comment = get_comment($comment_id);
    $post = get_post($comment->comment_post_ID);

    $notify_message = sprintf(
        __('A new comment on the post "%s" is waiting for your approval'),
        $post->post_title
    ) . "<br />";

    $notify_message .= sprintf(__('Author: %s'), $comment->comment_author) . "<br />";
    $notify_message .= sprintf(__('Email: %s'), $comment->comment_author_email) . "<br />";
    $notify_message .= sprintf(__('URL: %s'), $comment->comment_author_url) . "<br />";
    $notify_message .= sprintf(__('Comment: %s'), $comment->comment_content) . "<br />";

    $notify_message .= sprintf(__('Approve it: %s'), admin_url("comment.php?action=approve&c=$comment_id")) . "<br />";
    $notify_message .= sprintf(__('Trash it: %s'), admin_url("comment.php?action=trash&c=$comment_id")) . "<br />";
    $notify_message .= sprintf(__('Spam it: %s'), admin_url("comment.php?action=spam&c=$comment_id")) . "<br />";

    return $notify_message;
}
add_filter('comment_moderation_text', 'custom_comment_moderation_text', 10, 2);

//======================================================================
// Fixed format email moderate comments (End)
//======================================================================


add_action('woocommerce_before_checkout_form', 'check_user_shipping_address');

function check_user_shipping_address() {
    if (is_user_logged_in()) {
        $user_id = get_current_user_id();
        $shipping_address_1 = get_user_meta($user_id, 'shipping_address_1', true);
        $shipping_city = get_user_meta($user_id, 'shipping_city', true);
        $shipping_postcode = get_user_meta($user_id, 'shipping_postcode', true);
        $shipping_country = get_user_meta($user_id, 'shipping_country', true);
        $shipping_state = get_user_meta($user_id, 'shipping_state', true);

        $has_complete_shipping_address = ($shipping_address_1 && $shipping_city && $shipping_postcode && $shipping_country && $shipping_state) ? 'true' : 'false';

        echo '<script type="text/javascript">
                let hasCompleteShippingAddress = ' . json_encode($has_complete_shipping_address) . ';
              </script>';
    

    }
}

add_action('template_redirect', 'pmg_redirect_if_not_logged_in');

function pmg_redirect_if_not_logged_in() {

    

    // URL base de la página de perfiles
    $profile_page_base_url = 'mi-perfil';

    $user_current_id = get_current_user_id();
    //$vip = wc_memberships_is_user_active_member($user_id, 'vip-membership');
    
    $can_user_access_content = 0;
    if (!can_user_access_content($user_current_id, 10)) :
        $can_user_access_content = 1;
    endif; 
    //var_dump($can_user_access_content);
    
    // Verificar si el usuario no está logueado y la URL contiene el parámetro uid
    if (!is_user_logged_in() && is_page($profile_page_base_url) && isset($_GET['uid'])) {
        wp_redirect('contenido-restringido');
        exit;
    }
    // Validación: Los free no pueden ver ningun perfil que no sea suyo
    // https://rodandorutasmagicas.com/www/mi-perfil/?uid=11455

    // Si estas logueado
    // Si eres free
    // Y Si estas visitando un perfil que no es el tuyo
    // elseif(is_user_logged_in() && !$vip && ($user_current_id != getUserId())){
    //     wp_redirect('contenido-exclusivo');
    //     exit;
    // }
    elseif(is_user_logged_in() && !$can_user_access_content && ($user_current_id != getUserId())){
        wp_redirect('contenido-exclusivo');
        exit;
    }

    //$user_id = get_current_user_id(); 
    
   
    
}

function rrm_validate_membership(){
    $isVipMembership = 0;
    if ( function_exists( 'wc_memberships' ) ) : 
        $user_id = get_current_user_id(); 

        //$isVipMembership = wc_memberships_is_user_active_member($user_id, 'vip-membership');
    endif;
    return $isVipMembership;
}

// add_filter('woocommerce_checkout_fields', 'woocommerce_checkout_fields');

// function woocommerce_checkout_fields($fields) {

//     $fields['account']['account_username']['label'] = __( 'Email', 'woocommerce' );
//     $fields['account']['account_username']['placeholder'] = __( 'Email', 'woocommerce' );

//     return $fields;
// }


//======================================================================
// Remove duplicated title on single product (Start)
//======================================================================

/*
 * Se corrige el problema del formato del cuerpo del correo cuando se pide permiso para aprobar un comentario
*/

remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_title', 5 );


//======================================================================
// Remove duplicated title on single product (End)
//======================================================================

// function custom_search_query( $query ) {
//     if ( !is_admin() && $query->is_search() && $query->is_main_query() ) {
//         // Añadir 'product' y 'post' al tipo de post en la consulta de búsqueda
//         $query->set( 'post_type', array( 'product', 'post' ) );
//     }
// }
// add_action( 'pre_get_posts', 'custom_search_query' );

//======================================================================
// Filter Search  (Start)
//======================================================================

function limit_search_to_post_and_product( $query ) {
    if ( !is_admin() &&  $query->is_search() ) {
        // Limitar la búsqueda a entradas y productos
        $query->set( 'post_type', array( 'post', 'product' ) );
    }
}
add_action( 'pre_get_posts', 'limit_search_to_post_and_product' );

//======================================================================
// Filter Search  (End)
//======================================================================


// function remove_page_from_query_string($query_string)
// { 
//     if ($query_string['name'] == 'page' && isset($query_string['page'])) {
//         unset($query_string['name']);
//         $query_string['paged'] = $query_string['page'];
//     }      
//     return $query_string;
// }
// add_filter('request', 'remove_page_from_query_string');

// function custom_archive_query( $query ) {
//     if ( $query->is_archive() && $query->is_main_query() && !is_admin() ) {
//         $query->set( 'post_type', 'post' ); // Asegúrate de que solo incluya publicaciones
//     }
// }
// add_action( 'pre_get_posts', 'custom_archive_query' );
