<?php 
	
	/*
		This is pulled in by the get_footer()
		function and is at the bottom of every
		page.

		wp_footer is another hook like wp_head
	*/
	
?>
            <footer class="wrapper">
                <p>&copy; Aeternis Energy Limited <?= gmdate('Y'); ?>. | <a href="/terms/">Terms &amp; Conditions</a></p>
            </footer>  
        </div> 
       
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
        <script src="<?php bloginfo('template_url'); ?>/jquery.anythingslider.min.js"></script>
        <script>
        	$(function(){
	        	
	        	// Enable the slider
	        	$('.slider').anythingSlider({
  // Appearance
  mode: 'fade',
  resizeContents      : true,      // If true, solitary images/objects in the panel will expand to fit the viewport
/*   easing              : "fade",   // Anything other than "linear" or "swing" requires the easing plugin or jQuery UI */

  buildArrows         : false,      // If true, builds the forwards and backwards buttons
  buildNavigation     : false,      // If true, builds a list of anchor links to link to each panel
  buildStartStop      : false,      // If true, builds the start/stop button



  // Function
  enableArrows        : false,      // if false, arrows will be visible, but not clickable.
  enableNavigation    : false,      // if false, navigation links will still be visible, but not clickable.
  enableStartStop     : false,      // if false, the play/stop button will still be visible, but not clickable. Previously "enablePlay"

  // Slideshow options
  autoPlay            : true,     // If true, the slideshow will start running; replaces "startStopped" option
  pauseOnHover        : false,      // If true & the slideshow is active, the slideshow will pause on hover

  hashTags: false,

  // Times
  delay               : 5000,      // How long between slideshow transitions in AutoPlay mode (in milliseconds)
  
	        	});
	        	
        	});		
        </script>
        <?php wp_footer(); ?>
    </body>
</html>