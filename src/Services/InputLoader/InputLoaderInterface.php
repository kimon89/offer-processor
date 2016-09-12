<?php

namespace OfferProcessor\Services\InputLoader;

/**
 * Interface for the input loader.
 */
interface InputLoaderInterface
{
    /**
     * Returns the data after processing them.
     *
     * @param array $input [description]
     *
     * @return array [description]
     */
    public function getData(array $input);
}
