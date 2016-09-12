<?php

namespace OfferProcessor\Services\InputValidator;

/**
 * Input validator interface.
 */
interface InputValidatorInterface
{
    /**
     * Validate the input is correct.
     *
     * @param array $input [description]
     */
    public function validate(array $input);
}
