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
     * Updates data.
     *
     * @param string $type [description]
     * @param [type] $data [description]
     *
     * @return bool [description]
     */
    public function update($type, $data);
}
