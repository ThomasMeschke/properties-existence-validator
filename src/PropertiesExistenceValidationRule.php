<?php

namespace thomasmeschke\PropertiesExistenceValidator;

abstract class PropertiesExistenceValidationRule implements PropertiesExistenceValidationStrategy
{
    /**
     * @param array<string> $propertiesNames
     */
    public function __construct(public array $propertiesNames) {}
}
