<?php

namespace OfferProcessor\Services\DataAccess\Factory;

interface DataAccessFactoryInterface
{
    public function getAccessor($filepath);
}
