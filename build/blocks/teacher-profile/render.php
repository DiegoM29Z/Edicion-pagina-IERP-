<?php
/**
 * Render del bloque Teacher Profile
 * 
 * @package EduSiteCo
 */

// Evitar acceso directo
if (!defined('ABSPATH')) {
    exit;
}

// Obtener el usuario actual
$current_user = wp_get_current_user();

// Verificar si el usuario está logueado
if (!$current_user->ID) {
    return;
}

// Obtener los atributos con valores por defecto
$gap = isset($attributes['gap']) ? (int) $attributes['gap'] : 4;
$avatar_size = isset($attributes['avatarSize']) ? (int) $attributes['avatarSize'] : 128;
$avatar_rounded = isset($attributes['avatarRounded']) ? esc_attr($attributes['avatarRounded']) : 'lg';
$avatar_border = isset($attributes['avatarBorder']) ? $attributes['avatarBorder'] : true;
$direction = isset($attributes['direction']) ? esc_attr($attributes['direction']) : 'horizontal';
$alignment = isset($attributes['alignment']) ? esc_attr($attributes['alignment']) : 'start';
$name_size = isset($attributes['nameSize']) ? esc_attr($attributes['nameSize']) : 'text-lg';
$name_weight = isset($attributes['nameWeight']) ? esc_attr($attributes['nameWeight']) : 'font-normal';
$show_email = isset($attributes['showEmail']) ? $attributes['showEmail'] : true;
$show_subject = isset($attributes['showSubject']) ? $attributes['showSubject'] : true;
$show_title = isset($attributes['showTitle']) ? $attributes['showTitle'] : true;
$hover_effect = isset($attributes['hoverEffect']) ? $attributes['hoverEffect'] : false;

// Obtener datos del usuario
$user_name = $current_user->display_name;
$user_email = $current_user->user_email;
$user_avatar = get_avatar_url($current_user->ID, ['size' => 96]);
$user_subject = get_user_meta($current_user->ID, 'subject', true);
$user_title = get_user_meta($current_user->ID, 'title', true);

// Construir clases CSS
$avatar_classes = ['object-cover'];
$avatar_classes[] = 'rounded-' . $avatar_rounded;
if ($avatar_border) {
    $avatar_classes[] = 'border-2 border-brand-primary';
}

$container_classes = [
    'bg-white',
    'dark:bg-gray-800',
    'border',
    'border-border-light',
    'dark:border-border-dark',
    'shadow-md',
    'rounded-lg',
    'p-6'
];
if ($hover_effect) {
    $container_classes[] = 'transition-all duration-300 hover:shadow-lg';
}

// Clases para el Flex
$flex_direction = $direction === 'vertical' ? 'flex-col' : 'flex-row';
$flex_align = $direction === 'vertical' ? 'items-center' : 'items-start';
$flex_justify = 'justify-' . $alignment;

// Clases del wrapper principal
$wrapper_attributes = get_block_wrapper_attributes([
    'class' => 'edusiteco-teacher-profile-block my-4'
]);
?>

<div <?php echo $wrapper_attributes; ?>>
    <div class="<?php echo esc_attr(implode(' ', $container_classes)); ?>">
        <div class="flex <?php echo esc_attr($flex_direction . ' ' . $flex_align . ' ' . $flex_justify); ?>"
            style="gap: <?php echo esc_attr($gap * 0.25); ?>rem;">

            <!-- Avatar -->
            <div class="flex-shrink-0">
                <img width="<?php echo esc_attr($avatar_size); ?>" height="<?php echo esc_attr($avatar_size); ?>"
                    src="<?php echo esc_url($user_avatar); ?>"
                    alt="<?php echo esc_attr(sprintf(__('Avatar de %s', 'edusiteco'), $user_name)); ?>"
                    class="<?php echo esc_attr(implode(' ', $avatar_classes)); ?>  !my-0 " style="display: block;" />
            </div>

            <!-- Información -->
            <div class="min-w-0 flex-1">
                <h3 class="<?php echo esc_attr($name_size . ' ' . $name_weight); ?> text-text-light dark:text-text-dark mb-2"
                    style="margin: 0 0 0.5rem 0;">
                    <?php echo esc_html($user_name ?: __('Sin nombre', 'edusiteco')); ?>
                </h3>

                <div class="flex flex-col gap-1 text-sm text-gray-600 dark:text-gray-400">
                    <?php if ($show_email && $user_email): ?>
                        <p style="margin: 0; font-size: 1rem;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                class="lucide lucide-mail-icon lucide-mail inline-block mr-2">
                                <path d="m22 7-8.991 5.727a2 2 0 0 1-2.009 0L2 7" />
                                <rect x="2" y="4" width="20" height="16" rx="2" />
                            </svg>
                            <strong><?php _e('Correo:', 'edusiteco'); ?></strong>
                            <a href="mailto:<?php echo esc_attr($user_email); ?>"
                                class="text-brand-primary hover:underline">
                                <?php echo esc_html($user_email); ?>
                            </a>
                        </p>
                    <?php endif; ?>

                    <?php if ($show_subject && $user_subject): ?>
                        <p style="margin: 0; font-size: 1rem;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                class="lucide lucide-notebook-pen-icon lucide-notebook-pen inline-block mr-2">
                                <path d="M13.4 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2v-7.4" />
                                <path d="M2 6h4" />
                                <path d="M2 10h4" />
                                <path d="M2 14h4" />
                                <path d="M2 18h4" />
                                <path
                                    d="M21.378 5.626a1 1 0 1 0-3.004-3.004l-5.01 5.012a2 2 0 0 0-.506.854l-.837 2.87a.5.5 0 0 0 .62.62l2.87-.837a2 2 0 0 0 .854-.506z" />
                            </svg>
                            <strong><?php _e('Asignatura:', 'edusiteco'); ?></strong>
                            <?php echo esc_html($user_subject); ?>
                        </p>
                    <?php endif; ?>

                    <?php if ($show_title && $user_title): ?>
                        <p style="margin: 0; font-size: 1rem;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                class="lucide lucide-graduation-cap-icon lucide-graduation-cap inline-block mr-2">
                                <path
                                    d="M21.42 10.922a1 1 0 0 0-.019-1.838L12.83 5.18a2 2 0 0 0-1.66 0L2.6 9.08a1 1 0 0 0 0 1.832l8.57 3.908a2 2 0 0 0 1.66 0z" />
                                <path d="M22 10v6" />
                                <path d="M6 12.5V16a6 3 0 0 0 12 0v-3.5" />
                            </svg>
                            <strong><?php _e('Título:', 'edusiteco'); ?></strong>
                            <?php echo esc_html($user_title); ?>
                        </p>
                    <?php endif; ?>

                    <?php if (!$show_email && !$show_subject && !$show_title): ?>
                        <p style="margin: 0; font-size: 0.875rem; color: #9ca3af; font-style: italic;">
                            <?php _e('No hay información visible.', 'edusiteco'); ?>
                        </p>
                    <?php endif; ?>
                </div>
            </div>

        </div>
    </div>
</div>