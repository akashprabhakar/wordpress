<?php
/**
* Template Name: Custom Post List
*/
get_header(); ?>
 <style type="text/css">
 .row1 {
 	position: relative;
 	
 }
 </style>
<div id="ww">
      <div class="container">
      <div class="row">
  <div class="col-lg-8 col-lg-offset-2 centered row1">
      <?php while( have_posts() ) : the_post(); ?>

          <?php if ( has_post_thumbnail()) : ?>
              <?php the_post_thumbnail(); ?>
          <?php endif; ?>
          <h1> <?php the_title(); ?></h1>
           <?php the_content(); ?>
           <p></p>
            <?php endwhile; ?>
              </div><!-- /col-lg-8 -->
               </div><!-- /row -->
      </div> <!-- /container -->
  </div><!-- /ww -->

 
<?php
get_footer();

?>