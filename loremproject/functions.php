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
    // skapar en sektion för HERO i customize
    $wp_customize->add_section('hero_section', array(
        'title' => __('Hero Section', 'loremproject'),
        'priority' => 30,
    ));

    // skapar setting för hero_image, sätts till tom sträng
    // överföring av inställningen = sidan uppdateras när bilden är uppladdad
    $wp_customize->add_setting('hero_image', array(
        'default' => '',
        'transport' => 'refresh',
    ));

    // kontroll för att hantera img
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'hero_image', array(
        // beskrivande etikett
        'label' => __('Hero Image', 'loremproject'),
        // kopplar kontrollen till hero_section
        'section' => 'hero_section',
    )));
}
// action hook
// händelse: customize_register (reggar anpassning&kontroller i customize-panelen)
// som triggar funktionen för hero img:
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

/* ---- ABOUT SECTION ------*/
function about_section_customizer_settings($wp_customize) {
    // Skapa en ny sektion för About-sektionen
    $wp_customize->add_section('about_section', array(
        'title' => __('About Section', 'loremproject'),
        'priority' => 30,
    ));

    // Lägg till inställningar för bilderna
    $wp_customize->add_setting('about_image_1');
    $wp_customize->add_setting('about_image_2');
    $wp_customize->add_setting('about_image_3');

    // Lägg till kontroller för bildvalen
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'about_image_1', array(
        'label' => __('About Image 1', 'loremproject'),
        'section' => 'about_section',
    )));

    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'about_image_2', array(
        'label' => __('About Image 2', 'loremproject'),
        'section' => 'about_section',
    )));

    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'about_image_3', array(
        'label' => __('About Image 3', 'loremproject'),
        'section' => 'about_section',
    )));
}

add_action('customize_register', 'about_section_customizer_settings');


// Shortcode för About-sektionens grå div
function about_section_shortcode($atts, $content = null) {
    return '<div class="about-section">' . do_shortcode($content) . '</div>';
}
add_shortcode('about_section', 'about_section_shortcode');

// Shortcode för rubriken i About-sektionen
function about_heading_shortcode($atts, $content = null) {
    return '<h2 class="about-heading">' . esc_html($content) . '</h2>';
}
add_shortcode('about_heading', 'about_heading_shortcode');

// Shortcode för texten i About-sektionen
function about_text_shortcode($atts, $content = null) {
    return '<p class="about-text">' . wpautop(esc_html($content)) . '</p>';
}
add_shortcode('about_text', 'about_text_shortcode');

// Shortcode för bilderna i About-sektionen
function about_image_shortcode($atts) {
    $atts = shortcode_atts(array(
        'id' => '',
        'width' => '',
        'height' => '',
        'alt' => '',
    ), $atts);

    if (empty($atts['id'])) {
        return ''; // Om ID inte är satt, returnera inget
    }

    $image_html = wp_get_attachment_image($atts['id'], array($atts['width'], $atts['height']), false, array('alt' => esc_attr($atts['alt'])));

    return $image_html;
}

add_shortcode('about_image', 'about_image_shortcode');

