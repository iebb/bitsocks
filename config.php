<?php
	date_default_timezone_set('UTC');
	
	define('SITE_NAME', 'BitSocks');
	define('SITE_DESCRIPTION', 'A bitcoin-based Shadowsocks server');
	define('SITE_URI', 'http://s01.og.gs/');
	define('DOMAIN', 'og.gs');
	
	define('SHADOWSOCKS_DOMAIN', 's01.og.gs');
	define('SHADOWSOCKS_ENCRYPTION', 'aes-256-cfb');

	define('MYSQL_SERVER', 'localhost');
	define('MYSQL_USER', 'mysql_user');
	define('MYSQL_PASSWORD', 'mysql_password');
	define('MYSQL_DATABASE', 'shadowsocks');

	
	
	
	
	
	/*
		Price per GigaBytes.
	*/
	define('IN_FIAT', true);
	define('FIAT', 'USD');
	define('FIAT_PER_GB', 2);
	
	define('IN_CRYPTO', !IN_FIAT);
	define('CRYPTO', 'BTC');
	define('CRYPTO_PER_GB', 0.01);
	
	
	/*
		SendGrid Config
	*/
	define('MAILER_NAME', SITE_NAME.' Mailer');
	define('SENDGRID_ADDRESS','noreply@'.DOMAIN);
	define('SENDGRID_USERNAME', 'sendgrid_username');
	define('SENDGRID_PASSWORD', 'sendgrid_password');
	
	
	
	define('MIN_CONF', 1);
	
	define('PAYMENT_PROCESSOR', 'Blockchain');
	// Now 'Blockchain' is the only valid option
	/*
		You can use Blockchain API so there's no need for a wallet client in your server
		These settings are only for Blockchain.info API.
	*/
	// Your receive address
	define('BITCOIN_ADDRESS', '18dgui9RA4964MGQuGgm4BqPdrxRXJAUc8');


	include 'functions.php';
	
?>