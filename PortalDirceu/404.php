<?php get_header(); ?>

<h1><?php _e('Não Encontrado', 'xicamais'); ?></h1>

<section id='main'>
	<section class='post'>
		<article>
			<section class='content'>
				<p><?php _e('Parece que não encontramos nada nesta página. Experimente procurar algo:', 'xicamais'); ?></p>

				<?php get_search_form(); ?>
			</section>
		</article>
	</section>
</section>

<aside>
	<?php get_sidebar('content'); ?>
</aside>

<?php get_footer();
