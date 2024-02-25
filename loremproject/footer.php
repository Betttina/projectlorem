

<form>
    <div class="input-wrapper">
        <input type="text" class="input-field" placeholder="Name">
    </div>
    <div class="input-wrapper star-container">
        <input type="text" class="input-field" placeholder="Phone Number">
    </div>
    <div class="input-wrapper star-container">
        <input type="text" class="input-field" placeholder="E-mail">
    </div>
    <div class="input-wrapper">
        <input type="text" class="input-field" placeholder="Interested In">
    </div>
    <div class="input-wrapper star-container">
        <textarea class="input-field input-tall" placeholder="Message"></textarea>
    </div>
</form>



</main>
<footer>




    <section class="container">

        <div class="column">
            <div class="whitelogodiv">
                <?php echo do_shortcode('[footer_logo]'); ?>
            </div>
        </div>

        <div class="column-2">
        <div class="column"><span class="category">Information</span>
            <?php
            $menu = array(
                'theme_location' => 'footer_info',
                'menu_id' => 'footer_info',
                'container' => 'nav-container',
                'container_class' => "menu"
            );

            wp_nav_menu($menu);
            ?>
        </div>
        </div>




        <div class="column-3">
            <div class="column-icons">
                <i class="fa-solid fa-location-dot"></i>
                <i class="fa-solid fa-phone"></i>
                <i class="fa-regular fa-envelope"></i>
            </div>


            <div class="column"><span class="category">Contacts</span>



            <?php if(!empty(get_option("address_street"))) : ?>
                <div class="address_field">

                    <p> <?= get_option("address_street"); ?> <br>
                        <?= get_option("address_city"); ?>
                        <?= get_option("address_zip"); ?> <br></p>
                </div>

                <div>
                <p> <?= get_option("phone_number"); ?> </p>
                </div>

                <div>
                    <p> <?= get_option("email_address"); ?> </p>
                </div>
            <?php endif;?>

            </div>
        </div>




        <div class="column"><span class="category">Social media</span>

            <div class="social-icons">
                <?php
                // Hämta sociala medie-länkar från temainställningarna
                // define variables
                $facebook_link = get_option('facebook_link');
                $twitter_link = get_option('twitter_link');
                $linkedin_link = get_option('linkedin_link');
                $pinterest_link = get_option('pinterest_link');

                // Visa ikoner och länkar om de är inställda
                if ($facebook_link) {
                    echo '<a href="' . esc_url($facebook_link) . '" target="_blank"><i class="fab fa-facebook"></i></a>';
                }
                if ($twitter_link) {
                    echo '<a href="' . esc_url($twitter_link) . '" target="_blank"><i class="fab fa-twitter"></i></a>';
                }
                if ($linkedin_link) {
                    echo '<a href="' . esc_url($linkedin_link) . '" target="_blank"><i class="fa-brands fa-linkedin"></i></a>';
                }
                if ($pinterest_link) {
                    echo '<a href="' . esc_url($pinterest_link) . '" target="_blank"><i class="fa-brands fa-pinterest-p"></i></a>';
                }

                ?>
            </div>



        </div>


    </section>

</footer>



</body>
</html>


