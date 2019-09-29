<?php

namespace DmitrySilinsky\EmailValidator;

class EmailValidator
{
    protected $validator;

    /**
     * @param ValidatorInterface $validator
     */
    public function __construct(ValidatorInterface $validator)
    {
        $this->validator = $validator;
    }

    /**
     * @param string $email
     * @return bool
     */
    public function validateSingleEmail(string $email): bool
    {
        return $this->validator->validate(
            ['email' => $email],
            ['email' => 'email:check_mx']
        );
    }

    /**
     * @param array $emails
     * @return ValidationResult
     */
    public function validateFromArray(array $emails): ValidationResult
    {
        $result = new ValidationResult();

        foreach ($emails as $email) {
            if ($this->validateSingleEmail($email)) {
                $result->addValidEmail($email);
            } else {
                $result->addInvalidEmail($email);
            }
        }

        return $result;
    }
}
