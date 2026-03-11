<article class="challenge">
    <a href="<?php echo $args['url']; ?>">
        <img src="<?php echo $args['url-image']; ?>" alt="">
        <div class="challenge__medal">
            <img src="<?php echo $args['url-medal']; ?>" alt="">
        </div>
        <div class="challenge__content">
            <?php /*<span class="category"><?php echo $args['category']; ?></span> */ ?>
            <h2><?php echo $args['title']; ?></h2>
            <button>
            <?php echo $args['button-text']; ?>
            </button>
        </div>
    </a>
</article>
