<?php
/**
 * Template Name: Visión, Misión y Valores
 * Description: Plantilla para mostrar la misión, visión y valores del colegio
 */
?>

<?php get_header(); ?>

<main id="primary" class="site-main">
    <!-- Hero Section -->
    <?php
    $hero_image_url = has_post_thumbnail()
        ? get_the_post_thumbnail_url(null, 'full')
        : get_template_directory_uri() . '/assets/images/hero-mision-vision.jpg';
    ?>
    <section class="relative h-[60vh] bg-cover bg-center flex items-center justify-center text-white"
        style="background-image: linear-gradient(rgba(51, 102, 204, 0.8), rgba(51, 102, 204, 0.9)), url('<?php echo esc_url($hero_image_url); ?>');">
        <div class="relative z-10 text-center px-4 animate-fade-in-up">
            <h1 class="text-4xl md:text-6xl font-bold mb-4"><?php the_title(); ?></h1>
            <p class="text-xl md:text-2xl opacity-90">
                <?php
                // Este subtítulo podría ser un campo personalizado (ACF) o un ajuste del tema.
                echo esc_html(get_post_meta(get_the_ID(), 'page_subtitle', true) ?: __('La esencia que guía nuestro camino educativo', 'edusiteco'));
                ?>
            </p>
        </div>
    </section>

    <!-- Misión Section -->
    <section class="py-16 md:py-20 bg-white dark:bg-gray-900">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col lg:flex-row items-center gap-12">
                <div class="lg:w-1/3 text-center lg:text-left">
                    <div
                        class="w-24 h-24 bg-blue-100 dark:bg-blue-900 rounded-full flex items-center justify-center mx-auto lg:mx-0 mb-4">
                        <svg viewBox="0 -0.5 1025 1025" class="icon" version="1.1" xmlns="http://www.w3.org/2000/svg"
                            fill="#000000">
                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                            <g id="SVGRepo_iconCarrier">
                                <path
                                    d="M447.427363 576.572637m-431.447814 0a431.447814 431.447814 0 1 0 862.895628 0 431.447814 431.447814 0 1 0-862.895628 0Z"
                                    fill="#FFFFFF"></path>
                                <path
                                    d="M447.427363 1024c-246.884027 0-447.427363-200.543336-447.427363-447.427363s200.543336-447.427363 447.427363-447.427363 447.427363 200.543336 447.427363 447.427363-200.543336 447.427363-447.427363 447.427363z m0-862.895628c-229.306523 0-415.468266 186.161742-415.468266 415.468265s186.161742 415.468266 415.468266 415.468266 415.468266-186.161742 415.468265-415.468266-186.161742-415.468266-415.468265-415.468265z"
                                    fill="#191919"></path>
                                <path
                                    d="M447.427363 576.572637m-324.384838 0a324.384838 324.384838 0 1 0 648.769676 0 324.384838 324.384838 0 1 0-648.769676 0Z"
                                    fill="#F86C6C"></path>
                                <path
                                    d="M447.427363 917.736001c-187.759697 0-340.364387-152.60469-340.364387-340.364386S259.667666 237.007228 447.427363 237.007228s340.364387 152.60469 340.364387 340.364387-152.60469 340.364387-340.364387 340.364386z m0-649.568653c-170.182193 0-308.405289 138.223096-308.40529 308.405289s138.223096 308.405289 308.40529 308.40529 308.405289-138.223096 308.405289-308.40529S617.609556 268.167348 447.427363 268.167348z"
                                    fill="#191919"></path>
                                <path
                                    d="M447.427363 576.572637m-208.53311 0a208.53311 208.53311 0 1 0 417.06622 0 208.53311 208.53311 0 1 0-417.06622 0Z"
                                    fill="#FFFFFF"></path>
                                <path
                                    d="M447.427363 801.884273c-123.841502 0-224.512659-100.671157-224.512659-224.512658S323.585861 352.059978 447.427363 352.059978s224.512659 100.671157 224.512659 224.512659-100.671157 225.311636-224.512659 225.311636zM447.427363 384.019076c-106.263999 0-192.553562 86.289563-192.553562 192.553561S341.163364 769.126199 447.427363 769.126199s192.553562-86.289563 192.553561-192.553562S553.691362 384.019076 447.427363 384.019076z"
                                    fill="#191919"></path>
                                <path
                                    d="M447.427363 576.572637m-101.470134 0a101.470134 101.470134 0 1 0 202.940268 0 101.470134 101.470134 0 1 0-202.940268 0Z"
                                    fill="#F86C6C"></path>
                                <path
                                    d="M447.427363 694.02232c-64.717172 0-117.449683-52.732511-117.449683-117.449683S382.710191 459.122954 447.427363 459.122954 564.877046 511.855465 564.877046 576.572637c0 65.51615-52.732511 117.449683-117.449683 117.449683z m0-202.141291c-47.139669 0-85.490585 38.350917-85.490586 85.490586S400.287694 662.063223 447.427363 662.063223 532.917948 623.712306 532.917948 576.572637 494.567031 491.881029 447.427363 491.881029z"
                                    fill="#191919"></path>
                                <path
                                    d="M1008.309521 114.76368L878.875177 243.399047l-100.671157 2.396933 2.396933-100.671157L910.035297 16.489456l-3.994887 102.269112z"
                                    fill="#C2CDDC"></path>
                                <path
                                    d="M779.002998 261.775528c-3.994887 0-7.989774-1.597955-11.185684-4.793864-3.19591-3.19591-4.793865-7.190797-4.793865-11.984662l2.396933-100.671157c0-3.994887 1.597955-7.989774 4.793864-11.185684L899.64859 4.504795c4.793865-4.793865 11.984662-5.592842 17.577504-3.19591 6.391819 2.396932 9.587729 8.788752 9.587729 15.180571l-3.19591 84.691608 84.691608-3.19591c6.391819 0 12.783639 3.19591 15.180572 9.58773s1.597955 12.783639-3.19591 17.577503l-129.434344 128.635367c-3.19591 3.19591-7.190797 4.793865-11.185684 4.793864l-100.671157 3.19591zM796.580501 152.31562l-1.597954 77.500811 77.500811-1.597955 95.877292-95.877292-61.521263 2.396932c-4.793865 0-8.788752-1.597955-11.984661-4.793864s-4.793865-7.190797-4.793865-11.984662l2.396932-61.521262-95.877292 95.877292z"
                                    fill="#191919"></path>
                                <path
                                    d="M455.417137 580.567524c-3.994887 0-7.989774-1.597955-11.185684-4.793864-6.391819-6.391819-6.391819-15.979549 0-22.371368l525.727152-525.727152c6.391819-6.391819 15.979549-6.391819 22.371368 0s6.391819 15.979549 0 22.371368L466.602821 575.77366c-3.19591 3.19591-7.190797 4.793865-11.185684 4.793864z"
                                    fill="#191919"></path>
                                <path
                                    d="M942.793372 188.269604h-95.078315c-8.788752 0-15.979549-7.190797-15.979548-15.979548V78.809696c0-8.788752 7.190797-15.979549 15.979548-15.979549s15.979549 7.190797 15.979549 15.979549v77.500811h79.098766c8.788752 0 15.979549 7.190797 15.979548 15.979549s-7.190797 15.979549-15.979548 15.979548z"
                                    fill="#191919"></path>
                            </g>
                        </svg>
                    </div>
                    <h2 class="text-3xl lg:text-4xl font-bold text-gray-900 dark:text-white mb-4">
                        <?php echo esc_html__('Nuestra Misión', 'edusiteco'); ?>
                    </h2>
                </div>
                <div class="lg:w-2/3">
                    <div class="bg-gray-50 dark:bg-gray-800 rounded-3xl p-8 md:p-12 border-l-8 border-brand-primary-600">
                        <p class="text-lg md:text-xl text-gray-700 dark:text-gray-300 leading-relaxed">
                            <?php
                            $mision_text = get_theme_mod(
                                'mision_text',
                                'Formar integralmente a nuestros estudiantes mediante una educación de calidad basada en valores, desarrollando sus capacidades intelectuales, emocionales y sociales para que se conviertan en ciudadanos responsables, críticos y comprometidos con la transformación positiva de la sociedad.'
                            );
                            echo esc_html($mision_text);
                            ?>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Visión Section -->
    <section class="py-16 md:py-20 bg-gray-50 dark:bg-gray-800">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col lg:flex-row-reverse items-center gap-12">
                <div class="lg:w-1/3 text-center lg:text-left">
                    <div
                        class="w-24 h-24 bg-yellow-100 dark:bg-yellow-900 rounded-full flex items-center justify-center mx-auto lg:mx-0 mb-4">

                        <svg fill="#E2BD38" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" width="68px"
                            height="" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 32.148 32.148"
                            xml:space="preserve">
                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                            <g id="SVGRepo_iconCarrier">
                                <g>
                                    <g>
                                        <path
                                            d="M3.171,19.56c0,0,0.313-1.268-0.739-2.367c-1.056-1.101-2.382-1.105-2.382-1.105s-0.33,1.489,0.698,2.562 C1.775,19.72,3.171,19.56,3.171,19.56z">
                                        </path>
                                        <path
                                            d="M5.5,19.33c0,0,1.233-0.669,1.459-2.139c0.227-1.466-0.9-2.498-0.9-2.498s-1.08,0.768-1.313,2.274 C4.515,18.474,5.5,19.33,5.5,19.33z">
                                        </path>
                                        <path
                                            d="M7.354,23.029c0,0,1.136-0.827,1.169-2.312c0.03-1.483-1.221-2.358-1.221-2.358s-0.971,0.9-1.004,2.425 C6.265,22.308,7.354,23.029,7.354,23.029z">
                                        </path>
                                        <path
                                            d="M11.076,22.754c-0.108-1.479-1.436-2.233-1.436-2.233s-0.882,0.987-0.772,2.508c0.11,1.521,1.262,2.136,1.262,2.136 S11.183,24.234,11.076,22.754z">
                                        </path>
                                        <path
                                            d="M13.617,27.009c0,0,0.743-1.191,0.214-2.58c-0.529-1.388-2.019-1.728-2.019-1.728s-0.561,1.202-0.019,2.627 C12.337,26.751,13.617,27.009,13.617,27.009z">
                                        </path>
                                        <path
                                            d="M3.685,16.312c0,0,0.966-0.879,0.699-2.379c-0.267-1.499-1.366-2.242-1.366-2.242s-1.101,1.058-0.841,2.521 C2.437,15.672,3.685,16.312,3.685,16.312z">
                                        </path>
                                        <path
                                            d="M4.443,22.437c0,0-0.074-1.305-1.404-2.045c-1.333-0.738-2.602-0.355-2.602-0.355s0.124,1.521,1.422,2.242 C3.159,23,4.443,22.437,4.443,22.437z">
                                        </path>
                                        <path
                                            d="M6.688,24.969c0,0-0.362-1.255-1.823-1.681c-1.464-0.426-2.616,0.23-2.616,0.23s0.461,1.455,1.886,1.871 C5.562,25.806,6.688,24.969,6.688,24.969z">
                                        </path>
                                        <path
                                            d="M9.199,26.773c0,0-0.724-1.086-2.246-1.049c-1.524,0.037-2.424,1.01-2.424,1.01s0.88,1.25,2.363,1.213 C8.377,27.913,9.199,26.773,9.199,26.773z">
                                        </path>
                                        <path
                                            d="M10.271,27.509c-1.508,0.221-2.284,1.294-2.284,1.294s1.021,1.136,2.491,0.923c1.471-0.214,2.148-1.442,2.148-1.442 S11.778,27.292,10.271,27.509z">
                                        </path>
                                        <path
                                            d="M4.182,17.058l-0.727-0.029c-0.002,0.08-0.183,7.955,11.7,11.505l0.208-0.696C4.048,24.457,4.169,17.357,4.182,17.058z">
                                        </path>
                                        <path
                                            d="M28.977,19.581c0,0,1.396,0.16,2.423-0.912c1.028-1.072,0.698-2.562,0.698-2.562s-1.326,0.006-2.383,1.106 C28.662,18.314,28.977,19.581,28.977,19.581z">
                                        </path>
                                        <path
                                            d="M25.188,17.212c0.226,1.469,1.459,2.139,1.459,2.139s0.984-0.855,0.755-2.361c-0.233-1.507-1.313-2.274-1.313-2.274 S24.962,15.746,25.188,17.212z">
                                        </path>
                                        <path
                                            d="M24.846,18.379c0,0-1.251,0.875-1.222,2.358c0.033,1.483,1.169,2.312,1.169,2.312s1.089-0.722,1.057-2.245 C25.816,19.282,24.846,18.379,24.846,18.379z">
                                        </path>
                                        <path
                                            d="M21.071,22.775c-0.106,1.479,0.946,2.408,0.946,2.408s1.15-0.613,1.262-2.135c0.109-1.521-0.772-2.509-0.772-2.509 S21.181,21.294,21.071,22.775z">
                                        </path>
                                        <path
                                            d="M18.316,24.45c-0.529,1.388,0.214,2.579,0.214,2.579s1.279-0.258,1.823-1.68c0.542-1.425-0.02-2.628-0.02-2.628 S18.847,23.062,18.316,24.45z">
                                        </path>
                                        <path
                                            d="M28.463,16.333c0,0,1.248-0.64,1.509-2.101c0.26-1.463-0.842-2.521-0.842-2.521s-1.1,0.743-1.365,2.242 C27.497,15.454,28.463,16.333,28.463,16.333z">
                                        </path>
                                        <path
                                            d="M29.107,20.413c-1.33,0.739-1.404,2.044-1.404,2.044s1.285,0.564,2.584-0.157c1.298-0.721,1.422-2.243,1.422-2.243 S30.44,19.673,29.107,20.413z">
                                        </path>
                                        <path
                                            d="M27.281,23.31c-1.461,0.426-1.823,1.681-1.823,1.681s1.128,0.836,2.555,0.421c1.425-0.415,1.886-1.871,1.886-1.871 S28.745,22.883,27.281,23.31z">
                                        </path>
                                        <path
                                            d="M25.194,25.745c-1.522-0.037-2.246,1.05-2.246,1.05s0.821,1.139,2.307,1.174c1.483,0.036,2.363-1.213,2.363-1.213 S26.72,25.783,25.194,25.745z">
                                        </path>
                                        <path
                                            d="M21.876,27.529c-1.508-0.217-2.354,0.773-2.354,0.773s0.678,1.229,2.147,1.443c1.471,0.213,2.491-0.924,2.491-0.924 S23.384,27.75,21.876,27.529z">
                                        </path>
                                        <path
                                            d="M28.692,17.048l-0.728,0.029c0.013,0.301,0.134,7.398-11.181,10.779l0.208,0.695 C28.875,25.003,28.694,17.128,28.692,17.048z">
                                        </path>
                                        <polygon
                                            points="21.771,20.214 20.945,13.495 25.443,8.924 18.996,8.062 16.076,2.404 16.076,2.376 13.15,8.042 6.704,8.903 11.202,13.475 10.377,20.193 16.071,17.099 16.071,17.117 ">
                                        </polygon>
                                    </g>
                                </g>
                            </g>
                        </svg>
                    </div>
                    <h2 class="text-3xl lg:text-4xl font-bold text-gray-900 dark:text-white mb-4">
                        <?php echo esc_html__('Nuestra Visión', 'edusiteco'); ?>
                    </h2>
                </div>
                <div class="lg:w-2/3">
                    <div class="bg-white dark:bg-gray-900 rounded-3xl p-8 md:p-12 border-l-8 border-brand-secondary-500">
                        <p class="text-lg md:text-xl text-gray-700 dark:text-gray-300 leading-relaxed">
                            <?php
                            $vision_text = get_theme_mod(
                                'vision_text',
                                'Ser reconocidos como una institución educativa líder en la formación de personas íntegras, innovadoras y comprometidas con el desarrollo sostenible, destacándonos por nuestra excelencia académica, inclusión y contribución al progreso de la comunidad.'
                            );
                            echo esc_html($vision_text);
                            ?>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Valores Section -->
    <section class="py-16 md:py-20 bg-white dark:bg-gray-900">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl lg:text-4xl font-bold text-gray-900 dark:text-white mb-4">
                    <?php echo esc_html__('Nuestros Valores', 'edusiteco'); ?>
                </h2>
                <p class="text-lg text-gray-600 dark:text-gray-400 max-w-2xl mx-auto">
                    <?php echo esc_html__('Los principios que orientan nuestra labor educativa y forman el carácter de nuestra comunidad', 'edusiteco'); ?>
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <?php
                // Ejemplo de cómo obtener los valores desde un Custom Post Type 'valor'
                $args = array(
                    'post_type' => 'valor', // Nombre de tu CPT
                    'posts_per_page' => 6,
                    'orderby' => 'menu_order',
                    'order' => 'ASC'
                );
                $valores_query = new WP_Query($args);

                if ($valores_query->have_posts()):
                    while ($valores_query->have_posts()):
                        $valores_query->the_post();
                        // Para el icono, podrías usar un campo personalizado (ACF) o la imagen destacada.
                        // Aquí usamos un campo personalizado llamado 'icono_svg' como ejemplo.
                        $icono_svg = get_post_meta(get_the_ID(), 'icono_svg', true);
                        ?>
                        <div
                            class="valor-card group bg-white dark:bg-gray-800 rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 border border-gray-200 dark:border-gray-700 p-6 text-center transform hover:-translate-y-2">
                            <div
                                class="w-20 h-20 bg-blue-50 dark:bg-blue-900/30 rounded-full flex items-center justify-center mx-auto mb-4 group-hover:scale-110 transition-transform duration-300">
                                <?php if ($icono_svg): ?>
                                    <div class="w-10 h-10 text-blue-600 dark:text-blue-400">
                                        <?php echo $icono_svg; // Asegúrate de sanitizar el SVG si el usuario puede introducirlo. ?>
                                    </div>
                                <?php else: ?>
                                    <span class="text-3xl">💡</span>
                                <?php endif; ?>
                            </div>
                            <h3
                                class="text-xl font-bold text-gray-900 dark:text-white mb-3 group-hover:text-blue-600 dark:group-hover:text-blue-400 transition-colors">
                                <?php the_title(); ?>
                            </h3>
                            <p class="text-gray-600 dark:text-gray-300 text-sm leading-relaxed">
                                <?php echo esc_html(get_the_excerpt()); // O usa the_content() si necesitas más formato ?>
                            </p>
                        </div>
                        <?php
                    endwhile;
                    wp_reset_postdata();
                else:
                    // Fallback a datos ficticios si no hay posts en el CPT 'valor'
                    $valores_ficticios = edusiteco_get_valores_ficticios();
                    foreach ($valores_ficticios as $valor):
                        ?>
                        <div
                            class="valor-card group bg-white dark:bg-gray-800 rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 border border-gray-200 dark:border-gray-700 p-6 text-center transform hover:-translate-y-2">
                            <div
                                class="w-20 h-20 bg-blue-50 dark:bg-blue-900/30 rounded-full flex items-center justify-center mx-auto mb-4 group-hover:scale-110 transition-transform duration-300">
                                <span class="text-3xl"><?php echo $valor['icono']; ?></span>
                            </div>
                            <h3
                                class="text-xl font-bold text-gray-900 dark:text-white mb-3 group-hover:text-blue-600 dark:group-hover:text-blue-400 transition-colors">
                                <?php echo esc_html($valor['titulo']); ?>
                            </h3>
                            <p class="text-gray-600 dark:text-gray-300 text-sm leading-relaxed">
                                <?php echo esc_html($valor['descripcion']); ?>
                            </p>
                        </div>
                        <?php
                    endforeach;
                endif;
                ?>
            </div>
        </div>
    </section>

    <!-- Cita Institucional -->
    <section
        class="py-16 md:py-20 bg-gradient-custom dark:from-blue-800 dark:to-blue-900 text-white">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <span class="text-5xl text-yellow-300 mb-4 block">"</span>
            <blockquote class="text-2xl md:text-3xl italic mb-8 leading-relaxed">
                <?php
                $cita_text = get_theme_mod(
                    'cita_text',
                    'Educar con valores es formar el corazón del conocimiento, sembrando en cada estudiante la semilla de un futuro mejor.'
                );
                echo esc_html($cita_text);
                ?>
            </blockquote>
            <?php
            $cita_autor = get_theme_mod('cita_autor', 'Colegio San Martín');
            $cita_cargo = get_theme_mod('cita_cargo', 'Lema Institucional');
            ?>
            <div class="border-t border-blue-400 pt-6">
                <p class="text-lg font-semibold"><?php echo esc_html($cita_autor); ?></p>
                <p class="text-blue-200 text-sm"><?php echo esc_html($cita_cargo); ?></p>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-16 md:py-20 bg-gray-50 dark:bg-gray-800">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-3xl lg:text-4xl font-bold text-gray-900 dark:text-white mb-8">
                <?php echo esc_html__('Conoce más sobre nosotros', 'edusiteco'); ?>
            </h2>
            <div class="flex flex-col sm:flex-row justify-center gap-4">
                <?php
                $history_page = get_page_by_path('historia');
				$history_url = $history_page ? get_permalink($history_page->ID) : '#';
                
                $symbols_page = get_page_by_path('simbolos-institucionales');
				$symbols_url = $symbols_page ? get_permalink($symbols_page->ID) : '#';
                ?>
                <a href="<?php echo esc_url($history_url); ?>"
                    class="bg-brand-primary-600 hover:bg-brand-primary-700 text-white font-bold py-4 px-8 rounded-lg transition duration-300 transform hover:scale-105">
                    <?php echo esc_html__('Conoce nuestra Historia', 'edusiteco'); ?>
                </a>
                <a href="<?php echo esc_url($symbols_url); ?>"
                    class="bg-white dark:bg-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 text-brand-primary-600 dark:text-white border-2 border-brand-primary-600 dark:border-gray-600 font-bold py-4 px-8 rounded-lg transition duration-300 transform hover:scale-105">
                    <?php echo esc_html__('Explora nuestra identidad', 'edusiteco'); ?>
                </a>
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>