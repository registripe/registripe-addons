<?php

class EventAttendeeAddOnExtension extends DataExtension {

	private static $many_many = array(
		"AddOns" => "EventAddOn"
	);

}