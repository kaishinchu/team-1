<?php get_header(); ?>
<!-- Title -->
		<div class="row">
			<div class="twelve columns">
				<div class="title-wrapper">
					<h1><?php if (is_day()) : ?>
						<?php printf(__('Daily Archives: %s', 'reverie'), get_the_date()); ?>
					<?php elseif (is_month()) : ?>
						<?php printf(__('Monthly Archives: %s', 'reverie'), get_the_date('F Y')); ?>
					<?php elseif (is_year()) : ?>
						<?php printf(__('Yearly Archives: %s', 'reverie'), get_the_date('Y')); ?>
					<?php else : ?>
						<?php single_cat_title(); ?>
					<?php endif; ?>
					</h1>
				</div>
			</div>
		</div>

		<div 
		<!-- Row for main content area -->
		<div id="content" class="eight columns" role="main">
	
			<div class="post-box">
				<hr>
				<?php /* Start loop */ ?>
				<?php while (have_posts()) : the_post(); ?>
					<article id="post-<?php the_ID(); ?>" <?php post_class('row'); ?>>
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
		
		<?php get_sidebar(); ?>
		
<?php get_footer(); ?>