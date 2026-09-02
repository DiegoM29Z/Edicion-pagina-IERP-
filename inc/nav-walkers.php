<?php
/**
 * Custom Nav Walkers for the theme - VERSIÓN MEJORADA
 * Considerando imagen de cabecera y modo oscuro
 *
 * @package edusiteco
 */

/**
 * Custom Nav Walker for the desktop menu.
 * Renders a semantic <ul><li> structure with Tailwind CSS classes
 * for dropdown functionality. Mejora: detección automática de contraste
 */
class Custom_Nav_Walker extends Walker_Nav_Menu
{
    /**
     * Starts the list before the elements are added.
     */
    public function start_lvl(&$output, $depth = 0, $args = null)
    {
        $indent = str_repeat("\t", $depth);
        $output .= "\n$indent<ul class=\"submenu\">\n";
    }

    /**
     * Ends the list of after the elements are added.
     */
    public function end_lvl(&$output, $depth = 0, $args = null)
    {
        $indent = str_repeat("\t", $depth);
        $output .= "$indent</ul>\n";
    }

    /**
     * Starts the element output.
     * MEJORA: Detecta automáticamente si hay imagen y modo oscuro para colores óptimos
     */
    public function start_el(&$output, $item, $depth = 0, $args = null, $id = 0)
    {
        $indent = ($depth) ? str_repeat("\t", $depth) : '';

        // Preserve WordPress native classes and add custom ones
        $li_classes = array('header-group');
        $li_classes = array_merge($li_classes, empty($item->classes) ? array() : (array) $item->classes);

        $has_children = in_array('menu-item-has-children', $item->classes);

        if ($has_children) {
            $li_classes[] = 'relative';
            $li_classes[] = 'group';
        }

        // Add current item classes
        if (in_array('current-menu-item', $item->classes)) {
            $li_classes[] = 'current';
        }

        // Filter and sanitize classes
        $li_classes = apply_filters('nav_menu_css_class', array_filter($li_classes), $item, $args, $depth);
        $class_names = join(' ', $li_classes);
        $class_names = $class_names ? ' class="' . esc_attr($class_names) . '"' : '';

        // Add ID if exists
        $id = apply_filters('nav_menu_item_id', 'menu-item-' . $item->ID, $item, $args, $depth);
        $id = $id ? ' id="' . esc_attr($id) . '"' : '';

        $output .= $indent . '<li' . $id . $class_names . '>';

        $has_header_image = get_header_image() ? true : false;

        // ========== LÓGICA MEJORADA DE COLORES ==========
        // Determina colores basados en: imagen de cabecera + modo oscuro

        if ($has_header_image) {
            // CON IMAGEN - siempre usar blanco/claro para mejor contraste
            $text_color_class = 'text-white drop-shadow-md';
            $hover_color_class = 'hover:text-brand-primary-200';
            $icon_color_class = 'text-white drop-shadow-sm';
            $focus_ring_class = 'focus:ring-white/50 focus:ring-offset-blue-900';
        } else {
            // SIN IMAGEN - usa colores según modo claro/oscuro
            $text_color_class = 'text-text-light dark:text-text-dark';
            $hover_color_class = 'hover:text-brand-primary dark:hover:text-brand-primary-300';
            $icon_color_class = 'text-text-light dark:text-text-dark';
            $focus_ring_class = 'focus:ring-brand-primary/50 focus:ring-offset-2 focus:ring-offset-background-light dark:focus:ring-offset-background-dark';
        }

        $a_classes = array(
            $text_color_class,
            $hover_color_class,
            'text-lg',
            'font-bold',
            'transition-all',
            'duration-200',
            'rounded-sm',
            'focus:outline-none',
            'focus:ring-2',
            $focus_ring_class,
            'no-underline',
        );

        $atts = array();
        $atts['title'] = !empty($item->attr_title) ? $item->attr_title : '';
        $atts['target'] = !empty($item->target) ? $item->target : '';
        $atts['rel'] = !empty($item->xfn) ? $item->xfn : '';
        $atts['href'] = !empty($item->url) ? $item->url : '';
        $atts['class'] = implode(' ', $a_classes);

        if ($has_children) {
            $atts['aria-haspopup'] = 'true';
            $atts['aria-expanded'] = 'false';
        }

        $atts = apply_filters('nav_menu_link_attributes', $atts, $item, $args, $depth);

        $attributes = '';
        foreach ($atts as $attr => $value) {
            if (!empty($value)) {
                $value = ('href' === $attr) ? esc_url($value) : esc_attr($value);
                $attributes .= ' ' . $attr . '="' . $value . '"';
            }
        }

        $title = apply_filters('nav_menu_item_title', $item->title, $item, $args, $depth);

        $item_output = $args->before;
        $item_output .= '<a' . $attributes . '>';
        $item_output .= $args->link_before . '<span class="underline-link">' . esc_html($title) . '</span>' . $args->link_after;
        if ($has_children) {
            $item_output .= '<span class="material-icons text-2xl ml-1 ' . esc_attr($icon_color_class) . ' group-hover:rotate-180 transition-transform duration-200" aria-hidden="true">expand_more</span>';
        }
        $item_output .= '</a>';
        $item_output .= $args->after;

        $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
    }

