<?php 

add_action(init, function(){

	register_post_type('Snippet',array(
		'public'=> true,
		'label'=>'Snippets'
		'labels'=>array('add_new_item'=>'Add New Snippet'),
		'supports'=>array('title','editor','comments'),
		'taxonomies'=>array('post_tag')

	));



});












?>