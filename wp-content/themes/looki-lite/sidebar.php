<div class="scroll-sidebar">
	
    <div class="post-article">
        <nav id="mainmenu">
        	<h3 class="title">Menu</h3>
            <?php wp_nav_menu( array('theme_location' => 'main-menu', 'container' => 'false','depth' => 3  )); ?>
        </nav> 
	</div>

	<?php 
		
		if (is_home()) { 
			dynamic_sidebar('home-sidebar-area');
		} 
		
		else if ( (is_category()) || (is_tax()) || (is_month()) || (is_tax()) ) {
			dynamic_sidebar('category-sidebar-area');
		}

		else if (is_search()) {
			dynamic_sidebar('search-sidebar-area');
		}
		
		else if ( (is_single()) || (is_page()) ) {
			dynamic_sidebar('side-sidebar-area');
		}
	
	?>
    
    <?php do_action('lookilite_socials'); ?>
    
</div>