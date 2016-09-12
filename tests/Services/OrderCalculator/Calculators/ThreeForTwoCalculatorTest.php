<?php
use PHPUnit\Framework\TestCase;
use OfferProcessor\Exceptions\Calculator\AlreadyAppliedException;
use OfferProcessor\Models\Product;
use OfferProcessor\Services\OrderCalculator\Calculators\ThreeForTwoCalculator;

class ThreeForTwoCalculatorTest extends CalculatorTest
{

	public function setUp()
	{
		$this->calculator = new ThreeForTwoCalculator();
		parent::setup();
	}
	public function testCheapersProduct()
	{
		$result = $this->calculator->calculate($this->order);
		$this->assertEquals(11, $result);
	}
}