<?php

namespace PhpArsenal\SoapClient\Result;

#[\AllowDynamicProperties]
class SendEmailError extends Error
{
    protected $targetObjectId;

    public function getTargetObjectId()
    {
        return $this->targetObjectId;
    }
}
