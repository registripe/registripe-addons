<?php

class EventAddOn extends DataObject {

	private static $db = array(
		"Name" => "Varchar",
		"Price" => "Currency"
	);

	private static $has_one = array(
		"Event" => "RegistrableEvent"
	);

	private static $many_many = array(
		"Tickets" => "EventTicket"
	);

	private static $summary_fields = array(
		"Name", "Price"
	);

	public function getCMSFields() {
		$fields = $this->scaffoldFormFields(array(
			'includeRelations' => ($this->ID > 0),
			'tabbed' => false,
			'ajaxSafe' => true
		));

		$fields->removeByName(array("Tickets", "EventID"));

		$tickets = ListboxField::create('Tickets', singleton('EventTicket')->i18n_plural_name())
						->setMultiple(true)
						->setSource($this->Event()->Tickets()->map()->toArray());
		$fields->push($tickets);


		$this->extend('updateCMSFields', $fields);

		return $fields;
	}

	public function getTitle() {
		return $this->Name . " (+" . $this->obj("Price")->Nice() . ")";
	}

}
