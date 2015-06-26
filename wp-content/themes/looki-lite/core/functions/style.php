<?php function lookilite_css_custom() { ?>

<style type="text/css">

<?php

/* =================== BEGIN NAV STYLE =================== */

	$navstyle = '';

	/* Nav Font */
	if (lookilite_setting('lookilite_menu_font')) 
		$navstyle .= "font-family:'".lookilite_setting('lookilite_menu_font')."',Verdana, Geneva, sans-serif;"; 

	/* Nav  Font Size */
	if (lookilite_setting('lookilite_menu_font_size')) 
		$navstyle .= "font-size:".lookilite_setting('lookilite_menu_font_size').";"; 
	
	if ($navstyle)
		echo 'nav#mainmenu ul li a, nav#mainmenu ul ul li a { '.$navstyle.' } ';
		
/* =================== END NAV STYLE =================== */

/* =================== BEGIN CONTENT STYLE =================== */

	if (lookilite_setting('lookilite_content_font_size')) 
		echo ".post-article p, .post-article li, .post-article address, .post-article dd, .post-article blockquote, .post-article td, .post-article th, .textwidget, .toggle_container h5.element  { font-size:".lookilite_setting('lookilite_content_font_size')."}"; 
	

/* =================== END CONTENT STYLE =================== */

/* =================== START TITLE STYLE =================== */

	if (lookilite_setting('lookilite_h1_font_size')) 
		echo "h1 {font-size:".lookilite_setting('lookilite_h1_font_size')."; }"; 
	if (lookilite_setting('lookilite_h2_font_size')) 
		echo "h2 { font-size:".lookilite_setting('lookilite_h2_font_size')."; }"; 
	if (lookilite_setting('lookilite_h3_font_size')) 
		echo "h3 { font-size:".lookilite_setting('lookilite_h3_font_size')."; }"; 
	if (lookilite_setting('lookilite_h4_font_size')) 
		echo "h4 { font-size:".lookilite_setting('lookilite_h4_font_size')."; }"; 
	if (lookilite_setting('lookilite_h5_font_size')) 
		echo "h5 { font-size:".lookilite_setting('lookilite_h5_font_size')."; }"; 
	if (lookilite_setting('lookilite_h6_font_size')) 
		echo "h6 { font-size:".lookilite_setting('lookilite_h6_font_size')."; }"; 


/* =================== END TITLE STYLE =================== */

/* =================== START HEADER SIDEBAR AND FOOTER STYLE =================== */

	if ( lookilite_setting('lookilite_bars_background_color') ):

		echo '#header, #footer, .scroll-sidebar, .scroll-sidebar .post-article  { background-color: '.lookilite_setting('lookilite_bars_background_color').'; } ';

	endif;	
	
	if ( lookilite_setting('lookilite_bars_text_color') ):

		echo '.navigation i, .back-to-top i, #footer a, #footer p, .scroll-sidebar h3.title, .scroll-sidebar a, .scroll-sidebar p, .scroll-sidebar li, .scroll-sidebar address,
.scroll-sidebar dd, .scroll-sidebar blockquote,.scroll-sidebar td,.scroll-sidebar th,.scroll-sidebar label,.scroll-sidebar .textwidget,nav#mainmenu li a  { color: '.lookilite_setting('lookilite_bars_text_color').'; } ';

	endif;	
	
	if ( lookilite_setting('lookilite_bars_borders_color') ):

		echo '.scroll-sidebar, .navigation i, .back-to-top i, .scroll-sidebar li, ul.widget-category, ul.widget-category li a, ul.contact-info li, .bottom_widget ul.contact-info li, .tagcloud a, .socials a, nav#mainmenu ul, nav#mainmenu li a, nav#mainmenu li:last-of-type a, nav#mainmenu li:last-of-type a:hover,.scroll-sidebar .post-article { border-color: '.lookilite_setting('lookilite_bars_borders_color').'; } ';

	endif;	

/* =================== END HEADER SIDEBAR AND FOOTER STYLE =================== */

/* =================== START LINK STYLE =================== */

	if ( lookilite_setting('lookilite_link_color') ):

		echo '::-moz-selection { background-color: '.lookilite_setting('lookilite_link_color').'; } ';
		echo '::selection { background-color: '.lookilite_setting('lookilite_link_color').'; } ';

		echo '.skills .views, .filter, .scroll-sidebar #searchform input[type=submit], .scroll-sidebar .contact-form input[type=submit], .scroll-sidebar #commentform input[type=submit], .wp-pagenavi a:hover, .wp-pagenavi span.current { background-color: '.lookilite_setting('lookilite_link_color').'; } ';

		echo 'a.more:hover, a:hover, .scroll-sidebar a:hover, .post-info a:hover, #footer a:hover { color: '.lookilite_setting('lookilite_link_color').'; } ';

		echo '.skills .views, .filter { border-color: '.lookilite_setting('lookilite_link_color').'; } ';

	endif;	
	
	if ( lookilite_setting('lookilite_link_color_hover') ):

		echo '#subheader, nav#mainmenu li a:hover, nav#mainmenu li:hover > a , nav#mainmenu li.current-menu-item > a, nav#mainmenu li.current-menu-ancestor > a, .navigation i.open, .navigation i:hover, .back-to-top i.open, .back-to-top i:hover, .post-article .link a:hover, .post-article .quote:hover, .skills .views.active,
.skills .views:hover, .filter li:hover, .filter li.active, #searchform input[type=submit]:hover, .contact-form input[type=submit]:hover, #commentform input[type=submit]:hover, ul.widget-category li a:hover, .scroll-sidebar #searchform input[type=submit]:hover,  .scroll-sidebar .contact-form input[type=submit]:hover, .scroll-sidebar #commentform input[type=submit]:hover, #wp-calendar #today, #wp-calendar #today a, .tagcloud a:hover, .tabs li a:hover, .tabs li.ui-tabs-active a, .tabs li.ui-state-active a, .toggle_container h5.element:hover, .toggle_container h5.inactive, .toggle_container h5.inactive:hover, .socials a:hover { background-color: '.lookilite_setting('lookilite_link_color_hover').'; } ';

		echo '.post-article .title a:hover, .filterable-grid  h4.title a:hover, .filterable-grid  h4.title a:focus { color: '.lookilite_setting('lookilite_link_color_hover').'; } ';

		echo 'ul.widget-category li a:hover, .toggle_container h5.element:hover, .toggle_container h5.inactive, .toggle_container h5.inactive:hover, .toggle_container h5.element:hover:last-of-type, .toggle_container h5.inactive:last-of-type, .toggle_container h5.inactive:hover:last-of-type, .socials a:hover,.navigation i.open, .navigation i:hover, .back-to-top i.open, .back-to-top i:hover { border-color: '.lookilite_setting('lookilite_link_color_hover').'; } ';

	endif;	


/* =================== END LINK STYLE =================== */


	if (lookilite_setting('lookilite_custom_css_code'))
		echo lookilite_setting('lookilite_custom_css_code'); 

?>

</style>
    
<?php }

	add_action('wp_head', 'lookilite_css_custom');

?>