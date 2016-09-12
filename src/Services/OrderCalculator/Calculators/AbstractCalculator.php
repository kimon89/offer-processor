<?php

namespace OfferProcessor\Services\OrderCalculator\Calculators;

use OfferProcessor\Models\Order;
use OfferProcessor\Exceptions\Calculator\AlreadyAppliedException;

/**
 * Shared logic between the two calculators.
 */
class AbstractCalculator
{
    /**
     * Returns the real total of the order after adding up all the product prices.
     *
     * @param Order $order [description]
     *
     * @return [type] [description]
     */
    public function getRealTotal(Order $order)
    {
        $total = 0;
        foreach ($order->getProducts() as $product) {
            $total += $product->getPrice();
        }

        return $total;
    }

    /**
     * Some simple logic to detect if we have already applied the offer
     * This can be improved the logic here is very simple.
     *
     * @param Order $order [description]
     */
    public function checkIfAlreadyApplied(Order $order)
    {
        if ($this->getRealTotal($order) != $order->getTotal()) {
            throw new AlreadyAppliedException();
        }
    }
}
