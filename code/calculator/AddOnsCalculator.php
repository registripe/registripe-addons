<?php

namespace EventRegistration\Calculator;

class AddOnsCalculator extends SelectionCalculator {

	public function calculate($value) {
		$cost = 0;
		$attendee = $this->selection->Attendee();
		if (!$attendee) {
			return $value;
		}
		return $value + $this->calculateAddOns($attendee);
	}

	protected function calculateAddOns(\EventAttendee $attendee) {
		$total = 0;
		foreach($attendee->AddOns() as $addon) {
			$total += $addon->Price;
		}
		return $total;
	}

}
