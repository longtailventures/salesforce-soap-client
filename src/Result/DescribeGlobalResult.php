<?php

namespace PhpArsenal\SoapClient\Result;

#[\AllowDynamicProperties]
class DescribeGlobalResult
{
    public $encoding;
    public $maxBatchSize;
    /** @var DescribeGlobalSObjectResult[] */
    public $sobjects = array();
}
