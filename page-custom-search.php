<?php
/*
* Template Name: custom search
*/
get_header(); ?>
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
<?php 	endwhile; // End the loop
		wp_reset_query();
 ?>
		<!-- Row for main content area -->
		<div class="row">

			<div id="content" class="eight columns" role="main">
				<div class="post-box">
					<?php
						$searchArgs = array (
							'post_type' => 'recipe',
							'posts_per_page' => -1,
						);
						$wp_query = new WP_Query( $searchArgs );

						if ( !empty( $_POST['food_style'] ) || !empty( $_POST['ingredients'] ) ) {
							$searchArgs['tax_query'] = array( 'relation' => 'AND' );
						}

						if ( !empty( $_POST['food_style'] ) )	{
							$searchArgs['tax_query'][0] = array();
							$searchArgs['tax_query'][0]['taxonomy'] = 'style';
							$searchArgs['tax_query'][0]['field'] = 'id';
							foreach( (array) $_POST['food_style'] as $food_style_id ){
								$searchArgs['tax_query'][0]['terms'][] = (int) $food_style_id;
							}
						}

						if ( !empty( $_POST['ingredients'] ) )	{
							$searchArgs['tax_query'][1] = array();
							$searchArgs['tax_query'][1]['taxonomy'] = 'ingredients';
							$searchArgs['tax_query'][1]['field'] = 'id';
							foreach( (array) $_POST['ingredients'] as $ingredient_id ){
								$searchArgs['tax_query'][1]['terms'][] = (int) $ingredient_id;
							}
						}

						if($wp_query->have_posts()){
							while ($wp_query->have_posts()) : $wp_query->the_post();
						?>
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
						<?php
							endwhile;
							wp_reset_query();
						} // end if
					?>
				</div>

			</div><!-- End Content row -->
		<?php get_sidebar(); ?>
		</div>

<?php get_footer(); ?>