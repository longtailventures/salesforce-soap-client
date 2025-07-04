<?php

namespace PhpArsenal\SoapClient\Result;

#[\AllowDynamicProperties]
class GetDeletedResult
{
    protected $earliestDateAvailable;

    protected $latestDateCovered;

    protected $deletedRecords;

    /**
     * @return \DateTime
     */
    public function getEarliestDateAvailable()
    {
        return $this->earliestDateAvailable;
    }

    /**
     * @return \DateTime
     */
    public function getLatestDateCovered()
    {
        return $this->latestDateCovered;
    }

    /**
     * @return DeletedRecord[]
     */
    public function getDeletedRecords()
    {
        return $this->deletedRecords;
    }
}
