<?php

declare(strict_types=1);

namespace Box\Spout\Common\Entity\Style;

interface StyleInterface
{
    /**
     * @return int|null
     */
    public function getId();

    /**
     * @param int $id
     * @return Style
     */
    public function setId($id);

    /**
     * @return Border
     */
    public function getBorder();

    /**
     * @param Border $border
     * @return Style
     */
    public function setBorder(Border $border);

    /**
     * @return bool
     */
    public function shouldApplyBorder();

    /**
     * @return bool
     */
    public function isFontBold();

    /**
     * @return Style
     */
    public function setFontBold();

    /**
     * @return bool
     */
    public function hasSetFontBold();

    /**
     * @return bool
     */
    public function isFontItalic();

    /**
     * @return Style
     */
    public function setFontItalic();

    /**
     * @return bool
     */
    public function hasSetFontItalic();

    /**
     * @return bool
     */
    public function isFontUnderline();

    /**
     * @return Style
     */
    public function setFontUnderline();

    /**
     * @return bool
     */
    public function hasSetFontUnderline();

    /**
     * @return bool
     */
    public function isFontStrikethrough();

    /**
     * @return Style
     */
    public function setFontStrikethrough();

    /**
     * @return bool
     */
    public function hasSetFontStrikethrough();

    /**
     * @return int
     */
    public function getFontSize();

    /**
     * @param int $fontSize Font size, in pixels
     * @return Style
     */
    public function setFontSize($fontSize);

    /**
     * @return bool
     */
    public function hasSetFontSize();

    /**
     * @return string
     */
    public function getFontColor();

    /**
     * Sets the font color.
     *
     * @param string $fontColor ARGB color (@see Color)
     * @return Style
     */
    public function setFontColor($fontColor);

    /**
     * @return bool
     */
    public function hasSetFontColor();

    /**
     * @return string
     */
    public function getFontName();

    /**
     * @param string $fontName Name of the font to use
     * @return Style
     */
    public function setFontName($fontName);

    /**
     * @return bool
     */
    public function hasSetFontName();

    /**
     * @return bool
     */
    public function shouldWrapText();

    /**
     * @param bool $shouldWrap Should the text be wrapped
     * @return Style
     */
    public function setShouldWrapText($shouldWrap = true);

    /**
     * @return bool
     */
    public function hasSetWrapText();

    /**
     * @return bool Whether specific font properties should be applied
     */
    public function shouldApplyFont();

    /**
     * Sets the background color
     * @param string $color ARGB color (@see Color)
     * @return Style
     */
    public function setBackgroundColor($color);

    /**
     * @return string
     */
    public function getBackgroundColor();

    /**
     * @return bool Whether the background color should be applied
     */
    public function shouldApplyBackgroundColor();

    /**
     * Sets format
     * @param string $format
     * @return Style
     */
    public function setFormat($format);

    /**
     * @return string
     */
    public function getFormat();

    /**
     * @return bool Whether format should be applied
     */
    public function shouldApplyFormat();
}
