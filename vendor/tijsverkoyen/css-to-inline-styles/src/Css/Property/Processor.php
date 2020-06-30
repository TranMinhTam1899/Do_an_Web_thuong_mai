<?php

namespace TijsVerkoyen\CssToInlineStyles\Css\Property;

use Symfony\Component\CssSelector\Node\Specificity;

class Processor
{
    /**
<<<<<<< HEAD
     * Split a string into separate properties
     *
     * @param string $propertiesString
     *
     * @return string[]
=======
     * Split a string into seperate properties
     *
     * @param string $propertiesString
     * @return array
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
     */
    public function splitIntoSeparateProperties($propertiesString)
    {
        $propertiesString = $this->cleanup($propertiesString);

        $properties = (array) explode(';', $propertiesString);
        $keysToRemove = array();
        $numberOfProperties = count($properties);

        for ($i = 0; $i < $numberOfProperties; $i++) {
            $properties[$i] = trim($properties[$i]);

            // if the new property begins with base64 it is part of the current property
            if (isset($properties[$i + 1]) && strpos(trim($properties[$i + 1]), 'base64,') === 0) {
                $properties[$i] .= ';' . trim($properties[$i + 1]);
                $keysToRemove[] = $i + 1;
            }
        }

        if (!empty($keysToRemove)) {
            foreach ($keysToRemove as $key) {
                unset($properties[$key]);
            }
        }

        return array_values($properties);
    }

    /**
<<<<<<< HEAD
     * @param string $string
     *
     * @return string
=======
     * @param $string
     * @return mixed|string
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
     */
    private function cleanup($string)
    {
        $string = str_replace(array("\r", "\n"), '', $string);
        $string = str_replace(array("\t"), ' ', $string);
        $string = str_replace('"', '\'', $string);
        $string = preg_replace('|/\*.*?\*/|', '', $string);
        $string = preg_replace('/\s\s+/', ' ', $string);

        $string = trim($string);
        $string = rtrim($string, ';');

        return $string;
    }

    /**
<<<<<<< HEAD
     * Converts a property-string into an object
     *
     * @param string $property
     *
=======
     * Convert a property-string into an object
     *
     * @param string $property
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
     * @return Property|null
     */
    public function convertToObject($property, Specificity $specificity = null)
    {
        if (strpos($property, ':') === false) {
            return null;
        }

        list($name, $value) = explode(':', $property, 2);

        $name = trim($name);
        $value = trim($value);

        if ($value === '') {
            return null;
        }

        return new Property($name, $value, $specificity);
    }

    /**
<<<<<<< HEAD
     * Converts an array of property-strings into objects
     *
     * @param string[] $properties
     *
=======
     * Convert an array of property-strings into objects
     *
     * @param array $properties
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
     * @return Property[]
     */
    public function convertArrayToObjects(array $properties, Specificity $specificity = null)
    {
        $objects = array();

        foreach ($properties as $property) {
            $object = $this->convertToObject($property, $specificity);
            if ($object === null) {
                continue;
            }

            $objects[] = $object;
        }

        return $objects;
    }

    /**
     * Build the property-string for multiple properties
     *
<<<<<<< HEAD
     * @param Property[] $properties
     *
=======
     * @param array $properties
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
     * @return string
     */
    public function buildPropertiesString(array $properties)
    {
        $chunks = array();

        foreach ($properties as $property) {
            $chunks[] = $property->toString();
        }

        return implode(' ', $chunks);
    }
}
