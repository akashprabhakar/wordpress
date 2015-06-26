<?php

class timesheet_list {

  function add_timesheet_list($date, $proj_name, $proj_desc, $dev_name, $reference, $hours, $solution) {
    
    global $wpdb;
    $date = mysql_real_escape_string(stripslashes($date));
    $proj_name = mysql_real_escape_string(stripslashes($proj_name));
    $proj_desc = mysql_real_escape_string(stripslashes($proj_desc));
    $dev_name = mysql_real_escape_string(stripslashes($dev_name));
    $reference = mysql_real_escape_string(stripslashes($reference));
    $solution = mysql_real_escape_string(stripslashes($solution));
    $hours = mysql_real_escape_string(stripslashes($hours));
 
 

    $table_name = 'timesheet';
  
 	$wpdb->insert( 
    $table_name, 
    array( 
      'task_date' => $date, 
      'proj_name' => $proj_name, 
      'proj_desc' => $proj_desc,
      'reference' => $reference, 
      'dev_name' => $dev_name, 
      'hours' => $hours, 
      'solution' => $solution,  
    ) 
  );

 	return 1;

  }

  

}

?>
