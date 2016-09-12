<?php
namespace OfferProcessor\Exceptions\Calculators;

/**
 * When an order cannot be found.
 */
class CalculatorNotFoundException extends \Exception
{
    /**
     * Return the error message for this exception.
     *
     * @return string Error message
     */
    public function getError()
    {
        return 'Calculator '.$this->getMessage().' not found';
    }
}