<?php
/**
 * Render callback for the Psico Workshops Block
 * 
 * Displays a responsive grid of workshops with minimalist design
 * and theme colors applied.
 * 
 * @package edusiteco
 */

// Get block attributes with fallback defaults
$items          = $attributes['items']                  ?? [];
$sectionTitle   = $attributes['sectionTitle']           ?? __('Activities and Workshops', 'edusiteco');
$sectionDescription = $attributes['sectionDescription'] ?? '';

// Stop rendering if no items to display
if (empty($items)) {
    return;
}

/**
 * Format date to 12-hour format with AM/PM
 * 
 * @param string $date_string - The date string to format
 * @return string - Formatted date string
 */
if (!function_exists('format_workshop_date')) {
    function format_workshop_date($date_string)
    {
        if (empty($date_string)) {
            return '';
        }

        $timestamp = strtotime($date_string);
        if ($timestamp === false) {
            return $date_string; // Return original if can't parse
        }

        // Format: Month Day, Year at Hour:Minute AM/PM
        return date('F j, Y \a\t g:i A', $timestamp);
    }
}

/**
 * SVG Icon helper function for workshop section
 * Returns SVG icons for calendar and location
 * 
 * @param string $type - Icon type: 'calendar' or 'location'
 * @return string - SVG markup
 */
if (!function_exists('get_taller_svg_icon')) {
    function get_taller_svg_icon($type = 'calendar'): string
    {
        $icons = [
            'calendar' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" width="18" height="18"><path d="M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm0 16H5V8h14v11z"/></svg>',
            'location' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" width="18" height="18"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8z"/></svg>'
        ];

        return isset($icons[$type]) ? $icons[$type] : $icons['calendar'];
    }
}

?>

<!-- ============================================
     Workshops and Activities Section
     ============================================ -->
<section
    class="psico-talleres-section w-full py-12 md:py-16 bg-background-light dark:bg-background-dark transition-colors duration-300">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">

        <!-- Section Header -->
        <div class="mb-10 md:mb-14 text-center animate-fade-in-up">
            <h2 class="text-3xl md:text-4xl font-bold font-display text-text-light dark:text-text-dark mb-3">
                <?php echo wp_kses_post($sectionTitle); ?>
            </h2>

            <!-- Section Description -->
            <?php if (!empty($sectionDescription)): ?>
                <p class="text-gray-600 dark:text-gray-300 text-sm md:text-base mb-6 max-w-2xl mx-auto">
                    <?php echo wp_kses_post($sectionDescription); ?>
                </p>
            <?php endif; ?>

            <!-- Decorative underline -->
            <div
                class="w-12 h-1 bg-gradient-to-r from-transparent via-brand-primary to-transparent rounded-full mx-auto">
            </div>
        </div>

        <!-- Workshops Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <?php foreach ($items as $index => $item): ?>
                <!-- Workshop Card -->
                <div class="psico-taller-card bg-white dark:bg-gray-800 rounded-xl overflow-hidden border border-border-light dark:border-border-dark hover:shadow-lg hover:scale-105 transition-all duration-300 flex flex-col"
                    style="animation-delay: <?php echo ($index * 0.1); ?>s;">

                    <!-- ====== IMAGE SECTION ====== -->
                    <?php if (!empty($item['imagen'])): ?>
                        <div class="relative h-48 overflow-hidden bg-gray-200 dark:bg-gray-700">
                            <img src="<?php echo esc_url($item['imagen']); ?>" alt="<?php echo esc_attr($item['titulo']); ?>"
                                loading="lazy"
                                class="w-full h-full object-cover transition-transform duration-300 hover:scale-110" />
                            <!-- Overlay gradient -->
                            <div class="absolute inset-0 bg-gradient-to-t from-black/20 to-transparent"></div>
                        </div>
                    <?php else: ?>
                        <div
                            class="h-48 bg-gradient-to-br from-brand-primary/20 to-brand-secondary/20 flex items-center justify-center">
                            <span class="text-brand-primary text-4xl">📅</span>
                        </div>
                    <?php endif; ?>

                    <!-- ====== CONTENT SECTION ====== -->
                    <div class="flex-1 p-5 md:p-6 flex flex-col">

                        <!-- Workshop Title -->
                        <h3 class="text-lg md:text-xl font-semibold text-text-light dark:text-text-dark mb-2 line-clamp-2">
                            <?php echo esc_html($item['titulo']); ?>
                        </h3>

                        <!-- Workshop Description -->
                        <?php if (!empty($item['descripcion'])): ?>
                            <p class="text-sm text-gray-600 dark:text-gray-300 mb-4 line-clamp-2">
                                <?php echo esc_html($item['descripcion']); ?>
                            </p>
                        <?php endif; ?>

                        <!-- Flexible spacer -->
                        <div class="flex-grow"></div>

                        <!-- ====== INFO SECTION ====== -->
                        <div class="space-y-2 pt-4 border-t border-border-light dark:border-border-dark">

                            <!-- Date with 12-hour format -->
                            <?php if (!empty($item['fecha'])): ?>
                                <div
                                    class="flex items-center text-sm text-brand-primary dark:text-brand-primary-300 font-medium">
                                    <span class="mr-2 flex items-center justify-center text-brand-primary"
                                        style="width: 18px; height: 18px;">
                                        <?php echo get_taller_svg_icon('calendar'); ?>
                                    </span>
                                    <?php echo esc_html(format_workshop_date($item['fecha'])); ?>
                                </div>
                            <?php endif; ?>

                            <!-- Location -->
                            <?php if (!empty($item['lugar'])): ?>
                                <div
                                    class="flex items-center text-sm text-brand-secondary dark:text-brand-secondary-300 font-medium">
                                    <span class="mr-2 flex items-center justify-center text-brand-secondary"
                                        style="width: 18px; height: 18px;">
                                        <?php echo get_taller_svg_icon('location'); ?>
                                    </span>
                                    <?php echo esc_html($item['lugar']); ?>
                                </div>
                            <?php endif; ?>

                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<style>
    /* ============================================
       Animation and responsive styles
       ============================================ */

    /* Staggered animation for cards */
    @keyframes taller-slide-in {
        from {
            opacity: 0;
            transform: translateY(20px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .psico-taller-card {
        animation: taller-slide-in 0.5s ease-out forwards;
        opacity: 0;
    }

    /* Mobile responsive */
    @media (max-width: 768px) {
        .psico-talleres-section {
            padding: 2rem 0;
        }

        .psico-taller-card {
            margin-bottom: 1rem;
        }
    }

    /* Dark mode adjustments */
    .dark .psico-taller-card {
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.3);
    }

    .dark .psico-taller-card:hover {
        box-shadow: 0 12px 24px rgba(0, 0, 0, 0.4);
        border-color: hsl(var(--color-brand-primary) / 0.3);
    }

    /* Light mode hover enhancements */
    .psico-taller-card:hover {
        border-color: hsl(var(--color-brand-primary) / 0.4);
    }

    /* Prefers reduced motion */
    @media (prefers-reduced-motion: reduce) {
        .psico-taller-card {
            animation: none;
        }

        .psico-taller-card:hover {
            transform: none;
        }
    }
</style>