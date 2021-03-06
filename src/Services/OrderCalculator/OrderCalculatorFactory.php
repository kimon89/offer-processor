<?php

namespace OfferProcessor\Services\OrderCalculator;

use OfferProcessor\Services\OrderCalculator\Calculators\ThreeForTwoCalculator;
use OfferProcessor\Services\OrderCalculator\Calculators\ShampooAndConditionerCalculator;
use OfferProcessor\Exceptions\Calculators\CalculatorNotFoundException;

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
        '3for2' => ThreeForTwoCalculator::class,
        'Conditioner50' => ShampooAndConditionerCalculator::class,
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
        if (empty($type)) {
            return null;
        }

        if (isset($this->calculators[$type])) {
            return new $this->calculators[$type]();
        }

        throw new CalculatorNotFoundException($type);
    }
}
