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
		
		$slides = array(
			'<li><img src="'. get_bloginfo('template_url') .'/images/slider-1.jpg" alt="Slider" /></li>',
			'<li><img src="'. get_bloginfo('template_url') .'/images/slider-2.jpg" alt="Slider" /></li>',
			'<li><img src="'. get_bloginfo('template_url') .'/images/slider-3.jpg" alt="Slider" /></li>',
			'<li><img src="'. get_bloginfo('template_url') .'/images/slider-4.jpg" alt="Slider" /></li>',
			'<li><img src="'. get_bloginfo('template_url') .'/images/slider-5.jpg" alt="Slider" /></li>',
		);
		
		// Shuffle it to keep it fresh
		shuffle( $slides );
		
		// Add the active class
		$slides[0] = str_replace('<li>', '<li class="active">', $slides[0]);
		
		// Create the HTML
		$slider_html =  '<ul id="slider" class="slider">';
		
		foreach( $slides as $slide ){
			$slider_html .= $slide;
		} // foreach
		
		$slider_html .= '</ul>';
		
		return str_replace('<!--SLIDER-->', $slider_html , $content);
		
	} // process_content


	// Tell WP about it
	add_filter( 'the_content', 'process_content' );





	$meta_boxes =
			array(
				"source" => array(
					"name" => "source",
					"type" => "text",
					"std" => "",
					"title" => "Source",
					"description" => "The source of this article"),
				);
		
		function meta_boxes() {
			global $post, $meta_boxes;
			$counter = 0;
			echo'
				<table class="widefat" cellspacing="0" id="inactive-plugins-table">
					<tbody class="plugins">';
					foreach($meta_boxes as $meta_box) {
						$meta_box_value = get_post_meta($post->ID, $pre.'_value', true);
						if($meta_box_value == "")
							$meta_box_value = $meta_box['std'];
						if($meta_box['type']=='text'){
							echo'<tr style="background-color:';if($counter%2){ echo "#efefef"; }; echo '">
									<td width="100" align="center">';		
										echo'<input type="hidden" name="'.$meta_box['name'].'_noncename" id="'.$meta_box['name'].'_noncename" value="'.wp_create_nonce( plugin_basename(__FILE__) ).'" />';
										echo'<h4 style="width: 125px; font-size:14px; margin-top:22%; text-align:left;">'.$meta_box['title'].'</h4>';
							echo'	</td>
									<td>';
										echo'<br /><br /><input type="text" name="'.$meta_box['name'].'_value" value="'.get_post_meta($post->ID, $meta_box['name'].'_value', true).'" style="width:98%" size="" /><br />';
										echo'<p><label for="'.$meta_box['name'].'_value">'.$meta_box['description'].'</label></p>';
							echo'	</td>
								</tr>';
						}else if($meta_box['type']=="dropdown") {
							echo'<tr>
									<td width="100" align="center">';		
										echo'<input type="hidden" name="'.$meta_box['name'].'_noncename" id="'.$meta_box['name'].'_noncename" value="'.wp_create_nonce( plugin_basename(__FILE__) ).'" />';
										echo'<h4 style="width: 125px; font-size:14px; margin-top:30%; text-align:left;">'.$meta_box['title'].'</h4>';
							echo'	</td>
									<td>';
										echo'<br /><br /><br />
										<select name="'.$meta_box['name'].'_value">';
											
											$value = get_post_meta($post->ID, $meta_box['name'].'_value', true);
											
											foreach ($meta_box['options'] as $option) {
											
												echo '<option ';
												if ($value == $option) { echo 'selected="selected"'; } 
												echo '>' . $option . '</option>'; 
											}
												
										echo '</select>
										<br />';
										echo'<p><label for="'.$meta_box['name'].'_value">'.$meta_box['description'].'</label></p>';
							echo'	</td>
								</tr>';
						}else if($meta_box['type']=="textarea") {
							echo'<tr style="background-color:';if($meta_box['name']=="skills"){ echo "#efefef"; }; echo '">
									<td width="100" align="center">';		
										echo'<input type="hidden" name="'.$meta_box['name'].'_noncename" id="'.$meta_box['name'].'_noncename" value="'.wp_create_nonce( plugin_basename(__FILE__) ).'" />';
										echo'<h4 style="width: 125px; font-size:14px; margin-top:45%; text-align:left;">'.$meta_box['title'].'</h4>';
							echo'	</td>
									<td>';
										echo'<br /><br /><br />
										<textarea tabindex="8" style="width:98%" name="'.$meta_box['name'].'_value" id="metavalue">'; $value = get_post_meta($post->ID, $meta_box['name'].'_value', true); echo $value .'</textarea>
										<br />';
										echo'<p><label for="'.$meta_box['name'].'_value">'.$meta_box['description'].'</label></p>';
							echo'	</td>
								</tr>';
						}
						$counter++;
					}
			echo'
					</tbody>
				</table>		';		
		}
		
		function create_meta_box() {
			global $theme_name;
			if ( function_exists('add_meta_box') ) {
				add_meta_box( 'new-meta-boxes', 'Post Options', 'meta_boxes', 'post', 'normal', 'high' );
			}
		}
		
		function save_postdata( $post_id ) {
			global $post, $meta_boxes;
			foreach($meta_boxes as $meta_box) {
				if ( !wp_verify_nonce( $_POST[$meta_box['name'].'_noncename'], plugin_basename(__FILE__) )) {
					return $post_id;
				}
				if ( 'page' == $_POST['post_type'] ) {
					if ( !current_user_can( 'edit_page', $post_id ))
						return $post_id;
				} else {
					if ( !current_user_can( 'edit_post', $post_id ))
						return $post_id;
				}
				$data = $_POST[$meta_box['name'].'_value'];
				if(get_post_meta($post_id, $meta_box['name'].'_value') == "")
					add_post_meta($post_id, $meta_box['name'].'_value', $data, true);
				elseif($data != get_post_meta($post_id, $pre.'_value', true))
					update_post_meta($post_id, $meta_box['name'].'_value', $data);
				elseif($data == "")
					delete_post_meta($post_id, $meta_box['name'].'_value', get_post_meta($post_id, $meta_box['name'].'_value', true));
			}
		}
		
		add_action('admin_menu', 'create_meta_box');
		add_action('save_post', 'save_postdata');

?>