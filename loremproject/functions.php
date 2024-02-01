<?php


if (!defined('ABSPATH')) {
    exit;
}

require_once(get_template_directory() . "/init.php");
require_once(get_template_directory() . '/shortcodes.php');


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
        'type' => 'option',
    ));

    // kontroll för att hantera hero img
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'hero_image', array(
        // set section name
        'label' => __('Hero Image', 'loremproject'),
        // kopplar kontrollen till hero_section
        'section' => 'hero_section',
        'settings' => 'hero_image',
    )));

    // Edit heading for hero in customizer
    $wp_customize->add_setting('hero_heading', array(
        'default' => 'Project Lorum',
        'transport' => 'refresh',
    ));

    $wp_customize->add_control('hero_heading', array(
        'label' => __('Hero Heading', 'loremproject'),
        'section' => 'hero_section',
        'type' => 'text',
    ));

    // edit button-text
    $wp_customize->add_setting('hero_button_text', array(
        'default' => 'View project →',
        'transport' => 'refresh',
    ));

    $wp_customize->add_control('hero_button_text', array(
        'label' => __('Hero Button Text', 'loremproject'),
        'section' => 'hero_section',
        'type' => 'text',
    ));
}
// action hook
// händelse: customize_register (reggar anpassning&kontroller i customize-panelen)
// som triggar funktionen för hero img:
add_action('customize_register', 'theme_customizer_settings_hero');


function custom_image_sizes() {
    add_image_size('custom_hero_size', 770, 829, true);
}
add_action('after_setup_theme', 'custom_image_sizes');



/* ---- ABOUT SECTION ------*/
function about_section_customizer_settings($wp_customize) {
    // add section for about section in customizer
    $wp_customize->add_section('about_section', array(
        'title' => __('About Section', 'loremproject'),
        'priority' => 30,
    ));

    // add settings for images
    $wp_customize->add_setting('about_image_1');
    $wp_customize->add_setting('about_image_2');
    $wp_customize->add_setting('about_image_3');

    // add control
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





/* customizer knappar */
function loremproject_customize_register($wp_customize) {
    // add section
    // Customizer add text-content in button
    $wp_customize->add_section("loremproject_buttons_section", array(
        'title'    => __('Anpassade Knappar', 'loremproject'),
        'priority' => 30,
    ));

// Add settings for button 1.
    $wp_customize->add_setting('lorem_button_1_text', array(
        'default'   => 'Knapp 1',
        'transport' => 'refresh',
    ));

// add control for button 1
    $wp_customize->add_control('lorem_button_1_text', array(
        'label'   => __('Text för Knapp 1', 'loremproject'),
        'section' => 'loremproject_buttons_section',
        'type'    => 'text',
    ));



// new section "Our Projects"
    $wp_customize->add_section('lorem_our_projects_section', array(
        'title'    => __('Our Projects', 'mytheme'),
        'priority' => 30,
    ));

// add settings for every image
    for ($i = 1; $i <= 5; $i++) {
        $wp_customize->add_setting("lorem_our_projects_image_$i", array(
            'default'   => '',
            'transport' => 'refresh',
        ));

        $wp_customize->add_control(new WP_Customize_Image_Control(
            $wp_customize,
            "lorem_our_projects_image_$i",
            array(
                'label'    => __("Bild $i", 'mytheme'),
                'section'  => 'lorem_our_projects_section',
                'settings' => "lorem_our_projects_image_$i",
            )
        ));
    }

}

add_action('customize_register', 'loremproject_customize_register');












