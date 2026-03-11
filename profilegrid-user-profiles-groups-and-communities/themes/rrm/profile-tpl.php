<?php $pmhtmlcreator = new PM_HTML_Creator($this->profile_magic,$this->version);
$pmrequests = new PM_request;
$pagenum = filter_input(INPUT_GET, 'pagenum');
$rid = filter_input(INPUT_GET,'rid');
$pagenum = isset($pagenum) ? absint($pagenum) : 1;
$group_page_link = $pmrequests->profile_magic_get_frontend_url('pm_group_page','');

$pm_sanitizer = new PM_sanitizer;
$post_obj = $pm_sanitizer->sanitize($_POST);

$homeURL = home_url( '' );

if(!empty($gid))
{
    $primary_gid = $pmrequests->pg_get_primary_group_id($gid);
    $group_page_link = $pmrequests->profile_magic_get_frontend_url('pm_group_page','',$primary_gid);
    //$group_page_link = add_query_arg( 'gid',$primary_gid,$group_page_link );
    $groupinfo = $dbhandler->get_row('GROUPS',$primary_gid);
    $group_leader = maybe_unserialize($groupinfo->group_leaders);
}
else
{
    $gid='';
    $primary_gid = '';
}


$idUser = 0;
// $user_info = get_userdata($current_user->ID);
// $avatar_url = get_avatar( $user_info->user_email,50,'',false,array('class'=>'pm-user','force_display'=>true) );
// echo "<pre style='color: white'>";
// var_dump($uid);
// echo "</pre>";

$idUser = $uid != $current_user->ID ? $current_user->ID : $uid;
//echo $uid;
isUserLoggedIn($uid);


$argsGenerales = array(
    'numberposts' => 1,
    'post_type'   => 'generales',
    'order'     => 'ASC',
);
$generales = get_posts($argsGenerales);
if ($generales) : foreach ($generales as $general) :
    $duracion_modal_informacion_usuario = get_post_meta( $general->ID, 'duracion_modal_informacion_usuario', true );
    //var_dump($duracion_modal_informacion_usuario);
endforeach;
wp_reset_postdata();
endif;

// $args = array( 
//     'status' => array( 'active' ),
// );  

// $memberships_info = wc_memberships_get_user_active_memberships($idUser, $args);

// $args = array( 
//     'status' => array( 'active' ),
// );  
// $memberships_info = wc_memberships_get_user_active_memberships($user_id, $args);

// echo "<pre style='color:white;' >";
// var_dump($memberships_info);
// var_dump($memberships_info[0]->plan_id);
// var_dump($memberships_info[0]->status);
// echo "</pre>";

//echo "user_meta_privacy".get_user_meta($idUser, 'pm_profile_privacy', true);

// $plans = wc_memberships_get_membership_plans();

// // set a flag
// $active_member = array();

// // check if the member has an active membership for any plan
// foreach ( $plans as $plan ) {
//     $active = wc_memberships_is_user_active_member( get_current_user_id(), $plan );
//     array_push( $active_member, $active );
// }

// echo "<pre style='color:white;' >";
// var_dump($active_member);
// echo '</pre>';

//var_dump(getAvalaiblesDestinosPlanMember(get_current_user_id()));

?>

<?php
    $genres = get_field_object('field_65c1ef928b6af')['choices'];
    $styles = get_terms(array(
        'taxonomy' => 'estilo', // nombre de la taxonomía
        'hide_empty' => false, // mostrar términos incluso si no tienen posts asociados
    ));
    $brands = get_terms(array(
        'taxonomy' => 'marca', // nombre de la taxonomía
        'hide_empty' => false, // mostrar términos incluso si no tienen posts asociados
    ));
    $belongsToClubs = get_field_object('field_65c1f0448b6b3')['choices'];
    $numberMembersClub = get_field_object('field_65c1f0948b6b6')['choices'];
    $arrayDate = array_reverse(explode('/',esc_attr(get_field('fecha_de_nacimiento', 'user_'. $uid )),3));
    $arrayDateFormat = trim($arrayDate[0] . '-' . $arrayDate[1] . '-' . $arrayDate[2]);
?>

