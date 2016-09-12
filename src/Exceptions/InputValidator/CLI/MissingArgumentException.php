<?php

namespace OfferProcessor\Exceptions\InputValidator\CLI;

/**
 * When an argument is missing from the input for the CLI.
 */
class MissingArgumentException extends \Exception
{
    /**
     * Return the error message for this exception.
     *
     * @return string Error message
     */
    public function getError()
    {
        return "Missing argument: {$this->getMessage()} ";
    }
}
