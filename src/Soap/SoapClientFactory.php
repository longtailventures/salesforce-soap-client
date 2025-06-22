<?php
namespace PhpArsenal\SoapClient\Soap;

use PhpArsenal\SoapClient\Soap\TypeConverter;

/**
 * Factory to create a \SoapClient properly configured for the Salesforce SOAP
 * client
 */
class SoapClientFactory
{
    /**
     * Default classmap
     *
     * @var array
     */
    protected $classmap = [
        'ChildRelationship'     => \PhpArsenal\SoapClient\Result\ChildRelationship::class,
        'DeleteResult'          => \PhpArsenal\SoapClient\Result\DeleteResult::class,
        'DeletedRecord'         => \PhpArsenal\SoapClient\Result\DeletedRecord::class,
        'DescribeGlobalResult'  => \PhpArsenal\SoapClient\Result\DescribeGlobalResult::class,
        'DescribeGlobalSObjectResult' => \PhpArsenal\SoapClient\Result\DescribeGlobalSObjectResult::class,
        'DescribeSObjectResult' => \PhpArsenal\SoapClient\Result\DescribeSObjectResult::class,
        'DescribeTab'           => \PhpArsenal\SoapClient\Result\DescribeTab::class,
        'EmptyRecycleBinResult' => \PhpArsenal\SoapClient\Result\EmptyRecycleBinResult::class,
        'Error'                 => \PhpArsenal\SoapClient\Result\Error::class,
        'Field'                 => \PhpArsenal\SoapClient\Result\DescribeSObjectResult\Field::class,
        'GetDeletedResult'      => \PhpArsenal\SoapClient\Result\GetDeletedResult::class,
        'GetServerTimestampResult' => \PhpArsenal\SoapClient\Result\GetServerTimestampResult::class,
        'GetUpdatedResult'      => \PhpArsenal\SoapClient\Result\GetUpdatedResult::class,
        'GetUserInfoResult'     => \PhpArsenal\SoapClient\Result\GetUserInfoResult::class,
        'LeadConvert'           => \PhpArsenal\SoapClient\Request\LeadConvert::class,
        'LeadConvertResult'     => \PhpArsenal\SoapClient\Result\LeadConvertResult::class,
        'LoginResult'           => \PhpArsenal\SoapClient\Result\LoginResult::class,
        'MergeResult'           => \PhpArsenal\SoapClient\Result\MergeResult::class,
        'QueryResult'           => \PhpArsenal\SoapClient\Result\QueryResult::class,
        'SaveResult'            => \PhpArsenal\SoapClient\Result\SaveResult::class,
        'SearchResult'          => \PhpArsenal\SoapClient\Result\SearchResult::class,
        'SendEmailError'        => \PhpArsenal\SoapClient\Result\SendEmailError::class,
        'SendEmailResult'       => \PhpArsenal\SoapClient\Result\SendEmailResult::class,
        'SingleEmailMessage'    => \PhpArsenal\SoapClient\Request\SingleEmailMessage::class,
        'sObject'               => \PhpArsenal\SoapClient\Result\SObject::class,
        'UndeleteResult'        => \PhpArsenal\SoapClient\Result\UndeleteResult::class,
        'UpsertResult'          => \PhpArsenal\SoapClient\Result\UpsertResult::class,
    ];

    /**
     * Type converters collection
     *
     * @var TypeConverter\TypeConverterCollection
     */
    protected $typeConverters;

    /**
     * @param string $wsdl Path to WSDL file
     * @param array $soapOptions
     * @param string $environment
     * @return SoapClient
     */
    public function factory($wsdl, $environment, array $soapOptions = []): \PhpArsenal\SoapClient\Soap\SoapClient
    {
        $defaults = [
            'trace'      => 1,
            'features'   => \SOAP_SINGLE_ELEMENT_ARRAYS,
            'classmap'   => $this->classmap,
            'typemap'    => $this->getTypeConverters()->getTypemap(),
            'cache_wsdl' => $environment == 'dev' ? \WSDL_CACHE_NONE : \WSDL_CACHE_MEMORY
        ];

        $options = array_merge($defaults, $soapOptions);

        return new SoapClient($wsdl, $options);
    }

    /**
     * test
     *
     * @param string $soap SOAP class
     * @param string $php  PHP class
     */
    public function setClassmapping($soap, $php): void
    {
        $this->classmap[$soap] = $php;
    }

    /**
     * Get type converter collection that will be used for the \SoapClient
     *
     * @return TypeConverter\TypeConverterCollection
     */
    public function getTypeConverters()
    {
        if (null === $this->typeConverters) {
            $this->typeConverters = new TypeConverter\TypeConverterCollection(
                [
                    new TypeConverter\DateTimeTypeConverter(),
                    new TypeConverter\DateTypeConverter()
                ]
            );
        }

        return $this->typeConverters;
    }

    /**
     * Set type converter collection
     *
     * @param TypeConverter\TypeConverterCollection $typeConverters Type converter collection
     */
    public function setTypeConverters(TypeConverter\TypeConverterCollection $typeConverters): self
    {
        $this->typeConverters = $typeConverters;

        return $this;
    }
}
