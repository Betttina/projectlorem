<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <title><?= get_option("blogname");?></title>

    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">

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

    <div class="column">
        <?php echo do_shortcode('[hero_image]'); ?>
    </div>

<?php
$image_url = 'http://wordpress.test/wp-content/uploads/2024/01/f2-1.png';
$image_id = attachment_url_to_postid($image_url);

if ($image_id) {
    echo $image_id;// Du har nu bildens ID ($image_id) att använda i dina shortcodes eller andra funktioner.
} else {
    // Om ID inte hittades, gör något annat eller visa ett felmeddelande.
}
?>




