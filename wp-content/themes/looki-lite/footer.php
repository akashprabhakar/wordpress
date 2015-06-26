<footer id="footer">
	<div class="container">
		<div class="row" >
             
			<div class="col-md-12" >
               
                <div class="copyright left">

                    <p>
                        <?php if (lookilite_setting('lookilite_copyright_text')): ?>
                           <?php echo stripslashes(lookilite_setting('lookilite_copyright_text')); ?>
                        <?php else: ?>
                          <?php _e('Copyright','lookilite'); ?> <?php echo get_bloginfo("name"); ?> <?php echo date("Y"); ?> 
                        <?php endif; ?> 
                        | <?php _e('Theme by','lookilite'); ?> <a href="<?php echo esc_url('http://www.themeinprogress.com/'); ?>" target="_blank">Theme in Progress</a> |
                        <a href="<?php echo esc_url( __( 'http://wordpress.org/', 'lookilite' ) ); ?>" title="<?php esc_attr_e( 'A Semantic Personal Publishing Platform', 'lookilite' ); ?>" rel="generator"><?php printf( __( 'Proudly powered by %s', 'lookilite' ), 'WordPress' ); ?></a>
                    
                    </p>

				</div>
            
                <div class="back-to-top"><i class="fa fa-chevron-up"></i> </div>
                
                <div class="clear"></div>
                
			</div>
                
		</div>
	</div>
</footer>

</div>

<?php wp_footer() ?>  
 
</body>

</html>