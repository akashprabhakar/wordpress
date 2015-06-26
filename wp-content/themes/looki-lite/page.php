<?php 

	/**
	 * Wp in Progress
	 * 
	 * @author WPinProgress
	 *
	 * This source file is subject to the GNU GENERAL PUBLIC LICENSE (GPL 3.0)
	 * It is also available at this URL: http://www.gnu.org/licenses/gpl-3.0.txt
	 */

	get_header(); 
	lookilite_header_content();

?> 

<div class="container content">

    <div class="row" >
    
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?> >
		
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
       
			<?php do_action('lookilite_postformat'); ?> 

			<?php wp_link_pages(); ?>

			<?php endwhile; endif;?>
    
        </article>

		<?php comments_template(); ?>

    </div>
    
</div>

<?php get_footer(); ?>