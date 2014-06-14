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

    <link rel='stylesheet' type='text/css' href='//maxcdn.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css'>

    <script src='//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js'></script>
    <script src='//maxcdn.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js'></script>

    <!--[if lt IE 9]>
    <script src="<?php echo get_template_directory_uri(); ?>/js/html5.js"></script>
    <![endif]-->

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <?php if (get_theme_mod('portaldirceu_logo')): ?>
        <h1 style="background: url(<?php echo esc_url(get_theme_mod('xicamais_logo')); ?>) no-repeat;">
            <a href="<?php echo esc_url(home_url('/')); ?>" title="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>">
                <?php echo esc_attr(get_bloginfo('name', 'display')); ?>
            </a>
        </h1>
    <?php else: ?>
        <h1 class='branding' style='text-indent: 0'>
            <a href="<?php echo esc_url(home_url('/')); ?>" title="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>">
                <?php echo esc_attr(get_bloginfo('name', 'display')); ?>
            </a>
        </h1>
    <?php endif; ?>

    <?#php wp_nav_menu(array('theme_location' => 'primary', 'menu_class' => 'menu')); ?>
