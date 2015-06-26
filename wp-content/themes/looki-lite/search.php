<?php get_header(); ?>

<section id="subheader">
	
    <div class="container">
    	
        <div class="row">
            
            <div class="col-md-12">
            
            	<h1><?php _e( '<span>Search </span> results for: ', 'lookilite' ); echo $s; ?></h1>
                
            </div>   
                 
		</div>
        
    </div>
    
</section>

<div class="container content">

	<div class="row">
                
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
           
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				
				<?php do_action('lookilite_postformat'); ?>
                
			</article>

		<?php endwhile; else:  ?>

			<article class="post-container col-md-12">

                <div class="post-article">
    
                    <h2> <?php _e( 'Content not found',"lookilite" ) ?> </h2>           
                    
                    <p> <?php _e( 'The page that you requested, was not found.','lookilite'); ?> </p>
    
                    <h3> <?php _e( 'What can i do?',"lookilite" ) ?> </h3>           
    
                    <p> <a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php bloginfo('name') ?>"> <?php _e( 'Back to the homepage','lookilite'); ?> </a> </p>
                  
                    <p> <?php _e( 'Check the typed term','lookilite'); ?> </p>

                    <p> <?php _e( 'Make a new search, from the below form:','lookilite'); ?> </p>
                    
                    <section class="contact-form">
                    
                        <form method="get" id="searchform" action="<?php echo home_url( '/' ); ?>">
                             <input type="text" value="<?php _e( 'Search', 'lookilite' ) ?>" name="s" id="s" onblur="if (this.value == '') {this.value = '<?php _e( 'Search', 'lookilite' ) ?>';}" onfocus="if (this.value == '<?php _e( 'Search', 'lookilite' ) ?>') {this.value = '';}" class="input-search"/>
                             <input type="submit" id="searchsubmit" class="button-search" value="<?php _e( 'Search', 'lookilite' ) ?>" />
                        </form>
                        
                        <div class="clear"></div>
                        
                    </section>
    
                </div>

			</article>

		<?php endif; ?>
                
	</div>
            
	<?php get_template_part('pagination'); ?>
		
</div>

<?php get_footer(); ?>