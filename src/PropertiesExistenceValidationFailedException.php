<?php

namespace thomasmeschke\PropertiesExistenceValidator;

use Exception;

class PropertiesExistenceValidationFailedException extends Exception
{
    public function __construct(string $message)
    {
        parent::__construct($message);
    }
}
