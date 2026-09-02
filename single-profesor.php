<?php get_header(); ?>

<main id="primary" class="site-main">
    <article class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-12 md:py-16">
        <?php if (have_posts()):
            while (have_posts()):
                the_post(); ?>

                <header class="entry-header mb-8 ">
                    <?php the_title('<h1 class="text-4xl md:text-5xl font-bold text-gray-900 dark:text-text-dark mb-4">', '</h1>'); ?>
                    <div class="text-sm text-gray-500 dark:text-gray-400">
                        <span>Publicado el <?php echo get_the_date(); ?></span>
                    </div>
                </header>

                <?php if (has_post_thumbnail()): ?>
                    <div class="mb-10 rounded-xl shadow-lg overflow-hidden">
                        <?php the_post_thumbnail('large', ['class' => 'w-full h-auto']); ?>
                    </div>
                <?php endif; ?>

                <div class="prose dark:prose-invert lg:prose-xl max-w-none mx-auto text-text-light dark:text-text-dark">
                    <?php the_content(); ?>
                </div>

                
                <footer class="entry-footer mt-12">
                    <a 
                        href="<?php echo get_post_type_archive_link('profesor'); ?>"
                        class="group text-brand-primary hover:text-brand-secondary font-medium flex items-center gap-2 transition-colors"
                    >
                        <svg class="w-5 h-5 transform group-hover:-translate-x-1 transition-transform" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M6 12H18M6 12L11 7M6 12L11 17" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> 
                        </svg>
                        <span class="group-hover:underline">Volver a Profesores</span>
                    </a>
                </footer>

            <?php endwhile;
        endif; ?>
    </article>
</main>

<?php get_footer(); ?>