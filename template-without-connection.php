
<?php /* Template Name: Without Connection*/ ?>

<?php get_header(); ?>

	<div class="not-found-container">
		<img src="<?php echo get_template_directory_uri().'/assets/images/404/paisaje-montana-carretera.png'; ?>" alt="">
		<div class="container">
			<?php woocommerce_breadcrumb();  ?>
			<div class="not-found">
				<div class="not-found__main-content">
                <?php
                        while ( have_posts() ) :
                            the_post();
                                
                            ?>
                            	<h2>
                                    <?php the_title(); ?>
                                </h2>
                                
                                <?php the_content();?>
                                
                        <?php
                            endwhile; // End of the loop.
                    ?>
				
					<!-- <h2>
						LA PÁGINA SOLICITADA NO EXISTE.
					</h2> -->
					<!-- <p>
                        En este momento no tienes acceso a internet.
					<p> -->
					
					<a href="<?php echo get_home_url(); ?>">
						Volver al inicio
					</a>
				</div>
			</div>
		</div>
	</div>
	

<?php
get_footer();
