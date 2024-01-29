<?php

require_once("settings.php");
require_once("shortcodes.php");

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
        'footer_info' => 'footer_info',
        'footer_contacts' => 'footer_contacts',
        'footer_social' => 'footer_social'


    );

    register_nav_menus($menu);

}

add_action('after_setup_theme', 'lorem_init');




// shortcode for arrow buttons

function linkbutton_function( $attr, $content = null ) {

    $attr = shortcode_atts(
        array(
            "color" => "white"
        ),
        $attr,
        "linkbutton"
    );

    $class = ( $attr['color'] === 'white' ) ? 'arrow left' : 'arrow right';

    return '<button type="button" class="' . esc_attr( $class ) . '">' . do_shortcode( $content ) . '</button>';
}
add_shortcode('linkbutton', 'linkbutton_function');
