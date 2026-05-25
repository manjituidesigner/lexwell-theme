<?php get_header(); ?>
<main id="main-content" class="container" style="padding-top: 150px; padding-bottom: 80px;">
    <?php
    if ( have_posts() ) :
        while ( have_posts() ) : the_post();
            echo '<h1>' . get_the_title() . '</h1>';
            the_content();
        endwhile;
    endif;
    ?>
</main>
<?php get_footer(); ?>