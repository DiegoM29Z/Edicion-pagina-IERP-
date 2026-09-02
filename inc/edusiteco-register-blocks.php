<?php
/**
 * Función para registrar bloques de Gutenberg dinámicamente.
 *
 * Escanea el directorio /build/blocks y registra cada bloque que encuentra.
 */
function edusiteco_register_theme_blocks() {
	// Obtiene la ruta raíz del tema.
	$theme_dir = get_template_directory();

	// Escanea todos los directorios de bloques dentro de la carpeta de compilación.
	$block_directories = glob( $theme_dir . '/build/blocks/*', GLOB_ONLYDIR );

	// Recorre cada directorio de bloque encontrado.
	foreach ( $block_directories as $block_dir ) {
		// Comprueba si existe un block.json y lo registra.
		if ( file_exists( $block_dir . '/block.json' ) ) {
			register_block_type( $block_dir );
		}
	}
}
add_action( 'init', 'edusiteco_register_theme_blocks' );


function edusiteco_register_category_blocks( $categories ) {
	$edusiteco_blocks = array(
		'slug' => 'edusiteco-blocks',
		'title' => __( 'Edusiteco Blocks', 'edusiteco' ),
	);

	return array_merge( $categories, array( $edusiteco_blocks ) );
}
add_filter( 'block_categories_all', 'edusiteco_register_category_blocks' );
