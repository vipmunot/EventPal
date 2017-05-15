<?php

	class Event {
		var $EventId;
		var $OrganizerId;
		var $Title;
		var $Description;
		var $Days;
		var $StartDate;
		var $EndDate;
		var $StartTime;
		var $EndTime;
		var $Image;

		var $Address;
		var $Organizer;


		public function __construct($EventId, $OrganizerId, $Title, $Description, $Days, $StartDate, $EndDate, $StartTime, $EndTime, $Image, $Street, $City, $Zip, $State, $Country) {
			$this->EventId=$EventId;
			$this->OrganizerId=$OrganizerId;
			$this->Title=$Title;
			$this->Description=$Description;
			$this->Days=$Days;
			$this->StartDate=$StartDate;
			$this->EndDate=$EndDate;
			$this->StartTime=$StartTime;
			$this->EndTime=$EndTime;
			$this->Image=$Image;
			$this->Address = new Location($Street, $City, $Zip, $State, $Country);
		}

	}

?>

