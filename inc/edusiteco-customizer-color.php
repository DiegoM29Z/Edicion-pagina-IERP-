<?php
/**
 * Edusiteco Theme Customizer - Versión Unificada
 *
 * @package edusiteco
 */

// ============================================
// HELPER FUNCTIONS
// ============================================

/**
 * Converts a HEX color value to HSL.
 *
 * @param string $hex The hex color.
 * @return string The HSL representation.
 */
function edusiteco_hex_to_hsl($hex)
{
    $hex = str_replace('#', '', $hex);
    $r = hexdec(substr($hex, 0, 2)) / 255;
    $g = hexdec(substr($hex, 2, 2)) / 255;
    $b = hexdec(substr($hex, 4, 2)) / 255;

    $max = max($r, $g, $b);
    $min = min($r, $g, $b);
    $l = ($max + $min) / 2;

    if ($max == $min) {
        $h = $s = 0;
    } else {
        $d = $max - $min;
        $s = $l > 0.5 ? $d / (2 - $max - $min) : $d / ($max + $min);

        switch ($max) {
            case $r:
                $h = (($g - $b) / $d + ($g < $b ? 6 : 0)) / 6;
                break;
            case $g:
                $h = (($b - $r) / $d + 2) / 6;
                break;
            case $b:
                $h = (($r - $g) / $d + 4) / 6;
                break;
        }
    }

    $h = round($h * 360);
    $s = round($s * 100);
    $l = round($l * 100);

    return "$h $s% $l%";
}

/**
 * Genera variantes de color (50-900) desde un color base HSL
 *
 * @param string $hsl Color base en formato HSL
 * @param bool $dark_mode Si es para modo oscuro
 * @return array Array con las variantes [50, 100, 200, ..., 900]
 */
function edusiteco_generate_color_variants($hsl, $dark_mode = false)
{
    list($h, $s, $l) = explode(' ', $hsl);
    $h = (int) $h;
    $s = (int) str_replace('%', '', $s);
    $l = (int) str_replace('%', '', $l);

    $variants = array();

    if ($dark_mode) {
        // Modo oscuro: invertir la escala para mejor contraste
        $variants[50] = "$h $s% 10%";
        $variants[100] = "$h $s% 15%";
        $variants[200] = "$h $s% 20%";
        $variants[300] = "$h $s% " . max(10, $l - 15) . "%";
        $variants[400] = "$h $s% " . max(15, $l - 5) . "%";
        $variants[500] = "$h $s% " . min(85, $l + 12) . "%";
        $variants[600] = "$h $s% " . min(90, $l + 20) . "%";
        $variants[700] = "$h $s% " . min(92, $l + 28) . "%";
        $variants[800] = "$h $s% " . min(95, $l + 35) . "%";
        $variants[900] = "$h $s% " . min(97, $l + 42) . "%";
    } else {
        // Modo claro: escala normal
        $variants[50] = "$h $s% 95%";
        $variants[100] = "$h $s% 90%";
        $variants[200] = "$h $s% 80%";
        $variants[300] = "$h $s% 70%";
        $variants[400] = "$h $s% " . min(95, $l + 15) . "%";
        $variants[500] = "$h $s% $l%";
        $variants[600] = "$h $s% " . max(5, $l - 8) . "%";
        $variants[700] = "$h $s% " . max(5, $l - 13) . "%";
        $variants[800] = "$h $s% " . max(5, $l - 18) . "%";
        $variants[900] = "$h $s% " . max(5, $l - 23) . "%";
    }

    return $variants;
}

/**
 * Ajusta brillo de un color HEX
 *
 * @param string $hex Color en HEX
 * @param int $brightness Cantidad a ajustar (-255 a 255)
 * @return string Color ajustado en HEX
 */
