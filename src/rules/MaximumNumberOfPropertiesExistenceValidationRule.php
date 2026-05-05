<?php

namespace thomasmeschke\PropertiesExistenceValidator\rules;

use thomasmeschke\PropertiesExistenceValidator\PropertiesExistenceValidationFailedException;
use thomasmeschke\PropertiesExistenceValidator\PropertiesExistenceValidationRule;

class MaximumNumberOfPropertiesExistenceValidationRule extends PropertiesExistenceValidationRule
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

        if ($found > $this->numberOfProperties) {
            $list = join(', ', $propertiesNames);
            throw new PropertiesExistenceValidationFailedException("At most {$this->numberOfProperties} of the properties '{$list}' are allowed, but {$found} are defined.");
        }
    }
}