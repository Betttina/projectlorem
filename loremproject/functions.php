<?php


if (!defined('ABSPATH')) {
    exit;
}

require_once(get_template_directory() . "/init.php");
require_once(get_template_directory() . '/shortcodes.php');
require_once(get_template_directory() . '/settings.php');

/* Font Awesome icons*/
function enqueue_font_awesome() {
    wp_enqueue_style( 'font-awesome', 'https://use.fontawesome.com/releases/v6.5.1/css/all.css' );
}
add_action( 'wp_enqueue_scripts', 'enqueue_font_awesome' );


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




/* Social media customize */
function custom_theme_settings_page() {
    // Create a section-page in Appearance
    add_theme_page( 'Social Media Settings', 'Social Media Settings', 'manage_options', 'social-media-settings', 'render_social_media_settings_page' );
}
add_action( 'admin_menu', 'custom_theme_settings_page' );



function render_social_media_settings_page() {
    ?>
    <div class="wrap">
        <h1>Social Media Settings</h1>
        <form method="post" action="options.php">
            <?php settings_fields( 'social-media-settings-group' ); ?>
            <?php do_settings_sections( 'social-media-settings-group' ); ?>
            <table class="form-table">
                <tr valign="top">
                    <th scope="row">Facebook Link</th>
                    <td><input type="text" name="facebook_link" value="<?php echo esc_attr( get_option('facebook_link') ); ?>" /></td>
                </tr>
                <tr valign="top">
                    <th scope="row">Twitter Link</th>
                    <td><input type="text" name="twitter_link" value="<?php echo esc_attr( get_option('twitter_link') ); ?>" /></td>
                </tr>
                <tr valign="top">
                    <th scope="row">Linkedin Link</th>
                    <td><input type="text" name="linkedin_link" value="<?php echo esc_attr( get_option('linkedin_link')
                        ); ?>" /></td>
                </tr>
                <tr valign="top">
                    <th scope="row">Pinterest Link</th>
                    <td><input type="text" name="pinterest_link" value="<?php echo esc_attr( get_option('pinterest_link') ); ?>" /></td>
                </tr>
            </table>
            <?php submit_button(); ?>
        </form>
    </div>
    <?php
}

function setup_theme_settings() {
    // setting-fields for social media-links
    register_setting( 'social-media-settings-group', 'facebook_link' );
    register_setting( 'social-media-settings-group', 'twitter_link' );
    register_setting( 'social-media-settings-group', 'linkedin_link' );
    register_setting( 'social-media-settings-group', 'pinterest_link' );
}
add_action( 'admin_init', 'setup_theme_settings' );









