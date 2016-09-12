<?php

namespace OfferProcessor\Services\OrderCalculator\Calculators;

use OfferProcessor\Services\OrderCalculator\OrderCalculatorInterface;
use OfferProcessor\Models\Order;

/**
 * This class holds the logic for the three for two offer.
 */
class ThreeForTwoCalculator extends AbstractCalculator implements OrderCalculatorInterface
{
    /**
     * Main method for calculation returns the new total amount.
     *
     * @param Order $order [description]
     *
     * @return float [description]
     */
    public function calculate(Order $order)
    {
        $this->checkIfAlreadyApplied($order);
        if (count($order->getProducts()) < 3) {
            return $order->getTotal();
        }
        $cheapestProduct = $this->getCheapestProduct($order->getProducts());

        return round($order->getTotal() - $cheapestProduct->getPrice(), 2, PHP_ROUND_HALF_DOWN);
    }

    /**
     * Returns the cheapest product from this order.
     *
     * @param array $products [description]
     *
     * @return Product [description]
     */
    public function getCheapestProduct(array $products)
    {
        $cheapestProduct = null;
        foreach ($products as $product) {
            if (empty($cheapestProduct) || $product->getPrice() < $cheapestProduct->getPrice()) {
                $cheapestProduct = $product;
            }
        }

        return $cheapestProduct;
    }
}
