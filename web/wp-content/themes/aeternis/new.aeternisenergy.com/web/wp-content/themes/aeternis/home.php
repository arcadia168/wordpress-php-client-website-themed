<?php 

	// This file is used to show all the posts
	// we have. So here it's used for "All News"

    // Pull in the header.php file
    get_header(); 

?>
<section id="main">       
	<h1>All News</h1>

	<ol class="news">
	    <?php if (have_posts()): while(have_posts()) : the_post(); ?>
	        
	        <li>
				<a href="<?php the_permalink(); ?>"><h3><?php the_title(); ?></h3>
				<p class="sub"><?php the_date(); ?></p>
				<?php the_excerpt(); ?></a>
			</li>
	
	    <?php endwhile; endif ?>
	</ol>
</section>

 <?php 

    // Pull in the footer.php file
    get_footer(); 
    
?>