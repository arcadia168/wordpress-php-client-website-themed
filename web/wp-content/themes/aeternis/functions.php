<?php 

	/*
		This file lets us add custom functionality
		to our theme and keep it all in one place.
		Anything related to customising the WP 
		Admin site should go here.
	*/


	/******************************************
	*				  MENUS 				  *
	*******************************************/
	
	// Tell WP we support custom menus
	add_theme_support( 'menus' );


	// Create a block of code that WP will run
	function register_menu() {
		// Register a menu with a slug and title
		register_nav_menus(array( 'primary' => 'Primary Menu' ));
	}

	// Ask WP to run the above function when the 
	// 'init' event fires - think of this like
	// jQuery events, WP has a bunch of hooks we
	// can use to customise behaviour
	add_action( 'init', 'register_menu' );




	// WP likes to add the admin bar to the main site 
	// when you're logged in, but this makes debugging
	// hard, so we simply remove it here
	add_filter( 'show_admin_bar', '__return_false' );



	/*
		We want to scan page content for '<!--SLIDER-->'
		and replace it with the actual content. Here we
		tell WP to call our custom function, where we
		search for the comment and replace it with the
		slider HTML.
	*/
	function process_content( $content ){
		
		$slider_html =  '<ul id="slider" class="slider">';
		$slider_html .= '<li class="active"><img src="'. get_bloginfo('template_url') .'/images/slider-1.jpg" alt="Slider" /></li>';
				$slider_html .= '<li><img src="'. get_bloginfo('template_url') .'/images/slider-2.jpg" alt="Slider" /></li>';
/*
		$slider_html .= '<li><img src="'. get_bloginfo('template_url') .'/images/slider-2.jpg" alt="Slider" /></li>';
		$slider_html .= '<li><img src="'. get_bloginfo('template_url') .'/images/slider-4.jpg" alt="Slider" /></li>';
*/
		$slider_html .= '</ul>';
		
		return str_replace('<!--SLIDER-->', $slider_html , $content);
		
	} // process_content


	// Tell WP about it
	add_filter( 'the_content', 'process_content' );

?>