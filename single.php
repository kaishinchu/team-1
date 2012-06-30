<?php get_header(); ?>
<!-- Title -->
		<div class="row">
			<div class="twelve columns">
				<div class="title-wrapper">
					<h1 class="page-title">Blog</h1>
				</div>
			</div>
		</div>
		
		<!-- Row for main content area -->
		<div class="row">
	
			<div id="content" class="eight columns" role="main">
		
				<div class="post-box">
					<?php /* Start loop */ ?>
					<?php while (have_posts()) : the_post(); ?>
						<article <?php post_class() ?> id="post-<?php the_ID(); ?>">
							<header>
								<h1 class="entry-title"><?php the_title(); ?></h1>
								<?php reverie_entry_meta(); ?>
							</header>
							<div class="entry-content">
								<?php the_content(); ?>
							</div>
						</article>
					<?php endwhile; // End the loop ?>
				</div>
	
			</div><!-- End Content row -->
		
			<aside id="sidebar" class="four columns" role="complementary">
				<div class="sidebar-box">
					<?php dynamic_sidebar("Blog"); ?>
				</div>
			</aside><!-- /#sidebar -->		
		</div>
<?php get_footer(); ?>