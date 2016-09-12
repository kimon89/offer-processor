<?php
use PHPUnit\Framework\TestCase;
use OfferProcessor\Exceptions\Calculator\AlreadyAppliedException;
use OfferProcessor\Models\Product;
use OfferProcessor\Services\OrderCalculator\Calculators\ShampooAndConditionerCalculator;

class ShampooAndConditionerCalculatorTest extends CalculatorTest
{
	public function setUp()
	{
		$this->calculator = new ShampooAndConditionerCalculator();
		parent::setup();
	}
	public function testGetCombos()
	{
		$combos = $this->calculator->getCombos($this->products);
		$this->assertTrue(is_array($combos));
		$this->assertCount(1, $combos);
		$this->assertArrayHasKey('shampoo', $combos[0]);
		$this->assertArrayHasKey('conditioner', $combos[0]);
		$this->assertInstanceOf(Product::class, $combos[0]['shampoo']);
		$this->assertInstanceOf(Product::class, $combos[0]['conditioner']);
	}

	public function testGetDiscount()
	{
		$combos = $this->calculator->getCombos($this->products);
		$discount = $this->calculator->getDiscount($combos);
		$this->assertEquals(1.5, $discount);
	}

	public function testCalculate()
	{
		$result = $this->calculator->calculate($this->order);
		$this->assertEquals(12.5, $result);
	}

	public function testCalculateShouldThrowException()
	{
		$this->order->setTotal(2);
		$this->setExpectedException(AlreadyAppliedException::class);
		$this->calculator->calculate($this->order);
	}

	public function testCalculateWithEmptyCombos()
	{
		$this->order->setProducts([]);
		$this->order->setTotal(0);
		$result = $this->calculator->calculate($this->order);
		$this->assertEquals(0, $result);
	}

	
}