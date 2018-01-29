<?php
	require_once('_required.php');

	{
		$item = new Item("lg", "Left Garage");
		// No Image, default
		$item->child(new NoPreview('lg-image'));
		// You should edit this one to point to your left side pi
		//$item->child(new ImagePreview('rg-image', 'http://address:8081', 0, false));
		$item->child(new Clicker('lg-click', 'Open/Close', '/toggle.php?gpio=1'));
		array_push($config, $item);
	}

	{
		$item = new Item("rg", "Right Garage");
		// No Image, default
		$item->child(new NoPreview('rg-image'));
		// You should edit this one to point to your right side pi, the main unit
		//$item->child(new ImagePreview('rg-image', 'http://address:8081', 0, false));
		$item->child(new Clicker('rg-click', 'Open/Close', '/toggle.php?gpio=0'));
		array_push($config, $item);
	}
?>
