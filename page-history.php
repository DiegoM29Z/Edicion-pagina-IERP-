<?php
/**
 * Template Name: Historia del Colegio
 * Description: Plantilla para historia del colegio con modo oscuro y diseño flexible
 */
?>
<?php get_header(); ?>

<main id="primary" class="site-main">
    <!-- Hero Section -->
    <section class="relative h-[50vh] bg-cover bg-gradient-custom flex items-center justify-center text-white"
        style="">
        <div class="relative z-10 text-center px-4 animate-fade-in-up">
            <h1 class="text-4xl md:text-6xl font-bold font-display mb-4"><?php the_title(); ?></h1>
            <p class="text-xl md:text-2xl opacity-90">
                <?php
                // Este texto podría ser un campo personalizado (Custom Field) para ser editable.
                echo esc_html__('Formando generaciones con valores desde 1965', 'edusiteco');
                ?>
            </p>
        </div>
    </section>

    <!-- Contenido Principal -->
    <article class="py-16 md:py-24 bg-gray-50 dark:bg-gray-900">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="prose dark:prose-invert lg:prose-xl mx-auto text-text-light dark:text-text-dark">
                <?php
                // El contenido principal se obtiene del editor de WordPress.
                while (have_posts()) :
                    the_post();
                    the_content();
                endwhile;
                ?>
            </div>
        </div>
    </article>

    <!-- Hitos Importantes -->
    <?php $hitos = function_exists('edusiteco_get_hitos_historia') ? edusiteco_get_hitos_historia() : []; ?>
    <?php if (!empty($hitos)): ?>
        <section class="py-16 md:py-24 bg-white dark:bg-gray-800">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-12">
                    <h2 class="text-3xl lg:text-4xl font-bold text-text-light dark:text-text-dark font-display">
                        <?php echo esc_html__('Hitos Históricos', 'edusiteco'); ?>
                    </h2>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    <?php foreach ($hitos as $hito): ?>
                        <div
                            class="group bg-white dark:bg-gray-900 rounded-xl shadow-lg hover:shadow-2xl transition-all duration-300 border border-gray-200 dark:border-gray-700 hover:border-primary/50 p-6 flex flex-col h-full transform hover:-translate-y-2">
                            <div class="flex items-center mb-4">
                                <div
                                    class="w-12 h-12 bg-primary/10 dark:bg-primary/20 rounded-lg flex items-center justify-center mr-4 group-hover:scale-110 transition-transform duration-300 text-primary text-2xl">
                                    <?php echo $hito['icono']; // Considerar usar SVGs aquí ?>
                                </div>
                                <span class="text-2xl font-bold text-primary"><?php echo esc_html($hito['año']); ?></span>
                            </div>
                            <h3
                                class="text-xl font-bold text-text-light dark:text-text-dark mb-3 group-hover:text-primary transition-colors">
                                <?php echo esc_html($hito['titulo']); ?>
                            </h3>
                            <p class="text-text-light dark:text-text-dark/80 flex-grow">
                                <?php echo esc_html($hito['descripcion']); ?>
                            </p>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>
    <?php endif; ?>

    <!-- Logros Destacados -->
    <?php $logros = function_exists('edusiteco_get_logros_historia') ? edusiteco_get_logros_historia() : []; ?>
    <?php if (!empty($logros)): ?>
        <section class="py-16 md:py-24 bg-gray-50 dark:bg-gray-900">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-12">
                    <h2 class="text-3xl lg:text-4xl font-bold text-text-light dark:text-text-dark font-display">
                        <?php echo esc_html__('Logros Destacados', 'edusiteco'); ?>
                    </h2>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
                    <?php foreach ($logros as $logro): ?>
                        <div
                            class="group bg-gradient-to-br <?php echo esc_attr($logro['color']); ?> rounded-xl p-6 text-white text-center shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2">
                            <div
                                class="w-16 h-16 bg-white/20 rounded-full flex items-center justify-center mx-auto mb-4 group-hover:scale-110 transition-transform duration-300 text-3xl">
                                <?php echo $logro['icono']; ?>
                            </div>
                            <h3 class="font-bold text-xl mb-2"><?php echo esc_html($logro['titulo']); ?></h3>
                            <p class="text-white/90 text-sm"><?php echo esc_html($logro['descripcion']); ?></p>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>
    <?php endif; ?>
</main>

<?php get_footer(); ?>
