<?php

namespace PhpArsenal\SoapClient\Result;

#[\AllowDynamicProperties]
class LeadConvertResult
{
    public $accountId;
    public $contactId;
    public $leadId;
    public $opportunityId;
    public $success;
    public $errors;
}

