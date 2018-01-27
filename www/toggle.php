<?php
	header('Content-type: application/json');
	
	$gpio = $_GET["gpio"];

	$result = array();

	if (is_numeric($gpio) && $gpio != -1) {
		$result["status"] = 'OK';

		error_reporting(E_ALL);
		exec('gpio write ' . $gpio . ' 0'); // Output GPIO 0 as 0  replace with what you use
		usleep(1000000);
		exec('gpio write ' . $gpio . ' 1'); // Output GPIO 0 as 1  replace with what you use

	} else {
		$result["status"] = 'FAIL';
	}
	
	echo json_encode($result); 
?>