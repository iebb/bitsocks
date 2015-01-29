<?php 
	include 'config.php'; 
	$email=$_POST['email'];
	if (!filter_var($email, FILTER_VALIDATE_EMAIL)) die('Invalid E-mail');
	$pass=$_POST['pass'];
?>
<table>
<tr>
<td style="width:400px">Deposit Here:</td>
<td rowspan="5"><img src="https://blockchain.info/qr?data=<?php echo GetAddress($email,$pass); ?>&size=200" /></td>
</tr>
<tr>
<td style="width:400px"><a href="https://blockchain.info/address/<?php echo GetAddress($email,$pass); ?>"><b><span style="font-size:130%"><?php echo GetAddress($email,$pass); ?></span></b></a></td>
</tr>
<tr>
<td style="width:400px">You will receive an e-mail with your account-detail in it after <?=MIN_CONF?> confirmations.</td>
</tr>
<tr>
<td style="width:400px">This address can always be re-used.</td>
</tr>
</table>