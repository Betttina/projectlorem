<?php


if (!defined('ABSPATH')) {
    exit;
}

require_once(get_template_directory() . "/init.php");


/* Upload logo in Appearance -> Customizer,  HOOK */
function theme_customizer_settings_logo($wp_customize) {
    $wp_customize->add_section('theme_logo_section', array(
        'title' => 'Logo',
        'priority' => 30,
    ));

    // add settings to logo
    $wp_customize->add_setting('theme_logo');
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'theme_logo', array(
        'label' => 'Upload a logo :) ',
        'section' => 'theme_logo_section',
        'settings' => 'theme_logo',
    )));
}
add_action('customize_register', 'theme_customizer_settings_logo');

function footer_logo_shortcode() {
    // get URL for logo from tematillval
    $image_url = get_theme_mod('theme_logo');

    // create HTML for logo
    $logo_html = '<img src="' . esc_url($image_url) . '" alt="Logga">';

    return $logo_html;
}
add_shortcode('footer_logo', 'footer_logo_shortcode');


/* --- Hero_img settings (customize) hook ---- */
function theme_customizer_settings_hero($wp_customize) {
    $wp_customize->add_section('hero_section', array(
        'title' => __('Hero Section', 'loremproject'),
        'priority' => 30,
    ));

    $wp_customize->add_setting('hero_image', array(
        'default' => '',
        'transport' => 'refresh',
    ));

    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'hero_image', array(
        'label' => __('Hero Image', 'loremproject'),
        'section' => 'hero_section',
    )));
}

add_action('customize_register', 'theme_customizer_settings_hero');


/* ---- hero img shortcode ---- */
function hero_image_shortcode($atts) {
    $hero_image = get_theme_mod('hero_image');

    if (!empty($hero_image)) {
        return '<img src="' . esc_url($hero_image) . '" alt="Hero Image" class="hero_image">';
    } else {
        return ''; // no img chosen.
    }
}
add_shortcode('hero_image', 'hero_image_shortcode');
