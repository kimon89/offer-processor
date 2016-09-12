<?php

namespace OfferProcessor\Gateways\Order;

use OfferProcessor\Services\DataAccess\Accessors\DataAccessInterface;
use OfferProcessor\Models\Order;

/**
 * A factory class that creates our order gateway.
 */
class OrderGatewayFactory
{
    public function getGateway(DataAccessInterface $dataAccess)
    {
        return new OrderGateway($dataAccess);
    }
}
