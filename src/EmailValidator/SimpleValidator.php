<?php

namespace DmitrySilinsky\EmailValidator;

use DmitrySilinsky\Validator\{ErrorBag, ErrorBagInterface, Rule, Ruleset, Validator};

class SimpleValidator implements ValidatorInterface
{
    protected $validator;

    /**
     * @param bool $breakOnFirstError
     */
    public function __construct(bool $breakOnFirstError = false)
    {
        $this->validator = new Validator(new Ruleset(), new ErrorBag(), $breakOnFirstError);
    }

    /**
     * @param bool $value
     */
    public function breakOnFirstError(bool $value): void
    {
        $this->validator->breakOnFirstError($value);
    }

    /**
     * @return bool
     */
    public function failed(): bool
    {
        return $this->validator->failed();
    }

    /**
     * @return ErrorBagInterface
     */
    public function errors(): ErrorBagInterface
    {
        return $this->validator->errors();
    }

    /**
     * @param array $data
     * @param array $rules
     * @param array $messages
     * @return bool
     */
    public function validate(array $data, array $rules, array $messages = []): bool
    {
        return $this->validator->validate($data, $rules, $messages);
    }

    /**
     * @param Rule $rule
     */
    public function addRule(Rule $rule): void
    {
        $this->validator->addRule($rule);
    }
}