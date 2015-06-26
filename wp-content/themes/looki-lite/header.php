<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
   
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />

<?php if (lookilite_setting('lookilite_custom_favicon')) : ?>
	<link rel="shortcut icon" href="<?php echo esc_url(lookilite_setting('lookilite_custom_favicon')); ?>"/>
<?php endif; ?>

<title><?php wp_title( '|', true, 'right' ); ?></title>

<link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>" media="screen" />

<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.2, user-scalable=yes" />

<!--[if IE 8]>
    <script src="<?php echo get_template_directory_uri(); ?>/scripts/html5.js" type="text/javascript"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/scripts/selectivizr-min.js" type="text/javascript"></script>
<![endif]-->

<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>

<header id="header">
    <div class="container">
        <div class="row">
        
        	<div class="col-md-12">
            
            	<div id="logo">
                
            	<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php bloginfo('name') ?>">

                	<?php 
					   				
                    	if ( lookilite_setting('lookilite_custom_logo') ):
                        	echo "<img src='".esc_url(lookilite_setting('lookilite_custom_logo'))."' alt='logo'>"; 
                        else: 
                        	echo "<img src='".esc_url(get_template_directory_uri()."/images/logo/logo.png")."' alt='logo'>"; 
                        endif; 
						
					?>
                            
                </a>
                
                </div>
                
                <div class="navigation"><i class="fa fa-bars"></i> </div>
				
                <div class="clear"></div>
            
            </div>
            
        </div>
    </div>
</header>

<?php get_sidebar(); ?>

<div id="wrapper">