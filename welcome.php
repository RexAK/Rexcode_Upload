<?php
require_once ('../../../wp-load.php');
//$urlb = get_bloginfo('wpurl'); 
//$urlc = $urlb.'/wp-load.php';
//require_once($urlb);
//$urll= plugins_url();
//$emailTo = $_POST['thirdbox'];
//$emailSubject = "In the first box, you wrote: ".$_POST['fname'];
//$emailMessage = 'In the second box, you wrote: '.$_POST["otherbox"].', and your email is: '.$_POST["thirdbox"].' You sent this pic: '.$urll.'/plupload_project/uploads/'.$_POST["uploader_0_tmpname"];
//$admin_email = get_settings('admin_email');
//$headers[] = 'Cc: Rex Admin<beatfreqs@gmail.com>';
//wp_mail( $emailTo, $emailSubject, $emailMessage, $headers );
//var_dump ($_POST); 
echo '<br> You just uploaded a file called: '. $_POST[uploader_0_name];
//echo '<br>It has been renamed and is now called: '.$_POST[uploader_0_tmpname];
//echo '<br>The upload status is: '.$_POST[uploader_0_status];
echo '<br>You uploaded '.$_POST[uploader_count].' file(s)';
//echo '<br>The shit you put in the box was: '.$_POST[fname];
echo '<br><img src="uploads/'.$_POST[uploader_0_tmpname].'">';
//$countFiles = (int)$_POST[uploader_count];
//for ($i=0; $i < $countFiles; $i++){
//$num4 = $countFiles;
//$num = 'uploader_'.$i.'_tmpname';
//echo '<br>'.$i.' '.$_POST[$num].'<br>';
//}

//foreach (array_keys($_POST) as $keyname){
//echo '<br>'.$keyname.'<br>';
//};

?>
