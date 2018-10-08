<?php
//
// +---------------------------------------------------------------------+
// | CODE INC. SOURCE CODE                                               |
// +---------------------------------------------------------------------+
// | Copyright (c) 2018 - Code Inc. SAS - All Rights Reserved.           |
// | Visit https://www.codeinc.fr for more information about licensing.  |
// +---------------------------------------------------------------------+
// | NOTICE:  All information contained herein is, and remains the       |
// | property of Code Inc. SAS. The intellectual and technical concepts  |
// | contained herein are proprietary to Code Inc. SAS are protected by  |
// | trade secret or copyright law. Dissemination of this information or |
// | reproduction of this material is strictly forbidden unless prior    |
// | written permission is obtained from Code Inc. SAS.                  |
// +---------------------------------------------------------------------+
//
// Author:   Joan Fabrégat <joan@codeinc.fr>
// Date:     28/09/2018
// Project:  UI
//
declare(strict_types=1);
namespace CodeInc\UI\Library\Component;
use CodeInc\UI\ComponentInterface;


/**
 * Class HtmlHeadersComponent
 *
 * @package CodeInc\UI\Library\Component
 * @author Joan Fabrégat <joan@codeinc.fr>
 */
class HtmlHeadersComponent implements \IteratorAggregate, \Countable, ComponentInterface
{
    /**
     * @var array
     */
    protected $headers = [];

    /**
     * HtmlHeadersComponent constructor.
     *
     * @param iterable|null $headers
     */
    public function __construct(?iterable $headers = null)
    {
        if ($headers !== null) {
            $this->addHeaders($headers);
        }
    }

    /**
     * Adds an header.
     *
     * @param string $header
     */
    public function addHeader(string $header):void
    {
        $this->headers[] = $header;
    }

    /**
     * Adds multiple headers.
     *
     * @param iterable $headers
     */
    public function addHeaders(iterable $headers):void
    {
        foreach ($headers as $header) {
            if (!is_string($header)) {
                throw new \RuntimeException($this,
                    sprintf("The list item '%s' is not a string an can not be used as an header.",
                        is_object($header) ? get_class($header) : (string)$headers));
            }
            $this->addHeader($header);
        }
    }


    /**
     * Adds a CSS link to the <head> tag.
     *
     * @param string $url
     * @param string $type
     * @param string $rel
     */
    public function addCssHeader(string $url, string $type = 'text/css', string $rel = 'stylesheet'):void
    {
        $this->addHeader(
            '<link rel="'.htmlspecialchars($rel)
            .'" type="'.htmlspecialchars($type)
            .'" href="'.htmlspecialchars($url).'">'
        );
    }

    /**
     * Adds inline CSS code to the <head> tag.
     *
     * @param string $css
     * @param string $type
     */
    public function addInlineCssHeader(string $css, string $type = 'text/css'):void
    {
        $this->addHeader(
            '<style type="'.htmlspecialchars($type).'">'.$css.'</style>'
        );
    }

    /**
     * Adds a JS link to the <head> tag.
     *
     * @param string $url
     * @param string|null $integrity
     * @param string|null $crossOrigin
     */
    public function addJsHeader(string $url, ?string $integrity = null, ?string $crossOrigin = null):void
    {
        $header = '<script src="'.htmlspecialchars($url).'"';
        if ($integrity) {
            $header .= ' integrity="'.htmlspecialchars($integrity).'"';
        }
        if ($crossOrigin) {
            $header .= ' crossorigin="'.htmlspecialchars($crossOrigin).'"';
        }
        $header .= '></script>';
        $this->addHeader($header);
    }

    /**
     * Adds inline JS code to the <head> tag.
     *
     * @param string $js
     */
    public function addInlineJsHeader(string $js):void
    {
        $this->addHeader('<script>'.$js.'</script>');
    }

    /**
     * Returns all the headers in an array.
     *
     * @return array
     */
    public function getAsArray():array
    {
        return $this->headers;
    }

    /**
     * Returns all the headers as a string.
     *
     * @inheritdoc
     * @uses HtmlHeadersComponent::getAsString()
     * @return string
     */
    public function get(string $glue = "\n"):string
    {
        return implode($glue, $this->getAsArray());
    }

    /**
     * @inheritdoc
     * @return \ArrayIterator
     */
    public function getIterator():\ArrayIterator
    {
        return new \ArrayIterator($this->getAsArray());
    }

    /**
     * @inheritdoc
     * @return int
     */
    public function count():int
    {
        return count($this->headers);
    }
}