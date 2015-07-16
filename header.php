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

    <!-- Icons -->
    <link rel="apple-touch-icon" sizes="57x57" href="<?php echo get_template_directory_uri(); ?>/images/icons/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="<?php echo get_template_directory_uri(); ?>/images/icons/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="<?php echo get_template_directory_uri(); ?>/images/icons/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="<?php echo get_template_directory_uri(); ?>/images/icons/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="<?php echo get_template_directory_uri(); ?>/images/icons/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="<?php echo get_template_directory_uri(); ?>/images/icons/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="<?php echo get_template_directory_uri(); ?>/images/icons/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="<?php echo get_template_directory_uri(); ?>/images/icons/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo get_template_directory_uri(); ?>/images/icons/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="<?php echo get_template_directory_uri(); ?>/images/icons/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo get_template_directory_uri(); ?>/images/icons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="<?php echo get_template_directory_uri(); ?>/images/icons/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo get_template_directory_uri(); ?>/images/icons/favicon-16x16.png">
    <link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico" type="image/x-icon">
    <link rel="icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico" type="image/x-icon">
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
                <img src="<?php echo get_template_directory_uri(); ?>/images/wizzie-logo@2x.png" class="type-marque vcentre" alt="Logo">
            </a>

            <nav class="main vcentre cf">
                <ul>
                    <?php wizzie_navigation(); ?>
                    <li><a href="mailto:contact@wizziewizzie.org">Contact</a></li>
                </ul>
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