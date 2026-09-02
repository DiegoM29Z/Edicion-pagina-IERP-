<?php get_header(); ?>

<main class="site-main">
	<section class="container bg-background-light dark:bg-background-dark">
		<div class="max-w-7xl mx-auto py-8 px-4 sm:px-6 lg:px-8">
			<header class="page-header text-center mb-12">
				<?php
				the_archive_title('<h1 class="text-3xl lg:text-4xl font-bold text-text-light dark:text-text-dark font-display mb-4">', '</h1>');

				$archive_description = get_the_archive_description();
				if (!empty($archive_description)) {
					echo "<p class=\"text-lg text-text-light dark:text-text-dark max-w-2xl mx-auto\">{$archive_description}</p>";
				}
				?>
			</header>

			<div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
				<?php
				$args = [
					'post_type' => ['comunicado', 'profesor'],
					'posts_per_page' => 12,
					'orderby' => 'date',
					'order' => 'DESC',
					'tax_query' => [
						[
							'taxonomy' => 'category',
							'field' => 'slug',
							'terms' => get_query_var('category_name'),
						],
					],
				];

				$mixed_query = new WP_Query($args);

				if ($mixed_query->have_posts()):
					while ($mixed_query->have_posts()):
						$mixed_query->the_post();
						$post_type = get_post_type();
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
									<div
										class="h-full bg-brand-primary text-white/10 transition-transform duration-500 group-hover:scale-105">
										<svg viewBox="0 0 1000 500" fill="currentColor" class="w-full h-full">
											<circle cx="200" cy="100" r="80" opacity="0.1" />
											<circle cx="800" cy="150" r="120" opacity="0.05" />
											<circle cx="400" cy="400" r="100" opacity="0.08" />
										</svg>
									</div>
									<div class="absolute inset-0 flex items-center justify-center p-4 text-white">
										<div class="text-center">
											<span class="block text-lg font-semibold">
												<?php echo $post_type === 'profesor' ? 'Profesor' : 'Comunicado'; ?>
											</span>
											<span
												class="block text-sm opacity-80 uppercase font-bold"><?php echo get_bloginfo('name'); ?></span>
										</div>
									</div>
								</div>
							<?php endif; ?>

							<div class="p-6">
								<div class="flex items-center justify-between mb-3">
									<div class="flex flex-wrap gap-2">
										<?php
										$categories = get_the_category();
										if (!empty($categories)) {
											foreach ($categories as $category) {
												echo '<a href="' . esc_url(get_category_link($category->term_id)) . '" class="text-xs font-medium text-brand-primary bg-brand-primary/10 px-2 py-1 rounded-full hover:bg-primary/20 transition-colors">' . esc_html($category->name) . '</a>';
											}
										}
										?>
									</div>
									<time class="text-xs text-gray-500 dark:text-gray-400"
										datetime="<?php echo get_the_date('c'); ?>">
										<?php echo get_the_date('j M, Y'); ?>
									</time>
								</div>

								<h3 class="text-xl font-semibold text-text-light dark:text-text-dark mb-2 line-clamp-2">
									<a href="<?php the_permalink(); ?>" class="hover:text-brand-primary transition-colors">
										<?php the_title(); ?>
									</a>
								</h3>

								<p class="text-text-light dark:text-text-dark text-sm line-clamp-3">
									<?php echo wp_trim_words(get_the_excerpt(), 15); ?>
								</p>

								<?php
								
								if ($post_type === 'comunicado') {
									$fecha_evento = get_post_meta(get_the_ID(), '_fecha_evento', true);
									if ($fecha_evento): ?>
										<div
											class="flex items-center mt-4 p-2 bg-blue-50 dark:bg-blue-900/20 rounded-lg border border-blue-100 dark:border-blue-800">
											<div
												class="flex-shrink-0 w-8 h-8 bg-brand-primary rounded-full flex items-center justify-center mr-3">
												<svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
													<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
														d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
													</path>
												</svg>
											</div>
											<div>
												<p class="text-sm font-semibold text-gray-900 dark:text-text-dark">Fecha del evento</p>
												<p class="text-sm text-gray-700 dark:text-gray-300">
													<?php echo esc_html(date_i18n('j \d\e F, Y', strtotime($fecha_evento))); ?></p>
											</div>
										</div>
									<?php endif;
								}
								?>

								<div
									class="flex items-center justify-between pt-4 mt-4 border-t border-gray-100 dark:border-gray-700">
									<a href="<?php the_permalink(); ?>"
										class="inline-flex items-center text-brand-primary hover:text-brand-secondary font-semibold text-sm transition-colors group/btn">
										<?php echo $post_type === 'profesor' ? 'Ver Actividad' : 'Leer más'; ?>
										<svg class="w-4 h-4 ml-1 transform group-hover/btn:translate-x-1 transition-transform"
											fill="none" stroke="currentColor" viewBox="0 0 24 24">
											<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
												d="M9 5l7 7-7 7"></path>
										</svg>
									</a>

									<?php
									if ($post_type === 'comunicado') {
										$pdf_url = get_post_meta(get_the_ID(), '_pdf_url', true);
										if ($pdf_url): ?>
											<a href="<?php echo esc_url($pdf_url); ?>" target="_blank"
												class="inline-flex items-center text-gray-600 dark:text-gray-400 hover:text-red-600 transition-colors group/pdf"
												title="Descargar PDF">
												<svg class="w-5 h-5 mr-2 group-hover/pdf:scale-110 transition-transform"
													viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
													<g id="SVGRepo_bgCarrier" stroke-width="0"></g>
													<g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
													<g id="SVGRepo_iconCarrier">
														<path
															d="M4 4C4 3.44772 4.44772 3 5 3H14H14.5858C14.851 3 15.1054 3.10536 15.2929 3.29289L19.7071 7.70711C19.8946 7.89464 20 8.149 20 8.41421V20C20 20.5523 19.5523 21 19 21H5C4.44772 21 4 20.5523 4 20V4Z"
															stroke="currentColor" stroke-width="2" stroke-linecap="round"></path>
														<path d="M20 8H15V3" stroke="currentColor" stroke-width="2"
															stroke-linecap="round" stroke-linejoin="round"></path>
														<path
															d="M11.5 13H11V17H11.5C12.6046 17 13.5 16.1046 13.5 15C13.5 13.8954 12.6046 13 11.5 13Z"
															stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
															stroke-linejoin="round"></path>
														<path d="M15.5 17V13L17.5 13" stroke="currentColor" stroke-width="1.5"
															stroke-linecap="round" stroke-linejoin="round"></path>
														<path d="M16 15H17" stroke="currentColor" stroke-width="1.5"
															stroke-linecap="round" stroke-linejoin="round"></path>
														<path
															d="M7 17L7 15.5M7 15.5L7 13L7.75 13C8.44036 13 9 13.5596 9 14.25V14.25C9 14.9404 8.44036 15.5 7.75 15.5H7Z"
															stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
															stroke-linejoin="round"></path>
													</g>
												</svg>
												<span class="text-sm font-medium">PDF</span>
											</a>
										<?php endif;
									}
									?>
								</div>
							</div>
						</article>
					<?php endwhile;
					wp_reset_postdata();
				else: ?>
					<div class="col-span-full flex justify-center">
						<p class="bg-brand-primary-100 p-4 rounded-md text-text-light dark:text-text-dark">No hay contenido
							disponible en esta categoría.</p>
					</div>
				<?php endif; ?>
			</div>

			<!-- Paginación -->
			<div class="mt-8 flex justify-center">
				<?php
				the_posts_pagination([
					'mid_size' => 2,
					'prev_text' => __('« Anterior'),
					'next_text' => __('Siguiente »'),
				]);
				?>
			</div>
		</div>
	</section>
</main>

<?php get_footer(); ?>