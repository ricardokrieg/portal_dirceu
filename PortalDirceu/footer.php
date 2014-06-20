            </section>

            <footer>
                <section class='box-ft'>
                    <div class='widgets-container'>
                        <?php dynamic_sidebar('sidebar-rodape'); ?>
                    </div>

                    <section class='box-bottom'>
                        <?php dynamic_sidebar('sidebar-rodape-below'); ?>
                    </section>
                </section>

                <address><?php echo get_theme_option('copyright'); ?></address>
            </footer>
        </section>
    </section>

    <?php wp_footer(); ?>
</body>
</html>
