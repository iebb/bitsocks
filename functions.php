<?php
	mysql_pconnect(MYSQL_SERVER,MYSQL_USER,MYSQL_PASSWORD);
	mysql_select_db(MYSQL_DATABASE);
	date_default_timezone_set('Asia/Shanghai');
	
	if (is_file('gateways/'.GATEWAY.'.functions.php')){
		$GATEWAY=GATEWAY;
	}else{
		$GATEWAY='blockchain';
	}
	include 'gateways/'.$GATEWAY.'.functions.php';
	
	
	function Send_Mail($email,$subject,$text){
		$request_uri = "https://api.sendgrid.com/api/mail.send.json";
		$data = array(
			'api_user' => SENDGRID_USERNAME,
			'api_key' => SENDGRID_PASSWORD,
			'to' => $email,
			'fromname' => MAILER_NAME,
			'from' => SENDGRID_ADDRESS,
			'subject' => $subject,
			'text' => $text
		);

		// use key 'http' even if you send the request to https://...
		$options = array(
			'http' => array(
				'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
				'method'  => 'POST',
				'content' => http_build_query($data),
			),
		);
		$context  = stream_context_create($options);
		$result = file_get_contents($request_uri, false, $context);
	}
?>