<div class="tab-challengue">
	<div class="tab-challengue__content">
		<p><?php echo $args['title-challengue']; ?></p>
		<span><?php echo $args['photo-number']; ?></span>
	</div>
	<a 
	href="#" 
	class="lightbox gallery-item tab-challengue__item"
	>
	<?php foreach ( $args['gallery'] as $key => $value ) : ?>
	<!-- Colocar  la imagen principal, es decir la que sale en la página -->
		<?php // var_dump($value); ?>
		<?php if ( $key === 0 ) : ?>
		<img 
			class="img-responsive" 
			src="<?php echo esc_url( $value['url-image'] ); ?>" 
			data-sub-html="<?php echo esc_attr( $value['content-title'] ); ?>
			<?php
			if ( $value['content-description'] ) :
				echo '<p>' . strip_tags( esc_attr( $value['content-description'] ) ) . '</p>';
endif;
			?>
			<?php
			if ( $value['destination-parent'] ) :
				echo '<br />' . $value['destination-parent'];
endif;
			?>
			<?php
			if ( $value['destination-child'] ) :
				echo '<br />' . $value['destination-child'];
endif;
			?>
"
			data-exthumbimage="<?php echo esc_url( $value['url-image'] ); ?>" 
			data-src="<?php echo esc_url( $value['url-image'] ); ?>" 
			data-post-id="<?php echo $value['post-id']; ?>"
			data-tweet-text="<?php echo $args['x-title']; ?>"
			data-facebook-share-url="<?php echo home_url() . '/mi-perfil/?uid=' . getUserId() . '#lg=gal' . $args['gallery-number'] . '&slide=' . $key; ?>"
			alt=""
		>
		<?php else : ?>
		<!-- Colocar  la imagenes correspondientes a la galería de la imagen princiapl (Thumbnails del modal)-->
		
		<div 
			data-sub-html="<?php echo esc_attr( $value['content-title'] ); ?>
			<?php
			if ( $value['content-description'] ) :
				echo '<p>' . strip_tags( esc_attr( $value['content-description'] ) ) . '</p>';
endif;
			?>
			<?php
			if ( $value['destination-parent'] ) :
				echo '<br />' . $value['destination-parent'];
endif;
			?>
			<?php
			if ( $value['destination-child'] ) :
				echo '<br />' . $value['destination-child'];
endif;
			?>
" 
			data-src="<?php echo esc_url( $value['url-image'] ); ?>"
			data-exthumbimage="<?php echo esc_url( $value['url-image'] ); ?>"
			data-post-id="<?php echo $value['post-id']; ?>"
			data-tweet-text="<?php echo $args['x-title']; ?>"
			data-facebook-share-url="<?php echo home_url() . '/mi-perfil/?uid=' . getUserId() . '#lg=gal' . $args['gallery-number'] . '&slide=' . $key; ?>"
		>
		</div>
		<?php endif; ?>
	<?php endforeach; ?>
	</a>
</div>
