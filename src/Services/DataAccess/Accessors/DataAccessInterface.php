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
     * Updates a single element.
     *
     * @param string $type       [description]
     * @param int    $id         [description]
     * @param array  $attributes [description]
     *
     * @return bool [description]
     */
    public function update($type, $id, array $attributes);
}
