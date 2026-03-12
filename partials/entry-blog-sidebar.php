<article>
	<a href="<?php echo $args['post-url']; ?>">
		<div class="recent-posts__image">
			<img src="<?php echo $args['image-url']; ?>" alt="">
		</div>
		<div class="recent-posts__info">
			<h3>
				<?php echo $args['post-title']; ?>
			</h3>
			<time datetime="2023-03-24"><?php echo $args['date']; ?></time>
		</div>
	</a>
</article>