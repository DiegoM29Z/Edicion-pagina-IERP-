<?php
/**
 * Template Name: Psicoorientación
 * Description: Página para Psicoorientación.
 */

get_header();
?>

<main id="primary" class="site-main">

    <!-- 🌟 HERO -->
    <section class="relative h-[50vh] bg-gradient-custom flex items-center justify-center text-white overflow-hidden">
        
        <!-- Overlay -->
        <div class="absolute inset-0 bg-black/40"></div>

        <!-- Contenido del Hero -->
        <div class="relative z-10 text-center px-6 animate-fade-in-up">
            <h1 class="text-4xl md:text-6xl font-bold font-display mb-4">
                <?php the_title(); ?>
            </h1>

            <p class="text-lg md:text-2xl opacity-90 max-w-2xl mx-auto">
                <?php echo esc_html__('Apoyando el bienestar emocional y académico de nuestros estudiantes', 'edusiteco'); ?>
            </p>
        </div>
    </section>

    <!-- 🌿 CONTENIDO PRINCIPAL -->
    <article 
        class="w-full max-w-6xl mx-auto px-6 py-12 md:py-20 
               bg-background-light dark:bg-background-dark 
               transition-colors duration-300"
    >
        <div 
            class="wp-block-area prose dark:prose-invert 
                   max-w-none 
                   prose-img:rounded-xl 
                   prose-headings:scroll-mt-24"
        >
            <?php
                while ( have_posts() ):
                    the_post();
                    the_content();
                endwhile;
            ?>
        </div>
    </article>

</main>

<?php get_footer(); ?>
