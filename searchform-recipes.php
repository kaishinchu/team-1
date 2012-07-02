<form role="search" method="POST" id="searchform" class="nice custom custom-search" action="<?php echo home_url('?page_id=27'); ?>">
	<input type="text" value="" name="recipe-search" id="recipe-search" class="input-text large" placeholder="<?php _e('Search', 'reverie'); ?>">
	<input type="submit" id="searchsubmit" value="<?php _e('Search', 'reverie'); ?>" class="white nice button radius">
	<a href="#" id="show-search"><?php _e('<span class="show">Show</span><span class="hide">Hide</span> Advanced Search Options', 'reverie'); ?></a>
	<div id="advanced-search" class="row">
		<div class="six columns">
		<?php
			$food_styles = get_terms( 'style' );
			if ( !empty( $food_styles ) ) {
				echo '<h3>' . __( 'Food Style', 'reverie' ) . '</h3>';
				foreach( $food_styles as $food_style ) {
					echo '<label for="food_style_' . $food_style->term_id . '"><input type="checkbox" name="food_style[]" id="food_style_' . $food_style->term_id . '" value="' . $food_style->term_id . '">&nbsp;' . $food_style->name . '</label>';
				}
			}
			?>
			</div>
			<div class="six columns">
			<?php 
			$ingredients = get_terms( 'ingredients' );
			if ( !empty( $ingredients ) ) {
				echo '<h3>' . __( 'Ingredients', 'reverie' ) . '</h3>';
				foreach( $ingredients as $ingredient ) {
					echo '<label for="ingredients_' . $ingredient->term_id . '"><input type="checkbox" name="ingredients[]" id="ingredients_' . $ingredient->term_id . '" value="' . $ingredient->term_id . '">&nbsp;' . $ingredient->name . '</label>';
				}
			}
			?>
			</div>
	</div>


</form>