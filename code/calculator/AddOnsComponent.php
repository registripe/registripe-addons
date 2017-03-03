<?php

namespace EventRegistration\Calculator;

class AddOnsComponent extends AbstractComponent {

	public function calculateAttendee(\EventAttendee $attendee, $cost) {
		$addOnsCost = $this->calculateAddOns($attendee);
		$attendee->Cost += $addOnsCost;
		return $cost + $addOnsCost;
	}

	protected function calculateAddOns(\EventAttendee $attendee) {
		$total = 0;
		foreach($attendee->AddOns() as $addon) {
			$total += $addon->Price;
		}
		return $total;
	}

}