<?php

namespace OfferProcessor\Services\OrderCalculator\Calculators;

use OfferProcessor\Services\OrderCalculator\OrderCalculatorInterface;
use OfferProcessor\Models\Order;

/**
 * This contains the logic for the shampoo and conditioner offer.
 */
class ShampooAndConditionerCalculator extends AbstractCalculator implements OrderCalculatorInterface
{
    /**
     * Main calculation function.
     *
     * @param Order $order [description]
     *
     * @return float [description]
     */
    public function calculate(Order $order)
    {
        $this->checkIfAlreadyApplied($order);
        $combos = $this->getCombos($order->getProducts());
        if (empty($combos)) {
            return $order->getTotal();
        }

        return round($order->getTotal() - $this->getDiscount($combos), 2, PHP_ROUND_HALF_DOWN);
    }

    /**
     * Get the discount amount.
     *
     * @param array $combos [description]
     *
     * @return [type] [description]
     */
    public function getDiscount(array $combos)
    {
        $discount = 0;
        foreach ($combos as $combo) {
            $discount += $combo['conditioner']->getPrice() * 0.50;
        }

        return $discount;
    }

    /**
     * Get any product combos that match the criteria.
     *
     * @param array $products [description]
     *
     * @return array Combos of shampoos and conditioners
     */
    public function getCombos(array $products)
    {
        $combos = [];
        foreach ($products as $k => $product) {
            if ($product->getCategory() == 'Shampoo') {
                foreach ($products as $key => $productB) {
                    if ($productB->getCategory() == 'Conditioner') {
                        $combos[$k]['shampoo'] = $product;
                        $combos[$k]['conditioner'] = $productB;
                        unset($products[$key]);
                    }
                }
            }
        }

        return $combos;
    }
}
