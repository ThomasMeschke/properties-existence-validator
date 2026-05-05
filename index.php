<?php

require('./vendor/autoload.php');

use thomasmeschke\PropertiesExistenceValidator\PropertiesExistenceValidator;
use thomasmeschke\PropertiesExistenceValidator\rules\{
    AllOfPropertiesExistenceValidationRule,
    AnyOfPropertiesExistenceValidationRule,
    NoneOfPropertiesExistenceValidationRule,
    OneOfPropertiesExistenceValidationRule
};

class SampleUsage
{
    public function demonstrate(): void
    {
        $objectUnderTest = (object)[
            #'prop-a' => 42,
            #'prop-b' => 1337,
            'prop-c' => '08/15',
            #'prop-d' => 'foo',
            'prop-e' => 'bar',
            'prop-f' => 'baz'
        ];

        $validator = new PropertiesExistenceValidator();
        $validator->validate(
            $objectUnderTest,
            new NoneOfPropertiesExistenceValidationRule(['prop-a', 'prop-b']),
            new OneOfPropertiesExistenceValidationRule(['prop-b', 'prop-c', 'prop-d']),
            new AnyOfPropertiesExistenceValidationRule(['prop-a', 'prop-b', 'prop-c', 'prop-d']),
            new AllOfPropertiesExistenceValidationRule(['prop-e', 'prop-f'])
        );
    }
}

(new SampleUsage())->demonstrate();
