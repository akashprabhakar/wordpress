<?php 
	global $wpdb;
	$boardQuery = 'SELECT * FROM  `timesheet` order by sequence';
	// $boardResult = $wpdb->get_results($boardQuery);
	$boardResult = $wpdb->get_results( "SELECT * FROM timesheet" );
	
    //print_r($boardResult);
   
  echo $_POST['submit'];
?>
<style>
.col-md-12{
	float: right;
	margin-top:50px;
}
</style>


<div class="row">
<table class="table table-hover">
  <tr>
  	<th>Date</th>
  	<th>Project Name</th>
  	<th>Description Of Task</th>
  	<th>Developer Name</th>
  	<th>Reference</th>
  	<th>Hours</th>
  	<th>Solution</th>
  </tr>
  
 <?php
 	foreach ($boardResult as $value) {
 	echo "<tr>";
 	echo "<td>".$value->task_date."</td>";
  	echo "<td>".$value->proj_name."</td>";
  	echo "<td>".$value->proj_desc."</td>";
  	echo "<td>".$value->dev_name."</td>";
  	echo "<td>".$value->reference."</td>";
  	echo "<td>".$value->hours."</td>";
  	echo "<td>".$value->solution."</td>";
  	echo "</tr>";
}
 ?>
  	

</table>
</div>

<div class="col-md-6">
  		<a href="http://localhost/wordpress/" class="btn btn-primary">Add New Records</a>
</div>
<div class="col-md-6 ">
      <a href="http://localhost/wordpress/export-timesheet-data/" class="btn btn-primary">Export CSV Data</a>
    </div>
