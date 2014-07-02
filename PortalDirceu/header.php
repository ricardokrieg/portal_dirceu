<!DOCTYPE html>

<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->

<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->

<!--[if !(IE 7) | !(IE 8) ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->

<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name='viewport' content='width=device-width'>

    <title><?php wp_title('|', true, 'right'); ?></title>

    <link rel='profile' href='http://gmpg.org/xfn/11'>
    <link rel='pingback' href="<?php bloginfo('pingback_url'); ?>">
    <link rel='shortcut icon' href="<?php echo get_template_directory_uri(); ?>/favicon.ico" type='image/x-icon'>

    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,400,700' rel='stylesheet' type='text/css'>
    <link rel='stylesheet' type='text/css' href="<?php echo get_template_directory_uri(); ?>/css/bootstrap.min.css">

    <script src='//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js'></script>
    <script src='//maxcdn.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js'></script>

    <script src="<?php echo get_template_directory_uri(); ?>/js/faq.js"></script>
    <!--[if lt IE 9]>
    <script src="<?php echo get_template_directory_uri(); ?>/js/html5.js"></script>
    <![endif]-->

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <header class='header'>
        <div class='container with-padding'>
            <h1 class='branding'>
                <a href="<?php echo esc_url(home_url('/')); ?>" title="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>">
                    <?php if (get_theme_mod('portaldirceu_logo')): ?>
                        <img src="<?php echo esc_url(get_theme_mod('portaldirceu_logo')); ?>" />
                    <?php else: ?>
                        <img src="<?php echo get_bloginfo('template_directory') . '/img/logo.png' ?>" />
                    <?php endif; ?>
                </a>
            </h1>

            <span class='logo-bg'></span>

            <button type='button' class='navbar-toggle collapsed' data-toggle='collapse' data-target='.navbar-collapse'>
                <span class='sr-only'>Menu</span>
                <span class='icon-bar'></span>
                <span class='icon-bar'></span>
                <span class='icon-bar'></span>
            </button>

            <div class='navbar-collapse collapse'>
                <?php wp_nav_menu(array('theme_location' => 'principal', 'menu_class' => 'list-inline', 'items_wrap' => '<span class="menu-left-bg"></span><ul id="%1$s" class="%2$s">%3$s</ul><span class="menu-right-bg"></span>')); ?>
            </div>
        </div>
    </header>
