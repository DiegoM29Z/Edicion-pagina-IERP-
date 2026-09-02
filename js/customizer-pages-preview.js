/**
 * File customizer-preview.js.
 *
 * Instantly previews changes in the Customizer.
 *
 * @package edusiteco
 */

( function( $ ) {

    // Abort if wp.customize is not available.
    if ( ! wp.customize ) {
        return;
    }

    // 1. Vista previa para la imagen del Hero de Símbolos
    wp.customize( 'simbolos_hero_image', function( value ) {
        value.bind( function( newval ) {
            // Busca la sección del hero y actualiza su estilo de fondo.
            // Asegúrate de que el selector coincida con tu HTML en page-institutional-symbols.php
            var heroSection = document.querySelector('.site-main section:first-child');
            if (heroSection) {
                heroSection.style.backgroundImage = 'linear-gradient(rgba(51, 102, 204, 0.85), rgba(51, 102, 204, 0.9)), url(' + newval + ')';
            }
        } );
    } );

    // 2. Vista previa para el subtítulo del Hero
    wp.customize( 'simbolos_subtitle', function( value ) {
        value.bind( function( newval ) {
            $( '.site-main section:first-child .text-xl' ).text( newval );
        } );
    } );

} )( jQuery );
