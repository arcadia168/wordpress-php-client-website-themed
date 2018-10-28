<?php 

    /*
        Check out index.php for an explaination
        of the code below!
    */

?>

<?php get_header(); ?>

<section id="main">       
    <?php if (have_posts()): while(have_posts()) : the_post(); ?>
        
        <h1><?php the_title(); ?></h1>

        <?php the_content(); ?>

    <?php endwhile; endif ?>
</section>

<?php get_footer(); ?>