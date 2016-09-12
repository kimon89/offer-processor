<?php
use PHPUnit\Framework\TestCase;

use OfferProcessor\Models\Product;

class ProductTest extends TestCase
{
	protected $product;

	public function setUp()
	{
		$this->product = new Product();
	}

	public function testGetId()
	{
		$this->product->setId(1);
		$this->assertEquals(1, $this->product->getId());
	}

	public function testGetTitle()
	{
		$this->product->setTitle("Shampoo");
		$this->assertEquals("Shampoo", $this->product->getTitle());
	}

	public function testGetPrice()
	{
		$this->product->setPrice(10);
		$price = $this->product->getPrice();
		$this->assertEquals(10, $price);
	}
}