<div class="garage-bike bike-<?php echo absint( $args['id-post'] ); ?>">
	<div class="garage-bike__image">
		<?php if ( $args['user']['current_user']->ID == $args['user']['user_id'] ) : ?>
		<div class="garage-bike-menu">
			<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/profile/edit-bike-icon.svg" alt="bike-edit-menu" />
		</div>
		<div class="tooltip-actions">
			<ul>
				<li class="garage-bike_edit">
					<a href="#" data-id-post="<?php echo absint( $args['id-post'] ); ?>" class="garage-bike_edit-a">
						<span>
							<i class="icon-edit_square"></i>
							Editar moto
						</span>
					</a>
				</li>
				<li class="garage-bike_delete">
					<a href="#" data-id-post="<?php echo absint( $args['id-post'] ); ?>" class="garage-bike_delete-a">
						<span>
							<i class="icon-delete"></i>
							Eliminar moto
						</span>
					</a>
				</li>
			</ul>
		</div>
		<?php endif; ?>
	<?php if ( has_post_thumbnail() ) : ?>
		<img src="<?php echo esc_url( $args['bike-img'] ); ?>" alt="">
	<?php else : ?>
		<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/profile/bike-placeholder2.1.jpg" alt="default-bike" />
	<?php endif; ?>
	</div>
	<?php
		$filterdArray = array_filter(
			$args['features'],
			function ( $item ) {
				if ( ! empty( $item['feature-description'] ) ) {
					return $item;
				}
			}
		)
		?>
	<div class="garage-bike__features <?php echo count( $filterdArray ) % 2 == 0 ? 'even' : 'odd'; ?>">
		<?php foreach ( $args['features'] as $key => $value ) : ?>
			<?php if ( $value['feature-description'] !== '' ) : ?>

				<?php
				$nameFeature = '';
				switch ( $value['feature-name'] ) {
					case 'Nombre o apodo':
						$nameFeature = 'name';
						break;
					case 'Año':
						$nameFeature = 'year';
						break;
					case 'Marca':
						$nameFeature = 'brand';
						break;
					case 'Color':
						$nameFeature = 'color';
						break;
					case 'Estatus':
						$nameFeature = 'status';
						break;
					case 'Estilo':
						$nameFeature = 'style';
						break;
					default:
						$nameFeature = '';
				}
				?>
				<?php if ( isset( $value['feature-id'] ) || $nameFeature == 'name' || $nameFeature == 'year' ) : ?>
					<div class="garage-bike__feature">
						<div><?php echo esc_html( $value['feature-name'] ); ?></div>
						<div
							class="<?php echo esc_attr( $nameFeature ); ?>"
							data-tag-id="
							<?php
							if ( $nameFeature !== 'name' || $nameFeature !== 'year' ) {
								echo absint( $value['feature-id'] );}
							?>
							"><?php echo esc_html( $value['feature-description'] ); ?></div>
					</div>
				<?php endif; ?>
			<?php endif; ?>
		<?php endforeach; ?>
	</div>
</div>
