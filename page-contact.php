<?php
/*
Template Name: Página de Contacto
*/

get_header();
?>

<div class="bg-gradient-to-b from-background-light to-gray-50 dark:from-background-dark dark:to-slate-900 py-16 px-4 sm:px-6 lg:px-8">
    <div class="max-w-7xl mx-auto">
        
        <!-- Sección Encabezado -->
        <div class="text-center mb-16 animate-fade-in-up">
            <h1 class="font-bold text-4xl md:text-5xl mb-4" style="color: hsl(var(--color-brand-primary));">
                Ponte en Contacto
            </h1>
            <p class="text-lg text-gray-600 dark:text-gray-300 max-w-2xl mx-auto">
                ¿Tienes preguntas o necesitas más información? Estamos aquí para ayudarte. Envíanos un mensaje y nos pondremos en contacto lo antes posible.
            </p>
        </div>

        <!-- Grid Principal: Formulario + Información -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 mb-16">
            
            <!-- Columna Izquierda: Formulario -->
            <div class="bg-white dark:bg-slate-800 rounded-xl shadow-lg p-8 animate-fade-in-left">
                <h2 class="text-2xl font-bold mb-8" style="color: hsl(var(--color-brand-secondary));">
                    Envíanos un Mensaje
                </h2>
                
                <form class="space-y-6" id="contact-form">
                    
                    <!-- Campo Nombre -->
                    <div class="form-group">
                        <label for="nombre" class="block font-semibold text-gray-700 dark:text-gray-300 mb-2">
                            Nombre <span class="text-red-500">*</span>
                        </label>
                        <input 
                            type="text" 
                            id="nombre" 
                            name="nombre" 
                            required 
                            placeholder="Tu nombre completo"
                            class="w-full px-4 py-3 border-2 border-gray-200 dark:border-slate-600 rounded-lg focus:outline-none transition-all duration-300"
                            style="focus:border-color: hsl(var(--color-brand-primary)); focus:box-shadow: 0 0 0 3px hsl(var(--color-brand-primary) / 0.1);"
                        >
                    </div>

                    <!-- Campo Email -->
                    <div class="form-group">
                        <label for="email" class="block font-semibold text-gray-700 dark:text-gray-300 mb-2">
                            Correo Electrónico <span class="text-red-500">*</span>
                        </label>
                        <input 
                            type="email" 
                            id="email" 
                            name="email" 
                            required 
                            placeholder="tu@correo.com"
                            class="w-full px-4 py-3 border-2 border-gray-200 dark:border-slate-600 rounded-lg focus:outline-none transition-all duration-300"
                        >
                    </div>

                    <!-- Campo Asunto (Opcional) -->
                    <div class="form-group">
                        <label for="asunto" class="block font-semibold text-gray-700 dark:text-gray-300 mb-2">
                            Asunto <span class="text-gray-500 text-xs">(Opcional)</span>
                        </label>
                        <input 
                            type="text" 
                            id="asunto" 
                            name="asunto" 
                            placeholder="¿De qué se trata tu mensaje?"
                            class="w-full px-4 py-3 border-2 border-gray-200 dark:border-slate-600 rounded-lg focus:outline-none transition-all duration-300"
                        >
                    </div>

                    <!-- Campo Mensaje -->
                    <div class="form-group">
                        <label for="mensaje" class="block font-semibold text-gray-700 dark:text-gray-300 mb-2">
                            Mensaje <span class="text-red-500">*</span>
                        </label>
                        <textarea 
                            id="mensaje" 
                            name="mensaje" 
                            required 
                            rows="6"
                            placeholder="Cuéntanos más detalles..."
                            class="w-full px-4 py-3 border-2 border-gray-200 dark:border-slate-600 rounded-lg focus:outline-none transition-all duration-300 resize-none"
                        ></textarea>
                    </div>

                    <!-- Botón Enviar -->
                    <div>
                        <button 
                            type="submit" 
                            class="w-full text-white font-semibold py-3 px-6 rounded-lg transition-all duration-300 transform hover:scale-105 active:scale-95 flex items-center justify-center gap-2"
                            style="background-color: hsl(var(--color-brand-primary));"
                            onmouseover="this.style.backgroundColor='hsl(var(--color-brand-primary-600))'"
                            onmouseout="this.style.backgroundColor='hsl(var(--color-brand-primary))'"
                        >
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8m0 8l-6-4m6 4l6-4"></path>
                            </svg>
                            Enviar Mensaje
                        </button>
                    </div>

                    <!-- Nota de campos requeridos -->
                    <p class="text-sm text-gray-500 dark:text-gray-400 text-center">
                        Los campos marcados con <span class="text-red-500">*</span> son obligatorios
                    </p>

                </form>
            </div>

            <!-- Columna Derecha: Información + Mapa -->
            <div class="space-y-4 animate-fade-in-right">
                
                <!-- Información de Contacto -->
                <div class="bg-white dark:bg-slate-800 rounded-xl shadow-lg p-8">
                    <h2 class="text-2xl font-bold mb-8" style="color: hsl(var(--color-brand-secondary));">
                        Información de Contacto
                    </h2>
                    
                    <div class="space-y-6">
                        
                        <!-- Dirección -->
                        <div class="flex gap-2 pb-3 border-b border-gray-200 dark:border-slate-700">
                            <div class="flex-shrink-0">
                                <div class="flex items-center justify-center h-10 w-10 rounded-lg" style="background-color: hsl(var(--color-brand-primary) / 0.1);">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" style="color: hsl(var(--color-brand-primary));">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    </svg>
                                </div>
                            </div>
                            <div>
                                <h4 class="font-bold text-gray-900 dark:text-white mb-1">Dirección</h4>
                                <p class="text-text-light dark:text-text-dark">
                                    Calle Principal 123<br>
                                    Popayán, Cauca 76001
                                </p>
                            </div>
                        </div>

                        <!-- Teléfono -->
                        <div class="flex gap-2 pb-3 border-b border-gray-200 dark:border-slate-700">
                            <div class="flex-shrink-0">
                                <div class="flex items-center justify-center h-10 w-10 rounded-lg" style="background-color: hsl(var(--color-brand-accent) / 0.1);">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" style="color: hsl(var(--color-brand-accent));">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                                    </svg>
                                </div>
                            </div>
                            <div>
                                <h4 class="font-bold text-gray-900 dark:text-white mb-1">Teléfono</h4>
                                <p class="text-text-light dark:text-text-dark">
                                    <a href="tel:+573015551234" class="hover:font-semibold transition-all" style="color: hsl(var(--color-brand-primary));">
                                        +57 301 555 1234
                                    </a>
                                </p>
                            </div>
                        </div>

                        <!-- Email -->
                        <div class="flex gap-2 pb-3 border-b border-gray-200 dark:border-slate-700">
                            <div class="flex-shrink-0">
                                <div class="flex items-center justify-center h-10 w-10 rounded-lg" style="background-color: hsl(var(--color-brand-warning) / 0.1);">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" style="color: hsl(var(--color-brand-warning));">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                    </svg>
                                </div>
                            </div>
                            <div>
                                <h4 class="font-bold text-gray-900 dark:text-white mb-1">Correo Electrónico</h4>
                                <p class="text-text-light dark:text-text-dark">
                                    <a href="mailto:info@ierp-popayan.edu.co" class="hover:font-semibold transition-all" style="color: hsl(var(--color-brand-primary));">
                                        info@ierp-popayan.edu.co
                                    </a>
                                </p>
                            </div>
                        </div>

                        <!-- Horario -->
                        <div class="flex gap-2">
                            <div class="flex-shrink-0">
                                <div class="flex items-center justify-center h-10 w-10 rounded-lg" style="background-color: hsl(var(--color-brand-secondary) / 0.1);">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" style="color: hsl(var(--color-brand-secondary));">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                </div>
                            </div>
                            <div>
                                <h4 class="font-bold text-gray-900 dark:text-white mb-1">Horario de Atención</h4>
                                <p class="text-gray-600 dark:text-gray-400">
                                    <strong>Lunes - Viernes:</strong> 8:00 AM - 5:00 PM<br>
                                    <strong>Sábado:</strong> 9:00 AM - 1:00 PM<br>
                                    <strong>Domingo:</strong> Cerrado
                                </p>
                            </div>
                        </div>

                    </div>
                </div>

                <!-- Mapa Incrustado -->
                <div class="bg-white dark:bg-slate-800 rounded-xl shadow-lg overflow-hidden border-2" style="border-color: hsl(var(--color-brand-primary) / 0.2);">
                    <div class="relative w-full h-60">
                        <div id="map" class="w-full h-full rounded-xl"></div>
                    </div>
                </div>

            </div>

        </div>

    </div>
