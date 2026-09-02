<?php
/**
 * Template Name: Directorio Institucional
 */
get_header();
?>

<main class="site-main bg-gray-50 dark:bg-gray-900 transition-colors duration-300" role="main">
    <!-- Hero Section -->
    <section class="hero-directorio relative bg-gradient-custom text-white py-20 px-4 overflow-hidden" aria-labelledby="directorio-title">
        <!-- Patrón decorativo SVG animado -->
        <div class="absolute inset-0 opacity-10" aria-hidden="true">
            <svg viewBox="0 0 1000 500" fill="currentColor" class="w-full h-full">
                <circle cx="200" cy="100" r="80" class="animate-float" />
                <circle cx="800" cy="150" r="120" class="animate-float animation-delay-1000" />
                <circle cx="400" cy="400" r="100" class="animate-float animation-delay-2000" />
            </svg>
        </div>
        
        <div class="relative z-10 max-w-6xl mx-auto text-center">
            <h1 id="directorio-title" class="text-4xl md:text-5xl lg:text-6xl font-bold mb-6 animate-fade-in-up font-plus-jakarta">
                Directorio Institucional
            </h1>
            <p class="text-xl md:text-2xl mb-8 max-w-3xl mx-auto animate-fade-in-up animation-delay-200 font-plus-jakarta font-light">
                Conoce a las personas y áreas que hacen posible el funcionamiento de nuestra institución educativa.
            </p>
            <div class="animate-fade-in-up animation-delay-400">
                <a href="#equipo-directivo" class="scroll-button inline-flex items-center justify-center w-12 h-12 bg-white bg-opacity-20 rounded-full text-white hover:bg-opacity-30 transition-all duration-300 hover:-translate-y-1 focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-blue-700" aria-label="Ir al equipo directivo">
                    <svg class="w-6 h-6 animate-bounce" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"></path>
                    </svg>
                </a>
            </div>
        </div>
    </section>

    <!-- Equipo Directivo -->
    <section id="equipo-directivo" class="py-16 px-4 bg-white dark:bg-gray-800 transition-colors duration-300" aria-labelledby="equipo-directivo-title">
        <div class="max-w-6xl mx-auto">
            <div class="text-center mb-12">
                <h2 id="equipo-directivo-title" class="text-3xl md:text-4xl font-bold text-gray-900 dark:text-white mb-4 font-plus-jakarta">
                    Equipo Directivo
                </h2>
                <p class="text-lg text-gray-600 dark:text-gray-300 max-w-2xl mx-auto font-plus-jakarta">
                    Liderazgo comprometido con la excelencia educativa y el bienestar de nuestra comunidad
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Tarjeta 1 -->
                <article class="bg-white dark:bg-gray-700 rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2 animate-fade-in-up animation-delay-100 border border-gray-200 dark:border-gray-600">
                    <div class="p-6">
                        <div class="flex flex-col items-center text-center">
                            <div class="w-24 h-24 bg-brand-primary-600 dark:bg-brand-primary-500 rounded-full flex items-center justify-center text-white text-xl font-bold mb-4 transition-colors duration-300 group-hover:bg-accent">
                                MR
                            </div>
                            <header class="mb-4">
                                <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-2 font-plus-jakarta">María Rodríguez</h3>
                                <p class="text-brand-primary-600 dark:text-brand-primary-400 font-semibold font-plus-jakarta">Rectora</p>
                            </header>
                            <div class="mb-6">
                                <p class="text-gray-600 dark:text-gray-300 leading-relaxed font-plus-jakarta">
                                    Lidera la institución con visión estratégica y compromiso con la calidad educativa.
                                </p>
                            </div>
                            <footer class="flex space-x-4">
                                <a href="mailto:m.rodriguez@colegio.edu.co" class="contacto-btn w-10 h-10 bg-gray-100 dark:bg-gray-600 rounded-full flex items-center justify-center text-brand-primary-600 dark:text-brand-primary-400 hover:bg-brand-primary-600 dark:hover:bg-brand-primary-500 hover:text-white transition-all duration-300 transform hover:scale-110 focus:outline-none focus:ring-2 focus:ring-brand-primary-500 focus:ring-offset-2 dark:focus:ring-offset-gray-700" aria-label="Enviar correo a María Rodríguez">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z" />
                                        <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z" />
                                    </svg>
                                </a>
                                <a href="tel:+573001234567" class="contacto-btn w-10 h-10 bg-gray-100 dark:bg-gray-600 rounded-full flex items-center justify-center text-brand-primary-600 dark:text-brand-primary-400 hover:bg-brand-primary-600 dark:hover:bg-brand-primary-500 hover:text-white transition-all duration-300 transform hover:scale-110 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-gray-700" aria-label="Llamar a María Rodríguez">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z" />
                                    </svg>
                                </a>
                            </footer>
                        </div>
                    </div>
                </article>

                <!-- Tarjeta 2 -->
                <article class="bg-white dark:bg-gray-700 rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2 animate-fade-in-up animation-delay-200 border border-gray-200 dark:border-gray-600">
                    <div class="p-6">
                        <div class="flex flex-col items-center text-center">
                            <div class="w-24 h-24 bg-brand-primary-600 dark:bg-brand-primary-500 rounded-full flex items-center justify-center text-white text-xl font-bold mb-4 transition-colors duration-300 group-hover:bg-accent">
                                CM
                            </div>
                            <header class="mb-4">
                                <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-2 font-plus-jakarta">Carlos Mendoza</h3>
                                <p class="text-brand-primary-600 dark:text-brand-primary-400 font-semibold font-plus-jakarta">Coordinador Académico</p>
                            </header>
                            <div class="mb-6">
                                <p class="text-gray-600 dark:text-gray-300 leading-relaxed font-plus-jakarta">
                                    Supervisa y coordina los procesos académicos y curriculares de la institución.
                                </p>
                            </div>
                            <footer class="flex space-x-4">
                                <a href="mailto:c.mendoza@colegio.edu.co" class="contacto-btn w-10 h-10 bg-gray-100 dark:bg-gray-600 rounded-full flex items-center justify-center text-brand-primary-600 dark:text-brand-primary-400 hover:bg-brand-primary-600 dark:hover:bg-brand-primary-500 hover:text-white transition-all duration-300 transform hover:scale-110 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-gray-700" aria-label="Enviar correo a Carlos Mendoza">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z" />
                                        <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z" />
                                    </svg>
                                </a>
                                <a href="tel:+573001234568" class="contacto-btn w-10 h-10 bg-gray-100 dark:bg-gray-600 rounded-full flex items-center justify-center text-brand-primary-600 dark:text-brand-primary-400 hover:bg-brand-primary-600 dark:hover:bg-brand-primary-500 hover:text-white transition-all duration-300 transform hover:scale-110 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-gray-700" aria-label="Llamar a Carlos Mendoza">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z" />
                                    </svg>
                                </a>
                            </footer>
                        </div>
                    </div>
                </article>

                <!-- Tarjeta 3 -->
                <article class="bg-white dark:bg-gray-700 rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2 animate-fade-in-up animation-delay-300 border border-gray-200 dark:border-gray-600">
                    <div class="p-6">
                        <div class="flex flex-col items-center text-center">
                            <div class="w-24 h-24 bg-brand-primary-600 dark:bg-brand-primary-500 rounded-full flex items-center justify-center text-text-dark text-xl font-bold mb-4 transition-colors duration-300 group-hover:bg-accent">
                                AP
                            </div>
                            <header class="mb-4">
                                <h3 class="text-xl font-bold text-text-light dark:text-text-dark mb-2 font-plus-jakarta">Ana Pérez</h3>
                                <p class="text-brand-primary-600 dark:text-brand-primary-400 font-semibold font-plus-jakarta">Coordinadora de Convivencia</p>
                            </header>
                            <div class="mb-6">
                                <p class="text-gray-600 dark:text-gray-300 leading-relaxed font-plus-jakarta">
                                    Promueve la sana convivencia y el desarrollo socioemocional de la comunidad educativa.
                                </p>
                            </div>
                            <footer class="flex space-x-4">
                                <a href="mailto:a.perez@colegio.edu.co" class="contacto-btn w-10 h-10 bg-gray-100 dark:bg-gray-600 rounded-full flex items-center justify-center text-brand-primary-600 dark:text-brand-primary-400 hover:bg-brand-primary-600 dark:hover:bg-brand-primary-500 hover:text-white transition-all duration-300 transform hover:scale-110 focus:outline-none focus:ring-2 focus:ring-brand-primary-500 focus:ring-offset-2 dark:focus:ring-offset-gray-700" aria-label="Enviar correo a Ana Pérez">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z" />
                                        <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z" />
                                    </svg>
                                </a>
                                <a href="tel:+573001234569" class="contacto-btn w-10 h-10 bg-gray-100 dark:bg-gray-600 rounded-full flex items-center justify-center text-brand-primary-600 dark:text-brand-primary-400 hover:bg-brand-primary-600 dark:hover:bg-brand-primary-500 hover:text-white transition-all duration-300 transform hover:scale-110 focus:outline-none focus:ring-2 focus:ring-brand-primary-500 focus:ring-offset-2 dark:focus:ring-offset-gray-700" aria-label="Llamar a Ana Pérez">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z" />
                                    </svg>
                                </a>
                            </footer>
                        </div>
                    </div>
                </article>
            </div>
        </div>
    </section>

    <!-- Coordinaciones y Áreas -->
    <section class="coordinaciones-section bg-gray-50 dark:bg-gray-800 py-16 px-4 transition-colors duration-300" aria-labelledby="coordinaciones-title">
        <div class="max-w-6xl mx-auto">
            <div class="text-center mb-12">
                <h2 id="coordinaciones-title" class="text-3xl md:text-4xl font-bold text-gray-900 dark:text-white mb-4 font-plus-jakarta">
                    Coordinaciones y Áreas
                </h2>
                <p class="text-lg text-gray-600 dark:text-gray-300 max-w-2xl mx-auto font-plus-jakarta">
                    Especialistas dedicados al desarrollo integral de nuestros estudiantes
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                <!-- Tarjeta de Coordinación 1 -->
                <article class="bg-white dark:bg-gray-700 rounded-lg shadow-md hover:shadow-lg transition-all duration-300 transform hover:-translate-y-1 border-t-4 border-brand-primary-600 dark:border-brand-primary-500 hover:border-accent animate-fade-in-up animation-delay-100">
                    <div class="p-6 text-center">
                        <div class="w-14 h-14 bg-gray-100 dark:bg-gray-600 rounded-full flex items-center justify-center text-brand-primary-600 dark:text-brand-primary-400 mb-4 mx-auto transition-all duration-300 group-hover:bg-brand-primary-600 dark:group-hover:bg-brand-primary-500 group-hover:text-white group-hover:rotate-12">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M10.394 2.08a1 1 0 00-.788 0l-7 3a1 1 0 000 1.84L5.25 8.051a.999.999 0 01.356-.257l4-1.714a1 1 0 11.788 1.838L7.667 9.088l1.94.831a1 1 0 00.787 0l7-3a1 1 0 000-1.838l-7-3zM3.31 9.397L5 10.12v4.102a8.969 8.969 0 00-1.05-.174 1 1 0 01-.89-.89 11.115 11.115 0 01.25-3.762zM9.3 16.573A9.026 9.026 0 007 14.935v-3.957l1.818.78a3 3 0 002.364 0l5.508-2.361a11.026 11.026 0 01.25 3.762 1 1 0 01-.89.89 8.968 8.968 0 00-5.35 2.524 1 1 0 01-1.4 0zM6 18a1 1 0 001-1v-2.065a8.935 8.935 0 00-2-.712V17a1 1 0 001 1z" />
                            </svg>
                        </div>
                        <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-2 font-plus-jakarta">Coordinación Académica</h3>
                        <p class="text-gray-600 dark:text-gray-300 mb-3 font-plus-jakarta">Carlos Mendoza</p>
                        <a href="mailto:academico@colegio.edu.co" class="text-brand-primary-600 dark:text-brand-primary-400 font-medium hover:text-brand-primary-800 dark:hover:text-brand-primary-300 transition-colors duration-300 font-plus-jakarta focus:outline-none focus:underline">
                            academico@colegio.edu.co
                        </a>
                    </div>
                </article>

                <!-- Tarjeta de Coordinación 2 -->
                <article class="bg-white dark:bg-gray-700 rounded-lg shadow-md hover:shadow-lg transition-all duration-300 transform hover:-translate-y-1 border-t-4 border-brand-primary-600 dark:border-brand-primary-500 hover:border-accent animate-fade-in-up animation-delay-200">
                    <div class="p-6 text-center">
                        <div class="w-14 h-14 bg-gray-100 dark:bg-gray-600 rounded-full flex items-center justify-center text-brand-primary-600 dark:text-brand-primary-400 mb-4 mx-auto transition-all duration-300 group-hover:bg-brand-primary-600 dark:group-hover:bg-brand-primary-500 group-hover:text-white group-hover:rotate-12">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11a1 1 0 10-2 0v2H7a1 1 0 100 2h2v2a1 1 0 102 0v-2h2a1 1 0 100-2h-2V7z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-2 font-plus-jakarta">Bienestar Estudiantil</h3>
                        <p class="text-gray-600 dark:text-gray-300 mb-3 font-plus-jakarta">Laura González</p>
                        <a href="mailto:bienestar@colegio.edu.co" class="text-brand-primary-600 dark:text-brand-primary-400 font-medium hover:text-brand-primary-800 dark:hover:text-brand-primary-300 transition-colors duration-300 font-plus-jakarta focus:outline-none focus:underline">
                            bienestar@colegio.edu.co
                        </a>
                    </div>
                </article>

                <!-- Tarjeta de Coordinación 3 -->
                <article class="bg-white dark:bg-gray-700 rounded-lg shadow-md hover:shadow-lg transition-all duration-300 transform hover:-translate-y-1 border-t-4 border-brand-primary-600 dark:border-brand-primary-500 hover:border-accent animate-fade-in-up animation-delay-300">
                    <div class="p-6 text-center">
                        <div class="w-14 h-14 bg-gray-100 dark:bg-gray-600 rounded-full flex items-center justify-center text-brand-primary-600 dark:text-brand-primary-400 mb-4 mx-auto transition-all duration-300 group-hover:bg-brand-primary-600 dark:group-hover:bg-brand-primary-500 group-hover:text-white group-hover:rotate-12">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M7 3a1 1 0 000 2h6a1 1 0 100-2H7zM4 7a1 1 0 011-1h10a1 1 0 110 2H5a1 1 0 01-1-1zM2 11a2 2 0 012-2h12a2 2 0 012 2v4a2 2 0 01-2 2H4a2 2 0 01-2-2v-4z" />
                            </svg>
                        </div>
                        <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-2 font-plus-jakarta">Sistemas y Tecnología</h3>
                        <p class="text-gray-600 dark:text-gray-300 mb-3 font-plus-jakarta">David Torres</p>
                        <a href="mailto:sistemas@colegio.edu.co" class="text-brand-primary-600 dark:text-brand-primary-400 font-medium hover:text-brand-primary-800 dark:hover:text-brand-primary-300 transition-colors duration-300 font-plus-jakarta focus:outline-none focus:underline">
                            sistemas@colegio.edu.co
                        </a>
                    </div>
                </article>

                <!-- Tarjeta de Coordinación 4 -->
                <article class="bg-white dark:bg-gray-700 rounded-lg shadow-md hover:shadow-lg transition-all duration-300 transform hover:-translate-y-1 border-t-4 border-brand-primary-600 dark:border-brand-primary-500 hover:border-accent animate-fade-in-up animation-delay-400">
                    <div class="p-6 text-center">
                        <div class="w-14 h-14 bg-gray-100 dark:bg-gray-600 rounded-full flex items-center justify-center text-brand-primary-600 dark:text-brand-primary-400 mb-4 mx-auto transition-all duration-300 group-hover:bg-brand-primary-600 dark:group-hover:bg-brand-primary-500 group-hover:text-white group-hover:rotate-12">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9 4.804A7.968 7.968 0 005.5 4c-1.255 0-2.443.29-3.5.804v10A7.969 7.969 0 015.5 14c1.669 0 3.218.51 4.5 1.385A7.962 7.962 0 0114.5 14c1.255 0 2.443.29 3.5.804v-10A7.968 7.968 0 0014.5 4c-1.255 0-2.443.29-3.5.804V12a1 1 0 11-2 0V4.804z" />
                            </svg>
                        </div>
                        <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-2 font-plus-jakarta">Biblioteca</h3>
                        <p class="text-gray-600 dark:text-gray-300 mb-3 font-plus-jakarta">Ana María Vargas</p>
                        <a href="mailto:biblioteca@colegio.edu.co" class="text-brand-primary-600 dark:text-brand-primary-400 font-medium hover:text-brand-primary-800 dark:hover:text-brand-primary-300 transition-colors duration-300 font-plus-jakarta focus:outline-none focus:underline">
                            biblioteca@colegio.edu.co
                        </a>
                    </div>
                </article>
            </div>
        </div>
    </section>

    <!-- Contactos Generales -->
    <section class=" bg-gradient-to-br from-blue-50 to-indigo-100 dark:from-gray-800 dark:to-gray-700 py-16 px-4 transition-colors duration-300" aria-labelledby="contactos-generales-title">
        <div class="max-w-6xl mx-auto">
            <div class="text-center mb-12">
                <h2 id="contactos-generales-title" class="text-3xl md:text-4xl font-bold text-gray-900 dark:text-white mb-4 font-plus-jakarta">
                    Contactos Generales
                </h2>
                <p class="text-lg text-gray-600 dark:text-gray-300 max-w-2xl mx-auto font-plus-jakarta">
                    Estamos aquí para atenderte y resolver tus inquietudes
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 max-w-4xl mx-auto">
                <!-- Contacto 1 -->
                <article class="bg-white dark:bg-gray-700 rounded-lg shadow-md hover:shadow-lg transition-all duration-300 transform hover:-translate-y-1 animate-fade-in-up animation-delay-100">
                    <div class="p-6 text-center">
                        <div class="w-16 h-16 bg-gray-100 dark:bg-gray-600 rounded-full flex items-center justify-center text-brand-primary-600 dark:text-brand-primary-400 mb-4 mx-auto transition-all duration-300 group-hover:bg-brand-primary-600 dark:group-hover:bg-brand-primary-500 group-hover:text-white group-hover:scale-110">
                            <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z" />
                                <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z" />
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-2 font-plus-jakarta">Correo Institucional</h3>
                        <p class="text-gray-600 dark:text-gray-300 mb-4 font-plus-jakarta">Para información general y consultas</p>
                        <a href="mailto:info@colegio.edu.co" class="text-brand-primary-600 dark:text-brand-primary-400 font-medium hover:text-brand-primary-800 dark:hover:text-brand-primary-300 transition-colors duration-300 font-plus-jakarta focus:outline-none focus:underline">
                            info@colegio.edu.co
                        </a>
                    </div>
                </article>

                <!-- Contacto 2 -->
                <article class="bg-white dark:bg-gray-700 rounded-lg shadow-md hover:shadow-lg transition-all duration-300 transform hover:-translate-y-1 animate-fade-in-up animation-delay-200">
                    <div class="p-6 text-center">
                        <div class="w-16 h-16 bg-gray-100 dark:bg-gray-600 rounded-full flex items-center justify-center text-brand-primary-600 dark:text-brand-primary-400 mb-4 mx-auto transition-all duration-300 group-hover:bg-brand-primary-600 dark:group-hover:bg-brand-primary-500 group-hover:text-white group-hover:scale-110">
                            <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z" />
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-2 font-plus-jakarta">Teléfono Principal</h3>
                        <p class="text-gray-600 dark:text-gray-300 mb-4 font-plus-jakarta">Línea de atención al público</p>
                        <a href="tel:+5712345678" class="text-brand-primary-600 dark:text-brand-primary-400 font-medium hover:text-brand-primary-800 dark:hover:text-brand-primary-300 transition-colors duration-300 font-plus-jakarta focus:outline-none focus:underline">
                            +57 (1) 234 5678
                        </a>
                    </div>
                </article>

                <!-- Contacto 3 -->
                <article class="bg-white dark:bg-gray-700 rounded-lg shadow-md hover:shadow-lg transition-all duration-300 transform hover:-translate-y-1 animate-fade-in-up animation-delay-300">
                    <div class="p-6 text-center">
                        <div class="w-16 h-16 bg-gray-100 dark:bg-gray-600 rounded-full flex items-center justify-center text-brand-primary-600 dark:text-brand-primary-400 mb-4 mx-auto transition-all duration-300 group-hover:bg-brand-primary-600 dark:group-hover:bg-brand-primary-500 group-hover:text-white group-hover:scale-110">
                            <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-2 font-plus-jakarta">Dirección</h3>
                        <p class="text-gray-600 dark:text-gray-300 mb-4 font-plus-jakarta">Visítanos en nuestras instalaciones</p>
                        <a href="https://maps.google.com/?q=colegio+colombia+bogota" target="_blank" rel="noopener noreferrer" class="text-brand-primary-600 dark:text-brand-primary-400 font-medium hover:text-brand-primary-800 dark:hover:text-brand-primary-300 transition-colors duration-300 font-plus-jakarta focus:outline-none focus:underline">
                            Calle 123 #45-67, Bogotá
                        </a>
                    </div>
                </article>
            </div>

            <div class="text-center mt-12 animate-fade-in-up animation-delay-400">
                <a href="/contacto" class="cta-button inline-flex items-center bg-brand-primary hover:bg-brand-primary-700 dark:bg-brand-primary-500 dark:hover:bg-brand-primary-600 text-white font-semibold py-3 px-8 rounded-lg transition-all duration-300 transform hover:-translate-y-1 hover:shadow-lg focus:outline-none focus:ring-2 focus:ring-brand-primary-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 font-plus-jakarta">
                    Contáctanos
                    <svg class="w-5 h-5 ml-2" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M10.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L12.586 11H5a1 1 0 110-2h7.586l-2.293-2.293a1 1 0 010-1.414z"
                            clip-rule="evenodd" />
                    </svg>
                </a>
            </div>
        </div>
    </section>
