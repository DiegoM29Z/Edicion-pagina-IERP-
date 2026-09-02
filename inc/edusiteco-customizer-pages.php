<?php

/**
 * Enqueue Customizer preview script.
 *
 * @return void
 */
function edusiteco_customize_pages_preview_js() {
    wp_enqueue_script( 
        'edusiteco-customizer-preview', 
        get_template_directory_uri() . '/js/customizer-pages-preview.js', 
        array( 'customize-preview', 'jquery' ), 
        _S_VERSION, 
        true 
    );
}
add_action( 'customize_preview_init', 'edusiteco_customize_pages_preview_js' );


/**
 * Register customizer settings for institutional symbols page.
 * 
 * @param mixed $wp_customize
 * @return void
 */
function edusiteco_simbolos_customize_register($wp_customize) {
    // Panel para agrupar secciones de páginas
    $wp_customize->add_panel('paginas_panel', array(
        'title' => __('Páginas', 'edusiteco'),
        'priority' => 35, // Justo antes de Símbolos
    ));

    // Sección para Símbolos Institucionales
    $wp_customize->add_section('simbolos_institucionales', array(
        'title' => __('Símbolos Institucionales', 'edusiteco'),
        'priority' => 40,
        'panel' => 'paginas_panel',
    ));

    // Hero Section
    $wp_customize->add_setting('simbolos_hero_image', array(
        'transport' => 'postMessage', 
    ));
    $wp_customize->add_setting('simbolos_subtitle', array(
        'default' => 'Emblemas que nos identifican y nos unen como comunidad educativa',
        'transport' => 'postMessage', 
    ));

    // Escudo
    $wp_customize->add_setting('escudo_image');
    $wp_customize->add_setting('escudo_alt', array('default' => 'Escudo del Colegio San Martín'));
    $wp_customize->add_setting('escudo_title', array(
        'default' => 'Escudo Institucional',
        'transport' => 'postMessage',
    ));
    $wp_customize->add_setting('escudo_description', array(
        'default' => 'Nuestro escudo representa la identidad y valores de la institución. Los colores azul y blanco simbolizan la sabiduría y la pureza. El libro abierto representa el conocimiento, la antorcha la luz del aprendizaje, y el laurel el éxito académico. Cada elemento refleja nuestro compromiso con la excelencia educativa y la formación integral de nuestros estudiantes.',
        'transport' => 'postMessage',
    ));

    // Bandera
    $wp_customize->add_setting('bandera_image');
    $wp_customize->add_setting('bandera_alt', array('default' => 'Bandera del Colegio San Martín'));
    $wp_customize->add_setting('bandera_title', array('default' => 'Bandera Institucional'));
    $wp_customize->add_setting('bandera_description', array(
        'default' => 'La bandera de nuestro colegio está compuesta por tres franjas horizontales: azul, blanco y verde. El azul representa la justicia y la verdad, el blanco simboliza la paz y la pureza de ideales, y el verde refleja la esperanza y el crecimiento. En el centro lleva nuestro escudo institucional, uniendo todos los elementos que representan nuestra identidad educativa.'
    ));

    // Himno
    $wp_customize->add_setting('himno_title', array('default' => 'Nuestro Himno'));
    $wp_customize->add_setting('himno_audio_url');
    $wp_customize->add_setting('himno_audio_label', array('default' => 'Audio del Himno del Colegio San Martín'));
    $wp_customize->add_setting('himno_letra', array(
        'default' => "Coro:\n¡Oh Colegio San Martín, faro de saber!\nDonde la juventud aprende a crecer.\nCon honor y valor, siempre hacia el ideal,\nFormando carácter con ética y moral.\n\nEstrofa I:\nEn tus aulas de luz, donde el estudio reina,\nSe forjan los pilares de una patria buena.\nCon esfuerzo y tesón, con amor y afán,\nCumpliendo con deber, el futuro alcanzar.\n\nEstrofa II:\nTus colores al viento, bandera de honor,\nInspiran en nosotros noble y gran valor.\nTus profesores guían con sabia dirección,\nSiembran en nuestras almas sana educación."
    ));

    // Lema
    $wp_customize->add_setting('lema_title', array('default' => 'Nuestro Lema'));
    $wp_customize->add_setting('lema_text', array('default' => 'Saber, Honor y Disciplina'));
    $wp_customize->add_setting('lema_explicacion', array(
        'default' => 'Nuestro lema representa los tres pilares fundamentales de nuestra institución: el Saber como búsqueda del conocimiento, el Honor como principio ético y la Disciplina como método para alcanzar la excelencia.'
    ));

    // Frase Final
    $wp_customize->add_setting('simbolos_frase_final', array(
        'default' => 'Nuestros símbolos reflejan la historia, el orgullo y los valores que nos inspiran cada día.'
    ));

    
    // --- Controles ---

    // Separador para Hero
    $wp_customize->add_control(new Edusiteco_Separator_Control($wp_customize, 'hero_separator_control', array(
        'label' => __('Encabezado de la Página', 'edusiteco'),
        'section' => 'simbolos_institucionales',
    )));

    // Hero
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'simbolos_hero_image_control', array(
        'label' => __('Imagen de Encabezado (Hero)', 'edusiteco'),
        'section' => 'simbolos_institucionales',
        'settings' => 'simbolos_hero_image',
    )));
    $wp_customize->add_control('simbolos_subtitle_control', array(
        'label' => __('Subtítulo del Encabezado', 'edusiteco'),
        'section' => 'simbolos_institucionales',
        'settings' => 'simbolos_subtitle',
        'type' => 'textarea',
    ) );

    // Separador para Escudo
    $wp_customize->add_control(new Edusiteco_Separator_Control($wp_customize, 'escudo_separator_control', array(
        'label' => __('Escudo', 'edusiteco'),
        'section' => 'simbolos_institucionales',
    )));

    // Escudo
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'escudo_image_control', array(
        'label' => __('Imagen del Escudo', 'edusiteco'),
        'section' => 'simbolos_institucionales',
        'settings' => 'escudo_image',
    )));
    $wp_customize->add_control('escudo_title_control', array(
        'label' => __('Título del Escudo', 'edusiteco'),
        'section' => 'simbolos_institucionales',
        'settings' => 'escudo_title',
        'type' => 'text',
    ));
    $wp_customize->add_control('escudo_description_control', array(
        'label' => __('Descripción del Escudo', 'edusiteco'),
        'section' => 'simbolos_institucionales',
        'settings' => 'escudo_description',
        'type' => 'textarea',
    ));
    $wp_customize->add_control('escudo_alt_control', array(
        'label' => __('Texto Alternativo del Escudo (alt)', 'edusiteco'),
        'section' => 'simbolos_institucionales',
        'settings' => 'escudo_alt',
        'type' => 'text',
    ));

    // Separador para Bandera
    $wp_customize->add_control(new Edusiteco_Separator_Control($wp_customize, 'bandera_separator_control', array(
        'label' => __('Bandera', 'edusiteco'),
        'section' => 'simbolos_institucionales',
    )));

    // Bandera
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'bandera_image_control', array(
        'label' => __('Imagen de la Bandera', 'edusiteco'),
        'section' => 'simbolos_institucionales',
        'settings' => 'bandera_image',
    )));
    $wp_customize->add_control('bandera_title_control', array(
        'label' => __('Título de la Bandera', 'edusiteco'),
        'section' => 'simbolos_institucionales',
        'settings' => 'bandera_title',
        'type' => 'text',
    ));
    $wp_customize->add_control('bandera_description_control', array(
        'label' => __('Descripción de la Bandera', 'edusiteco'),
        'section' => 'simbolos_institucionales',
        'settings' => 'bandera_description',
        'type' => 'textarea',
    ));
    $wp_customize->add_control('bandera_alt_control', array(
        'label' => __('Texto Alternativo de la Bandera (alt)', 'edusiteco'),
        'section' => 'simbolos_institucionales',
        'settings' => 'bandera_alt',
        'type' => 'text',
    ));

    // Separador para Himno
    $wp_customize->add_control(new Edusiteco_Separator_Control($wp_customize, 'himno_separator_control', array(
        'label' => __('Himno', 'edusiteco'),
        'section' => 'simbolos_institucionales',
    )));

    // Himno
    $wp_customize->add_control('himno_title_control', array(
        'label' => __('Título del Himno', 'edusiteco'),
        'section' => 'simbolos_institucionales',
        'settings' => 'himno_title',
        'type' => 'text',
    ));
    $wp_customize->add_control(new WP_Customize_Upload_Control($wp_customize, 'himno_audio_url_control', array(
        'label' => __('Archivo de Audio del Himno', 'edusiteco'),
        'section' => 'simbolos_institucionales',
        'settings' => 'himno_audio_url',
    )));
    $wp_customize->add_control('himno_letra_control', array(
        'label' => __('Letra del Himno', 'edusiteco'),
        'section' => 'simbolos_institucionales',
        'settings' => 'himno_letra',
        'type' => 'textarea',
    ));

    // Separador para Lema
    $wp_customize->add_control(new Edusiteco_Separator_Control($wp_customize, 'lema_separator_control', array(
        'label' => __('Lema', 'edusiteco'),
        'section' => 'simbolos_institucionales',
    )));

    // Lema
    $wp_customize->add_control('lema_title_control', array(
        'label' => __('Título del Lema', 'edusiteco'),
        'section' => 'simbolos_institucionales',
        'settings' => 'lema_title',
        'type' => 'text',
    ));
    $wp_customize->add_control('lema_text_control', array(
        'label' => __('Texto del Lema', 'edusiteco'),
        'section' => 'simbolos_institucionales',
        'settings' => 'lema_text',
        'type' => 'text',
    ));
}
add_action('customize_register', 'edusiteco_simbolos_customize_register');
