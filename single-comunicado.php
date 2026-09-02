<?php get_header(); ?>

<article class=" md:w-[70%] lg:max-w-[800px] mx-auto px-6 py-16">
    <?php if (have_posts()):
        while (have_posts()):
            the_post(); ?>
            <h1 class="text-4xl font-bold mb-6 text-gray-800"><?php the_title(); ?></h1>

            <div class="text-gray-500 mb-8">
                Publicado el <?php echo get_the_date(); ?>
            </div>

            <?php if (has_post_thumbnail()): ?>
                <div class="mb-6">
                    <?php the_post_thumbnail('large', ['class' => 'rounded-xl shadow-lg w-full h-auto']); ?>
                </div>
            <?php endif; ?>

            <?php
            $fecha_evento = get_post_meta(get_the_ID(), '_fecha_evento', true);
            $pdf_url = get_post_meta(get_the_ID(), '_pdf_url', true);
            ?>

            <?php if($fecha_evento || $pdf_url) : ?>

                <div class="flex gap-2 flex-col items-start bg-gray-50 border border-gray-200 rounded-xl p-5 mb-8">
                    <?php if ($fecha_evento): ?>
                        <div class="flex items-center gap-2">
                            <svg class="w-6" viewBox="0 0 1024 1024" class="icon" version="1.1" xmlns="http://www.w3.org/2000/svg" fill="#000000">
                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                <g id="SVGRepo_iconCarrier">
                                    <path d="M864 992H160c-70.4 0-128-57.6-128-128V160c0-70.4 57.6-128 128-128h704c70.4 0 128 57.6 128 128v704c0 70.4-57.6 128-128 128z" fill="#FFFFFF"></path>
                                    <path d="M32 144.8v169.6h960V144.8c0-62.4-50.4-112.8-112.8-112.8H144.8C82.4 32 32 82.4 32 144.8z" fill="#EC7BB0"></path>
                                    <path d="M176.8 168.8m-56.8 0a56.8 56.8 0 1 0 113.6 0 56.8 56.8 0 1 0-113.6 0Z" fill="#FFFFFF"></path>
                                    <path d="M847.2 168.8m-56.8 0a56.8 56.8 0 1 0 113.6 0 56.8 56.8 0 1 0-113.6 0Z" fill="#FFFFFF"></path>
                                    <path d="M512 168.8m-56.8 0a56.8 56.8 0 1 0 113.6 0 56.8 56.8 0 1 0-113.6 0Z" fill="#FFFFFF"></path>
                                    <path d="M176.8 232.8c-35.2 0-64.8-28.8-64.8-64.8 0-35.2 28.8-64.8 64.8-64.8s64.8 28.8 64.8 64.8-28.8 64.8-64.8 64.8z m0-112.8c-26.4 0-48.8 21.6-48.8 48.8s21.6 48.8 48.8 48.8 48.8-21.6 48.8-48.8-21.6-48.8-48.8-48.8zM847.2 232.8c-35.2 0-64.8-28.8-64.8-64.8 0-35.2 28.8-64.8 64.8-64.8s64.8 28.8 64.8 64.8c-0.8 36-29.6 64.8-64.8 64.8z m0-112.8c-26.4 0-48.8 21.6-48.8 48.8s21.6 48.8 48.8 48.8 48.8-21.6 48.8-48.8-22.4-48.8-48.8-48.8zM512 232.8c-35.2 0-64.8-28.8-64.8-64.8 0-35.2 28.8-64.8 64.8-64.8s64.8 28.8 64.8 64.8-29.6 64.8-64.8 64.8zM512 120c-26.4 0-48.8 21.6-48.8 48.8s21.6 48.8 48.8 48.8 48.8-21.6 48.8-48.8S538.4 120 512 120z" fill="#6A576D"></path>
                                    <path d="M1000 322.4H24V144.8C24 78.4 78.4 24 144.8 24h734.4c66.4 0 120.8 54.4 120.8 120.8v177.6z m-960-16h944V144.8c0-57.6-47.2-104.8-104.8-104.8H144.8C87.2 40 40 87.2 40 144.8v161.6z" fill="#6A576D"></path>
                                    <path d="M864 1000H160c-75.2 0-136-60.8-136-136V160c0-75.2 60.8-136 136-136h704c75.2 0 136 60.8 136 136v704c0 75.2-60.8 136-136 136zM160 40C93.6 40 40 93.6 40 160v704c0 66.4 53.6 120 120 120h704c66.4 0 120-53.6 120-120V160c0-66.4-53.6-120-120-120H160z" fill="#6A576D"></path>
                                    <path d="M489.6 688.8c6.4 0 9.6 4.8 9.6 11.2S496 712 489.6 712h-120c-10.4 0-16-5.6-16-16 0-9.6 5.6-22.4 10.4-30.4 9.6-18.4 25.6-34.4 50.4-50.4l18.4-12c25.6-16.8 36.8-27.2 36.8-47.2 0-19.2-16-32-40.8-32-31.2 0-40.8 17.6-45.6 36-1.6 5.6-6.4 8-12 8h-4c-5.6-1.6-10.4-4.8-10.4-11.2 0-1.6 0-2.4 0.8-4 2.4-11.2 8.8-23.2 17.6-32 12-12 28.8-19.2 54.4-19.2 40 0 65.6 20.8 65.6 54.4 0 32-20 46.4-44 61.6l-17.6 10.4c-29.6 18.4-46.4 36-52.8 60h108.8zM534.4 529.6c-7.2 0-10.4-4.8-10.4-12 0-6.4 4-12 10.4-12H656c10.4 0 14.4 4.8 14.4 13.6 0 9.6-3.2 13.6-8.8 20.8-29.6 40-52.8 96.8-66.4 161.6-1.6 8.8-7.2 11.2-13.6 11.2h-0.8c-7.2 0-13.6-4-13.6-11.2 0-0.8 0-2.4 0.8-3.2 13.6-60 40-120.8 72.8-169.6H534.4z" fill="#6A576D"></path>
                                </g>
                            </svg>
                            <p class="text-gray-700" title="Fecha del evento programada para: <?php echo esc_html($fecha_evento) ?>">
                                <span class="font-semibold text-blue-700">Fecha del evento: </span> <?php echo esc_html($fecha_evento); ?>
                            </p>
                        </div>
                    <?php endif; ?>

                    <?php if ($pdf_url): ?>
                        <a 
                            href="<?php echo esc_url($pdf_url); ?>" 
                            target="_blank"
                            class="inline-flex items-center gap-2 bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition"
                            title="<?php _e('Descargar comunicado (PDF)', 'edusiteco') ?>"
                            aria-label="Descargar comunicado (PDF)"
                        >
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="2">
                                <path d="M12 5v14m0 0l-4-4m4 4l4-4M4 19h16" />
                            </svg>
                            <span>Descargar comunicado (PDF)</span>
                        </a>
                    <?php endif; ?>
                </div>

            <?php endif; ?>


            <div class="prose max-w-none">
                <?php the_content(); ?>
            </div>

            <div class="mt-10">
                <a 
                    href="<?php echo get_post_type_archive_link('comunicado'); ?>"
                    class="group text-blue-600 font-medium flex items-center gap-2"
                >
                    <svg class="w-8 group-hover:stroke-blue-800 transition-colors" viewBox="-2.4 -2.4 28.80 28.80" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                        <g id="SVGRepo_iconCarrier"> 
                            <path d="M6 12H18M6 12L11 7M6 12L11 17" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> 
                        </g>
                    </svg>
                    <span class="group-hover:text-blue-800 group-hover:underline transition-colors">Volver a comunicados</span>
                </a>
            </div>
        <?php endwhile; endif; ?>
</article>

<?php get_footer(); ?>