<?php
/**
 * edusiteco functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package edusiteco
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function edusiteco_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on edusiteco, use a find and replace
		* to change 'edusiteco' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'edusiteco', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support( 'title-tag' );

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary', 'edusiteco' ),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'edusiteco_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	// Add theme support for block templates. This is key for hybrid themes.
	add_theme_support( 'block-templates' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'edusiteco_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function edusiteco_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'edusiteco_content_width', 640 );
}
add_action( 'after_setup_theme', 'edusiteco_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function edusiteco_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'edusiteco' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'edusiteco' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'edusiteco_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function edusiteco_scripts() {
	// WordPress theme info (required but contains only header)
	wp_enqueue_style( 'edusiteco-style', get_stylesheet_uri(), array(), _S_VERSION );
	
	// Main Tailwind CSS stylesheet
	wp_enqueue_style( 'edusiteco-base', get_template_directory_uri() . '/assets/css/index.css', array(), _S_VERSION );
	wp_style_add_data( 'edusiteco-base', 'rtl', 'replace' );

	wp_enqueue_style( 'edusiteco-nav-menu', get_template_directory_uri() . '/src/css/nav-menu.css', array( 'edusiteco-base' ), _S_VERSION );

	// RTL stylesheet for Tailwind
	if ( is_rtl() ) {
		wp_enqueue_style( 'edusiteco-base-rtl', get_template_directory_uri() . '/assets/css/base-rtl.css', array( 'edusiteco-base' ), _S_VERSION );
	}

	// Main theme script
	$main_js_path = get_template_directory() . '/assets/js/index.asset.php';
    $main_js_dependencies = file_exists($main_js_path) ? require($main_js_path) : array('dependencies' => array(), 'version' => _S_VERSION);

	wp_enqueue_script( 'edusiteco-index-scripts', get_template_directory_uri() . '/assets/js/index.js', $main_js_dependencies['dependencies'], $main_js_dependencies['version'], true );
	wp_enqueue_script( 'edusiteco-custom-admin', get_template_directory_uri() . '/assets/js/custom-admin.js', array(), $main_js_dependencies['version'], true );

	// Navigation script (keep existing if exists)
	if ( file_exists( get_template_directory() . '/js/navigation.js' ) ) {
		wp_enqueue_script( 'edusiteco-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );
	}

	// Mobile menu toggle script
	wp_enqueue_script( 'edusiteco-mobile-menu', get_template_directory_uri() . '/src/js/mobile-menu.js', array(), _S_VERSION, true );

	// Comment reply script
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	// Pass data to JavaScript
	wp_localize_script( 'edusiteco-main', 'edusiteco_data', array(
		'ajax_url' => admin_url( 'admin-ajax.php' ),
		'nonce' => wp_create_nonce( 'edusiteco_nonce' ),
		'theme_url' => get_template_directory_uri(),
	) );
}
add_action( 'wp_enqueue_scripts', 'edusiteco_scripts' );



/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/edusiteco-customizer-color.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}


// Incluir walkers de navegación
require get_template_directory() . '/inc/nav-walkers.php';

// Registrar menús de navegación
function edusiteco_register_menus() {
    register_nav_menus(
        array(
            'menu-1' => esc_html__('Primary Menu', 'edusiteco'),
        )
    );
}
add_action('init', 'edusiteco_register_menus');

# Front Page
function edusiteco_enqueue_swiper() {
    if (is_front_page() || (is_singular() && has_block('edusiteco/teacher-project'))) {
        wp_enqueue_script('swiper-js', 'https://cdn.jsdelivr.net/npm/swiper@12/swiper-bundle.min.js', array(), '12.0.0', true);
        wp_enqueue_style('swiper-css', 'https://cdn.jsdelivr.net/npm/swiper@12/swiper-bundle.min.css', array(), '12.0.0');
    }
}
add_action('wp_enqueue_scripts', 'edusiteco_enqueue_swiper');
# Leaflet Maps
function edusiteco_enqueue_leaflet() {
	if (is_page_template('page-contact.php') || is_front_page()) {
		wp_enqueue_style('leaflet-css', 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.9.4/leaflet.min.css', array(), '1.9.4');
		wp_enqueue_script('leaflet-js', 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.9.4/leaflet.min.js', array(), '1.9.4', true);
	}
}
add_action('wp_enqueue_scripts', 'edusiteco_enqueue_leaflet');
# Google Icons
function edusiteco_enqueue_google_icons() {
	wp_enqueue_style('google-icons', 'https://fonts.googleapis.com/icon?family=Material+Icons', array(), null);
}
add_action('wp_enqueue_scripts', 'edusiteco_enqueue_google_icons');

/**
 * Enqueue Customizer panel styles.
 *
 * @return void
 */
