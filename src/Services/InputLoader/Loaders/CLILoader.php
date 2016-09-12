<?php

namespace OfferProcessor\Services\InputLoader\Loaders;

use OfferProcessor\Services\InputLoader\InputLoaderInterface;
use OfferProcessor\Services\InputValidator\Validators\CLIValidator;

/**
 * Responsible for loading the parameters from the CLI
 * uses validation.
 */
class CLILoader implements InputLoaderInterface
{
    protected $cliValidator;

    public function __construct(CLIValidator $cliValidator)
    {
        $this->cliValidator = $cliValidator;
    }

    /**
     * Returns the data from the input after passing through validation.
     *
     * @param array $input [description]
     *
     * @return [type] [description]
     */
    public function getData(array $input)
    {
        $this->cliValidator->validate($input);

        return [
            'path' => $input[1],
            'offer' => $input[2],
        ];
    }
}
