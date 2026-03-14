<?php /* Template Name: Session */ ?>
<?php get_header(); ?>

<?php
		get_template_part(
			'partials/intro-header',
			'intro-header',
			array(
				'url'            => get_template_directory_uri() . '/assets/images/session/headeimage.jpg',
				'is-transparent' => true,
			)
		);
		?>

<?php
while ( have_posts() ) :
	the_post();

	?>
<div class="login-content">
	<?php the_content(); ?>
</div>
	<?php
			endwhile; // End of the loop.

			echo do_shortcode( '[xs_social_login]' );
?>

<?php get_footer(); ?>