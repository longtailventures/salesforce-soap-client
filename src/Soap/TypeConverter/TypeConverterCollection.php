<?php

namespace PhpArsenal\SoapClient\Soap\TypeConverter;

use Doctrine\Common\Collections\ArrayCollection;

/**
 * A collection of type converters
 */
class TypeConverterCollection
{
    protected $converters = [];

    /**
     * Construct type converter collection
     *
     * @param array $converters (optional) Array of type converters
     */
    public function __construct(array $converters = [])
    {
        foreach ($converters as $converter) {
            $this->add($converter);
        }
    }

    /**
     * Add a type converter to the collection
     *
     * @param TypeConverterInterface $converter Type converter
     *
     * @return TypeConverterCollection
     * @throws \InvalidArgumentException
     */
    public function add(TypeConverterInterface $converter)
    {
        if ($this->has($converter->getTypeNamespace(), $converter->getTypeName())) {
            throw new \InvalidArgumentException(
                'Converter for this type already exists'
            );
        }

        return $this->set($converter);
    }

    /**
     * Set (overwrite) a type converter in the collection
     *
     * @param TypeConverterInterface $converter Type converter
     */
    public function set(TypeConverterInterface $converter): self
    {
        $this->converters[$converter->getTypeNamespace() . ':'
            . $converter->getTypeName()] = $converter;

        return $this;
    }

    /**
     * Returns true if the collection contains a type converter for a certain
     * namespace and name
     *
     * @param string $namespace Converter namespace
     * @param string $name      Converter name
     */
    public function has(string $namespace, string $name): bool
    {
        return isset($this->converters[$namespace . ':' . $name]);
    }

    /**
     * Get this collection as a typemap that can be used in PHP's \SoapClient
     */
    public function getTypemap(): array
    {
        $typemap = [];

        foreach ($this->converters as $converter) {
            $typemap[] = [
                'type_name' => $converter->getTypeName(),
                'type_ns'   => $converter->getTypeNamespace(),
                'from_xml'  => function($input) use ($converter) {
                    return $converter->convertXmlToPhp($input);
                },
                'to_xml'    => function($input) use ($converter) {
                    return $converter->convertPhpToXml($input);
                },
            ];
        }

        return $typemap;
    }
}