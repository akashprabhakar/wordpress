<?php 

/**
 * Wp in Progress
 * 
 * @author WPinProgress
 *
 * This source file is subject to the GNU GENERAL PUBLIC LICENSE (GPL 3.0)
 * It is also available at this URL: http://www.gnu.org/licenses/gpl-3.0.txt
 */

function lookilite_header_content() {
	
	if ( ( is_page()) && (lookilite_postmeta('lookilite_slogan')) ) : ?>
	
	<section id="subheader">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<p> <?php echo lookilite_postmeta('lookilite_slogan'); ?> </p>
				</div>
			</div>
		</div>
	</section>
	
<?php 
	
	endif;

}

?>