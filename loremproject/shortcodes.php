<?php
/* Theme: loremproject */


/* ---- HERO ----- */
// Shortcode för att visa hero-bilden med din egendefinierade storlek
// Shortcode för att visa hero-bilden
function hero_image_shortcode() {
    // Hämta bild-URL från WordPress-redigeringspanelen
    $image_url = get_theme_mod('hero_image');

    // Kolla om det finns en giltig bild-URL
    if ($image_url) {
        // Skapa HTML-koden för bilden
        $image_html = '<img src="' . esc_url($image_url) . '" alt="Hero Image" class="hero-image">';

        return $image_html;
    } else {
        // Om ingen bild har valts i redigeringspanelen, returnera ingenting eller ett felmeddelande
        return 'Ingen bild har valts i redigeringspanelen.';
    }
}

// Reg shortcode.
add_shortcode('hero_image', 'hero_image_shortcode');


// customize-able heading "Project Lorum"
function custom_heading_shortcode($atts, $content = null) {
    // Extrahera attribut om det finns
    extract(shortcode_atts(array(
        'text' => 'Project Lorum', // Standardtext om ingen text anges
    ), $atts));

    // Använd wp_kses_post för att tillåta enkel formatering av text
    $content = wp_kses_post($content);

    // Visa den redigerbara texten med en redigeringslänk
    return '<div class="custom-heading">
                <h1>' . esc_html($text) . '</h1>
                <div class="edit-link">' . $content . '</div>
            </div>';
}
add_shortcode('custom_heading', 'custom_heading_shortcode');




