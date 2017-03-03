<?php

class RegistrableEventAddOnExtension extends DataExtension {

	private static $has_many = array(
		"AddOns" => "EventAddOn"
	);

	public function updateCMSFields(FieldList $fields) {
		$config = GridFieldConfig_RelationEditor::create();
		$gridField = GridField::create("AddOns", "Add Ons", $this->owner->AddOns(), $config);
		$fields->addFieldToTab("Root.AddOns", $gridField);
	}

}
