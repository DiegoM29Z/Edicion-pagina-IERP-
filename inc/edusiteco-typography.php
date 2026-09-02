<?php
/**
 * Sistema de Tipografía Personalizable - VERSIÓN MEJORADA
 * Resuelve conflictos con Tailwind CSS y mejora especificidad
 * 
 * @package edusiteco
 */

// ============================================
// 1. REGISTRAR GOOGLE FONTS DISPONIBLES
// ============================================
function edusiteco_get_google_fonts() {
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
// 2. REGISTRAR OPCIONES EN EL CUSTOMIZER
// ============================================
function edusiteco_typography_customizer($wp_customize) {
    
    // ========== PANEL PRINCIPAL ==========
    $wp_customize->add_panel('typography_panel', array(
        'title'       => __('Tipografía y Fuentes', 'edusiteco'),
        'description' => __('Personaliza las fuentes y tamaños del sitio', 'edusiteco'),
        'priority'    => 35,
    ));
    
    // ========== SECCIÓN: FUENTE PRINCIPAL (Body) ==========
    $wp_customize->add_section('body_typography', array(
        'title'    => __('Fuente Principal (Cuerpo)', 'edusiteco'),
        'panel'    => 'typography_panel',
        'priority' => 10,
    ));
    
    // Google Font - Body
    $wp_customize->add_setting('body_font_family', array(
        'default'           => 'Plus Jakarta Sans:200,300,400,500,600,700',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'postMessage',
    ));
    
    $wp_customize->add_control('body_font_family', array(
        'label'    => __('Familia de Fuente', 'edusiteco'),
        'section'  => 'body_typography',
        'type'     => 'select',
        'choices'  => edusiteco_get_google_fonts(),
    ));
    
    // Tamaño de fuente - Body
    $wp_customize->add_setting('body_font_size', array(
        'default'           => '16',
        'sanitize_callback' => 'absint',
        'transport'         => 'postMessage',
    ));
    
    $wp_customize->add_control('body_font_size', array(
        'label'       => __('Tamaño de Fuente (px)', 'edusiteco'),
        'description' => __('Tamaño base del texto del sitio', 'edusiteco'),
        'section'     => 'body_typography',
        'type'        => 'number',
        'input_attrs' => array(
            'min'  => 12,
            'max'  => 24,
            'step' => 1,
        ),
    ));
    
    // Peso de fuente - Body
    $wp_customize->add_setting('body_font_weight', array(
        'default'           => '400',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'postMessage',
    ));
    
    $wp_customize->add_control('body_font_weight', array(
        'label'   => __('Peso de Fuente', 'edusiteco'),
        'section' => 'body_typography',
        'type'    => 'select',
        'choices' => array(
            '300' => 'Ligera (300)',
            '400' => 'Normal (400)',
            '500' => 'Media (500)',
            '600' => 'Semi-negrita (600)',
            '700' => 'Negrita (700)',
        ),
    ));
    
    // Color de texto - Body
    $wp_customize->add_setting('body_text_color', array(
        'default'           => '#1A202C',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport'         => 'postMessage',
    ));
    
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'body_text_color', array(
        'label'    => __('Color del Texto', 'edusiteco'),
        'section'  => 'body_typography',
        'settings' => 'body_text_color',
    )));
    
    // Altura de línea - Body
    $wp_customize->add_setting('body_line_height', array(
        'default'           => '1.6',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'postMessage',
    ));
    
    $wp_customize->add_control('body_line_height', array(
        'label'       => __('Altura de Línea', 'edusiteco'),
        'description' => __('Espaciado entre líneas de texto', 'edusiteco'),
        'section'     => 'body_typography',
        'type'        => 'number',
        'input_attrs' => array(
            'min'  => 1,
            'max'  => 3,
            'step' => 0.1,
        ),
    ));
    
    // ========== SECCIÓN: ENCABEZADOS (H1-H6) ==========
    $wp_customize->add_section('headings_typography', array(
        'title'    => __('Encabezados (Títulos)', 'edusiteco'),
        'panel'    => 'typography_panel',
        'priority' => 20,
    ));
    
    // Google Font - Headings
    $wp_customize->add_setting('headings_font_family', array(
        'default'           => 'Montserrat:400,500,600,700',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'postMessage',
    ));
    
    $wp_customize->add_control('headings_font_family', array(
        'label'    => __('Familia de Fuente', 'edusiteco'),
        'section'  => 'headings_typography',
        'type'     => 'select',
        'choices'  => edusiteco_get_google_fonts(),
    ));
    
    // Peso de fuente - Headings
    $wp_customize->add_setting('headings_font_weight', array(
        'default'           => '700',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'postMessage',
    ));
    
    $wp_customize->add_control('headings_font_weight', array(
        'label'   => __('Peso de Fuente', 'edusiteco'),
        'section' => 'headings_typography',
        'type'    => 'select',
        'choices' => array(
            '400' => 'Normal (400)',
            '500' => 'Media (500)',
            '600' => 'Semi-negrita (600)',
            '700' => 'Negrita (700)',
            '800' => 'Extra-negrita (800)',
            '900' => 'Ultra-negrita (900)',
        ),
    ));
    
    // Color de encabezados
    $wp_customize->add_setting('headings_text_color', array(
        'default'           => '#1A202C',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport'         => 'postMessage',
    ));
    
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'headings_text_color', array(
        'label'    => __('Color de Títulos', 'edusiteco'),
        'section'  => 'headings_typography',
        'settings' => 'headings_text_color',
    )));
    
    // Transformación de texto - Headings
    $wp_customize->add_setting('headings_text_transform', array(
        'default'           => 'none',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'postMessage',
    ));
    
    $wp_customize->add_control('headings_text_transform', array(
        'label'   => __('Transformación de Texto', 'edusiteco'),
        'section' => 'headings_typography',
        'type'    => 'select',
        'choices' => array(
            'none'       => 'Normal',
            'uppercase'  => 'MAYÚSCULAS',
            'lowercase'  => 'minúsculas',
            'capitalize' => 'Primera Letra Mayúscula',
        ),
    ));
    
    // ========== TAMAÑOS INDIVIDUALES H1-H6 ==========
    
    // H1
    $wp_customize->add_setting('h1_font_size', array(
        'default'           => '36',
        'sanitize_callback' => 'absint',
        'transport'         => 'postMessage',
    ));
    
    $wp_customize->add_control('h1_font_size', array(
        'label'       => __('Tamaño H1 (px)', 'edusiteco'),
        'section'     => 'headings_typography',
        'type'        => 'number',
        'input_attrs' => array('min' => 24, 'max' => 72, 'step' => 1),
    ));
    
    // H2
    $wp_customize->add_setting('h2_font_size', array(
        'default'           => '30',
        'sanitize_callback' => 'absint',
        'transport'         => 'postMessage',
    ));
    
    $wp_customize->add_control('h2_font_size', array(
        'label'       => __('Tamaño H2 (px)', 'edusiteco'),
        'section'     => 'headings_typography',
        'type'        => 'number',
        'input_attrs' => array('min' => 20, 'max' => 60, 'step' => 1),
    ));
    
    // H3
    $wp_customize->add_setting('h3_font_size', array(
        'default'           => '24',
        'sanitize_callback' => 'absint',
        'transport'         => 'postMessage',
    ));
    
    $wp_customize->add_control('h3_font_size', array(
        'label'       => __('Tamaño H3 (px)', 'edusiteco'),
        'section'     => 'headings_typography',
        'type'        => 'number',
        'input_attrs' => array('min' => 18, 'max' => 48, 'step' => 1),
    ));
    
    // H4
    $wp_customize->add_setting('h4_font_size', array(
        'default'           => '20',
        'sanitize_callback' => 'absint',
        'transport'         => 'postMessage',
    ));
    
    $wp_customize->add_control('h4_font_size', array(
        'label'       => __('Tamaño H4 (px)', 'edusiteco'),
        'section'     => 'headings_typography',
        'type'        => 'number',
        'input_attrs' => array('min' => 16, 'max' => 36, 'step' => 1),
    ));
    
    // H5
    $wp_customize->add_setting('h5_font_size', array(
        'default'           => '18',
        'sanitize_callback' => 'absint',
        'transport'         => 'postMessage',
    ));
    
    $wp_customize->add_control('h5_font_size', array(
        'label'       => __('Tamaño H5 (px)', 'edusiteco'),
        'section'     => 'headings_typography',
        'type'        => 'number',
        'input_attrs' => array('min' => 14, 'max' => 30, 'step' => 1),
    ));
    
    // H6
    $wp_customize->add_setting('h6_font_size', array(
        'default'           => '16',
        'sanitize_callback' => 'absint',
        'transport'         => 'postMessage',
    ));
    
    $wp_customize->add_control('h6_font_size', array(
        'label'       => __('Tamaño H6 (px)', 'edusiteco'),
        'section'     => 'headings_typography',
        'type'        => 'number',
        'input_attrs' => array('min' => 12, 'max' => 24, 'step' => 1),
    ));
    
    // ========== SECCIÓN: MENÚ DE NAVEGACIÓN ==========
    $wp_customize->add_section('menu_typography', array(
        'title'    => __('Menú de Navegación', 'edusiteco'),
        'panel'    => 'typography_panel',
        'priority' => 30,
    ));
    
    // Tamaño de fuente - Menu
    $wp_customize->add_setting('menu_font_size', array(
        'default'           => '14',
        'sanitize_callback' => 'absint',
        'transport'         => 'postMessage',
    ));
    
    $wp_customize->add_control('menu_font_size', array(
        'label'       => __('Tamaño de Fuente (px)', 'edusiteco'),
        'section'     => 'menu_typography',
        'type'        => 'number',
        'input_attrs' => array('min' => 12, 'max' => 20, 'step' => 1),
    ));
    
    // Peso de fuente - Menu
    $wp_customize->add_setting('menu_font_weight', array(
        'default'           => '600',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'postMessage',
    ));
    
    $wp_customize->add_control('menu_font_weight', array(
        'label'   => __('Peso de Fuente', 'edusiteco'),
        'section' => 'menu_typography',
        'type'    => 'select',
        'choices' => array(
            '400' => 'Normal (400)',
            '500' => 'Media (500)',
            '600' => 'Semi-negrita (600)',
            '700' => 'Negrita (700)',
        ),
    ));
    
    // Color del menú
    $wp_customize->add_setting('menu_text_color', array(
        'default'           => '#1A202C',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport'         => 'postMessage',
    ));
    
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'menu_text_color', array(
        'label'    => __('Color del Texto', 'edusiteco'),
        'section'  => 'menu_typography',
        'settings' => 'menu_text_color',
    )));
    
    // Transformación de texto - Menu
    $wp_customize->add_setting('menu_text_transform', array(
        'default'           => 'none',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'postMessage',
    ));
    
    $wp_customize->add_control('menu_text_transform', array(
        'label'   => __('Transformación de Texto', 'edusiteco'),
        'section' => 'menu_typography',
        'type'    => 'select',
        'choices' => array(
            'none'       => 'Normal',
            'uppercase'  => 'MAYÚSCULAS',
            'lowercase'  => 'minúsculas',
            'capitalize' => 'Primera Letra Mayúscula',
        ),
    ));
}
add_action('customize_register', 'edusiteco_typography_customizer');

