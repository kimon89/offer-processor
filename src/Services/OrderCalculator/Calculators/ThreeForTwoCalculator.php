<?php

namespace OfferProcessor\Services\OrderCalculator\Calculators;

use OfferProcessor\Services\OrderCalculator\OrderCalculatorInterface;
use OfferProcessor\Models\Order;

/**
 * This class holds the logic for the three for two offer.
 */
class ThreeForTwoCalculator implements OrderCalculatorInterface
{
    protected $order;
    /**
     * Main method for calculation returns the new total amount.
     *
     * @param Order $order [description]
     *
     * @return float [description]
     */
    public function calculate(Order $order)
    {
        $this->order = $order;
        if (count($this->order->getProducts()) < 3) {
            return $this->order;
        }
        $this->removeCheapestProduct();

        return $this->order;
    }

    /**
     * Returns the cheapest product from this order.
     */
    public function removeCheapestProduct()
    {
        $cheapest = null;
        foreach ($this->order->getProducts() as $key => $product) {
            if (is_null($cheapest)) {
                $product->setIncluded(false);
                $cheapest = $key;
            } else {
                if ($product->getPrice() < $this->order->getProducts()[$cheapest]->getPrice()) {
                    $product->setIncluded(false);
                    $this->order->getProducts()[$cheapest]->setIncluded(true);
                    $cheapest = $key;
                } else {
                    $product->setIncluded(true);
                    $this->order->getProducts()[$cheapest]->setIncluded(false);
                }
            }
        }
    }
}
