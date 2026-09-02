<?php
/**
 * Render callback for the Psico Resources Block
 * 
 * Displays a responsive grid of psychological resources with
 * configurable styling and theme colors applied.
 * 
 * @package edusiteco
 */

// Get block attributes with fallback defaults
$items = $attributes['items'] ?? [];
$sectionTitle = $attributes['sectionTitle'] ?? 'Recursos Psicoeducativos';
$sectionDescription = $attributes['sectionDescription'] ?? '';
$columns = $attributes['columns'] ?? 3;
$imageHeight = $attributes['imageHeight'] ?? 192;
$shadowDepth = $attributes['shadowDepth'] ?? 1;

// Stop rendering if no items to display
if (empty($items))
    return;

/**
 * Shadow CSS map - Converts shadow depth levels to CSS box-shadow values
 */
$shadowMap = [
    0 => 'none',
    1 => '0 2px 8px rgba(0, 0, 0, 0.08)',
    2 => '0 8px 24px rgba(0, 0, 0, 0.12)',
    3 => '0 16px 48px rgba(0, 0, 0, 0.15)'
];

$currentShadow = $shadowMap[$shadowDepth] ?? $shadowMap[1];

/**
 * Responsive columns mapping with max 3 columns
 */
$columnClasses = [
    1 => 'md:grid-cols-1 lg:grid-cols-1',
    2 => 'md:grid-cols-2 lg:grid-cols-2',
    3 => 'md:grid-cols-2 lg:grid-cols-3'
];

$gridClass = $columnClasses[$columns] ?? $columnClasses[3];

/**
 * Calculate optimal grid columns based on item count
 */
$itemCount = count($items);
$optimalColumns = $columns;
if ($itemCount <= 2 && $columns > $itemCount) {
    $optimalColumns = $itemCount;
}

/**
 * Icon mapping for resource types
 */
$typeIcons = [
    'PDF' => 'download',
    'Video' => 'play',
    'Infographic' => 'image',
    'Guide' => 'document',
    'Web Resource' => 'link'
];

/**
 * SVG Icon helper function
 */
if (!function_exists('get_psico_svg_icon')) {
    function get_psico_svg_icon($type = 'download'): string
    {
        $icons = [
            'download' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" width="20" height="20"><path d="M19 9h-4V3H9v6H5l7 7 7-7zM5 18v2h14v-2H5z"/></svg>',
            'play' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" width="20" height="20"><path d="M8 5v14l11-7z"/></svg>',
            'image' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" width="20" height="20"><path d="M21 19V5c0-1.1-.9-2-2-2H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2zM8.5 13.5l2.5 3.01L14.5 12l4.5 6H5l3.5-4.5z"/></svg>',
            'document' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" width="20" height="20"><path d="M14 2H6c-1.1 0-2 .9-2 2v16c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2V8l-8-6zm-1 16H7v-2h6v2zm3-4H7v-2h10v2zm0-4H7V7h10v3z"/></svg>',
            'link' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" width="20" height="20"><path d="M3.9 12c0-1.71 1.39-3.1 3.1-3.1h4V7H7c-2.76 0-5 2.24-5 5s2.24 5 5 5h4v-1.9H7c-1.71 0-3.1-1.39-3.1-3.1zM8 13h8v-2H8v2zm9-6h-4v1.9h4c1.71 0 3.1 1.39 3.1 3.1s-1.39 3.1-3.1 3.1h-4V17h4c2.76 0 5-2.24 5-5s-2.24-5-5-5z"/></svg>'
        ];

        return isset($icons[$type]) ? $icons[$type] : $icons['download'];
    }
}

?>
<!-- ============================================
     Psychological Resources Section
     ============================================ -->
