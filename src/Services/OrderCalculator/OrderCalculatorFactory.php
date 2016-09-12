<?php

namespace OfferProcessor\Services\OrderCalculator;

use OfferProcessor\Services\OrderCalculator\Calculators\ThreeForTwoCalculator;
use OfferProcessor\Services\OrderCalculator\Calculators\ShampooAndConditionerCalculator;

/**
 * Factory class that creates a calculator class based on the input.
 */
class OrderCalculatorFactory
{
    /**
     * Our keyword to class mappings.
     *
     * @var [type]
     */
    protected $calculators = [
        '3 for the price of 2' => ThreeForTwoCalculator::class,
        'Buy Shampoo & get Conditioner for 50% off' => ShampooAndConditionerCalculator::class,
    ];

    /**
     * Returns the calculator object.
     *
     * @param string $type [description]
     *
     * @return OrderCalculatorInterface [description]
     */
    public function getCalculator($type)
    {
    	if (isset($this->calculators[$type])) {
        	return new $this->calculators[$type]();
    	}
    	return [];
    }
}
