<?php

namespace PhpArsenal\SoapClient\Request;

#[\AllowDynamicProperties]
class MergeRequest
{
    public $masterRecord;
    public $recordToMergeIds = array();
}
