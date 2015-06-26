<?php
/**
 * Template Name: About
 
 * Description: About page template.
 * @package asplundh
 */

get_header(); ?>
<div class="before_banner">
     <?php //echo get_the_post_thumbnail( $post_id, 'banner-image-large' ); 
     $src = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), false, '' );
    ?>
<!--<div id="banner" class="inner_banner_background about" style="background-image: url(<?php echo $src[0]; ?>)">   
</div>-->
     <img src="<?php echo $src[0]; ?>" alt="" id="banner" class="inner_banner_background about"/>
</div>
<div id="iconwrapper">
<div class="belowimage">
  <?php if (function_exists('dynamic_sidebar') && dynamic_sidebar('asplundh-social-links')) : else : ?>
            <?php endif; ?>
</div>
</div>

<!-- top area ends here-->

<!-- main body starts here -->

<!--Main-Content-Start-->
     

<?php echo do_shortcode('[about-sections]');
?>
    
 
<div id="innerbottom">
<div class="leftstretch">
<div class="container">
<div class="leftbox">
<?php if (function_exists('dynamic_sidebar') && dynamic_sidebar('asplundh-subsidiary-logo')) : else : ?>
                     <?php endif; ?>
</div>

<div class="rightbox">
<div class="contact-column">
  <?php if (function_exists('dynamic_sidebar') && dynamic_sidebar('asplundh-contact-info')) : else : ?>
                     <?php endif; ?>
</div>
 <div class="seprator"></div>
<div class="employ-column">
 <?php if (function_exists('dynamic_sidebar') && dynamic_sidebar('asplundh-employment')) : else : ?>
                     <?php endif; ?>
</div>
</div>

</div>
</div>
</div>
                
        <!--Main-Content-End-->
<?php get_footer(); ?>
