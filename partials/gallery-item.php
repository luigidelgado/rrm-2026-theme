<a class="gallery-item" data-src="<?php echo $args['url-image']; ?>" 
	data-sub-html="<?php echo $args['title-image']; ?>
	<?php
	if ( $args['description-image'] ) :
		echo '<p>' . htmlspecialchars( strip_tags( $args['description-image'] ) ) . '</p>';
endif;
	?>
<?php
if ( $args['destination-parent'] ) :
	echo '<br />' . htmlspecialchars( strip_tags( $args['destination-parent'] ) );
endif;
?>
<?php
if ( $args['destination-child'] ) :
	echo '<br />' . htmlspecialchars( strip_tags( $args['destination-child'] ) );
endif;
?>
<?php echo '<br />' . htmlspecialchars( strip_tags( $args['name-challengue'] ) ); ?>"
	>
	
	<div class="gallery-item__display">
		<figure>
			<img src="<?php echo $args['url-image']; ?>" data-exthumbimage="<?php echo $args['url-image']; ?>" alt="">
		</figure>
		<div class="gallery-item__biker">
			<?php echo $args['biker-image']; ?>
			<!-- <img src="<?php // echo $args['biker-image']; ?>" alt=""> -->
			<div class="gallery-item__biker-description">
				<div>
					<?php echo $args['biker-name']; ?>
					<?php // echo $args['member-active']; ?>
					<?php if ( $args['member-active'] ) : ?>
					<img src="<?php echo get_template_directory_uri() . '/assets/images/gallery/verified-fill.svg'; ?>" alt="">
					<?php endif; ?>
				</div>
				<div>
					<?php echo $args['biker-category']; ?>
				</div>
			</div>
		</div>
	</div>
	<?php
	/*
	?>
	<a
		href="#"
		class="lightbox gallery-item__content"
	>
		<?php if( !empty($args['gallery'])): ?>
		<?php foreach($args['gallery'] as $key => $value): ?>
		<!-- Colocar  la imagen principal, es decir la que sale en la página -->
			<?php if($key === 0): ?>
			<img
				class="img-responsive"
				src="<?php echo $value['url-image']; ?>"
				data-sub-html="<?php echo $value['content-description']; ?>"
				data-exthumbimage="<?php echo $value['url-image']; ?>"
				data-src="<?php echo $value['url-image']; ?>"
				data-slide-name="patzcuaro 12"
				alt=""
			>
			<?php else: ?>
			<!-- Colocar  la imagenes correspondientes a la galería de la imagen princiapl (Thumbnails del modal)-->
			<div
				data-sub-html="<?php echo $value['content-description']; ?>"
				data-src="<?php echo $value['url-image']; ?>"
				data-exthumbimage="<?php echo $value['url-image']; ?>"
				data-slide-name="queretaro"
			>

			</div>
			<?php endif; ?>
		<?php endforeach; ?>
		<?php endif; ?>
	</a>
	<?php // */
	?>
	</a>
