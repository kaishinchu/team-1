<?php 
	$args = array( 'taxonomy' => 'style' );
	
	$terms = get_terms('style', $args);
	
	$count = count($terms); $i=0;
	if ($count > 0) {
	    $term_list = '<ul class="my_term-archive">';
	    foreach ($terms as $term) {
	        $i++;
	    	$term_list .= '<li><a href="/term-base/' . $term->slug . '" title="' . sprintf(__('View all post filed under %s', 'my_localization_domain'), $term->name) . '">' . $term->name . '</a></li>';
	    	if ($count == $i) $term_list .= '</ul>';
	    }
	    echo $term_list;
	}
?>