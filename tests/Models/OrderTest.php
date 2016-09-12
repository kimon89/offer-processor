<?php
use PHPUnit\Framework\TestCase;

use OfferProcessor\Models\Order;
use OfferProcessor\Models\Product;

class OrderTest extends TestCase
{
	protected $order;
	protected $product;

	public function setUp()
	{
		$this->order = new Order();
		$this->product = new Product();
		$this->product->setPrice(10);
		$this->order->setProducts([$this->product]);
	}

	public function testGetId()
	{
		$this->order->setId(1);
		$this->assertEquals(1, $this->order->getId());
	}

	public function testGetTotal()
	{
		$this->assertEquals(10, $this->order->getTotal());
	}

	public function testGetProducts()
	{
		$this->order->setProducts([$this->product]);
		$products = $this->order->getProducts();
		$this->assertTrue(is_array($products));
		$this->assertCount(1, $products);
		$this->assertInstanceOf(Product::class, $products[0]);
	}
}