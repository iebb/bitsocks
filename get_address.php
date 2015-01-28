<?php 
	include 'config.php'; 
	$email=$_POST['email'];
	if (!filter_var($email, FILTER_VALIDATE_EMAIL)) die('Invalid E-mail');
	$pass=$_POST['pass'];
	if (PAYMENT_PROCESSOR == 'Blockchain'){
		echo BlockchainInfo_GetAddress($email,$pass);
	}else{
		echo 'Processor '.PAYMENT_PROCESSOR.' Not Supported';
	}
?>