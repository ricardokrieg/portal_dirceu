<h1><?php _e('Nada encontrado', 'xicamais'); ?></h1>

<section id='main'>
    <section class='post'>
        <article>
            <?php if (is_home() && current_user_can('publish_posts')): ?>
                <p><?php printf(__("Pronto para criar seu primeiro post? <a href='%1$s'>Comece aqui</a>.", 'xicamais'), admin_url('post-new.php')); ?></p>
            <?php elseif (is_search()): ?>
                <p><?php _e('Desculpe, mas não encontramos nada. Por favor, tente uma nova busca:', 'xicamais'); ?></p>
                <?php get_search_form(); ?>
                <div class='clear'></div>
            <?php else: ?>
                <p><?php _e('Parece que não encontramos o que você estava procurando. Tente fazer uma busca:', 'xicamais'); ?></p>
                <?php get_search_form(); ?>
                <div class='clear'></div>
            <?php endif; ?>
        </article>
    </section>
</section>
