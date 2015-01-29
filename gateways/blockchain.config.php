<?php
	/*
		You can use Blockchain API so there's no need for a wallet client in your server
		These settings are only for Blockchain.info API.
		
		Jebwiz Oscar <1@wa.vg> 2015.01.29
	*/

	/* Config Begin */
	
		// Your receive address
		define('BITCOIN_ADDRESS', '18dgui9RA4964MGQuGgm4BqPdrxRXJAUc8');
		// Better change it to a more random string 
		define('SECRET_KEY', 'itisarandomstring');

		define('FIAT', 'USD');
		define('CRYPTO', 'BTC');
		
		// true: Price in Fiat false: Price in Crypto
		define('IN_FIAT', true);
		define('IN_CRYPTO', !IN_FIAT);
		
		if (IN_FIAT)
			define('FIAT_PER_GB', 1.6);
		if (IN_CRYPTO)
			define('CRYPTO_PER_GB', 0.01); // only valid when IN_FIAT == FALSE
		
	/* Config End */
	include 'gateways/blockchain.functions.php'; 
?>