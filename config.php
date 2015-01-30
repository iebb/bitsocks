<?php
	date_default_timezone_set('UTC');
	
	define('SITE_NAME', 'BitSocks');
	define('SITE_VER', '1.0.8');
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
		SendGrid Config
	*/
	define('MAILER_NAME', SITE_NAME.' Mailer');
	define('SENDGRID_ADDRESS','noreply@'.DOMAIN);
	define('SENDGRID_USERNAME', 'sendgrid_username');
	define('SENDGRID_PASSWORD', 'sendgrid_password');
	
	
	
	define('MIN_CONF', 1);
	
	define('GATEWAY', 'blockchain');
	// Now 'blockchain' is the only valid option


	include 'functions.php';
	
?>