</div>

<style>
    /* Estilos personalizados del formulario */
    #contact-form input:focus,
    #contact-form textarea:focus {
        border-color: hsl(var(--color-brand-primary)) !important;
        box-shadow: 0 0 0 3px hsl(var(--color-brand-primary) / 0.1) !important;
    }

    #contact-form input::placeholder,
    #contact-form textarea::placeholder {
        color: rgb(156, 163, 175);
    }

    .dark #contact-form input::placeholder,
    .dark #contact-form textarea::placeholder {
        color: rgb(107, 114, 128);
    }

    /* Animación de entrada */
    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @keyframes fadeInLeft {
        from {
            opacity: 0;
            transform: translateX(-30px);
        }
        to {
            opacity: 1;
            transform: translateX(0);
        }
    }

    @keyframes fadeInRight {
        from {
            opacity: 0;
            transform: translateX(30px);
        }
        to {
            opacity: 1;
            transform: translateX(0);
        }
    }

    .animate-fade-in-up {
        animation: fadeInUp 0.8s ease-out forwards;
    }

    .animate-fade-in-left {
        animation: fadeInLeft 0.8s ease-out forwards;
        animation-delay: 0.1s;
    }

    .animate-fade-in-right {
        animation: fadeInRight 0.8s ease-out forwards;
        animation-delay: 0.2s;
    }

    /* Estilos del mapa */
    .leaflet-container {
        border-radius: 0.75rem;
    }
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {

    // Eventos del formulario (solo validación visual)
    const form = document.getElementById('contact-form');
    
    form.addEventListener('submit', function(e) {
        e.preventDefault();
        
        // Validar campos
        const nombre = document.getElementById('nombre').value.trim();
        const email = document.getElementById('email').value.trim();
        const mensaje = document.getElementById('mensaje').value.trim();
        
        if (!nombre || !email || !mensaje) {
            alert('Por favor, completa todos los campos obligatorios.');
            return;
        }
        
        // Validar email
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailRegex.test(email)) {
            alert('Por favor, ingresa un correo electrónico válido.');
            return;
        }
        
        alert('✅ Mensaje validado correctamente.\n\nEn una versión completa, aquí se enviaría el formulario.');
        form.reset();
    });
});
</script>

<?php
get_footer();
?>