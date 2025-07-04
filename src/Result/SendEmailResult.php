<?php

namespace PhpArsenal\SoapClient\Result;

/**
 * Send email result
 */
#[\AllowDynamicProperties]
class SendEmailResult 
{
    protected $errors;
    protected $success;
    protected $param;

    public function getErrors()
    {
        return $this->errors;
    }

    public function isSuccess()
    {
        return $this->success;
    }

    public function getParam()
    {
        return $this->param;
    }

    public function setParam($param)
    {
        $this->param = $param;
    }
}
