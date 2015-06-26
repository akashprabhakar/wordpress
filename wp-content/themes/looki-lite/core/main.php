<?php

/**
 * Wp in Progress
 * 
 * This source file is subject to the GNU GENERAL PUBLIC LICENSE (GPL 3.0)
 * It is also available at this URL: http://www.gnu.org/licenses/gpl-3.0.txt
 */
 
/*-----------------------------------------------------------------------------------*/
/* CONTENT WIDTH */
/*-----------------------------------------------------------------------------------*/ 

if ( ! isset( $content_width ) )
	$content_width = 1170;

/*-----------------------------------------------------------------------------------*/
/* POST CLASS */
/*-----------------------------------------------------------------------------------*/   

function lookilite_post_class($classes) {

	$classes[] = 'post-container col-md-12';
		
	return $classes;
	
}

add_filter('post_class', 'lookilite_post_class');

/*-----------------------------------------------------------------------------------*/
/* BODY CLASS */
/*-----------------------------------------------------------------------------------*/   

function lookilite_body_class($classes) {

	$classes[] = 'custombody';
		
	return $classes;
	
}

add_filter('body_class', 'lookilite_body_class');

/*-----------------------------------------------------------------------------------*/
/* TAG TITLE */
/*-----------------------------------------------------------------------------------*/  
 
function lookilite_title( $title, $sep ) {
	global $paged, $page;

	if ( is_feed() )
		return $title;

	$title .= get_bloginfo( 'name' );

	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		$title = "$title $sep $site_description";

	if ( $paged >= 2 || $page >= 2 )
		$title = "$title $sep " . sprintf( __( 'Page %s', 'lookilite' ), max( $paged, $page ) );

	return $title;
}

add_filter( 'wp_title', 'lookilite_title', 10, 2 );

/*-----------------------------------------------------------------------------------*/
/* LOCALIZE THEME */
/*-----------------------------------------------------------------------------------*/   

load_theme_textdomain('lookilite', get_template_directory() . '/languages');

/*-----------------------------------------------------------------------------------*/
/* REQUIRE FUNCTION */
/*-----------------------------------------------------------------------------------*/ 

function lookilite_require($folder) {

	if (isset($folder)) : 

		if ( ( !lookilite_setting('lookilite_loadsystem') ) || ( lookilite_setting('lookilite_loadsystem') == "mode_a" ) ) {
	
			$folder = dirname(dirname(__FILE__)) . $folder ;  
			
			$files = scandir($folder);  
			  
			foreach ($files as $key => $name) {  
				if (!is_dir($name)) { 
					require_once $folder . $name;
				} 
			}  
		
		} else if ( lookilite_setting('lookilite_loadsystem') == "mode_b" ) {


			$dh  = opendir(get_template_directory().$folder);
			
			while (false !== ($filename = readdir($dh))) {
			   
				if ( strlen($filename) > 2 ) {
				require_once get_template_directory()."/".$folder.$filename;
				}
			}
		}
	
	endif;
	
}

/*-----------------------------------------------------------------------------------*/
/* SCRIPTS FUNCTION */
/*-----------------------------------------------------------------------------------*/ 

function lookilite_enqueue_script($folder) {

	if (isset($folder)) : 

		if ( ( !lookilite_setting('lookilite_loadsystem') ) || ( lookilite_setting('lookilite_loadsystem') == "mode_a" ) ) {
	
		
			$dir = dirname(dirname(__FILE__)) . $folder ;  
			
			$files = scandir($dir);  
			  
			foreach ($files as $key => $name) {  
				if (!is_dir($name)) { 
					
					wp_enqueue_script( str_replace('.js','',$name), get_template_directory_uri() . $folder . "/" . $name , array('jquery'), FALSE, TRUE ); 
					
				} 
			}  
		
		} else if ( lookilite_setting('lookilite_loadsystem') == "mode_b" ) {

			$dh  = opendir(get_template_directory().$folder);
			
			while (false !== ($filename = readdir($dh))) {
			   
				if ( strlen($filename) > 2 ) {
						wp_enqueue_script( str_replace('.js','',$filename), get_template_directory_uri() . $folder . "/" . $filename , array('jquery'), FALSE, TRUE ); 
				}
			}
	
		}
		
	endif;

}

/*-----------------------------------------------------------------------------------*/
/* STYLES FUNCTION */
/*-----------------------------------------------------------------------------------*/ 

