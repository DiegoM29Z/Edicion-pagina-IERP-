<article id="post-<?php the_ID(); ?>" <?php post_class('bg-white rounded-xl shadow-md hover:shadow-xl transition-all duration-300 overflow-hidden border border-gray-100 group'); ?>>

    <!-- Imagen destacada con overlay hover -->
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

    <div class="p-6 flex flex-col">
        <div class="grow">
            <!-- Meta información superior -->
            <div class="flex items-center justify-between mb-3">
                <div class="flex flex-wrap gap-2">
                    <?php
                    $categories = get_the_category();
                    if (!empty($categories)) {
                        foreach ($categories as $category) {
                            echo '<a href="' . esc_url(get_category_link($category->term_id)) . '" class="text-xs font-medium text-primary bg-primary/10 px-2 py-1 rounded-full hover:bg-primary/20 transition-colors">' . esc_html($category->name) . '</a>';
                        }
                    }
                    ?>
                </div>
                <time class="text-xs text-gray-500" datetime="<?php echo get_the_date('c'); ?>">
                    <?php echo get_the_date('j M, Y'); ?>
                </time>
            </div>
    
            <!-- Título -->
            <h2
                class="text-xl font-bold text-gray-900 mb-3 leading-tight group-hover:text-primary transition-colors duration-200">
                <a href="<?php the_permalink(); ?>" class="hover:underline decoration-2 decoration-primary/50">
                    <?php the_title(); ?>
                </a>
            </h2>
    
            <?php
            $fecha_evento = get_post_meta(get_the_ID(), '_fecha_evento', true);
            $pdf_url = get_post_meta(get_the_ID(), '_pdf_url', true);
            ?>
    
            <!-- Fecha del evento si existe -->
            <?php if ($fecha_evento): ?>
                <div class="flex items-center mb-2 p-2 bg-blue-50 rounded-lg border border-blue-100">
                    <div class="flex-shrink-0 w-8 h-8 bg-brand-primary rounded-full flex items-center justify-center mr-3">
                        <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                            </path>
                        </svg>
                    </div>
                    <div>
                        <p class="text-sm font-semibold text-gray-900">Fecha del evento</p>
                        <p class="text-sm text-gray-700"><?php echo esc_html(date('j F, Y', strtotime($fecha_evento))); ?></p>
                    </div>
                </div>
            <?php endif; ?>
    
            <!-- Extracto -->
            <div class="mb-4">
                <p class="text-gray-600 leading-relaxed line-clamp-3">
                    <?php
                    if (has_excerpt()) {
                        echo get_the_excerpt();
                    } else {
                        echo wp_trim_words(get_the_content(), 25);
                    }
                    ?>
                </p>
            </div>
        </div>

        <!-- Acciones -->
        <div class="flex items-center justify-between pt-4 border-t border-gray-100">
            <a href="<?php the_permalink(); ?>"
                class="inline-flex items-center text-primary font-semibold text-sm hover:text-primary/80 transition-colors group/btn">
                Leer más
                <svg class="w-4 h-4 ml-1 transform group-hover/btn:translate-x-1 transition-transform" fill="none"
                    stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                </svg>
            </a>

            <?php if ($pdf_url): ?>
                <a 
                    href="<?php echo esc_url($pdf_url); ?>" 
                    target="_blank"
                    class="inline-flex items-center text-gray-600 hover:text-red-600 transition-colors group/pdf"
                    title="Descargar PDF"
                >
                    <svg class="w-5 h-5 mr-2 group-hover/pdf:scale-110 transition-transform " viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                        <g id="SVGRepo_iconCarrier"> 
                            <path d="M4 4C4 3.44772 4.44772 3 5 3H14H14.5858C14.851 3 15.1054 3.10536 15.2929 3.29289L19.7071 7.70711C19.8946 7.89464 20 8.149 20 8.41421V20C20 20.5523 19.5523 21 19 21H5C4.44772 21 4 20.5523 4 20V4Z" stroke="currentColor" stroke-width="2" stroke-linecap="round"></path> 
                            <path d="M20 8H15V3" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> 
                            <path d="M11.5 13H11V17H11.5C12.6046 17 13.5 16.1046 13.5 15C13.5 13.8954 12.6046 13 11.5 13Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> 
                            <path d="M15.5 17V13L17.5 13" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> 
                            <path d="M16 15H17" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> 
                            <path d="M7 17L7 15.5M7 15.5L7 13L7.75 13C8.44036 13 9 13.5596 9 14.25V14.25C9 14.9404 8.44036 15.5 7.75 15.5H7Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> 
                        </g>
                    </svg>
                    <span class="text-sm font-medium group-hover/pdf:font-semibold group-hover/pdf:scale-110 transition-transform">PDF</span>
                </a>
            <?php endif; ?>
        </div>
    </div>
</article>