function edusiteco_adjust_color_brightness($hex, $brightness = 0)
{
    $hex = str_replace('#', '', $hex);

    $r = hexdec(substr($hex, 0, 2));
    $g = hexdec(substr($hex, 2, 2));
    $b = hexdec(substr($hex, 4, 2));

    $r = max(0, min(255, $r + $brightness));
    $g = max(0, min(255, $g + $brightness));
    $b = max(0, min(255, $b + $brightness));

    return '#' . str_pad(dechex($r), 2, '0', STR_PAD_LEFT)
        . str_pad(dechex($g), 2, '0', STR_PAD_LEFT)
        . str_pad(dechex($b), 2, '0', STR_PAD_LEFT);
}

/**
 * Obtiene las fuentes de Google disponibles
 */
function edusiteco_get_google_fonts()
{
    return array(
        '' => 'Fuente por defecto',
        'Roboto:300,400,500,700' => 'Roboto',
        'Open Sans:300,400,600,700' => 'Open Sans',
        'Lato:300,400,700,900' => 'Lato',
        'Montserrat:300,400,500,600,700,800' => 'Montserrat',
        'Poppins:300,400,500,600,700' => 'Poppins',
        'Inter:300,400,500,600,700' => 'Inter',
        'Nunito:300,400,600,700,800' => 'Nunito',
        'Raleway:300,400,500,600,700' => 'Raleway',
        'Work Sans:300,400,500,600,700' => 'Work Sans',
        'Plus Jakarta Sans:200,300,400,500,600,700' => 'Plus Jakarta Sans',
        'Ubuntu:300,400,500,700' => 'Ubuntu',
        'Merriweather:300,400,700,900' => 'Merriweather',
        'Playfair Display:400,500,600,700,800,900' => 'Playfair Display',
        'Source Sans Pro:300,400,600,700' => 'Source Sans Pro',
        'Quicksand:300,400,500,600,700' => 'Quicksand',
        'Outfit:300,400,500,600,700,800' => 'Outfit',
        'Space Grotesk:300,400,500,600,700' => 'Space Grotesk',
    );
}

// ============================================
// CUSTOMIZER REGISTRATION
// ============================================

