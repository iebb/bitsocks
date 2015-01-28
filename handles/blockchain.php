<?php
	include '../config.php';
	if ($_GET['confirmations'] < MIN_CONF) die();
	$EMail = mysql_escape_string($_GET['email']);
	$Pass = mysql_escape_string($_GET['pass']);
	$Amount = $_GET['value'] / 100000000.0;
	$BW = (int)(($_GET['value'] / 100000000.0)/ $PER_GB * 1024.0* 1024.0* 1024.0);
	
	$TX_Hash = $_GET['input_transaction_hash'];
	$sql = "SELECT * FROM user WHERE `email`='$EMail' AND `pass`='$Pass'";
	$result = mysql_query($sql);
	if ($row = mysql_fetch_object($result)){
		$sql = "UPDATE user SET transfer_enable=transfer_enable+$BW WHERE id=".$row->id;
		$result = mysql_query($sql);
		$title = 'Your Bitsocks account is Funded!';
	}else{
		$sql = "SELECT  `port` FROM  `user` ORDER BY  `port` DESC LIMIT 1";
		$result = mysql_query($sql);
		$row = mysql_fetch_object($result);
		$port = $row->port + 1;
		$passwd = sprintf("%08d",(int)rand(0,99999999));
		$sql = "INSERT INTO `user` (`email`, `pass`, `passwd`, `t`, `u`, `d`, `transfer_enable`, `port`, `switch`, `enable`, `type`) VALUES( '$EMail', '$Pass', '$passwd', 0, 0, 0, '$BW', $port, 1, 1, 1);";
		$result = mysql_query($sql);
		$title = 'Your Bitsocks account is Ready!';
	}
	
	$sql = "SELECT * FROM user WHERE `email`='$EMail' AND `pass`='$Pass'";
	$result = mysql_query($sql);
	$row = mysql_fetch_object($result);
	$BW_MiB = number_format(($_GET['value'] / 100000000.0)/ $PER_GB * 1024.0,3);
	$u=number_format($row->u/ 1048576.0,3);
	$d=number_format($row->d/ 1048576.0,3);
	$t=number_format($row->transfer_enable/ 1048576.0,3);
	$r=number_format(($row->transfer_enable-$row->u-$row->d)/ 1048576.0,3);
	$sd=SHADOWSOCKS_DOMAIN;
	$ec=SHADOWSOCKS_ENCRYPTION;
	$content=<<<EOT
Hi $EMail,
You deposited $Amount for ($BW_MiB MiB @ $PER_GB/GiB)
Transaction ID: $TX_Hash
Blockchain: https://blockchain.info/tx/$TX_Hash
===============
Shadowsocks Server: $sd
Encryption: $ec
Port: {$row->port}
Password: {$row->passwd}
===============
Total: $t MiB
Uploaded: $u MiB
Downloaded: $d MiB
Remaining: $r MiB
===============
You can always reuse your deposit address.
EOT;
	Send_Mail($EMail,$title,$content);
	echo "*ok*";
	error_log(json_encode(array($_POST,$_GET),3,'log.txt'));
?>