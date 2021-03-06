<?php
function reverie_setup() {
	// Add language supports. Please note that Reverie Framework does not include language files.
	load_theme_textdomain('reverie', get_template_directory() . '/lang');

	// Add post thumbnail supports. http://codex.wordpress.org/Post_Thumbnails
	add_theme_support('post-thumbnails');
	// set_post_thumbnail_size(150, 150, false);
	//image size for front page slider, change to fit design
	add_image_size('slideshow', 980, 400, true);

	// Add post formarts supports. http://codex.wordpress.org/Post_Formats
	//add_theme_support('post-formats', array('aside', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'audio', 'chat'));

	// Add menu supports. http://codex.wordpress.org/Function_Reference/register_nav_menus
	add_theme_support('menus');
	register_nav_menus(array(
		'primary_navigation' => __('Primary Navigation', 'reverie'),
		'utility_navigation' => __('Utility Navigation', 'reverie')
	));
}
add_action('after_setup_theme', 'reverie_setup');

// create widget areas: sidebar, footer
$sidebars = array('Sidebar', 'Blog');
foreach ($sidebars as $sidebar) {
	register_sidebar(array('name'=> $sidebar,
		'before_widget' => '<article id="%1$s" class="widget %2$s"><div class="sidebar-section panel">',
		'after_widget' => '</div></article>',
		'before_title' => '<h3>',
		'after_title' => '</h3>'
	));
}

// return entry meta information for posts, used by multiple loops.
function reverie_entry_meta() {
	echo '<time class="updated" datetime="'. get_the_time('c') .'" pubdate>'. sprintf(__('Posted on %s', 'reverie'), get_the_time('F jS, Y'), get_the_time()) .'</time>'. ' in ';
the_category(', ');
}

/* Customized the output of caption, you can remove the filter to restore back to the WP default output. Courtesy of DevPress. http://devpress.com/blog/captions-in-wordpress/ */
add_filter( 'img_caption_shortcode', 'cleaner_caption', 10, 3 );

function cleaner_caption( $output, $attr, $content ) {

	/* We're not worried abut captions in feeds, so just return the output here. */
	if ( is_feed() )
		return $output;

	/* Set up the default arguments. */
	$defaults = array(
		'id' => '',
		'align' => 'alignnone',
		'width' => '',
		'caption' => ''
	);

	/* Merge the defaults with user input. */
	$attr = shortcode_atts( $defaults, $attr );

	/* If the width is less than 1 or there is no caption, return the content wrapped between the [caption]< tags. */
	if ( 1 > $attr['width'] || empty( $attr['caption'] ) )
		return $content;

	/* Set up the attributes for the caption <div>. */
	$attributes = ' class="figure ' . esc_attr( $attr['align'] ) . '"';

	/* Open the caption <div>. */
	$output = '<figure' . $attributes .'>';

	/* Allow shortcodes for the content the caption was created for. */
	$output .= do_shortcode( $content );

	/* Append the caption text. */
	$output .= '<figcaption>' . $attr['caption'] . '</figcaption>';

	/* Close the caption </div>. */
	$output .= '</figure>';

	/* Return the formatted, clean caption. */
	return $output;
}

// Clean the output of attributes of images in editor. Courtesy of SitePoint. http://www.sitepoint.com/wordpress-change-img-tag-html/
function image_tag_class($class, $id, $align, $size) {
	$align = 'align' . esc_attr($align);
	return $align;
}
add_filter('get_image_tag_class', 'image_tag_class', 0, 4);
function image_tag($html, $id, $alt, $title) {
	return preg_replace(array(
			'/\s+width="\d+"/i',
			'/\s+height="\d+"/i',
			'/alt=""/i'
		),
		array(
			'',
			'',
			'',
			'alt="' . $title . '"'
		),
		$html);
}
add_filter('get_image_tag', 'image_tag', 0, 4);


// img unautop, Courtesy of Interconnectit http://interconnectit.com/2175/how-to-remove-p-tags-from-images-in-wordpress/
function img_unautop($pee) {
    $pee = preg_replace('/<p>\\s*?(<a .*?><img.*?><\\/a>|<img.*?>)?\\s*<\\/p>/s', '<figure>$1</figure>', $pee);
    return $pee;
}
add_filter( 'the_content', 'img_unautop', 30 );

// Presstrends
function presstrends() {

// Add your PressTrends and Theme API Keys
$api_key = 'xc11x4vpf17icuwver0bhgbzz4uewlu5ql38';
$auth = 'kw1f8yr8eo1op9c859qcqkm2jjseuj7zp';

// NO NEED TO EDIT BELOW
$data = get_transient( 'presstrends_data' );
if (!$data || $data == ''){
$api_base = 'http://api.presstrends.io/index.php/api/sites/add/auth/';
$url = $api_base . $auth . '/api/' . $api_key . '/';
$data = array();
$count_posts = wp_count_posts();
$count_pages = wp_count_posts('page');
$comments_count = wp_count_comments();
$theme_data = get_theme_data(get_stylesheet_directory() . '/style.css');
$plugin_count = count(get_option('active_plugins'));
$all_plugins = get_plugins();
foreach($all_plugins as $plugin_file => $plugin_data) {
$plugin_name .= $plugin_data['Name'];
$plugin_name .= '&';
}
$data['url'] = stripslashes(str_replace(array('http://', '/', ':' ), '', site_url()));
$data['posts'] = $count_posts->publish;
$data['pages'] = $count_pages->publish;
$data['comments'] = $comments_count->total_comments;
$data['approved'] = $comments_count->approved;
$data['spam'] = $comments_count->spam;
$data['theme_version'] = $theme_data['Version'];
$data['theme_name'] = $theme_data['Name'];
$data['site_name'] = str_replace( ' ', '', get_bloginfo( 'name' ));
$data['plugins'] = $plugin_count;
$data['plugin'] = urlencode($plugin_name);
$data['wpversion'] = get_bloginfo('version');
foreach ( $data as $k => $v ) {
$url .= $k . '/' . $v . '/';
}
$response = wp_remote_get( $url );
set_transient('presstrends_data', $data, 60*60*24);
}}
add_action('admin_init', 'presstrends');

