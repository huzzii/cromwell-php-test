<?php

class Validator
{
    private $errors = [];

    public function required($field, $value, $label)
    {
        if (trim($value) === '') {
            $this->errors[$field] = $label . ' is required.';
        }
    }

    public function email($field, $value)
    {
        if (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
            $this->errors[$field] = 'Invalid email address.';
        }
    }

    public function minLength($field, $value, $length, $label)
    {
        if (strlen($value) < $length) {
            $this->errors[$field] = $label . " must be at least {$length} characters.";
        }
    }

    public function match($field, $value1, $value2, $message)
    {
        if ($value1 !== $value2) {
            $this->errors[$field] = $message;
        }
    }

    public function isValid()
    {
        return empty($this->errors);
    }

    public function getErrors()
    {
        return $this->errors;
    }
}