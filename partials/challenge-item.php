<div class="top-challenge">
    <?php //var_export($args['challengue-medal']); ?>
    <div>
        <?php if(!empty($args['challengue-medal'])): ?>
        <?php echo wp_get_attachment_image($args['challengue-medal'], 'full'); ?>
        <?php else: ?>
        <img src="<?php echo get_template_directory_uri().'/assets/images/gallery/patch.png'; ?>" alt="">
        <?php endif; ?>
    </div>
    <div>
        <?php echo $args['number']; ?>
    </div>
    <div></div>
    <div>
    <?php echo $args['medal-name']; ?>
    </div>
</div>