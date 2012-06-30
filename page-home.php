<?php 
/* 
* Template Name: Home
*/

get_header(); ?>


		<section class="front-slider row">
			<div class="twelve columns">
				<!-- Hook up the FlexSlider -->
				<script type="text/javascript">
					jQuery(window).load(function() {
						jQuery('.flexslider').flexslider({
						  animation: "slide"
					  });
					});
				</script>
				<div class="flexslider">
					<?php 
			 		    $arrParams = array(
							'post_type' => 'recipe',
							'posts_per_page' => 5, 
							'orderby' => 'ASC', 
							'meta_key' => 'featured_post',
							'meta_value' => 'on'
						);
					    $wp_query = new WP_Query($arrParams);		
						if($wp_query->have_posts()){
						?>
						    <ul class="slides">
							<?php
								while ($wp_query->have_posts()) : $wp_query->the_post(); 
							?>
								<li>
									<?php the_post_thumbnail('slideshow'); ?>
									<div class="slide-text">
										<h2><?php the_title(); ?></h2>
									</div>							
								</li>
							 <?php 
								 endwhile; 
								 wp_reset_query();
							?>
						    </ul>
		
						<?php							
						 } //end if 
						 ?>
				</div>
			</div>		
		</section>
		<div class="row">
			<?php ?>
		</div>
		<div class="row">
			<div class="eight columns">
				<?php 
		 		    $recentParams = array(
						'post_type' => 'recipe',
						'posts_per_page' => 10, 
						'orderby' => 'ASC', 
					);
				    $recent_query = new WP_Query($recentParams);		
					if($recent_query->have_posts()){
						while ($recent_query->have_posts()) : $recent_query->the_post(); 

				?>
					<div class="row">
						<div class="three columns">
							<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('thumbnail'); ?></a>
						</div>
						<div class="nine columns">
							<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
							<?php the_excerpt(); ?>
						</div>
					</div>
				<?php 
					 endwhile; 
					 wp_reset_query();
					 } // end if
				?>
			</div>
		
			<?php get_sidebar(); ?>
				  	
		</div>
		
<?php get_footer(); ?>