function edusiteco_customize_controls_styles() {
    wp_enqueue_style( 
        'edusiteco-customizer-panel-styles', 
        get_template_directory_uri() . '/assets/css/customizer-panel.css'
    );
}
add_action( 'customize_controls_enqueue_scripts', 'edusiteco_customize_controls_styles' );

/**
 * Devuelve los datos de los hitos históricos.
 * En un proyecto real, estos datos vendrían de un Custom Post Type,
 * campos personalizados (ACF Repeater) o un bloque personalizado.
 *
 * @return array
 */
function edusiteco_get_hitos_historia() {
    /*
    return array(
        array(
            'año' => '1965',
            'titulo' => __('Fundación del Colegio', 'edusiteco'),
            'descripcion' => __('Iniciamos con 35 estudiantes y 4 profesores en el barrio La Soledad, Bogotá.', 'edusiteco'),
            'icono' => '🏛️'
        ),
        array(
            'año' => '1978',
            'titulo' => __('Primera Promoción', 'edusiteco'),
            'descripcion' => __('Graduamos nuestra primera promoción de bachilleres, marcando el inicio de nuestra tradición.', 'edusiteco'),
            'icono' => '🎓'
        ),
        array(
            'año' => '1992',
            'titulo' => __('Nueva Sede', 'edusiteco'),
            'descripcion' => __('Nos trasladamos a nuestra sede actual en el barrio El Recuerdo con instalaciones modernas.', 'edusiteco'),
            'icono' => '🏫'
        ),
        array(
            'año' => '2005',
            'titulo' => __('Certificación de Calidad', 'edusiteco'),
            'descripcion' => __('Obtenemos la certificación ISO 9001 por nuestros procesos educativos y de gestión.', 'edusiteco'),
            'icono' => '⭐'
        ),
        array(
            'año' => '2018',
            'titulo' => __('Modernización Tecnológica', 'edusiteco'),
            'descripcion' => __('Implementación de laboratorios de tecnología y robótica en el proceso educativo.', 'edusiteco'),
            'icono' => '💻'
        ),
        array(
            'año' => '2023',
            'titulo' => __('Expansión Deportiva', 'edusiteco'),
            'descripcion' => __('Inauguración de nuevas canchas y espacios deportivos para nuestros estudiantes.', 'edusiteco'),
            'icono' => '⚽'
        )
    );
    */
    return array(
        array(
            'año' => '1939',
            'titulo' => __('Fundación de la Escuela', 'edusiteco'),
            'descripcion' => __('Fundada el 15 de junio como escuela pública de Varones Rafael Pombo, con un director y tres subdirectores.', 'edusiteco'),
            // 'icono' => '🏛️'
            'icono' => '<svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><rect width="16" height="20" x="4" y="2" rx="2" ry="2"/><path d="M9 22v-4h6v4"/><path d="M8 6h.01"/><path d="M16 6h.01"/><path d="M12 6h.01"/><path d="M12 10h.01"/><path d="M12 14h.01"/><path d="M16 10h.01"/><path d="M16 14h.01"/><path d="M8 10h.01"/><path d="M8 14h.01"/></svg>'
        ),
        array(
            'año' => '1945',
            'titulo' => __('Primeras Instalaciones', 'edusiteco'),
            'descripcion' => __('Funcionó con tres aulas en el terreno donde hoy se encuentra el Hotel Monasterio en Popayán.', 'edusiteco'),
            // 'icono' => '🏫'
            'icono' => '<svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"/><circle cx="12" cy="10" r="3"/></svg>'
        ),
        array(
            'año' => '1948',
            'titulo' => __('Crecimiento y Traslado', 'edusiteco'),
            'descripcion' => __('Reubicada en la iglesia de San José y luego a la Casa Brava debido al rápido incremento de estudiantes.', 'edusiteco'),
            // 'icono' => '📈'
            'icono' => '<svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M3 3v18h18"/><path d="m19 9-5 5-4-4-3 3"/></svg>'
        ),
        array(
            'año' => '1949',
            'titulo' => __('Sede Propia', 'edusiteco'),
            'descripcion' => __('El 13 de octubre se asigna sede propia en el Barrio Valencia, contando con 5 aulas y 200 estudiantes.', 'edusiteco'),
            // 'icono' => '🔑'
            'icono' => '<svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="m3 9 9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></svg>'
        )
    );
}

