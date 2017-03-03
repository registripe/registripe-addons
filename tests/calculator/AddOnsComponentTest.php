<?php

namespace EventRegistration\Calculator\Tests;

use \EventRegistration\Calculator;
use \EventRegistration\Calculator\CostComponent;
use \EventRegistration\Calculator\AddOnsComponent;

class AddOnsComponentTest extends \SapphireTest
{

	protected static $fixture_file = array(
		'../fixtures/AddOn.yml'
	);

	// helper for asserting calculator results
	protected function assertCalculation($expected, $reg, $message = "") {
		$calculator = new Calculator($reg, array("Cost", "AddOns"));
		$this->assertEquals($expected, $calculator->calculate(), $message);
	}

	public function testSingleAttendee() {
		$reg = $this->objFromFixture('EventRegistration', 'addon_reg_a');
		$this->assertCalculation(220, $reg, "One rego with two add ons");
	}

	public function testTwoAttendees() {
		$reg = $this->objFromFixture('EventRegistration', 'addon_reg_b');
		$this->assertCalculation(320, $reg, "Two attendees, one on each");
	}

}