<form role="search" method="POST" id="searchform" class="nice custom" action="<?php echo home_url('recipe-search'); ?>">
	<?php
		$food_styles = get_terms( 'style' );
		if ( !empty( $food_styles ) ) {
			echo '<h3>' . __( 'Food Style', 'reverie' ) . '</h3>';
			foreach( $food_styles as $food_style ) {
				echo '<label for="food_style_' . $food_style->term_id . '"><input type="checkbox" name="food_style" id="food_style_' . $food_style->term_id . '" value="' . $food_style->term_id . '">&nbsp;' . $food_style->name . '</label>';
			}
		}
		$ingredients = get_terms( 'ingredients' );
		if ( !empty( $ingredients ) ) {
			echo '<h3>' . __( 'Ingredients', 'reverie' ) . '</h3>';
			foreach( $ingredients as $ingredient ) {
				echo '<label for="ingredients_' . $ingredient->term_id . '"><input type="checkbox" name="ingredients" id="ingredients_' . $ingredient->term_id . '" value="' . $ingredient->term_id . '">&nbsp;' . $ingredient->name . '</label>';
			}
		}
	?>
	<input type="text" value="" name="recipe-search" id="recipe-search" class="input-text" placeholder="<?php _e('Search', 'reverie'); ?>">
	<input type="submit" id="searchsubmit" value="<?php _e('Search', 'reverie'); ?>" class="white nice button radius">
</form>