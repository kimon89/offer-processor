<?php

namespace OfferProcessor\Services\OrderCalculator;

use OfferProcessor\Models\Order;

/**
 * Order calculator interface.
 */
interface OrderCalculatorInterface
{
    /**
     * Calculates the total amount of the order using an offer.
     *
     * @param Order $order [description]
     *
     * @return Order [description]
     */
    public function calculate(Order $order);
}
