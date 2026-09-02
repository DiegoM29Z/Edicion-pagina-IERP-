<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package edusiteco
 */

?>

</div>
<!-- #content -->

<footer id="colophon"
	class="site-footer bg-background-light dark:bg-background-dark border-t border-border-light dark:border-border-dark">

	<!-- Sección Principal - 4 Columnas -->
	<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
		<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 lg:gap-6">

			<!-- Columna 1 - Logos Institucionales -->
			<div class="flex flex-col items-center space-y-4">
				<!-- Logo Ministerio de Educación (Parte superior - más grande) -->
				<a href="https://www.mineducacion.gov.co" target="_blank" rel="noopener noreferrer" class="block mb-2">
					<img class="h-20 w-auto object-contain"
						src="<?php echo get_theme_file_uri("assets/img/Logo_Ministerio_de_Educación.png") ?>"
						alt="Logo Ministerio de Educación de Colombia"
						title="Logo Ministerio de Educación de Colombia" />
				</a>

				<!-- Base de la pirámide - Logos más pequeños alineados horizontalmente -->
				<div class="flex items-center justify-center space-x-6 mt-2">
					<!-- Logo Marca Colombia -->
					<a href="https://www.colombia.co" target="_blank" rel="noopener noreferrer" class="block">
						<img class="h-12 w-auto object-contain"
							src="<?php echo get_theme_file_uri("assets/img/Logo_Colombia.png") ?>" alt="Logo Colombia"
							title="Logo Colombia" />
					</a>

					<!-- Logo del Colegio -->
					<div class="flex items-center">
						<?php if (has_custom_logo()): ?>
							<div class="h-12 w-auto">
								<?php the_custom_logo(); ?>
							</div>
						<?php else: ?>
							<a href="<?php echo esc_url(home_url('/')); ?>" class="block">
								<img class="h-12 w-auto object-contain"
									src="<?php echo get_theme_file_uri("assets/img/logoipsum.png") ?>"
									alt="<?php echo "Logo " . esc_attr(get_bloginfo('name')); ?>" />
							</a>
						<?php endif; ?>
					</div>
				</div>
			</div>

			<!-- Columna 2 - Información Institucional -->
			<div class="lg:pl-4">
				<h3 class="text-lg font-semibold text-text-light dark:text-text-dark mb-4 font-display uppercase">
					<?php echo esc_html(get_bloginfo('name')); ?>
				</h3>

				<p class="text-text-light dark:text-text-dark text-sm leading-relaxed mb-4">
					<?php
					$description = get_bloginfo('description', 'display');
					if ($description) {
						echo esc_html($description);
					} else {
						echo 'Institución Educativa comprometida con la formación integral de nuestros estudiantes, promoviendo la excelencia académica y los valores ciudadanos.';
					}
					?>
				</p>

				<!-- Redes Sociales -->
				<div class="flex space-x-4 mt-6">
					<a 
						href="#" 
						target="_blank" 
						class="group text-brand-primary"
						aria-label="<?php esc_attr_e('Facebook', 'edusiteco'); ?>"
						title="<?php esc_attr_e('Cuenta de Facebook', 'edusiteco') ?>"
					>
						<svg class="w-8 h-8 transition-transform duration-300 group-hover:scale-110" version="1.1"
							id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
							viewBox="0 0 408.788 408.788" xml:space="preserve" fill="currentColor">
							<g id="SVGRepo_bgCarrier" stroke-width="0"></g>
							<g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
							<g id="SVGRepo_iconCarrier">
								<path
									d="M353.701,0H55.087C24.665,0,0.002,24.662,0.002,55.085v298.616c0,30.423,24.662,55.085,55.085,55.085 h147.275l0.251-146.078h-37.951c-4.932,0-8.935-3.988-8.954-8.92l-0.182-47.087c-0.019-4.959,3.996-8.989,8.955-8.989h37.882 v-45.498c0-52.8,32.247-81.55,79.348-81.55h38.65c4.945,0,8.955,4.009,8.955,8.955v39.704c0,4.944-4.007,8.952-8.95,8.955 l-23.719,0.011c-25.615,0-30.575,12.172-30.575,30.035v39.389h56.285c5.363,0,9.524,4.683,8.892,10.009l-5.581,47.087 c-0.534,4.506-4.355,7.901-8.892,7.901h-50.453l-0.251,146.078h87.631c30.422,0,55.084-24.662,55.084-55.084V55.085 C408.786,24.662,384.124,0,353.701,0z">
								</path>
							</g>
						</svg>
					</a>
					<a 
						href="#" 
						target="_blank" 
						class="group text-brand-primary"
						aria-label="<?php esc_attr_e('Instagram', 'edusiteco'); ?>"
						title="<?php esc_attr_e('Cuenta de Instagram', 'edusiteco'); ?>"
					>
						<svg xmlns="http://www.w3.org/2000/svg" 
							class="w-8 h-8 transition-transform duration-300 group-hover:scale-110" 
							viewBox="0 0 24 24"
							fill="currentColor"
						>
							<path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
						</svg>
					</a>
					<a href="#" target="_blank" 
						class="group text-brand-primary" 
						aria-label="<?php esc_attr_e('Twitter', 'edusiteco'); ?>"
						title="<?php esc_attr_e('Cuenta de Twitter', 'edusiteco') ?>"
					>
						<svg 
							xmlns="http://www.w3.org/2000/svg" 
							aria-label="Twitter" 
							role="img" viewBox="0 0 512 512" fill="#FFFFFF"
							class="w-8 h-8 transition-transform duration-300 group-hover:scale-110" 
						>
							<g id="SVGRepo_bgCarrier" stroke-width="0"></g>
							<g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
							<g id="SVGRepo_iconCarrier">
								<rect width="512" height="512" rx="15%" fill="currentColor"></rect>
								<path fill="#FFFFFF" d="M437 152a72 72 0 01-40 12a72 72 0 0032-40a72 72 0 01-45 17a72 72 0 00-122 65a200 200 0 01-145-74a72 72 0 0022 94a72 72 0 01-32-7a72 72 0 0056 69a72 72 0 01-32 1a72 72 0 0067 50a200 200 0 01-105 29a200 200 0 00309-179a200 200 0 0035-37"></path>
							</g>
						</svg>
					</a>
					<a 
						href="#" 
						target="_blank" 
						class="group text-brand-primary" 
						aria-label="<?php esc_attr_e('YouTube', 'edusiteco'); ?>"
						title="<?php esc_attr_e('Canal de YouTube', 'edusiteco') ?>"
					>
						<svg 
							xmlns="http://www.w3.org/2000/svg" 
							aria-label="YouTube" 
							role="img" 
							viewBox="0 0 512 512" 
							fill="currentColor"
							class="w-8 h-8 transition-transform duration-300 group-hover:scale-110"
						>
							<g id="SVGRepo_bgCarrier" stroke-width="0"></g>
							<g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
							<g id="SVGRepo_iconCarrier">
								<rect width="512" height="512" rx="15%"></rect>
								<path d="m427 169c-4-15-17-27-32-31-34-9-239-10-278 0-15 4-28 16-32 31-9 38-10 135 0 174 4 15 17 27 32 31 36 10 241 10 278 0 15-4 28-16 32-31 9-36 9-137 0-174" fill="#ffffff"></path>
								<path d="m220 203v106l93-53"></path>
							</g>
						</svg>
					</a>
				</div>
			</div>

			<!-- Columna 3 - Contacto -->
			<div class="lg:pl-4">
				<h3 class="text-lg font-semibold text-text-light dark:text-text-dark mb-4 font-display uppercase">
					Contacto</h3>

				<div class="space-y-3 text-base text-text-light dark:text-text-dark">
					<div class="flex items-start">
						<span class="material-icons text-brand-primary text-2xl mr-2 mt-0.5">location_on</span>
						<span>Carrera 15 #445-67<br>Barrio Centro<br>Bogotá D.C., Colombia</span>
					</div>

					<div class="flex items-center">
						<span class="material-icons text-brand-primary text-2xl mr-2">phone</span>
						<span>(601) 234-5678</span>
					</div>

					<div class="flex items-center">
						<span class="material-icons text-brand-primary text-2xl mr-2">email</span>
						<span>contacto@iesanmartin.edu.co</span>
					</div>

					<div class="flex items-start">
						<span class="material-icons text-brand-primary text-2xl mr-2 mt-0.5">schedule</span>
						<span>Lunes a Viernes<br>7:00 AM - 4:00 PM</span>
					</div>
				</div>
			</div>

			<!-- Columna 4 - Enlaces de Interés -->
			<div class="lg:pl-4">
				<h3 class="text-lg font-semibold text-text-light dark:text-text-dark mb-4 font-display uppercase">
					Enlaces de Interés</h3>

				<ul class="space-y-2 text-base">
					<li>
						<a href="#"
							class="text-text-light dark:text-text-dark hover:text-brand-primary transition-colors hover:underline underline-offset-2">
							Política de Tratamiento de Datos
						</a>
					</li>
					<li>
						<a href="#"
							class="text-text-light dark:text-text-dark hover:text-brand-primary transition-colors hover:underline underline-offset-2">
							Mapa del Sitio
						</a>
					</li>
					<li>
						<a href="#"
							class="text-text-light dark:text-text-dark hover:text-brand-primary transition-colors hover:underline underline-offset-2">
							PQRS
						</a>
					</li>
					<li>
						<a href="#"
							class="text-text-light dark:text-text-dark hover:text-brand-primary transition-colors hover:underline underline-offset-2">
							Portal de Transparencia
						</a>
					</li>
					<li>
						<a href="#"
							class="text-text-light dark:text-text-dark hover:text-brand-primary transition-colors hover:underline underline-offset-2">
							Accesibilidad
						</a>
					</li>
				</ul>
			</div>
		</div>
	</div>

	<!-- Sección Legal -->
	<div class="border-t border-border-light dark:border-border-dark py-6">
		<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
			<div class="flex flex-col md:flex-row justify-between items-center space-y-4 md:space-y-0">
				<!-- Copyright -->
				<div class="text-sm text-text-light dark:text-text-dark">
					&copy; <?php echo date('Y'); ?> <a href="<?php echo esc_url(home_url('/')); ?>"
						class="uppercase dark:text-text-dark font-bold hover:text-brand-primary hover:underline underline-offset-1"><?php echo esc_html(get_bloginfo('name')); ?>
					</a>. Todos los derechos reservados.
				</div>

				<!-- Enlaces Legales -->
				<div class="flex flex-wrap justify-center md:justify-end space-x-6 text-sm">
					<p>
						Desarrollado por:
						<a href="https://fup.edu.co/facultad/facultad-de-ingenieria-y-arquitectura/"
							target="_blank"
							class="text-brand-primary dark:text-text-dark hover:text-brand-primary transition-colors hover:underline">
							Facultad de Ingeniería - FUP
						</a>
					</p>
				</div>
			</div>
		</div>
	</div>

	<!-- Barra Inferior - GOV.CO -->
	<div class="bg-gov-top py-3">
		<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
			<div class="flex justify-center">
				<a href="https://www.gov.co" target="_blank" rel="noopener noreferrer" class="flex items-center">
					<img class="h-6 w-auto" src="<?php echo get_theme_file_uri("assets/img/govco.png") ?>"
						alt="Portal Gobierno de Colombia" />
				</a>
			</div>
		</div>
	</div>
</footer>
<!-- #colophon -->

</div><!-- #page -->

<?php wp_footer(); ?>

</body>

</html>