<?php if($uid == $current_user->ID) : ?>
<input type="hidden" value="true" id="is_user_logged_profile">
<?php else: ?>
<input type="hidden" value="false" id="is_user_logged_profile">
<?php endif; ?>
<div class="pmagic">
    <?php //echo __("hola",'storefront'); ?>
    <!-----Operationsbar Starts----->
    <div class="pm-group-view pm-dbfl">

        <?php if($dbhandler->get_global_option_value('pm_show_profile_cover_image','1')=='1' || $dbhandler->get_global_option_value('pm_show_profile_image','1')=='1' || $dbhandler->get_global_option_value('pm_show_user_display_name','1')=='1' || $dbhandler->get_global_option_value('pm_show_user_group_name','1')=='1' || $dbhandler->get_global_option_value('pm_show_user_group_badges','1')=='1') : ?>
        <div class="pm-header-section">
            <!-- cover page -->
            <?php if($dbhandler->get_global_option_value('pm_show_profile_cover_image','1')=='1'): ?>
            <div class="pm-cover-image pm-dbfl" <?php if($uid != $current_user->ID) echo 'id="pm-show-cover-image"';?>>
                <?php 
          echo wp_kses_post($pmrequests->profile_magic_get_cover_image($user_info->ID,'pm-cover-image'));
          ?>
                <?php if($uid == $current_user->ID && $dbhandler->get_global_option_value('pm_show_change_profile_cover_image_option','1')=='1'):?>
                <div class="pm-bg-dk pg-profile-change-img dbfl" id="pm-coverimage-mask">
                    <div id="pm-change-cover-image" class="pg-item-image-change" data-toggle="modal"
                        data-target="#upload-cover-image">
                        <i class="fa fa-camera-retro" aria-hidden="true"></i>
                        <?php esc_html_e('Update Cover Image','profilegrid-user-profiles-groups-and-communities');?>
                    </div>
                </div>
                <?php endif;?>
            </div>
            <?php else:?>
            <div class="pm-cover-image pm-no-cover-image pm-dbfl"
                <?php if($uid != $current_user->ID) echo 'id="pm-show-cover-image"';?>></div>
            <?php endif; ?>
            <!-- header section -->
            <div class="pm-profile-title-header">
                <?php echo wp_kses_post($pmrequests->pm_show_profile_image_profile_page($uid, $current_user->ID, $user_info));?>
                <div class="profile-title">
                    <?php if($dbhandler->get_global_option_value('pm_show_user_display_name','1')=='1'): ?>
                    <div class="profile__user-name">
                        <?php echo wp_kses_post($pmrequests->pm_get_display_name($uid,true));?>
                        <?php if(rrm_is_active_user($uid)): ?>
                        <img src="<? echo get_template_directory_uri().'/assets/images/hall_of_fame/verified.svg'; ?>"
                            alt="">
                        <?php endif; ?>
                    </div>
                    <?php endif;?>
                    <div class="profile-biker-level">
                        <!-- Rodador Elite -->
                        <?php echo rrm_user_level($uid)['level']; ?>
                        <?php //echo rrm_tipo_rodador2(15, 1001, 177); ?>
                    </div>

                    <?php //if(!empty($gid) && $dbhandler->get_global_option_value('pm_show_user_group_name','1')=='1'):?>
                    <!-- <div class="pm-user-group-name pm-dbfl pm-clip">
              <a href='<?php //echo esc_url($group_page_link ); ?>'>
                  <i class="fa fa-users" aria-hidden="true"></i>
                  <?php //echo wp_kses_post($groupinfo->group_name);?>
              </a>
               <?php //$total_assign_group = count(array_unique($gid));if(!empty($gid) && is_array($gid) && $total_assign_group >1):?>
              <?php //if($total_assign_group>2){ $group_count_String = esc_html__('more groups','profilegrid-user-profiles-groups-and-communities');}else{$group_count_String = esc_html__('more group','profilegrid-user-profiles-groups-and-communities');} ?>
              <div class="pg-more-groups"><a onclick="pg_open_group_tab()">+<?php //echo wp_kses_post(count(array_unique($gid))-1 .' '.$group_count_String); ?> </a></div>
               <?php //endif;?>
               <a></a> 
               
          </div> -->
                    <?php //endif;?>
                    <?php //do_action('profile_magic_show_additional_header_info',$uid);?>
                </div>
                <?php //do_action('profile_magic_show_additional_header_info2',$uid);?>
                <!-- <div class="pm-group-icon pm-difr pm-pad10">
              
        <?php //if(!empty($gid) && $dbhandler->get_global_option_value('pm_show_user_group_badges','1')=='1'):?>
            <div id="pg-group-badge">
                <div id="pg-group-badge-dock">
                 <?php //$pmrequests->pg_get_user_groups_badge_slider($uid);?>
                </div>
            </div> 
        <?php //endif;?>    
              
        
    
            
          </div> -->
                <?php 
            
            if($uid == $current_user->ID): ?>
                <div class="pm-buttons desktop">
                    <div class="share">
                        <i class="icon-share"></i>
                        <div class="map__share-social">
                            <div class="fb-share-button-custom"
                                data-href="<?php echo $homeURL.'/mi-perfil/?uid='.$idUser; ?>">
                                <i class="icon-fb-icon-fill"></i>
                                <span>Facebook</span>
                            </div>
                            <?php
                                $shareTitle =  get_field('titulo_compartir_mapa', 546);
                                $shareDescription =  get_field('descripcion_compartir_mapa', 546);
                            ?>
                            <div class="twitter-share-button-custom"
                                data-href="https://twitter.com/intent/tweet?url=<?php echo urlencode(get_permalink().'mi-perfil/?uid='.$idUser); ?>"
                                data-text="<?php echo $shareTitle ?>"
                                data-description="<?php echo $shareDescription ?>">
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
                            <a href="https://web.whatsapp.com/send?text=<?php echo urlencode($homeURL.'/mi-perfil/?uid='.$idUser); ?>"
                                target="_blank">
                                <i class="icon-whatsapp"></i>
                                <span>whatsApp</span>
                            </a>
                        </div>
                    </div>
                    <a class="button-upload" href="#upload-challengue" data-backdrop="static" data-keyboard="false"
                        data-toggle="modal">
                        <i class="icon-uploadpic"></i>
                        Subir una foto
                    </a>
                    <a href="#" class="button-settings">
                        <i class="icon-settings"></i>
                        <span>Ajustes de la cuenta</span>
                    </a>
                </div>
                <?php endif; ?>
            </div>

            <?php if($uid == $current_user->ID): ?>
            <div class="pm-buttons mobile">
                <a class="button-upload" href="#upload-challengue" data-backdrop="static" data-keyboard="false"
                    data-toggle="modal">
                    <i class="icon-uploadpic"></i>
                    Subir una foto
                </a>
                <a href="#" class="button-settings">
                    <i class="icon-settings"></i>
                    <span>Ajustes de la cuenta</span>
                </a>
            </div>
            <?php endif; ?>
        </div>
        <?php endif; ?>

        <input type="hidden" id="duration_modal_information_user"
            value="<?php echo $duracion_modal_informacion_usuario; ?>">
        <div id="modalMessage" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body" id="serviceModalMultiStep">
                        <button type="button" class="modal-close" data-dismiss="modal" aria-hidden="true">
                            <i class="icon-close"></i>
                        </button>
                        <div>
                            Se ha eliminado correctamente
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Bootstrap Modal MultiStep -->
        <!-- <a href="#modalMultiStep" role="button" class="btn btn-default btn-lg trigger" data-backdrop="static" data-keyboard="false" data-toggle="modal">Open Modal</a> -->
        <div id="modalMultiStep" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body" id="serviceModalMultiStep">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <div class="modal-intro">
                            <?php $titleCompleteProfile =  get_field('titulo_completar_perfil', 546); ?>
                            <h2><?php echo $titleCompleteProfile; ?></h2>
                            <!-- <p>
                                Esto permitirá disponer de un lugar para almacenar las fotos de tus recorridos en moto
                                y completar los desafíos para ganar medallas y parches.
                            </p> -->
                            <?php $textCompleteProfile =  get_field('texto_completar_perfil', 546); ?>
                            <?php echo wpautop($textCompleteProfile ); ?>
                        </div>
                        <!-- Tab Content -->
                        <form action="" method="post" id="update-profile__form-modal" class="update-profile__form">
                            <div class="tab-content">

                                <!-- Tab 1 -->
                                <div class="tab-pane fade show active" id="step1">
                                    <?php //echo do_shortcode( '[profilegrid_account_options] '); ?>

                                    <div class="update-profile">
                                        <div class="update-profile__form-content">
                                            <div class="update-profile__form-input">
                                                <div class="update-profile__container">
                                                    <div class="update-profile__field-label">
                                                        <label for="update_first_name">Nombre de usuario<sup
                                                                class="pm_estric">*</sup></label>
                                                    </div>
                                                    <div class="update-profile__field-input">
                                                        <input type="text" class="update-profile__field-input"
                                                            id="update_user_login" name="update_user_login"
                                                            value="<?php echo esc_attr($current_user->user_login);?>"
                                                            disabled="disabled">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="update-profile__form-input">
                                                <div class="update-profile__container">
                                                    <div class="update-profile__field-label">
                                                        <label for="update_first_name">Correo eletrónico<sup
                                                                class="pm_estric">*</sup></label>
                                                    </div>
                                                    <div class="update-profile__field-input">
                                                        <input type="text" class="update-profile__field-input"
                                                            id="update_email" name="update_email"
                                                            value="<?php echo esc_attr($current_user->user_email);?>"
                                                            disabled="disabled">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="update-profile__form-input">
                                                <div class="update-profile__container">
                                                    <div class="update-profile__field-label">
                                                        <label for="update_first_name">Nombre<sup
                                                                class="pm_estric">*</sup></label>
                                                    </div>
                                                    <div class="update-profile__field-input">
                                                        <input type="text" class="update-profile__field-input"
                                                            id="update_first_name" name="update_first_name"
                                                            value="<?php echo esc_attr(get_field('first_name', 'user_'. $uid ));?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="update-profile__form-input">
                                                <div class="update-profile__container">
                                                    <div class="update-profile__field-label">
                                                        <label for="update_last_name">Apellido(s)<sup
                                                                class="pm_estric">*</sup></label>
                                                    </div>
                                                    <div class="update-profile__field-input">
                                                        <input type="text" class="update-profile__field-input"
                                                            id="update_last_name" name="update_last_name"
                                                            value="<?php echo esc_attr(get_field('last_name', 'user_'. $uid ));?>">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="update-profile__form-input">
                                                <div class="update-profile__container">
                                                    <div class="update-profile__field-label">
                                                        <label for="update_date_birth">Fecha de nacimiento<sup
                                                                class="pm_estric">*</sup></label>
                                                    </div>
                                                    <div class="update-profile__field-input">
                                                        <input type="date" class="update-profile__field-input"
                                                            id="update_date_birth" name="update_date_birth"
                                                            value="<?php echo $arrayDateFormat;?>">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="update-profile__form-input">
                                                <div class="update-profile__container">
                                                    <div class="update-profile__field-label">
                                                        <label for="update_facebok">Facebook</label>
                                                    </div>
                                                    <div class="update-profile__field-input">
                                                        <input type="text" class="update-profile__field-input"
                                                            id="update_facebook" name="update_facebook"
                                                            value="<?php echo esc_attr(get_field('facebook', 'user_'. $uid ));?>">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="update-profile__form-input text-area">
                                                <div class="update-profile__container">
                                                    <div class="update-profile__field-label">
                                                        <label for="update_style">Información Biográfica</label>
                                                    </div>
                                                    <div class="update-profile__field-select">
                                                        <textarea name="update_bio_info" id="update_bio_info" cols="30"
                                                            rows="5"><?php echo wp_kses_post(get_user_meta($uid, 'description', true)); ?></textarea>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                        </form>
                    </div>
                </div>

                <!-- Tab 2 -->
                <div class="tab-pane fade" id="step2">
                    <div class="update-profile">
                        <div class="update-profile__form-content">
                            <div class="update-profile__form-input">
                                <div class="update-profile__container">
                                    <div class="update-profile__field-label">
                                        <label for="update_facebok">Web</label>
                                    </div>
                                    <div class="update-profile__field-input">
                                        <input type="url" novalidate="novalidate" class="update-profile__field-input"
                                            id="update_web" name="update_web"
                                            value="<?php echo esc_url(get_userdata($uid)->user_url); ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="update-profile__form-input">
                                <div class="update-profile__container">
                                    <div class="update-profile__field-label">
                                        <label for="update_style">Género</label>
                                    </div>
                                    <div class="update-profile__field-select">
                                        <select id="update_genre" name="update_genre">
                                            <option value="n">Seleccionar una opción:</option>
                                            <?php 
                                                                foreach ($genres as $index => $genre) :
                                                                    echo "<option value='".$index."' ";
                                                                    if($index === esc_attr(get_field('genero', 'user_'. $uid ))):
                                                                        echo "selected";
                                                                    endif;
                                                                    echo ">".$genre."</option>";
                                                                endforeach;
                                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="update-profile__form-input">
                                <div class="update-profile__container">
                                    <div class="update-profile__field-label">
                                        <label for="update_facebok">Estilo</label>
                                    </div>
                                    <div class="update-profile__field-select">
                                        <select id="update_style" name="update_style">
                                            <?php 
                                                                foreach ($styles as $term => $style) :
                                                                    echo "<option value='".$style->term_id."' ";
                                                                    if((int)$style->term_id === (int)esc_attr(get_field('estilo', 'user_'. $uid ))):
                                                                        echo "selected";
                                                                    endif;
                                                                    echo ">". esc_html($style->name) ."</option>";
                                                                endforeach;
                                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="update-profile__form-input">
                                <div class="update-profile__container">
                                    <div class="update-profile__field-label">
                                        <label for="update_facebok">Marcas</label>
                                    </div>
                                    <div class="update-profile__field-select">
                                        <select id="update_brand" name="update_brand">
                                            <?php 
                                                                foreach ($brands as $term => $brand) :
                                                                    echo "<option value='".$brand->term_id."' ";
                                                                    if((int)$brand->term_id === (int)esc_attr(get_field('marca', 'user_'. $uid ))):
                                                                        echo "selected";
                                                                    endif;
                                                                    echo ">". esc_html($brand->name) ."</option>";
                                                                endforeach;
                                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="update-profile__form-input">
                                <div class="update-profile__container">
                                    <div class="update-profile__field-label">
                                        <label for="update_style">Pertenece a un club</label>
                                    </div>
                                    <div class="update-profile__field-select">
                                        <select id="update_belong_to_club" name="update_belong_to_club">
                                            <option value="">Seleccionar una opción:</option>
                                            <?php 
                                                                foreach ($belongsToClubs as $index => $belongsToClub) :
                                                                    echo "<option value='".$index."' ";
                                                                    if((int)$index === (int)esc_attr(get_field('pertenece_a_un_club', 'user_'. $uid ))):
                                                                        echo "selected";
                                                                    endif;
                                                                    echo ">".$belongsToClub."</option>";
                                                                endforeach;
                                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="update-profile__form-input">
                                <div class="update-profile__container">
                                    <div class="update-profile__field-label">
                                        <label for="update_name_club">Nombre de club</label>
                                    </div>
                                    <div class="update-profile__field-input">
                                        <input type="text" class="update-profile__field-input" id="update_name_club"
                                            name="update_name_club"
                                            value="<?php echo esc_attr(get_field('nombre_club', 'user_'. $uid ));?>">
                                    </div>
                                </div>
                            </div>

                            <?php /*<div class="update-profile__form-input">
                                                <div class="update-profile__container">
                                                    <div class="update-profile__field-label">
                                                        <label for="update_origin_club">Origen del club</label>
                                                    </div>
                                                    <div class="update-profile__field-input">
                                                        <input type="text" class="update-profile__field-input" id="update_origin_club" name="update_origin_club" value="<?php echo esc_attr(get_field('origen_del_club', 'user_'. $uid ));?>">
                        </div>
                    </div>
                </div>*/ ?>

                <div class="update-profile__form-input">
                    <div class="update-profile__container">
                        <div class="update-profile__field-label">
                            <label for="update_origin_club">Origen del club</label>
                        </div>
                        <div class="update-profile__field-select">

                            <select id="update_origin_club" name="update_origin_club">
                                <option value="">Seleccionar una opción:</option>
                                <option value="NOMX">No es de origen mexicano</option>
                                <?php $states = getMexStates(); ?>
                                <?php foreach ($states as $index => $state) :
                                                                echo "<option value='".$state['clave']."' ";
                                                                if($state['clave']=== esc_attr(get_field('origen_del_club', 'user_'. $uid ))):
                                                                    echo "selected";
                                                                endif;
                                                                echo ">".$state['nombre']."</option>";
                                                            endforeach;?>
                            </select>
                            <?php /*<input type="text" class="update-profile__field-input" id="update_origin_club" name="update_origin_club" value="<?php echo esc_attr(get_field('origen_del_club', 'user_'. $uid ));?>">*/
                            ?>

                        </div>
                    </div>
                </div>

                <div class="update-profile__form-input">
                    <div class="update-profile__container">
                        <div class="update-profile__field-label">
                            <label for="update_style">Integrantes del club</label>
                        </div>
                        <div class="update-profile__field-select">
                            <select id="update_number_member_clubs" name="update_number_member_clubs">
                                <option value="">Seleccionar una opción:</option>
                                <?php 
                                                                foreach ($numberMembersClub as $index => $number) :
                                                                    echo "<option value='".$index."' ";
                                                                    if($index === esc_attr(get_field('integrantes_del_club', 'user_'. $uid ))):
                                                                        echo "selected";
                                                                    endif;
                                                                    echo ">".$number."</option>";
                                                                endforeach;
                                                            ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="update-profile__form-input">
                    <div class="update-profile__container">
                        <div class="update-profile__field-label">
                            <label for="update_style">País de origen</label>
                        </div>
                        <div class="update-profile__field-select">
                            <select id="update_origin_country" name="update_origin_country">
                                <option value="">Seleccionar una opción:</option>
                                <?php 
                                                                $countries = getCountries();
                                                                foreach ($countries as $index => $country) :
                                                                    echo "<option value='".$country['code3']."' ";
                                                                    if($country['code3']=== esc_attr(get_field('user_country', 'user_'. $uid ))):
                                                                        echo "selected";
                                                                    endif;
                                                                    echo ">".$country['name']."</option>";
                                                                endforeach;
                                                            ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="update-profile__form-input parent-update-origin-state">
                    <div class="update-profile__container">
                        <div class="update-profile__field-label">
                            <label for="update_style">Estado de origen</label>
                        </div>
                        <div class="update-profile__field-select">
                            <select id="update_origin_state" name="update_origin_state">
                                <option value="">Seleccionar una opción:</option>
                                <?php 
                                                                
                                                                foreach ($states as $index => $state) :
                                                                    echo "<option value='".$state['clave']."' ";
                                                                    if($state['clave']=== esc_attr(get_field('user_state', 'user_'. $uid ))):
                                                                        echo "selected";
                                                                    endif;
                                                                    echo ">".$state['nombre']."</option>";
                                                                endforeach;
                                                            ?>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <button type="submit">Enviar</button>
    </div>
