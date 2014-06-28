    <div class='container'>
        <div class='footer-shadow'>
            <div class='logo-footer'></div>
        </div>

        <?php
            $menu_wrap = '<ul id="%1$s" class="%2$s">%3$s';
            if (function_exists('cn_social_icon')):
                $menu_wrap .= "<div class='social-icons'>" .cn_social_icon(). "</div>";
            endif;
            $menu_wrap .= '</ul>'
        ?>

        <footer class='footer'>
            <?php wp_nav_menu(array(
                'theme_location' => 'rodape',
                'menu_class' => 'list-inline',
                'items_wrap' => $menu_wrap,
            )); ?>
        </footer>

        <?php wp_footer(); ?>
    </div>
</body>
</html>
