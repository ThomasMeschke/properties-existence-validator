<?php

namespace thomasmeschke\PropertiesExistenceValidator\rules;

use thomasmeschke\PropertiesExistenceValidator\{
    PropertiesExistenceValidationFailedException,
    PropertiesExistenceValidationRule
};

class AllOfPropertiesExistenceValidationRule extends PropertiesExistenceValidationRule
{
    /**
     * @param object $object
     * @param array<string> $propertiesNames
     */
    public function validate(mixed $object, array $propertiesNames): void
    {
        foreach ($propertiesNames as $propertyName) {
            if (! property_exists($object, $propertyName)) {
                $list = join(', ', $propertiesNames);
                throw new PropertiesExistenceValidationFailedException("Property '{$propertyName}' is not defined, but all of the properties '{$list}' are required.");
            }
        }
    }
}
