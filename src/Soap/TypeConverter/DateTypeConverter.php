<?php
namespace PhpArsenal\SoapClient\Soap\TypeConverter;

/**
 * Converts between PHP \DateTime and SOAP date objects
 */
class DateTypeConverter implements TypeConverterInterface
{
    /**
     * {@inheritdoc}
     */
    public function getTypeNamespace(): string
    {
        return 'http://www.w3.org/2001/XMLSchema';
    }

    /**
     * {@inheritdoc}
     */
    public function getTypeName(): string
    {
        return 'date';
    }

    /**
     * {@inheritdoc}
     */
    public function convertXmlToPhp($data): ?\DateTime
    {
        $doc = new \DOMDocument();
        $doc->loadXML($data);

        if ('' === $doc->textContent) {
            return null;
        }

        return new \DateTime($doc->textContent);
    }

    /**
     * {@inheritdoc}
     */
    public function convertPhpToXml($php): string
    {
        return sprintf('<%1$s>%2$s</%1$s>', $this->getTypeName(), $php->format('Y-m-d'));
    }
}

