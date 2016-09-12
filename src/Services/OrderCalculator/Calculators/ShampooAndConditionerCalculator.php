<?php

namespace OfferProcessor\Services\OrderCalculator\Calculators;

use OfferProcessor\Services\OrderCalculator\OrderCalculatorInterface;
use OfferProcessor\Models\Order;

/**
 * This contains the logic for the shampoo and conditioner offer.
 */
class ShampooAndConditionerCalculator implements OrderCalculatorInterface
{
    protected $order;
    /**
     * Main calculation function.
     *
     * @param Order $order [description]
     *
     * @return float [description]
     */
    public function calculate(Order $order)
    {
        $this->order = $order;

        $this->detectCombos();

        return $order;
    }

    /**
     * Get any product combos that match the criteria.
     *
     * @param array $products [description]
     *
     * @return array Combos of shampoos and conditioners
     */
    public function detectCombos()
    {
        foreach ($this->order->getProducts() as $k => $product) {
            if ($product->getCategory() == 'Shampoo') {
                foreach ($this->order->getProducts() as $key => $productB) {
                    if ($productB->getCategory() == 'Conditioner') {
                        $productB->setDiscount(0.5);
                    }
                }
            }
        }
    }
}
