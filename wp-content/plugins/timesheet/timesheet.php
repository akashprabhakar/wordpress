<?php 
/*
  Plugin Name: Timesheet
  Plugin URI: http://annet.com/
  Description: To maintain daily work log
  Author: Prabhakar Mudliyar
  Author URI: http://annet.com/
  Version: v1.0
 */

  





global $db_version;
$db_version = '1.0';

function jal_install() {
  global $wpdb;
  global $db_version;

  $table_name ='timesheet';
  
  $charset_collate = $wpdb->get_charset_collate();

  $sql = "CREATE TABLE $table_name (
    id mediumint(9) NOT NULL AUTO_INCREMENT,
    task_date varchar(100) NOT NULL,
    proj_name varchar(55) NOT NULL,
    proj_desc text NOT NULL,
    reference varchar(50) NOT NULL,
    dev_name varchar(50) NOT NULL,
    hours int(20) NOT NULL,
    solution text DEFAULT '' NOT NULL,
    UNIQUE KEY id (id)
  ) $charset_collate;";

  require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
  dbDelta( $sql );

  add_option( 'db_version', $db_version );
}

function jal_install_data() {
  global $wpdb;
  
  $welcome_name = 'Mr. WordPress';
  $welcome_text = 'Congratulations, you just completed the installation!';
  
  $table_name = 'timesheet';
  
  $wpdb->insert( 
    $table_name, 
    array( 
      'task_date' => current_time( 'mysql' ), 
      'proj_name' => $welcome_name, 
      'proj_desc' => $welcome_text,
      'reference' => $welcome_text, 
      'solution' => $welcome_text,  
    ) 
  );
}

register_activation_hook( __FILE__, 'jal_install' );
// register_activation_hook( __FILE__, 'jal_install_data' );

function timesheet_admin_menu() {
    add_menu_page('Timesheet', 'Timesheet', 'manage_options', 'timesheet_controller', 'timesheet_controller_in_admin');
}

add_action('admin_menu', 'timesheet_admin_menu');


function timesheet_controller_in_admin() {
  echo "<h1>Game Starts Now..</h1>";
  require_once('includes/php/timesheet_admin_menu.php');
}

function create_timesheet_list_fn() {
    require_once 'includes/php/create_timesheet_list.php';
}
add_shortcode('create_timesheet_list', 'create_timesheet_list_fn');

function display_timesheet_list_fn() {
    require_once 'includes/php/display_timesheet_list.php';
}
add_shortcode('display_timesheet_list', 'display_timesheet_list_fn');

function export_timesheet_data_fn() {
    require_once 'includes/php/export_timesheet_data.php';
}
add_shortcode('export_timesheet_data', 'export_timesheet_data_fn');

function add_deal_script_sss() {
    if (true) {
        $js = WP_PLUGIN_URL . "/board_list/includes/js/";
        $path_js = get_template_directory_uri();
        ob_start();
        //js
        wp_enqueue_script('jquery');
        wp_enqueue_script('jquery-ui-core');
        wp_enqueue_script('jquery-ui-datepicker');
        wp_enqueue_style( 'jquery-ui-datepicker' );
        //js
    }
}

add_action('wp-head', 'add_deal_script_sss');



?>