function lookilite_enqueue_style($folder) {

	if (isset($folder)) : 

		if ( ( !lookilite_setting('lookilite_loadsystem') ) || ( lookilite_setting('lookilite_loadsystem') == "mode_a" ) ) {
	
		
			$dir = dirname(dirname(__FILE__)) . $folder ;  
			
			$files = scandir($dir);  
			  
			foreach ($files as $key => $name) {  
				
				if (!is_dir($name)) { 
					
					wp_enqueue_style( str_replace('.css','',$name), get_template_directory_uri() . $folder . "/" . $name ); 
					
				} 
			}  
		
		
		} else if ( lookilite_setting('lookilite_loadsystem') == "mode_b" ) {

		
			$dh  = opendir(get_template_directory().$folder);
			
			while (false !== ($filename = readdir($dh))) {
			   
				if ( strlen($filename) > 2 ) {
						wp_enqueue_style( str_replace('.css','',$filename), get_template_directory_uri() . $folder . "/" . $filename ); 
				}
			}
		

		}
	
	endif;

}

/*-----------------------------------------------------------------------------------*/
/* REQUEST FUNCTION */
/*-----------------------------------------------------------------------------------*/ 

function lookilite_request($id) {
	
	if ( isset ( $_REQUEST[$id])) 
	return $_REQUEST[$id];	
	
}

/*-----------------------------------------------------------------------------------*/
/* THEME PATH */
/*-----------------------------------------------------------------------------------*/ 

function lookilite_theme_data($id) {
	
	$themedata = wp_get_theme();
	return $themedata->get($id);
	
}

/*-----------------------------------------------------------------------------------*/
/* THEME NAME */
/*-----------------------------------------------------------------------------------*/ 

function lookilite_themename() {
	
	$themename = "looki_theme_settings";
	return $themename;	
	
}

/*-----------------------------------------------------------------------------------*/
/* THEME SETTINGS */
/*-----------------------------------------------------------------------------------*/ 

function lookilite_setting($id) {

	$lookilite_setting = get_option(lookilite_themename());
	if(isset($lookilite_setting[$id]))
		return $lookilite_setting[$id];

}

/*-----------------------------------------------------------------------------------*/
/* POST META */
/*-----------------------------------------------------------------------------------*/ 

function lookilite_postmeta($id) {

	global $post;
	
	if (!is_404()) {
		$val = get_post_meta( $post->ID , $id, TRUE);
		if(isset($val))
		return $val;
	} else {
		return null;
	}
	
}


/*-----------------------------------------------------------------------------------*/
/* CONTENT TEMPLATE */
/*-----------------------------------------------------------------------------------*/ 

function lookilite_template($id) {

	$template = "col-md-12";

	if (lookilite_setting($id)) { $template = lookilite_setting($id); }

	return $template;
	
}

/*-----------------------------------------------------------------------------------*/
/* THEME SETUP */
/*-----------------------------------------------------------------------------------*/   

function lookilite_setup() {

	add_theme_support( 'post-formats', array( 'aside','gallery','quote','video','audio','link' ) );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'post-thumbnails' );
	
	add_image_size( 'blog', 1170,429, TRUE ); 
	add_image_size( 'portfolio', 1170,429, TRUE ); 
	add_image_size( 'slide', 1170,429, TRUE ); 
	
	add_image_size( 'large', 449,304, TRUE ); 
	add_image_size( 'medium', 290,220, TRUE ); 
	add_image_size( 'small', 211,150, TRUE ); 

	register_nav_menu( 'main-menu', 'Main menu' );

	$background = "/images/background/patterns/pattern12.jpg";
	
	add_theme_support( 'custom-background', array(
		'default-color' => 'f3f3f3',
		'default-image' => get_template_directory_uri() . $background,
	) );

}

add_action( 'after_setup_theme', 'lookilite_setup' );

/*-----------------------------------------------------------------------------------*/
/* DEFAULT STYLE, AFTER THEME ACTIVATION */
/*-----------------------------------------------------------------------------------*/         

if ( is_admin() && isset($_GET['activated'] ) && $pagenow == 'themes.php' ) {
	
	$lookilite_setting = get_option(lookilite_themename());

	if (!$lookilite_setting) {	
		
		$settings = array( 

		"lookilite_loadsystem" => "mode_a",
		"lookilite_skins" => "light_turquoise", 
		
		"lookilite_menu_font" => "Roboto Slab", 
		"lookilite_menu_font_size" => "14px", 

		"lookilite_content_font" => "Roboto Slab", 
		"lookilite_content_font_size" => "14px", 

		"lookilite_titles_font" => "Fjalla One", 
		
		"lookilite_link_color" => "#48c9b0", 
		"lookilite_link_color_hover" => "#1abc9c",

		"lookilite_bars_background_color" => "#2D3032", 
		"lookilite_bars_text_color" => "#ffffff",
		"lookilite_bars_borders_color" => "#444649",
	
		"lookilite_body_background" => "/images/background/patterns/pattern12.jpg",
		"lookilite_body_background_repeat" => "repeat",
		"lookilite_body_background_color" => "#f3f3f3",
		
		"lookilite_view_comments" => "on",

		);
	
		update_option( lookilite_themename(), $settings ); 
		
	}
}

