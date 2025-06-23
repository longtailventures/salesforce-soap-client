<?php

namespace PhpArsenal\SoapClient\Request;

#[AllowDynamicProperties]
#[ReturnTypeWillChange]
class MergeRequest
{
    public $masterRecord;
    public $recordToMergeIds = array();
}
