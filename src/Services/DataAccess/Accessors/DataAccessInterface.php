<?php

namespace OfferProcessor\Services\DataAccess\Accessors;

/**
 * Interface for data access.
 */
interface DataAccessInterface
{
    /**
     * Retrieves a single element.
     *
     * @return [type] [description]
     */
    public function get();

    /**
     * [update description]
     * @param  [type] $type [description]
     * @param  [type] $data [description]
     * @return [type]       [description]
     */
    public function update($type, $data);
}
