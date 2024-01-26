<?php


if (!defined('ABSPATH')) {
    exit;
}

require_once(get_template_directory() . "/init.php");


/* Upload logo in Apparance -> Customizer */
function theme_customizer_settings($wp_customize) {
    $wp_customize->add_section('theme_logo_section', array(
        'title' => 'Logo',
        'priority' => 30,
    ));

    // Lägg till inställning för logo
    $wp_customize->add_setting('theme_logo');
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'theme_logo', array(
        'label' => 'Upload a logo :) ',
        'section' => 'theme_logo_section',
        'settings' => 'theme_logo',
    )));
}
add_action('customize_register', 'theme_customizer_settings');

function footer_logo_shortcode() {
    // get URL till loggan från tematillval
    $image_url = get_theme_mod('theme_logo');

    // create HTML for logo
    $logo_html = '<img src="' . esc_url($image_url) . '" alt="Logga">';

    return $logo_html;
}
add_shortcode('footer_logo', 'footer_logo_shortcode');
