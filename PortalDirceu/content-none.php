<?php get_header(); ?>

<div class='container'>
    <section id='main'>
        <section class='page'>
            <div class="page-title-container"><h2><?php _e('Não Encontrado', 'portaldirceu'); ?></h2></div>

            <section class='content'>
                <div class='container with-padding'>
                    <p><?php _e('Parece que a página que você está procurando não existe.', 'portaldirceu'); ?></p>

                    <a href="<?php echo esc_url(home_url('/')); ?>"><?php _e('Voltar para a Página Inicial', 'portaldirceu') ?></a>
                </div>
            </section>
        </section>
    </section>
</div>

<?php get_footer();
