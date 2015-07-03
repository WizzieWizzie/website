<!DOCTYPE HTML>
<!--[if lt IE 7]><html class="no-js lt-ie9 lt-ie8 lt-ie7"><![endif]-->
<!--[if IE 7]><html class="no-js lt-ie9 lt-ie8"><![endif]-->
<!--[if IE 8]><html class="no-js lt-ie9"><![endif]-->
<!--[if gt IE 8]><html lang="en-GB" class="no-js"><![endif]-->
<html>

<head>

    <meta charset="<?php bloginfo('charset'); ?>" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">

    <title><?php wp_title(); ?></title>

    <!-- Vanilla -->
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">
    <meta name="google-site-verification" content="" />

    <!-- Varibles -->
    <script type="text/javascript">var ajaxurl = '<?php echo admin_url("admin-ajax.php"); ?>';</script>

    <!-- Author -->
    <link rel="author" href="<?php echo get_template_directory_uri(); ?>/humans.txt">

    <?php wizzie_wp_header(); ?>

</head>

<body <?php body_class(); ?>>

    <header>

        <div class="head-inner">

            <a href="<?php echo bloginfo('home'); ?>">
                <img src="<?php echo get_template_directory_uri(); ?>/images/wizzie-logo-small.png" class="type-marque vcentre" alt="Logo">
            </a>

            <nav class="main vcentre cf">
                <?php wizzie_navigation(); ?>
                <ul class="social-share">
                    <li class="facebook">
                        <a href="//facebook.com" target="_blank">Facebook</a>
                    </li>
                    <li  class="twitter">
                        <a href="//twitter.com/thewizziewizzie" target="_blank">Twitter</a>
                    </li>
                </ul>
            </nav>

            <a href="javascript:void(0)" class="device-menu vcentre no-copy">Menu</a>

        </div>

    </header>

    <div class="vp-wrapper">

        <main role="content">