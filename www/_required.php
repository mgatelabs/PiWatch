<?php

	class Item {
		public $id; 
		public $name;
		public $type;
		public $options; 
		
		function __construct() {
		   $this->options = array();
		}
		
		function getState() {
			return "Unknown";
		}
		
		function getInternalViewUrl() {
			return "";
		}
		
		function getExternalViewUrl() {
			return "";
		}
	}
	
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

	$config = array();
?>