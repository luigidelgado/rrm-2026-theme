<?php /* Template Name: Single Challenge */ ?>
<?php get_header(); ?>

<?php 
    get_template_part( 
        'partials/intro-header',
        'intro-header',
        array(
            'url' => get_template_directory_uri().'/assets/images/challenges/headeimage.png'
        )
    );
?>


<div class="container">
	<div class="single-challenge-content">
		<main>
            <div class="single-challenge-content__the-content">

			<!-- Aqui va el content -->
			<!-- Para las tablas se utilizo el diseño de froy con la clase is-style-regular -->
                <p>
                    Bienvenido al desafío Carreteras Famosas, en todo el territorio nacional podemos encontrar diversas geografías que permiten el trazado de carreteras con diferentes grados de experticia o bien ofrecen un atractivo particular ya sea natural, panorámico o de experiencia al transitar por ellas, honramos a los pilotos que tienen la valentía de rodarlas y sumarlas a su récord personal de caminos rodados.
                </p>
                <p> 
                    El reto es rodar en tu motocicleta por estos caminos legendarios, vivir la experiencia y guardar en tu memoria cada kilómetro vivido que servirá de anecdotario para futuras generaciones de moto turistas, de viva voz de quien rodó estos caminos.
                </p>
            </div>
            <!-- Estructura definida -->
            <div class="single-challenge-content__defined">
                <div class="single-challenge-content__objetive">
					<div>
						<h3>Objetivo</h3>
						<p>
							Rodar las carreteras más famosas de México.
						</p>
					</div>
                </div>
                <div class="single-challenge-content__patch">
					<div>
						<h3>Parche</h3>
						<img src="<?php echo get_template_directory_uri().'/assets/images/challenges/carreteras-famosas.png'; ?>" alt="">
					</div>
                </div>
            </div>
            <!-- Estructura definida -->
			<div class="single-challenge-content__the-content">
				<h2>Total de piezas: 4</h2>
				<p>
					Bases de participación: Deberás estar debidamente registrado y ser miembro del programa RRM que incluye tu kit de participación.
				</p>
				<p>
					Para evidenciar tu visita y rodada por las Carreteras Famosas de México deberás tomar una fotografía misma que debe contener las siguientes 4 características elementales sin que falte alguna de ellas en la foto.
				</p>
				<ol>
					<li>
						La fotografía debe ser tomada en alguna de las Carreteras Famosas que aparezcan en el listado oficial que se encuentra en esta página. Debes encontrar algo identificable que ayude a determinar que estas en ese lugar (un letrero en carretera con el escudo y número de la misma, panorámica, formación natural, señalización en el camino, etc.).
					</li>
					<li>
						El segundo elemento a visualizarse en la fotografía será tu motocicleta, incansable compañera de viaje y testigo presencial de las aventuras en la vida del Motociclista.
					</li>
					<li>
						En la fotografía deberás aparecer Tú como parte de la imagen con tu bandera oficial RRM que se considera el 4to elemento que debe apreciarse en la fotografía.
					</li>

					</li>
				</ol>
				<!-- Aqui va el content (End) -->
			</div>
			<div class="challengue-roads">
				<h3>LISTADO OFICIAL  PARA EL DESAFÍO CARRETERAS FAMOSAS</h3>
				<div class="challengue-roads-table">
					<div>
						<div>
							1
						</div>
						<div>
							Carretera Federal 45 - Panamericana
						</div>
						<div>
							Aguascalientes
						</div>
					</div>
					<div>
						<div>
							2
						</div>
						<div>
							Carretera Tijuana - Ensenada “La Cenicienta del Pacifico
						</div>
						<div>
							Baja California
						</div>
					</div>
					<div>
						<div>
							3
						</div>
						<div>
							La Rumorosa - Mexicali
						</div>
						<div>
							Baja California
						</div>
					</div>
					<div>
						<div>
							4
						</div>
						<div>
							La Rumorosa - Mexicali
						</div>
						<div>
							Baja California
						</div>
					</div>
				</div>
			</div>
		</main>
		<aside>
			<div class="aside-component recent-posts">
				<h2>Otros desafios</h2>
				<?php 
					get_template_part( 
						'partials/entry-blog-sidebar',
						'entry-blog-sidebar',
						array(
							'image-url' => get_template_directory_uri().'/assets/images/blog/gallery-3.jpg',
							'post-title' => "DESAFÍO MÉXICO AZUL",
						)
					);
				?>
			    <?php 
					get_template_part( 
						'partials/entry-blog-sidebar',
						'entry-blog-sidebar',
						array(
							'image-url' => get_template_directory_uri().'/assets/images/blog/gallery-3.jpg',
							'post-title' => "DESAFÍO MÉXICO X-TREMO",
						)
					);
				?>
			</div>
			<div class="aside-component categories">
				<h2>Categorias</h2>
				<ul>
					<li>
						<a href="#">
							El parche
						</a>
					</li>
					<li>
						<a href="#">
							Motocicletas
						</a>
					</li>
					<li>
						<a href="#">
							Caminos
						</a>
					</li>
					<li>
						<a href="#">
							Reparación
						</a>
					</li>
					<li>
						<a href="#">
							LLantas
						</a>
					</li>
					<li>
						<a href="#">
							LLantas
						</a>
					</li>
					<li>
						<a href="#">
							LLantas
						</a>
					</li>
				</ul>
			</div>
		
		</aside>
	</div>
</div>

<?php get_footer(); ?>