<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Successful</title>
	<style type="text/css">
		*{
			margin: 0;
			padding: 0;
			box-sizing: border-box;
		}body{
			display: flex;
			align-items: center;
			justify-content: center;height: 100vh;
		}
		.box{
			width: 90%;
			max-width: 600px;
			padding: 40px;

    box-shadow: rgba(100, 100, 111, 0.2) 0 7px 29px 0;
		}.amount{
			width: 100%;
			height: 50px;
			border:1px solid #efefef;
			outline: none;
			padding: 0 20px;
		}input{
			margin-top: 10px;
		}input:focus{
			border: 1px solid #0989ff;
		}.pay_now{
			background-color: #0989ff;
			padding: 0 20px;
			height: 50px;
			border: none;
			outline: none;
			color: #fff;cursor: pointer;
		}
	</style>
</head>
<body>
	<?php

include('smtp/PHPMailerAutoload.php');
	require "config.php";
session_start();
$conn = new mysqli($servername, $username, $password, $dbname);
if ($_GET["action"]=="pay") {

$email=$_GET['email'];
$number=$_GET['number'];
$amount=$_GET['amount']/100;
$id=$_GET['id'];
$sql="INSERT INTO `pay`( `email`, `phone`, `amount`, `pay`) VALUES ('$email','$number',$amount,'$id')";
if($conn->query($sql)===TRUE){
	function smtp_mailer($to,$subject, $msg,$email,$pass,$host,$sender){
	$mail = new PHPMailer(); 
            $mail->IsSMTP(); 
            $mail->SMTPAuth = true; 
            $mail->SMTPSecure = 'tls'; 
            $mail->Host = $host;
            $mail->Port = 587; 
            $mail->IsHTML(true);
            $mail->CharSet = 'UTF-8';
            //$mail->SMTPDebug = 2; 
            $mail->Username = $email;
            $mail->Password = $pass;
            $mail->setFrom($email, $sender);
            $mail->Subject = $subject;
	$mail->Body =$msg;
	$mail->AddAddress($to);
	$mail->SMTPOptions=array('ssl'=>array(
		'verify_peer'=>false,
		'verify_peer_name'=>false,
		'allow_self_signed'=>false
	));
	if(!$mail->Send()){
		return "0";
	}else{
		return "1";
	}
}
$body=
"<!DOCTYPE html>
<html>
<head>
   <link rel='preconnect' href='https://fonts.googleapis.com'>
<link rel='preconnect' href='https://fonts.gstatic.com' crossorigin>
<link href='https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap' rel='stylesheet'>
   <style>
 
body{
   background: #dee3ff;font-family: poppins;
}button{
   font-family: poppins;
}
*{
   margin:0;
   padding: 0;
   box-sizing: border-box;font-family: Calibri;
  
}.onkar_div{
   width:100%;
   padding: 0px;
   border-radius: 3px;
   background: white;
   margin:auto;
   margin-top:0;
   box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;
}p{font-size: 16px;
   color: #383838;font-weight: normal;
}button{
padding: 10px 20px;
border-radius: 3px;
color: white;font-family: Calibri!important;
background: #ffc107;
border:none;
outline: none;
cursor: pointer;font-weight: bold;
}.q{
   margin-top:10px;
}.logo{margin:10px;
   width:35px;height: 35px;

}.bg{
   width: 100%;
}
</style>
</head>
<body>
<div class='onkar_div'>
   <center><img src='https://yt3.ggpht.com/FvWPeM0jkTadubr2Y0eI6wywNVCRJ1H5jZhYEbmXG5YDUXSGYuTbAI-O7eGDO31ZSnkNUEs4SA=w1138-fcrop64=1,00005a57ffffa5a8-k-c0xffffffff-no-nd-rj' class='bg'></center>
   <br><h1 style='text-align: center;'>Payment Received!</h1><br>
   <p>You have recived your payment in your razorpay account!</p><BR>
     
   <h3>Email :- ".$email."</h3>
      <h3>Phone :- ".$number."</h3>
         <h3>Amount :- ".$amount."</h3>
            <h3>Payment ID :- ".$id."</h3>
   <p>Cheers,<br>Team - Company</p>
</div>
<div class='onkar_div q'>
   <center>
   <div class='logos'>
      <img src='https://pentagonspace.in/mail/f.png' class='logo'>
      <img src='https://pentagonspace.in/mail/i.png' class='logo'>
      <img src='https://pentagonspace.in/mail/y.png' class='logo'>
      <img src='https://pentagonspace.in/mail/l.png' class='logo'>
   </div>
   <p style='text-align: center;'>All rights reseved ! <a href='#'>Food Express</a></p>
</center>
</div>
<br><br>
</body>
</html>";
//
 smtp_mailer($rec_,'New Payment Received',$body,$mail_email,$mail_pass,$mail_host,$mail_sender);
    echo '<div class="box">
	<h2>Payment Successful!</h2>
</div>';
}else{
        echo '<div class="box">
	<h2>Error!</h2>
</div>';
}

}

	?>

</body>
</html>