/*-----------------------------------------------------------------------------------*/
/* GET PAGED */
/*-----------------------------------------------------------------------------------*/ 

function lookilite_paged() {
	
	if ( get_query_var('paged') ) {
		$paged = get_query_var('paged');
	} elseif ( get_query_var('page') ) {
		$paged = get_query_var('page');
	} else {
		$paged = 1;
	}
	
	return $paged;
	
}

/*-----------------------------------------------------------------------------------*/
/* PRETTYPHOTO */
/*-----------------------------------------------------------------------------------*/   

function lookilite_prettyPhoto( $html, $id, $size, $permalink, $icon, $text ) {
	
    if ( ! $permalink )
        return str_replace( '<a', '<a data-rel="prettyPhoto" ', $html );
    else
        return $html;
}

add_filter( 'wp_get_attachment_link', 'lookilite_prettyPhoto', 10, 6);

/*-----------------------------------------------------------------------------------*/
/* Excerpt more */
/*-----------------------------------------------------------------------------------*/   

function lookilite_hide_excerpt_more() {
	return '';
}

add_filter('the_content_more_link', 'lookilite_hide_excerpt_more');
add_filter('excerpt_more', 'lookilite_hide_excerpt_more');

function lookilite_excerpt() {
	
	global $post,$more;
	$more = 0;
	
	if ($pos=strpos($post->post_content, '<!--more-->')): 
		$output = '<p>'.strip_tags(get_the_content()).'<a class="more" href="'.get_permalink($post->ID).'" title="More"> [...] </a></p>';
	else:
		$output = '<p>'.get_the_excerpt().'<a class="more" href="'.get_permalink($post->ID).'" title="More"> [...] </a></p>';
	endif;
	
	echo $output;
}


/*-----------------------------------------------------------------------------------*/
/* REMOVE CATEGORY LIST REL */
/*-----------------------------------------------------------------------------------*/   

function lookilite_remove_category_list_rel($output) {
	$output = str_replace('rel="category"', '', $output);
	return $output;
}

add_filter('wp_list_categories', 'lookilite_remove_category_list_rel');
add_filter('the_category', 'lookilite_remove_category_list_rel');

/*-----------------------------------------------------------------------------------*/
/* REMOVE THUMBNAIL DIMENSION */
/*-----------------------------------------------------------------------------------*/ 

function lookilite_remove_thumbnail_dimensions( $html, $post_id, $post_image_id ) {
    $html = preg_replace( '/(width|height)=\"\d*\"\s/', "", $html );
    return $html;
}

add_filter( 'post_thumbnail_html', 'lookilite_remove_thumbnail_dimensions', 10, 3 );
  
/*-----------------------------------------------------------------------------------*/
/* REMOVE CSS GALLERY */
/*-----------------------------------------------------------------------------------*/ 

function lookilite_my_gallery_style() {
    return "<div class='gallery'>";
}

add_filter( 'gallery_style', 'lookilite_my_gallery_style', 99 );

/*-----------------------------------------------------------------------------------*/
/* STYLES AND SCRIPTS */
/*-----------------------------------------------------------------------------------*/ 

function lookilite_scripts_styles() {

	lookilite_enqueue_style('/css');

	if ( is_singular() ) wp_enqueue_script( 'comment-reply' );

	wp_enqueue_script( "jquery-ui-core", array('jquery'));
	wp_enqueue_script( "jquery-ui-tabs", array('jquery'));
	
	wp_enqueue_style( 'google-fonts', '//fonts.googleapis.com/css?family=Fjalla+One|Roboto+Slab:400,300,100,700' );
	
	lookilite_enqueue_script('/js');

}

add_action( 'wp_enqueue_scripts', 'lookilite_scripts_styles' );

/*-----------------------------------------------------------------------------------*/
/* FUNCTIONS */
/*-----------------------------------------------------------------------------------*/ 

lookilite_require('/core/templates/');
lookilite_require('/core/functions/');
lookilite_require('/core/classes/');
lookilite_require('/core/metaboxes/');

?>