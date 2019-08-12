<?php

namespace Box\Spout\Writer\Common\Manager\Style;

use Box\Spout\Common\Entity\Style\Style;

/**
 * Class StyleRegistry
 * Registry for all used styles
 */
class StyleRegistry
{
    /** @var array [SERIALIZED_STYLE] => [STYLE_ID] mapping table, keeping track of the registered styles */
    protected $serializedStyleToStyleIdMappingTable = [];

    /** @var array [STYLE_ID] => [STYLE] mapping table, keeping track of the registered styles */
    protected $styleIdToStyleMappingTable = [];

    protected $objectMapper = [];

    /**
     * @param Style $defaultStyle
     */
    public function __construct(Style $defaultStyle)
    {
        // This ensures that the default style is the first one to be registered
        $this->registerStyle($defaultStyle);
    }

    /**
     * Registers the given style as a used style.
     * Duplicate styles won't be registered more than once.
     *
     * @param Style $style The style to be registered
     * @return Style The registered style, updated with an internal ID.
     */
    public function registerStyle(Style $style)
    {
        $found = false;
        foreach ($this->objectMapper as $key => $markedObject) {
            if ($markedObject == $style) {
                $styleId = $key;
                $found = true;
                break;
            }
        }

        if ($found == false) {
            $nextStyleId = count($this->objectMapper);
            $this->objectMapper[$nextStyleId] = clone $style;

            $style->setId($nextStyleId);
            $styleAdd = clone $style;

            $this->styleIdToStyleMappingTable[$nextStyleId] = $styleAdd;
            return $style;
        }

        return $this->styleIdToStyleMappingTable[$styleId];
    }

    /**
     * @return Style[] List of registered styles
     */
    public function getRegisteredStyles()
    {
        return array_values($this->styleIdToStyleMappingTable);
    }

    /**
     * @param int $styleId
     * @return Style
     */
    public function getStyleFromStyleId($styleId)
    {
        return $this->styleIdToStyleMappingTable[$styleId];
    }

    /**
     * Serializes the style for future comparison with other styles.
     * The ID is excluded from the comparison, as we only care about
     * actual style properties.
     *
     * @param Style $style
     * @return string The serialized style
     */
    public function serialize(Style $style)
    {
        // In order to be able to properly compare style, set static ID value
        $currentId = $style->getId();
        $style->setId(0);

        $serializedStyle = serialize($style);

        $style->setId($currentId);

        return $serializedStyle;
    }
}
