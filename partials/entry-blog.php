<article class="archive-post">
	<div class="archive-post__image">
		<img src="<?php echo esc_url( $args['url'] ); ?>" alt="">
		<div class="archive-post__social">
			<ul>
				<li>
					<a href="<?php echo esc_url( $args['url-post'] ); ?>" id="copy-link">
						<img src="<?php echo get_template_directory_uri() . '/assets/images/blog/share.svg'; ?>" alt="">
					</a>
				</li>
				<li>
					<a href="<?php echo esc_url( $args['share-facebook'] ); ?>" target="_blank">
						<img src="<?php echo get_template_directory_uri() . '/assets/images/blog/fb.svg'; ?>" alt="">
					</a>
				</li>
				<li>
					<a href="<?php echo esc_url( $args['share-twitter'] ); ?>" target="_blank">
						<img src="<?php echo get_template_directory_uri() . '/assets/images/blog/twitter.svg'; ?>" alt="">
					</a>
				</li>
				<li>
					<a href="<?php echo esc_url( $args['share-whatsapp'] ); ?>" target="_blank">
						<img src="<?php echo get_template_directory_uri() . '/assets/images/blog/whatsapp.svg'; ?>" alt="">
					</a>
				</li>
			</ul>
		</div>
	</div>
	<div class="archive-post__info">
		<a class="archive-post__title" href="<?php echo esc_url( $args['url-post'] ); ?>">
			<h2>
				<?php echo $args['title']; ?>
			</h2>
		</a>
		<time datetime="2023-03-24">
			<?php echo $args['time']; ?>
		</time>
		<?php if ( ! empty( $args['excerpt'] ) ) : ?>
		<p><?php echo $args['excerpt']; ?></p>
		<?php endif; ?>
		<a class="archive-post__button" href="<?php echo esc_url( $args['url-post'] ); ?>">
			Leer más
		</a>
	</div>
	
</article>