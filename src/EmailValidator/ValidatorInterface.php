<?php

namespace DmitrySilinsky\EmailValidator;

use DmitrySilinsky\Validator\{ErrorBagInterface, Rule};

interface ValidatorInterface
{
    /**
     * @return bool
     */
    public function failed(): bool;

    /**
     * @return ErrorBagInterface
     */
    public function errors(): ErrorBagInterface;

    /**
     * @param array $data
     * @param array $rules
     * @param array $messages
     * @return bool
     */
    public function validate(array $data, array $rules, array $messages = []): bool;

    /**
     * @param Rule $rule
     */
    public function addRule(Rule $rule): void;
}
