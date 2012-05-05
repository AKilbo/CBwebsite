<?php
	session_start();
	//=======================================
	//   mail sending start
	//=======================================
		if(isset($_POST['submit'])) {	
		$requestername = $_POST['username'];
		$email = $_POST['email'];
		$phone = $_POST['phone'] ;
		$company = $_POST['company']; 
		}
		$to = $email;
		$fromName = 'Clear Blu Consulting';
		$fromEmail = 'noreply@clearbluconsulting.com';
		$subject = 'Brand Computing whitepaper';		
		$message = 'Dear ' .$_POST['username']. ',  thank you for requesting our latest whitepaper. You\'ll find a PDF version attached to this email.  If you would like to learn how you can apply these principles to your own business, please contact us at info@clearbluconsulting.com.  
		Thanks again! 
		Clear Blu';
		$cbmessage =  $requestername.' requested the latest whitepaper.
	 		Phone Number: '.$phone.'
			 E-mail: '.$email.'
			 company: '.$company.' contact info';
		$files = array('../whitepapers/BrandComputingWhitepaper.pdf');
		$cbfiles= array('../whitepapers/blank.txt');
		if(sendEmail($to,$fromName,$fromEmail,$subject,$message,$cc='',$bcc='',$files))
				$_SESSION['mailed'] = 'true';
		else
				$_SESSION['mailed']= 'failed';
		sendEmail('info@clearbluconsulting',$fromName,$fromEmail,'Whitepaper Requested',$cbmessage,$cc='',$bcc='',$cbfiles);
		header("location: ../index.php");
	//=======================================
	//   mail sending end
	//=======================================	


function sendEmail($to,$fromName,$fromEmail,$subject,$message,$cc='',$bcc='',$files=array(),$debug=false)
{
	// starting of headers
	$headers = 'From: '.$fromName.' <'.$fromEmail.'>';
	if($cc != '')
		$headers .= "\r\nCc: ". $cc;
	if($bcc != '')
		$headers .= "\r\nBcc: ". $bcc;
		
	// boundary 
	$semi_rand = md5(time()); 
	$mime_boundary = "==Multipart_Boundary_x{$semi_rand}x"; 
	 
	// headers for attachment 
	$headers .= "\nMIME-Version: 1.0\n" . "Content-Type: multipart/mixed;\n" . " boundary=\"{$mime_boundary}\""; 
	 
	// multipart boundary 
	$message = "This is a multi-part message in MIME format.\n\n" . "--{$mime_boundary}\n" . "Content-Type: text/html; charset=\"iso-8859-1\"\n" . "Content-Transfer-Encoding: 7bit\n\n" . $message . "\n\n"; 
	if(count($files))
		$message .= "--{$mime_boundary}\n";
	 
	// preparing attachments
	for($x=0;$x<count($files);$x++)
	{
		$file = fopen($files[$x],"rb");
		$data = fread($file,filesize($files[$x]));
		fclose($file);
		$data = chunk_split(base64_encode($data));
		$message .= "Content-Type: {\"application/octet-stream\"};\n" . " name=\"$files[$x]\"\n" . 
		"Content-Disposition: attachment;\n" . " filename=\"$files[$x]\"\n" . 
		"Content-Transfer-Encoding: base64\n\n" . $data . "\n\n";
		if($x < (count($files)-1))
			$message .= "--{$mime_boundary}\n";
		else
			$message .= "--{$mime_boundary}--\n";	
		
	}
		
	if($debug)
	{
		echo '$to: '.$to;
		echo '$fromName: '.$fromName;
		echo '$fromEmail: '.$fromEmail;
		echo '$subject: '.$subject;
		echo '$message: '.$message;
		echo '$cc: '.$cc;
		echo '$bcc: '.$bcc;
		echo '$file: '.print_r($file);		
	}
	
	if(mail($to, $subject, $message, $headers))
	{		
		return true;
	}
	else
	{		
		return false;
	}
}

?>