/**
 * Archivo: assets/js/customizer-palette.js
 * Preview en tiempo real de colores y gradientes
 */

(function($) {
    'use strict';
    
    // ==========================================
    // FUNCIONES AUXILIARES
    // ==========================================
    
    /**
     * Convierte HEX a HSL
     */
    function hexToHSL(hex) {
        hex = hex.replace('#', '');
        
        const r = parseInt(hex.substr(0, 2), 16) / 255;
        const g = parseInt(hex.substr(2, 2), 16) / 255;
        const b = parseInt(hex.substr(4, 2), 16) / 255;
        
        const max = Math.max(r, g, b);
        const min = Math.min(r, g, b);
        let h, s, l = (max + min) / 2;
        
        if (max === min) {
            h = s = 0;
        } else {
            const d = max - min;
            s = l > 0.5 ? d / (2 - max - min) : d / (max + min);
            
            switch (max) {
                case r:
                    h = ((g - b) / d + (g < b ? 6 : 0)) / 6;
                    break;
                case g:
                    h = ((b - r) / d + 2) / 6;
                    break;
                case b:
                    h = ((r - g) / d + 4) / 6;
                    break;
            }
        }
        
        h = Math.round(h * 360);
        s = Math.round(s * 100);
        l = Math.round(l * 100);
        
        return `${h} ${s}% ${l}%`;
    }
    
    /**
     * Genera variantes de color (50-900)
     */
    function generateColorVariants(hsl, darkMode = false) {
        const parts = hsl.split(' ');
        const h = parseInt(parts[0]);
        const s = parseInt(parts[1].replace('%', ''));
        const l = parseInt(parts[2].replace('%', ''));
        
        const variants = {};
        
        if (darkMode) {
            variants[50] = `${h} ${s}% 10%`;
            variants[100] = `${h} ${s}% 15%`;
            variants[200] = `${h} ${s}% 20%`;
            variants[300] = `${h} ${s}% ${Math.max(10, l - 15)}%`;
            variants[400] = `${h} ${s}% ${Math.max(15, l - 5)}%`;
            variants[500] = `${h} ${s}% ${Math.min(85, l + 12)}%`;
            variants[600] = `${h} ${s}% ${Math.min(90, l + 20)}%`;
            variants[700] = `${h} ${s}% ${Math.min(92, l + 28)}%`;
            variants[800] = `${h} ${s}% ${Math.min(95, l + 35)}%`;
            variants[900] = `${h} ${s}% ${Math.min(97, l + 42)}%`;
        } else {
            variants[50] = `${h} ${s}% 95%`;
            variants[100] = `${h} ${s}% 90%`;
            variants[200] = `${h} ${s}% 80%`;
            variants[300] = `${h} ${s}% 70%`;
            variants[400] = `${h} ${s}% ${Math.min(95, l + 15)}%`;
            variants[500] = `${h} ${s}% ${l}%`;
            variants[600] = `${h} ${s}% ${Math.max(5, l - 8)}%`;
            variants[700] = `${h} ${s}% ${Math.max(5, l - 13)}%`;
            variants[800] = `${h} ${s}% ${Math.max(5, l - 18)}%`;
            variants[900] = `${h} ${s}% ${Math.max(5, l - 23)}%`;
        }
        
        return variants;
    }
    
    /**
     * Actualiza una variable de color con todas sus variantes
     */
    function updateColorVariable(colorName, hexValue) {
        const hsl = hexToHSL(hexValue);
        const variants = generateColorVariants(hsl);
        const variantsDark = generateColorVariants(hsl, true);
        
        // Obtener o crear style tag
        let styleTag = document.getElementById('edusiteco-customizer-preview-colors');
        if (!styleTag) {
            styleTag = document.createElement('style');
            styleTag.id = 'edusiteco-customizer-preview-colors';
            document.head.appendChild(styleTag);
        }
        
        // Obtener valores actuales de todos los colores
        const colors = {
            primary: wp.customize('brand_color_primary')() || '#0367A6',
            secondary: wp.customize('brand_color_secondary')() || '#03658C',
            accent: wp.customize('brand_color_accent')() || '#6C8C3B',
            warning: wp.customize('brand_color_warning')() || '#F28705',
            danger: wp.customize('brand_color_danger')() || '#D96907'
        };
        
        // Generar CSS completo con todas las variantes
        let css = ':root {\n';
        
        Object.keys(colors).forEach(key => {
            const hslColor = hexToHSL(colors[key]);
            const colorVariants = generateColorVariants(hslColor);
            
            css += `    --color-brand-${key}: ${hslColor};\n`;
            Object.keys(colorVariants).forEach(shade => {
                css += `    --color-brand-${key}-${shade}: ${colorVariants[shade]};\n`;
            });
        });
        
        css += '}\n\n.dark {\n';
        
        Object.keys(colors).forEach(key => {
            const hslColor = hexToHSL(colors[key]);
            const colorVariantsDark = generateColorVariants(hslColor, true);
            
            css += `    --color-brand-${key}: ${colorVariantsDark[500]};\n`;
            Object.keys(colorVariantsDark).forEach(shade => {
                css += `    --color-brand-${key}-${shade}: ${colorVariantsDark[shade]};\n`;
            });
        });
        
        css += '}';
        
        styleTag.innerHTML = css;
    }
    
    /**
     * Actualiza el gradiente personalizado
     */
    function updateGradient() {
        const color1 = wp.customize('gradient_color_1')() || '#0367A6';
        const color2 = wp.customize('gradient_color_2')() || '#03658C';
        const direction = wp.customize('gradient_direction')() || 'to right';
        
        let styleTag = document.getElementById('edusiteco-customizer-preview-gradient');
        if (!styleTag) {
            styleTag = document.createElement('style');
            styleTag.id = 'edusiteco-customizer-preview-gradient';
            document.head.appendChild(styleTag);
        }
        
        styleTag.innerHTML = `:root {
            --gradient-custom: linear-gradient(${direction}, ${color1}, ${color2});
        }
        .bg-gradient-custom {
            background: var(--gradient-custom);
        }`;
    }
    
    // ==========================================
    // LISTENERS DE CAMBIOS - COLORES
    // ==========================================
    
    // Primary
    wp.customize('brand_color_primary', function(value) {
        value.bind(function(to) {
            updateColorVariable('primary', to);
        });
    });
    
    // Secondary
    wp.customize('brand_color_secondary', function(value) {
        value.bind(function(to) {
            updateColorVariable('secondary', to);
        });
    });
    
    // Accent
    wp.customize('brand_color_accent', function(value) {
        value.bind(function(to) {
            updateColorVariable('accent', to);
        });
    });
    
    // Warning
    wp.customize('brand_color_warning', function(value) {
        value.bind(function(to) {
            updateColorVariable('warning', to);
        });
    });
    
    // Danger
    wp.customize('brand_color_danger', function(value) {
        value.bind(function(to) {
            updateColorVariable('danger', to);
        });
    });
    
    // ==========================================
    // LISTENERS DE CAMBIOS - GRADIENTES
    // ==========================================
    
    wp.customize('gradient_color_1', function(value) {
        value.bind(function(to) {
            updateGradient();
        });
    });
    
    wp.customize('gradient_color_2', function(value) {
        value.bind(function(to) {
            updateGradient();
        });
    });
    
    wp.customize('gradient_direction', function(value) {
        value.bind(function(to) {
            updateGradient();
        });
    });
    
})(jQuery);