/**
 * Devuelve los datos de los logros destacados.
 *
 * @return array
 */
function edusiteco_get_logros_historia() {
    /*
    return array(
        array('titulo' => __('Premio Excelencia', 'edusiteco'), 'descripcion' => __('Reconocimiento del Ministerio de Educación (2019)', 'edusiteco'), 'icono' => '🏆', 'color' => 'from-yellow-400 to-yellow-500'),
        array('titulo' => __('Certificación Verde', 'edusiteco'), 'descripcion' => __('Primer colegio certificado ambientalmente', 'edusiteco'), 'icono' => '🌱', 'color' => 'from-green-400 to-green-500'),
        array('titulo' => __('Olimpiadas Matemáticas', 'edusiteco'), 'descripcion' => __('15 medallas en competencias internacionales', 'edusiteco'), 'icono' => '📚', 'color' => 'from-blue-400 to-blue-500'),
        array('titulo' => __('Deportes', 'edusiteco'), 'descripcion' => __('Campeones intercolegiales 2022-2023', 'edusiteco'), 'icono' => '⚽', 'color' => 'from-red-400 to-red-500')
    );
    */
    return array(
        array(
            'titulo' => __('Trayectoria', 'edusiteco'), 
            'descripcion' => __('Más de 80 años formando generaciones en Popayán desde 1939.', 'edusiteco'), 
            // 'icono' => '⏳', 
            'icono' => '<svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>',
            'color' => 'from-blue-400 to-blue-500'
        ),
        array(
            'titulo' => __('Crecimiento', 'edusiteco'), 
            'descripcion' => __('Expansión constante desde sus inicios con 200 estudiantes en 1949.', 'edusiteco'), 
            // 'icono' => '📈', 
            'icono' => '<svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M3 3v18h18"/><path d="m19 9-5 5-4-4-3 3"/></svg>',
            'color' => 'from-green-400 to-green-500'
        ),
        array(
            'titulo' => __('Identidad', 'edusiteco'), 
            'descripcion' => __('Sólida formación integral basada en Respeto, Responsabilidad y Honestidad.', 'edusiteco'), 
            // 'icono' => '⭐', 
            'icono' => '<svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>',
            'color' => 'from-yellow-400 to-yellow-500'
        ),
        array(
            'titulo' => __('Comunidad', 'edusiteco'), 
            'descripcion' => __('Una institución arraigada en el corazón y la historia de Popayán.', 'edusiteco'), 
            // 'icono' => '❤️', 
            'icono' => '<svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M22 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>',
            'color' => 'from-red-400 to-red-500'
        )
    );
}

/**
 * Devuelve los datos ficticios de los valores.
 * Se usa como fallback si el CPT 'valor' no tiene entradas.
 *
 * @return array
 */