</div>
</form>
</div>

<!-- Modal Footer (3/3) -->
<div class="modal-footer">
    <!-- Tab Steps-->
    <div class="navbar">
        <div class="navbar-inner">
            <ul class="nav nav-tabs nav-justified">
                <li>
                    <a class="active" href="#step1" data-toggle="tab" data-step="1">1</a>
                </li>
                <li>
                    <a href="#step2" data-toggle="tab" data-step="2">2</a>
                </li>
                <!-- <li>
                                    <a href="#step3" data-toggle="tab" data-step="3">3</a>
                                </li> -->
            </ul>
        </div>
    </div>
    <!-- <div class="left-footer">
                    <a class="btn btn-success first" href="#">Start over</a>
                    </div> -->
    <div class="right-footer">
        <a class="btn btn-profile back" href="#">Retroceder</a>
        <a class="btn btn-profile next" href="#">Continuar</a>
    </div>
    <!-- <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button> -->
    <!-- <button class="btn btn-primary">Save changes</button> -->
</div>

</div>
</div>
</div>
<!-- Bootstrap Modal MultiStep -->

<div id="image-profile" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body" id="serviceModalMultiStep">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>

                <div class="pm-popup-image pm-dbfl pm-pad10">
                    <h2>Subir foto de perfil</h2>
                    <div class="pm-popup-action">
                        <!-- <a type="button" class="btn btn-primary" id="change-pic"><?php //esc_html_e('Change Image','profilegrid-user-profiles-groups-and-communities');?></a> -->

                        <form id="cropimage" method="post" enctype="multipart/form-data"
                            action="<?php echo esc_url(admin_url( 'admin-ajax.php' ));?>">
                            <div class="drop-zone-profile">
                                <div class="drop-zone-profile__thumbnail" data-label="myFile.png">
                                    <img src="<?php echo get_template_directory_uri().'/assets/images/profile/upload-circle.png'?>"
                                        alt="">
                                </div>
                                <!-- <input type="file" name="avatarFile" class="drop-zone__input"> -->
                                <input type="file" name="photoimg" id="photoimg2" class="drop-zone-profile__input" />
                            </div>
                            <div class="action-zone">
                                <div class="action-zone__buttons">
                                    <p>
                                        Arrastra y suelta tu imagen o selecciona una
                                    </p>
                                    <button class="action-zone__upload-photo">
                                        Subir Foto
                                    </button>
                                    <!-- <button class="action-zone__skip">
                                            Omitir
                                            </button> -->
                                </div>
                                <div id="preview-avatar-profile"></div>
                                <p class="action-zone__success hide">La foto se ha guardado correctamente!!!</p>
                                <div id="changePic">
                                    <!-- <div class="modal-footer"> -->
                                    <button type="button" id="btn-crop2"
                                        class="btn-primary"><?php esc_html_e('Crop & Save','profilegrid-user-profiles-groups-and-communities');?></button>
                                    <button type="button" id="btn-cancel"
                                        class="btn-default"><?php esc_html_e('Cancel','profilegrid-user-profiles-groups-and-communities');?></button>
                                    <!-- </div> -->
                                </div>
                            </div>
                            <!-- <div class="pm-dbfl">
                                    <label><?php //esc_html_e('Upload your image','profilegrid-user-profiles-groups-and-communities');?></label>
                                    <input type="file" name="photoimg" id="photoimg" />
                                    </div> -->
                            <input type="hidden" name="action" value="pm_upload_image" id="action" />
                            <input type="hidden" name="status" value="" id="status" />
                            <input type="hidden" name="filepath" id="filepath" value="<?php echo esc_url($path);?>" />
                            <input type="hidden" name="user_id" id="user_id"
                                value="<?php echo esc_attr($user_info->ID); ?>" />
                            <input type="hidden" name="user_meta" id="user_meta"
                                value="<?php echo esc_attr('pm_user_avatar'); ?>" />
                            <input type="hidden" id="x" name="x" />
                            <input type="hidden" id="y" name="y" />
                            <input type="hidden" id="w" name="w" />
                            <input type="hidden" id="h" name="h" />
                            <!--<div id="thumbs" style="padding:5px; width:600px"></div>-->
                        </form>

                        <div class="gravatar">
                            <?php echo get_avatar($user_info->user_email,50,'',false,array('class'=>'pm-user','id'=>'avatar-edit-img','force_display'=>true)); ?>
                            <form id="delete-img" method="post" action="" enctype="multipart/form-data"
                                onsubmit="return pg_prevent_double_click(this);">
                                <input type="hidden" name="user_id" value="<?php echo esc_attr($user_info->ID); ?>" />
                                <input type="hidden" name="user_meta"
                                    value="<?php echo esc_attr('pm_user_avatar'); ?>" />
                                <input type="submit"
                                    value="<?php esc_attr_e('Remove','profilegrid-user-profiles-groups-and-communities');?>"
                                    name="remove_image" id="pg_remove_profile_image_btn" />
                            </form>
                        </div>

                    </div>
                    <p class="pm-popup-info pm-dbfl pm-pad10">
                        <?php esc_html_e('For best visibility choose square image with minimum size of 200 x 200 pixels','profilegrid-user-profiles-groups-and-communities');?>
                    </p>
                </div>


            </div>
        </div>
    </div>