</main>

<script>
// JavaScript para animaciones al hacer scroll
document.addEventListener('DOMContentLoaded', function() {
    // Intersection Observer para animaciones al hacer scroll
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };

    const observer = new IntersectionObserver(function(entries) {
        entries.forEach(function(entry) {
            if (entry.isIntersecting) {
                entry.target.style.animationPlayState = 'running';
                observer.unobserve(entry.target);
            }
        });
    }, observerOptions);

    // Observar elementos con animación
    const animatedElements = document.querySelectorAll('.animate-fade-in-up');
    animatedElements.forEach(function(el) {
        el.style.animationPlayState = 'paused';
        observer.observe(el);
    });

    // Smooth scroll para el botón del hero
    const scrollButton = document.querySelector('.scroll-button');
    if (scrollButton) {
        scrollButton.addEventListener('click', function(e) {
            e.preventDefault();
            const target = document.querySelector('#equipo-directivo');
            if (target) {
                target.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    }

    // Mejorar accesibilidad del teclado
    const focusableElements = document.querySelectorAll('a, button, [tabindex]:not([tabindex="-1"])');
    focusableElements.forEach(function(el) {
        el.addEventListener('keydown', function(e) {
            if (e.key === 'Enter' || e.key === ' ') {
                e.preventDefault();
                this.click();
            }
        });
    });
});
</script>

<?php get_footer(); ?>