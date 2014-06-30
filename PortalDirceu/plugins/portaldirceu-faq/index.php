<?php
/*
Plugin Name: PortalDirceu FAQ
*/

// Custom FAQ Post Type
function portaldirceu_faq_init() {
    $labels = array(
        'name'               => _x('FAQ', 'post type general name'),
        'singular_name'      => _x('FAQ', 'post type singular name'),
        'add_new'            => _x('Adicionar Novo', 'book'),
        'add_new_item'       => __('Adicionar novo FAQ'),
        'edit_item'          => __('Editar FAQ'),
        'new_item'           => __('Novo Item FAQ'),
        'all_items'          => __('Todos os FAQ\'s'),
        'view_item'          => __('Ver FAQ'),
        'search_items'       => __('Buscar FAQ'),
        'not_found'          => __('Nenhum FAQ encontrado'),
        'not_found_in_trash' => __('Nenhum FAQ encontrado na Lixeira'),
        'parent_item_colon'  => '',
        'menu_name'          => 'FAQ'
    );

    $args = array(
        'labels'            => $labels,
        'description'       => 'Armazena dados especificos do FAQ',
        'public'            => false,
        'show_ui'           => true,
        'show_in_menu'      => true,
        'query_var'         => true,
        'rewrite'           => true,
        'capability_type'   => 'post',
        'has_archive'       => true,
        'hierarchical'      => false,
        'menu_position'     => 100,
        'supports'          => array('title', 'editor', 'page-attributes'),
        'menu_icon'         => 'dashicons-format-chat',
    );

    register_post_type('faq', $args);
}

add_action('init', 'portaldirceu_faq_init');

function portaldirceu_faq_shortcode() {
    // Getting FAQs from WordPress plugin's Custom Post Type questions
    $args = array('posts_per_page' => -1, 'post_type' => 'faq', 'orderby' => 'menu_order', 'order' => 'ASC');
    $query = new WP_Query($args);

    global $faq;
?>


<div class='panel-group' id='faq'>
    <?php
        if ($query->have_posts()):
            while ($query->have_posts()):
                $query->the_post();
    ?>
                <div class='panel panel-default'>
                    <div class='panel-heading'>
                        <h4 class='panel-title'>
                            <a data-toggle='collapse' data-parent='#faq' href="#faq-<?php echo get_the_ID(); ?>">
                                <?php echo get_the_title(); ?>
                            </a>
                        </h4>
                    </div>
                    <div id="faq-<?php echo get_the_ID(); ?>" class='panel-collapse collapse'>
                        <div class='panel-body'>
                            <?php echo get_the_content(); ?>
                        </div>
                    </div>
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
} // portaldirceu_faq_shortcode

add_shortcode('faq', 'portaldirceu_faq_shortcode');
