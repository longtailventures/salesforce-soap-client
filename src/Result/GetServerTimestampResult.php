<?php

namespace PhpArsenal\SoapClient\Result;

#[AllowDynamicProperties]
#[ReturnTypeWillChange]
class GetServerTimestampResult
{
    protected $timestamp;

    /**
     * @return \DateTime
     */
    public function getTimestamp()
    {
        return $this->timestamp;
    }
}
