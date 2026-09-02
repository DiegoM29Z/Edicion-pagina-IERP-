<?php
/**
 * Template Name: Participa
 */
get_header();
?>

<main class="site-main bg-white dark:bg-gray-900 transition-colors duration-300">
    <!-- Hero Section -->
    <section class="bg-gradient-to-r from-blue-900 to-blue-700 dark:from-blue-950 dark:to-blue-800 text-white py-16 px-4">
        <div class="max-w-7xl mx-auto text-center">
            <h1 class="text-4xl md:text-5xl font-bold mb-6 font-plus-jakarta animate-fade-in-up">
                <?php participa_the_field('hero_titulo', 'Participa'); ?>
            </h1>
            <p class="text-xl md:text-2xl max-w-4xl mx-auto leading-relaxed font-plus-jakarta font-light animate-fade-in-up animation-delay-200">
                <?php participa_the_field('hero_descripcion', 'Promovemos la participación activa de la comunidad educativa en la gestión institucional'); ?>
            </p>
        </div>
    </section>

    <!-- Introducción -->
    <section class="py-16 px-4 bg-white dark:bg-gray-800 transition-colors duration-300">
        <div class="max-w-7xl mx-auto">
            <div class="text-center max-w-4xl mx-auto">
                <div class="text-lg md:text-xl text-gray-700 dark:text-gray-300 leading-relaxed font-plus-jakarta">
                    <?php 
                    $intro_texto = participa_get_field('intro_texto');
                    if ($intro_texto) {
                        echo wp_kses_post($intro_texto);
                    } else {
                        ?>
                            <p>
                                En el Colegio <span class="font-bold uppercase"><?php echo get_bloginfo('name') ?></span>, fomentamos la participación de estudiantes, docentes, padres de familia y comunidad en la planeación, ejecución y evaluación de nuestras acciones educativas.
                            </p>
                        <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </section>

    <!-- Mecanismos de Participación -->
    <?php if (participa_has_mecanismos()): ?>
    <section class="py-16 px-4 bg-gray-50 dark:bg-gray-700 transition-colors duration-300">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 dark:text-white mb-4 font-plus-jakarta">
                    <?php participa_the_field('mecanismos_titulo', 'Mecanismos de Participación'); ?>
                </h2>
                <p class="text-lg text-gray-600 dark:text-gray-300 max-w-2xl mx-auto font-plus-jakarta">
                    <?php participa_the_field('mecanismos_descripcion', 'Conoce los diferentes espacios de participación disponibles en nuestra institución'); ?>
                </p>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
                <?php 
                $mecanismos = participa_get_mecanismos();
                foreach ($mecanismos as $mecanismo) {
                    participa_render_mecanismo($mecanismo);
                }
                ?>
            </div>
        </div>
    </section>
    <?php endif; ?>

    <!-- Consultas y Encuestas -->
    <?php 
    $encuestas_url = participa_get_field('encuestas_url');
    if ($encuestas_url):
    ?>
    <section class="py-16 px-4 bg-white dark:bg-gray-800 transition-colors duration-300">
        <div class="max-w-7xl mx-auto">
            <div class="bg-blue-50 dark:bg-blue-900/20 rounded-2xl p-8 border border-blue-200 dark:border-blue-800">
                <div class="text-center max-w-3xl mx-auto">
                    <h2 class="text-3xl md:text-4xl font-bold text-blue-800 dark:text-blue-300 mb-4 font-plus-jakarta">
                        <?php participa_the_field('encuestas_titulo', 'Consultas y Encuestas'); ?>
                    </h2>
                    <p class="text-lg text-gray-700 dark:text-gray-300 mb-8 font-plus-jakarta">
                        <?php participa_the_field('encuestas_descripcion', 'Participa en nuestras encuestas y comparte tus ideas para mejorar la gestión educativa.'); ?>
                    </p>
                    <a href="<?php participa_the_field('encuestas_url', 'https://forms.google.com', 'url'); ?>" 
                       target="_blank" 
                       rel="noopener noreferrer" 
                       class="inline-flex items-center bg-blue-600 hover:bg-blue-700 dark:bg-blue-500 dark:hover:bg-blue-600 text-white font-semibold py-4 px-8 rounded-lg transition-all duration-300 transform hover:-translate-y-1 hover:shadow-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 font-plus-jakarta">
                        <?php participa_the_field('encuestas_boton', 'Participar en Encuestas'); ?>
                        <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </section>
    <?php endif; ?>

    <!-- Rendición de Cuentas Participativa -->
    <?php if (participa_has_documentos()): ?>
    <section class="py-16 px-4 bg-gray-50 dark:bg-gray-700 transition-colors duration-300">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 dark:text-white mb-4 font-plus-jakarta">
                    <?php participa_the_field('documentos_titulo', 'Rendición de Cuentas Participativa'); ?>
                </h2>
                <p class="text-lg text-gray-600 dark:text-gray-300 max-w-2xl mx-auto font-plus-jakarta">
                    <?php participa_the_field('documentos_descripcion', 'Consulta aquí las memorias de nuestras audiencias públicas y participa con tus aportes'); ?>
                </p>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
                <?php 
                $documentos = participa_get_documentos();
                foreach ($documentos as $documento) {
                    participa_render_documento($documento);
                }
                ?>
            </div>
        </div>
    </section>
    <?php endif; ?>

    <!-- Buzón de Participación -->
    <section class="py-16 px-4 bg-white dark:bg-gray-800 transition-colors duration-300">
        <div class="max-w-4xl mx-auto">
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 dark:text-white mb-4 font-plus-jakarta">
                    <?php participa_the_field('form_titulo', 'Buzón de Participación'); ?>
                </h2>
                <p class="text-lg text-gray-600 dark:text-gray-300 font-plus-jakarta">
                    <?php participa_the_field('form_descripcion', 'Comparte tus ideas, sugerencias y propuestas para mejorar nuestra institución'); ?>
                </p>
            </div>

            <?php
            // Mostrar mensaje de resultado si existe
            if (isset($_GET['form_sent'])) {
                $result = get_transient('participa_form_result_' . get_the_ID());
                if ($result) {
                    $alert_class = $result['success'] ? 'bg-green-50 border-green-500 text-green-800' : 'bg-red-50 border-red-500 text-red-800';
                    ?>
                    <div class="<?php echo $alert_class; ?> border-l-4 p-4 mb-6 rounded" role="alert">
                        <p class="font-medium"><?php echo esc_html($result['message']); ?></p>
                    </div>
                    <?php
                    delete_transient('participa_form_result_' . get_the_ID());
                }
            }
            ?>

            <form method="post" action="<?php echo esc_url(get_permalink()); ?>" class="bg-gray-50 dark:bg-gray-700 rounded-2xl p-8 border border-gray-200 dark:border-gray-600">
                <?php wp_nonce_field('participa_form_submit', 'participa_form_nonce'); ?>
                
                <div class="grid md:grid-cols-2 gap-6 mb-6">
                    <!-- Nombre Completo -->
                    <div>
                        <label for="nombre" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2 font-plus-jakarta">
                            Nombre completo *
                        </label>
                        <input 
                            type="text" 
                            id="nombre" 
                            name="nombre" 
                            required
                            class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-600 dark:text-white transition-colors duration-200 font-plus-jakarta"
                            placeholder="Ingresa tu nombre completo"
                            aria-required="true"
                        >
                    </div>

                    <!-- Rol -->
                    <div>
                        <label for="rol" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2 font-plus-jakarta">
                            Rol en la institución *
                        </label>
                        <select 
                            id="rol" 
                            name="rol" 
                            required
                            class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-600 dark:text-white transition-colors duration-200 font-plus-jakarta"
                            aria-required="true">
                            <option value="">Selecciona tu rol</option>
                            <?php 
                            $roles = participa_get_roles();
                            foreach ($roles as $rol) {
                                echo '<option value="' . esc_attr(sanitize_title($rol)) . '">' . esc_html($rol) . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                </div>

                <!-- Correo Electrónico -->
                <div class="mb-6">
                    <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2 font-plus-jakarta">
                        Correo electrónico (opcional)
                    </label>
                    <input 
                        type="email" 
                        id="email" 
                        name="email"
                        class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-600 dark:text-white transition-colors duration-200 font-plus-jakarta"
                        placeholder="tu@correo.com"
                        aria-describedby="email-optional"
                    >
                    <p id="email-optional" class="text-sm text-gray-500 dark:text-gray-400 mt-1 font-plus-jakarta">
                        Opcional - Solo si deseas que te contactemos
                    </p>
                </div>

                <!-- Mensaje -->
                <div class="mb-6">
                    <label for="mensaje" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2 font-plus-jakarta">
                        Mensaje o propuesta *
                    </label>
                    <textarea 
                        id="mensaje" 
                        name="mensaje" 
                        required 
                        rows="6"
                        class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-600 dark:text-white transition-colors duration-200 font-plus-jakarta resize-vertical"
                        placeholder="Describe tu propuesta, sugerencia o inquietud..."
                        aria-required="true"></textarea>
                </div>

                <!-- Botón Enviar -->
                <div class="text-center">
                    <button 
                        type="submit"
                        name="participa_form_submit"
                        class="bg-blue-600 hover:bg-blue-700 dark:bg-blue-500 dark:hover:bg-blue-600 text-white font-semibold py-4 px-12 rounded-lg transition-all duration-300 transform hover:-translate-y-1 hover:shadow-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 font-plus-jakarta">
                        Enviar
                    </button>
                </div>
            </form>
        </div>
    </section>
</main>

<?php 
get_footer(); 
?>