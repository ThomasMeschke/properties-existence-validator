<?php

namespace thomasmeschke\PropertiesExistenceValidator\rules;

use thomasmeschke\PropertiesExistenceValidator\PropertiesExistenceValidationFailedException;
use thomasmeschke\PropertiesExistenceValidator\PropertiesExistenceValidationRule;

class MinimumNumberOfPropertiesExistenceValidationRule extends PropertiesExistenceValidationRule
{
    public function __construct(protected int $numberOfProperties, array $propertiesNames)
    {
        parent::__construct($propertiesNames);
    }

    /**
     * @param object $object
     * @param array<string> $propertiesNames
     */
    public function validate(mixed $object, array $propertiesNames): void
    {
        $found = 0;
        foreach ($propertiesNames as $propertyName) {
            if (property_exists($object, $propertyName)) {
                $found++;
                continue;
            }
        }

        if ($found < $this->numberOfProperties) {
            $list = join(', ', $propertiesNames);
            throw new PropertiesExistenceValidationFailedException("At least {$this->numberOfProperties} of the properties '{$list}' are required, but only {$found} are defined.");
        }
    }
}