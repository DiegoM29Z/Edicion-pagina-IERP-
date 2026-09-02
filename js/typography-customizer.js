(function($) {
    'use strict';
    /**
     * Carga una fuente de Google Fonts dinámicamente en el Customizer.
     *
     * @param {string} fontFamily El valor de la fuente desde el Customizer (ej. "Plus Jakarta Sans:200,300,400,500,600,700").
     */
    function loadGoogleFont(fontFamily) {
        if (!fontFamily || fontFamily === '') return;

        // Remover fuente anterior si existe
        $('#edusiteco-preview-font').remove();

        // Construir la URL de Google Fonts (API v2)
        const [family, weights] = fontFamily.split(':');
        const familyName = family.replace(/ /g, '+'); // Reemplazar espacios con '+'
        const fontUrl = `https://fonts.googleapis.com/css2?family=${familyName}:wght@${weights.replace(/,/g, ';')}&display=swap`;

        // Agregar link al head
        $('<link>')
            .attr({
                'id': 'edusiteco-preview-font',
                'rel': 'stylesheet',
                'href': fontUrl,
                'type': 'text/css',
                'media': 'all'
            })
            .appendTo('head');
    }
    
    // Función para extraer nombre de fuente
    function getFontName(fontValue) {
        return fontValue.split(':')[0];
    }
    
    // Función para actualizar CSS Custom Property
    function setCSVProperty(property, value) {
        document.documentElement.style.setProperty(property, value);
    }
    
    // ✅ NUEVA: Función para actualizar estilos SIN afectar iconos
    function updateElementStyles(selector, styles) {
        // ✅ PROTECCIÓN: Excluir material-icons
        if (selector.includes('.material-icons')) {
            return;
        }
        
        let styleString = '';
        for (let prop in styles) {
            const cssProp = prop.replace(/([A-Z])/g, '-$1').toLowerCase();
            styleString += `${cssProp}: ${styles[prop]} !important; `;
        }
        
        // ✅ PROTECCIÓN: Agregamos :not(.material-icons)
        let protectedSelector = selector;
        if (!protectedSelector.includes(':not(.material-icons)')) {
            protectedSelector = selector.split(',').map(s => {
                return s.trim() + ':not(.material-icons):not(.material-icons-outlined)';
            }).join(',');
        }
        
        // Crear o actualizar etiqueta de estilo
        let $styleTag = $('#edusiteco-customizer-live-styles');
        if ($styleTag.length === 0) {
            $styleTag = $('<style>')
                .attr('id', 'edusiteco-customizer-live-styles')
                .appendTo('head');
        }
        
        // Agregar regla CSS
        let rule = `${protectedSelector} { ${styleString} }`;
        let sheet = $styleTag[0].sheet || $styleTag[0].styleSheet;
        
        if (sheet.insertRule) {
            try {
                sheet.insertRule(rule, sheet.cssRules.length);
            } catch(e) {
                console.warn('Error inserting rule:', e);
            }
        } else if (sheet.addRule) {
            sheet.addRule(protectedSelector, styleString);
        }
    }
    
    // ========================================
    // BODY TYPOGRAPHY
    // ========================================
    
    // Fuente del cuerpo
    wp.customize('body_font_family', function(value) {
        value.bind(function(to) {
            loadGoogleFont(to);
            const fontName = getFontName(to);
            setCSVProperty('--edusiteco-body-font', `"${fontName}", sans-serif`);
            
            // ✅ Protegido: No aplica a material-icons
            updateElementStyles('body, body *', {
                fontFamily: `"${fontName}", sans-serif`
            });
        });
    });
    
    // Tamaño de fuente del cuerpo
    wp.customize('body_font_size', function(value) {
        value.bind(function(to) {
            setCSVProperty('--edusiteco-body-size', to + 'px');
            updateElementStyles('body', {
                fontSize: to + 'px'
            });
        });
    });
    
    // Peso de fuente del cuerpo
    wp.customize('body_font_weight', function(value) {
        value.bind(function(to) {
            setCSVProperty('--edusiteco-body-weight', to);
            updateElementStyles('body', {
                fontWeight: to
            });
        });
    });
    
    // Color del texto del cuerpo
    wp.customize('body_text_color', function(value) {
        value.bind(function(to) {
            setCSVProperty('--edusiteco-body-color', to);
            updateElementStyles('body', {
                color: to
            });
        });
    });
    
    // Altura de línea del cuerpo
    wp.customize('body_line_height', function(value) {
        value.bind(function(to) {
            setCSVProperty('--edusiteco-body-line-height', to);
            updateElementStyles('body', {
                lineHeight: to
            });
        });
    });
    
    // ========================================
    // HEADINGS TYPOGRAPHY
    // ========================================
    
    // Fuente de encabezados
    wp.customize('headings_font_family', function(value) {
        value.bind(function(to) {
            loadGoogleFont(to);
            const fontName = getFontName(to);
            setCSVProperty('--edusiteco-headings-font', `"${fontName}", sans-serif`);
            
            // ✅ Protegido: No aplica a material-icons
            updateElementStyles('h1, h2, h3, h4, h5, h6, .h1, .h2, .h3, .h4, .h5, .h6', {
                fontFamily: `"${fontName}", sans-serif`
            });
        });
    });
    
    // Peso de fuente de encabezados
    wp.customize('headings_font_weight', function(value) {
        value.bind(function(to) {
            setCSVProperty('--edusiteco-headings-weight', to);
            updateElementStyles('h1, h2, h3, h4, h5, h6, .h1, .h2, .h3, .h4, .h5, .h6', {
                fontWeight: to
            });
        });
    });
    
    // Color de encabezados
    wp.customize('headings_text_color', function(value) {
        value.bind(function(to) {
            setCSVProperty('--edusiteco-headings-color', to);
            updateElementStyles('h1, h2, h3, h4, h5, h6, .h1, .h2, .h3, .h4, .h5, .h6', {
                color: to
            });
        });
    });
    
    // Transformación de texto de encabezados
    wp.customize('headings_text_transform', function(value) {
        value.bind(function(to) {
            setCSVProperty('--edusiteco-headings-transform', to);
            updateElementStyles('h1, h2, h3, h4, h5, h6, .h1, .h2, .h3, .h4, .h5, .h6', {
                textTransform: to
            });
        });
    });
    
    // ========================================
    // TAMAÑOS INDIVIDUALES H1-H6
    // ========================================
    
    wp.customize('h1_font_size', function(value) {
        value.bind(function(to) {
            updateElementStyles('h1, .h1', {
                fontSize: to + 'px'
            });
        });
    });
    
    wp.customize('h2_font_size', function(value) {
        value.bind(function(to) {
            updateElementStyles('h2, .h2', {
                fontSize: to + 'px'
            });
        });
    });
    
    wp.customize('h3_font_size', function(value) {
        value.bind(function(to) {
            updateElementStyles('h3, .h3', {
                fontSize: to + 'px'
            });
        });
    });
    
    wp.customize('h4_font_size', function(value) {
        value.bind(function(to) {
            updateElementStyles('h4, .h4', {
                fontSize: to + 'px'
            });
        });
    });
    
    wp.customize('h5_font_size', function(value) {
        value.bind(function(to) {
            updateElementStyles('h5, .h5', {
                fontSize: to + 'px'
            });
        });
    });
    
    wp.customize('h6_font_size', function(value) {
        value.bind(function(to) {
            updateElementStyles('h6, .h6', {
                fontSize: to + 'px'
            });
        });
    });
    
    // ========================================
    // MENU TYPOGRAPHY
    // ========================================
    
    // Tamaño de fuente del menú
    wp.customize('menu_font_size', function(value) {
        value.bind(function(to) {
            // ✅ Protegido: Excluir material-icons
            updateElementStyles('nav a, nav button, .header-group a, .header-group button, .nav-links a, .menu-item a', {
                fontSize: to + 'px'
            });
        });
    });
    
    // Peso de fuente del menú
    wp.customize('menu_font_weight', function(value) {
        value.bind(function(to) {
            updateElementStyles('nav a, nav button, .header-group a, .header-group button, .nav-links a, .menu-item a', {
                fontWeight: to
            });
        });
    });
    
    // Color del menú
    wp.customize('menu_text_color', function(value) {
        value.bind(function(to) {
            updateElementStyles('nav a, nav button, .header-group a, .header-group button, .nav-links a, .menu-item a', {
                color: to
            });
        });
    });
    
    // Transformación de texto del menú
    wp.customize('menu_text_transform', function(value) {
        value.bind(function(to) {
            updateElementStyles('nav a, nav button, .header-group a, .header-group button, .nav-links a, .menu-item a', {
                textTransform: to
            });
        });
    });
    
})(jQuery);