<?php
namespace PhpArsenal\SoapClient\Exception;

class DeleteException extends \RuntimeException
{
    protected $successes;

    protected $errors;

    public function getSuccesses()
    {
        return $this->successes;
    }

    public function setSuccesses($successes): void
    {
        $this->successes = $successes;
    }

    public function getErrors()
    {
        return $this->errors;
    }

    public function setErrors($errors): void
    {
        $this->errors = $errors;
    }
}