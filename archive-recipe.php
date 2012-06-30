<?php get_header(); ?>
<!-- Title -->
		<div class="row">
			<div class="twelve columns">
				<div class="title-wrapper">
					<h1>
						<?php post_type_archive_title(); ?>
					</h1>
				</div>
			</div>
		</div>

		<div> 
		<!-- Row for main content area -->
		<div id="content" class="eight columns" role="main">
	
			<div class="post-box">
				<?php /* Start loop */ ?>
				<?php while (have_posts()) : the_post(); ?>
					<article id="post-<?php the_ID(); ?>" <?php post_class('row'); ?>>
						<div class="three columns">
							<?php the_post_thumbnail('thumbnail'); ?>
						</div>
						<div class="nine columns">
							<header>
								<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
								<h3><?php echo get_the_term_list( $post->ID, 'style', 'Style: ', ', ', '' ); ?> </h3>
								<?php echo get_the_term_list( $post->ID, 'ingredients', 'Ingredients: ', ', ', '' ); ?> 
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
		
		<?php get_sidebar(); ?>
		</div>
<?php get_footer(); ?>