</div>
<!-- Bootstrap Modal MultiStep -->


<div class="profile-content show">
    <div class="profile-content__tabs">
        <?php //do_action( 'profile_magic_profile_tabs',$uid,$gid,$primary_gid,$sections);?>

        <?php
                    $dbhandler = new PM_DBhandler;
                    $pmrequests = new PM_request;
                    $profile_tabs = $pmrequests->pm_profile_tabs();
                    ?>
        <div class="pm-profile-tabs pm-dbfl" id="pg-profile-tabs">
            <div class="pm-section-nav-horizental pm-dbfl">
                <ul class="mymenu y pm-difl pm-profile-tab-wrap pm-border-bt">
                    <?php
                                if (!empty($profile_tabs)):                  
                                    foreach($profile_tabs as $key=>$tab):
                                        // echo "<pre style='color:white'>";
                                        // var_dump($profile_tabs);
                                        // echo "</pre>";
                                        if(
                                            // $profile_tabs[$key]['title'] == "Mis notificaciones" ||
                                            // $profile_tabs[$key]['title'] == "Pendientes de aprobación" ||
                                            // $profile_tabs[$key]['title'] == "Suscripciones"
                                            $profile_tabs[$key]['id'] == "misnotificaciones5" ||
                                            $profile_tabs[$key]['id'] == "pendientesdeaprobacin7" ||
                                            $profile_tabs[$key]['id'] == "suscripciones8"
                                            ){
                                            if($uid != $current_user->ID): 
                                                continue; 
                                            endif;
                                        }
                                        $pmrequests->generate_profile_tab_links($tab['id'],$tab,$uid,$gid,$primary_gid);
                                    endforeach;
                                endif;
                                ?>
                    <?php do_action( 'profile_magic_profile_tab',$uid,$primary_gid);?>
                </ul>
            </div>

            <?php
                            if (!empty($profile_tabs)):                  
                                foreach($profile_tabs as $key=>$tab):
                                    $pmrequests->generate_profile_tab_content($tab['id'],$tab,$uid,$gid,$primary_gid);
                                endforeach;
                            endif;
                        ?>
            <?php do_action( 'profile_magic_profile_tab_content',$uid,$primary_gid);?>
        </div>
        <?php
                            if ( is_active_sidebar( 'bottom-tabs-profile' ) ):
                        ?>
        <div class="banner-rrm bottom-tabs-profile">
            <?php
                                dynamic_sidebar( 'bottom-tabs-profile' );
                        ?>
        </div>
        <?php endif; ?>
    </div>
    <?php echo do_shortcode( '[my_achievements screen="desktop"]' ); ?>

    <!-- <a href="#" class="workshop">
                <h3>Visita mi taller de motos</h3>
                <img src="<? //echo get_template_directory_uri().'/assets/images/profile/mechanic-workshop.png'; ?>"
                    alt="">
            </a> -->
