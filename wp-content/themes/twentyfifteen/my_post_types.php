<?php 


//-----------------function for custom post types---------------
function add_post_types($name, $args = array()){
	add_action('init', function() use($name,$args){
		$caps = ucwords($name);
		$name = strtolower(str_replace(' ','_',$name));

		$args = array_merge(
				 array(
					'public'=> true,
					'label'=> $caps."s",
					'labels'=>array('add_new_item'=>"Add New $caps"),
					'supports'=>array('title','editor','comments')
				),
				 $args
			);
		register_post_type( $name, $args);

	});

}


//-----------------fucntion for custom taxonomies-----------------


function add_taxonomy($name, $post_type, $args=array()){

	
	$name = strtolower($name);

	add_action('init', function() use($name ,$post_type,$args){

		$args = array_merge(
			 array(
				'label'=>ucwords($name)
			),
			 $args
		);

		register_taxonomy($name, $post_type, $args);

	});


}



add_action('add_meta_boxes', function(){

	add_meta_box(
		'pm_snippet_info',
		'Snippet Info',
		'pm_snippet_info_cb',
		'snippet',
		'normal',
		'high'
		

	);


});


function pm_snippet_info_cb() {
	global $post;
	$url = get_post_meta($post->ID,'pm_associated_url',true);
	
	//securtiy check
	wp_nonce_field(__FILE__,'pm_nonce');
	?>
	<label for="pm_associated_url">Associated URl:</label>
	<input type="text" name="pm_associated_url" id="pm_associated_url" class="widefat" value="<?php echo $url; ?>" />

	<?php
}

add_action('save_post',function(){
	global $post;

	if(defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;


	//securtiy check
	if($_POST && wp_verify_nonce($_POST['pm_nonce'],__FILE__)){
		if( isset($_POST['pm_associated_url'])){
		update_post_meta($post->ID,'pm_associated_url',$_POST['pm_associated_url']);
		}

	}

	


});


	
?>