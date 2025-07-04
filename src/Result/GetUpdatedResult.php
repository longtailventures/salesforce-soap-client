<?php

namespace PhpArsenal\SoapClient\Result;

#[\AllowDynamicProperties]
class GetUpdatedResult
{
    protected $ids = array();

    protected $latestDateCovered;

    /**
     * @return array
     */
    public function getIds()
    {
        return $this->ids;
    }

    /**
     * @return \DateTime
     */
    public function getLatestDateCovered()
    {
        return $this->latestDateCovered;
    }
}
