<?php namespace PHPFHIR\Utilities;

use PHPFHIR\Enum\ComplexClassTypesEnum;
use PHPFHIR\Enum\SimpleClassTypesEnum;

/**
 * Class ClassTypeUtils
 * @package PHPFHIR\Utilities
 */
abstract class ClassTypeUtils
{
    /**
     * @param string|\SimpleXMLElement $input
     * @return SimpleClassTypesEnum
     */
    public static function getSimpleClassType($input)
    {
        if ($input instanceof \SimpleXMLElement)
            $name = XMLUtils::getObjectName($input);
        else
            $name = $input;

        if (is_string($name))
            return new SimpleClassTypesEnum(ltrim(strrchr($name, '-'), "-"));

        throw new \InvalidArgumentException('Unable to determine Simple Class Type for "'.(string)$input.'"');
    }

    /**
     * @param \SimpleXMLElement $sxe
     * @return null|ComplexClassTypesEnum
     */
    public static function getComplexClassType(\SimpleXMLElement $sxe)
    {
        $name = XMLUtils::getObjectName($sxe);
        if (false !== strpos($name, '.'))
            return new ComplexClassTypesEnum('Component');

        $baseType = XMLUtils::getExtensionBaseType($sxe);
        if (null === $baseType)
            return null;

        switch((string)$baseType)
        {
            case 'BackboneElement':
                return new ComplexClassTypesEnum('Resource');

            default:
                return new ComplexClassTypesEnum((string)$baseType);
        }
    }
}