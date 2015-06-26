<?php 
/*
Plugin Name: Simple Calendar DatePicker
Description: This plugin allows you to add Datepicker Calendar on your custom templates pages. Ability to make add date of birth,calendar related field and many more options.you can apply this in on add single Class on your textfield aur anywhere you may wants to add calendar datepicker.
Author: Piyush Rana
Version: 1.0.0
Author URI: http://profiles.wordpress.org/ranapiyush1986/
*/

define('WP_DEBUG',true);
//constants

$path1 = get_bloginfo('wpurl');
$plugin_url=plugins_url().'/calendar-picker';
global $wpdb,$plugin_url;


add_action('admin_menu','cal_setting_menu');
add_action('admin_init','cal_picker_register_settings');
add_action('wp_head','simple_cal_styles');


function cal_picker_register_settings(){
  register_setting( 'calpicker-options', 'calpicker_options' );
}

function cal_setting_menu(){
	add_options_page('Calendar Picker Settings', 'Calendar Picker', 'manage_options', 'manage_settings', 'get_cal_picker_settings');

}
function simple_cal_styles() {
global $plugin_url;
// get options for all settings
$options = get_option('calpicker_options');
// get setting for Year
if($options['calpicker_changeYear']){
	$change_year="true";
}
else
{
	$change_year="false";
}
// get setting for Month
if($options['calpicker_changeMonth']){
	$change_month="true";
}
else
{
	$change_month="false";
}
// get setting for Dateformat
$date_format=$options['calpicker_dateFormat'];

// get setting for Max Date
if($options['calpicker_codeSign']=='positive')
$codeSign='+';
else
$codeSign='-';

$dateRange=$options['calpicker_maxDateRange'];
$dateYear=$options['calpicker_maxDateYear'];

wp_enqueue_style("calendar-picker", $plugin_url.'/css/ui-lightness/jquery-ui-1.10.3.custom.min.css', false, "1.10.3");
?>
<script>

jQuery(function() {
 jQuery('.calendarpicker').datepicker({
				dateFormat: '<?php echo $date_format;?>',
				changeYear: <?php echo $change_year;?>,
				changeMonth: <?php echo $change_month;?>,
				maxDate:'<?php echo $maxdate?>',
		});
});

</script>
<?php
 //End Function
}
function get_cal_picker_settings(){
?>

<div class="wrap">
  <h2>Calendar Datepicker Settings</h2>
  <form method="post" action="options.php">
    <?php settings_fields('calpicker-options'); ?>
    <?php $options = get_option('calpicker_options'); ?>
    <table class="form-table">
	<tr valign="top">
	<th scope="row">
	<span class="description"><strong>calendarpicker</strong></span> just simply use it as Class attribute.
	</th>
	<td>For Ex: <<span class="description">input type="text" class="calendarpicker" ></span> </td>
	</tr>
      <tr valign="top">
        <th scope="row">Change Year</th>
        <?php
				if($options['calpicker_changeYear']){
				$checkYear="checked='checked'";
				}
				else
				{
					$checkYear="";
				}
				?>
        <td><input name="calpicker_options[calpicker_changeYear]" value="1" type="checkbox" <?php echo $checkYear;?>  />
          <span class="description"> Check if you wants to year change dropdown.</span></td>
      </tr>
      <tr valign="top">
        <th scope="row">Change Month</th>
        <?php
				if($options['calpicker_changeMonth']){
				$checkMonth="checked='checked'";
				}
				else
				{
					$checkMonth="";
				}
				?>
        <td><input name="calpicker_options[calpicker_changeMonth]" value="1" type="checkbox" <?php echo $checkMonth;?>  />
          <span class="description"> Check if you wants to Month change dropdown.</span></td>
      </tr>
      <tr valign="top">
        <th scope="row">Date Format</th>
        <td><select name="calpicker_options[calpicker_dateFormat]" id="calpicker_options[calpicker_dateFormat]">
            <option value="mm/dd/yy" <?php  if($options['calpicker_dateFormat']=='mm/dd/yy') echo "selected";?>>mm/dd/yy [Default]</option>
            <option value="mm-dd-yy" <?php  if($options['calpicker_dateFormat']=='mm-dd-yy') echo "selected";?>>mm-dd-yy </option>
            <option value="dd/mm/yy" <?php  if($options['calpicker_dateFormat']=='dd/mm/yy') echo "selected";?>>dd/mm/yy </option>
            <option value="dd-mm-yy" <?php  if($options['calpicker_dateFormat']=='dd-mm-yy') echo "selected";?>>dd-mm-yy </option>
            <option value="yy/mm/dd" <?php  if($options['calpicker_dateFormat']=='yy/mm/dd') echo "selected";?>>yy/mm/dd </option>
            <option value="yy-mm-dd" <?php  if($options['calpicker_dateFormat']=='yy-mm-dd') echo "selected";?>>yy-mm-dd </option>
          </select>
          <span class="description"> Select atleast one for applying date format to selected date from calendar.</span></td>
      </tr>
      <tr valign="top">
        <th scope="row">Max Date</th>
        <td><input type="radio" name="calpicker_options[calpicker_codeSign]" id="plus_mark" value="positive" checked="checked" <?php if($options['calpicker_codeSign']=='positive') echo "checked";?>>
          +
          <input type="radio" name="calpicker_options[calpicker_codeSign]" id="minus_mark" value="negative" <?php if($options['calpicker_codeSign']=='negative') echo "checked";?>>
          -
          <select name="calpicker_options[calpicker_maxDateRange]" id="calpicker_options[calpicker_maxDateRange]">
            <option value="0">Please Slect</option>
            <?php
				  for($i=1;$i<=100;$i++){
				  if($options['calpicker_maxDateRange']==$i)
				  $max_select="selected='selected'";
				  else
				  $max_select="";
				  ?>
            <option value="<?php echo $i;?>" <?php echo $max_select;?>><?php echo $i;?></option>
            <?php
				  }
				  ?>
          </select>
          <select name="calpicker_options[calpicker_maxDateYear]" id="calpicker_options[calpicker_maxDateYear]">
            <option value="0">Please Select</option>
            <option value="Y" <?php  if($options['calpicker_maxDateYear']=='Y') echo "selected";?>>Y</option>
            <option value="M" <?php  if($options['calpicker_maxDateYear']=='M') echo "selected";?>>M</option>
            <option value="D" <?php  if($options['calpicker_maxDateYear']=='D') echo "selected";?>>D</option>
          </select>
          <span class="description">Example : -12Y, +20M</span></td>
      </tr>
    </table>
    <p class="submit">
      <input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" />
    </p>
  </form>
  
</div>
<?php
}
?>
