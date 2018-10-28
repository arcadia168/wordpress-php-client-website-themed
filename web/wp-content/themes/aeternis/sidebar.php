<aside class="sidebar right">
	<h2>Recent News</h2>
	
	<ol class="news">
		<?php 
			
			query_posts('posts_per_page=3');
			
			if( have_posts() ) : while( have_posts() ): the_post();
			
		?>

			<li>
				<a href="<?php the_permalink(); ?>"><h3><?php the_title(); ?></h3>
				<p class="sub"><?php the_date(); ?></p>
				<?php the_excerpt(); ?></a>
			</li>

		<?php 
			
			endwhile; endif;
			
			wp_reset_query();
			
		?>
		
		<li class="read-more"><a href="/all-news/">Read more...</a></li>
	</ol>
</aside>