<section
    class="psico-resources-section w-full py-8 md:py-12 bg-background-light dark:bg-background-dark transition-colors duration-300">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">

        <!-- Section Header - Reduced Spacing -->
        <div class="mb-6 md:mb-8 text-center animate-fade-in-up">
            <h2 class="text-2xl md:text-3xl font-bold font-display text-text-light dark:text-text-dark mb-2">
                <?php echo wp_kses_post($sectionTitle); ?>
            </h2>

            <?php if (!empty($sectionDescription)): ?>
                <p class="text-gray-600 dark:text-gray-300 text-sm md:text-base mb-4 max-w-2xl mx-auto">
                    <?php echo wp_kses_post($sectionDescription); ?>
                </p>
            <?php endif; ?>

            <div
                class="w-12 h-1 bg-gradient-to-r from-transparent via-brand-primary to-transparent rounded-full mx-auto">
            </div>
        </div>

        <!-- Resources Grid - Improved Distribution -->
        <div
            class="grid grid-cols-1 <?php echo esc_attr($gridClass); ?> gap-4 md:gap-6 justify-items-<?php echo $optimalColumns === 1 ? 'center' : 'stretch'; ?>">
            <?php foreach ($items as $index => $item): ?>
                <!-- Resource Card -->
                <div class="psico-resource-card bg-white dark:bg-gray-800 rounded-lg overflow-hidden border border-border-light dark:border-border-dark transition-all duration-300 hover:shadow-lg hover:scale-105 flex flex-col"
                    style="
                        box-shadow: <?php echo esc_attr($currentShadow); ?>;
                        animation-delay: <?php echo ($index * 0.1); ?>s;
                        <?php echo $optimalColumns === 1 ? 'max-width: 400px;' : ''; ?>
                    ">

                    <!-- Image Section -->
                    <?php if (!empty($item['imagen'])): ?>
                        <div class="relative overflow-hidden bg-gray-100 dark:bg-gray-700">
                            <img src="<?php echo esc_url($item['imagen']); ?>" alt="<?php echo esc_attr($item['titulo']); ?>"
                                loading="lazy" style="height: <?php echo intval($imageHeight); ?>px;"
                                class="w-full object-cover transition-transform duration-300 hover:scale-110" />
                            <!-- Overlay gradient -->
                            <div class="absolute inset-0 bg-gradient-to-t from-black/10 to-transparent"></div>
                        </div>
                    <?php else: ?>
                        <div
                            class="h-48 bg-gradient-to-br from-brand-primary/10 to-brand-secondary/10 flex items-center justify-center">
                            <span class="text-brand-primary text-4xl">📚</span>
                        </div>
                    <?php endif; ?>

                    <!-- Content Section -->
                    <div class="flex-1 p-4 flex flex-col">

                        <!-- Resource Type Badge -->
                        <?php if (!empty($item['tipo'])): ?>
                            <div class="mb-3">
                                <span
                                    class="inline-block bg-brand-primary/10 text-brand-primary dark:bg-brand-primary/20 dark:text-brand-primary-300 px-3 py-1 rounded-full text-xs font-semibold uppercase tracking-wide">
                                    <?php echo esc_html($item['tipo']); ?>
                                </span>
                            </div>
                        <?php endif; ?>

                        <!-- Resource Title -->
                        <h3
                            class="text-lg font-semibold text-text-light dark:text-text-dark mb-2 line-clamp-2 leading-tight">
                            <?php echo esc_html($item['titulo']); ?>
                        </h3>

                        <!-- Resource Description -->
                        <?php if (!empty($item['descripcion'])): ?>
                            <p class="text-sm text-gray-600 dark:text-gray-300 mb-4 line-clamp-3 flex-grow">
                                <?php echo esc_html($item['descripcion']); ?>
                            </p>
                        <?php endif; ?>

                        <!-- Action Button -->
                        <?php if (!empty($item['url'])): ?>
                            <?php
                            $isExternal = strpos($item['url'], 'wp-content/uploads') === false;
                            $buttonText = $isExternal ? _x('Ver recurso', 'button label', 'edusiteco') : _x('Descargar', 'button label', 'edusiteco');
                            $buttonIcon = $typeIcons[$item['tipo']] ?? ($isExternal ? 'link' : 'download');
                            ?>
                            <a href="<?php echo esc_url($item['url']); ?>" target="_blank" rel="noopener noreferrer"
                                class="mt-auto inline-flex items-center justify-center bg-brand-primary hover:bg-brand-primary-600 dark:bg-brand-primary-600 dark:hover:bg-brand-primary-500 text-white px-4 py-2 rounded-lg font-medium text-sm transition-all duration-200 transform hover:scale-105 hover:shadow-md">
                                <span class="mr-2 flex items-center justify-center" style="width: 18px; height: 18px;">
                                    <?php echo get_psico_svg_icon($buttonIcon); ?>
                                </span>
                                <?php echo esc_html($buttonText); ?>
                            </a>
                        <?php endif; ?>
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
    @keyframes resource-slide-in {
        from {
            opacity: 0;
            transform: translateY(20px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .psico-resource-card {
        animation: resource-slide-in 0.5s ease-out forwards;
        opacity: 0;
    }

    /* Mobile responsive adjustments */
    @media (max-width: 768px) {
        .psico-resources-section {
            padding: 1.5rem 0;
        }
    }

    /* Dark mode adjustments */
    .dark .psico-resource-card {
        border-color: hsl(var(--color-border-dark));
    }

    .dark .psico-resource-card:hover {
        box-shadow: 0 12px 24px rgba(0, 0, 0, 0.4);
        border-color: hsl(var(--color-brand-primary) / 0.3);
    }

    /* Light mode hover enhancements */
    .psico-resource-card:hover {
        border-color: hsl(var(--color-brand-primary) / 0.4);
    }

    /* Prefers reduced motion */
    @media (prefers-reduced-motion: reduce) {
        .psico-resource-card {
            animation: none;
        }

        .psico-resource-card:hover {
            transform: none;
        }
    }
</style>