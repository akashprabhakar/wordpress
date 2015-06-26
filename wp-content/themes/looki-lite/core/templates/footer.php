<?php

/**
 * Wp in Progress
 * 
 * @author WPinProgress
 *
 * This source file is subject to the GNU GENERAL PUBLIC LICENSE (GPL 3.0)
 * It is also available at this URL: http://www.gnu.org/licenses/gpl-3.0.txt
 */

/*-----------------------------------------------------------------------------------*/
/* Socials */
/*-----------------------------------------------------------------------------------*/ 

function lookilite_socials_function() {
	
	$socials = array ( 
		"fa fa-facebook" => "facebook" , 
		"fa fa-twitter" => "twitter" ,
		"fa fa-flickr" => "flickr" ,
		"fa fa-google-plus" => "google" ,
		"fa fa-linkedin" => "linkedin" ,
		"fa fa-pinterest" => "pinterest" ,
		"fa fa-tumblr" => "tumblr" ,
		"fa fa-youtube" => "youtube" ,
		"fa fa-skype" => "skype" ,
		"fa fa-instagram" => "instagram" ,
		"fa fa-github" => "github" ,
		"fa fa-envelope" => "email" ,
	);
	
	$i = 0;
	$html = "";
	
	foreach ( $socials as $social_icon => $social_name) { 
	
		if (lookilite_setting('lookilite_footer_'.$social_name.'_button')): 
			$i++;	
            $html.= '<a href="'.esc_url(lookilite_setting('lookilite_footer_'.$social_name.'_button')).'" target="_blank" class="social"> <i class="'.$social_icon.'" ></i> </a> ';
		endif;
		
	}
	
	if (lookilite_setting('lookilite_footer_rss_button') == "on"): 
		$i++;	
		$html.= '<a href="'. esc_url(get_bloginfo('rss2_url')). '" title="Rss" class="social rss"> <i class="fa fa-rss" ></i>  </a> ';
	endif; 
		
	if ( $i > 0 ) {
		
	?>

    <div class="post-article">
    	
        <div class="socials">
			
			<?php echo $html; ?>
                        
		</div>
        
	</div>

	<?php

	}
	
}

add_action( 'lookilite_socials', 'lookilite_socials_function', 10, 2 );

?>