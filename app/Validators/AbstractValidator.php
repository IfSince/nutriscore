<?php

namespace NutriScore\Validators;

abstract class AbstractValidator {
    protected mixed $data;

    private array $fieldRules = [];

    protected ValidationObject $validationObject;

    public function __construct() {
        $this->validationObject = new ValidationObject();
    }

    public function getValidationObject(): ValidationObject {
        return $this->validationObject;
    }

    protected function addFieldRules(ValidationRule ...$rules): void {
        array_push($this->fieldRules, ...$rules);
    }

    public function isValid(): bool {
        return $this->validationObject->isValid();
    }

    public function validate(mixed $data): void {
        $this->data = $data;
        $this->validationObject->setData($data);
        $this->setFieldRules();

        foreach ($this->fieldRules as $fieldRule) {
            $this->validateField($fieldRule);
        }
    }

    protected function setFieldRules(): void {
        // implement this in order to set field rules before validating
    }

    protected function validateField(ValidationRule $validationRule): void {
        foreach ($validationRule->getValidations() as $validation => $params) {
            // when no params are set, the validation name is instead set to params, which is why we need to set manually
            if (gettype($validation) === 'integer') {
                $validation = $params;
                $params = null;
            }

            if (method_exists(self::class, $validation)) {
                $this->{$validation}($validationRule->getValue(), $validationRule->getField(), $params);
            }
        }
    }

    protected function required(mixed $value, string $field): void {
        if (empty($value)) {
            $this->validationObject->addError($field, _("This field is required."));
        }
    }

    protected function minLength(mixed $value, string $field, int $minLength): void {
        if (strlen($value) < $minLength) {
            $this->validationObject->addError($field, _("Must be at least $minLength characters."));
        }
    }

    protected function maxLength(mixed $value, string $field, int $maxLength): void {
        if (strlen($value) > $maxLength) {
            $this->validationObject->addError($field, _("Must be more than $field characters."));
        }
    }

    protected function uppercase(mixed $value, string $field): void {
        if (!preg_match("/[A-Z]/", $value)) {
            $this->validationObject->addError($field, _("This field requires at least one uppercase letter."));
        }
    }

    protected function lowercase(mixed $value, string $field): void {
        if (!preg_match("/[a-z]/", $value)) {
            $this->validationObject->addError($field, _("This field requires at least one lowercase letter."));
        }
    }

    protected function number(mixed $value, string $field): void {
        if (!preg_match("/\d/", $value)) {
            $this->validationObject->addError($field, _("This field requires at least one number."));
        }
    }

    protected function specialchar(mixed $value, string $field): void {
        if (!preg_match('/^[a-zA-Z0-9!@#$%^&*()_+\-=\[\]{};\':"|,.<>\/?]*$/', $value)) {
            $this->validationObject->addError($field,  _("This field requires at least one special character."));
        }
    }

    protected function noWhitespaces(mixed $value, string $field): void {
        if (preg_match("/\s/", $value)) {
            $this->validationObject->addError($field,  _("This field must not contain any whitespaces."));
        }
    }

    protected function email(mixed $value, string $field): void {
        if (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
            $this->validationObject->addError($field,  _("This field must be a valid email address."));
        }
    }

    protected function matches(mixed $value, string $field, mixed $compareValue): void {
        if ($value !== $compareValue) {
            $this->validationObject->addError($field,  _("This field must match the compared field."));
        }
    }
}