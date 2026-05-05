<?php

namespace thomasmeschke\PropertiesExistenceValidator\rules;

use thomasmeschke\PropertiesExistenceValidator\{
    PropertiesExistenceValidationFailedException,
    PropertiesExistenceValidationRule
};

class AnyOfPropertiesExistenceValidationRule extends PropertiesExistenceValidationRule
{
    /**
     * @param object $object
     * @param array<string> $propertiesNames
     */
    public function validate(mixed $object, array $propertiesNames): void
    {
        foreach ($propertiesNames as $propertyName) {
            if (property_exists($object, $propertyName)) {
                return;
            }
        }

        $list = join(', ', $propertiesNames);
        throw new PropertiesExistenceValidationFailedException("None of the properties '{$list}' is defined, but at least one is required.");
    }
}
