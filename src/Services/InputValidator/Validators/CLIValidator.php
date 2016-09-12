<?php

namespace OfferProcessor\Services\InputValidator\Validators;

use OfferProcessor\Services\InputValidator\InputValidatorInterface;
use OfferProcessor\Exceptions\InputValidator\CLI\MissingArgumentException;

/**
 * Validates the parameters passed to the program.
 */
class CLIValidator implements InputValidatorInterface
{
    /**
     * Required parameters.
     *
     * @var array
     */
    protected $required = [
        1 => 'filepath',
        2 => 'offer',
    ];

    /**
     * Validates that all the required parameters exist.
     *
     * @param array $input [description]
     */
    public function validate(array $input)
    {
        foreach ($this->required as $num => $arg) {
            if (!isset($input[$num])) {
                throw new MissingArgumentException("$num ($arg)");
            }
        }
    }
}
