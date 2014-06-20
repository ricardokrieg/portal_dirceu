<?php if (post_password_required()) return; ?>

<section id='comments' class='comments'>
	<?php if (have_comments()): ?>
		<span class='list-comments'>
		    <ul>
		        <li class='comment'>
		        	<h3>
		        		<?php printf(_n("<span>1</span> comentário", "<span>%s</span> comentários", get_comments_number(), 'xicamais'), number_format_i18n(get_comments_number())); ?>
		        	</h3>
		        </li>

				<?php if (get_comment_pages_count() > 1 && get_option('page_comments')): ?>
					<nav role='navigation'>
						<div class='nav-previous'><?php previous_comments_link(__('Comentários antigos', 'xicamais')); ?></div>
						<div class='nav-next'><?php next_comments_link(__('Comentários recentes', 'xicamais')); ?></div>
					</nav>
				<?php endif; ?>

				<?php wp_list_comments(array('callback' => 'xicamais_comment', 'style' => 'ul', 'short_ping' => true, 'avatar_size'=> 76,)); ?>

				<?php if (get_comment_pages_count() > 1 && get_option('page_comments')): ?>
					<nav role='navigation'>
						<div class='nav-previous'><?php previous_comments_link(__('Comentários antigos', 'xicamais')); ?></div>
						<div class='nav-next'><?php next_comments_link(__('Comentários recentes', 'xicamais')); ?></div>
					</nav>
				<?php endif; ?>
			</ul>
		</span>

		<?php if (!comments_open()): ?>
			<p class='no-comments'><?php _e('Comentários não são permitidos.', 'xicamais'); ?></p>
		<?php endif; ?>
	<?php endif; ?>

	<span class='form'>
		<?php
			comment_form(array(
				'comment_notes_before' => '',
				'comment_notes_after' => '',
				'fields' => array(
					'author' => "<div class='section'><label for='author'>Nome</label><span><input id='author' name='author' type='text' aria-required='true'></span></div>",
					'email' => "<div class='section'><label for='email'>Email</label><span><input id='email' name='email' type='text' aria-required='true'></span></div>",
					'url' => "<div class='section'><label for='site'>Site</label><span><input id='site' name='site' type='text' aria-required='true'></span></div>",
				),
				'comment_field' => "<div class='section'><label for='comment'>Comentário</label><span><textarea id='comment' name='comment' cols='45' rows='8' aria-required='true'></textarea></span></div>",
				'label_submit' => "Comentar",
			));
		?>
	</span>
</section>
