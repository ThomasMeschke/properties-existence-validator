<?php

namespace thomasmeschke\PropertiesExistenceValidator\rules;

use thomasmeschke\PropertiesExistenceValidator\{
    PropertiesExistenceValidationFailedException,
    PropertiesExistenceValidationRule
};

class OneOfPropertiesExistenceValidationRule extends PropertiesExistenceValidationRule
{
    /**
     * @param object $object
     * @param array<string> $propertiesNames
     */
    public function validate(mixed $object, array $propertiesNames): void
    {
        $found = null;
        foreach ($propertiesNames as $propertyName) {
            if (property_exists($object, $propertyName)) {
                if (null === $found) {
                    $found = $propertyName;
                    continue;
                }
                $list = join(', ', $propertiesNames);
                throw new PropertiesExistenceValidationFailedException("Properties '{$found}' and '{$propertyName}' are defined, but only one of the properties '{$list}' is allowed.");
            }
        }

        if (null === $found) {
            $list = join(', ', $propertiesNames);
            throw new PropertiesExistenceValidationFailedException("None of the properties '{$list}' is defined, but exactly one is required.");
        }
    }
}
