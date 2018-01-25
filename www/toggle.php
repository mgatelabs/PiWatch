<?php
	header('Content-type: application/json');
	
	var doorId = $_POST["doorId"];
	
	$result = array ('a'=>1,'b'=>2,'c'=>3,'d'=>4,'e'=>5);
	
	
	echo json_encode($arr); 
?>