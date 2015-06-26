<?php

/**
 * Wp in Progress
 * 
 * @author WPinProgress
 *
 * This source file is subject to the GNU GENERAL PUBLIC LICENSE (GPL 3.0)
 * It is also available at this URL: http://www.gnu.org/licenses/gpl-3.0.txt
 */

function lookilite_add_menu() {
	global $themename, $adminmenuname, $optionfile;
	add_theme_page("Looki Options", "Theme Options", 'administrator',  'lookilite_option', 'lookilite_option');
	add_theme_page(__('Get Premium', 'lookilite' ), __('Get Premium', 'lookilite' ), 'administrator',  'getpremium', 'lookilite_getpremium');

}

add_action('admin_menu', 'lookilite_add_menu'); 

function lookilite_option() {
		
		$shortname = "lookilite";
		require_once dirname(__FILE__) . '/option/options.php';   

}

function lookilite_add_script() {
	
	 global $wp_version;
     wp_enqueue_style( "thickbox" );
     add_thickbox();

	 $file_dir = get_template_directory_uri()."/core/admin/include";

	 wp_enqueue_style ( 'lookilite_panel', $file_dir.'/css/wip_panel.css' ); 
	 wp_enqueue_style ( 'lookilite_on_off', $file_dir.'/css/wip_on_off.css' );
	 wp_enqueue_style( 'google-fonts', '//fonts.googleapis.com/css?family=Roboto');

	 wp_enqueue_script( 'lookilite_panel', $file_dir.'/js/wip_panel.js',array('jquery','media-upload','thickbox'),'1.0',TRUE ); 
	 wp_enqueue_script( 'lookilite_on_off', $file_dir.'/js/wip_on_off.js','3.5', '', TRUE); 
	
	 wp_enqueue_script( "jquery-ui-core", array('jquery'));
	 wp_enqueue_script( "jquery-ui-tabs", array('jquery'));
	 wp_enqueue_script( "jquery-ui-sortable", array('jquery'));

}

add_action('admin_init', 'lookilite_add_script');

function lookilite_save_option ( $panel ) {
	
	global $message_action;
	
	$lookilite_setting = get_option( lookilite_themename() );
	
	if ( $lookilite_setting != false ) {
			$lookilite_setting = maybe_unserialize( $lookilite_setting );
		} 
						
	else {
			$lookilite_setting = array();
	} 
	
	if ( "Save" == lookilite_request('action') ) {
				
		foreach ($panel as $element ) 
		{
			
			if ( ( isset($element['tab']) )  && ( $element['tab'] == $_GET['tab'] ) ){
					
				foreach ($element as $value )
		
					{
		
						if ( $_REQUEST['element-opened'] == "Skins" ) {
								
								require_once dirname(__FILE__) . '/option/skins.php';
								update_option( lookilite_themename(), array_merge( $lookilite_setting  ,$current) );
								break;
							} 
						
						else if ( ( isset( $value['id']) ) && ( isset( $_POST[$value["id"]] ) ) ) {	
								
								$current[$value["id"]] = $_POST[$value["id"]]; 
								update_option( lookilite_themename(), array_merge( $lookilite_setting  ,$current) );
							}
							
						$message_action = 'Options saved successfully.';
					
					}
				
				}
		
			}
		}
}
function lookilite_message () {
	
		global $message_action;
		
		if (isset($message_action)):
		
			echo '<div id="message" class="updated fade message_save wip_message"><p><strong>'.$message_action.'</strong></p></div>';
		
		endif;
		
	}

function lookilite_getpremium() {	?>

	<a href="<?php echo esc_url('http://www.themeinprogress.com/looki/?ref=panel'); ?>" target="_blank" >
    	<img src="<?php echo get_template_directory_uri()."/core/admin/include/images/"; ?>lookipremium.jpg" alt="Get Premium" style="margin:15px auto" />
    </a>

<?php } ?>
