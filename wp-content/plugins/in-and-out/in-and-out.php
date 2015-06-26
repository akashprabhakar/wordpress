<?php 
/*
  Plugin Name: In and Out Time
  Plugin URI: http://annet.com/
  Description: To maintain daily records of when you enter and when you exit the office
  Author: Prabhakar Mudliyar
  Author URI: http://annet.com/
  Version: v1.0
 */

global $db_version;
$db_version = '1.0';

function install() {
  global $wpdb;
  global $db_version;

  $table_name = 'inouttime';
  
  $charset_collate = $wpdb->get_charset_collate();

  $sql = "CREATE TABLE $table_name (
    id mediumint(9) NOT NULL AUTO_INCREMENT,
    intime TIMESTAMP DEFAULT CURRENT_TIMESTAMP NOT NULL,
    name tinytext NOT NULL,
    text text NOT NULL,
    url varchar(55) DEFAULT '' NOT NULL,
    UNIQUE KEY id (id)
  ) $charset_collate;";

  require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
  dbDelta( $sql );

  add_option( 'db_version', $db_version );
}


register_activation_hook( __FILE__, 'install' );

function inout_admin_menu() {
    add_menu_page('Inouttime', 'INOUTTIME', 'manage_options', 'inout_controller', 'inout_controller_in_admin');
}

add_action('admin_menu', 'inout_admin_menu');


function inout_controller_in_admin() {
  echo "<h1>Game Starts Now..</h1>";
  // require_once('includes/php/inout_admin_menu.php');
}



?>