// ============================================
// 3. INYECTAR ESTILOS CSS PERSONALIZADOS
// ============================================
function edusiteco_typography_css() {
    // Obtener valores
    $body_font         = get_theme_mod('body_font_family', 'Plus Jakarta Sans:200,300,400,500,600,700');
    $body_size         = get_theme_mod('body_font_size', 16);
    $body_weight       = get_theme_mod('body_font_weight', '400');
    $body_color        = get_theme_mod('body_text_color', '#1A202C');
    $body_line_height  = get_theme_mod('body_line_height', '1.6');
    
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
    
    $menu_size      = get_theme_mod('menu_font_size', 14);
    $menu_weight    = get_theme_mod('menu_font_weight', '600');
    $menu_color     = get_theme_mod('menu_text_color', '#1A202C');
    $menu_transform = get_theme_mod('menu_text_transform', 'none');
    
    // Extraer nombre de fuente para CSS
    $body_font_name = explode(':', $body_font)[0];
    $headings_font_name = explode(':', $headings_font)[0];
    
    ?>
    <style id="edusiteco-typography-customizer">
        /* ========================================
           CSS CUSTOM PROPERTIES
           ======================================== */
        :root {
            --edusiteco-body-font: '<?php echo esc_attr($body_font_name); ?>', sans-serif;
            --edusiteco-headings-font: '<?php echo esc_attr($headings_font_name); ?>', sans-serif;
            --edusiteco-body-size: <?php echo esc_attr($body_size); ?>px;
            --edusiteco-body-weight: <?php echo esc_attr($body_weight); ?>;
            --edusiteco-body-color: <?php echo esc_attr($body_color); ?>;
            --edusiteco-body-line-height: <?php echo esc_attr($body_line_height); ?>;
            --edusiteco-headings-weight: <?php echo esc_attr($headings_weight); ?>;
            --edusiteco-headings-color: <?php echo esc_attr($headings_color); ?>;
            --edusiteco-headings-transform: <?php echo esc_attr($headings_transform); ?>;
        }
        
        /* ========================================
           BODY - CON EXCLUSIÓN DE ICONOS
           ======================================== */
        body, body *:not(.material-icons):not(.material-icons-outlined) {
            font-family: var(--edusiteco-body-font) !important;
        }
        
        body {
            font-size: var(--edusiteco-body-size) !important;
            font-weight: var(--edusiteco-body-weight) !important;
            color: var(--edusiteco-body-color) !important;
            line-height: var(--edusiteco-body-line-height) !important;
        }
        
        /* ========================================
           PROTEGER GOOGLE MATERIAL ICONS
           ======================================== */
        .material-icons,
        .material-icons-outlined {
            font-family: 'Material Icons' !important;
            font-weight: normal !important;
            font-style: normal !important;
            font-size: inherit;
            display: inline-block;
            line-height: 1;
            text-transform: none;
            letter-spacing: normal;
            word-wrap: normal;
            white-space: nowrap;
            direction: ltr;
            -webkit-font-feature-settings: 'liga';
            -webkit-font-smoothing: antialiased;
            text-rendering: optimizeLegibility;
            -moz-osx-font-smoothing: grayscale;
            font-feature-settings: 'liga';
        }
        
        .material-icons-outlined {
            font-family: 'Material Icons Outlined' !important;
        }
        
        /* ========================================
           HEADINGS - CON EXCLUSIÓN DE ICONOS
           ======================================== */
        h1:not(.material-icons):not(.material-icons-outlined),
        .h1:not(.material-icons):not(.material-icons-outlined),
        h2:not(.material-icons):not(.material-icons-outlined),
        .h2:not(.material-icons):not(.material-icons-outlined),
        h3:not(.material-icons):not(.material-icons-outlined),
        .h3:not(.material-icons):not(.material-icons-outlined),
        h4:not(.material-icons):not(.material-icons-outlined),
        .h4:not(.material-icons):not(.material-icons-outlined),
        h5:not(.material-icons):not(.material-icons-outlined),
        .h5:not(.material-icons):not(.material-icons-outlined),
        h6:not(.material-icons):not(.material-icons-outlined),
        .h6:not(.material-icons):not(.material-icons-outlined) {
            font-family: var(--edusiteco-headings-font) !important;
            font-weight: var(--edusiteco-headings-weight) !important;
            color: var(--edusiteco-headings-color) !important;
            text-transform: var(--edusiteco-headings-transform) !important;
        }
        
        h1, .h1 { 
            font-size: <?php echo esc_attr($h1_size); ?>px !important; 
        }
        
        h2, .h2 { 
            font-size: <?php echo esc_attr($h2_size); ?>px !important; 
        }
        
        h3, .h3 { 
            font-size: <?php echo esc_attr($h3_size); ?>px !important; 
        }
        
        h4, .h4 { 
            font-size: <?php echo esc_attr($h4_size); ?>px !important; 
        }
        
        h5, .h5 { 
            font-size: <?php echo esc_attr($h5_size); ?>px !important; 
        }
        
        h6, .h6 { 
            font-size: <?php echo esc_attr($h6_size); ?>px !important; 
        }
        
        /* ========================================
           MENU - CON EXCLUSIÓN DE ICONOS
           ======================================== */
        nav a:not(.material-icons):not(.material-icons-outlined),
        nav button:not(.material-icons):not(.material-icons-outlined),
        nav li a:not(.material-icons):not(.material-icons-outlined),
        .header-group a:not(.material-icons):not(.material-icons-outlined),
        .header-group button:not(.material-icons):not(.material-icons-outlined),
        .nav-links a:not(.material-icons):not(.material-icons-outlined),
        .menu-item a:not(.material-icons):not(.material-icons-outlined) {
            font-size: <?php echo esc_attr($menu_size); ?>px !important;
            font-weight: <?php echo esc_attr($menu_weight); ?> !important;
            color: <?php echo esc_attr($menu_color); ?> !important;
            text-transform: <?php echo esc_attr($menu_transform); ?> !important;
        }
        
        /* ========================================
           DARK MODE - AJUSTES AUTOMÁTICOS
           ======================================== */
        .dark body {
            color: <?php echo edusiteco_adjust_color_brightness($body_color, 150); ?> !important;
        }
        
        .dark h1, .dark h2, .dark h3, 
        .dark h4, .dark h5, .dark h6,
        .dark .h1, .dark .h2, .dark .h3,
        .dark .h4, .dark .h5, .dark .h6 {
            color: <?php echo edusiteco_adjust_color_brightness($headings_color, 180); ?> !important;
        }
        
        .dark nav a,
        .dark nav button,
        .dark .header-group a,
        .dark .header-group button,
        .dark .nav-links a {
            color: <?php echo edusiteco_adjust_color_brightness($menu_color, 180); ?> !important;
        }
        
        /* ========================================
           OVERRIDE TAILWIND - CON PROTECCIÓN
           ======================================== */
        
        body.font-plus-jakarta:not(.material-icons),
        body.font-display:not(.material-icons) {
            font-family: var(--edusiteco-body-font) !important;
        }
        
        .font-quartzo-bold:not(.material-icons) {
            font-family: var(--edusiteco-headings-font) !important;
        }
        
        /* ========================================
           ELEMENTOS DE FORMULARIO
           ======================================== */
        p:not(.material-icons), 
        span:not(.material-icons):not(.material-icons-outlined), 
        div:not(.material-icons), 
        li:not(.material-icons), 
        td:not(.material-icons), 
        th:not(.material-icons), 
        label:not(.material-icons), 
        input:not(.material-icons), 
        textarea:not(.material-icons), 
        button:not(.material-icons) {
            font-family: var(--edusiteco-body-font) !important;
            font-size: inherit;
            font-weight: inherit;
            color: inherit;
        }
    </style>
    <?php
}
// Priority 999: Se ejecuta DESPUÉS que otros hooks
add_action('wp_head', 'edusiteco_typography_css', 999);

// ============================================
// 4. CARGAR GOOGLE FONTS
// ============================================
function edusiteco_load_google_fonts() {
    $body_font = get_theme_mod('body_font_family', 'Plus Jakarta Sans:200,300,400,500,600,700');
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
add_action('wp_enqueue_scripts', 'edusiteco_load_google_fonts', 5);

// ============================================
// 5. FUNCIÓN AUXILIAR: AJUSTAR BRILLO
// ============================================
function edusiteco_adjust_color_brightness($hex, $brightness = 0) {
    $hex = str_replace('#', '', $hex);
    
    if (strlen($hex) !== 6) {
        return '#1A202C';
    }
    
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

// ============================================
// 6. PREVIEW EN VIVO (CUSTOMIZER)
// ============================================
function edusiteco_typography_customizer_live_preview() {
    wp_enqueue_script(
        'edusiteco-typography-customizer',
        get_template_directory_uri() . '/js/typography-customizer.js',
        array('customize-preview'),
        '1.0.1',
        true
    );
}
add_action('customize_preview_init', 'edusiteco_typography_customizer_live_preview');
