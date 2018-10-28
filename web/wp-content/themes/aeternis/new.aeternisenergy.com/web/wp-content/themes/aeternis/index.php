<?php 

    /*
    	Template name: Home
    
        This is kind of a mega-page, in that WP will
        default to it when it doesn't know what to do.
        You could actually make an entire theme with 
        just an index.php and style.css file - but
        that's a bad idea.

        Check out this URL for info on how WP decides
        what file to use for each page: https://yoast.com/wordpress-theme-anatomy/


        THE WORDPRESS LOOP
        This is the core of Wordpress, looks like a lot
        at first, but it's tasty. Every page can have
        a series of posts associated with it as WP
        was initally just for blogging. But the same
        still applies for simple pages. Every time a page
        loads we have access to these posts, and we do
        the following:

            1. if( have_posts() ):
            2.   while( have_posts() ):
            3.     the_post();
            4.     ...
            5.   endwhile;
            6. endif;

        Line 1 asks WP if we have any posts to display, 
        we could add an elseif and show an unhappy face if
        we don't. Once we're sure we do, we say "while
        I have more posts to show, iterate over the list
        of posts" on line 2:

            func have_posts():
              return current_post_index < total_posts

        That's essentially how the have_posts() function
        looks, where the 2 variables are WP magic.

        Line 3 then sets up some handy functions. You'll 
        notice things like the_title() and the_content()
        - those essentially say:

            func the_title():
              return current_post->title

        So we have to call the_post() to set up the handy
        current_post variable.

        So the recap: we check we have posts, then loop
        over each post. On this site we generally only
        have 1 post, but we still check to be sure!

        That's a very basic intro, there's all kinds of 
        funky stuff we can do. Check out the twentytwelve
        theme to have a brain-melting look at the power
        of that loop! 

    */


?>

<?php 

    // Pull in the header.php file
    get_header(); 

?>
<section id="main">       
    <?php if (have_posts()): while(have_posts()) : the_post(); ?>
        
        <header>
        	<h1 class="centre"><?php the_title(); ?></h1>
        </header>

        <?php the_content(); ?>
        
        <?php get_sidebar(); ?>

    <?php endwhile; endif ?>
</section>

 <?php 

    // Pull in the footer.php file
    get_footer(); 
    
?>