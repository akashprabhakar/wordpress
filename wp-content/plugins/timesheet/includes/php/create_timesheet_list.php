<?php 

require_once('timesheet_list.class.php');
$work_log = new timesheet_list;

if($_POST){
	echo "<h1>Success</h1>";
	$date = $_POST['date'];
	echo "Date:".$_POST['date'];
	$proj_name = $_POST['proj_name'];
	echo "Project Name:".$_POST['proj_name'];
	$proj_desc = $_POST['proj_desc'];
	echo "Description Of Task:".$_POST['proj_desc'];
	$dev_name = $_POST['dev_name'];
	echo "Developer Name:".$_POST['dev_name'];
	$reference = $_POST['reference'];
	echo "Reference:".$_POST['reference'];
	$solution = $_POST['solution'];
	echo "Solution:".$_POST['solution'];
	$hours = $_POST['hours'];

	$ret = $work_log->add_timesheet_list($date, $proj_name, $proj_desc, $dev_name, $reference, $hours, $solution);
	
	if($ret == 1){
		echo "<script>alert('Record Successfully Added..');</script>";
	}
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

<script type="text/javascript">
	
</script>


<div class="row">
<form id="timesheet" action="?page=timesheet_controller" method="post" enctype="multipart/form-data">
	<div class="form-group">
		<div class="col-md-4">
			<label for="exampleInputEmail1">Date</label>
		</div>
		<div class="col-md-8 space">
	  		<input type="text" class="form-control" id="date" name="date" placeholder="Enter date of the task performed..">
	  	</div>
	</div>
  	
  	<div class="form-group">
		<div class="col-md-4">
			<label for="exampleInputEmail1">Project Name</label>
		</div>
		<div class="col-md-8 space">
	  		<input type="text" class="form-control" id="proj_name" name="proj_name" placeholder="Enter project name..">
	  	</div>
	</div>

  	<div class="form-group">
  		<div class="col-md-4">
    		<label for="exampleInputPassword1">Description Of Task</label>
    	</div>
    	<div class="col-md-8 space">
    		<textarea class="form-control" rows="3" id="proj_desc" name="proj_desc" placeholder="Describe the task"></textarea>
  		</div>
  	</div>

  	<div class="form-group">
  		<div class="col-md-4">
    		<label for="exampleInputPassword1">Developer Name</label>
    	</div>
    	<div class="col-md-8 space">
  			<input type="text" class="form-control" id="dev_name" name="dev_name" placeholder="Developer Initials">
  		</div>
  	</div>

	<div class="form-group ">
		<div class="col-md-12">
			<label for="exampleInputEmail1">Reference</label>
		</div>
  		<div class="col-md-4">
  			<div class="radio">
  				<label>
    			<input type="radio" name="reference" id="optionsRadios1" value="Email" checked>
    			Email
  				</label>
			</div>
		</div>
		<div class="col-md-4">
			<div class="radio">
  				<label>
    			<input type="radio" name="reference" id="optionsRadios2" value="option2">
    			Option 2
  				</label>
			</div>
		</div>
		<div class="col-md-4 space">
			<div class="radio">
  				<label>
    			<input type="radio" name="reference" id="optionsRadios2" value="option2">
    			Option 3
  				</label>
			</div>
		</div>
	</div>
  
  	<div class="form-group">
		<div class="col-md-4">
			<label for="exampleInputEmail1">Hours</label>
		</div>
		<div class="col-md-8 space">
	  		<input type="text" class="form-control" id="hours" name="hours" placeholder="No of hours performed..">
	  	</div>
	</div>

  	<div class="form-group space">
  		<div class="col-md-4">
    		<label for="exampleInputPassword1">How was the problem addressed ?</label>
    	</div>
    	<div class="col-md-8 space">
    		<textarea class="form-control" rows="3" id="solution" name="solution" placeholder="How was the problem solved"></textarea>
  		</div>
  	</div>

  	<div class="col-md-4 ">
  		<button type="button" class="btn btn-default" id="clear_data">Reset Data</button>
  	</div>
  	<div class="col-md-4 ">
  		<button type="submit" class="btn btn-primary">Add Record</button>
  	</div>
  	<div class="col-md-4 ">
  		<a href="http://localhost/wordpress/display-timesheet/" class="btn btn-primary">View Records</a>
  	</div>

</form>
</div>

  
  


<br />
<br />


