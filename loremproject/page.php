

<?php get_header(); ?>


<?php
while (have_posts()) : the_post(); // Loopa genom inlägg/sidor
?>
<div class="custom-content">
    <h1><?php the_title(); ?></h1>
    <div class="content">
        <?php the_content(); ?>
    </div>
</div>
<?php endwhile;


get_footer(); ?>

