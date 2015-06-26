<?php 

	echo "I am inside includes folder..";
?>
<div id="wpbody">
    <div class="wrap">
    	<h2>Daily Work Log</h2>
    	<form id="home_slider_form" action="?page=timesheet_controller" method="post" enctype="multipart/form-data">
    		<table class="form-table">
          	<tbody>
           
            <tr>
              <th>
                <label for="job_store_board_title">Date: <span style="color: red">*</span></label>
              </th>
              <td>
                  <input type="hidden" value="<?php echo $id; ?>" name="board_listid">
                <textarea id="textarea_board_title" name="board_listboard_title" rows="1" cols="60" style="resize: none;" required>Title</textarea>
                <br>
                <span id="charsLeft"></span>
                <span id="count_board_title"></span>
              </td>
            </tr>
    	</form>
    </div>
</div>

<br />
<br />