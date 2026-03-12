<a href="<?php echo esc_url( $args['post-url'] ); ?>" class="profile-entry">
	<div class="profile-entry--top">
		<div class="profile-entry__image">
			<?php echo wp_kses_post( $args['profile-image-url'] ); ?>
		</div>
		<?php if ( $args['member-active'] ) : ?>
		<div class="profile-entry__verified">
			<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/hall_of_fame/verified.svg' ); ?>" alt="">
		</div>
		<?php endif; ?>
		<div class="profile-entry__name">
			<?php echo esc_html( $args['profile-name'] ); ?>
			<?php if ( $args['member-active'] ) : ?>
			<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/hall_of_fame/verified.svg' ); ?>" alt="">
			<?php endif; ?>
		</div>
		<div class="profile-entry__status">
			<?php echo esc_html( $args['profile-status'] ); ?>
		</div>
		<div class="profile-entry__description">
			<?php echo wp_kses_post( $args['profile-description'] ); ?>
		</div>
	</div>
	<div class="profile-entry--bottom">
		<div class="profile-entry__medals">
			<ul>
				<?php
				foreach ( $args['profile-medals'] as $key => $value ) :
					?>
					<li>
					<?php echo wp_get_attachment_image( get_field( 'logo', $value ) ); ?>
					</li>
					<?php
					endforeach;
				?>
			</ul>
		</div>
		<button>
			Ver perfil
		</button>
	</div>
</a>