/**
 * Registra todas las opciones del Customizer
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function edusiteco_customize_register($wp_customize)
{

    // PostMessage support para título y descripción
    $wp_customize->get_setting('blogname')->transport = 'postMessage';
    $wp_customize->get_setting('blogdescription')->transport = 'postMessage';

    if (isset($wp_customize->selective_refresh)) {
        $wp_customize->selective_refresh->add_partial(
            'blogname',
            array(
                'selector' => '.site-title a',
                'render_callback' => 'edusiteco_customize_partial_blogname',
            )
        );
        $wp_customize->selective_refresh->add_partial(
            'blogdescription',
            array(
                'selector' => '.site-description',
                'render_callback' => 'edusiteco_customize_partial_blogdescription',
            )
        );
    }

    // ========================================
    // SECCIÓN: COLORES DE MARCA
    // ========================================

    $colors = array(
        'primary' => array('label' => 'Color Primario', 'default' => '#0367A6'),
        'secondary' => array('label' => 'Color Secundario', 'default' => '#03658C'),
        'accent' => array('label' => 'Color Acento', 'default' => '#6C8C3B'),
        'warning' => array('label' => 'Color Advertencia', 'default' => '#F28705'),
        'danger' => array('label' => 'Color Peligro', 'default' => '#D96907'),
    );

    $color_priority = 10;
    foreach ($colors as $key => $value) {
        $wp_customize->add_setting("brand_color_{$key}", array(
            'default' => $value['default'],
            'sanitize_callback' => 'sanitize_hex_color',
            'transport' => 'postMessage',
        ));

        $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, "brand_color_{$key}", array(
            'label' => __($value['label'], 'edusiteco'),
            'section' => 'colors',
            'settings' => "brand_color_{$key}",
            'priority' => $color_priority,
            'description' => sprintf(__('Genera automáticamente 11 variantes (50-900) desde %s', 'edusiteco'), $value['default']),
        )));
        $color_priority += 5;
    }

    // ========================================
    // SECCIÓN: GRADIENTES PERSONALIZADOS
    // ========================================

    $wp_customize->add_setting('gradient_color_1', array(
        'default' => '#0367A6',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'gradient_color_1', array(
        'label' => __('Gradiente - Color Inicio', 'edusiteco'),
        'section' => 'colors',
        'priority' => $color_priority + 5,
        'description' => __('Color inicial del gradiente personalizado', 'edusiteco'),
    )));

    $wp_customize->add_setting('gradient_color_2', array(
        'default' => '#03658C',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'gradient_color_2', array(
        'label' => __('Gradiente - Color Final', 'edusiteco'),
        'section' => 'colors',
        'priority' => $color_priority + 10,
        'description' => __('Color final del gradiente personalizado', 'edusiteco'),
    )));

    $wp_customize->add_setting('gradient_direction', array(
        'default' => 'to right',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control('gradient_direction', array(
        'type' => 'select',
        'label' => __('Dirección del Gradiente', 'edusiteco'),
        'section' => 'colors',
        'priority' => $color_priority + 15,
        'choices' => array(
            'to right' => __('→ Horizontal (Derecha)', 'edusiteco'),
            'to left' => __('← Horizontal (Izquierda)', 'edusiteco'),
            'to bottom' => __('↓ Vertical (Abajo)', 'edusiteco'),
            'to top' => __('↑ Vertical (Arriba)', 'edusiteco'),
            'to bottom right' => __('↘ Diagonal (Abajo-Derecha)', 'edusiteco'),
            'to bottom left' => __('↙ Diagonal (Abajo-Izquierda)', 'edusiteco'),
            'to top right' => __('↗ Diagonal (Arriba-Derecha)', 'edusiteco'),
            'to top left' => __('↖ Diagonal (Arriba-Izquierda)', 'edusiteco'),
        ),
    ));

    // ========================================
    // PANEL: TIPOGRAFÍA
    // ========================================

    $wp_customize->add_panel('typography_panel', array(
        'title' => __('Tipografía y Fuentes', 'edusiteco'),
        'description' => __('Personaliza las fuentes y tamaños del sitio', 'edusiteco'),
        'priority' => 35,
    ));

    // --- SECCIÓN: Fuente del Cuerpo ---
    $wp_customize->add_section('body_typography', array(
        'title' => __('Fuente Principal (Cuerpo)', 'edusiteco'),
        'panel' => 'typography_panel',
        'priority' => 10,
    ));

    // Familia de fuente - Body
    $wp_customize->add_setting('body_font_family', array(
        'default' => 'Plus Jakarta Sans:200,300,400,500,600,700',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control('body_font_family', array(
        'label' => __('Familia de Fuente', 'edusiteco'),
        'section' => 'body_typography',
        'type' => 'select',
        'choices' => edusiteco_get_google_fonts(),
    ));

    // Tamaño - Body
    $wp_customize->add_setting('body_font_size', array(
        'default' => '16',
        'sanitize_callback' => 'absint',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control('body_font_size', array(
        'label' => __('Tamaño de Fuente (px)', 'edusiteco'),
        'description' => __('Tamaño base del texto', 'edusiteco'),
        'section' => 'body_typography',
        'type' => 'number',
        'input_attrs' => array('min' => 12, 'max' => 24, 'step' => 1),
    ));

    // Peso - Body
    $wp_customize->add_setting('body_font_weight', array(
        'default' => '400',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control('body_font_weight', array(
        'label' => __('Peso de Fuente', 'edusiteco'),
        'section' => 'body_typography',
        'type' => 'select',
        'choices' => array(
            '300' => 'Ligera (300)',
            '400' => 'Normal (400)',
            '500' => 'Media (500)',
            '600' => 'Semi-negrita (600)',
            '700' => 'Negrita (700)',
        ),
    ));

    // Color - Body
    $wp_customize->add_setting('body_text_color', array(
        'default' => '#1A202C',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'body_text_color', array(
        'label' => __('Color del Texto', 'edusiteco'),
        'section' => 'body_typography',
    )));

    // Altura de línea - Body
    $wp_customize->add_setting('body_line_height', array(
        'default' => '1.6',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control('body_line_height', array(
        'label' => __('Altura de Línea', 'edusiteco'),
        'description' => __('Espaciado entre líneas', 'edusiteco'),
        'section' => 'body_typography',
        'type' => 'number',
        'input_attrs' => array('min' => 1, 'max' => 3, 'step' => 0.1),
    ));

    // --- SECCIÓN: Encabezados ---
    $wp_customize->add_section('headings_typography', array(
        'title' => __('Encabezados (Títulos)', 'edusiteco'),
        'panel' => 'typography_panel',
        'priority' => 20,
    ));

    // Familia - Headings
    $wp_customize->add_setting('headings_font_family', array(
        'default' => 'Montserrat:400,500,600,700',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control('headings_font_family', array(
        'label' => __('Familia de Fuente', 'edusiteco'),
        'section' => 'headings_typography',
        'type' => 'select',
        'choices' => edusiteco_get_google_fonts(),
    ));

    // Peso - Headings
    $wp_customize->add_setting('headings_font_weight', array(
        'default' => '700',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control('headings_font_weight', array(
        'label' => __('Peso de Fuente', 'edusiteco'),
        'section' => 'headings_typography',
        'type' => 'select',
        'choices' => array(
            '400' => 'Normal (400)',
            '500' => 'Media (500)',
            '600' => 'Semi-negrita (600)',
            '700' => 'Negrita (700)',
            '800' => 'Extra-negrita (800)',
            '900' => 'Ultra-negrita (900)',
        ),
    ));

    // Color - Headings
    $wp_customize->add_setting('headings_text_color', array(
        'default' => '#1A202C',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'headings_text_color', array(
        'label' => __('Color de Títulos', 'edusiteco'),
        'section' => 'headings_typography',
    )));

    // Transformación - Headings
    $wp_customize->add_setting('headings_text_transform', array(
        'default' => 'none',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control('headings_text_transform', array(
        'label' => __('Transformación de Texto', 'edusiteco'),
        'section' => 'headings_typography',
        'type' => 'select',
        'choices' => array(
            'none' => 'Normal',
            'uppercase' => 'MAYÚSCULAS',
            'lowercase' => 'minúsculas',
            'capitalize' => 'Primera Letra Mayúscula',
        ),
    ));

    // Tamaños H1-H6
    $headings = array('h1' => 36, 'h2' => 30, 'h3' => 24, 'h4' => 20, 'h5' => 18, 'h6' => 16);
    foreach ($headings as $tag => $default_size) {
        $wp_customize->add_setting("{$tag}_font_size", array(
            'default' => (string) $default_size,
            'sanitize_callback' => 'absint',
            'transport' => 'postMessage',
        ));

        $wp_customize->add_control("{$tag}_font_size", array(
            'label' => sprintf(__('Tamaño %s (px)', 'edusiteco'), strtoupper($tag)),
            'section' => 'headings_typography',
            'type' => 'number',
            'input_attrs' => array('min' => 12, 'max' => 72, 'step' => 1),
        ));
    }

    // --- SECCIÓN: Menú ---
    $wp_customize->add_section('menu_typography', array(
        'title' => __('Menú de Navegación', 'edusiteco'),
        'panel' => 'typography_panel',
        'priority' => 30,
    ));

    // Tamaño - Menu
    $wp_customize->add_setting('menu_font_size', array(
        'default' => '16',
        'sanitize_callback' => 'absint',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control('menu_font_size', array(
        'label' => __('Tamaño de Fuente (px)', 'edusiteco'),
        'section' => 'menu_typography',
        'type' => 'number',
        'input_attrs' => array('min' => 12, 'max' => 20, 'step' => 1),
    ));

    // Peso - Menu
    $wp_customize->add_setting('menu_font_weight', array(
        'default' => '600',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control('menu_font_weight', array(
        'label' => __('Peso de Fuente', 'edusiteco'),
        'section' => 'menu_typography',
        'type' => 'select',
        'choices' => array(
            '400' => 'Normal (400)',
            '500' => 'Media (500)',
            '600' => 'Semi-negrita (600)',
            '700' => 'Negrita (700)',
        ),
    ));

    // Color - Menu
    $wp_customize->add_setting('menu_text_color', array(
        'default' => '#1A202C',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'menu_text_color', array(
        'label' => __('Color del Texto', 'edusiteco'),
        'section' => 'menu_typography',
    )));

    // Transformación - Menu
    $wp_customize->add_setting('menu_text_transform', array(
        'default' => 'none',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control('menu_text_transform', array(
        'label' => __('Transformación de Texto', 'edusiteco'),
        'section' => 'menu_typography',
        'type' => 'select',
        'choices' => array(
            'none' => 'Normal',
            'uppercase' => 'MAYÚSCULAS',
            'lowercase' => 'minúsculas',
            'capitalize' => 'Primera Letra Mayúscula',
        ),
    ));
}
add_action('customize_register', 'edusiteco_customize_register');

// ============================================
// CUSTOM HEADER SETUP
// ============================================

function edusiteco_custom_header_setup()
{
    add_theme_support(
        'custom-header',
        apply_filters(
            'edusiteco_custom_header_args',
            array(
                'default-image' => '',
                'default-text-color' => '000000',
                'width' => 1000,
                'height' => 250,
                'flex-height' => true,
                'wp-head-callback' => 'edusiteco_output_all_custom_styles',
            )
        )
    );
}
add_action('after_setup_theme', 'edusiteco_custom_header_setup');

// ============================================
// CSS OUTPUT - UNIFIED FUNCTION
// ============================================

/**
 * Inyecta TODOS los estilos personalizados en el head
 * Esta función maneja: header, colores, variantes y tipografía
 */
