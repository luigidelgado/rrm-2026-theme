<?php
/**
 * The template for displaying full width pages.
 *
 * Template Name: Welcome user
 *
 * @package storefront
 */

get_header(); ?>
    <?php 
    if (have_posts()): while (have_posts()) : the_post();
        $thumb = get_the_post_thumbnail_url($post->ID, 'full');
    endwhile;
    endif; 
    ?>
    <?php 
		get_template_part( 
			'partials/intro-header',
			'intro-header',
			array(
				'url' => $thumb
			)
		);
	?>
    <div class="container">
        <div class="welcome-user">
            <?php
                while ( have_posts() ) :
                    the_post();
                        
                ?>
                
                    <?php the_content();?>
                    
                <?php
                    endwhile; // End of the loop.
                ?>
        </div>
        </div>
   
    <?php
   
get_footer();
