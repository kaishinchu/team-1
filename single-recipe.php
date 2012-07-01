<?php get_header(); ?>
<!-- Title -->
<?php while (have_posts()) : the_post(); ?>

		<div class="row">
			<div class="twelve columns">
				<div class="title-wrapper">
					<h1 class="page-title"><?php the_title(); ?></h1>
				</div>
			</div>
		</div>
		
		<!-- Row for main content area -->
		<div class="row">
	
			<div id="content" class="eight columns" role="main">
		
				<div class="post-box">
					<?php /* Start loop */ ?>
						<article <?php post_class() ?> id="post-<?php the_ID(); ?>">
							<?php the_post_thumbnail('slideshow'); ?>
							<div class="ingredients panel">
								<h3>Ingredients</h3>
								<ul>
								<?php  
								$value = get_metadata( 'post', get_the_ID(), 'ingredients'); 								
								foreach($value as $ingredient){
									echo "<li>". $ingredient ."</li>"; 
								}
								?> 
								</ul>
							</div>
							<div class="entry-content">
								<?php the_content(); ?>
							</div>
							
						</article>
					<?php endwhile; // End the loop ?>
				</div>
	
			</div><!-- End Content row -->
		
		<?php get_sidebar(); ?>
	
		</div>
<?php get_footer(); ?>