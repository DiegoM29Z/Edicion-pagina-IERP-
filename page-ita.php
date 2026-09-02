<?php
/**
 * Template Name: Transparencia y Acceso a la Información Pública
 */
get_header();
?>

<main class="site-main bg-white dark:bg-gray-900 transition-colors duration-300 min-h-screen">
    <!-- Hero Section -->
    <section class="bg-gradient-to-r from-blue-900 to-blue-700 dark:from-blue-950 dark:to-blue-800 text-white py-16 px-4">
        <div class="max-w-7xl mx-auto text-center">
            <h1 class="text-4xl md:text-5xl font-bold mb-6 font-plus-jakarta animate-fade-in-up">
                Transparencia y Acceso a la Información Pública
            </h1>
            <p class="text-xl md:text-2xl max-w-4xl mx-auto leading-relaxed font-plus-jakarta font-light animate-fade-in-up animation-delay-200">
                En cumplimiento de la Ley 1712 de 2014 sobre Transparencia y el Derecho de Acceso a la Información Pública, 
                el <span class="font-bold text-gray-900 uppercase"><?php echo esc_html(get_bloginfo('name')); ?></span> pone a disposición de la comunidad educativa y la ciudadanía la siguiente información, 
                organizada por categorías de acuerdo con la normativa vigente.
            </p>
        </div>
    </section>

    <!-- Main Content -->
    <div class="max-w-7xl mx-auto px-4 py-8">
        <div class="flex flex-col lg:flex-row gap-8">
            
            <!-- Sidebar - Menú Acordeón -->
            <aside class="lg:w-1/3 xl:w-1/4">
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg border border-gray-200 dark:border-gray-700 overflow-hidden">
                    <!-- Mobile Menu Toggle -->
                    <button id="mobile-menu-toggle" class="lg:hidden w-full flex items-center justify-between p-4 bg-blue-50 dark:bg-blue-900/20 text-blue-800 dark:text-blue-200 font-semibold border-b border-gray-200 dark:border-gray-600">
                        <span class="font-plus-jakarta">Menú de Transparencia</span>
                        <svg id="toggle-icon" class="w-5 h-5 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>

                    <!-- Acordeón Container -->
                    <div id="accordion-menu" class="hidden lg:block">
                        <!-- Normatividad -->
                        <div class="accordion-item border-b border-gray-200 dark:border-gray-600">
                            <button 
                                class="accordion-button flex items-center justify-between w-full text-left py-4 px-6 bg-white dark:bg-gray-800 hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors duration-200 font-plus-jakarta font-semibold text-gray-800 dark:text-gray-200" 
                                aria-expanded="false" 
                                aria-controls="normatividad-content"
                            >
                                <span class="flex items-center">
                                    <svg class="w-5 h-5 mr-3 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                    </svg>
                                    Normatividad
                                </span>
                                <svg class="accordion-arrow w-4 h-4 text-gray-500 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </button>
                            <div id="normatividad-content" class="accordion-content hidden px-4 py-2 text-gray-600 dark:text-gray-300 font-plus-jakarta">
                                <ul class="space-y-1 px-2">
                                    <li class="hover:bg-gray-200 py-1 rounded-md pl-2">
                                        <a href="#" class="hover:text-gray-700 hover:underline dark:hover:text-blue-400 transition-colors duration-200">
                                            Ley 1712 de 2014
                                        </a>
                                    </li>
                                    <li class="hover:bg-gray-200 py-1 rounded-md pl-2">
                                        <a href="#" class="hover:text-gray-700 hover:underline dark:hover:text-blue-400 transition-colors duration-200">
                                            Decreto 103 de 2015
                                        </a>
                                    </li>
                                    <li class="hover:bg-gray-200 py-1 rounded-md pl-2">
                                        <a href="#" class="hover:text-gray-700 hover:underline dark:hover:text-blue-400 transition-colors duration-200">
                                            Resolución 3564 de 2015
                                        </a>
                                    </li>
                                    <li class="hover:bg-gray-200 py-1 rounded-md pl-2">
                                        <a href="#" class="hover:text-gray-700 hover:underline dark:hover:text-blue-400 transition-colors duration-200">
                                            Manual de Procedimientos
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <!-- Planeación y Rendición de Cuentas -->
                        <div class="accordion-item border-b border-gray-200 dark:border-gray-600">
                            <button 
                                class="accordion-button flex items-center justify-between w-full text-left py-4 px-6 bg-white dark:bg-gray-800 hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors duration-200 font-plus-jakarta font-semibold text-gray-800 dark:text-gray-200" 
                                aria-expanded="false" 
                                aria-controls="planeacion-content"
                            >
                                <span class="flex items-center">
                                    <svg 
                                        class="w-5 h-5 mr-3 text-blue-600 dark:text-blue-400" 
                                        fill="none" 
                                        stroke="currentColor" 
                                        viewBox="0 0 24 24"
                                    >
                                        <path 
                                            stroke-linecap="round" 
                                            stroke-linejoin="round" 
                                            stroke-width="2" 
                                            d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z">
                                        </path>
                                    </svg>
                                    Planeación y Rendición de Cuentas
                                </span>
                                <svg class="accordion-arrow w-4 h-4 text-gray-500 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </button>
                            <div id="planeacion-content" class="accordion-content hidden px-4 py-2 text-gray-600 dark:text-gray-300 font-plus-jakarta">
                                <ul class="space-y-1 px-2">
                                    <li class="hover:bg-gray-200 py-1 rounded-md pl-2">
                                        <a href="#" class="hover:text-gray-700 hover:underline dark:hover:text-blue-400 transition-colors duration-200">Plan Institucional</a>
                                    </li>
                                    <li class="hover:bg-gray-200 py-1 rounded-md pl-2">
                                        <a href="#" class="hover:text-gray-700 hover:underline dark:hover:text-blue-400 transition-colors duration-200">Informes de Gestión</a>
                                    </li>
                                    <li class="hover:bg-gray-200 py-1 rounded-md pl-2">
                                        <a href="#" class="hover:text-gray-700 hover:underline dark:hover:text-blue-400 transition-colors duration-200">Actas del Consejo Directivo</a>
                                    </li>
                                    <li class="hover:bg-gray-200 py-1 rounded-md pl-2">
                                        <a href="#" class="hover:text-gray-700 hover:underline dark:hover:text-blue-400 transition-colors duration-200">Indicadores de Desempeño</a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <!-- Presupuesto e Informes Financieros -->
                        <div class="accordion-item border-b border-gray-200 dark:border-gray-600">
                            <button 
                                class="accordion-button flex items-center justify-between w-full text-left py-4 px-6 bg-white dark:bg-gray-800 hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors duration-200 font-plus-jakarta font-semibold text-gray-800 dark:text-gray-200" 
                                aria-expanded="false" 
                                aria-controls="presupuesto-content"
                            >
                                <span class="flex items-center">
                                    <svg class="w-7 h-7 mr-3 text-blue-600 dark:text-blue-400" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="#2563EB">
                                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                        <g id="SVGRepo_iconCarrier"> 
                                            <path d="M6 8H4M6 16H4M6 12H3M7 4.51555C8.4301 3.55827 10.1499 3 12 3C16.9706 3 21 7.02944 21 12C21 16.9706 16.9706 21 12 21C10.1499 21 8.4301 20.4417 7 19.4845M14 9.49991C13.5 9.37589 12.6851 9.37133 12 9.37589M12 9.37589C11.7709 9.37742 11.9094 9.36768 11.6 9.37589C10.7926 9.40108 10.0016 9.73666 10 10.6874C9.99825 11.7002 11 11.9999 12 11.9999C13 11.9999 14 12.2311 14 13.3124C14 14.125 13.1925 14.4811 12.1861 14.599C12.1216 14.599 12.0597 14.5991 12 14.5994M12 9.37589L12 8M12 14.5994C11.3198 14.6022 10.9193 14.6148 10 14.4999M12 14.5994L12 16" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">

                                            </path> 
                                        </g>
                                    </svg>

                                    Presupuesto e Informes Financieros
                                </span>
                                <svg class="accordion-arrow w-4 h-4 text-gray-500 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </button>
                            <div id="presupuesto-content" class="accordion-content hidden px-4 py-2 text-gray-600 dark:text-gray-300 font-plus-jakarta">
                                <ul class="space-y-1 px-2">
                                    <li class="hover:bg-gray-200 py-1 rounded-md pl-2">
                                        <a href="#" class="hover:text-gray-700 hover:underline dark:hover:text-blue-400 transition-colors duration-200">Presupuesto Anual</a>
                                    </li>
                                    <li class="hover:bg-gray-200 py-1 rounded-md pl-2">
                                        <a href="#" class="hover:text-gray-700 hover:underline dark:hover:text-blue-400 transition-colors duration-200">Ejecución Presupuestal</a>
                                    </li>
                                    <li class="hover:bg-gray-200 py-1 rounded-md pl-2">
                                        <a href="#" class="hover:text-gray-700 hover:underline dark:hover:text-blue-400 transition-colors duration-200">Balances Financieros</a>
                                    </li>
                                    <li class="hover:bg-gray-200 py-1 rounded-md pl-2">
                                        <a href="#" class="hover:text-gray-700 hover:underline dark:hover:text-blue-400 transition-colors duration-200">Estados Financieros</a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <!-- Contratación -->
                        <div class="accordion-item border-b border-gray-200 dark:border-gray-600">
                            <button class="accordion-button flex items-center justify-between w-full text-left py-4 px-6 bg-white dark:bg-gray-800 hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors duration-200 font-plus-jakarta font-semibold text-gray-800 dark:text-gray-200" 
                                    aria-expanded="false" 
                                    aria-controls="contratacion-content">
                                <span class="flex items-center">
                                    <svg 
                                        class="w-5 h-5 mr-3 text-blue-600 dark:text-blue-400" 
                                        fill="none" 
                                        stroke="currentColor" 
                                        viewBox="0 0 24 24"
                                    >
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                                    </svg>
                                    Contratación
                                </span>
                                <svg class="accordion-arrow w-4 h-4 text-gray-500 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </button>
                            <div id="contratacion-content" class="accordion-content hidden px-4 py-2 text-gray-600 dark:text-gray-300 font-plus-jakarta">
                                <ul class="space-y-1 px-2">
                                    <li class="hover:bg-gray-200 py-1 rounded-md pl-2">
                                        <a href="#" class="hover:text-gray-700 hover:underline dark:hover:text-blue-400 transition-colors duration-200">Procesos Contractuales</a>
                                    </li>
                                    <li class="hover:bg-gray-200 py-1 rounded-md pl-2">
                                        <a href="#" class="hover:text-gray-700 hover:underline dark:hover:text-blue-400 transition-colors duration-200">Contratistas Vigentes</a>
                                    </li>
                                    <li class="hover:bg-gray-200 py-1 rounded-md pl-2">
                                        <a href="#" class="hover:text-gray-700 hover:underline dark:hover:text-blue-400 transition-colors duration-200">Objetos de los Contratos</a>
                                    </li>
                                    <li class="hover:bg-gray-200 py-1 rounded-md pl-2">
                                        <a href="#" class="hover:text-gray-700 hover:underline dark:hover:text-blue-400 transition-colors duration-200">Licitaciones Públicas</a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <!-- Trámites y Servicios -->
                        <div class="accordion-item border-b border-gray-200 dark:border-gray-600">
                            <button 
                                class="accordion-button flex items-center justify-between w-full text-left py-4 px-6 bg-white dark:bg-gray-800 hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors duration-200 font-plus-jakarta font-semibold text-gray-800 dark:text-gray-200" 
                                aria-expanded="false" 
                                aria-controls="tramites-content"
                            >
                                <span class="flex items-center">
                                    <svg class="w-5 h-5 mr-3 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    </svg>
                                    Trámites y Servicios
                                </span>
                                <svg class="accordion-arrow w-4 h-4 text-gray-500 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </button>
                            <div id="tramites-content" class="accordion-content hidden px-4 py-2 text-gray-600 dark:text-gray-300 font-plus-jakarta">
                                <ul class="space-y-1 px-2">
                                    <li class="hover:bg-gray-200 py-1 rounded-md pl-2">
                                        <a href="#" class="hover:text-gray-700 hover:underline dark:hover:text-blue-400 transition-colors duration-200">Matrículas y Pensiones</a>
                                    </li>
                                    <li class="hover:bg-gray-200 py-1 rounded-md pl-2">
                                        <a href="#" class="hover:text-gray-700 hover:underline dark:hover:text-blue-400 transition-colors duration-200">Certificados y Constancias</a>
                                    </li>
                                    <li class="hover:bg-gray-200 py-1 rounded-md pl-2">
                                        <a href="#" class="hover:text-gray-700 hover:underline dark:hover:text-blue-400 transition-colors duration-200">PQR - Peticiones, Quejas y Reclamos</a>
                                    </li>
                                    <li class="hover:bg-gray-200 py-1 rounded-md pl-2">
                                        <a href="#" class="hover:text-gray-700 hover:underline dark:hover:text-blue-400 transition-colors duration-200">Procesos Disciplinarios</a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <!-- Instrumentos de Gestión -->
                        <div class="accordion-item border-b border-gray-200 dark:border-gray-600">
                            <button class="accordion-button flex items-center justify-between w-full text-left py-4 px-6 bg-white dark:bg-gray-800 hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors duration-200 font-plus-jakarta font-semibold text-gray-800 dark:text-gray-200" 
                                    aria-expanded="false" 
                                    aria-controls="gestion-content">
                                <span class="flex items-center">
                                    <svg class="w-5 h-5 mr-3 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                                    Instrumentos de Gestión
                                </span>
                                <svg class="accordion-arrow w-4 h-4 text-gray-500 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </button>
                            <div id="gestion-content" class="accordion-content hidden px-4 py-2 text-gray-600 dark:text-gray-300 font-plus-jakarta">
                                <ul class="space-y-1 px-2">
                                    <li class="hover:bg-gray-200 py-1 rounded-md pl-2">
                                        <a href="#" class="hover:text-gray-700 hover:underline dark:hover:text-blue-400 transition-colors duration-200">Políticas de Datos</a>
                                    </li>
                                    <li class="hover:bg-gray-200 py-1 rounded-md pl-2">
                                        <a href="#" class="hover:text-gray-700 hover:underline dark:hover:text-blue-400 transition-colors duration-200">Registros Documentales</a>
                                    </li>
                                    <li class="hover:bg-gray-200 py-1 rounded-md pl-2">
                                        <a href="#" class="hover:text-gray-700 hover:underline dark:hover:text-blue-400 transition-colors duration-200">Mapa de Información</a>
                                    </li>
                                    <li class="hover:bg-gray-200 py-1 rounded-md pl-2">
                                        <a href="#" class="hover:text-gray-700 hover:underline dark:hover:text-blue-400 transition-colors duration-200">Sistema de Gestión Documental</a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <!-- Datos Abiertos -->
                        <div class="accordion-item border-b border-gray-200 dark:border-gray-600">
                            <button class="accordion-button flex items-center justify-between w-full text-left py-4 px-6 bg-white dark:bg-gray-800 hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors duration-200 font-plus-jakarta font-semibold text-gray-800 dark:text-gray-200" 
                                    aria-expanded="false" 
                                    aria-controls="datos-content">
                                <span class="flex items-center">
                                    <svg class="w-5 h-5 mr-3 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                                    Datos Abiertos
                                </span>
                                <svg class="accordion-arrow w-4 h-4 text-gray-500 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </button>
                            <div id="datos-content" class="accordion-content hidden px-4 py-2 text-gray-600 dark:text-gray-300 font-plus-jakarta">
                                <ul class="space-y-1 px-2">
                                    <li class="hover:bg-gray-200 py-1 rounded-md pl-2">
                                        <a href="#" class="hover:text-gray-700 hover:underline dark:hover:text-blue-400 transition-colors duration-200">Dataset - Matrículas</a>
                                    </li>
                                    <li class="hover:bg-gray-200 py-1 rounded-md pl-2">
                                        <a href="#" class="hover:text-gray-700 hover:underline dark:hover:text-blue-400 transition-colors duration-200">Dataset - Resultados Académicos</a>
                                    </li>
                                    <li class="hover:bg-gray-200 py-1 rounded-md pl-2">
                                        <a href="#" class="hover:text-gray-700 hover:underline dark:hover:text-blue-400 transition-colors duration-200">Dataset - Personal Docente</a>
                                    </li>
                                    <li class="hover:bg-gray-200 py-1 rounded-md pl-2">
                                        <a href="#" class="hover:text-gray-700 hover:underline dark:hover:text-blue-400 transition-colors duration-200">API de Datos Institucionales</a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <!-- Acceso a la Información Pública -->
                        <div class="accordion-item">
                            <button class="accordion-button flex items-center justify-between w-full text-left py-4 px-6 bg-white dark:bg-gray-800 hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors duration-200 font-plus-jakarta font-semibold text-gray-800 dark:text-gray-200" 
                                    aria-expanded="false" 
                                    aria-controls="acceso-content">
                                <span class="flex items-center">
                                    <svg class="w-5 h-5 mr-3 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"></path></svg>
                                    Acceso a la Información Pública
                                </span>
                                <svg class="accordion-arrow w-4 h-4 text-gray-500 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </button>
                            <div id="acceso-content" class="accordion-content hidden px-4 py-2 text-gray-600 dark:text-gray-300 font-plus-jakarta">
                                <ul class="space-y-1 px-2">
                                    <li class="hover:bg-gray-200 py-1 rounded-md pl-2">
                                        <a href="#" class="hover:text-gray-700 hover:underline dark:hover:text-blue-400 transition-colors duration-200">Formulario de Solicitud</a>
                                    </li>
                                    <li class="hover:bg-gray-200 py-1 rounded-md pl-2">
                                        <a href="#" class="hover:text-gray-700 hover:underline dark:hover:text-blue-400 transition-colors duration-200">Procedimiento de Respuesta</a>
                                    </li>
                                    <li class="hover:bg-gray-200 py-1 rounded-md pl-2">
                                        <a href="#" class="hover:text-gray-700 hover:underline dark:hover:text-blue-400 transition-colors duration-200">Plazos de Atención</a>
                                    </li>
                                    <li class="hover:bg-gray-200 py-1 rounded-md pl-2">
                                        <a href="#" class="hover:text-gray-700 hover:underline dark:hover:text-blue-400 transition-colors duration-200">Recursos de Reposición</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </aside>

            <!-- Main Content Area -->
            <div class="lg:w-2/3 xl:w-3/4">
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg border border-gray-200 dark:border-gray-700 p-8">
                    <div class="text-center mb-8">
                        <h2 class="text-3xl font-bold text-gray-800 dark:text-white mb-4 font-plus-jakarta">
                            Bienvenido al Portal de Transparencia
                        </h2>
                        <p class="text-lg text-gray-600 dark:text-gray-300 max-w-3xl mx-auto font-plus-jakarta">
                            Selecciona una categoría del menú lateral para explorar la información pública disponible 
                            según lo establecido en la Ley 1712 de 2014.
                        </p>
                    </div>

                    <!-- Información Destacada -->
                    <div class="grid md:grid-cols-2 gap-6 mb-8">
                        <div class="bg-blue-50 dark:bg-blue-900/20 rounded-lg p-6 border border-blue-200 dark:border-blue-800">
                            <h3 class="text-xl font-semibold text-blue-800 dark:text-blue-300 mb-3 font-plus-jakarta">
                                Información Relevante
                            </h3>
                            <ul class="space-y-2 text-gray-700 dark:text-gray-300 font-plus-jakarta">
                                <li class="flex items-center">
                                    <svg class="w-4 h-4 mr-2 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                    </svg>
                                    Información actualizada mensualmente
                                </li>
                                <li class="flex items-center">
                                    <svg class="w-4 h-4 mr-2 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                    </svg>
                                    Datos verificados y certificados
                                </li>
                            </ul>
                        </div>
                        <div class="bg-green-50 dark:bg-green-900/20 rounded-lg p-6 border border-green-200 dark:border-green-800">
                            <h3 class="text-xl font-semibold text-green-800 dark:text-green-300 mb-3 font-plus-jakarta">
                                Acceso Rápido
                            </h3>
                            <ul class="space-y-2 text-gray-700 dark:text-gray-300 font-plus-jakarta">
                                <li class="flex items-center">
                                    <svg class="w-4 h-4 mr-2 text-blue-500" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11a1 1 0 10-2 0v2H7a1 1 0 100 2h2v2a1 1 0 102 0v-2h2a1 1 0 100-2h-2V7z" clip-rule="evenodd"></path>
                                    </svg>
                                    Solicitud de información pública
                                </li>
                                <li class="flex items-center">
                                    <svg class="w-4 h-4 mr-2 text-blue-500" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M3 17a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm3.293-7.707a1 1 0 011.414 0L9 10.586V3a1 1 0 112 0v7.586l1.293-1.293a1 1 0 111.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                    </svg>
                                    Descarga de documentos oficiales
                                </li>
                            </ul>
                        </div>
                    </div>

                    <!-- Contenido Dinámico -->
                    <div id="dynamic-content" class="prose prose-lg max-w-none dark:prose-invert">
                        <p class="text-gray-600 dark:text-gray-300 text-center font-plus-jakarta">
                            Utilice el menú de navegación lateral para acceder a la información específica de cada categoría 
                            del Índice de Transparencia y Acceso a la Información Pública.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<style>
