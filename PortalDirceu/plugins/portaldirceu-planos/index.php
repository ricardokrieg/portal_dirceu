<?php
/*
Plugin Name: PortalDirceu Planos
*/

// Custom FAQ Post Type
function portaldirceu_planos_init() {
    $labels = array(
        'name'               => _x('Planos', 'post type general name'),
        'singular_name'      => _x('Plano', 'post type singular name'),
        'add_new'            => _x('Adicionar Novo', 'book'),
        'add_new_item'       => __('Adicionar novo Plano'),
        'edit_item'          => __('Editar Plano'),
        'new_item'           => __('Novo Plano'),
        'all_items'          => __('Todos os Planos'),
        'view_item'          => __('Ver Plano'),
        'search_items'       => __('Buscar Plano'),
        'not_found'          => __('Nenhum Plano encontrado'),
        'not_found_in_trash' => __('Nenhum Plano encontrado na Lixeira'),
        'parent_item_colon'  => '',
        'menu_name'          => 'Planos'
    );

    $args = array(
        'labels'            => $labels,
        'description'       => 'Armazena dados especificos do Plano',
        'public'            => false,
        'show_ui'           => true,
        'show_in_menu'      => true,
        'query_var'         => true,
        'rewrite'           => true,
        'capability_type'   => 'post',
        'has_archive'       => true,
        'hierarchical'      => false,
        'menu_position'     => 100,
        'supports'          => array('title', 'page-attributes', 'custom-fields'),
        'menu_icon'         => 'dashicons-screenoptions',
    );

    register_post_type('portaldirceu-plano', $args);
}

add_action('init', 'portaldirceu_planos_init');

function portaldirceu_planos_shortcode() {
    $args = array('posts_per_page' => -1, 'post_type' => 'portaldirceu-plano', 'orderby' => 'menu_order');
    $query = new WP_Query($args);
?>

<div class='planos-container'>
    <?php
        if ($query->have_posts()):
            while ($query->have_posts()):
                $query->the_post();
    ?>
                <div id="plano-<?php echo get_the_ID(); ?>" class='plano'>
                    <?php echo get_the_title(); ?>
                    <?php echo get_the_content(); ?>
                </div>
    <?php
            endwhile;
        endif;
    ?>
</div>

<?php
    //Reset the query
    wp_reset_query();
    wp_reset_postdata();
} // portaldirceu_planos_shortcode

add_shortcode('planos', 'portaldirceu_planos_shortcode');
