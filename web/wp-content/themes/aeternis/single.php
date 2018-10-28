<?php 

    /*
        Used for single news items  
    */

?>

<?php get_header(); ?>

<section id="main">       
    <?php if (have_posts()): while(have_posts()) : the_post(); ?>
        
        <h1><?php the_title(); ?></h1>
		<p class="sub"><?php the_date(); ?></p>

        <?php the_content(); ?>

    <?php endwhile; endif ?>
</section>

<?php get_footer(); ?>