/* Animaciones para el acordeón */
.accordion-content {
    transition: all 0.3s ease-in-out;
}

.accordion-button[aria-expanded="true"] .accordion-arrow {
    transform: rotate(180deg);
}

/* Smooth transitions */
.accordion-item {
    transition: all 0.3s ease-in-out;
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Mobile menu toggle
    const mobileToggle = document.getElementById('mobile-menu-toggle');
    const accordionMenu = document.getElementById('accordion-menu');
    const toggleIcon = document.getElementById('toggle-icon');
    
    if (mobileToggle) {
        mobileToggle.addEventListener('click', function() {
            const isExpanded = accordionMenu.classList.toggle('hidden');
            toggleIcon.style.transform = isExpanded ? 'rotate(0deg)' : 'rotate(180deg)';
            mobileToggle.setAttribute('aria-expanded', !isExpanded);
        });
    }

    // Accordion functionality
    const accordionButtons = document.querySelectorAll('.accordion-button');
    
    accordionButtons.forEach(button => {
        button.addEventListener('click', function() {
            const targetId = this.getAttribute('aria-controls');
            const targetContent = document.getElementById(targetId);
            const isExpanded = this.getAttribute('aria-expanded') === 'true';
            
            // Close all other accordion items
            accordionButtons.forEach(otherButton => {
                if (otherButton !== button) {
                    const otherTargetId = otherButton.getAttribute('aria-controls');
                    const otherTargetContent = document.getElementById(otherTargetId);
                    otherButton.setAttribute('aria-expanded', 'false');
                    otherTargetContent.classList.add('hidden');
                }
            });
            
            // Toggle current item
            this.setAttribute('aria-expanded', !isExpanded);
            targetContent.classList.toggle('hidden');
        });
    });

    // Enhance accessibility
    accordionButtons.forEach(button => {
        button.addEventListener('keydown', function(e) {
            if (e.key === 'Enter' || e.key === ' ') {
                e.preventDefault();
                this.click();
            }
        });
    });

    // Focus management for better accessibility
    const focusableElements = document.querySelectorAll('button, a, [tabindex]:not([tabindex="-1"])');
    focusableElements.forEach(el => {
        el.addEventListener('focus', function() {
            this.style.outline = '2px solid #3b82f6';
            this.style.outlineOffset = '2px';
        });
        
        el.addEventListener('blur', function() {
            this.style.outline = 'none';
        });
    });
});
</script>

<?php get_footer(); ?>