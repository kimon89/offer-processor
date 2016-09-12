<?php
use PHPUnit\Framework\TestCase;

use OfferProcessor\Services\OrderCalculator\Calculators\ShampooAndConditionerCalculator;
use OfferProcessor\Models\Product;
use OfferProcessor\Models\Order;

abstract class CalculatorTest extends TestCase
{
	protected $order;
	protected $calculator;
	protected $products;

	public function setUp()
	{
		$productA = new Product();
		$productA->setId(1);
		$productA->setTitle('ShampooMake');
		$productA->setPrice('5');
		$productA->setCategory('Shampoo');
		$productB = new Product();
		$productB->setId(2);
		$productB->setTitle('ShampooMake2');
		$productB->setPrice('6');
		$productB->setCategory('Shampoo');
		$productC = new Product();
		$productC->setId(3);
		$productC->setTitle('ConditionerMake2');
		$productC->setPrice('3');
		$productC->setCategory('Conditioner');
		$this->products = [
			$productA,
			$productB,
			$productC
		];
		$this->order = new Order();
		$this->order->setId(1);
		$this->order->setProducts($this->products);
		$this->order->setTotal(14);
	}
}