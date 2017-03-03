<?php

class EventAttendeeControllerAddOnExtension extends DataExtension {

	public function updateAttendeeForm($form, $registration) {
		$form->Fields()->merge($this->getAddOnFields($registration));
	}

	public function getAddOnFields($registration) {
		$fields = FieldList::create();
		if($addOns = $registration->Event()->AddOns()) {
			$fields->push(
				CheckboxSetField::create("AddOns", "Add ons")->setSource($addOns)
			);
		}
		return $fields;
	}
	
}
