<?php

namespace OfferProcessor\Exceptions;

use OfferProcessor\Exceptions\InputValidator\CLI\MissingArgumentException;
use OfferProcessor\Exceptions\Calculators\CalculatorNotFoundException;

/**
 * A very basic exception handler to deal with our custom exception classes.
 */
class ExceptionHandler
{
    public function handle(\Exception $exception)
    {
        if ($exception instanceof MissingArgumentException ||
            $exception instanceof OrderNotFoundException ||
            $exception instanceof CalculatorNotFoundException
            ) {
            echo $exception->getError()."\n";
        } else {
            throw $exception;
        }
    }
}
