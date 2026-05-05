<?php

namespace thomasmeschke\PropertiesExistenceValidator;

class PropertiesExistenceValidator
{
    /**
     * @param object $object
     */
    public function validate(mixed $object, PropertiesExistenceValidationRule ...$rules): void
    {
        foreach ($rules as $rule) {
            $rule->validate($object, $rule->propertiesNames);
        }
    }
}
