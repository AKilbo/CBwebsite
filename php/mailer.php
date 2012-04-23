<?php 
session_start();


if($_POST['submit']) {
$youremail = 'info@clearbluconsulting.com';
$fromsubject = 'noreply@clearbluconsulting.com';
$name = $_POST['name'];
$mail = $_POST['email'];
$phone = $_POST['phone']; 
$company = $_POST['company'];
$subject =  $_POST['subject'];
	$to = $youremail; 
	$mailsubject = 'Message recived from'.$fromsubject.' Contact Page';

	$body = $fromsubject.'
	
	The person that contacted you is  '.$name.'
	 Phone Number: '.$phone.'
	 E-mail: '.$mail.'
	
	 company: '.$company.'
	 wanted to know more about ' .$subject; 
	 if(mail($to, $subject, $body))
	 	$_SESSION['mailed'] = 'true';
	 else
	 	$_SESSION['mailed'] = 'failed';
	}
	header("location: ../index.php")
 
?> 