</div>
<div class="profilegrid-settings-area">
    <?php echo do_shortcode( '[profilegrid_settings_area]' ); ?>
</div>
</div>


<?php if($uid == $current_user->ID):?>
<div class="pm-popup-mask"></div>


<div id="pm-change-image-dialog">

    <div class="pm-popup-container pm-update-image-container pm-radius5">
        <div class="pm-popup-title pm-dbfl pm-bg-lt pm-pad10 pm-border-bt">
            <i class="fa fa-camera-retro" aria-hidden="true"></i>
            <?php esc_html_e('Change Profile Image','profilegrid-user-profiles-groups-and-communities');?>
            <div class="pm-popup-close pm-difr">
                <img src="<?php echo esc_url($path.'images/popup-close.png');?>" height="24px" width="24px">
            </div>
        </div>
        <div class="pm-popup-image pm-dbfl pm-bg pm-pad10">
            <?php echo get_avatar($user_info->user_email,150,'',false,array('class'=>'pm-user','id'=>'avatar-edit-img','force_display'=>true));?>
            <div class="pm-popup-action">
                <a type="button" class="btn btn-primary"
                    id="change-pic"><?php esc_html_e('Change Image','profilegrid-user-profiles-groups-and-communities');?></a>
                <div id="changePic" class="" style="display:none">
                    <form id="cropimage" method="post" enctype="multipart/form-data"
                        action="<?php echo esc_url(admin_url( 'admin-ajax.php' ));?>">
                        <div class="pm-dbfl">
                            <label><?php esc_html_e('Upload your image','profilegrid-user-profiles-groups-and-communities');?></label>
                            <input type="file" name="photoimg" id="photoimg" />
                        </div>
                        <input type="hidden" name="action" value="pm_upload_image" id="action" />
                        <input type="hidden" name="status" value="" id="status" />
                        <input type="hidden" name="filepath" id="filepath" value="<?php echo esc_url($path);?>" />
                        <input type="hidden" name="user_id" id="user_id"
                            value="<?php echo esc_attr($user_info->ID); ?>" />
                        <input type="hidden" name="user_meta" id="user_meta"
                            value="<?php echo esc_attr('pm_user_avatar'); ?>" />
                        <input type="hidden" id="x" name="x" />
                        <input type="hidden" id="y" name="y" />
                        <input type="hidden" id="w" name="w" />
                        <input type="hidden" id="h" name="h" />
                        <div id="preview-avatar-profile"></div>
                        <div id="thumbs" style="padding:5px; width:600px"></div>
                    </form>
                    <div class="modal-footer">
                        <button type="button" id="btn-cancel"
                            class="btn btn-default"><?php esc_html_e('Cancel','profilegrid-user-profiles-groups-and-communities');?></button>
                        <button type="button" id="btn-crop"
                            class="btn btn-primary"><?php esc_html_e('Crop & Save','profilegrid-user-profiles-groups-and-communities');?></button>
                    </div>
                </div>
                <form method="post" action="" enctype="multipart/form-data"
                    onsubmit="return pg_prevent_double_click(this);">
                    <input type="hidden" name="user_id" value="<?php echo esc_attr($user_info->ID); ?>" />
                    <input type="hidden" name="user_meta" value="<?php echo esc_attr('pm_user_avatar'); ?>" />
                    <input type="submit"
                        value="<?php esc_attr_e('Remove','profilegrid-user-profiles-groups-and-communities');?>"
                        name="remove_image" id="pg_remove_profile_image_btn" />
                </form>
            </div>
            <p class="pm-popup-info pm-dbfl pm-pad10">
                <?php esc_html_e('For best visibility choose square image with minimum size of 200 x 200 pixels','profilegrid-user-profiles-groups-and-communities');?>
            </p>
        </div>
    </div>


</div>

