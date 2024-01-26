


<footer>

    <div class="column">
        <?php echo do_shortcode('[footer_logo]'); ?>
    </div>


    <section class="container">

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




        <div class="column"><span class="category">Contacts</span>
            <?php
            $menu = array(
                'theme_location' => 'footer_contacts',
                'menu_id' => 'footer_contacts',
                'container' => 'contact-container',
                'container_class' => "contacts"
            );

            wp_nav_menu($menu);
            ?>

        </div>



        <div class="column"><span class="category">Social media</span>

            <?php
            $menu = array(
                'theme_location' => 'footer_social',
                'menu_id' => 'footer_social',
                'container' => 'social-container',
                'container_class' => "social-media"
            );

            wp_nav_menu($menu);
            ?>




        </div>



    </section>

</footer>



</body>
</html>


