<?php

namespace PhpArsenal\SoapClient\Result;

#[AllowDynamicProperties]
#[ReturnTypeWillChange]
class DescribeGlobalResult
{
    public $encoding;
    public $maxBatchSize;
    /** @var DescribeGlobalSObjectResult[] */
    public $sobjects = array();
}
