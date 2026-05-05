<?php

namespace thomasmeschke\PropertiesExistenceValidator;

interface PropertiesExistenceValidationStrategy
{
    /**
     * @param object $object
     * @param array<string> $propertiesNames
     */
    public function validate(mixed $object, array $propertiesNames): void;
}
