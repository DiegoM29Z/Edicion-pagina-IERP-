<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package edusiteco
 */
get_header();
?>

<main id="primary" class="site-main lg:max-w-[80%] mx-auto">

	<?php if (have_posts()): ?>

		<header class="page-header my-8">
			<?php
			$class = "";
			
			if (is_post_type_archive()) {
				echo '<h1 class="page-title text-3xl font-bold text-gray-900 dark:text-text-dark mb-4">' . post_type_archive_title('', false) . '</h1>';
			} else {
				the_archive_title('<h1 class="page-title text-3xl font-bold text-gray-900 dark:text-text-dark mb-4">', '</h1>');
			}
			the_archive_description('<div class="archive-description text-gray-600 dark:text-text-dark leading-relaxed">', '</div>');
			?>
		</header>
		<!-- .page-header -->

		<div class="comunicado-grid grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
			<?php
			/* Start the Loop */
			while (have_posts()):
				the_post();

				/*
				 * Include the Post-Type-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
				 */
				get_template_part('template-parts/content', get_post_type());

			endwhile;
			?>
		</div>

		<div class="mt-4 mb-4">
			<?php
			$archive_title = is_post_type_archive() ? post_type_archive_title('', false) : get_the_archive_title();
			the_posts_navigation(array(
				'prev_text' => __( $archive_title . ' Anteriores', 'edusiteco' ),
				'next_text' => __( $archive_title . ' Siguientes', 'edusiteco'),
				'aria_label' => esc_attr($archive_title),
				'class'      => ($archive_title && $archive_title == 'Comunicados') ? 'comunicados-paginacion' : '',
			));
			?>
		</div>

	<?php else:

		get_template_part('template-parts/content', 'none');

	endif;
	?>

</main>
<!-- #main -->

<?php get_footer(); ?>