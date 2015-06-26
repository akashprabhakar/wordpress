<?php 

/**
 * Wp in Progress
 * 
 * @author WPinProgress
 *
 * This source file is subject to the GNU GENERAL PUBLIC LICENSE (GPL 3.0)
 * It is also available at this URL: http://www.gnu.org/licenses/gpl-3.0.txt
 */

function lookilite_get_title() {
	
	global $post;
	
	$title = get_the_title();
	
	if (!empty($title)) {
	
		if ( (is_home()) || (is_category()) || is_page_template('masonry-four-columns.php') || is_page_template('masonry-three-columns.php') || is_page_template('masonry-two-columns.php') || (is_search()) || (is_tax()) || (is_tag()) ){ ?>
			
            <div class="post-article post-title">	
                <h2 class="title"> <a href="<?php echo get_permalink($post->ID); ?>"> <?php echo $title; ?> </a> </h2>
			</div>
	
		<?php } else if (is_single()) { ?>
			
            <div class="post-article post-title">	
                <h1 class="title left"> <?php echo $title; ?> </h1>
                <div class="post-date right"> <?php echo get_the_date('m.d.Y'); ?> </div>
                <div class="clear"></div>
			</div>
            
		<?php } else if (is_page()) { ?>
			
            <div class="post-article post-title">	
                <h1 class="title left"> <?php echo $title; ?> </h1>
                <div class="clear"></div>
			</div>
            
		<?php }
		
	}
	
}

?>