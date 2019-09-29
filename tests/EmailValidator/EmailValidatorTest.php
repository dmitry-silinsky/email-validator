<?php

namespace DmitrySilinsky\Tests\EmailValidator;

use DmitrySilinsky\EmailValidator\{EmailValidator, SimpleValidator};
use PHPUnit\Framework\TestCase;

class EmailValidatorTest extends TestCase
{
    private $validator;

    protected function setUp(): void
    {
        parent::setUp();

        $this->validator = new EmailValidator(new SimpleValidator);
    }

    public function testValidateSingleEmail(): void
    {
        $result = $this->validator->validateSingleEmail('invalid-email');
        $this->assertFalse($result);

        $result = $this->validator->validateSingleEmail('user@gmail.com');
        $this->assertTrue($result);
    }

    public function testValidateArray(): void
    {
        $emails = [
            $validEmail = 'user@gmail.com',
            $invalidEmail = 'user@aeworiuoiweru.com',
            $otherValidEmail = 'user@yahoo.com',
            $otherInvalidEmail = 'user@aklsfskljf.com',
        ];

        $result = $this->validator->validateFromArray($emails);

        $this->assertCount(2, $result->validEmails());
        $this->assertTrue(array_search($validEmail, $result->validEmails()) !== false);
        $this->assertTrue(array_search($otherValidEmail, $result->validEmails()) !== false);

        $this->assertCount(2, $result->invalidEmails());
        $this->assertTrue(array_search($invalidEmail, $result->invalidEmails()) !== false);
        $this->assertTrue(array_search($otherInvalidEmail, $result->invalidEmails()) !== false);
    }
}
