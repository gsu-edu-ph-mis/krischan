<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "site-content" div.
 *
 * @package WordPress
 * @subpackage Krischan
 * subpackage Krischan 1.0
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
    <?php wp_head(); ?>
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-WM6Q0QXFMP"></script>
    <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'G-WM6Q0QXFMP');
    </script>
</head>

<body <?php body_class(); ?>>
<header class="header" role="banner"style="box-shadow: 0 0 3px #000; z-index: 2; position: relative;">
    <a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'krischan' ); ?></a>
    <div class="container">
        <div class="row">
            <div class="col-md-6 pt-4 pb-4 d-flex justify-content-between align-items-left">
                <div class="logo">
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/logo.jpg" width="100%" alt="GSC"></a>
                </div>
            </div>
            <div class="col-md-6 pt-4 pb-4">
                <div class="row pb-2">
                    <div class="col-md-4"></div>
                    <div class="col-md-8">
                        <a href="#" class="btn btn-primary btn-lg" style="font-size: 18px; text-decoration: none; border-radius: 20px">Submit Paper NOW</a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4"></div>
                    <div class="col-md-8 pt-4 text-right">
                        <form action="<?= home_url() ?>">
                            <div class="form-group d-flex">
                                <input class="form-control" name="s" value="<?= $s ?>" placeholder="Search journals..." type="text" autocomplete="off">
                                <button class="btn btn-sm btn-primary">Search</button>
                            </div>
                        </form>
                    </div>
                    <!-- <div class="col-md-5 text-left">
                        <h2 class="h5">Follow Us </h2>
                        <a href="#"><img src="<?php echo get_template_directory_uri(); ?>/images/fb.jpg" alt="FB"></a>
                        <a href="#"><img src="<?php echo get_template_directory_uri(); ?>/images/ln.jpg" alt="LI"></a>
                        <a href="#"><img src="<?php echo get_template_directory_uri(); ?>/images/tw.jpg" alt="Tw"></a>
                    </div> -->
                </div>
            </div>
        </div>
    </div>
</header>

