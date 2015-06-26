<?php get_header(); ?>

<div class="container content">
	
    <div class="row">
       
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?> >
            
            <?php if ( have_posts() ) : while ( have_posts() ) : the_post();
            
                do_action('lookilite_postformat');
    
            ?>
                
            <div style="clear:both"></div>
            
        </article>
    
		<?php comments_template(); ?>
        
        <?php endwhile; get_template_part('pagination'); endif;?>
           
    </div>
    
</div>

<?php get_footer(); ?>