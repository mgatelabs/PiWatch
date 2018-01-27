<?php

	$image_servlets = array();
	$config = array();

	abstract class AbstractItem {
		public $id;
		public $type;
		function __construct($id, $type) {
			$this->id = $id;
			$this->type = $type;
		}

		function clientData() {
			$result = array();

			$result['id'] = $this->id;
			$result['type'] = $this->type;

			return $result;
		}
	}

	class Item extends AbstractItem {
		public $name;
		public $children; 
		
		function __construct($id, $name) {
			parent::__construct($id, 'item');
			$this->name = $name;
			$this->children = array();
		}
		
		public function child($item) {
			array_push($this->children, $item);
			return $this;
		}

		function clientData() {
			$result = parent::clientData();
			$result['name'] = $this->name;
			$children = array();
			for ($i = 0; $i < count($this->children); $i++) {
				$item = $this->children[$i];
				array_push($children, $item->clientData());
			}
			$result['children'] = $children;
			return $result;
		}
	}

	class ImagePreview extends AbstractItem {
		public $url;
		public $interval;
		public $redirect;

		function __construct($id, $url, $interval, $redirect) {
			parent::__construct($id, 'preview');
			$this->url = $url;
			$this->interval = $interval;
			$this->redirect = $redirect;
			global $image_servlets;
			$image_servlets[$this->id] = $this->url;
		 }

		 function clientData() {
			 $result = parent::clientData();
			 $result['interval'] = $this->interval;
			 if ($this->redirect == true) {
				$result['url'] = "/image-servlet.php?id=".$this->id;
			 } else {
				$result['url'] = $this->url;
			 }
			 return $result;
		 }
	}

	class Clicker extends AbstractItem {
		public $url;
		public $name;
		function __construct($id, $name, $url) {
			parent::__construct($id, 'clicker');
			$this->name = $name;
			$this->url = $url;
		}

		function clientData() {
			$result = parent::clientData();
			$result['name'] = $this->name;
			$result['url'] = $this->url;
			return $result;
		}
	}

	function getClientData($config) {
		$result = array();
		for ($i = 0; $i < count($config); $i++) {
			$item = $config[$i];
			array_push($result, $item->clientData());
		}
		return $result;
	}

	/*
	class StaticCameraItem extends Item {
		function __construct($id, $name, $internalUrl, $externalUrl) {
			parent::__construct();
			
			$this->id = $id;
			$this->name = $name;
			$this->type="static_camera";
						
			// Where you can see it
			$this->options['internalUrl'] = $internalUrl;
			$this->options['externalUrl'] = $externalUrl;
		}
	}

	class GarageItem extends Item {
		function __construct($id, $name, $toggleGpio, $magGpio, $internalUrl, $externalUrl) {
		   parent::__construct();
		   
		   $this->id = $id;
		   $this->name = $name;
		   $this->type="garage";
		   
		   // Open/Close Pins
		   $this->options['toggleGpio'] = $toggleGpio;
		   
		   // Check if the Door is Open or Closed
		   $this->options['magGpio'] = $magGpio;
		   
		   // Where you can see it
		   $this->options['internalUrl'] = $internalUrl;
		   $this->options['externalUrl'] = $externalUrl;
	   }
	}
	*/
?>