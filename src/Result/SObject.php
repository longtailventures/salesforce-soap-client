<?php

namespace PhpArsenal\SoapClient\Result;

/**
 * Standard object
 *
 */
#[AllowDynamicProperties]
#[ReturnTypeWillChange]
class SObject
{
    /**
     * @var string
     */
    public $Id;
    
    public function getId()
    {
        return $this->Id;
    }
}
