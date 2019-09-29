<?php

namespace DmitrySilinsky\EmailValidator;

class ValidationResult
{
    protected $validEmails = [];
    protected $invalidEmails = [];

    /**
     * @return array
     */
    public function validEmails(): array
    {
        return $this->validEmails;
    }

    /**
     * @return array
     */
    public function invalidEmails(): array
    {
        return $this->invalidEmails;
    }

    /**
     * @param string $email
     * @return ValidationResult
     */
    public function addValidEmail(string $email): ValidationResult
    {
        $this->validEmails[] = $email;

        return $this;
    }

    /**
     * @param string $email
     * @return ValidationResult
     */
    public function addInvalidEmail(string $email): ValidationResult
    {
        $this->invalidEmails[] = $email;

        return $this;
    }

    /**
     * @return int
     */
    public function validEmailCount(): int
    {
        return count($this->validEmails);
    }

    /**
     * @return int
     */
    public function invalidEmailsCount(): int
    {
        return count($this->invalidEmails);
    }
}
