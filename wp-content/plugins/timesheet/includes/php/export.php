<?php
// This includes gives us all the WordPress functionality
include_once($_SERVER['DOCUMENT_ROOT'].'/wp/wp-load.php' );

// Make sure to use some namespacing for your functions:
// Mine for this example: "fz_csv_"
function fz_csv_export() {
    // This line gets the WordPress Database Object
    global $wpdb;

    // Here's the query, split up for easy reading
   	$qry = "SELECT * FROM timesheet";
	// $boardResult = $wpdb->get_results($boardQuery);
	

    // Use the WordPress database object to run the query and get
    // the results as an associative array
    $result = $wpdb->get_results(implode(" ", $qry), ARRAY_A);

    // Check if any records were returned from the database
    if ($wpdb->num_rows > 0) {
        // Make a DateTime object and get a time stamp for the filename
        $date = new DateTime();
        $ts = $date->format("Y-m-d-G-i-s");

        // A name with a time stamp, to avoid duplicate filenames
        $filename = "report-$ts.csv";
        echo $filename;
        // Tells the browser to expect a csv file and bring up the
        // save dialog in the browser
        header( 'Content-Type: text/csv' );
        header( 'Content-Disposition: attachment;filename='.$filename);

        // This opens up the output buffer as a "file"
        $fp = fopen('php://output', 'w');

        // Get the first record
        $hrow = $result[0];

        // Extracts the keys of the first record and writes them
        // to the output buffer in csv format
        fputcsv($fp, array_keys($hrow));

        // Then, write every record to the output buffer in csv format
        foreach ($result as $data) {
            fputcsv($fp, $data);
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
?>