<!-- Modal cover image -->
<div id="upload-cover-image" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body" id="serviceModalMultiStep">
                <button type="button" class="modal-close" data-dismiss="modal" aria-hidden="true">
                    <i class="icon-close"></i>
                </button>
                <h2>Subir o cambiar imagen de portada</h2>
                <?php echo wp_get_attachment_image($pmrequests->profile_magic_get_user_field_value($user_info->ID,'pm_cover_image'),array(85,85),true,array('class'=>'pm-cover-image','id'=>'cover-edit-img')); ?>
                <form id="cropcoverimage" method="post" enctype="multipart/form-data"
                    action="<?php echo esc_url(admin_url( 'admin-ajax.php' ));?>">
                    <label><?php esc_html_e('Upload Your Cover Image','profilegrid-user-profiles-groups-and-communities');?></label>
                    <input type="file" name="coverimg" id="coverimg" />
                    <input type="hidden" name="action" value="pm_upload_cover_image" id="action" />
                    <input type="hidden" name="cover_status" value="" id="cover_status" />
                    <input type="hidden" name="cover_filepath" id="cover_filepath"
                        value="<?php echo esc_url($path);?>" />
                    <input type="hidden" name="user_id" id="user_id" value="<?php echo esc_attr($user_info->ID); ?>" />
                    <input type="hidden" id="cx" name="cx" />
                    <input type="hidden" id="cy" name="cy" />
                    <input type="hidden" id="cw" name="cw" />
                    <input type="hidden" id="ch" name="ch" />
                    <input type="hidden" id="cover_minwidth" name="cover_minwidth" value="" />

                    <div id="preview-cover-image"></div>
                    <div id="thumbs" style="padding:5px; width:600px"></div>
                </form>
                <div class="modal-footer">
                    <button type="button"
                        id="btn-cover-cancel"><?php esc_html_e('Cancel','profilegrid-user-profiles-groups-and-communities');?></button>
                    <button type="button"
                        id="btn-cover-crop"><?php esc_html_e('Crop & Save','profilegrid-user-profiles-groups-and-communities');?></button>
                </div>
                <form id="deletecropcoverimage" method="post" action="" enctype="multipart/form-data"
                    onsubmit="return pg_prevent_double_click(this);">
                    <input type="hidden" name="user_id" value="<?php echo esc_attr($user_info->ID); ?>" />
                    <input type="hidden" name="user_meta" value="<?php echo esc_attr('pm_cover_image'); ?>" />
                    <input type="submit"
                        value="<?php esc_attr_e('Remove','profilegrid-user-profiles-groups-and-communities');?>"
                        name="remove_image" id="pg_remove_cover_image_btn" />
                </form>
            </div>
        </div>
    </div>
</div>
<!-- -->

<div class="pm-popup-mask"></div>
<div id="pm-change-cover-image-dialog">
    <div class="pm-popup-container pm-update-image-container pm-radius5">
        <div class="pm-popup-title pm-dbfl pm-bg-lt pm-pad10 pm-border-bt">
            <?php esc_html_e('Change Cover Image','profilegrid-user-profiles-groups-and-communities');?>
            <div class="pm-popup-close pm-difr">
                <img src="<?php echo esc_url($path.'images/popup-close.png');?>" height="24px" width="24px">
            </div>
        </div>
        <div class="pm-popup-image pm-dbfl pm-pad10 pm-bg">
            <?php echo wp_get_attachment_image($pmrequests->profile_magic_get_user_field_value($user_info->ID,'pm_cover_image'),array(85,85),true,array('class'=>'pm-cover-image','id'=>'cover-edit-img'));?>
            <div class="pm-popup-action pm-dbfl pm-pad10">
                <a type="button" class="btn btn-primary"
                    id="change-cover-pic"><?php esc_html_e('Change Cover Image','profilegrid-user-profiles-groups-and-communities');?></a>
                <div id="changeCoverPic" class="" style="display:none">
                    <form id="cropcoverimage" method="post" enctype="multipart/form-data"
                        action="<?php echo esc_url(admin_url( 'admin-ajax.php' ));?>">
                        <label><?php esc_html_e('Upload Your Cover Image','profilegrid-user-profiles-groups-and-communities');?></label>
                        <input type="file" name="coverimg" id="coverimg" />
                        <input type="hidden" name="action" value="pm_upload_cover_image" id="action" />
                        <input type="hidden" name="cover_status" value="" id="cover_status" />
                        <input type="hidden" name="cover_filepath" id="cover_filepath"
                            value="<?php echo esc_url($path);?>" />
                        <input type="hidden" name="user_id" id="user_id"
                            value="<?php echo esc_attr($user_info->ID); ?>" />
                        <input type="hidden" id="cx" name="cx" />
                        <input type="hidden" id="cy" name="cy" />
                        <input type="hidden" id="cw" name="cw" />
                        <input type="hidden" id="ch" name="ch" />
                        <input type="hidden" id="cover_minwidth" name="cover_minwidth" value="" />

                        <div id="preview-cover-image"></div>
                        <div id="thumbs" style="padding:5px; width:600px"></div>
                    </form>
                    <div class="modal-footer">
                        <button type="button" id="btn-cover-cancel"
                            class="btn btn-default"><?php esc_html_e('Cancel','profilegrid-user-profiles-groups-and-communities');?></button>
                        <button type="button" id="btn-cover-crop"
                            class="btn btn-primary"><?php esc_html_e('Crop & Save','profilegrid-user-profiles-groups-and-communities');?></button>
                    </div>
                </div>


                <form method="post" action="" enctype="multipart/form-data"
                    onsubmit="return pg_prevent_double_click(this);">
                    <input type="hidden" name="user_id" value="<?php echo esc_attr($user_info->ID); ?>" />
                    <input type="hidden" name="user_meta" value="<?php echo esc_attr('pm_cover_image'); ?>" />
                    <input type="submit"
                        value="<?php esc_attr_e('Remove','profilegrid-user-profiles-groups-and-communities');?>"
                        name="remove_image" id="pg_remove_cover_image_btn" />
                </form>
            </div>
            <p class="pm-popup-info pm-dbfl pm-pad10">
                <?php echo wp_kses_post('For best visibility choose a landscape aspect ratio image with size of <span id="pm-cover-image-width">1200</span> x 300 pixels','profilegrid-user-profiles-groups-and-communities');?>
            </p>
        </div>
    </div>
</div>

<div class="pm-popup-mask"></div>

<div id="pm-edit-group-popup" style="display: none;">
    <div class="pm-popup-container" id="pg_edit_group_html_container">


    </div>
</div>
<?php if($dbhandler->get_global_option_value('pm_enable_blog','1')==1):?>


<div class="pg-blog-dialog-mask" style="<?php if(isset($post_obj['pg_blog_submit']))echo 'display:block';?>"></div>
<div id="pm-add-blog-dialog" style="<?php if(isset($post_obj['pg_blog_submit']))echo 'display:block';?>">
    <div class="pm-popup-container pm-radius5">
        <div class="pm-popup-title pm-dbfl pm-bg-lt pm-pad10 pm-border-bt">
            <i class="fa fa-key" aria-hidden="true"></i>
            <?php esc_html_e('Submit New Blog Post','profilegrid-user-profiles-groups-and-communities');?>
            <?php if(!isset($post_obj['pg_blog_submit'])):?>
            <div class="pm-popup-close pm-difr"><img src="<?php echo esc_url($path.'images/popup-close.png');?>"
                    height="24px" width="24px"></div>
            <?php endif;?>
        </div>
        <div class="pm-popup-image">
            <div class="pm-popup-action pm-dbfl pm-pad10 pm-bg">
                <?php echo do_shortcode('[profilegrid_submit_blog]');?>
            </div>
        </div>
    </div>
</div>
<?php endif;?>
<?php else: ?>
<div class="pm-popup-mask"></div>

<div id="pm-show-profile-image-dialog">
    <div class="pm-popup-container">

        <div class="pm-popup-title pm-dbfl pm-bg-lt pm-pad10 pm-border-bt">
            <div class="pm-popup-close pm-difr">
                <img src="<?php echo esc_url($path.'images/popup-close.png');?>" height="24px" width="24px">
            </div>
        </div>

        <div class="pm-popup-image pm-dbfl pm-pad10 pm-bg">
            <?php echo get_avatar($user_info->user_email, 512,'',false,array('force_display'=>true)); ?>
        </div>

    </div>
