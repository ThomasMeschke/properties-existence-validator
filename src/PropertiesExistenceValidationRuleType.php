<?php

namespace thomasmeschke\PropertiesExistenceValidator;

enum PropertiesExistenceValidationRuleType
{
    case HasNoneOf;
    case HasOneOf;
    case HasAnyOf;
    case HasAllOf;
}
