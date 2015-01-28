<?php
	mysql_pconnect(MYSQL_SERVER,MYSQL_USER,MYSQL_PASSWORD);
	mysql_select_db(MYSQL_DATABASE);
	date_default_timezone_set('Asia/Shanghai');
	function BlockchainInfo_GetAddress($email="",$pass=""){
		$request_uri = "https://blockchain.info/api/receive?method=create&cors=true&format=plain&address=".BITCOIN_ADDRESS."&shared=false&callback=".urlencode(SITE_URI."handles/blockchain.php?email=$email&pass=".md5($pass));
		$response = json_decode(file_get_contents($request_uri));
		return $response->input_address;
	}
	function Get_Fiat_Equalvent($value=1,$currency="USD"){
		$request_uri = "https://blockchain.info/tobtc?currency=$currency&value=$value";
		$response = file_get_contents($request_uri);
		return $response;
	}
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
	
	$PER_GB=IN_FIAT?Get_Fiat_Equalvent(FIAT_PER_GB,FIAT):CRYPTO_PER_GB;
?>