function edusiteco_output_all_custom_styles()
{
    $header_text_color = get_header_textcolor();

    // ========== COLORES ==========
    $primary = get_theme_mod('brand_color_primary', '#0367A6');
    $secondary = get_theme_mod('brand_color_secondary', '#03658C');
    $accent = get_theme_mod('brand_color_accent', '#6C8C3B');
    $warning = get_theme_mod('brand_color_warning', '#F28705');
    $danger = get_theme_mod('brand_color_danger', '#D96907');

    // Convertir a HSL
    $primary_hsl = edusiteco_hex_to_hsl($primary);
    $secondary_hsl = edusiteco_hex_to_hsl($secondary);
    $accent_hsl = edusiteco_hex_to_hsl($accent);
    $warning_hsl = edusiteco_hex_to_hsl($warning);
    $danger_hsl = edusiteco_hex_to_hsl($danger);

    // Generar variantes
    $primary_variants = edusiteco_generate_color_variants($primary_hsl);
    $secondary_variants = edusiteco_generate_color_variants($secondary_hsl);
    $accent_variants = edusiteco_generate_color_variants($accent_hsl);
    $warning_variants = edusiteco_generate_color_variants($warning_hsl);
    $danger_variants = edusiteco_generate_color_variants($danger_hsl);

    // Variantes modo oscuro
    $primary_dark = edusiteco_generate_color_variants($primary_hsl, true);
    $secondary_dark = edusiteco_generate_color_variants($secondary_hsl, true);
    $accent_dark = edusiteco_generate_color_variants($accent_hsl, true);
    $warning_dark = edusiteco_generate_color_variants($warning_hsl, true);
    $danger_dark = edusiteco_generate_color_variants($danger_hsl, true);

    // ========== GRADIENTES ==========
    $gradient_color_1 = get_theme_mod('gradient_color_1', '#0367A6');
    $gradient_color_2 = get_theme_mod('gradient_color_2', '#03658C');
    $gradient_direction = get_theme_mod('gradient_direction', 'to right');

    // ========== TIPOGRAFÍA ==========
    $body_font      = get_theme_mod('body_font_family', 'Plus Jakarta Sans:200,300,400,500,600,700');
    $body_size      = get_theme_mod('body_font_size', 16);
    $body_weight    = get_theme_mod('body_font_weight', '400');
    $body_color     = get_theme_mod('body_text_color', '#1A202C');
    $body_line_height = get_theme_mod('body_line_height', '1.6');

    $headings_font      = get_theme_mod('headings_font_family', 'Montserrat:400,500,600,700');
    $headings_weight    = get_theme_mod('headings_font_weight', '700');
    $headings_color     = get_theme_mod('headings_text_color', '#1A202C');
    $headings_transform = get_theme_mod('headings_text_transform', 'none');

    $h1_size = get_theme_mod('h1_font_size', 36);
    $h2_size = get_theme_mod('h2_font_size', 30);
    $h3_size = get_theme_mod('h3_font_size', 24);
    $h4_size = get_theme_mod('h4_font_size', 20);
    $h5_size = get_theme_mod('h5_font_size', 18);
    $h6_size = get_theme_mod('h6_font_size', 16);

    $menu_size = get_theme_mod('menu_font_size', 14);
    $menu_weight = get_theme_mod('menu_font_weight', '600');
    $menu_color = get_theme_mod('menu_text_color', '#1A202C');
    $menu_transform = get_theme_mod('menu_text_transform', 'none');

    // Extraer nombres de fuente
    $body_font_name = explode(':', $body_font)[0];
    $headings_font_name = explode(':', $headings_font)[0];

    ?>
    <style type="text/css" id="edusiteco-custom-styles">
        <?php
        // ========== HEADER TEXT COLOR ==========
        if (get_theme_support('custom-header', 'default-text-color') !== $header_text_color):
            if (!display_header_text()):
                ?>
                .site-title,
                .site-description {
                    position: absolute;
                    clip: rect(1px, 1px, 1px, 1px);
                }

            <?php else: ?>
                .site-title a,
                .site-description {
                    color: #<?php echo esc_attr($header_text_color); ?>;
                }

                <?php
            endif;
        endif;
        ?>

        /* ========================================
               VARIABLES CSS - COLORES CON VARIANTES
               ======================================== */
        :root {
            /* PRIMARY */
            --color-brand-primary:
                <?php echo esc_attr($primary_hsl); ?>
            ;
            <?php foreach ($primary_variants as $shade => $value): ?>
                --color-brand-primary-<?php echo $shade; ?>:
                    <?php echo esc_attr($value); ?>
                ;
            <?php endforeach; ?>

            /* SECONDARY */
            --color-brand-secondary:
                <?php echo esc_attr($secondary_hsl); ?>
            ;
            <?php foreach ($secondary_variants as $shade => $value): ?>
                --color-brand-secondary-<?php echo $shade; ?>:
                    <?php echo esc_attr($value); ?>
                ;
            <?php endforeach; ?>

            /* ACCENT */
            --color-brand-accent:
                <?php echo esc_attr($accent_hsl); ?>
            ;
            <?php foreach ($accent_variants as $shade => $value): ?>
                --color-brand-accent-<?php echo $shade; ?>:
                    <?php echo esc_attr($value); ?>
                ;
            <?php endforeach; ?>

            /* WARNING */
            --color-brand-warning:
                <?php echo esc_attr($warning_hsl); ?>
            ;
            <?php foreach ($warning_variants as $shade => $value): ?>
                --color-brand-warning-<?php echo $shade; ?>:
                    <?php echo esc_attr($value); ?>
                ;
            <?php endforeach; ?>

            /* DANGER */
            --color-brand-danger:
                <?php echo esc_attr($danger_hsl); ?>
            ;
            <?php foreach ($danger_variants as $shade => $value): ?>
                --color-brand-danger-<?php echo $shade; ?>:
                    <?php echo esc_attr($value); ?>
                ;
            <?php endforeach; ?>

            /* GRADIENTE PERSONALIZADO */
            --gradient-custom: linear-gradient(<?php echo esc_attr($gradient_direction); ?>,
                    <?php echo esc_attr($gradient_color_1); ?>
                    ,
                    <?php echo esc_attr($gradient_color_2); ?>
                );
        }

        /* ========================================
               MODO OSCURO - VARIANTES AJUSTADAS
               ======================================== */
        .dark {
            /* PRIMARY DARK */
            --color-brand-primary:
                <?php echo esc_attr($primary_dark[500]); ?>
            ;
            <?php foreach ($primary_dark as $shade => $value): ?>
                --color-brand-primary-<?php echo $shade; ?>:
                    <?php echo esc_attr($value); ?>
                ;
            <?php endforeach; ?>

            /* SECONDARY DARK */
            --color-brand-secondary:
                <?php echo esc_attr($secondary_dark[500]); ?>
            ;
            <?php foreach ($secondary_dark as $shade => $value): ?>
                --color-brand-secondary-<?php echo $shade; ?>:
                    <?php echo esc_attr($value); ?>
                ;
            <?php endforeach; ?>

            /* ACCENT DARK */
            --color-brand-accent:
                <?php echo esc_attr($accent_dark[500]); ?>
            ;
            <?php foreach ($accent_dark as $shade => $value): ?>
                --color-brand-accent-<?php echo $shade; ?>:
                    <?php echo esc_attr($value); ?>
                ;
            <?php endforeach; ?>

            /* WARNING DARK */
            --color-brand-warning:
                <?php echo esc_attr($warning_dark[500]); ?>
            ;
            <?php foreach ($warning_dark as $shade => $value): ?>
                --color-brand-warning-<?php echo $shade; ?>:
                    <?php echo esc_attr($value); ?>
                ;
            <?php endforeach; ?>

            /* DANGER DARK */
            --color-brand-danger:
                <?php echo esc_attr($danger_dark[500]); ?>
            ;
            <?php foreach ($danger_dark as $shade => $value): ?>
                --color-brand-danger-<?php echo $shade; ?>:
                    <?php echo esc_attr($value); ?>
                ;
            <?php endforeach; ?>
        }

        /* ========================================
               TIPOGRAFÍA - FUENTE DEL CUERPO
               ======================================== */
        body {
            font-family: '<?php echo esc_attr($body_font_name); ?>', sans-serif;
            font-size:
                <?php echo esc_attr($body_size); ?>
                px;
            font-weight:
                <?php echo esc_attr($body_weight); ?>
            ;
            color:
                <?php echo esc_attr($body_color); ?>
            ;
            line-height:
                <?php echo esc_attr($body_line_height); ?>
            ;
        }

        /* ========================================
               TIPOGRAFÍA - ENCABEZADOS
               ======================================== */
        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            font-family: '<?php echo esc_attr($headings_font_name); ?>', sans-serif;
            font-weight:
                <?php echo esc_attr($headings_weight); ?>
            ;
            color:
                <?php echo esc_attr($headings_color); ?>
            ;
            text-transform:
                <?php echo esc_attr($headings_transform); ?>
            ;
        }

        h1 {
            font-size:
                <?php echo esc_attr($h1_size); ?>
                px;
        }

        h2 {
            font-size:
                <?php echo esc_attr($h2_size); ?>
                px;
        }

        h3 {
            font-size:
                <?php echo esc_attr($h3_size); ?>
                px;
        }

        h4 {
            font-size:
                <?php echo esc_attr($h4_size); ?>
                px;
        }

        h5 {
            font-size:
                <?php echo esc_attr($h5_size); ?>
                px;
        }

        h6 {
            font-size:
                <?php echo esc_attr($h6_size); ?>
                px;
        }

        /* ========================================
               TIPOGRAFÍA - MENÚ DE NAVEGACIÓN
               ======================================== */
        /* Solo aplicar estos estilos cuando NO hay header image */
        <?php if (!get_header_image()): ?>
            nav a,
            .header-group a,
            .nav-links a {
                font-size:
                    <?php echo esc_attr($menu_size); ?>
                    px;
                font-weight:
                    <?php echo esc_attr($menu_weight); ?>
                ;
                color:
                    <?php echo esc_attr($menu_color); ?>
                ;
                text-transform:
                    <?php echo esc_attr($menu_transform); ?>
                ;
            }

            .dark nav a,
            .dark .header-group a {
                color:
                    <?php echo edusiteco_adjust_color_brightness($menu_color, 200); ?>
                ;
            }

        <?php else: ?>
            /* Con header image, permitir que Tailwind maneje los colores */
            nav a,
            .header-group a,
            .nav-links a {
                font-size:
                    <?php echo esc_attr($menu_size); ?>
                    px;
                font-weight:
                    <?php echo esc_attr($menu_weight); ?>
                ;
                text-transform:
                    <?php echo esc_attr($menu_transform); ?>
                ;
                /* NO aplicar color aquí, dejar que text-white de Tailwind funcione */
            }

        <?php endif; ?>

        /* ========================================
               UTILIDADES - GRADIENTE PERSONALIZADO
               ======================================== */
        .bg-gradient-custom {
            background: var(--gradient-custom);
        }
    </style>
    <?php
}

