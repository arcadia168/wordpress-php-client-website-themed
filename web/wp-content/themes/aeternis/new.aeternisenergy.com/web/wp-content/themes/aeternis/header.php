<!DOCTYPE html>
<html id="homepage">
    <head>
        <?php 
            // The title function gets a nice page
            // title based on what we're viewing

            // The bloginfo function allows us to
            // access all kinds of data, here we
            // use it to get the URL of our stylesheet.
            // Note: By default it echos its output
        ?>

        <title><?php wp_title('-', true, 'right'); ?> Aeternis Energy</title>
        <link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_url'); ?>?<?= microtime(); ?>">
        <link href='http://fonts.googleapis.com/css?family=Cabin:400,700,400italic|Open+Sans:600italic,400' rel='stylesheet' type='text/css'>        
        <?php 
        
            // This is used by plugins and WP itself
            // as a hook so it can add things to the
            // site
            wp_head();

        ?>
    </head>
    <body>
        <header id="top">        
            <?php 
                // Here we use bloginfo to get the URL
                // to the theme
            ?>            
            <div class="bar">
	            <a href="/"><img src="<?php bloginfo('template_url'); ?>/images/header-logo.jpg" alt="Aeternis Energy"></a>
            </div><!-- .bar -->
            
            <?php 

                // Fetch the menu we have stored, and wrap
                // the <ul> in a <nav>
                wp_nav_menu( array( 
                    'theme_location' => 'primary',
                    'container' => 'nav',
                ) ); 
            ?>

        </header>

        <div id="wrapper">