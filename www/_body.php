<?php
	if (!defined("VERSION")) {
		http_response_code(404);
		die();
	}
?>
<html>
	<head>
		<title>PiWatch</title>
		
		<!-- Icons -->
		<link rel="apple-touch-icon" sizes="57x57" href="/apple-icon-57x57.png">
		<link rel="apple-touch-icon" sizes="60x60" href="/apple-icon-60x60.png">
		<link rel="apple-touch-icon" sizes="72x72" href="/apple-icon-72x72.png">
		<link rel="apple-touch-icon" sizes="76x76" href="/apple-icon-76x76.png">
		<link rel="apple-touch-icon" sizes="114x114" href="/apple-icon-114x114.png">
		<link rel="apple-touch-icon" sizes="120x120" href="/apple-icon-120x120.png">
		<link rel="apple-touch-icon" sizes="144x144" href="/apple-icon-144x144.png">
		<link rel="apple-touch-icon" sizes="152x152" href="/apple-icon-152x152.png">
		<link rel="apple-touch-icon" sizes="180x180" href="/apple-icon-180x180.png">
		<link rel="icon" type="image/png" sizes="192x192"  href="/android-icon-192x192.png">
		<link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
		<link rel="icon" type="image/png" sizes="96x96" href="/favicon-96x96.png">
		<link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
		<link rel="manifest" href="/manifest.json">
		<meta name="msapplication-TileColor" content="#ffffff">
		<meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
		<meta name="theme-color" content="#ffffff">

		<!-- Apple Support -->
		<meta name="apple-mobile-web-app-title" content="Pi-Watch">
		<meta name="apple-mobile-web-app-capable" content="yes">
		<meta name="viewport" content="width=device-width">

		<!-- Bootstrap & jQuery -->
		<link rel="stylesheet" href="/css/bootstrap.min.css?version=<?php echo constant("VERSION"); // Cache Breaker ?>">
		<link rel="stylesheet" href="/css/style.css?version=<?php echo constant("VERSION"); // Cache Breaker ?>">
		<script type="text/javascript" src="/js/jquery-1.12.4.min.js"></script>
		<script src="/js/bootstrap.min.js?version=<?php echo constant("VERSION"); // Cache Breaker ?>" ></script>
		<!-- PHP Stuff -->
		<?php require_once('_required.php'); ?>
		<?php require_once('customize.php'); ?>	
		<!-- App Stuff -->
		<script src="/js/piwatch.js?version=<?php echo constant("VERSION"); // Cache Breaker ?>"></script>
		<script>
		$(function(){
			var ns = window.pw || {};
			ns.instance = new ns.PiWatch(<?php echo json_encode(getClientData($config)) ?>, <?php echo (constant('VIEW_MODE') == 'DEMO') ? 'true' : 'false'; ?>, true);
		});
		</script>
	</head>
	<body>

	<div class="jumbotron jumbotron-fluid">
		<div class="container">
			<h1 class="display-4">PiWatch - <?php echo constant("VERSION"); ?></h1>
			<p class="lead">Created by Michael Fuller</p>
		</div>
	</div>

		<div id="container" class="container-fluid">
			<div class="row">
				
			</div>
		</div>
	</body>
</html>