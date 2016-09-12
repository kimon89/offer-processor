<?php

namespace OfferProcessor\Gateways\Order;

use OfferProcessor\Models\Order;

/**
 * Interface the order gateways should follow.
 */
interface OrderGatewayInterface
{
    /**
     * Get a single order.
     *
     * @return Order The object representing the order
     */
    public function getOrder();

    /**
     * Updated the total amount in the order.
     *
     * @param Order $order [description]
     * @param float $total [description]
     *
     * @return bool [description]
     */
    public function update(Order $order);
}
