<?php include 'config.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="google" value="notranslate" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" type="image/ico" href="./favicon.ico" />

    <title><?php echo SITE_NAME; ?></title>

    <!-- Bootstrap core CSS -->
    <link href="//cdn.madebyglutard.com/libs/bootstrap/3.3.1/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="./static/css/narrow.css" rel="stylesheet">
	<link rel="stylesheet" href="//cdn.madebyglutard.com/libs/bootflat/2.0.4/css/bootflat.css">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>

<div class="container">
    
	<div class="header">
    <ul class="nav nav-pills pull-right" role="tablist">
        <li role="presentation">1 BTC = <?php echo number_format(FIAT_PER_CRYPTO,3);?> <?php echo FIAT?></li>
    </ul>
    <h3 class="text-muted"><?php echo SITE_NAME; ?></h3>
</div>
	<center>
        <h1><?php echo SITE_NAME; ?></h1>
        <p class="lead">A bitcoin-based Shadowsocks server</p>
        <p class="lead">Current Price: <?php echo CRYPTO_PER_GB ?> <?php echo CRYPTO?> / GiB</p>

		<table style="font-size:150%; width:100%" >
			<tr>
				<td>
					<span>E-mail</span>
				</td>
				<td>
					<input class="form-control" id="email" name="email" maxlength="250">
				</td>
			</tr>
			<tr>
				<td>
					<span>Manage Key</span>
				</td>
				<td>
					<input class="form-control" id="pass" name="pass" maxlength="32">
				</td>
			</tr>
		</table>
		<br/>
		<br/>
		<p>
			<button class="btn btn-lg btn-success" onclick="submit()">Get Deposit Address</button>
			<button class="btn btn-lg btn-warning" onclick="usage()">Show Account Status</button>
			<div id="note" class="well"></div>
		</p>
	</center>
	<p><b>Note:</b><br/>
		Manage Key isn't Shadowsocks Password.<br/>
		It's possible to have different Manage Keys under a same E-mail.<br/>
		Account Details will be sent via E-Mail when a deposit is done (have at least <?=MIN_CONF?> confirmations).
	</p>
	<br/>
	<script>
		function submit(){
			$.post(
				'./get_address.php',{
					email: $('#email').val(),
					pass: $('#pass').val()
				},
				function( data ) {
					$( "#note" ).html( data );
				}
			);
		}
		function usage(){
			$.post(
				'./get_status.php',{
					email: $('#email').val(),
					pass: $('#pass').val()
				},
				function( data ) {
					$( "#note" ).html( data );
				}
			);
		}
	</script>
<div>
    <p>&copy; <?php echo "2014-".date('Y'); ?>&nbsp;<?php echo SITE_NAME; ?><br>Powered by <a href="https://github.com/jebwizoscar/bitsocks">bitsocks</a> <?php echo SITE_VER;?> by Jebwiz Oscar, based on <a href="https://github.com/mengskysama/shadowsocks">mengskysama/shadowsocks</a></p>
    <p>Donation: <a href="https://blockchain.info/address/18dgui9RA4964MGQuGgm4BqPdrxRXJAUc8">18dgui9RA4964MGQuGgm4BqPdrxRXJAUc8</a></p>
</div>
</div> <!-- /container -->

</body>
    <script src="//cdn.madebyglutard.com/libs/jquery/1.10.1/jquery.min.js"></script>
</html>
