<a href="<?php echo $args['post-url']; ?>" class="profile-entry-active">
    <div class="profile-entry-active--top">
        <div class="profile-entry-active__image">
            <?php echo $args['profile-image-url']; ?>
        </div>
        <div class="profile-entry-active__verified">
            <?php //echo gettype(json_decode($args['profile-status'])[0]); ?>
            <?php //if(json_decode($args['profile-status'][0]) > 0): ?>
            <?php if($args['member-active']): ?>
            <img src="<? echo get_template_directory_uri().'/assets/images/hall_of_fame/verified.svg'; ?>" alt="">
            <?php endif; ?>
        </div>
        <div class="profile-entry-active__name">
            <?php echo $args['profile-name']; ?>
            <?php if($args['member-active']): ?>
            <img src="<? echo get_template_directory_uri().'/assets/images/hall_of_fame/verified.svg'; ?>" alt="">
            <?php endif; ?>
        </div>
        <div class="profile-entry-active__status">
            <?php echo $args['profile-status']; ?>
        </div>
        <div class="profile-entry-active__description">
            <?php echo $args['profile-description']; ?>
        </div>
        <div class="profile-entry-active__member-since">
            <?php echo $args['member-since']; ?>
        </div>
    </div>
    <!-- <div class="profile-entry--bottom">
        <button>
            Ver perfil
        </button> 
    </div> -->
</a>