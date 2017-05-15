<?php

	class Interest {
		var $InterestId;
		var $Name;
		var $Description;
		var $ImagePath;

		
		public function __construct($InterestId, $Name, $Description, $ImagePath) {
			$this->InterestId=$InterestId;
			$this->Name=$Name;
			$this->Description=$Description;
			$this->ImagePath=$ImagePath;
		}

	}

?>

