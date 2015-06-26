<?php

function lookilite_add_widgets() {

	register_sidebar(array(
	
		'name' => 'Sidebar',
		'id'   => 'side-sidebar-area',
		'description'   => 'This sidebar will be shown after the content.',
		'before_widget' => '<div class="post-article">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="title">',
		'after_title'   => '</h3>'
	
	));

	register_sidebar(array(
	
		'name' => 'Home Sidebar',
		'id'   => 'home-sidebar-area',
		'description'   => 'This sidebar will be shown in the homepage.',
		'before_widget' => '<div class="post-article">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="title">',
		'after_title'   => '</h3>'
	
	));

	register_sidebar(array(
	
		'name' => 'Category Sidebar',
		'id'   => 'category-sidebar-area',
		'description'   => 'This sidebar will be shown at the side of content.',
		'before_widget' => '<div class="post-article">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="title">',
		'after_title'   => '</h3>'
	
	));

	register_sidebar(array(
	
		'name' => 'Search Sidebar',
		'id'   => 'search-sidebar-area',
		'before_widget' => '<div class="post-article">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="title">',
		'after_title'   => '</h3>'
	
	));

}

add_action( 'widgets_init', 'lookilite_add_widgets' );

?>