    /**
     * Ends the element output, if needed.
     */
    public function end_el(&$output, $item, $depth = 0, $args = null)
    {
        $output .= "</li>\n";
    }
}


/**
 * Custom Nav Walker for the mobile menu.
 * Renders an accessible toggle button for submenus and uses
 * an external JS file for interactions.
 */
class Mobile_Nav_Walker extends Walker_Nav_Menu
{
    /**
     * Starts the element output.
     * MEJORA: Mejor detección de contraste en modo móvil
     */
    public function start_el(&$output, $item, $depth = 0, $args = null, $id = 0)
    {
        $has_children = in_array('menu-item-has-children', $item->classes);
        $submenu_id = 'submenu-' . $item->ID;
        $title = apply_filters('nav_menu_item_title', $item->title, $item, $args, $depth);

        $has_header_image = get_header_image() ? true : false;

        // ========== ESTILOS MEJORADOS PARA MÓVIL ==========
        if ($has_header_image) {
            // CON IMAGEN - fondos semi-transparentes sobre la imagen
            $text_color_class = 'text-white';
            $bg_class = 'bg-white/15 hover:bg-white/25 active:bg-white/35';
            $link_bg_class = 'bg-white/15 hover:bg-white/25';
        } else {
            // SIN IMAGEN - colores normales según tema
            $text_color_class = 'text-text-light dark:text-text-dark';
            $bg_class = 'bg-gray-100 hover:bg-gray-200 dark:bg-gray-800 dark:hover:bg-gray-700';
            $link_bg_class = 'bg-gray-50 hover:bg-gray-100 dark:bg-gray-800 dark:hover:bg-gray-700';
        }

        if ($has_children) {
            $output .= '<li class="border-b border-border-light dark:border-border-dark last:border-b-0">';
            $output .= '<div class="flex items-center">';

            // Link
            $output .= '<a href="' . esc_url($item->url) . '" class="flex-1 pl-4 pr-4 py-3.5 text-base font-medium ' . $text_color_class . ' ' . $link_bg_class . ' transition-all duration-200">';
            $output .= esc_html($title);
            $output .= '</a>';

            // Toggle Button
            $output .= '<button type="button" class="mobile-toggle flex-shrink-0 px-4 py-[8px] transition-all duration-200 ' . $bg_class . ' ' . $text_color_class . '" aria-controls="' . esc_attr($submenu_id) . '" aria-expanded="false" aria-label="' . esc_attr(sprintf(__('Toggle %s submenu', 'edusiteco'), $title)) . '">';
            $output .= '<span class="material-icons text-2xl transition-transform duration-200" aria-hidden="true">expand_more</span>';
            $output .= '</button>';

            $output .= '</div>';
            $output .= '<div id="' . esc_attr($submenu_id) . '" class="submenu hidden">';

        } else {
            $output .= '<li class="border-b border-border-light dark:border-border-dark last:border-b-0">';
            $output .= '<a class="block pl-4 pr-4 py-3.5 text-base font-medium ' . $text_color_class . ' ' . $link_bg_class . ' transition-all duration-200" href="' . esc_url($item->url) . '">';
            $output .= esc_html($title);
            $output .= '</a>';
        }
    }

    /**
     * Ends the element output.
     */
    public function end_el(&$output, $item, $depth = 0, $args = null)
    {
        if (in_array('menu-item-has-children', $item->classes)) {
            $output .= '</div>';
        }
        $output .= '</li>';
    }

    /**
     * Starts the list before the elements are added.
     */
    public function start_lvl(&$output, $depth = 0, $args = null)
    {
        $indent = str_repeat("\t", $depth);
        $output .= "\n$indent<ul class=\"pl-6 space-y-0\">\n";
    }

