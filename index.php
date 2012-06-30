<?php get_header(); ?>
		<div class="row">
			<div class="twelve columns">
				<div class="title-wrapper">
					<h1>Blog</h1>
				</div>
			</div>
		</div>
		<!-- Row for main content area -->
		<div class="row">
			<div id="content" class="nine columns" role="main">
		
				<div class="post-box">
					<?php /* If there are no posts to display, such as an empty archive page */ ?>
					<?php if (!have_posts()) : ?>
						<div class="notice">
							<p class="bottom"><?php _e('Sorry, no results were found.', 'reverie'); ?></p>
						</div>
						<?php get_search_form(); ?>	
					<?php endif; ?>
					
					<?php /* Start loop */ ?>
					<?php while (have_posts()) : the_post(); ?>
						<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
							<div class="three columns">
								<?php the_post_thumbnail('thumbnail'); ?>
							</div>
							<div class="nine columns">
								<header>
									<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
									<?php reverie_entry_meta(); ?>
								</header>
								<div class="entry-content">
									<?php the_excerpt(); ?>
								</div>
							</div>
						</article>	
					<?php endwhile; // End the loop ?>
					
					<?php /* Display navigation to next/previous pages when applicable */ ?>
					<?php if ($wp_query->max_num_pages > 1) : ?>
						<nav id="post-nav">
							<div class="post-previous"><?php next_posts_link( __( '&larr; Older posts', 'reverie' ) ); ?></div>
							<div class="post-next"><?php previous_posts_link( __( 'Newer posts &rarr;', 'reverie' ) ); ?></div>
						</nav>
					<?php endif; ?>
				</div>
	
			</div><!-- End Content row -->

			<?php get_sidebar('blog'); ?>
		</div>
<?php get_footer(); ?>