</div>

<div class="pm-popup-mask"></div>
<div id="pm-show-cover-image-dialog">
    <div class="pm-popup-container">
        <div class="pm-popup-title pm-dbfl pm-bg-lt pm-pad10 pm-border-bt">
            <div class="pm-popup-close pm-difr">
                <img src="<?php echo esc_url($path.'images/popup-close.png');?>" height="24px" width="24px">
            </div>
        </div>

        <div class="pm-popup-image pm-dbfl pm-pad10 pm-bg">
            <?php echo wp_kses_post($pmrequests->profile_magic_get_cover_image($user_info->ID, 'pm-cover-image')); ?>
        </div>
    </div>
</div>



<?php endif;?>

<?php do_action('profile_page_popup_html',$user_info->ID); ?>
</div>
<div class="pm-popup-mask"></div>

<div id="pm-edit-group-popup" style="display: none;">
    <div class="pm-popup-container" id="pg_edit_group_html_container">


    </div>
</div>


<div id="upload-challengue" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body" id="serviceModalMultiStep">
                <button type="button" class="modal-close" data-dismiss="modal" aria-hidden="true">
                    <i class="icon-close"></i>
                </button>
                <!-- <h2>Desafío</h2> -->
                <h2>Subir una foto </h2>
                <form action="#" id="upload-challengue-form" enctype="multipart/form-data" data-action="save"
                    data-id-post="">
                    <div class="upload-challengue">
                        <div class="upload-challengue--left">
                            <div class="drop-zone">
                                <div class="drop-zone__thumb" data-label="myArchivo.jpg"></div>
                                <div class="drop-zone__init-data">
                                    <i class="icon-add_a_photo"></i>
                                    <span class="drop-zone__description">
                                        Arrastra y suelta la imagen o selecciona una
                                    </span>
                                </div>
                                <input type="file" name="challengue-image" id="challengue-image"
                                    class="drop-zone__file" />
                            </div>
                        </div>
                        <div class="upload-challengue--right">
                            <div class="upload-challengue__form">

                                <div class="upload-input">
                                    <label for="challengue-title">Título <sup class="pm_estric">*</sup></label>
                                    <input name="challengue-title" id="challengue-title" type="text" />
                                </div>

                                <div class="upload-input">
                                    <label for="challengue-description">Descripción <sup
                                            class="pm_estric">*</sup><span>(140
                                            caracteres)</span></label>
                                    <textarea name="challengue-description" id="challengue-description" cols="30"
                                        rows="3"></textarea>
                                </div>

                                <?php 
                                    $query = get_challengues();
                                    //$challengues_completed = filtered_challengues_upload_photo();
                                    
                                ?>
                                <div class="upload-input">
                                    <label for="challengue-challengue">Desafío <sup class="pm_estric">*</sup></label>
                                    <select name="challengue-challengue" id="challengue-challengue">
                                        <option value="">Selecciona el desafío</option>
                                        <?php 
                                            while ($query->have_posts()) {
                                                $query->the_post();
                                                //var_dump(get_the_ID());
                                                //if(!in_array(get_the_ID(), $challengues_completed )){
                                                    echo '<option value="' . esc_attr(get_the_ID()) . '">' . esc_html(get_the_title()) . '</option>';
                                                //}
                                            }
                                    
                                            wp_reset_query();
                                        ?>
                                    </select>
                                </div>

                                <div class="upload-input challengue-state">
                                    <label for="challengue-state">Estado o Zona <sup class="pm_estric">*</sup></label>
                                    <select name="challengue-state" id="challengue-state">
                                        <option value="">Selecciona el estado o zona</option>
                                        <!-- Inserta las opciones profile.js getStatesZones() -->
                                    </select>
                                </div>

                                <div class="upload-input challengue-activity">
                                    <label for="activity">Destino turistico o actividad <sup
                                            class="pm_estric">*</sup></label>
                                    <select name="challengue-activity" id="challengue-activity">
                                        <option value="">Selecciona el destino turistico o actividad</option>
                                    </select>
                                </div>
                                <div class="validation-error"></div>
                                <div class="upload-challengue__actions">
                                    <button class="upload-challengue__cancel" class="modal-close" data-dismiss="modal"
                                        aria-hidden="true">
                                        Cancelar
                                    </button>
                                    <button class="upload-challengue__upload">
                                        Subir foto
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php 
    $brand = get_terms(array(
        'taxonomy' => 'marca', // nombre de la taxonomía
        'hide_empty' => false, // mostrar términos incluso si no tienen posts asociados
    ));

    $model = get_terms(array(
        'taxonomy' => 'modelo', // nombre de la taxonomía
        'hide_empty' => false, // mostrar términos incluso si no tienen posts asociados
    ));

    $color = get_terms(array(
        'taxonomy' => 'color', // nombre de la taxonomía
        'hide_empty' => false, // mostrar términos incluso si no tienen posts asociados
    ));

    $style = get_terms(array(
        'taxonomy' => 'estilo', // nombre de la taxonomía
        'hide_empty' => false, // mostrar términos incluso si no tienen posts asociados
    ));

    $status = get_terms(array(
        'taxonomy' => 'estaus', // nombre de la taxonomía
        'hide_empty' => false, // mostrar términos incluso si no tienen posts asociados
    ));

    //print_r($status);
?>

