<?php

namespace OfferProcessor\Exceptions;

use OfferProcessor\Exceptions\InputValidator\CLI\MissingArgumentException;
use OfferProcessor\Exceptions\Calculator\AlreadyAppliedException;

/**
 * A very basic exception handler to deal with our custom exception classes.
 */
class ExceptionHandler
{
    public function handle(\Exception $exception)
    {
        if ($exception instanceof MissingArgumentException ||
            $exception instanceof AlreadyAppliedException ||
            $exception instanceof OrderNotFoundException) {
            echo $exception->getError()."\n";
        } else {
            throw $exception;
        }
    }
}