function edusiteco_get_valores_ficticios() {
    return array(
        array(
            // 'icono' => '🤝',
            'icono' => '<svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="text-blue-600 dark:text-blue-400"><path d="m11 17 2 2a1 1 0 1 0 3-3"/><path d="m14 14 2.5 2.5a1 1 0 1 0 3-3l-3.88-3.88a3 3 0 0 0-4.24 0l-.88.88a1 1 0 1 1-3-3l2.81-2.81a5.79 5.79 0 0 1 7.06-.87l.47.28a2 2 0 0 0 1.42.25L21 4"/><path d="m21 3-6 6"/><path d="M11 17l-1-1"/><path d="m15 19-2-2"/><path d="m10 21-2-2"/><path d="m14 23-4-4"/><path d="M3 11a5.79 5.79 0 0 1 7.06-.87l.47.28a2 2 0 0 0 1.42.25L13 11"/><path d="m3 10 6-6"/></svg>',
            'titulo' => __('Respeto', 'edusiteco'),
            'descripcion' => __('Reconocer el valor de cada quien, en su persona y su propiedad, considerando la existencia de la dignidad humana, del entorno y de los bienes ajenos al momento de actuar y decidir.', 'edusiteco')
        ),
        array(
            // 'icono' => '✅',
            'icono' => '<svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="text-blue-600 dark:text-blue-400"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>',
            'titulo' => __('Responsabilidad', 'edusiteco'),
            'descripcion' => __('Cumplir con los deberes, compromisos y obligaciones; aceptando completamente las consecuencias de decisiones y acciones.  La responsabilidad facilita el desarrollo máximo del potencial.', 'edusiteco')
        ),
        array(
            // 'icono' => '💡',
            'icono' => '<svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="text-blue-600 dark:text-blue-400"><path d="M15 14c.2-1 .7-1.7 1.5-2.5 1-.9 1.5-2.2 1.5-3.5A6 6 0 0 0 6 8c0 1 .2 2.2 1.5 3.5.7.9 1.2 1.5 1.5 2.5"/><path d="M9 18h6"/><path d="M10 22h4"/></svg>',
            'titulo' => __('Honestidad', 'edusiteco'),
            'descripcion' => __('Desarrollar cualquier acción humana con rectitud, transparencia y sentido de pertenencia. La honestidad en nuestras acciones garantiza la tranquilidad de conciencia.', 'edusiteco')
        ),
        // Puedes añadir los demás valores aquí si lo deseas
        array(
            // 'icono' => '⚖️',
            'icono' => '<svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="text-blue-600 dark:text-blue-400"><path d="m16 16 3-8 3 8c-.87.65-1.92 1-3 1s-2.13-.35-3-1Z"/><path d="m2 16 3-8 3 8c-.87.65-1.92 1-3 1s-2.13-.35-3-1Z"/><path d="M7 21h10"/><path d="M12 3v18"/><path d="M3 7h2c2 0 5-1 7-2 2 1 5 2 7 2h2"/></svg>',
            'titulo' => __('Justicia', 'edusiteco'),
            'descripcion' => __('Reconocer a cada quien lo que le corresponde por sus derechos, necesidades, y responsabilidades. La Justicia nos hace equitativos.', 'edusiteco')
        ),
        array(
            // 'icono' => '🫂',
            'icono' => '<svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="text-blue-600 dark:text-blue-400"><path d="M19 14c1.49-1.46 3-3.21 3-5.5A5.5 5.5 0 0 0 16.5 3c-1.76 0-3 .5-4.5 2-1.5-1.5-2.74-2-4.5-2A5.5 5.5 0 0 0 2 8.5c0 2.3 1.5 4.05 3 5.5l7 7Z"/><path d="M12 5 9.04 7.96a2.17 2.17 0 0 0 0 3.08v0c.82.82 2.13.85 3 .07l2.07-1.9a2.82 2.82 0 0 1 3.79 0l2.96 2.66"/><path d="m18 15-2-2"/><path d="m15 18-2-2"/></svg>',
            'titulo' => __('Solidaridad', 'edusiteco'),
            'descripcion' => __('Interés y apertura hacia la comunidad, hacia el servicio a los demás y la participación social, para el logro del bienestar común. La solidaridad nos hace sensibles y facilita el servicio a los demás.', 'edusiteco')
        ),
        array(
            // 'icono' => '☮️',
            'icono' => '<svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="text-blue-600 dark:text-blue-400"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M22 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>',
            'titulo' => __('Tolerancia', 'edusiteco'),
            'descripcion' => __('Reconocer la diferencia; valorar, respetar y aceptar a las otras personas con su forma de pensar y de actuar aunque no lo compartamos. La tolerancia propicia el diálogo y los acuerdos de acción para una mejor convivencia.', 'edusiteco')
        ),
        array(
            // 'icono' => '🌍',
            'icono' => '<svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="text-blue-600 dark:text-blue-400"><circle cx="12" cy="12" r="10"/><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"/><path d="M2 12h20"/></svg>',
            'titulo' => __('Inclusión', 'edusiteco'),
            'descripcion' => __('Valorar la diversidad social, cultural, étnica, sexual y personal, que hace parte de nuestro entorno y asumir un compromiso significativo dirigido a dimensionar al ser indistintamente de su particularidad. Respetamos la particularidad y la diversidad y ofrecemos una educación de calidad para todos y todas.', 'edusiteco')
        ),
    );
}