<!-- <div class="message">Se ha eliminado la moto correctamente</div> -->
<span class="loader"></span>
<div class="loader-layer"></div>
<div id="upload-bike" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body" id="serviceModalMultiStep">
                <button type="button" class="modal-close" data-dismiss="modal" aria-hidden="true">
                    <i class="icon-close"></i>
                </button>
                <h2>Agregar una nueva moto a tu garage</h2>
                <form id="upload-bike-form" action="" method="post" name="new-garage-item"
                    enctype="multipart/form-data">>
                    <div class="upload-bike">
                        <div class="upload-bike--left">
                            <div class="drop-zone">
                                <div class="drop-zone__thumb" data-label="myArchivo.jpg"></div>
                                <div class="drop-zone__init-data">
                                    <i class="icon-add_a_photo"></i>
                                    <span class="drop-zone__description">
                                        Arrastra y suelta la imagen o selecciona una
                                    </span>
                                </div>
                                <input type="file" id="bike-image" name="bike-image" class="drop-zone__file" />
                            </div>
                        </div>
                        <div class="upload-bike--right">
                            <div class="upload-bike__form">
                                <div class="upload-input">
                                    <label for="bike-name">Nombre o apodo</label>
                                    <input type="text" id="bike-name" name="bike-name">
                                </div>
                                <!-- <div class="upload-input">
                                    <label for="year">Año</label>
                                    <input type="number" id="bike-year" name="year">
                                </div> -->
                                <?php 
                                if (!empty($brand)):
                                ?>
                                <div class="upload-input">
                                    <label for="bike-brand">Marca</label>
                                    <select name="bike-brand" id="bike-brand">
                                        <option value="">Selecciona la marca</option>
                                        <?php
                                            foreach ($brand as $term) {
                                                echo '<option value="' . esc_attr($term->term_id) . '">' . esc_html($term->name) . '</option>';
                                            }
                                            ?>
                                    </select>
                                </div>
                                <?php
                                    endif;
                                ?>

                                <?php 
                                    if (!empty($color)):
                                ?>
                                <div class="upload-input">
                                    <label for="bike-color">Color</label>
                                    <select name="bike-color" id="bike-color">
                                        <option value="">Selecciona el color</option>
                                        <?php
                                            foreach ($color as $term) {
                                                echo '<option value="' . esc_attr($term->term_id) . '">' . esc_html($term->name) . '</option>';
                                            }
                                            ?>
                                    </select>
                                </div>
                                <?php
                                    endif;
                                ?>

                                <?php 
                                if (!empty($model)):
                                ?>
                                <div class="upload-input">
                                    <label for="bike-model">Modelo</label>
                                    <!-- <select name="bike-model" id="bike-model">
                                        <option value="">Selecciona el modelo</option> -->
                                    <?php
                                            // foreach ($model as $term) {
                                            //     echo '<option value="' . esc_attr($term->term_id) . '">' . esc_html($term->name) . '</option>';
                                            // }
                                        ?>
                                    <!-- </select> -->
                                    <input name="bike-model" id="bike-model" type="text" class="datepicker" />
                                </div>
                                <?php
                                endif;
                                ?>
                                <?php 
                                    if (!empty($status)):
                                ?>
                                <div class="upload-input">
                                    <label for="bike-status">Estatus</label>
                                    <select name="bike-status" id="bike-status">
                                        <option value="">Selecciona el status</option>
                                        <?php
                                            foreach ($status as $term) {
                                                echo '<option value="' . esc_attr($term->term_id) . '">' . esc_html($term->name) . '</option>';
                                            }
                                        ?>
                                    </select>
                                </div>
                                <?php
                                    endif;
                                ?>
                                <?php 
                                    if (!empty($style)):
                                ?>
                                <div class="upload-input">
                                    <label for="bike-style">Estilo</label>
                                    <select name="bike-style" id="bike-style">
                                        <option value="">Selecciona el estilo</option>
                                        <?php
                                            foreach ($style as $term) {
                                                echo '<option value="' . esc_attr($term->term_id) . '">' . esc_html($term->name) . '</option>';
                                            }
                                        ?>
                                    </select>
                                </div>
                                <?php
                                    endif;
                                ?>
                            </div>
                            <div class="upload-bike__actions">
                                <button class="upload-bike__cancel" class="modal-close" data-dismiss="modal"
                                    aria-hidden="true">
                                    Cancelar
                                </button>
                                <button type="submit" class="upload-bike__upload">
                                    Subir moto
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div id="edit-bike" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"
    data-bike-id="0">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body" id="serviceModalMultiStep">
                <button type="button" class="modal-close" data-dismiss="modal" aria-hidden="true">
                    <i class="icon-close"></i>
                </button>
                <h2>Editar moto</h2>
                <form id="edit-bike-form" action="" method="post" name="edit-garage-item" enctype="multipart/form-data"
                    novalidate="novalidate">
                    <div class="upload-bike">
                        <div class="upload-bike--left">
                            <div class="drop-zone">
                                <div class="drop-zone__thumb" data-label="myArchivo.jpg"></div>
                                <div class="drop-zone__init-data">
                                    <i class="icon-add_a_photo"></i>
                                    <span class="drop-zone__description">
                                        Arrastra y suelta la imagen o selecciona una para actualizar la imagen
                                    </span>
                                </div>
                                <input type="file" id="bike-edit-image" name="bike-edit-image"
                                    class="drop-zone__file" />
                            </div>
                        </div>
                        <div class="upload-bike--right">
                            <div class="upload-bike__form">
                                <div class="upload-input">
                                    <label for="bike-name">Nombre o apodo</label>
                                    <input type="text" id="bike-edit-name" name="bike-edit-name">
                                </div>
                                <!-- <div class="upload-input">
                                    <label for="year">Año</label>
                                    <input type="number" id="bike-year" name="year">
                                </div> -->
                                <?php 
                                if (!empty($brand)):
                                ?>
                                <div class="upload-input">
                                    <label for="bike-brand">Marca</label>
                                    <select name="bike-edit-brand" id="bike-edit-brand">
                                        <option value="">Selecciona la marca</option>
                                        <?php
                                            foreach ($brand as $term) {
                                                echo '<option value="' . esc_attr($term->term_id) . '">' . esc_html($term->name) . '</option>';
                                            }
                                            ?>
                                    </select>
                                </div>
                                <?php
                                    endif;
                                ?>

                                <?php 
                                    if (!empty($color)):
                                ?>
                                <div class="upload-input">
                                    <label for="bike-color">Color</label>
                                    <select name="bike-edit-color" id="bike-edit-color">
                                        <option value="">Selecciona el color</option>
                                        <?php
                                            foreach ($color as $term) {
                                                echo '<option value="' . esc_attr($term->term_id) . '">' . esc_html($term->name) . '</option>';
                                            }
                                            ?>
                                    </select>
                                </div>
                                <?php
                                    endif;
                                ?>

                                <?php 
                                if (!empty($model)):
                                ?>
                                <div class="upload-input">
                                    <label for="bike-model">Modelo</label>
                                    <input name="bike-edit-model" id="bike-edit-model" type="text" class="datepicker" />
                                    <!-- <select name="bike-edit-model" id="bike-edit-model">
                                        <option value="">Selecciona el modelo</option>
                                -->
                                    <?php
                                       /*
                                            foreach ($model as $term) {
                                                echo '<option value="' . esc_attr($term->term_id) . '">' . esc_html($term->name) . '</option>';
                                            }
                                            */
                                            ?>
                                    <!--
                                    </select> 
                                    -->
                                </div>
                                <?php
                                endif;
                                ?>
                                <?php 
                                    if (!empty($status)):
                                ?>
                                <div class="upload-input">
                                    <label for="bike-status">Estatus</label>
                                    <select name="bike-edit-status" id="bike-edit-status">
                                        <option value="">Selecciona el status</option>
                                        <?php
                                            foreach ($status as $term) {
                                                echo '<option value="' . esc_attr($term->term_id) . '">' . esc_html($term->name) . '</option>';
                                            }
                                        ?>
                                    </select>
                                </div>
                                <?php
                                    endif;
                                ?>
                                <?php 
                                    if (!empty($style)):
                                ?>
                                <div class="upload-input">
                                    <label for="bike-style">Estilo</label>
                                    <select name="bike-edit-style" id="bike-edit-style">
                                        <option value="">Selecciona el estilo</option>
                                        <?php
                                            foreach ($style as $term) {
                                                echo '<option value="' . esc_attr($term->term_id) . '">' . esc_html($term->name) . '</option>';
                                            }
                                        ?>
                                    </select>
                                </div>
                                <?php
                                    endif;
                                ?>
                            </div>
                            <div class="upload-bike__actions">
                                <button class="upload-bike__cancel" class="modal-close" data-dismiss="modal"
                                    aria-hidden="true">
                                    Cancelar
                                </button>
                                <button type="submit" class="upload-bike__upload">
                                    Editar moto
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php 
//filtered_options_upload_photo();
//filtered_challengues_upload_photo();
?>