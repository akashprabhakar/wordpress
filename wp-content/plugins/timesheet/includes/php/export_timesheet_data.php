<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/wp/wp-load.php' );

// Make sure to use some namespacing for your functions:
// Mine for this example: "fz_csv_"

if($_POST['Submit']){

	$start = $_POST['start_dt'];
		$end = $_POST['end_dt'];
	global $wpdb;
	
	function fz_csv_export() {
	    // This line gets the WordPress Database Object
	    global $wpdb;

	    // Here's the query, split up for easy reading
	   	// $qry = "SELECT * FROM timesheet";
		// $boardResult = $wpdb->get_results($boardQuery);
		$start = $_POST['start_dt'];
		$end = $_POST['end_dt'];
			// $qry = "SELECT * FROM timesheet WHERE task_date=". "'".$start."'". '"';
	    // Use the WordPress database object to run the query and get
	    // the results as an associative array
	     $result = $wpdb->get_results("select * from timesheet where task_date between '" . $start . "' AND '" . $end . "' ", ARRAY_A);
	
	    	
	    // Check if any records were returned from the database
	    if ($wpdb->num_rows > 0) {
	        // Make a DateTime object and get a time stamp for the filename
	      
	        $date = new DateTime();
	        $ts = $date->format("d-m-Y-G-i-s");

	        // A name with a time stamp, to avoid duplicate filenames
	        $filename = "Timesheet-$ts.csv";
	       
	        // Tells the browser to expect a csv file and bring up the
	        // save dialog in the browser
	        header( 'Content-Type: text/csv' );
	        header( 'Content-Disposition: attachment;filename='.$filename);

	        // This opens up the output buffer as a "file"
	        $fp = fopen('php://output', 'w');

	        // Get the first record
	        $hrow = $result[0];
	        // var_dump(array_keys($hrow));
	        // Extracts the keys of the first record and writes them
	        // to the output buffer in csv format
	        fputcsv($fp, array_keys($hrow), ";");

	        // Then, write every record to the output buffer in csv format
	        foreach ($result as $data) {
	            fputcsv($fp, $data, ";");
	        }

	        // Close the output buffer (Like you would a file)
	        fclose($fp);
	       
	        // Send the size of the output buffer to the browser
	        $contLength = ob_get_length();
	        header( 'Content-Length: '.$contLength);
	    }
	}
	// This function removes all content from the output buffer
	ob_end_clean();
	
	if(($wpdb->get_results("select * from timesheet where task_date between '" . $start . "' AND '" . $end . "' ", ARRAY_A))==true){
		// Execute the function
		fz_csv_export();
	}else{
		//Return error message if no records found
		wp_die('No records found for the respective dates', 'Error',  array('back_link' => true ));
	}
}

if($_POST['Submit1']){
	global $wpdb;

	function fz_csv_export() {
	    // This line gets the WordPress Database Object
	    global $wpdb;

	    // Here's the query, split up for easy reading
	   	$qry = "SELECT * FROM timesheet";
		// $boardResult = $wpdb->get_results($boardQuery);
		$start = $_POST['start_dt'];

	    // Use the WordPress database object to run the query and get
	    // the results as an associative array
	     $result = $wpdb->get_results("SELECT * FROM timesheet", ARRAY_A);
	    
	    	
	    // Check if any records were returned from the database
	    if ($wpdb->num_rows > 0) {
	        // Make a DateTime object and get a time stamp for the filename
	      
	        $date = new DateTime();
	        $ts = $date->format("d-m-Y-G-i-s");

	        // A name with a time stamp, to avoid duplicate filenames
	        $filename = "Timesheet-$ts.csv";
	       
	        // Tells the browser to expect a csv file and bring up the
	        // save dialog in the browser
	        header( 'Content-Type: text/csv' );
	        header( 'Content-Disposition: attachment;filename='.$filename);

	        // This opens up the output buffer as a "file"
	        $fp = fopen('php://output', 'w');

	        // Get the first record
	        $hrow = $result[0];
	        // var_dump(array_keys($hrow));
	        // Extracts the keys of the first record and writes them
	        // to the output buffer in csv format
	        fputcsv($fp, array_keys($hrow), ";");

	        // Then, write every record to the output buffer in csv format
	        foreach ($result as $data) {
	            fputcsv($fp, $data, ";");
	        }

	        // Close the output buffer (Like you would a file)
	        fclose($fp);
	       
	        // Send the size of the output buffer to the browser
	        $contLength = ob_get_length();
	        header( 'Content-Length: '.$contLength);
	    }
	}
	// This function removes all content from the output buffer
	ob_end_clean();
	
	
		// Execute the function
		fz_csv_export();
	
}
?>

<style>
	.space{
		margin-bottom: 50px;	
	}

	.btn-primary{
		width:200px;
		
	}
	.btn-default{
		width:200px;
		
	}
</style>


<div class="row">
   
    <form method="post" name="fz_csv_exporter_form" action="">
        <h3 style="margin-bottom:100px;">Press the button below to export all timesheet information.</h3>
       
    	<div class="row">
			<div class="form-group">
				<div class="col-md-12 space">
				<label for="exampleInputEmail1">Enter the respective dates for which you want to get the records..</label>
				</div>
				<div class="col-md-4 space">
	  				<input type="text" class="form-control" id="start_dt" name="start_dt" placeholder="Enter start date..">
	  			</div>
	  			<div class="col-md-4 space">
	  				<h4>TO</h4>
	  			</div>
	  			<div class="col-md-4 space">
	  				<input type="text" class="form-control" id="end_dt" name="end_dt" placeholder="Enter end date..">
	  			</div>
			</div>
  		</div>
  	<div class="col-md-6">
  		<input type="submit" class="btn btn-default" name="Submit" value="Export Data" />
  	</div>
  	<div class="col-md-6">
  		<input type="submit" class="btn btn-primary" name="Submit1" value="Export All Data" />
  	</div>
    </form>
</div>