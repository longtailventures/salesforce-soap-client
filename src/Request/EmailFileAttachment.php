<?php

namespace PhpArsenal\SoapClient\Request;

#[\AllowDynamicProperties]
class EmailFileAttachment
{
    public $body;
    public $contentType;
    public $fileName;
    public $inline;
}
