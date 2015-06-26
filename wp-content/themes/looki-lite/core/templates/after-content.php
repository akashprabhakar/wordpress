<?php 

/**
 * Wp in Progress
 * 
 * @author WPinProgress
 *
 * This source file is subject to the GNU GENERAL PUBLIC LICENSE (GPL 3.0)
 * It is also available at this URL: http://www.gnu.org/licenses/gpl-3.0.txt
 */

function lookilite_after_content_function() {

	if ((is_home()) || (is_category()) || (is_search()) || (is_tag()) || ( (is_page()) && (get_post_type() <> "page")) ):
		
		lookilite_excerpt();
		 
	?>

        <div class="post-info">
            <div class="left"> <?php echo get_the_date('m.d.Y'); ?> </div>
            <div class="right"> <?php the_category(', '); ?> </div>
        </div>
            
        <div class="clear"></div>

	<?php else:
	
		the_content();

		if ( get_post_format() )  {
			echo '<footer class="line"><strong>'.__( 'Post type',"lookilite").':</strong> '.ucfirst(get_post_format()).'</footer>';
		} 

		if (get_post_type() == "post") { 
		
	?>
        <div class="post-info">
            <div class="left"> <?php the_category(', '); ?> </div>
            <div class="right"> <?php the_tags( 'Tags: ', ', ', '' ); ?>  </div>
        </div>
            
        <div class="clear"></div>

    <?php
		
		}
		
	endif; ?>

<?php

} 

add_action( 'lookilite_after_content', 'lookilite_after_content_function', 10, 2 );

?>