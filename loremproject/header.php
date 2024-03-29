<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <title><?= get_option("blogname");?></title>

    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha384-UIsk3w0Y1fHj4WVPrGbtjYmLYn6TW8XtdaSOrk2Fv6EBKqLE6+v6p2K0BzC1yoHd" crossorigin="anonymous">

    <?php wp_head();?>
</head>
<body>
<header>
    <div class="column-50">
        <a href="/">
            <img src="<?= get_template_directory_uri() . '/assets/images/logo.png' ?>" class="logo"  alt="logo"/>
        </a>
    </div>



    <div class="column-50">
        <?php
        $menu = array(
            'theme_location' => 'main_menu',
            'menu_id'        => 'main-menu',
            'container'      => 'div',
            'container_class'=> 'main-navigation',
            'menu_class'     => 'menu-items',
        );

        wp_nav_menu($menu)
        ?>
    </div>

</header>

<main class="content">

    <!--<div class="column">
        <?php /*echo do_shortcode('[hero_image]'); */?>
    </div>-->






