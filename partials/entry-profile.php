<a href="<?php echo $args['post-url']; ?>" class="profile-entry">
    <div class="profile-entry--top">
        <div class="profile-entry__image">
            <?php echo $args['profile-image-url']; ?>
        </div>
        <?php if($args['member-active']): ?>
        <div class="profile-entry__verified">
            <img src="<? echo get_template_directory_uri().'/assets/images/hall_of_fame/verified.svg'; ?>" alt="">
        </div>
        <?php endif; ?>
        <div class="profile-entry__name">
            <?php echo $args['profile-name']; ?>
            <?php if($args['member-active']): ?>
            <img src="<? echo get_template_directory_uri().'/assets/images/hall_of_fame/verified.svg'; ?>" alt="">
            <?php endif; ?>
        </div>
        <div class="profile-entry__status">
            <?php echo $args['profile-status']; ?>
        </div>
        <div class="profile-entry__description">
            <?php echo $args['profile-description']; ?>
        </div>
    </div>
    <div class="profile-entry--bottom">
        <div class="profile-entry__medals">
            <ul>
                <?php 
                    //$count = count($args['profile-medals']);
                    //echo $count;
                    // Se muestran 11 medallas
                    //$count >= 10 && $count -= 11;
                    foreach($args['profile-medals'] as $key => $value):
                        //echo $key;
                ?>
                    <li>
                        <?php //echo $value; ?>
                        <?php echo wp_get_attachment_image(get_field( "logo", $value )); ?>
                    </li>
                <?php 
                    //if($key >= 10):
                ?>
                    <!-- <li class="count-extra">
                        <div>
                            <span>
                                <?php //echo '+'.$count; ?>
                            </span>
                        </div>
                    </li> -->
                <?php 
                    //break;
                    //endif;
                ?>
                <?php
                    endforeach;
                ?>
            </ul>
        </div>
        <button>
            Ver perfil
        </button>
    </div>
</a>