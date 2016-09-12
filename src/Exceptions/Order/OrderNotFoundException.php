<?php

namespace OfferProcessor\Exceptions\Order;

/**
 * When an order cannot be found.
 */
class OrderNotFoundException extends \Exception
{
    /**
     * Return the error message for this exception.
     *
     * @return string Error message
     */
    public function getError()
    {
        return 'Order not found';
    }
}
