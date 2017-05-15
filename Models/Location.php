<?php

	class Location {
		var $Street;
		var $City;
		var $Zip;
		var $State;
		var $Country; 

		public function __construct($Street, $City, $Zip, $State, $Country) {
			$this->Street=$Street;
			$this->City=$City;
			$this->Zip=$Zip;
			$this->State=$State;
			$this->Country=$Country;
		}

	}
	
?>
