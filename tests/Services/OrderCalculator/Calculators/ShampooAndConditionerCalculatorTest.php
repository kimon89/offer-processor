<?php
use PHPUnit\Framework\TestCase;
use OfferProcessor\Exceptions\Calculator\AlreadyAppliedException;
use OfferProcessor\Models\Product;
use OfferProcessor\Models\Order;
use OfferProcessor\Services\OrderCalculator\Calculators\ShampooAndConditionerCalculator;

class ShampooAndConditionerCalculatorTest extends CalculatorTest
{
	public function setUp()
	{
		$this->calculator = new ShampooAndConditionerCalculator();
		parent::setup();
	}

	

	public function testCalculate()
	{
		$order = $this->calculator->calculate($this->order);
		$this->assertInstanceOf(Order::class, $order);
	}
	
}