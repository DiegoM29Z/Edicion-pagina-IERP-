<?php
/**
 * PHP file to use when rendering the block type on the server to show on the front end.
 */

// Evitar acceso directo
if (!defined('ABSPATH')) {
    exit;
}

// Verificar que estamos en un CPT 'profesor'
$post_type = get_post_type();
if ($post_type !== 'profesor') {
    return;
}

$title       = $attributes['title'] 		?? '';
$authors 	 = $attributes['authors'] 		?? '';
$image 		 = $attributes['image']['url']  ?? '';
$image_alt   = $attributes['image']['alt']  ?? '';
$description = $attributes['description']   ?? '';
$gallery     = $attributes['gallery'] 		?? [];
$pdf         = $attributes['pdf']['url'] 	?? '';
$pdf_filename = $attributes['pdf']['filename'] ?? '';

?>
<div class="teacher-project border rounded-lg shadow-md p-6 my-4 bg-white dark:bg-gray-800">
	
	<!-- Título -->
	<?php if ($title): ?>
		<h3 class="text-2xl md:text-3xl font-bold !mt-0 mb-2 text-text-light dark:text-text-dark">
			<?php echo esc_html($title); ?>
		</h3>
	<?php endif; ?>

	<!-- Autores -->
	<?php if ($authors): ?>
		<p class="italic text-sm md:text-base text-text-light dark:text-text-dark mb-2">
			Por: <?php echo esc_html($authors); ?>
		</p>
	<?php endif; ?>

	<!-- Contenedor con imagen flotante y texto -->
	<div class="teacher-project__content-wrapper clearfix mb-6">
		<?php if ($image): ?>
			<!-- Imagen flotante estilo revista -->
			<img 
				src="<?php echo esc_url($image); ?>" 
				alt="<?php echo esc_attr($image_alt ?: $title); ?>"
				class="float-left w-full md:w-2/5 lg:w-1/3 !my-0 mr-0 md:mr-6 mb-4 rounded-lg object-cover shadow-md"
				style="max-height: 400px;"
				loading="lazy"
			/>
		<?php endif; ?>

		<?php if ($description): ?>
			<!-- Descripción que fluye alrededor de la imagen -->
			<div class="text-base text-text-light dark:text-text-dark leading-relaxed" style="text-align: justify;">
				<?php 
				// Dividir en párrafos si hay saltos de línea
				$paragraphs = explode("\n", $description);
				foreach ($paragraphs as $paragraph) {
					$paragraph = trim($paragraph);
					if (!empty($paragraph)) {
						echo '<p class="mb-2">' . nl2br(esc_html($paragraph)) . '</p>';
					}
				}
				?>
			</div>
		<?php endif; ?>
	</div>

	<!-- Clear para asegurar que la galería esté debajo -->
	<div class="clear-both"></div>

	<?php if (!empty($gallery)): ?>
		<!-- Galería con Swiper -->
		<div class="teacher-project-gallery mt-6 mb-6">
			<h4 class="text-lg md:text-xl font-semibold text-text-light dark:text-text-dark mb-3">
				📸 Galería del proyecto
			</h4>
			
			<!-- Slider main container -->
			<div class="swiper myswiper relative rounded-lg overflow-hidden shadow-lg" style="--swiper-navigation-color: #fff; --swiper-pagination-color: #fff;">
				<!-- Additional required wrapper -->
				<div class="swiper-wrapper">
					<?php foreach ($gallery as $index => $item): 
						if (!isset($item['url'])) continue;
						$item_url = esc_url($item['url']);
						$item_alt = isset($item['alt']) ? esc_attr($item['alt']) : "Imagen $index de la galería";
						$item_type = isset($item['type']) ? $item['type'] : 'image';
					?>
						<!-- Slides -->
						<div class="swiper-slide">
							<?php if ($item_type === 'image'): ?>
								<div 
									class="bg-cover bg-center h-64 md:h-80 lg:h-96"
									style="background-image: url('<?php echo $item_url; ?>');"
									role="img"
									aria-label="<?php echo $item_alt; ?>"
								></div>
							<?php elseif ($item_type === 'video'): ?>
								<div class="h-64 md:h-80 lg:h-96 bg-black flex items-center justify-center">
									<video 
										src="<?php echo $item_url; ?>" 
										class="max-h-full max-w-full"
										controls
										preload="metadata"
									>
										Tu navegador no soporta el elemento de video.
									</video>
								</div>
							<?php endif; ?>
						</div>
					<?php endforeach; ?>
				</div>
				
				<!-- If we need pagination -->
				<div class="swiper-pagination"></div>

				<!-- If we need navigation buttons -->
				<div class="swiper-button-prev"></div>
				<div class="swiper-button-next"></div>
			</div>
		</div>
	<?php endif; ?>

	<?php if ($pdf): ?>
		<!-- Botón de descarga PDF -->
		<a 
			href="<?php echo esc_url($pdf); ?>"
			class="inline-flex items-center gap-2 text-base bg-brand-primary text-text-dark px-4 py-3 rounded-lg hover:bg-brand-primary-700 transition-colors shadow-sm hover:shadow-md no-underline"
			target="_blank"
			rel="noopener noreferrer"
			download
		>
			<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
				stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
				class="flex-shrink-0">
				<path d="M6 22a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h8a2.4 2.4 0 0 1 1.704.706l3.588 3.588A2.4 2.4 0 0 1 20 8v12a2 2 0 0 1-2 2z" />
				<path d="M14 2v5a1 1 0 0 0 1 1h5" />
				<path d="M10 9H8" />
				<path d="M16 13H8" />
				<path d="M16 17H8" />
			</svg>
			<span class="font-medium">
				Descargar <?php echo esc_html($pdf_filename ?: 'PDF'); ?>
			</span>
		</a>
	<?php endif; ?>
</div>