    /**
     * Ends the list of after the elements are added.
     */
    public function end_lvl(&$output, $depth = 0, $args = null)
    {
        $indent = str_repeat("\t", $depth);
        $output .= "$indent</ul>\n";
    }
}


// ========== FALLBACK FUNCTIONS ==========

// Fallback function for desktop menu
function edusiteco_default_menu()
{
    $has_header_image = get_header_image() ? true : false;

    // Clases dinámicas basadas en imagen
    $link_class = $has_header_image
        ? 'text-white drop-shadow-md hover:text-yellow-200 focus:ring-white/50'
        : 'text-text-light dark:text-text-dark hover:text-brand-primary dark:hover:text-brand-primary-300 focus:ring-brand-primary/50';

    $icon_class = $has_header_image
        ? 'text-white drop-shadow-sm'
        : 'text-text-light dark:text-text-dark';
    ?>
    <ul class="flex items-center space-x-1">
        <li class="relative header-group group">
            <?php
            $mision_page = get_page_by_path('mision-vision-y-valores');
            $mision_url = $mision_page ? get_permalink($mision_page->ID) : '#';

            $history_page = get_page_by_path('historia');
            $history_url = $history_page ? get_permalink($history_page->ID) : '#';

            $directory_page = get_page_by_path('directorio');
            $directory_url = $directory_page ? get_permalink($directory_page->ID) : '#';

            $symbols_page = get_page_by_path('simbolos-institucionales');
            $symbols_url = $symbols_page ? get_permalink($symbols_page->ID) : '#';

            $contact_page = get_page_by_path('contactanos');
            $contact_url = $contact_page ? get_permalink($contact_page->ID) : '#';

            $psico_page = get_page_by_path('psicoorientacion-escolar');
            $psico_url = $psico_page ? get_permalink($psico_page->ID) : '#';
            ?>

            <a href="#"
                class="<?= $link_class ?> inline-flex items-center text-sm font-semibold underline-link transition-all px-3 py-2 rounded-sm focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-background-light dark:focus:ring-offset-background-dark">
                <span>La Institución</span>
                <span
                    class="material-icons text-sm ml-1 <?= $icon_class ?> group-hover:rotate-180 transition-transform duration-200">expand_more</span>
            </a>

            <ul class="submenu">
                <li><a class="submenu-item" href="<?= $mision_url ?>">Misión, Visión y Valores</a></li>
                <li><a class="submenu-item" href="<?= $history_url ?>">Nuestra Historia</a></li>
                <li><a class="submenu-item" href="<?= $directory_url ?>">Directorio</a></li>
                <li><a class="submenu-item" href="<?= $symbols_url ?>">Símbolos Institucionales</a></li>
            </ul>
        </li>

        <li class="relative header-group group">
            <?php
            $comunicados_archive_url = get_post_type_archive_link('comunicado');
            
            $convocatorias_category = get_category_by_slug('convocatorias');
            $convocatorias_url = $convocatorias_category ? get_category_link($convocatorias_category->term_id) : '#';
            
            $eventos_category = get_category_by_slug('eventos');
            $eventos_url       = $eventos_category ? get_category_link($eventos_category->term_id) : '#';
            
            $circulares_category = get_category_by_slug('circulares');
            $circulares_url       = $circulares_category ? get_category_link($circulares_category->term_id) : '#';
            ?>
            <a href="#"
                class=" inline-flex items-center text-sm font-semibold underline-link transition-all px-3 py-2 rounded-sm focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-background-light dark:focus:ring-offset-background-dark">
                <span>Noticias</span>
                <span class="material-icons text-sm ml-1 <?= $icon_class ?> group-hover:rotate-180 transition-transform duration-200">expand_more</span>
            </a>

            <ul class="submenu">
                <li>
                    <a class="submenu-item" href="<?php echo esc_url($comunicados_archive_url); ?>">
                        Comunicados
                    </a>
                </li>
                <li>
                    <a class="submenu-item" href="<?php echo esc_url($convocatorias_url); ?>">
                        Convocatorias
                    </a>
                </li>
                <li>
                    <a class="submenu-item" href="<?php echo esc_url($circulares_url); ?>">
                        Circulares
                    </a>
                </li>
                <li>
                    <a class="submenu-item" href="<?php echo esc_url($eventos_url); ?>">
                        Eventos
                    </a>
                </li>
            </ul>
        </li>

        <li class="header-group">
            <a class="<?= $link_class ?> text-sm font-semibold underline-link transition-all px-3 py-2 rounded-sm focus:outline-none focus:ring-2 focus:ring-offset-2"
                href="/profesores/">
                <span>Profesores</span>
            </a>
        </li>
        <li class="header-group">
            <a class="<?= $link_class ?> text-sm font-semibold underline-link transition-all px-3 py-2 rounded-sm focus:outline-none focus:ring-2 focus:ring-offset-2"
                href="<?= $contact_url ?>">
                <span>Contáctanos</span>
            </a>
        </li>
        <li class="header-group">
            <a class="<?= $link_class ?> text-sm font-semibold underline-link transition-all px-3 py-2 rounded-sm focus:outline-none focus:ring-2 focus:ring-offset-2"
                href="<?= esc_url($psico_url) ?>">
                <span>Psicoorientación</span>
            </a>
        </li>
    </ul>
    <?php
}