function excerpt($limit) {
	$excerpt = explode(' ', get_the_excerpt(), $limit);
	if (count($excerpt)>=$limit) {
		array_pop($excerpt);
		$excerpt = implode(" ",$excerpt).'…';
	} else {
		$excerpt = implode(" ",$excerpt);
	}
	$excerpt = preg_replace('`\[[^\]]*\]`','',$excerpt);
	return $excerpt;
}

function custom_excerpt_more( $more ) {
	return ' <a href="'. get_permalink() .'">Read More &raquo;</a>';
}
add_filter( 'excerpt_more', 'custom_excerpt_more' );

/* 
 Custom Post Types & Taxonomies
*/

register_post_type('recipe', array(	'label' => 'Recipes','description' => '','public' => true,'show_ui' => true,'show_in_menu' => true, 'show_in_nav_menus ' => true, 'capability_type' => 'post','hierarchical' => false,'rewrite' => array('slug' => ''),'query_var' => true,'has_archive' => true,'menu_position' => 5,'supports' => array('title','editor', 'trackbacks','comments','revisions','thumbnail','page-attributes',),'taxonomies' => array('ingredients','style',),'labels' => array (
  'name' => 'Recipes',
  'singular_name' => 'Recipe',
  'menu_name' => 'Recipes',
  'add_new' => 'Add Recipe',
  'add_new_item' => 'Add New Recipe',
  'edit' => 'Edit',
  'edit_item' => 'Edit Recipe',
  'new_item' => 'New Recipe',
  'view' => 'View Recipe',
  'view_item' => 'View Recipe',
  'search_items' => 'Search Recipes',
  'not_found' => 'No Recipes Found',
  'not_found_in_trash' => 'No Recipes Found in Trash',
  'parent' => 'Parent Recipe',
),) );


    //registered taxonomies for the Recipe custom post type
    register_taxonomy('ingredients',array (
  0 => 'recipe',
),array( 'hierarchical' => false, 'label' => 'Ingredients','show_ui' => true,'query_var' => true,'rewrite' => array('slug' => ''),'singular_label' => 'Ingredient', ) );

	register_taxonomy('style',array (
	  0 => 'recipe',
	),array( 'hierarchical' => true, 'label' => 'Styles','show_ui' => true,'query_var' => true,'rewrite' => array('slug' => ''),'singular_label' => 'Style') );


if ( function_exists('x_add_metadata_group' ) ) :

add_action( 'admin_init', 'teamchicken_custom_fields' );
function teamchicken_custom_fields() {

    // recipe fields
  	x_add_metadata_group( 'featured_post', 'recipe', array( 'label' => __( 'Featured Post', 'reverie' ), 'context' => 'side', 'priority' => 'high' ) );
  	x_add_metadata_field( 'featured_post', 'recipe', array( 'group' => 'featured_post', 'label' => __( 'Featured Post', 'reverie' ), 'field_type' => 'checkbox' ) );

  	x_add_metadata_group( 'ingredients', 'recipe', array( 'label' => __( 'Ingredients', 'reverie' ), 'priority' => 'high' ) );
  	x_add_metadata_field( 'ingredients', 'recipe', array( 'group' => 'ingredients', 'label' => __( 'Ingredients', 'reverie' ), 'field_type' => 'text', 'multiple' => true ) );

}
endif;

/**
 * Custom Theme Options
 */
require( get_template_directory() . '/inc/theme-options.php' );


function mon_cahier_customize_register($wp_customize){

    $wp_customize->add_setting('mon_cahier_theme_options[link_color]', array(
        'default' => '000',
        'sanitize_callback' => 'sanitize_hex_color',
        'capability' => 'edit_theme_options',
        'type' => 'option',

    ));

	$wp_customize->add_setting('mon_cahier_theme_options[rollover_color]', array(
	    'default' => '000',
	    'sanitize_callback' => 'sanitize_hex_color',
	    'capability' => 'edit_theme_options',
	    'type' => 'option',

	));

    $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'link_color', array(
        'label' => __('Link Color', 'mon_cahier'),
        'section' => 'colors',
        'settings' => 'mon_cahier_theme_options[link_color]',
    )));

	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'rollover_color', array(
	    'label' => __('Rollover Color', 'mon_cahier'),
	    'section' => 'colors',
	    'settings' => 'mon_cahier_theme_options[rollover_color]',
	)));
}

add_action('customize_register', 'mon_cahier_customize_register');



function mon_cahier_link_color(){
	$mon_cahier_options = get_option( 'mon_cahier_theme_options' );
	if ( isset( $mon_cahier_options['link_color'] ) ) { ?>
		<style>
			a {color: <?php echo $mon_cahier_options['link_color']; ?>}
			a:hover {color: <?php echo $mon_cahier_options['rollover_color']; ?>}
		</style>		
	<?php }

	}
add_action( 'wp_head', 'mon_cahier_link_color' );

function the_post_thumbnail_caption() {
  global $post;

  $thumbnail_id    = get_post_thumbnail_id($post->ID);
  $thumbnail_image = get_posts(array('p' => $thumbnail_id, 'post_type' => 'attachment'));

  if ($thumbnail_image && isset($thumbnail_image[0])) {
    echo '<span>'.$thumbnail_image[0]->post_excerpt.'</span>';
  }
}

include_once('php-widget-templates.php'); 


?>
