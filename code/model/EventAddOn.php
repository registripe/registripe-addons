<?php

class EventAddOn extends DataObject {

	private static $db = array(
		"Name" => "Varchar",
		"Price" => "Currency"
	);

	private static $has_one = array(
		"Event" => "RegistrableEvent"
	);

	private static $summary_fields = array(
		"Name", "Price"
	);

	public function getTitle() {
		return $this->Name . " (+" . $this->obj("Price")->Nice() . ")";
	}

}