/********************************/
/** EDUSITECO CUSTOMIZER PAGES **/
/********************************/
require_once get_template_directory() . '/inc/edusiteco-customizer-pages.php';

/**************************/
/** CPT PROJECT TEACHERS **/
/**************************/
require_once get_template_directory() . '/inc/edusiteco-cpt-teachers.php';

/***************************/
/***** CPT COMUNICADOS *****/
/***************************/
require_once get_template_directory() . '/inc/edusiteco-cpt-communications.php';


/**
 * Creación de páginas por defecto
 */
require_once get_template_directory() . '/inc/edusiteco-default-pages.php';

/**
 * Filtro para eliminar los prefijos de los títulos de archivo (ej. "Categoría:", "Archivo:").
 *
 * @param string $title Título original del archivo.
 * @return string Título modificado sin prefijo.
 */
add_filter( 'get_the_archive_title', function ( $title ) {
    if ( is_category() || is_tag() || is_tax() ) {
        $title = single_term_title( '', false );
    } elseif ( is_post_type_archive() ) {
        $title = post_type_archive_title( '', false );
    }
    return $title;
});

#########################
#    EDUSITECO BLOCKS   #
#########################
require_once get_template_directory() . '/inc/edusiteco-register-blocks.php';

/**
 * Encolar los estilos compilados (Tailwind) dentro del editor de bloques.
 *
 * Esto hace que las utilidades de Tailwind (p-6, text-gray-600, etc.) estén
 * disponibles cuando se renderiza el bloque en el editor.
 */
function edusiteco_block_editor_styles() {
	$css_path = get_template_directory() . '/assets/css/index.css';
	
	if ( file_exists( $css_path ) ) {
		wp_enqueue_style(
			'edusiteco-editor-styles',
			get_template_directory_uri() . '/assets/css/index.css',
			array(),
			filemtime( $css_path )
		);
	}
}
add_action( 'enqueue_block_editor_assets', 'edusiteco_block_editor_styles' );

/**
 * Clase para crear un control de separador/título en el Personalizador.
 */
if ( class_exists( 'WP_Customize_Control' ) ) {
    class Edusiteco_Separator_Control extends WP_Customize_Control {
        public $type = 'separator';

        public function render_content() {
            ?>
            <div style="margin-top: 15px; margin-bottom: 5px; border-top: 1px solid #ddd; padding-top: 15px;">
                <h3 style="font-weight: 600; font-size: 14px; margin: 0;"><?php echo esc_html( $this->label ); ?></h3>
            </div>
            <?php
        }
    }
}