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
<!-- <img src="<?php //echo $urlAvatar; ?>"/> -->
<div class="update-profile">
    <form action="" method="post" id="update-profile__form" class="update-profile__form">
        <div class="update-profile__form-content">
            <div class="update-profile__form-input">
                <div class="update-profile__container">
                    <div class="update-profile__field-label">
                        <label for="update_first_name">Nombre de usuario<sup class="pm_estric">*</sup></label>
                    </div>
                    <div class="update-profile__field-input">
                        <input type="text" class="update-profile__field-input" id="update_user_login" name="update_user_login" value="<?php echo esc_attr($current_user->user_login);?>" disabled="disabled">
                    </div>
                </div>
            </div>
            <div class="update-profile__form-input">
                <div class="update-profile__container">
                    <div class="update-profile__field-label">
                        <label for="update_first_name">Correo eletrónico<sup class="pm_estric">*</sup></label>
                    </div>
                    <div class="update-profile__field-input">
                        <input type="text" class="update-profile__field-input" id="update_email" name="update_email" value="<?php echo esc_attr($current_user->user_email);?>" disabled="disabled">
                    </div>
                </div>
            </div>
            <div class="update-profile__form-input">
                <div class="update-profile__container">
                    <div class="update-profile__field-label">
                        <label for="update_first_name">Nombre<sup class="pm_estric">*</sup></label>
                    </div>
                    <div class="update-profile__field-input">
                        <input type="text" class="update-profile__field-input" id="update_first_name" name="update_first_name" value="<?php echo esc_attr(get_field('first_name', 'user_'. $uid ));?>">
                    </div>
                </div>
            </div>
            <div class="update-profile__form-input">
                <div class="update-profile__container">
                    <div class="update-profile__field-label">
                        <label for="update_last_name">Apellido(s)<sup class="pm_estric">*</sup></label>
                    </div>
                    <div class="update-profile__field-input">
                        <input type="text" class="update-profile__field-input" id="update_last_name" name="update_last_name" value="<?php echo esc_attr(get_field('last_name', 'user_'. $uid ));?>">
                    </div>
                </div>
            </div>

            <div class="update-profile__form-input">
                <div class="update-profile__container">
                    <div class="update-profile__field-label">
                        <label for="update_date_birth">Fecha de nacimiento<sup class="pm_estric">*</sup></label>
                    </div>
                    <div class="update-profile__field-input">
                        <input type="date" class="update-profile__field-input" id="update_date_birth" name="update_date_birth" value="<?php echo $arrayDateFormat;?>">
                    </div>
                </div>
            </div>


            <div class="update-profile__form-input">
                <div class="update-profile__container">
                    <div class="update-profile__field-label">
                        <label for="update_facebok">Facebook</label>
                    </div>
                    <div class="update-profile__field-input">
                        <input type="text" class="update-profile__field-input" id="update_facebook" name="update_facebook" value="<?php echo esc_attr(get_field('facebook', 'user_'. $uid ));?>">
                    </div>
                </div>
            </div>

            <div class="update-profile__form-input">
                <div class="update-profile__container">
                    <div class="update-profile__field-label">
                        <label for="update_facebok">Web</label>
                    </div>
                    <div class="update-profile__field-input">
                        <input type="url" novalidate="novalidate" class="update-profile__field-input" id="update_web" name="update_web" value="<?php echo esc_url(get_userdata($uid)->user_url); ?>">
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
                            <option value="">Seleccionar una opción:</option>
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
                            <option value="">Seleccionar una opción:</option>
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
                        <input type="text" class="update-profile__field-input" id="update_name_club" name="update_name_club" value="<?php echo esc_attr(get_field('nombre_club', 'user_'. $uid ));?>">
                    </div>
                </div>
            </div>
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
                        <?php /*<input type="text" class="update-profile__field-input" id="update_origin_club" name="update_origin_club" value="<?php echo esc_attr(get_field('origen_del_club', 'user_'. $uid ));?>">*/ ?>

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
            
            <div class="update-profile__form-input text-area">
                <div class="update-profile__container">
                    <div class="update-profile__field-label">
                        <label for="update_style">Información Biográfica</label>
                    </div>
                    <div class="update-profile__field-select">
                        <textarea name="update_bio_info" id="update_bio_info" cols="30" rows="5"><?php echo wp_kses_post(get_user_meta($uid, 'description', true)); ?></textarea>
                    </div>
                </div>
            </div>

        </div>
        <button type="submit">Enviar</button>
    </form>
</div>

