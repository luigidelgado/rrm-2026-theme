<?php /* Template Name: Register */ ?>
<?php get_header(); ?>

    <?php 
        get_template_part( 
            'partials/intro-header',
            'intro-header',
            array(
                'url' => get_template_directory_uri().'/assets/images/session/headeimage.jpg',
                'is-transparent' => true
            )
        );
    ?>

    <?php
        while ( have_posts() ) :
            the_post();
                
            ?>
            <div class="register-content">
                <?php the_content();?>
            </div>
        <?php
            endwhile; // End of the loop.
     ?>

<?php get_footer(); ?>