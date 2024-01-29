<?php
/* Theme: loremproject */


/* ---- HERO ----- */
// Shortcode för att visa hero-bilden
function hero_image_shortcode() {
    // hämta url från wp
    $image_url = get_theme_mod('hero_image');

    // kolla om det finns en giltig länk
    if ($image_url) {
        // Skapa HTML-koden för bilden
        $image_html = '<img src="' . esc_url($image_url) . '" alt="Hero Image" class="hero-image">';

        return $image_html;
    } else {
        // error message
        return 'No image has been chosen in the editor. :/ ';
    }
}

// Reg shortcode.
add_shortcode('hero_image', 'hero_image_shortcode');





/* ------Main focus section --------- */
function loremproject_focus_column_shortcode($atts = [], $content = null) {
    // Använder 'column' attributet för att bestämma kolumnnumret
    $column_num = isset($atts['column']) ? $atts['column'] : '1';
    $content = get_theme_mod("loremproject_focus_column_{$column_num}_content");

    return '<div class="focus-column">' . wp_kses_post($content) . '</div>';
}

for ($i = 1; $i <= 4; $i++) {
    add_shortcode("loremproject_focus_column_$i", function($atts, $content = null) use ($i) {
        return loremproject_focus_column_shortcode(['column' => $i], $content);
    });
}


/* knappar */
function my_custom_button_shortcode($atts) {
    $atts = shortcode_atts(
        array(
            'number' => '1',
            'color' => 'white',
            'class' => '',
        ),
        $atts,
        'custom_button'
    );

    $button_text = get_theme_mod('mytheme_button_' . $atts['number'] . '_text', 'Knapp ' . $atts['number']);
    $button_url = '#'; // url

    return '<a href="' . esc_url($button_url) . '" class="custom-button ' . esc_attr($atts['class']) . '" style="background-color:' . esc_attr($atts['color']) . ';">' . esc_html($button_text) . '   <span>&#8594;</span></a>';
}
add_shortcode('custom_button', 'my_custom_button_shortcode');


/* --- ABOUT SECTION SHORTCODES ----- */

// Grey div
function about_section_shortcode($atts, $content = null) {
    return '<div class="about-section">' . do_shortcode($content) . '</div>';
}
add_shortcode('about_section', 'about_section_shortcode');

// heading
function about_heading_shortcode($atts, $content = null) {
    return '<h2 class="about-heading">' . esc_html($content) . '</h2>';
}
add_shortcode('about_heading', 'about_heading_shortcode');

// text about
function about_text_shortcode($atts, $content = null) {
    return '<p class="about-text">' . wpautop(esc_html($content)) . '</p>';
}
add_shortcode('about_text', 'about_text_shortcode');


// --------------- About-section images ------- //
function about_image_shortcode($atts) {
    $atts = shortcode_atts(array(
        'id' => '',
        'width' => '',
        'height' => '',
        'alt' => '',
    ), $atts);

    if (empty($atts['id'])) {
        return ''; // if no ID is set, return null.
    }

    $image_html = wp_get_attachment_image($atts['id'], array($atts['width'], $atts['height']), false, array('alt' => esc_attr($atts['alt'])));

    return $image_html;
}

add_shortcode('about_image', 'about_image_shortcode');


function mytheme_our_projects_shortcode() {
    $output = '<div class="our-projects">';

    // firstrow
    $output .= '<div class="projects-row first-row">';
    for ($i = 1; $i <= 2; $i++) {
        $image_url = get_theme_mod("mytheme_our_projects_image_$i", '');
        if ($image_url) {
            $output .= '<div class="project-image">';
            $output .= '<img src="' . esc_url($image_url) . '" alt="Project Image ' . $i . '">';
            $output .= '</div>';
        }
    }
    $output .= '</div>'; // close first row

    // Andra raden med tre bilder
    $output .= '<div class="projects-row second-row">';
    for ($i = 3; $i <= 5; $i++) {
        $image_url = get_theme_mod("mytheme_our_projects_image_$i", '');
        if ($image_url) {
            $output .= '<div class="project-image">';
            $output .= '<img src="' . esc_url($image_url) . '" alt="Project Image ' . $i . '">';
            $output .= '</div>';
        }
    }
    $output .= '</div>'; // Stänger andra raden

    $output .= '</div>'; // Stänger .our-projects
    return $output;
}
add_shortcode('our_projects', 'mytheme_our_projects_shortcode');

