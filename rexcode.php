<?php
/*
	Plugin Name: Rex's Shortcode plugin
	Plugin URI: http://ellasol.com
	Description: Plupload Shortcode plug --> use [rexcode] as shortcode
	Author: Rex Keal
	Version: 0.2-alpha
	Author URI: http://ellasol.com
 */
//add the short code function name and the function to call when used in WP
 add_shortcode( 'rexcode', 'rexcode_func' );
 
//add an action to call in to the head of a page and the function to call when doing so
 add_action( 'wp_head', 'add_js_headers' );
 
//register a function to call when ACTIVATING this plug.
 register_activation_hook( __FILE__,
                          'rexcode_plup_default_options' );
//add an admin panel:
add_action('admin_menu', 'rexcode_admin_settings_page');


// functions:
?>
<?php
function rexcode_settings_page_display() {
	$options = get_option ('rexcode_test_entry2');
	?>
	<h1>Welcome to the Rexcode Setting Page!</h1>
	<?php //echo current settings:
	echo '<strong>Current uploads directory: </strong>'.$options['upload_dir'].'<br>';
	echo '<strong>Current Version: </strong>'.$options['version'].'<br>';
	echo '<strong>Other Data: </strong>'.$options['other_data'].'<br>'; 
	?>
	
<?php }
function rexcode_admin_settings_page() {//register the settings page with WP
    add_options_page( 'RexCode Upload Settings',
        'RexCode Upload Settings', 'manage_options',
        'rexcode_upload_settings', 'rexcode_settings_page_display' );
}
					  
function rexcode_plup_default_options() {// set some default options upon activation <-- Modify this before packaging to REALLY implement a activation hook properly
     if ( get_option( 'rexcode_test_entry2' ) != false ) {
	 delete_option( 'rexcode_test_entry2' );
	 $optionsArray['upload_dir'] = "uploads/";
	 $optionsArray['version'] = "0.2 - alpha";
	 $optionsArray['other_data'] = "other data";
	 add_option( 'rexcode_test_entry2', $optionsArray ); // throw the array to add_options to confine to a table cell (faster loading of options))
    }
}						  

function rexcode_func( $atts ) { // the actually function for the shortcode
	$urll= plugins_url();
	$plupcode = '<form action="'.$urll.'/plupload_project/welcome.php" method="post"><div id="uploader" style="max-width:100%;"><p>Our uploader requires that you are using a modern browser with either HTML5, Flash, or Silverlight installed. We recommend that you use Chrome, Firefox, or Safari.</p></div><input type="submit" value="Send" /></form><script type="text/javascript">$(function() {$("#uploader").plupload({runtimes : "html5,flash,silverlight",
		url : "'.$urll.'/plupload_project/upload.php",max_file_size : "3mb",max_file_count: 1,chunk_size : "1mb",rename: true,unique_names : true,multiple_queues : true,sortable: true,filters : [{title : "Image files", extensions : "jpg,gif"},
			{title : "Zip files", extensions : "zip"}],flash_swf_url : "'.$urll.'/plupload_project/js/plupload.flash.swf",silverlight_xap_url : "'.$urll.'/plupload_project/js/plupload.silverlight.xap"});$("form").submit(function(e) {
        var uploader = $("#uploader").plupload("getUploader");if (uploader.files.length > 0) {uploader.bind("StateChanged", function() {if (uploader.files.length === (uploader.total.uploaded + uploader.total.failed)) {$("form")[0].submit();}});uploader.start();} else alert("You must at least upload one file.");return false;});});</script>';
//resize : {width : 320, height : 240, quality : 90},rename: true, <-- add to above code just before 'sortable'
	$output = $plupcode;
    return $output; 
}

function add_js_headers() { //adding the required headers to a page for the shortcode ?>
<link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.9/themes/base/jquery-ui.css" type="text/css" />
<link rel="stylesheet" href="http://ellasol.com/rex/js/jquery.ui.plupload/css/jquery.ui.plupload.css" type="text/css" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.9/jquery-ui.min.js"></script>
<script type="text/javascript" src="http://bp.yahooapis.com/2.4.21/browserplus-min.js"></script>
<script type="text/javascript" src="http://ellasol.com/rex/js/plupload.js"></script>
<script type="text/javascript" src="http://ellasol.com/rex/js/plupload.gears.js"></script>
<script type="text/javascript" src="http://ellasol.com/rex/js/plupload.silverlight.js"></script>
<script type="text/javascript" src="http://ellasol.com/rex/js/plupload.flash.js"></script>
<script type="text/javascript" src="http://ellasol.com/rex/js/plupload.browserplus.js"></script>
<script type="text/javascript" src="http://ellasol.com/rex/js/plupload.html4.js"></script>
<script type="text/javascript" src="http://ellasol.com/rex/js/plupload.html5.js"></script>
<script type="text/javascript" src="http://ellasol.com/rex/js/jquery.ui.plupload/jquery.ui.plupload.js"></script>
<?php }
 ?>