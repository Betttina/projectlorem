<?php

// admin security
if(is_admin() == false){
    return;
}

// Add settings page: Footer.
function loremproject_add_settings(){

    add_submenu_page(
        'options-general.php',
        "Footer", // page-title
        "Footer", // menu-title
        "edit_pages", // behörighet
        "footer", // menu-slug
        "loremproject_add_settings_callback" // func to render content for the site.
    );
}


// Render settings-page
// generate form fields based on registered settings.
function loremproject_add_settings_callback(){

    ?>
    <div class="wrap">
        <h2>Footer-settings</h2>
        <form action="options.php" method="post">
            <?php
            settings_fields("footer");
            do_settings_sections("footer");
            submit_button();
            ?>
        </form>
    </div>
    <?php
}

add_action('admin_menu', 'loremproject_add_settings');


function loremproject_add_settings_init(){

    /* ---- Footer part ---- */

    // Adds a new section to a settings page.
    // Add section to footer-settings
    add_settings_section(
        "footer_general", //section name
        "General settings for footer section", //section title
        "loremproject_add_settings_section_general",
        "footer"
    );

    // ---------- ADRESS FIELD ---------

    // Registers a setting and its data.
    // Register setting for street-address in footer
    register_setting(
        "footer", //option group
        "address_street" // option name
    );

    // Adds a new field to a section of a settings page.
    add_settings_field(
        "address_street", //id
        "Address (street):", // title
        "loremproject_section_setting", //callback
        "footer", //page
        "footer_general", //section
        array(
            "option_name" => "address_street",
            "option_type" => "text"
        )
    );


    // ---------- ADDRESS CITY ---------
    register_setting(
        "footer",
        "address_city"
    );

    add_settings_field(
        "address_city", // id for field
        "City:", // field title
        "loremproject_section_setting",
        "footer", //page
        "footer_general", //section
        array(
            "option_name" => "address_city",
            "option_type" => "text"
        )
    );

    // ---------- ADDRESS zip code and state ---------
    register_setting(
        "footer",
        "address_zip"
    );

    add_settings_field(
        "address_zip", // id for field
        "Zip code and state:", // field title
        "loremproject_section_setting",
        "footer", //page
        "footer_general", //section
        array(
            "option_name" => "address_zip",
            "option_type" => "text"
        )
    );


    // Registrera en ny inställning
    register_setting('footer', 'copyright_year');

    // Lägg till ett nytt fält i den allmänna sektionen
    add_settings_field(
        'copyright_year',
        'Year of copyright:',
        'loremproject_section_setting',
        'footer',
        "footer_general", //section
        array(
            "option_name" => "copyright_year",
            "option_type" => "text"
        )
    );


    // ---------- Phone number ---------
    register_setting(
        "footer",
        "phone_number"
    );

    add_settings_field(
        "phone_number", // id for field
        "Phone number:", // field title
        "loremproject_section_setting",
        "footer", //page
        "footer_general", //section
        array(
            "option_name" => "phone_number",
            "option_type" => "text"
        )
    );


    // ---------- Email ---------
    register_setting(
        "footer",
        "email_address"
    );

    add_settings_field(
        "email_address", // id for field
        "Email address:", // field title
        "loremproject_section_setting",
        "footer", //page
        "footer_general", //section
        array(
            "option_name" => "email_address",
            "option_type" => "text"
        )
    );

}

add_action('admin_init', 'loremproject_add_settings_init');

function loremproject_year_setting_callback(){
    $year = get_option('loremproject_year_setting');
    echo '<input type="text" id="loremproject_year_setting" name="loremproject_year_setting" value="' . esc_attr($year) . '" />';
}

// Ritar ut sektionen "general"s beskrivning
function loremproject_add_settings_section_general(){
    echo "<p>General settings for this part</p>";
}

// generates the HTML code for input fields based on parameters passed via add_settings_field
// Display input
// Sending submitted values to database
function loremproject_section_setting($args){
    $option_name = $args["option_name"];
    $option_type = $args["option_type"];
    $option_value = get_option($args["option_name"]);
    echo '<input type="' . $option_type . '" id="' . $option_name . '" name="' . $option_name . '" value="'. $option_value .'"/>';

}