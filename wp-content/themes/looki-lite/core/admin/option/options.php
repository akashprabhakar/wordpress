<?php

/**
 * Wp in Progress
 * 
 * @author WPinProgress
 *
 * This source file is subject to the GNU GENERAL PUBLIC LICENSE (GPL 3.0)
 * It is also available at this URL: http://www.gnu.org/licenses/gpl-3.0.txt
 */

require_once dirname(__FILE__) . '/default.php';

$panel = array (

/* =================== NAV =================== */

array( "name" => "Navigation",  
       "type" => "navigation",  
       "item" => array( "General" => __( "General","lookilite") , "Fonts" => __( "Fonts","lookilite") , "Colors" => __( "Colors","lookilite") ),   
       "start" => "<ul>", 
       "end" => "</ul>"),  
	   
/* =================== END NAV =================== */

/* =================== GENERAL TAB =================== */

array( "type" => "begintab",
	   "tab" => "General",
	   "element" =>
	   
	array( "type" => "form",
	       "name" => "General"),

/* START LOAD SYSTEM */ 

	array( "type" => "startopen",
	       "val" => "Load system",
	       "name" => __( "Load system","lookilite")),

	array( "name" => __( "Load system","lookilite"),
	       "desc" => __( "Select a load system, if you've some problems with the theme (for example a blank page).","lookilite"),
	       "id" => $shortname."_loadsystem",
	       "type" => "select",
	       "options" => array(
			   "mode_a" => __( "Mode a","lookilite"),
			   "mode_b" => __( "Mode b","lookilite"),
		   ),
	       "std" => ""),

	array( "type" => "save-button",
	       "value" => "Save",
	       "class" => "General"),

	array( "type" => "end"),

/* END LOAD SYSTEM */ 

/* START SKINS */ 

	array( "type" => "start",
	       "val" => "Skins",
	       "name" => __( "Skins","lookilite")),

	array( "name" => __( "Theme skin","lookilite"),
	       "desc" => __( "Select a skin, the options will be charged in accordance with the chosen style.","lookilite"),
	       "id" => $shortname."_skins",
	       "type" => "select",
	       "options" => array(
	   	   "turquoise" => __( "Turquoise","lookilite"),
	   	   "orange" => __( "Orange","lookilite"),
	   	   "blue" => __( "Blue","lookilite"),
	   	   "red" => __( "Red","lookilite"),
	   	   "purple" => __( "Purple","lookilite"),
	   	   "yellow" => __( "Yellow","lookilite"),
	   	   "green" => __( "Green","lookilite"),
	   	   "light_turquoise" => __( "Light & Turquoise","lookilite"),
	   	   "light_orange" => __( "Light & Orange","lookilite"),
	   	   "light_blue" => __( "Light & Blue","lookilite"),
	   	   "light_red" => __( "Light & Red","lookilite"),
	   	   "light_purple" => __( "Light & Purple","lookilite"),
	   	   "light_yellow" => __( "Light & Yellow","lookilite"),
	   	   "light_green" => __( "Light & Green","lookilite"),
		   ),
	       "std" => "light_turquoise"),

	array( "type" => "save-button",
	       "value" => "Save",
	       "class" => "General"),

	array( "type" => "end"),

/* END SKINS */ 

/* START MAIN */ 

	array( "type" => "start",
	       "val" => "General",
	       "name" => __( "General","lookilite")),
	
	array( "name" => __( "Custom css","lookilite"),
	       "desc" => __( "Insert your custom css code","lookilite"),
	       "id" => $shortname."_custom_css_code",
	       "type" => "textarea",
	       "std" => ""),

	array( "type" => "save-button",
	       "value" => "Save",
	       "class" => "General"),

	array( "type" => "end"),

/* END GENERAL */ 

/* START HEADER */ 

	array( "type" => "start",
	       "val" => "Header",
	       "name" => __( "Header","lookilite")),

	array( "name" => __( "Custom Logo","lookilite"),
	       "desc" => __( "Insert the url of your custom logo","lookilite"),
           "id" => $shortname."_custom_logo",     
           "type" => "text",
	       "std" => ""),
		   
	array( "name" => __( "Custom Favicon","lookilite"),
	       "desc" => __( "Insert the url of your custom favicon","lookilite"),
           "id" => $shortname."_custom_favicon",     
           "type" => "text",
           "class" => "",
	       "std" => ""),

	array( "type" => "save-button",
	       "value" => "Save",
	       "class" => "General"),

	array( "type" => "end"),

/* END HEADER */ 

/* START FOOTER */ 

	array( "type" => "start",
	       "val" => "Footer",
	       "name" => __( "Footer","lookilite")),

	array( "name" => __( "Copyright Text","lookilite"),
	       "desc" => __( "Insert copyright text","lookilite"),
	       "id" => $shortname."_copyright_text",
	       "type" => "textarea",
	       "std" => ""),
		   
	array( "name" => __( "Facebook Url","lookilite"),
	       "desc" => __( "Insert Facebook Url (empty if you want to hide the button)","lookilite"),
	       "id" => $shortname."_footer_facebook_button",
	       "type" => "text",
	       "std" => ""),
		   
	array( "name" => __( "Twitter Url","lookilite"),
	       "desc" => __( "Insert Twitter Url (empty if you want to hide the button)","lookilite"),
	       "id" => $shortname."_footer_twitter_button",
	       "type" => "text",
	       "std" => ""),

	array( "name" => __( "Flickr Url","lookilite"),
	       "desc" => __( "Insert Flickr Url (empty if you want to hide the button)","lookilite"),
	       "id" => $shortname."_footer_flickr_button",
	       "type" => "text",
	       "std" => ""),
	
	array( "name" => __( "Google Url","lookilite"),
	       "desc" => __( "Insert Google Url (empty if you want to hide the button)","lookilite"),
	       "id" => $shortname."_footer_google_button",
	       "type" => "text",
	       "std" => ""),

	array( "name" => __( "Linkedin Url","lookilite"),
	       "desc" => __( "Insert Linkedin Url (empty if you want to hide the button)","lookilite"),
	       "id" => $shortname."_footer_linkedin_button",
	       "type" => "text",
	       "std" => ""),

	array( "name" => __( "Pinterest Url","lookilite"),
	       "desc" => __( "Insert Pinterest Url (empty if you want to hide the button)","lookilite"),
	       "id" => $shortname."_footer_pinterest_button",
	       "type" => "text",
	       "std" => ""),
		   
	array( "name" => __( "Tumblr Url","lookilite"),
	       "desc" => __( "Insert Tumblr Url (empty if you want to hide the button)","lookilite"),
	       "id" => $shortname."_footer_tumblr_button",
	       "type" => "text",
	       "std" => ""),

	array( "name" => __( "Youtube Url","lookilite"),
	       "desc" => __( "Insert Youtube Url (empty if you want to hide the button)","lookilite"),
	       "id" => $shortname."_footer_youtube_button",
	       "type" => "text",
	       "std" => ""),
		   
	array( "name" => __( "Skype Url","lookilite"),
	       "desc" => __( "Insert Skype ID (empty if you want to hide the button), you can add <strong>'skype:'</strong>, after your ID (for example skype:alexvtn)","lookilite"),
	       "id" => $shortname."_footer_skype_button",
	       "type" => "text",
	       "std" => ""),
		   
	array( "name" => __( "Instagram  Url","lookilite"),
	       "desc" => __( "Insert Instagram Url (empty if you want to hide the button)","lookilite"),
	       "id" => $shortname."_footer_instagram_button",
	       "type" => "text",
	       "std" => ""),

		   
	array( "name" => __( "Github  Url","lookilite"),
	       "desc" => __( "Insert Github Url (empty if you want to hide the button)","lookilite"),
	       "id" => $shortname."_footer_github_button",
	       "type" => "text",
	       "std" => ""),

	array( "name" => __( "Email Address","lookilite"),
	       "desc" => __( "Insert Email Address (empty if you want to hide the button), you can add <strong>'mailto:</strong>', after your email (for example mailto:info@wpinprogress.com)","lookilite"),
	       "id" => $shortname."_footer_email_button",
	       "type" => "text",
	       "std" => ""),
		   
	array( "name" => __( "Feed Rss Button","lookilite"),
	       "desc" => __( "You want display the Feed Rss button?","lookilite"),
	       "class" => "hidden",
	       "id" => $shortname."_footer_rss_button",
	       "type" => "on-off",
	       "std" => "off"),
		   
	array( "type" => "save-button",
	       "value" => "Save",
	       "class" => "General"),

array( "type" => "end"),

/* END FOOTER */ 

),

array( "type" => "endtab"),
	   

/* =================== FONTS OPTION TAB =================== */

array( "type" => "begintab",
	   "tab" => "Fonts",
	   "element" =>

/* START MENU FONT */ 

	array( "type" => "form",
	       "name" => "Fonts"),

	array( "type" => "start",
	       "val" => "Menu font",
	       "name" => __( "Menu font","lookilite")),

	array( "name" => __( "Menu size","lookilite"),
	       "desc" => __( "Select a size for menu","lookilite"),
	       "id" => $shortname."_menu_font_size",
	       "type" => "select",
			"options" => $fontsize,
	       "std" => "14px"),
		   
	array( "type" => "save-button",
	       "value" => "Save",
	       "class" => "Menu font"),

	array( "type" => "end"),

/* END MENU FONT */ 

/* START CONTENT FONT */ 

	array( "type" => "start",
	       "val" => "Content font",
	       "name" => __( "Content font","lookilite")),

	array( "name" => __( "Content size","lookilite"),
	       "desc" => __( "Select a size for the content","lookilite"),
	       "id" => $shortname."_content_font_size",
	       "type" => "select",
			"options" => $fontsize,
	       "std" => "14px"),
		   
	array( "type" => "save-button",
	       "value" => "Save",
	       "class" => "Menu font"),

	array( "type" => "end"),

/* END MENU FONT */ 

/* START HEADLINE FONT SIZES */ 
	   
	array( "type" => "start",
	       "val" => "Headline font sizes",
	       "name" => __( "Headline font sizes","lookilite")),

	array( "name" => __( "H1 headline","lookilite"),
	       "desc" => __( "Select a size for H1 elements","lookilite"),
	       "id" => $shortname."_h1_font_size",
	       "type" => "select",
			"options" => $fontsize,
	       "std" => "28px"),

	array( "name" => __( "H2 headline","lookilite"),
	       "desc" => __( "Select a size for H2 elements","lookilite"),
	       "id" => $shortname."_h2_font_size",
	       "type" => "select",
			"options" => $fontsize,
	       "std" => "26px"),

	array( "name" => __( "H3 headline","lookilite"),
	       "desc" => __( "Select a size for H3 elements","lookilite"),
	       "id" => $shortname."_h3_font_size",
	       "type" => "select",
			"options" => $fontsize,
	       "std" => "24px"),
		   
	array( "name" => __( "H4 headline","lookilite"),
	       "desc" => __( "Select a size for H4 elements","lookilite"),
	       "id" => $shortname."_h4_font_size",
	       "type" => "select",
			"options" => $fontsize,
	       "std" => "21px"),
		   
	array( "name" => __( "H5 headline","lookilite"),
	       "desc" => __( "Select a size for H5 elements","lookilite"),
	       "id" => $shortname."_h5_font_size",
	       "type" => "select",
			"options" => $fontsize,
	       "std" => "18px"),
		   
	array( "name" => __( "H6 headline","lookilite"),
	       "desc" => __( "Select a size for H6 elements","lookilite"),
	       "id" => $shortname."_h6_font_size",
	       "type" => "select",
			"options" => $fontsize,
	       "std" => "16px"),
		   
	array( "type" => "save-button",
	       "value" => "Save",
	       "class" => "Headline font sizes"),

	array( "type" => "end"),

/* END FONT SIZES */ 

),

array( "type" => "endtab"),

/* =================== END FONTS OPTION TAB =================== */


/* =================== COLORS OPTION TAB =================== */

array( "type" => "begintab",
	   "tab" => "Colors",
	   "element" =>
	   
/* START TEXT COLOR */ 

	array( "type" => "form",
	       "name" => "Colors"),

	array( "type" => "start",
	       "val" => "General colors",
	       "name" => __( "General colors","lookilite")),

	array( "name" => __( "Text color","lookilite"),
	       "desc" => __( "Select a color for general text","lookilite"),
	       "id" => $shortname."_text_font_color",
	       "type" => "text",
	       "std" => "#616161"),

	array( "name" => __( "Link color","lookilite"),
	       "desc" => __( "Select a color for link","lookilite"),
	       "id" => $shortname."_link_color",
	       "type" => "text",
	       "std" => "#48c9b0"),

	array( "name" => __( "Link color hover","lookilite"),
	       "desc" => __( "Select a color for link hover","lookilite"),
	       "id" => $shortname."_link_color_hover",
	       "type" => "text",
	       "std" => "#1abc9c"),

	array( "type" => "save-button",
	       "value" => "Save",
	       "class" => "General colors"),

	array( "type" => "end"),

/* END TEXT COLOR */ 

/* START HEADER,SIDEBAR AND FOOTER COLOR */ 

	array( "type" => "form",
	       "name" => "Colors"),

	array( "type" => "start",
	       "val" => "Header, Sidebar and Footer",
	       "name" => __( "Header, Sidebar and Footer","lookilite")),

	array( "name" => __( "Background color","lookilite"),
	       "desc" => __( "Select a color for the background","lookilite"),
	       "id" => $shortname."_bars_background_color",
	       "type" => "text",
	       "std" => "#2D3032"),

	array( "name" => __( "Text color","lookilite"),
	       "desc" => __( "Select a color for the text","lookilite"),
	       "id" => $shortname."_bars_text_color",
	       "type" => "text",
	       "std" => "#ffffff"),

	array( "name" => __( "Borders color","lookilite"),
	       "desc" => __( "Select a color for the borders","lookilite"),
	       "id" => $shortname."_bars_borders_color",
	       "type" => "text",
	       "std" => "#444649"),

	array( "type" => "save-button",
	       "value" => "Save",
	       "class" => "General colors"),

	array( "type" => "end"),

/* END TEXT COLOR */ 

),

array( "type" => "endtab"),
	   
/* =================== END COLORS OPTION TAB =================== */

array( "type" => "endpanel"),  

);

require_once dirname(__FILE__) . '/../panel.php'; 

lookilite_mainpanel( $panel ); 

?>