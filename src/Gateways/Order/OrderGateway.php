<?php

namespace OfferProcessor\Gateways\Order;

use OfferProcessor\Services\DataAccess\Accessors\DataAccessInterface;
use OfferProcessor\Models\Order;
use OfferProcessor\Models\Product;
use OfferProcessor\Exceptions\Order\OrderNotFoundException;

/**
 * This gateway is responsible for storing and retrieving order data.
 */
class OrderGateway implements OrderGatewayInterface
{
    /**
     * Data Access.
     *
     * @var DataAccessInterface
     */
    protected $dataAccess;

    public function __construct(DataAccessInterface $dataAccess)
    {
        $this->dataAccess = $dataAccess;
    }

    /**
     * Return an order.
     *
     * @return Order The order object
     */
    public function getOrder()
    {
        $order = $this->dataAccess->get('order');
        if (empty($order)) {
            throw new OrderNotFoundException();
        }
        $products = [];
        foreach ($order['products'] as $product) {
            $productModel = new Product();
            $productModel->setId($product['id']);
            $productModel->setTitle($product['title']);
            $productModel->setCategory($product['category']);
            $productModel->setPrice($product['price']);
            $products[] = $productModel;
        }
        $orderModel = new Order();
        $orderModel->setId($order['id']);
        $orderModel->setProducts($products);
        $orderModel->setTotal($order['total']);

        return $orderModel;
    }

    /**
     * Update the total amount of an order.
     *
     * @param Order $order [description]
     * @param float $total [description]
     *
     * @return bool [description]
     */
    public function updateTotal(Order $order, $total)
    {
        return $this->dataAccess->update('order', $order->getId(), ['total' => $total]);
    }
}
