<?php
/**
 * Template Name: Símbolos Institucionales
 * Description: Plantilla para mostrar los símbolos institucionales del colegio
 */
?>

<?php get_header(); ?>

<main id="primary" class="site-main">
    <!-- Hero Section -->
    <section class="relative h-[50vh] bg-cover bg-center flex items-center justify-center text-white"
        style="background-image: linear-gradient(rgba(51, 102, 204, 0.85), rgba(51, 102, 204, 0.9)), url('<?php echo esc_url(get_theme_mod('simbolos_hero_image', get_template_directory_uri() . '/assets/img/hero-simbolos.jpg')); ?>');">
        <div class="relative z-10 text-center px-4">
            <h1 class="text-4xl md:text-6xl font-bold mb-4"><?php the_title(); ?></h1>
            <p class="text-xl md:text-2xl opacity-90">
                <?php echo esc_html(get_theme_mod('simbolos_subtitle', 'Emblemas que nos identifican y nos unen como comunidad educativa')); ?>
            </p>
        </div>
    </section>

    <!-- Escudo Institucional -->
    <section class="py-16 md:py-20 bg-white dark:bg-gray-900">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col lg:flex-row items-center gap-12">
                <div class="lg:w-2/5 text-center">
                    <div class="bg-gray-50 dark:bg-gray-800 rounded-2xl p-4 shadow-lg">
                        <img 
                            src="<?php echo esc_url(get_theme_mod('escudo_image', 'https://placehold.co/400x300/E2E8F0/4A5568?text=Escudo')); ?>" 
                            alt="<?php echo esc_attr(get_theme_mod('escudo_alt', 'Escudo del Colegio San Martín')); ?>"
                            class="w-full h-64 mx-auto object-contain"
                        >
                    </div>
                </div>
                <div class="lg:w-3/5">
                    <div class="text-center lg:text-left">
                        <h2 id="escudo-title" class="text-3xl lg:text-4xl font-bold text-gray-900 dark:text-white mb-6">
                            <?php echo esc_html(get_theme_mod('escudo_title', 'Escudo Institucional')); ?>
                        </h2>
                        <div class="prose dark:prose-invert max-w-none">
                            <p id="escudo-description" class="text-lg text-gray-700 dark:text-gray-300 leading-relaxed">
                                <?php 
                                echo wp_kses_post(get_theme_mod('escudo_description', 
                                    'Nuestro escudo representa la identidad y valores de la institución. Los colores azul y blanco simbolizan la sabiduría y la pureza. El libro abierto representa el conocimiento, la antorcha la luz del aprendizaje, y el laurel el éxito académico. Cada elemento refleja nuestro compromiso con la excelencia educativa y la formación integral de nuestros estudiantes.'
                                )); 
                                ?>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Bandera Institucional -->
    <section class="py-16 md:py-20 bg-gray-50 dark:bg-gray-800">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col lg:flex-row-reverse items-center gap-12">
                <div class="lg:w-2/5 text-center">
                    <div class="bg-background-light dark:bg-background-dark rounded-2xl p-4 shadow-lg">
                        <img 
                            src="<?php echo esc_url(get_theme_mod('bandera_image', 'https://placehold.co/400x300/CBD5E1/1A202C?text=Bandera')); ?>"
                            alt="<?php echo esc_attr(get_theme_mod('bandera_alt', 'Bandera del Colegio San Martín')); ?>"
                            class="w-full h-64 mx-auto object-contain">
                    </div>
                </div>
                <div class="lg:w-3/5">
                    <div class="text-center lg:text-left">
                        <h2 class="text-3xl lg:text-4xl font-bold text-text-light dark:text-text-dark mb-6">
                            <?php echo esc_html(get_theme_mod('bandera_title', 'Bandera Institucional')); ?>
                        </h2>
                        <div class="prose dark:prose-invert max-w-none">
                            <p class="text-lg text-text-light dark:text-text-dark leading-relaxed">
                                <?php echo wp_kses_post(get_theme_mod('bandera_description',
                                    'La bandera de nuestro colegio está compuesta por tres franjas horizontales: azul, blanco y verde. El azul representa la justicia y la verdad, el blanco simboliza la paz y la pureza de ideales, y el verde refleja la esperanza y el crecimiento. En el centro lleva nuestro escudo institucional, uniendo todos los elementos que representan nuestra identidad educativa.'
                                ));
                                ?>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Himno Institucional -->
    <section class="py-16 md:py-20 bg-background-light dark:bg-background-dark">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <div class="w-20 h-20 bg-brand-primary-100 dark:bg-brand-primary-900 rounded-full flex items-center justify-center mx-auto mb-6">
                    <span class="text-3xl text-brand-primary-600 dark:text-brand-primary-400">🎵</span>
                </div>
                <h2 class="text-3xl lg:text-4xl font-bold text-text-light dark:text-text-dark mb-4">
                    <?php echo esc_html(get_theme_mod('himno_title', 'Nuestro Himno')); ?>
                </h2>
            </div>

            <!-- Reproductor de Audio -->
            <?php if (get_theme_mod('himno_audio_url')): ?>
            <div class="bg-blue-50 dark:bg-blue-900/30 rounded-xl p-6 mb-8">
                <div class="flex items-center justify-center space-x-4">
                    <audio 
                        controls 
                        class="w-full max-w-md"
                        aria-label="<?php echo esc_attr(get_theme_mod('himno_audio_label', 'Audio del Himno del Colegio San Martín')); ?>"
                    >
                        <source src="<?php echo esc_url(get_theme_mod('himno_audio_url')); ?>" type="audio/mpeg">
                        <?php echo esc_html__('Tu navegador no soporta el elemento de audio.', 'edusiteco'); ?>
                    </audio>
                </div>
            </div>
            <?php endif; ?>

            <!-- Letra del Himno -->
            <div class="bg-gray-50 dark:bg-gray-800 rounded-2xl p-8 md:p-12">
                <div class="prose dark:prose-invert max-w-none mx-auto text-center">
                    <div class="text-lg text-gray-700 dark:text-gray-300 leading-relaxed space-y-6">
                        <?php
                        $himno_letra = get_theme_mod('himno_letra', 
                            "Coro:\n¡Oh Colegio San Martín, faro de saber!\nDonde la juventud aprende a crecer.\nCon honor y valor, siempre hacia el ideal,\nFormando carácter con ética y moral.\n\nEstrofa I:\nEn tus aulas de luz, donde el estudio reina,\nSe forjan los pilares de una patria buena.\nCon esfuerzo y tesón, con amor y afán,\nCumpliendo con deber, el futuro alcanzar.\n\nEstrofa II:\nTus colores al viento, bandera de honor,\nInspiran en nosotros noble y gran valor.\nTus profesores guían con sabia dirección,\nSiembran en nuestras almas sana educación."
                        );
                        echo nl2br(wp_kses_post($himno_letra));
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Lema Institucional -->
    <section class="py-16 md:py-20 bg-gradient-to-r from-brand-primary-600 to-brand-primary-700 dark:from-brand-primary-800 dark:to-brand-primary-900 text-white">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-3xl lg:text-4xl font-bold mb-8">
                <?php echo esc_html(get_theme_mod('lema_title', 'Nuestro Lema')); ?>
            </h2>
            
            <div class="bg-white/10 backdrop-blur-sm rounded-2xl p-8 md:p-12 border border-white/20">
                <blockquote class="text-2xl md:text-4xl italic font-serif mb-6 leading-relaxed">
                    "<?php echo esc_html(get_theme_mod('lema_text', 'Saber, Honor y Disciplina')); ?>"
                </blockquote>
                
                <div class="border-t border-white/30 pt-6">
                    <p class="text-lg text-white/90 max-w-2xl mx-auto">
                        <?php echo wp_kses_post(get_theme_mod('lema_explicacion',
                            'Nuestro lema representa los tres pilares fundamentales de nuestra institución: el Saber como búsqueda del conocimiento, el Honor como principio ético y la Disciplina como método para alcanzar la excelencia.'
                        )); ?>
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Cierre Visual -->
    <section class="py-16 md:py-20 bg-gray-50 dark:bg-gray-800">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <!-- Collage de Símbolos -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-12">
                <div class="bg-white dark:bg-gray-900 rounded-xl p-6 shadow-lg">
                    <img 
                        src="<?php echo esc_url(get_theme_mod('escudo_image', get_template_directory_uri() . '/assets/images/escudo.png')); ?>" 
                        alt="Escudo"
                        class="w-32 h-32 mx-auto object-contain mb-4"
                    >
                    <h4 class="font-bold text-gray-900 dark:text-white">Escudo</h4>
                </div>
                <div class="bg-white dark:bg-gray-900 rounded-xl p-6 shadow-lg">
                    <img 
                        src="<?php echo esc_url(get_theme_mod('bandera_image', get_template_directory_uri() . '/assets/images/bandera.png')); ?>" 
                        alt="Bandera"
                        class="w-32 h-32 mx-auto object-contain mb-4"
                    >
                    <h4 class="font-bold text-gray-900 dark:text-white">Bandera</h4>
                </div>
                <div class="bg-white dark:bg-gray-900 rounded-xl p-6 shadow-lg flex flex-col items-center justify-center">
                    <span class="text-4xl mb-4">📜</span>
                    <h4 class="font-bold text-gray-900 dark:text-white">Lema</h4>
                    <p class="text-sm text-gray-600 dark:text-gray-400 mt-2">
                        "<?php echo esc_html(get_theme_mod('lema_text', 'Saber, Honor y Disciplina')); ?>"
                    </p>
                </div>
            </div>

            <!-- Frase Final -->
            <div class="max-w-3xl mx-auto">
                <p class="text-xl text-gray-700 dark:text-gray-300 mb-8 italic">
                    "<?php echo esc_html(get_theme_mod('simbolos_frase_final', 
                        'Nuestros símbolos reflejan la historia, el orgullo y los valores que nos inspiran cada día.'
                    )); ?>"
                </p>

                <!-- Navegación -->
                <?php
                // Obtener IDs de página desde el Customizer (más robusto que 'get_page_by_path')
                $pagina_historia_id = get_theme_mod('pagina_historia_id', 0);
                $pagina_mision_id = get_theme_mod('pagina_mision_id', 0);
                ?>
                <div class="flex flex-col sm:flex-row justify-center gap-4">
                    <?php if ($pagina_historia_id) : ?>
                    <a href="<?php echo esc_url(get_permalink($pagina_historia_id)); ?>" 
                       class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-6 rounded-lg transition duration-300">
                        <?php echo esc_html__('Conoce nuestra Historia', 'edusiteco'); ?>
                    </a>
                    <?php endif; ?>
                    <?php if ($pagina_mision_id) : ?>
                    <a href="<?php echo esc_url(get_permalink($pagina_mision_id)); ?>" 
                       class="bg-white dark:bg-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 text-blue-600 dark:text-white border-2 border-blue-600 dark:border-gray-600 font-bold py-3 px-6 rounded-lg transition duration-300">
                        <?php echo esc_html__('Explora nuestros Valores', 'edusiteco'); ?>
                    </a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>