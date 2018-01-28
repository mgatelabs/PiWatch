<?php
	if (!defined("VERSION")) {
		http_response_code(404);
		die();
	}
?>
<html>
	<head>
		<title>PiWatch</title>
		<!-- Apple Support -->
		<link rel="apple-touch-icon" href="apple-touch-icon-iphone.png" />
		<link rel="apple-touch-icon" sizes="72x72" href="apple-touch-icon-ipad.png" />
		<link rel="apple-touch-icon" sizes="114x114" href="apple-touch-icon-iphone-retina-display.png" />
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