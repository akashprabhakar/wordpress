<?php
/*
  Plugin Name: Finance About 
  Plugin URI: HTTP://WWW.ANNET.COM
  Description: About
  Author: Annet Technologies
  Version: 1.0
  Author URI: http://www.annet.com/
 */




  //-----------------function for custom post types---------------
function add_post_types($name, $args = array()){
	add_action('init', function() use($name,$args){
		$caps = ucwords($name);
		$name = strtolower(str_replace(' ','_',$name));

		$args = array_merge(
				 array(
					'public'=> true,
					'label'=> $caps,
					'labels'=>array('add_new_item'=>"Add New $caps"),
					'supports'=>array('title','editor','comments')
				),
				 $args
			);
		register_post_type( $name, $args);

	});

}

add_post_types('about', array(
		'supports' => array('title','editor','comments','excerpt','thumbnail'),
		'taxonomies'=>array('post_tag')
));

add_post_types('finance', array(
		'supports' => array('title','editor')
));


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



add_taxonomy('about-category','about', array(
		'hierarchical' => true

	));



add_action('add_meta_boxes', function(){

	add_meta_box(
		'fh_pdf_info',
		'Pdf Link',
		'fh_pdf_info_cb',
		'about',
		'normal',
		'high'
		

	);


});


function fh_pdf_info_cb() {
	global $post;
	$url = get_post_meta($post->ID,'fh_pdf_url',true);
	
	//securtiy check
	wp_nonce_field(__FILE__,'fh_nonce');
	?>
	<label for="fh_pdf_url">Link PDF Document:</label>
	<input type="text" name="fh_pdf_url" id="fh_pdf_url" class="widefat" value="<?php echo $url; ?>" />

	<?php
}

add_action('save_post',function(){
	global $post;

	if(defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;


	//securtiy check
	if($_POST && wp_verify_nonce($_POST['fh_nonce'],__FILE__)){
		if( isset($_POST['fh_pdf_url'])){
		update_post_meta($post->ID,'fh_pdf_url',$_POST['fh_pdf_url']);
		}

	}

	


});


	function displayAbout() {
    echo "<div style='float:left;'>";
    echo "<ul>";
    global $wpdb;
    $details ="";
    $args_post = array(
        'numberposts' =>-1,
        'post_type' => 'about',
        'post_status' => 'publish');
    $arg_post_data = get_posts($args_post);

    ?>
   
	<div class="col-md-4">
	<h1>Categories</h1>
	</div>
	<div class="col-md-8"> 

		<?php


		    if ($arg_post_data) {
		        foreach ($arg_post_data as $post_data) {
		            $each_faq = (array) $post_data;
		            $id = $each_faq['ID'];
		            $post_title = $each_faq['post_title'];
		            $post_content = $each_faq['post_content'];
		            $url = wp_get_attachment_url( get_post_thumbnail_id($id) );
		?>


		            <div class="wrapper1">
						<img src="<?php echo $url?>" class="usr-img" alt="">
						<div class"usr-article">
					   		<h4><?php echo $post_title ?></h4>
						    <p>
						      
						    </p>
					  	</div>
					 </div>

		<?php
		        }
		        // echo $details;	
		    } else {
		        echo "No data";
		    }
		}


		?>

</div>
	</div>
	</div>
<?php
add_shortcode('about-about', 'displayAbout');

?>


 
                    <!-- <img class="user_img" src="http://i.imgur.com/8R9Ablw.jpg" alt=""> -->
                   