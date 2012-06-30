<?php 
	$arg = array(
	'taxonomy'           => 'ingredients',
	'orderby'            => 'count',
	'order' 			=> 'DESC'
	);
	
	$the_ingredients = get_categories( $arg );
	foreach($the_ingredients as $ingredient){
	echo '<a href="'. $ingredient->slug  .'">'. $ingredient->name .'</a> - '. $ingredient->count .', ';
		
	}
?>