// ============================================
// CARGAR GOOGLE FONTS
// ============================================

function edusiteco_load_google_fonts()
{
    $body_font = get_theme_mod('body_font_family', 'Plus Jakarta Sans:100,200,300,400,500,600,700');
    $headings_font = get_theme_mod('headings_font_family', 'Montserrat:400,500,600,700');

    $fonts = array();

    if (!empty($body_font) && $body_font != '') {
        $fonts[] = $body_font;
    }

    if (!empty($headings_font) && $headings_font != '' && $headings_font != $body_font) {
        $fonts[] = $headings_font;
    }

    if (!empty($fonts)) {
        $fonts_url = 'https://fonts.googleapis.com/css2?family=' . implode('&family=', $fonts) . '&display=swap';
        wp_enqueue_style('edusiteco-google-fonts', $fonts_url, array(), null);
    }
}
add_action('wp_enqueue_scripts', 'edusiteco_load_google_fonts');

// ============================================
// CUSTOMIZER PREVIEW JS
// ============================================

function edusiteco_customize_preview_js()
{
    // Customizer básico
    wp_enqueue_script(
        'edusiteco-customizer',
        get_template_directory_uri() . '/js/customizer.js',
        array('customize-preview'),
        '1.0.0',
        true
    );

    // Preview de colores
    wp_enqueue_script(
        'edusiteco-customizer-colors',
        get_template_directory_uri() . '/js/customizer-palette.js',
        array('customize-preview'),
        '1.0.0',
        true
    );

    // Preview de tipografía
    wp_enqueue_script(
        'edusiteco-customizer-typography',
        get_template_directory_uri() . '/js/typography-customizer.js',
        array('customize-preview'),
        '1.0.0',
        true
    );
}
add_action('customize_preview_init', 'edusiteco_customize_preview_js');

// ============================================
// SELECTIVE REFRESH CALLBACKS
// ============================================

/**
 * Render the site title for the selective refresh partial.
 */
function edusiteco_customize_partial_blogname()
{
    bloginfo('name');
}

/**
 * Render the site tagline for the selective refresh partial.
 */
function edusiteco_customize_partial_blogdescription()
{
    bloginfo('description');
}