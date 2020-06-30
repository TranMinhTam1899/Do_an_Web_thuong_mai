<?php

namespace TijsVerkoyen\CssToInlineStyles\Css\Rule;

use Symfony\Component\CssSelector\Node\Specificity;
<<<<<<< HEAD
use TijsVerkoyen\CssToInlineStyles\Css\Property\Property;
=======
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933

final class Rule
{
    /**
     * @var string
     */
    private $selector;

    /**
<<<<<<< HEAD
     * @var Property[]
=======
     * @var array
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
     */
    private $properties;

    /**
     * @var Specificity
     */
    private $specificity;

    /**
     * @var integer
     */
    private $order;

    /**
     * Rule constructor.
     *
     * @param string      $selector
     * @param Property[]  $properties
     * @param Specificity $specificity
     * @param int         $order
     */
    public function __construct($selector, array $properties, Specificity $specificity, $order)
    {
        $this->selector = $selector;
        $this->properties = $properties;
        $this->specificity = $specificity;
        $this->order = $order;
    }

    /**
     * Get selector
     *
     * @return string
     */
    public function getSelector()
    {
        return $this->selector;
    }

    /**
     * Get properties
     *
<<<<<<< HEAD
     * @return Property[]
=======
     * @return array
>>>>>>> 4475649eee65427b8375bc7f700d53cc0b35e933
     */
    public function getProperties()
    {
        return $this->properties;
    }

    /**
     * Get specificity
     *
     * @return Specificity
     */
    public function getSpecificity()
    {
        return $this->specificity;
    }

    /**
     * Get order
     *
     * @return int
     */
    public function getOrder()
    {
        return $this->order;
    }
}
