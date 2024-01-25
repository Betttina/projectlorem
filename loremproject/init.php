<?php



function loremproject_enqueue(){
    $theme_directory = get_template_directory_uri();
    wp_enqueue_style("loremtheme", $theme_directory . "/style.css");
    wp_enqueue_script("app", $theme_directory . "/app.js");

}

add_action('wp_enqueue_scripts', 'loremproject_enqueue');

// regga menyer
function lorem_init(){

    $menu = array(
        'main_menu' => 'main_menu',

    );

    register_nav_menus($menu);

}

add_action('after_setup_theme', 'lorem_init');