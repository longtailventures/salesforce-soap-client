<?php

namespace PhpArsenal\SoapClient\Result;

/**
 * Merge result
 *
 */
#[\AllowDynamicProperties]
class MergeResult
{
    /**
     * @var string
     */
    protected $id;

    /**
     * @var boolean
     */
    protected $success;

    /**
     * @var array
     */
    protected $errors;

    /**
     * @var array
     */
    protected $mergedRecordIds;

    /**
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return boolean
     */
    public function getSuccess()
    {
        return $this->success;
    }

    /**
     * @return array
     */
    public function getErrors()
    {
        return $this->errors;
    }

    public function getMergedRecordIds()
    {
        return $this->mergedRecordIds;
    }
}


