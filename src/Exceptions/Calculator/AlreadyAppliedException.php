<?php

namespace OfferProcessor\Exceptions\Calculator;

/**
 * When an offer has already been applied to the order.
 */
class AlreadyAppliedException extends \Exception
{
    /**
     * Return the error message for this exception.
     *
     * @return string Error message
     */
    public function getError()
    {
        return 'An offer has already been applied to this order.';
    }
}
