<?php

namespace OfferProcessor\Services\DataAccess\Factory;

use OfferProcessor\Services\DataAccess\Accessors\XMLAccessor;

/**
 * The XML data access factory that returns the xml accessor.
 */
class XMLDataAccessFactory implements DataAccessFactoryInterface
{
    /**
     * Returns and XMLAccessor.
     *
     * @param string $filepath Path to the xml file
     *
     * @return XMLAccessor [description]
     */
    public function getAccessor($filepath)
    {
        return new XMLAccessor($filepath);
    }
}
