<?php

namespace PhpArsenal\SoapClient\Result;

#[AllowDynamicProperties]
#[ReturnTypeWillChange]
class SendEmailError extends Error
{
    protected $targetObjectId;

    public function getTargetObjectId()
    {
        return $this->targetObjectId;
    }
}
