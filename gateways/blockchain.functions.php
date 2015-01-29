<?php
	function GetAddress($email="",$pass=""){
		$request_uri = "https://blockchain.info/api/receive?method=create&cors=true&format=plain&address=".BITCOIN_ADDRESS."&shared=false&callback=".urlencode(SITE_URI."gateways/blockchain.php?secret=".md5(SECRET_KEY)."&email=$email&pass=".md5($pass));
		$response = json_decode(file_get_contents($request_uri));
		return $response->input_address;
	}
	function Get_Fiat_Equalvent($value=1,$currency="USD"){
		$request_uri = "https://blockchain.info/tobtc?currency=$currency&value=$value";
		$response = file_get_contents($request_uri);
		return $response;
	}
	
	define('CRYPTO_PER_FIAT', Get_Fiat_Equalvent(1,FIAT));
	define('FIAT_PER_CRYPTO', 1.0/CRYPTO_PER_FIAT);
	if (IN_FIAT) define('CRYPTO_PER_GB',FIAT_PER_GB * CRYPTO_PER_FIAT);
?>