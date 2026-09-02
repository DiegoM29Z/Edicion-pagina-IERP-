<?php
/**
 * The main template file for the front page
 *
 * @package edusiteco
 */

get_header();
?>

<main id="primary" class="site-main">

	<!-- Hero Section - Carrusel -->
	<section class="hero-section relative bg-gray-100">
		<div class="swiper-container overflow-hidden">
			<div class="swiper-wrapper">
				<?php
				// Query para los comunicados destacados
				$comunicados_destacados = new WP_Query(array(
					'post_type' => 'comunicado',
					'posts_per_page' => 4,
					'meta_query' => array(
						array(
							'key' => '_es_destacado',
							'value' => '1',
							'compare' => '=',
						),
					),
				));

				if ($comunicados_destacados->have_posts()):
					while ($comunicados_destacados->have_posts()):
						$comunicados_destacados->the_post();
						$has_thumbnail = has_post_thumbnail();
						$background_style = '';
						if ($has_thumbnail) {
							$background_style = 'style="background-image: url(\'' . esc_url(get_the_post_thumbnail_url(get_the_ID(), 'large')) . '\')"';
						}
						?>
						<div class="swiper-slide relative">
							<div class="bg-cover bg-center h-96 lg:h-[600px] <?php echo !$has_thumbnail ? 'bg-gray-700' : ''; ?>"
								<?php echo $background_style; ?>>

								<?php if (!$has_thumbnail): ?>
									<div class="absolute inset-0 bg-gradient-custom bg-opacity-50"></div>
								<?php endif; ?>

								<div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-full flex items-center">
									<div class="text-white max-w-2xl">
										<span
											class="<?php echo $has_thumbnail ? 'bg-brand-primary text-white' : 'bg-white text-brand-primary' ?> px-3 py-1 rounded-md text-sm font-bold mb-4 inline-block">Comunicado</span>
										<h2 class="text-4xl lg:text-6xl font-bold font-display mb-4 line-clamp-2">
											<?php the_title(); ?>
										</h2>
										<div class="text-xl lg:text-2xl mb-8 line-clamp-3">
											<?php the_excerpt(); ?>
										</div>
										<a href="<?php the_permalink(); ?>"
											class="bg-white hover:bg-gray-100 text-brand-primary px-8 py-3 rounded-lg font-semibold text-lg transition-colors inline-block">
											Leer más
										</a>
									</div>
								</div>
							</div>
						</div>
						<?php
					endwhile;
					wp_reset_postdata();
				else:
					// Fallback: si no hay comunicados destacados, muestra un slide por defecto
					?>
					<div class="swiper-slide relative">
						<div class="bg-cover bg-center h-96 lg:h-[600px]"
							style="background-image: url('<?php echo get_theme_file_uri("assets/img/hero.jpg"); ?>')">
							<div class="absolute inset-0 bg-gradient-custom bg-opacity-40"></div>
							<div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-full flex items-center">
								<div class="text-white max-w-2xl">
									<h1 class="text-4xl lg:text-6xl font-bold font-display mb-4">Bienvenidos a
										<?php echo get_bloginfo('name'); ?>
									</h1>
									<p class="text-xl lg:text-2xl mb-8">Formando líderes para el futuro con excelencia
										académica y valores</p>
								</div>
							</div>
						</div>
					</div>
				<?php endif; ?>
			</div>

			<!-- Navigation -->
			<div class="swiper-button-next text-white mr-4"></div>
			<div class="swiper-button-prev text-white ml-4"></div>
			<div class="swiper-pagination"></div>
		</div>
	</section>

	<!-- Sección de Comunicados -->
	<section class="py-16 bg-background-light dark:bg-background-dark">
		<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
			<div class="text-center mb-12">
				<h2 class="text-3xl lg:text-4xl font-bold text-text-light dark:text-text-dark font-display mb-4">
					Comunicados Recientes</h2>
				<p class="text-text-light dark:text-text-dark max-w-2xl mx-auto">Mantente informado sobre las
					últimas noticias y anuncios de nuestra institución</p>
			</div>

			<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
				<?php
				// Query para los últimos 4 comunicados
				$comunicados = new WP_Query(array(
					'post_type' => 'comunicado',
					'posts_per_page' => 4,
				));

				if ($comunicados->have_posts()):
					while ($comunicados->have_posts()):
						$comunicados->the_post();
						?>
						<article
							class="bg-white dark:bg-gray-800 rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow border border-border-light dark:border-border-dark">
							<?php if (has_post_thumbnail()): ?>
								<div class="h-48 overflow-hidden">
									<img src="<?php the_post_thumbnail_url('medium'); ?>" alt="<?php the_title(); ?>"
										class="w-full h-full object-cover" />
								</div>
							<?php else: ?>
								<div class="h-48 relative overflow-hidden">
									<!-- Fondo con SVG -->
									<div
										class="h-full bg-brand-primary text-white/10 transition-transform duration-500 group-hover:scale-105">
										<svg viewBox="0 0 1000 500" fill="currentColor" class="w-full h-full">
											<circle cx="200" cy="100" r="80" opacity="0.1" />
											<circle cx="800" cy="150" r="120" opacity="0.05" />
											<circle cx="400" cy="400" r="100" opacity="0.08" />
										</svg>
									</div>
									<!-- Texto superpuesto -->
									<div class="absolute inset-0 flex items-center justify-center p-4 text-white">
										<div class="text-center">
											<span class="block text-lg font-semibold">Comunicado</span>
											<span
												class="block text-sm opacity-80 uppercase font-bold"><?php echo get_bloginfo('name'); ?></span>
										</div>
									</div>
								</div>
							<?php endif; ?>

							<div class="p-6">
								<h3 class="text-xl font-semibold text-text-light dark:text-text-dark mb-2 line-clamp-2">
									<a href="<?php the_permalink(); ?>" class="hover:text-brand-primary transition-colors">
										<?php the_title(); ?>
									</a>
								</h3>

								<div class="flex items-center text-sm text-gray-500 dark:text-gray-400 mb-3">
									<span class="material-icons text-xs mr-1">event</span>
									<time datetime="<?php echo get_the_date('c'); ?>">
										<?php echo get_the_date(); ?>
									</time>
								</div>

								<p class="text-text-light dark:text-text-dark text-sm line-clamp-3">
									<?php echo wp_trim_words(get_the_excerpt(), 15); ?>
								</p>

								<a href="<?php the_permalink(); ?>"
									class="inline-block mt-4 text-brand-primary hover:text-brand-secondary font-semibold text-sm transition-colors">
									Leer más →
								</a>
							</div>
						</article>
						<?php
					endwhile;
					wp_reset_postdata();
				else:
					?>
					<!-- Comunicados de ejemplo cuando no hay posts -->
					<?php for ($i = 1; $i <= 4; $i++): ?>
						<article
							class="bg-white dark:bg-gray-800 rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow border border-border-light dark:border-border-dark">
							<div class="h-48 bg-gray-200 dark:bg-gray-700 flex items-center justify-center">
								<span class="text-gray-400 dark:text-gray-500 material-icons text-4xl">article</span>
							</div>
							<div class="p-6">
								<h3 class="text-xl font-semibold text-text-light dark:text-text-dark mb-2">
									Comunicado Importante <?php echo $i; ?>
								</h3>
								<div class="flex items-center text-sm text-gray-500 dark:text-gray-400 mb-3">
									<span class="material-icons text-xs mr-1">event</span>
									<time><?php echo date('j M Y'); ?></time>
								</div>
								<p class="text-text-light dark:text-text-dark text-sm">
									Información relevante sobre actividades y anuncios de la institución educativa.
								</p>
								<a href="#"
									class="inline-block mt-4 text-brand-primary hover:text-brand-secondary font-semibold text-sm transition-colors">
									Leer más →
								</a>
							</div>
						</article>
					<?php endfor; ?>
				<?php endif; ?>
			</div>

			<div class="text-center">
				<a href="<?php echo get_post_type_archive_link('comunicado'); ?>"
					class="bg-brand-primary hover:bg-brand-secondary text-white px-8 py-3 rounded-lg font-semibold transition-colors inline-flex items-center">
					Ver todos los comunicados
					<span class="material-icons ml-2">arrow_forward</span>
				</a>
			</div>
		</div>
	</section>

	<!-- Sección de Sedes -->
	<section id="campuses" class="py-16 bg-gray-50 dark:bg-gray-900">
		<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
			<div class="text-center mb-12">
				<h2 class="text-3xl lg:text-4xl font-bold text-text-light dark:text-text-dark font-display mb-4">
					Nuestras Sedes</h2>
				<p class="text-text-light dark:text-text-dark max-w-2xl mx-auto">Conoce nuestras instalaciones y
					ubicaciones estratégicas</p>
			</div>

			<div class="grid grid-cols-1 md:grid-cols-3 gap-8">
				<!-- Sede Principal -->
				<div
					class="bg-white dark:bg-gray-800 rounded-lg shadow-md overflow-hidden border border-border-light dark:border-border-dark">
					<div class="h-48 bg-gradient-custom flex items-center justify-center">
						<span class="text-white material-icons text-6xl">school</span>
					</div>
					<div class="p-6">
						<h3 class="text-xl font-semibold text-text-light dark:text-text-dark mb-3">Sede Principal</h3>
						<div class="space-y-2 text-sm text-text-light dark:text-text-dark">
							<div class="flex items-start">
								<span class="material-icons text-brand-primary text-base mr-2 mt-0.5">location_on</span>
								<span>Carrera 15 #445-67, Barrio Centro, Bogotá D.C.</span>
							</div>
							<div class="flex items-center">
								<span class="material-icons text-brand-primary text-base mr-2">phone</span>
								<span>(601) 234-5678</span>
							</div>
							<div class="flex items-center">
								<span class="material-icons text-brand-primary text-base mr-2">schedule</span>
								<span>7:00 AM - 4:00 PM</span>
							</div>
						</div>
						<a href="#"
							class="mt-4 inline-flex items-center text-brand-primary hover:text-brand-secondary font-semibold transition-colors">
							Ver más información
							<span class="material-icons ml-1 text-sm">chevron_right</span>
						</a>
					</div>
				</div>

				<!-- Sede Norte -->
				<div
					class="bg-white dark:bg-gray-800 rounded-lg shadow-md overflow-hidden border border-border-light dark:border-border-dark">
					<div class="h-48 bg-gradient-custom flex items-center justify-center">
						<span class="text-white material-icons text-6xl">location_city</span>
					</div>
					<div class="p-6">
						<h3 class="text-xl font-semibold text-text-light dark:text-text-dark mb-3">Sede Norte</h3>
						<div class="space-y-2 text-sm text-text-light dark:text-text-dark">
							<div class="flex items-start">
								<span class="material-icons text-brand-primary text-base mr-2 mt-0.5">location_on</span>
								<span>Calle 100 #45-20, Usaquén, Bogotá D.C.</span>
							</div>
							<div class="flex items-center">
								<span class="material-icons text-brand-primary text-base mr-2">phone</span>
								<span>(601) 234-5679</span>
							</div>
							<div class="flex items-center">
								<span class="material-icons text-brand-primary text-base mr-2">schedule</span>
								<span>7:00 AM - 4:00 PM</span>
							</div>
						</div>
						<a href="#"
							class="mt-4 inline-flex items-center text-brand-primary hover:text-brand-secondary font-semibold transition-colors">
							Ver más información
							<span class="material-icons ml-1 text-sm">chevron_right</span>
						</a>
					</div>
				</div>

				<!-- Sede Sur -->
				<div
					class="bg-white dark:bg-gray-800 rounded-lg shadow-md overflow-hidden border border-border-light dark:border-border-dark">
					<div class="h-48 bg-gradient-custom flex items-center justify-center">
						<span class="text-white material-icons text-6xl">apartment</span>
					</div>
					<div class="p-6">
						<h3 class="text-xl font-semibold text-text-light dark:text-text-dark mb-3">Sede Sur</h3>
						<div class="space-y-2 text-sm text-text-light dark:text-text-dark">
							<div class="flex items-start">
								<span class="material-icons text-brand-primary text-base mr-2 mt-0.5">location_on</span>
								<span>Diagonal 45 Sur #25-80, Rafael Uribe, Bogotá D.C.</span>
							</div>
							<div class="flex items-center">
								<span class="material-icons text-brand-primary text-base mr-2">phone</span>
								<span>(601) 234-5680</span>
							</div>
							<div class="flex items-center">
								<span class="material-icons text-brand-primary text-base mr-2">schedule</span>
								<span>7:00 AM - 4:00 PM</span>
							</div>
						</div>
						<a href="#"
							class="mt-4 inline-flex items-center text-brand-primary hover:text-brand-secondary font-semibold transition-colors">
							Ver más información
							<span class="material-icons ml-1 text-sm">chevron_right</span>
						</a>
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- Sección Institucional -->
	<section id="about" class="py-16 bg-background-light dark:bg-background-dark">
		<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
			<div class="text-center mb-12">
				<h2 class="text-3xl lg:text-4xl font-bold text-text-light dark:text-text-dark font-display mb-4">
					Nuestra Institución
				</h2>
				<p class="text-text-light dark:text-text-dark max-w-2xl mx-auto">
					Comprometidos con la excelencia educativa y la formación integral
				</p>
			</div>

			<div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center mb-16">
				<div>
					<h3 class="text-2xl font-bold text-text-light dark:text-text-dark mb-6 font-display">
						Nuestra Historia
					</h3>
					<p class="text-text-light dark:text-text-dark mb-4 leading-relaxed">
						Fundada en 1985, nuestra institución ha sido pionera en la educación de calidad, formando
						generaciones de profesionales y ciudadanos comprometidos con el desarrollo del país.
					</p>
					<p class="text-text-light dark:text-text-dark leading-relaxed">
						A lo largo de más de tres décadas, hemos mantenido nuestro compromiso con la excelencia
						académica, la innovación educativa y la formación en valores.
					</p>

					<?php
					$history_page = get_page_by_path('historia');
					$history_url = $history_page ? get_permalink($history_page->ID) : '#';
					?>

					<a href="<?php echo esc_url($history_url); ?>"
						class="mt-6 inline-block text-brand-primary hover:text-brand-secondary hover:underline underline-offset-2 font-semibold transition-colors">
						Leer más ...
					</a>
				</div>
				<div class="bg-gray-200 dark:bg-gray-700 h-80 rounded-lg flex items-center justify-center">
					<span class="text-gray-400 dark:text-gray-500 material-icons text-6xl">history_edu</span>
				</div>
			</div>

			<div class="grid grid-cols-1 md:grid-cols-3 gap-8">
				<!-- Misión -->
				<div
					class="text-center p-6 bg-white dark:bg-gray-800 rounded-lg shadow-md border border-border-light dark:border-border-dark">
					<div class="w-16 h-16 bg-brand-primary rounded-full flex items-center justify-center mx-auto mb-4">
						<span class="material-icons text-white">flag</span>
					</div>
					<h3 class="text-xl font-semibold text-text-light dark:text-text-dark mb-4">Misión</h3>
					<p class="text-text-light dark:text-text-dark leading-relaxed">
						Formar ciudadanos íntegros y competentes mediante una educación de calidad que promueva el
						desarrollo intelectual, ético y social, contribuyendo al progreso de la sociedad.
					</p>
				</div>

				<!-- Visión -->
				<div
					class="text-center p-6 bg-white dark:bg-gray-800 rounded-lg shadow-md border border-border-light dark:border-border-dark">
					<div class="w-16 h-16 bg-brand-warning rounded-full flex items-center justify-center mx-auto mb-4">
						<span class="material-icons text-white">visibility</span>
					</div>
					<h3 class="text-xl font-semibold text-text-light dark:text-text-dark mb-4">Visión</h3>
					<p class="text-text-light dark:text-text-dark leading-relaxed">
						Ser reconocidos como la institución educativa líder en innovación pedagógica y formación
						integral, siendo referente de excelencia académica a nivel nacional.
					</p>
				</div>

				<!-- Valores -->
				<div
					class="text-center p-6 bg-white dark:bg-gray-800 rounded-lg shadow-md border border-border-light dark:border-border-dark">
					<div class="w-16 h-16 bg-brand-accent rounded-full flex items-center justify-center mx-auto mb-4">
						<span class="material-icons text-white">favorite</span>
					</div>
					<h3 class="text-xl font-semibold text-text-light dark:text-text-dark mb-4">Valores</h3>
					<ul class="text-text-light dark:text-text-dark space-y-2 text-left">
						<li class="flex items-center">
							<span class="material-icons text-brand-primary mr-2">check_circle</span>
							Respeto y tolerancia
						</li>
						<li class="flex items-center">
							<span class="material-icons text-brand-primary mr-2">check_circle</span>
							Responsabilidad
						</li>
						<li class="flex items-center">
							<span class="material-icons text-brand-primary mr-2">check_circle</span>
							Honestidad
						</li>
						<li class="flex items-center">
							<span class="material-icons text-brand-primary mr-2">check_circle</span>
							Excelencia
						</li>
					</ul>
				</div>
			</div>
		</div>
	</section>

	<!-- Llamado a la acción -->
	<section class="py-16 bg-[hsl(var(--color-brand-primary))]">
		<?php
		$contact_page = get_page_by_path('contactanos');
		$contact_url = $contact_page ? get_permalink($contact_page->ID) : '#';
		?>
		<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center animate-fade-in-up">
			<h2 class="text-3xl lg:text-4xl font-bold text-white mb-6">
				Únete a Nuestra Comunidad Educativa
			</h2>
			<p class="text-xl text-white mb-8 max-w-2xl mx-auto">
				Descubre todo lo que tenemos para ofrecer y forma parte de la familia institucional
			</p>
			<div class="flex flex-col sm:flex-row gap-4 justify-center">
				<a href="<?php echo esc_url($contact_url); ?>"
					class="bg-white text-[hsl(var(--color-brand-primary))] px-8 py-3 rounded-full font-semibold text-lg hover:bg-gray-100 transition-all duration-300 transform hover:scale-105">
					Contactanos
				</a>
				<a href="<?php echo get_post_type_archive_link('comunicado'); ?>"
					class="bg-transparent border-2 border-white text-white px-8 py-3 rounded-full font-semibold text-lg hover:bg-white hover:text-[hsl(var(--color-brand-primary))] transition-all duration-300 transform hover:scale-105">
					Ver Últimas Noticias
				</a>
			</div>
		</div>
	</section>

</main><!-- #main -->

<?php
get_footer();