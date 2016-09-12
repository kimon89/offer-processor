<?php

namespace OfferProcessor\Gateways\Order;

use OfferProcessor\Services\DataAccess\Accessors\DataAccessInterface;
use OfferProcessor\Models\Order;

/**
 * A factory class that creates our order gateway.
 */
class OrderGatewayFactory
{
    /**
     * Returns the order  gateway after injecting the data access.
     *
     * @param DataAccessInterface $dataAccess [description]
     *
     * @return OrderGateway [description]
     */
    public function getGateway(DataAccessInterface $dataAccess)
    {
        return new OrderGateway($dataAccess);
    }
}
