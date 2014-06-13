<?php

/**

 * The Header for our theme

 *

 * Displays all of the <head> section and everything up till <div id="main">

 *

 * @package WordPress

 * @subpackage Apex_Team

 * @since Apex Team 1.0

 */

?><!DOCTYPE html>

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

    <meta name="viewport" content="width=device-width">

    <title><?php wp_title( '|', true, 'right' ); ?></title>

    <link rel="profile" href="http://gmpg.org/xfn/11">

    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

    <link href='http://fonts.googleapis.com/css?family=Oswald:400,700,300' rel='stylesheet' type='text/css'>
    <link rel="shortcut icon" href="http://apexfantasyleagues.com/wp-content/uploads/2014/03/favicon.ico" type="image/x-icon">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/js/responsiveslides.min.js"></script>



    <!--[if lt IE 9]>

    <script src="<?php echo get_template_directory_uri(); ?>/js/html5.js"></script>

    <![endif]-->

    <?php wp_head(); ?>

</head>



<body <?php body_class(); ?>>
    <?php include_once('analyticstracking.php') ?>

<div class="header">

  <div class="container header-align"> <h1><a class="logo" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" ><img src="<?php echo get_template_directory_uri(); ?>/images/logo.png"  alt="Apex Fantasy Football Money Leagues" /></a> </h1></div>

</div>

<div class="navigation">

  <div class="container header-align">

    <?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'menu' ) ); ?>

  </div>

</div>





