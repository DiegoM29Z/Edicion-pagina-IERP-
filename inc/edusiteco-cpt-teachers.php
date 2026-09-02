<?php
function edusite_register_teachers_cpt()
{
    $labels = [
        'name'           => __('Profesores', 'edusiteco'),
        'singular_name'  => __('Profesor', 'edusiteco'),
        'menu_name'      => __('Profesores', 'edusiteco'),
        'name_admin_bar' => __('Profesor', 'edusiteco'),
        'add_new'        => __('Agregar nuevo', 'edusiteco'),
        'add_new_item'   => __('Agregar nuevo profesor', 'edusiteco'),
        'new_item'       => __('Nuevo profesor', 'edusiteco'),
        'edit_item'      => __('Editar profesor', 'edusiteco'),
        'view_item'      => __('Ver profesor', 'edusiteco'),
        'all_items'      => __('Todos los profesores', 'edusiteco'),
        'search_items'   => __('Buscar profesor', 'edusiteco'),
        'not_found'      => __('No se encontraron profesores.', 'edusiteco'),
        'not_found_in_trash' => __('No hay profesores en la papelera.', 'edusiteco'),
    ];

    $args = [
        'labels'        => $labels,
        'description'   => __('Proyectos, logros y actividades de los docentes del colegio.', 'edusiteco'),
        'public'        => true,
        'has_archive'   => true,
        'rewrite'       => ['slug' => 'profesores'],
        'menu_icon'     => 'dashicons-groups',
        'supports'      => ['title', 'editor', 'thumbnail', 'excerpt'],
        'show_in_rest'  => true,
        'capability_type' => ['profesor', 'profesores'], 
        'map_meta_cap'  => true,
        'taxonomies'    => ['category', 'post_tag'],
    ];

    register_post_type('profesor', $args);
}
add_action('init', 'edusite_register_teachers_cpt');




####################
#   ROLE TEACHER   #
####################
function edusiteco_manage_teacher_role_and_caps()
{
    if (!get_role('profesor_role')) { 
        add_role(
            'profesor_role', 
            __('Profesor', 'edusiteco'), 
            array(
                'read' => true,
                'edit_posts' => true,
                'upload_files' => true,
                'publish_posts' => true,
            )
        );
    }
    eduusiteco_add_teacher_capabilities();
}
add_action('init', 'edusiteco_manage_teacher_role_and_caps');


# Capacidades personalizadas para el rol "teacher"
function eduusiteco_add_teacher_capabilities()
{
    $role = get_role('profesor_role'); 
    if ($role) {
        $role->add_cap('read');
        $role->add_cap('read_profesor');
        $role->add_cap('edit');
        $role->add_cap('edit_profesor');
        $role->add_cap('edit_profesores');
        $role->add_cap('delete');
        $role->add_cap('delete_profesor');
        $role->add_cap('delete_profesores');
        $role->add_cap('publish');
        $role->add_cap('publish_profesor');
        $role->add_cap('publish_profesores');
        $role->add_cap('read_private_profesores');
        $role->add_cap('edit_published_profesores');
        $role->add_cap('delete_published_profesores');

        # $role->add_cap('delete_others_profesores');
        # $role->add_cap('edit_others_profesores');
    }
}

function edusiteco_teacher_user_fields($user)
{
    if (in_array('profesor_role', (array) $user->roles)) { 
        ?>
        <hr />  
        <h3 style="font-size: 18px; margin-bottom: 5px;"><?php esc_html_e('Información del Profesor', 'edusiteco'); ?></h3>
        <p style="font-size: 16px;"><?php esc_html_e('Perfil profesional del profesor', 'edusiteco') ?></p>
        <table class="form-table" style="width: 520px;">
            <tr style="border-spacing: 0px;">
                <th style="padding: 4px;">
                    <label for="subject"><?php esc_html_e('Asignatura', 'edusiteco'); ?></label>
                </th>
                <td style="display: flex; flex-direction: column; margin-bottom: 2px; padding: 6px;">
                    <input 
                        type="text" 
                        name="subject" 
                        value="<?php echo esc_attr(get_user_meta($user->ID, 'subject', true)); ?>"
                        class="regular-text" 
                    />
                    <span class="description"><?php esc_html_e('Ingrese la asignatura que imparte el profesor.', 'edusiteco'); ?></span>
                </td>
            </tr>
            <tr style="border-spacing: 0px;">
                <th style="padding: 4px;">
                    <label for="title"><?php esc_html_e('Título académico', 'edusiteco'); ?></label>
                </th>
                <td style="display: flex; flex-direction: column; margin-bottom: 2px; padding: 6px;">
                    <input 
                        type="text" 
                        name="title" 
                        value="<?php echo esc_attr(get_user_meta($user->ID, 'title', true)); ?>"
                        class="regular-text" 
                    />
                    <span class="description"><?php esc_html_e('Ingrese el título académico del profesor.', 'edusiteco'); ?></span>
                </td>
            </tr>
            <tr>
                <th>
                    <label for="experience"><?php esc_html_e('Años de experiencia', 'edusiteco'); ?></label>
                </th>
                <td style="display: flex; flex-direction: column; margin-bottom: 2px; padding: 6px;">
                    <input 
                        type="number" 
                        name="experience"
                        value="<?php echo esc_attr(get_user_meta($user->ID, 'experience', true)); ?>" 
                        class="small-text" 
                        style="width: 100%;"
                    />
                    <span class="description"><?php esc_html_e('Ingrese los años de experiencia del profesor.', 'edusiteco'); ?></span>
                </td>
            </tr>
        </table>
        <?php
    }
}

add_action('show_user_profile', 'edusiteco_teacher_user_fields');
add_action('edit_user_profile', 'edusiteco_teacher_user_fields');

// Guardar los campos
function edusiteco_save_teacher_user_fields($user_id)
{
    if (!current_user_can('edit_user', $user_id))
        return false;

    update_user_meta($user_id, 'subject', sanitize_text_field($_POST['subject']));
    update_user_meta($user_id, 'title', sanitize_text_field($_POST['title']));
    update_user_meta($user_id, 'experience', intval($_POST['experience']));
}
add_action('personal_options_update', 'edusiteco_save_teacher_user_fields');
add_action('edit_user_profile_update', 'edusiteco_save_teacher_user_fields');


# Asociar automáticamente un usuario (teacher) al crear un nuevo “Profesor”
function edusiteco_auto_assign_teacher_to_post($post_id, $post, $update)
{
    if ($post->post_type !== 'profesor') // Comprobar el nuevo nombre del CPT
        return;
    $user = wp_get_current_user();

    if (in_array('profesor_role', (array) $user->roles)) { // Comprobar el nuevo rol
        update_post_meta($post_id, '_teacher_user_id', $user->ID);
    }
}
add_action('save_post', 'edusiteco_auto_assign_teacher_to_post', 10, 3);

# Registrar campos meta en la API REST
function edusiteco_register_user_meta_rest_field() {
    register_rest_field('user', 'meta', array(
        'get_callback' => function($user) {
            return array(
                'subject' => get_user_meta($user['id'], 'subject', true),
                'title' => get_user_meta($user['id'], 'title', true),
                'experience' => get_user_meta($user['id'], 'experience', true)
            );
        },
        'update_callback' => null,
        'schema' => array(
            'description' => __('Metadata del profesor', 'edusiteco'),
            'type' => 'object'
        )
    ));
}
add_action('rest_api_init', 'edusiteco_register_user_meta_rest_field');