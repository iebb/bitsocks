<?php
	include 'config.php';
	$EMail=mysql_escape_string($_POST['email']);
	$Pass=md5($_POST['pass']);
	$sql = "SELECT * FROM user WHERE `email`='$EMail' AND `pass`='$Pass'";
	$result = mysql_query($sql);
	if ($row = mysql_fetch_object($result)){
		$u=number_format($row->u/ 1048576.0,3);
		$d=number_format($row->d/ 1048576.0,3);
		$t=number_format($row->transfer_enable/ 1048576.0,3);
		$r=number_format(($row->transfer_enable-$row->u-$row->d)/ 1048576.0,3);
		$sd=SHADOWSOCKS_DOMAIN;
		$ec=SHADOWSOCKS_ENCRYPTION;
		echo <<<EOT
<pre>
Shadowsocks Server: $sd
Encryption: $ec
Port: {$row->port}
Password: {$row->passwd}
===============
Total: $t MiB
Uploaded: $u MiB
Downloaded: $d MiB
Remaining: $r MiB
</pre>
EOT;
	}else{
		echo 'E-mail / Key Pair Not Found!';
	}
?>