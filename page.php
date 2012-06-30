<?php get_header(); ?>
<?php /* Start loop */ ?>
<?php while (have_posts()) : the_post(); ?>
<!-- Title -->
		<div class="row">
			<div class="twelve columns">
				<div class="title-wrapper">
					<h1><?php the_title(); ?></h1>
				</div>
			</div>
		</div>

		<!-- Row for main content area -->
		<div class="row">

			<div id="content" class="eight columns" role="main">
				<div class="post-box">
					<?php the_content(); ?>
					<?php wp_link_pages(array('before' => '<nav id="page-nav"><p>' . __('Pages:', 'reverie'), 'after' => '</p></nav>' )); ?>
					<?php endwhile; // End the loop ?>			
				</div>
	
			</div><!-- End Content row -->
		<?php get_sidebar(); ?>
		</div>		
		
<?php get_footer(); ?>