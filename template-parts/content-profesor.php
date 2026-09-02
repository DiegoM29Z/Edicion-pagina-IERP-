<article id="post-<?php the_ID(); ?>" <?php post_class('bg-white dark:bg-gray-800 rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow border border-border-light dark:border-border-dark'); ?>>
    <?php if (has_post_thumbnail()): ?>
        <div class="relative overflow-hidden">
            <a href="<?php the_permalink(); ?>" class="block">
                <?php the_post_thumbnail('large', ['class' => 'w-full h-52 object-cover transition-transform duration-500 group-hover:scale-105']); ?>
            </a>
            <div
                class="absolute inset-0 bg-gradient-to-t from-black/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300">
            </div>
        </div>
    <?php else: ?>
        <div class="relative overflow-hidden">
            <a href="<?php the_permalink(); ?>" class="block">
                <div class="h-52 bg-brand-primary group-hover:scale-105">
                    <svg viewBox="0 0 1000 500" fill="currentColor">
                        <circle cx="200" cy="100" r="80" opacity="0.1" />
                        <circle cx="800" cy="150" r="120" opacity="0.05" />
                        <circle cx="400" cy="400" r="100" opacity="0.08" />
                    </svg>
                </div>
            </a>
            <div
                class="absolute inset-0 bg-gradient-custom to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300">
            </div>
        </div>
    <?php endif; ?>

    <div class="p-6">
        <div class="flex items-center text-xs text-gray-500 dark:text-gray-400 mb-2">
            <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                </path>
            </svg>
            <time datetime="<?php echo get_the_date('c'); ?>">
                <?php echo get_the_date('j M, Y'); ?>
            </time>
        </div>

        <h2 class="text-xl font-semibold text-text-light dark:text-text-dark mb-2">
            <a href="<?php the_permalink(); ?>" class="hover:text-brand-primary transition-colors">
                <?php the_title(); ?>
            </a>
        </h2>

        <p class="text-text-light dark:text-text-dark text-sm line-clamp-3 mb-4">
            <?php echo wp_trim_words(get_the_excerpt(), 20); ?>
        </p>

        <?php
        // Obtener el ID del usuario profesor asociado a la publicación
        $teacher_user_id = get_post_meta(get_the_ID(), '_teacher_user_id', true);

        if ($teacher_user_id):
            // Obtener los datos del usuario
            $teacher_data = get_userdata($teacher_user_id);
            // Obtener el título académico del metadato del usuario
            $teacher_academic_title = get_user_meta($teacher_user_id, 'title', true);

            if ($teacher_data):
                ?>
                <div class="flex items-center mt-4 mb-4">
                    <?php echo get_avatar($teacher_user_id, 40, '', $teacher_data->display_name, ['class' => 'w-10 h-10 rounded-full mr-3']); ?>
                    <div>
                        <p class="text-sm font-semibold text-text-light dark:text-text-dark">
                            <?php echo esc_html($teacher_data->display_name); ?></p>
                        <?php if ($teacher_academic_title): ?>
                            <p class="text-xs text-gray-500 dark:text-gray-400"><?php echo esc_html($teacher_academic_title); ?></p>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endif; ?>
        <?php endif; ?>

        <a href="<?php the_permalink(); ?>"
            class="inline-flex items-center text-brand-primary hover:text-brand-secondary font-semibold text-sm transition-colors group/btn">
            <?php _e('Ver Actividad', 'eduusiteco'); ?>
            <svg class="w-4 h-4 ml-1 transform group-hover/btn:translate-x-1 transition-transform" fill="none"
                stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
            </svg>
        </a>
    </div>
</article>