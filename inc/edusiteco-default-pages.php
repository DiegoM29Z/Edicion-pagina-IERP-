<?php
/**
 * Crea la página de Transparencia y Acceso a la Información Pública (ITA).
 *
 * Esta función se engancha a `after_switch_theme`, que se ejecuta una vez que el tema ha sido activado.
 *
 * @return void
 */
function edusiteco_create_default_pages() {
    # Páginas
    $pages = array(
        array(
            'page_title'        => 'Transparencia y Acceso a la Información Pública', 
            'page_slug'         => 'transparencia-y-acceso-a-la-informacion-publica',
            'page_content'      => '',
            'page_template'     => 'page-ita.php',
        ),
        array(
            'page_title'    => 'Misión, Visión y Valores', 
            'page_slug'     => 'mision-vision-y-valores',
            'page_content'  => '',
            'page_template' => 'page-mision-vision-values.php',
        ),
        array(
            'page_title'    => 'Historia', 
            'page_slug'     => 'historia',
            'page_content'  => '<!-- wp:paragraph --> <p>Aquí puedes escribir la historia de tu colegio</p> <!-- /wp:paragraph -->',
            'page_template' => 'page-history.php',
        ),
        array(
            'page_title'    => 'Directorio', 
            'page_slug'     => 'directorio',
            'page_content'  => '',
            'page_template' => 'page-directory.php',
        ),
        array(
            'page_title'    => 'Simbolos Institucionales', 
            'page_slug'     => 'simbolos-institucionales',
            'page_content'  => '',
            'page_template' => 'page-institutional-symbols.php',
        ),
        array(
            'page_title'    => 'Participa',
            'page_slug'     => 'participa',
            'page_content'  => '',
            'page_template' => 'page-participates.php',
        ),
        array(
            'page_title'    => 'Contáctanos',
            'page_slug'     => 'contactanos',
            'page_content'  => '',
            'page_template' => 'page-contact.php',
        ),
        array(
            'page_title'    => 'Psicoorientación Escolar',
            'page_slug'     => 'psicoorientacion-escolar',
            'page_content'  => '',
            'page_template' => 'page-psicoorientacion.php',
        ),
    );

    foreach ($pages as $value) {
        $page_title = $value['page_title'];
        $page_slug  = $value['page_slug'];
        $page_content  = $value['page_content'];
        $page_template = $value['page_template'];

        // Comprobar si la página ya existe por su slug para evitar duplicados
        $page_check = get_page_by_path($page_slug, OBJECT, 'page');

        if( !$page_check ) {
            $page_data = array(
                'post_type'    => 'page',
                'post_title'   => $page_title,
                'post_name'    => $page_slug,
                'post_content' => $page_content,
                'post_status'  => 'publish',
                'post_author'  => 1,
            );
            // Insertar la página en la base de datos
            $page_id = wp_insert_post($page_data);
    
            // Si la página se creó correctamente, asignamos la plantilla
            if ($page_id && !is_wp_error($page_id)) {
                update_post_meta($page_id, '_wp_page_template', $page_template);
            }
        }

    }
}
add_action('after_switch_theme', 'edusiteco_create_default_pages');
