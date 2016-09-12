<?php
use PHPUnit\Framework\TestCase;

use OfferProcessor\Gateways\Order\OrderGateway;
use OfferProcessor\Services\DataAccess\Accessors\XMLAccessor;
use OfferProcessor\Models\Order;
use OfferProcessor\Models\Product;

class OrderGatewayTest extends TestCase
{
	protected $orderGateway;
	protected $dataAccess;

	public function setUp()
	{
		$this->dataAccess = $this->createMock(XMLAccessor::class);
		$this->products = [
			[
				'id' => 1,
				'title' => 'ShampooTest',
				'price' => 5,
				'category' => 'Shampoo'
			],
			[
				'id' => 2,
				'title' => 'ConditionerTest',
				'price' => 5,
				'category' => 'Conditioner'
			]

		];
		$this->order = [
			'id' => 1,
			'products' => $this->products,
			'total' => 10
		];
		$this->orderGateway = new OrderGateway($this->dataAccess);
	}

	public function testGetOrder()
	{
		$this->dataAccess->method('get')
             ->willReturn($this->order);
		$order = $this->orderGateway->getOrder();
		$this->assertInstanceOf(Order::class, $order);
		$this->assertEquals(1, $order->getId());
		$this->assertCount(2, $order->getProducts());
		$this->assertInstanceOf(Product::class, $order->getProducts()[0]);
		$this->assertInstanceOf(Product::class, $order->getProducts()[1]);
	}
}