// Fallback function for mobile menu
function edusiteco_default_mobile_menu()
{
    $has_header_image = get_header_image() ? true : false;

    $institution_page = get_page_by_path('la-institucion');
    $institution_url = $institution_page ? get_permalink($institution_page->ID) : '#';

    $mision_page = get_page_by_path('mision-vision-y-valores');
    $mision_url = $mision_page ? get_permalink($mision_page->ID) : '#';

    $history_page = get_page_by_path('historia');
    $history_url = $history_page ? get_permalink($history_page->ID) : '#';

    $directory_page = get_page_by_path('directorio');
    $directory_url = $directory_page ? get_permalink($directory_page->ID) : '#';

    $symbols_page = get_page_by_path('simbolos-institucionales');
    $symbols_url = $symbols_page ? get_permalink($symbols_page->ID) : '#';

    $psico_page = get_page_by_path('psicoorientacion-escolar');
    $psico_url = $psico_page ? get_permalink($psico_page->ID) : '#';

    // Estilos dinámicos para móvil
    $link_classes = $has_header_image
        ? 'text-white bg-white/15 hover:bg-white/25'
        : 'text-text-light dark:text-text-dark hover:bg-gray-50 dark:hover:bg-gray-700';

    $submenu_link_classes = $has_header_image
        ? 'text-white hover:bg-white/20'
        : 'text-text-light dark:text-text-dark hover:bg-gray-100 dark:hover:bg-gray-700';
    ?>
    <div class="border-b border-border-light dark:border-border-dark last:border-b-0">
        <div class="flex items-center">
            <a href="<?= $institution_url ?>"
                class="flex-1 pl-4 pr-4 py-3.5 text-base font-medium <?= $link_classes ?> transition-all">
                La Institución
            </a>
            <button class="mobile-toggle flex-shrink-0 px-4 py-3.5 <?= $link_classes ?> transition-all"
                aria-expanded="false" aria-controls="default-submenu-1">
                <span class="material-icons text-sm transition-transform duration-200">expand_more</span>
            </button>
        </div>
        <div id="default-submenu-1" class="hidden">
            <div class="pl-6">
                <a class="block pl-8 pr-4 py-3 text-base font-medium <?= $submenu_link_classes ?> transition-all"
                    href="<?= $history_url ?>">
                    Nuestra Historia
                </a>
                <a class="block pl-8 pr-4 py-3 text-base font-medium <?= $submenu_link_classes ?> transition-all"
                    href="<?= $mision_url ?>">
                    Misión, Visión y Valores
                </a>
                <a class="block pl-8 pr-4 py-3 text-base font-medium <?= $submenu_link_classes ?> transition-all"
                    href="<?= $symbols_url ?>">
                    Símbolos Institucionales
                </a>
                <a class="block pl-8 pr-4 py-3 text-base font-medium <?= $submenu_link_classes ?> transition-all"
                    href="<?= $directory_url ?>">
                    Directorio
                </a>
            </div>
        </div>
    </div>
    <a class="block pl-4 pr-4 py-3.5 text-base font-medium <?= $link_classes ?> border-b border-border-light dark:border-border-dark last:border-b-0 transition-all"
        href="/comunicados/">
        Comunicados
    </a>
    <a class="block pl-4 pr-4 py-3.5 text-base font-medium <?= $link_classes ?> border-b border-border-light dark:border-border-dark last:border-b-0 transition-all"
        href="/profesores/">
        Profesores
    </a>
    <a class="block pl-4 pr-4 py-3.5 text-base font-medium <?= $link_classes ?> border-b border-border-light dark:border-border-dark last:border-b-0 transition-all"
        href="<?= esc_url($psico_url) ?>">
        Psicoorientación
    </a>
    <?php
}